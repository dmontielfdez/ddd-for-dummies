<?php

namespace App\Providers;

use Dmontielfdez\Shared\Framework\Infrastructure\Bus\CommandBus\CommandBus;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\CommandBus\CommandBusInterface;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\QueryBus\QueryBus;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\QueryBus\QueryBusInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBusInterface::class, QueryBus::class);
        $this->app->bind(CommandBusInterface::class, CommandBus::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict();
    }
}
