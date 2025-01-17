<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    } 

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return(new MailMessage)
            ->subject('Verificar cuenta')
            ->line('Tu cuenta esta casi lista, Haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
            ->action('Verificar', $url)
            ->line('Si no ha creado una cuenta, no es necesario realizar ninguna otra acción.');
        });
    }
}
