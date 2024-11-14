<?php

namespace Modules\MyKover\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeToKoveraeNotification extends Notification
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
        ->subject(__("Welcome to Koverae !"))
            ->greeting("{$notifiable->name}")
                ->line(__("Dear {$notifiable->name},"))
                ->line(__("Your account has been successfully created!"))
                ->line(__("Your login is {$notifiable->email}"))
                ->line(__("To gain access to your Koverae Space, you can use the following link:"))
                    ->line('The introduction to the notification.')
                    ->action('Go to My Space', url('/'))
                    ->line('Thanks,');
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
