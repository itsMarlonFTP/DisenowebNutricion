<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginAlert extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nuevo inicio de sesión detectado')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Se ha detectado un nuevo inicio de sesión en tu cuenta.')
            ->line('Detalles del inicio de sesión:')
            ->line('• Fecha y hora: ' . now()->format('d/m/Y H:i:s'))
            ->line('• IP: ' . request()->ip())
            ->line('• Navegador: ' . request()->userAgent())
            ->line('Si no has iniciado sesión tú, por favor cambia tu contraseña inmediatamente.')
            ->action('Ir al Dashboard', url('/dashboard'))
            ->line('¡Gracias por usar NutriApp!')
            ->salutation('El equipo de NutriApp');
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
