<?php

namespace Modules\Lk\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Lk\Emails\ResetEmail;
use Illuminate\Mail\Mailable;

class PasswordResetNotification extends Notification
{
    use Queueable;

    protected array $data;

    public function __construct(mixed $token, string $email, $locale = 'ru')
    {
        \App::setLocale($locale);
        $this->data = [
            'hello' => __('mail-hello'),
            'title' => __('mail-title'),
            'description' => __('mail-first-line'),
            'expires' => __('mail-expires-in'),
            'url' => url( route('lk.password.reset',['token' => $token, 'email'=> $email]) ),
            'btn' => __('mail-btn'),
            'footer' => __('mail-footer'),
        ];

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable): Mailable
    {

        return (new ResetEmail(null,null))
            ->to($notifiable->email)
            ->subject(__('mail-subject'))
            ->with("data",$this->data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
