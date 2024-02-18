<?php

namespace App\Providers;

use App\Services\Item\IItemService;
use App\Services\ItemService;
use Illuminate\Support\ServiceProvider;

class ServiceControllerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ItemService::class,
            IItemService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
