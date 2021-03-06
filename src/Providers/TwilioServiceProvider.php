<?php

namespace Undefined\Krayin\Twilio\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'twilio');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/krayin-twilio/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'twilio');

        Event::listen('admin.layout.head', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('twilio::layouts.style');
        });

        // Breadcrumbs
        if (class_exists('Breadcrumbs')) {
            require __DIR__ . './../Http/breadcrumbs.php';
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php',
            'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php',
            'core_config'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/dashboard_cards.php',
            'dashboard_cards'
        );
    }
}
