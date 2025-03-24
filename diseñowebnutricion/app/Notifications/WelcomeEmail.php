<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmail extends Notification implements ShouldQueue
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
            ->subject('¡Bienvenido a NutriApp!')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Nos alegra darte la bienvenida a NutriApp, tu plataforma personalizada para una vida más saludable.')
            ->line('Con NutriApp podrás:')
            ->line('• Gestionar tus recetas favoritas')
            ->line('• Seguir tus objetivos nutricionales')
            ->line('• Recibir recomendaciones personalizadas')
            ->line('• Mantener un registro de tu progreso')
            ->action('Comenzar a usar NutriApp', url('/dashboard'))
            ->line('¡Gracias por unirte a nuestra comunidad!')
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
