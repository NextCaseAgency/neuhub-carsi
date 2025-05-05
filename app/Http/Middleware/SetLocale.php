<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        dd($request->path());
        $blockedPaths = ['en/restaurantlar', 'en/etkinlikler', 'en/magazalar'];

        if (in_array($request->path(), $blockedPaths)) {
            return redirect('/');
        }

        $redirect = Redirect::where('old_url', $request->path())->first();

        if ($redirect) {
            return redirect($redirect->new_url, $redirect->type);
        }

        $currentUrls = url()->current();
        $locales = strpos($currentUrls, '/en') ? 'en' : 'tr';
        session(['locale' => $locales]);
        $locale = session('locale', config('app.locale'));

        App::setLocale($locale);

        return $next($request);
    }
}
