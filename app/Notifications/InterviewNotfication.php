<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterviewNotfication extends Notification
{
    use Queueable;
    public $msg;
    public $language;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($msg, $language)
    {
        $this->msg = $msg;
        $this->language = $language;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\msgs\Mailmsg
     */
    public function toMail($notifiable)
    {
        $msg = $this->msg;
        $language = $this->language;
        return (new MailMessage)->view('interviewEmail', compact('msg', 'language'));
        // ->line('The introduction to the notification.' . $this->message)
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
