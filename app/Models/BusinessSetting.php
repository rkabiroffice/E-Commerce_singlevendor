<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    protected $fillable = ['type', 'value', 'lang'];

    public static function valueOf(string $type, mixed $default = null, ?string $lang = null): mixed
    {
        $query = static::query()->where('type', $type);

        if ($lang !== null) {
            $query->where('lang', $lang);
            $setting = $query->first();

            if ($setting === null) {
                $setting = static::query()->where('type', $type)->first();
            }
        } else {
            $setting = $query->first();
        }

        return $setting ? $setting->value : $default;
    }
}
