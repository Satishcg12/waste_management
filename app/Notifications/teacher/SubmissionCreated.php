<?php

namespace App\Notifications\teacher;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public $submission;
    /**
     * Create a new notification instance.
     */
    public function __construct(object $submission)
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
                    ->subject('New Submission')
                    ->greeting('Hello ' . $notifiable->name)
                    ->line('You have a new submission with title ' . $this->submission->title . '.')
                    ->line('Please check your dashboard for more information.')
                    ->action('View', route('teacher.submission.edit', $this->submission->id))
                    ->line('Thank you for your participation.');



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
