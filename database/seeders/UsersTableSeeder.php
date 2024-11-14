<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Arden',
            'name' => 'BOUET',
            'phone' => +2540745908026,
            'email' => 'laudbouetoumoussa@gmail.com',
            'recovery_email' => 'ardenbouet5@gmail.com',
            'password' => Hash::make('koverae'),
            'is_active' => true,
            'gender' => 'male',
            'day_of_birth' => 28,
            'month_of_birth' => 03,
            'year_of_birth' => 2004,
            'email_verified_at' => now()
        ]);
        $user->save();

        $user_home_address = UserAddress::create([
            'user_id' => $user->id,
            'street' => 'Parklands street',
            'city' => 'Nairobi',
            'state' => 'Nairobi County',
            'country' => 'Kenya',
            'zip' => 00100
        ]);
        $user_home_address->save();

        $user_work_address = UserAddress::create([
            'user_id' => $user->id,
            'type' => 'work'
        ]);
        $user_work_address->save();
        $user->generateAvatar();

        $payment_method = UserPaymentMethod::create([
            'user_id' => $user->id,
            'card_number' => 4123320908030348,
            'type' => 'credit_card',
            'card_expiry_date' => '05/29',
            'card_cvv' => 123,
            'is_default' => true
        ]);
        $payment_method->save();

        
    }

}
