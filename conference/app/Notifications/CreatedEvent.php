<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatedEvent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     * 
     */
    
     private $name;
     private $tablename;
     private $url;
     private $status;

    public function __construct( $name,  $tablename,  $url, $status)
    {
        $this->name = $name;
        $this->tablename = $tablename;
        $this->url = $url;
        $this->status = $status;
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
        $subject = '';
        $body = '';
        $action ='';

        if( $this->status == 'Create'){
            $subject = 'Event Created';
            $body = 'Your event successfully created with name '.$this->tablename.'!';
            $action ='See your event';
            $url = '/'. $this->url;
        }elseif( $this->status == 'Delete'){
            $subject = 'Event Deleted';
            $body = 'Your event with name '.$this->tablename.' successfully deleted!';
            $action ='Add new event';
            $url = '/'. $this->url;
        }
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting('Hi, '. $this->name)
                    ->line($body)
                    ->action($action, url($url))
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
