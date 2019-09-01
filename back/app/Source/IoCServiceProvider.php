<?php namespace App\Source;

use Illuminate\Support\ServiceProvider;

class IoCServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Source\IMailerService', 'App\Source\MailerService');
    }
}