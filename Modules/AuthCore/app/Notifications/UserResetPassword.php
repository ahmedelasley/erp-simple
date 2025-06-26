<?php

namespace Modules\AuthCore\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            ->subject('Reset Your Password - User Panel') // عنوان البريد
            ->greeting('Hello,') // تحية البداية
            ->line('We received a request to reset the password for your administrative account.') // رسالة توضيحية
            ->line('Click the button below to set a new password. For your security, this link will expire in 60 minutes.') // توضيح إضافي
            ->action('Reset Password', route('password.reset', $this->token)) // زر إعادة التعيين
            ->line('If you did not request this password reset, please ignore this email. No further action is required.') // توضيح في حال الخطأ
            ->salutation('Regards, Your Company Team'); // تحية الختام
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
