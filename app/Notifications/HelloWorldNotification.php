<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HelloWorldNotification extends Notification
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage // $notifiable the Model that we are using to receive a notification
    {
        return (new MailMessage)
                    ->greeting("Hi {$notifiable->name}")
                    ->line('Natagpuan namin si Kyd na uhaw')
                    ->subject('Kyd natagpuang uhaw')
                    ->line('Iclick ang button below para painumin ng tubig si Kyd')
                    ->action('Painumin ng tubig si Kyd', url('https://www.facebook.com/Mejie2108')) // buttons
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'test' => 'Hello world'
        ];
    }
}
