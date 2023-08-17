<?php

namespace App\Notifications\user;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionAccepted extends Notification implements ShouldQueue
{
    use Queueable;

    public $submission;
    /**
     * Create a new notification instance.
     */
    public function __construct($submission)
    {
        $this->submission = $submission;
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
        return (new MailMessage)
        ->level('success')
                    ->subject('Submission Accepted')
                    ->greeting('Hello ' . $this->submission->user->name)
                    ->line('Your Video/image with title ' . $this->submission->title . ' has been accepted.')
                    ->action('View Submission', route('submission.show', $this->submission->id))
                    ->line('Thank you for your participation.')
                    ->line('Regards,')
                    ->line(config('app.name') . ' Team');
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
