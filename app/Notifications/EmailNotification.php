<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $name = '';
    public $designation = '';

    public function __construct($name,$designation)
    {
        $this->name = $name;
        $this->designation = $designation;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        $name = $this->name;
        $designation = $this->designation;
        return (new MailMessage)->view('notification.email',compact('name','designation'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
