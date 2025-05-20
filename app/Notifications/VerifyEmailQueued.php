<?php

namespace App\Notifications;

use App\Mail\VerifyEmailCustomMail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class VerifyEmailQueued extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): VerifyEmailCustomMail
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        // Возвращаем Mailable, Laravel сам поставит в очередь
        return (new VerifyEmailCustomMail($verificationUrl))
            ->to($notifiable->email);
    }

    protected function verificationUrl($notifiable): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
