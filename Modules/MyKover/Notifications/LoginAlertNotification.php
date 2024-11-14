<?php

namespace Modules\MyKover\Notifications;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginAlertNotification extends Notification
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject("Notification of connection to your Koverae Space")
        ->greeting("Hello {$notifiable->name}")
        ->line("We inform you that a connection to your Koverae Space has been made successfully. Here are the connection details:")
        ->line("Connection IP: {$notifiable->last_login_ip}")
        ->line("Log in time: " . Carbon::parse($notifiable->last_logged_in_at)->format("d/M/Y H:i:s"))
        ->line("If you are the originator of this connection, no further action is necessary.")
        ->line("If you are not the originator of this connection, this means that someone else was able to access your account. We recommend that you take the following steps immediately:")
        ->line("1. Change your password: Change your password as soon as possible to secure your account.")
        ->line("2. Check your information and activities: Access your customer area and check your personal information and activity history to detect any suspicious actions.")
        ->line("3. Contact our customer service: If you notice any unauthorized activities or need assistance, contact us immediately.")
        ->line("To modify the settings of these alerts, go to your Koverae Space, in the Contact details section.")
        ->line("Your security is our priority. We take all necessary measures to protect your information.")
        ->salutation("The Koverae Team ✨🚀");
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
