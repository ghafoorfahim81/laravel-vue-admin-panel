<?php

namespace App\Notifications;

use App\Models\Tracker;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class AddTrackerNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $tracker;
    public function __construct($tracker)
    {
        $this->tracker = $tracker;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

    public function toBroadcast($notifiable)
    {
        return [
            'id' => $this->tracker->id,
        ];
    }

    public function toArray( $notifiable)
    {
        Log::info('Notifiable:', [$notifiable]);
        return [
            'id' => $this->tracker->id,
        ];
    }
}
