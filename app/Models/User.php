<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use IvanoMatteo\LaravelDeviceTracking\Models\DeviceUser;
use IvanoMatteo\LaravelDeviceTracking\Traits\UseDevices;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, UseDevices;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'name',
        'email',
        'recovery_email',
        'phone',
        'gender',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'avatar',
        'password',
        'two_factor_second_step',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'two_factor_enabled' => 'boolean',
    ];

    /**
     * Route notifications for the Vonage channel.
     */
    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->phone;
    }


    // Generate OTP code
    public function generateTwoFactorCode(): void {
        $this->timestamps = false;  // Prevent updating the 'updated_at' column
        $this->two_factor_code = rand(100000, 999999);  // Generate a random code
        $this->two_factor_expires_at = now()->addMinutes(10);  // Set expiration time
        $this->save();
    }
    // Regenerate OTP code
    public function resetTwoFactorCode(): void {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    // User's Security Notifications
    public function securityNotifications() {
        return $this->hasMany(UserSecurityNotification::class, 'user_id', 'id');
    }

    // User's Security Notifications
    public function paymentMethods() {
        return $this->hasMany(UserPaymentMethod::class, 'user_id', 'id');
    }

    // User's Devices
    public function devices() {
        return $this->hasMany(DeviceUser::class, 'user_id', 'id');
    }
    public function deviceSessions() {
    }

    // User's Addresses
    public function addresses() {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }
    public function addressHome() {
        $address = $this->addresses()->where('type', 'home')->first();
        if(is_null($address) || !$address->country){
            return null;
        }
        return $address->street.', '. $address->city.', '.$address->country;
    }
    public function addressWork() {
        $address = $this->addresses()->where('type', 'work')->first();
        if(is_null($address) || !$address->country){
            return null;
        }
        return $address->street.', '. $address->city.', '.$address->country;
    }
    public function addressOther() {
        $address = $this->addresses()->where('type', 'other')->first();
        if(is_null($address ) || !$address->country){
            return null;
        }
        return $address->street.', '. $address->city.', '.$address->country;
    }

    // User's Birth Date
    public function birthDate() {

        // Check if any of the date components are null
        if (is_null($this->year_of_birth) || is_null($this->month_of_birth) || is_null($this->day_of_birth)) {
            return null;
        }
        // Create a date instance from day, month, and year
        $date = Carbon::createFromDate($this->year_of_birth, $this->month_of_birth, $this->day_of_birth);

        // Format the date to '28 March 2004'
        $formattedDate = $date->format('d F Y');

        return $formattedDate;
    }
    // User's Gender
    public function gender() {
        if(is_null($this->gender)){
            return null;
        }
        return $this->gender == 'male' ? __('Male') : __('Female');
    }
    // Use Default Avatar
    public function avatar(){
        return $this->id.'_avatar';
    }

    // Generate User Avatar
    public function generateAvatar(){

        // Define the avatar directory and ensure it exists
        $avatarDir = 'storage/avatars';
        $publicAvatarDir = public_path($avatarDir);

        if (!file_exists($publicAvatarDir)) {
            mkdir($publicAvatarDir, 0777, true); // Create the directory with the correct permissions
        }

        // Generate the image

        $firstName = explode(' ', trim($this->first_name))[0];
        $name = explode(' ', trim($this->name))[0];

        $full_name = $firstName.' '.$name;
        $words = explode(' ', $full_name);
        $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));

        $bgColor = '#' . substr(md5($full_name), 0, 6); // Use a unique color based on the name
        $textColor = '#ffffff'; // White text color

        $image = imagecreate(200, 200);
        $bg = imagecolorallocate($image, hexdec(substr($bgColor, 1, 2)), hexdec(substr($bgColor, 3, 2)), hexdec(substr($bgColor, 5, 2)));
        $text = imagecolorallocate($image, hexdec(substr($textColor, 1, 2)), hexdec(substr($textColor, 3, 2)), hexdec(substr($textColor, 5, 2)));
        imagefill($image, 0, 0, $bg);

        $fontPath = public_path('assets/fonts/arial/ARIAL.ttf');
        if (!file_exists($fontPath)) {
            die('Font file does not exist: ' . $fontPath);
        }

        $fontSize = 75;
        $angle = 0;
        $x = 50; // Adjust the X coordinate
        $y = 150; // Adjust the Y coordinate

        imagettftext($image, $fontSize, $angle, $x, $y, $text, $fontPath, $initials);

        // Save the image to a file
        $avatarFilename = $this->id . '_avatar.png';
        $avatarPath = $avatarDir . '/' . $avatarFilename;
        imagepng($image, public_path($avatarPath));
        imagedestroy($image);

        // Update the user record with the avatar path
        $this->avatar = $avatarFilename;
        $this->save();

        // Provide feedback
        echo "Avatar created successfully: " . $avatarPath;
    }
}
