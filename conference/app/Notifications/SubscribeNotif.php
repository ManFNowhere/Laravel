<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class SubscribeNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $status;
    private $url;
    public function __construct($status, $url)
    {
        $this->status = $status;
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
        $subject = '';
        $body ='';
        $url = '/events';
        $action = 'See our event';
        $link = '';
        if($this->status == 'Subscribe'){
            $subject = 'Subscribe';
            $body ='Thank you for your subscription. We will inform you of any new events!';
            $link = '';
            $link = new HtmlString('<a href="'.$this->url.'">Cancel Subscription</a>');
        }elseif($this->status == 'Unsubscribe'){
            $subject = 'Unsubscribe';
            $body ='Were sorry to see you go. You have been successfully unsubscribed. If you ever wish to resubscribe, youre always welcome back.';
        }elseif($this->status == 'New Event'){
            $subject = 'New Event';
            $body ='An event has just been created; please check it!';
            $action = 'See event';
            $url = $this->url;
            $link = new HtmlString('<a href="'.$this->url.'">Cancel Subscription</a>');
        }
        return (new MailMessage)
        ->subject( $subject )
        ->greeting('Hi, there')
        ->line($body)
        ->action($action, url($url))
        ->line('Thank you for using our application!')
        ->line($link);
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
