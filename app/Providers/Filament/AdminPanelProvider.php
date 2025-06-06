<?php

namespace App\Providers\Filament;

use App\Filament\Pages\HealthCheckResults;
use Datlechin\FilamentMenuBuilder\FilamentMenuBuilderPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentGeneralSettings\FilamentGeneralSettingsPlugin;
use Outerweb\FilamentTranslatableFields\Filament\Plugins\FilamentTranslatableFieldsPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\FilamentSpatieLaravelHealthPlugin;
use Z3d0X\FilamentFabricator\Enums\BlockPickerStyle;
use Z3d0X\FilamentFabricator\FilamentFabricatorPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                FilamentFabricatorPlugin::make()
                    ->blockPickerStyle(BlockPickerStyle::Dropdown),
                FilamentGeneralSettingsPlugin::make()
                    ->setSort(3)
                    ->setIcon('heroicon-o-cog')
                    ->setNavigationGroup('Sistem'),
                FilamentSpatieLaravelHealthPlugin::make()
                    ->usingPage(HealthCheckResults::class),
                FilamentMenuBuilderPlugin::make()
                    ->addLocations([
                        'header_tr' => 'Header Tr',
                        'header_en' => 'Header En',
                    ]),
                FilamentTranslatableFieldsPlugin::make()
                    ->supportedLocales([
                        'tr' => 'Türkçe',
                        'en' => 'English',
                    ]),
            ]);
    }
}
