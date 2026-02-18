<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public static function get(string $key, ?string $default = null): ?string
    {
        return static::query()->where('key', $key)->value('value') ?? $default;
    }

    public static function setMany(array $items): void
    {
        foreach ($items as $key => $value) {
            static::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}

