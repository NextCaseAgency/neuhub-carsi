<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
class Translation extends Model
{
    protected $fillable = [
        'key',
        'value',
        'lang',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            $filePath = __DIR__ . "/../../lang/$model->lang/page.php";

            if (File::exists($filePath)) {
                $translations = include $filePath;

                $translations[$model->key] = $model->value;
                $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";
                File::put($filePath, $content);
            }
        });
    }
}
