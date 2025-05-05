<?php

if (! function_exists('add_locale_to_url')) {
    function add_locale_to_url($url)
    {
        $locale = app()->getLocale(); // Geçerli dili alıyoruz
        $urlParts = parse_url($url);
        $path = $urlParts['path'] ?? '/';

        // Eğer URL'de zaten dil prefix'i varsa, tekrar eklemiyoruz
        $segments = explode('/', trim($path, '/'));
        if (in_array($segments[0], ['en', 'tr'])) {
            // Zaten dil prefix'i varsa, onu eklemiyoruz
            return $url;
        }

        // Eğer dil prefix'i yoksa, ekliyoruz
        return url($locale . '/' . ltrim($path, '/'));
    }
}
