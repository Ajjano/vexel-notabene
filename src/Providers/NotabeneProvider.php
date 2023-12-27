<?php


namespace Vexel\NotabeneLib\Providers;

use Illuminate\Support\ServiceProvider;

class NotabeneProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/notabene.php' =>  config_path('notabene.php'),
        ], 'config');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }
}
