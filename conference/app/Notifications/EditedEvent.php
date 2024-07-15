<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EditedEvent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */


     private $name;
     private $tablename;
     private $url;

    public function __construct( $name,  $tablename, $url)
    {
        $this->name = $name;
        $this->tablename = $tablename;
        $this->url = $url;
  
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
    public function toMail(object $notifiable): MailMessage
    {
       
        $subject = 'Event Edited';
        $body = 'Youre event '.$this->tablename.' successfully edited!';
        return (new MailMessage)
            ->subject($subject)
            ->greeting('Hi, '. $this->name)
            ->line($body)
            ->action('See your event', url('/'. $this->url))
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
            //
        ];
    }
}
