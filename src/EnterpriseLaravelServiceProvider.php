<?php

namespace EnterpriseLaravel;

use Illuminate\Support\ServiceProvider;

class EnterpriseLaravelServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            LARAVEL_ENTERPRISE_PATH.'./environment/resources' => base_path('environment'),
            LARAVEL_ENTERPRISE_PATH.'./environment/docker-compose.yml' => base_path('docker-compose.yml'),
        ]);
    }

    public function register()
    {
        if (! defined('LARAVEL_ENTERPRISE_PATH')) {
            define('LARAVEL_ENTERPRISE_PATH', realpath(__DIR__ . '/enterprise-laravel/'));
        }
    }

}