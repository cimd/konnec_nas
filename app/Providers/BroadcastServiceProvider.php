<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Broadcast::routes([
            'prefix' => 'api',
            'middleware' => 'auth:sanctum',
        ]);

        require base_path('routes/channels.php');

        $this->loadModuleChannels();
    }

    private function loadModuleChannels(): void
    {
        $channels = collect(
            glob(base_path('modules/*/Routes/*.channels.php'))
        );

        $channels->each(function ($item) {
            require $item;
        });
    }
}
