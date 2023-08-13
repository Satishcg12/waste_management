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
        ->level('success')
        ->subject('Submission Created')
        ->greeting('Hello!')
        ->line('Your submission has been created.')
        ->line('Title: ' . $this->submission->title)
        ->line('Description: ' . $this->submission->description)
        ->action('Review Summission', route('teacher.submission.edit', $this->submission->id))
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
