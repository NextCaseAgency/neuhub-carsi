<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\RedisMemoryUsageCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;
use Z3d0X\FilamentFabricator\Forms\Components\PageBuilder;
use Z3d0X\FilamentFabricator\Resources\PageResource;

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
        PageResource::navigationGroup('İçerik');
        PageResource::navigationSort(1);
        PageResource::navigationIcon('heroicon-o-cube');

        Health::checks([
            CacheCheck::new(),
            DatabaseCheck::new(),
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            UsedDiskSpaceCheck::new(),
            DatabaseTableSizeCheck::new(),
        ]);

        PageBuilder::configureUsing(function (PageBuilder $builder) {
            $builder->collapsible();
        });
    }
}
