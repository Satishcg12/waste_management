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
                    ->subject('Submission Rejected')
                    ->greeting('Hello ' . $this->submission->user->name)
                    ->line('Your submission with title ' . $this->submission->title . ' has been rejected.')
                    ->line('Reason: ' . $this->reject_reason)
                    ->line('Please contact your teacher for more information.')
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
