<?php

namespace App\Notifications\user;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionReject extends Notification implements ShouldQueue
{
    use Queueable;
    public $submission;
    public $reject_reason;

    /**
     * Create a new notification instance.
     */
    public function __construct(Submission $submission, string $reject_reason)
    {
        $this->submission = $submission;
        $this->reject_reason = $reject_reason;
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
                    ->line($this->submission->user->name . ', Your submission has been rejected.')
                    ->line('Title: ' . $this->submission->title)
                    ->line('Reason: ' . $this->reject_reason)
                    ->level('error');

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
