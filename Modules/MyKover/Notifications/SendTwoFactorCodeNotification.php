<?php

namespace Modules\MyKover\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class SendTwoFactorCodeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return config('auth.two_factor.via');
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject("Your connection code for your Koverae Space is {$notifiable->two_factor_code}")
        ->greeting("Hello {$notifiable->name}")
        ->line("We have detected an attempt to connect to your Koverae Space from an unknown device or IP address. To ensure the security of your account, we need to confirm that it is you.")
        ->line( new HtmlString(__("Verification code : <b>{$notifiable->two_factor_code}</b>")))
        ->line("Please enter this code in the login form to confirm your identity. This code is valid for 10 minutes.")
        ->lines([
            "If you are not the originator of this connection, this could mean that your login credentials are potentially compromised. In this case, we strongly recommend that you immediately change your password from your Koverae Space.",
            "Your security is our priority. If you have any questions or need assistance, please do not hesitate to contact our customer service."
            ])
        // ->action('Verify Here', route('verify.index'))
        ->salutation("The Koverae Team ✨🚀");
    }

    public function toVonage($notifiable): VonageMessage
    {
        return (new VonageMessage())
            ->content("Your Koverae verification code is: {$notifiable->two_factor_code}")
            ->from('Koverae');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
