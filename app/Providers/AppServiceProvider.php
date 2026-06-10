<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\Mail::extend('mailtrap', function (array $config) {
            $factory = new \Symfony\Component\Mailer\Bridge\Mailtrap\Transport\MailtrapTransportFactory();
            $token = env('MAILTRAP_TOKEN', '44cd62ab0d6cda7fc558af6cc1166687');
            return $factory->create(new \Symfony\Component\Mailer\Transport\Dsn('mailtrap+api', 'default', $token));
        });
    }
}
