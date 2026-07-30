<?php

if (! function_exists('normalize_content_headings')) {
    /**
     * CMS/HTML içerikteki gereksiz h1 etiketlerini h2'ye indirger.
     */
    function normalize_content_headings(?string $html): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }

        return preg_replace(['/<h1\b/i', '/<\/h1>/i'], ['<h2', '</h2>'], $html) ?? $html;
    }
}

if (! function_exists('storage_webp_url')) {
    /**
     * storage/ altında WebP karşılığı varsa onu döndürür.
     */
    function storage_webp_url(?string $relativePath): ?string
    {
        if ($relativePath === null || trim($relativePath) === '') {
            return null;
        }

        $relativePath = ltrim($relativePath, '/');

        if (! preg_match('/\.(jpe?g|png)$/i', $relativePath)) {
            return 'storage/'.$relativePath;
        }

        $webpRelative = preg_replace('/\.(jpe?g|png)$/i', '.webp', $relativePath);

        if ($webpRelative && file_exists(public_path('storage/'.$webpRelative))) {
            return 'storage/'.$webpRelative;
        }

        return 'storage/'.$relativePath;
    }
}

if (! function_exists('picture_asset')) {
    /**
     * WebP destekli picture HTML üretir (storage ve public img).
     */
    function picture_asset(string $src, string $alt = '', string $class = '', string $style = ''): string
    {
        $src = ltrim($src, '/');
        $isStorage = str_starts_with($src, 'storage/');
        $relative = $isStorage ? substr($src, 8) : $src;

        $originalUrl = asset($src);
        $webpUrl = null;

        if (preg_match('/\.(jpe?g|png)$/i', $relative)) {
            $webpRelative = preg_replace('/\.(jpe?g|png)$/i', '.webp', $relative);
            $webpPath = $isStorage
                ? public_path('storage/'.$webpRelative)
                : public_path($webpRelative);

            if (file_exists($webpPath)) {
                $webpUrl = asset($isStorage ? 'storage/'.$webpRelative : $webpRelative);
            }
        }

        $classAttr = $class !== '' ? ' class="'.e($class).'"' : '';
        $styleAttr = $style !== '' ? ' style="'.e($style).'"' : '';
        $altAttr = ' alt="'.e($alt).'"';

        if ($webpUrl) {
            return '<picture>'
                .'<source srcset="'.e($webpUrl).'" type="image/webp">'
                .'<img src="'.e($originalUrl).'"'.$altAttr.$classAttr.$styleAttr.' loading="lazy" decoding="async">'
                .'</picture>';
        }

        return '<img src="'.e($originalUrl).'"'.$altAttr.$classAttr.$styleAttr.' loading="lazy" decoding="async">';
    }
}

if (! function_exists('event_gallery_name')) {
    /**
     * CMS galeri kaydından etkinlik adını çözümler.
     */
    function event_gallery_name(array $gallery): string
    {
        foreach (['title', 'name', 'event_title'] as $key) {
            $value = trim((string) ($gallery[$key] ?? ''));

            if ($value !== '') {
                return $value;
            }
        }

        return '';
    }
}

if (! function_exists('event_schema_iso_datetime')) {
    /**
     * Schema.org için ISO 8601 tarih formatı.
     */
    function event_schema_iso_datetime(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($value)
                ->timezone('Europe/Istanbul')
                ->startOfDay()
                ->toIso8601String();
        } catch (\Throwable) {
            return null;
        }
    }
}

if (! function_exists('event_schema_from_gallery')) {
    /**
     * Google Event schema için geçerli galeri kaydını Event nesnesine dönüştürür.
     * Ad veya başlangıç tarihi eksikse null döner.
     */
    function event_schema_from_gallery(array $gallery): ?array
    {
        $name = event_gallery_name($gallery);

        if ($name === '') {
            return null;
        }

        $startDate = event_schema_iso_datetime(
            $gallery['start_date'] ?? $gallery['startDate'] ?? $gallery['date'] ?? null
        );

        if ($startDate === null) {
            return null;
        }

        $event = [
            '@type' => 'Event',
            'name' => $name,
            'startDate' => $startDate,
            'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
            'eventStatus' => 'https://schema.org/EventScheduled',
            'location' => [
                '@type' => 'Place',
                'name' => 'Polat Piyalepaşa Çarşı',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Piyalepaşa Bulvarı',
                    'addressLocality' => 'Beyoğlu',
                    'addressRegion' => 'İstanbul',
                    'addressCountry' => 'TR',
                ],
            ],
        ];

        if (! empty($gallery['image'])) {
            $event['image'] = asset('storage/'.$gallery['image']);
        }

        $endDate = event_schema_iso_datetime($gallery['end_date'] ?? $gallery['endDate'] ?? null);

        if ($endDate !== null) {
            $event['endDate'] = $endDate;
        }

        $description = trim((string) ($gallery['description'] ?? ''));

        if ($description !== '') {
            $event['description'] = $description;
        }

        return $event;
    }
}
