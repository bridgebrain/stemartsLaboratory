<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerResources([
                \App\Filament\Resources\WikiResource::class,
                \App\Filament\Resources\PostResource::class,
                \App\Filament\Resources\UserResource::class,
            ]);
        });
    }
}