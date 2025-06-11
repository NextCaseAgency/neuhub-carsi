<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\App;
use Datlechin\FilamentMenuBuilder\Models\Menu;
use Illuminate\Support\Facades\Request;
use Z3d0X\FilamentFabricator\Models\Page;

Route::group(['middleware' => ['web', SetLocale::class]], function () {

    $locale = App::getLocale();
    $menu_location = 'header_' . $locale;
    $menu_locationEn = 'header_en';
    $web_menu = Menu::location($menu_location);
    $web_menuEn = Menu::location($menu_locationEn);

    $routes = [];

    if ($web_menu) {
        $web_menu->menuItems->each(function ($item) use (&$routes) {
            $routes[] = $item->url;
        });
    }

    $routesEn = [];

    if ($web_menuEn) {
        $web_menuEn->menuItems->each(function ($item) use (&$routesEn) {
            $routesEn[] = $item->url;
        });
    }

    if (!Request::is('admin*')) {
        if (
            !Request::is('setlocale*') &&
            !Request::is('en') &&
            !Request::is('en/*') &&
            (!in_array(Request::path(), $routesEn) && !array_key_exists(Request::path(), $routes))
        ) {
            $check = $web_menu->menuItems->where('url', Request::path())->first();
            if (!$check) {
                $routes[7] = Request::path();
            }
        }
    }

    $routesActionFilter = [
        '/' => 'home',
        $routes[0] => 'stores',
        $routes[1] => 'restaurants',
        $routes[2] => 'campaigns',
        $routes[3] => 'events',
        $routes[4] => 'magazines',
        $routes[5] => 'art',
        $routes[6] => 'office',
        '/sevgililer-gunu-cekilis-kampanyasi' => 'page',

        '/aydinlatma' => 'lighting',
        '/cerez-politikasi' => 'cookie',
        '/en' => 'home',
        $routesEn[0] => 'stores',
        $routesEn[1] => 'restaurants',
        $routesEn[2] => 'campaigns',
        $routesEn[3] => 'events',
        $routesEn[4] => 'magazines',
        $routesEn[5] => 'art',
        $routesEn[6] => 'office',
        'en/clarification-text' => 'lighting',
        'en/about-our-cookie-policy' => 'cookie',
    ];


    $page = Page::where('slug', Request::path())->first();

    if ($page) {
        if(!array_key_exists($page->slug, $routesActionFilter)) {
            $routesActionFilter[$page->slug] = 'page';
        }
    }

    $routes = array_merge($routes, $routesActionFilter);
    foreach ($routes as $uri => $action) {
        $routeName = $action . '_' . $locale . '_' . md5($uri);
        Route::get($uri, [PageController::class, $action])->name($routeName);
    }

    Route::get('setlocale/{locale}', function ($locale) use ($routes, $routesEn) {
        $currentUrl = url()->previous();
        $currentPath = trim(parse_url($currentUrl, PHP_URL_PATH), '/');

        $newLocalePath = null;

        if ($locale === 'en') {
            foreach ($routes as $index => $trPath) {
                if ($currentPath === $trPath) {
                    $newLocalePath = $routesEn[$index] ?? 'en';
                    break;
                }
            }
        } else {
            foreach ($routesEn as $index => $enPath) {
                if ($currentPath === $enPath) {
                    $newLocalePath = $routes[$index] ?? '/';
                    break;
                }
            }
        }

        $redirectPath = $newLocalePath ? "/$newLocalePath" : ($locale === 'en' ? '/en' : '/');

        return redirect($redirectPath);
    })->name('setlocale');

});

Route::get('/linkstorage', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');

    if (!file_exists($link)) {
        mkdir($link, 0755, true);
    }

    $copyRecursive = function ($source, $destination) use (&$copyRecursive) {
        $dir = opendir($source);
        @mkdir($destination, 0755, true);

        while (false !== ($file = readdir($dir))) {
            if ($file != '.' && $file != '..') {
                $srcPath = $source . '/' . $file;
                $destPath = $destination . '/' . $file;

                if (is_dir($srcPath)) {
                    $copyRecursive($srcPath, $destPath);
                } else {
                    copy($srcPath, $destPath);
                }
            }
        }
        closedir($dir);
    };

    $copyRecursive($target, $link);

    return 'Klasörler ve dosyalar başarıyla kopyalandı!';
});

Route::any('/login', function () {

    $prevUrl = url()->previous();

    if (! $prevUrl) {
        abort(404); // or redirect some where
    }

    $path = parse_url($prevUrl, PHP_URL_PATH);

    $panelId = explode('/', trim($path, '/'))[0];

    if (! in_array($panelId, array_keys(Filament::getPanels()))) {
        abort(404);
    }

    return redirect(route("filament.{$panelId}.auth.login"));
})->name('login');
