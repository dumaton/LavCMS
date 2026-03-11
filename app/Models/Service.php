<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'icon',
        'sort_order',
    ];

    public const TYPE_CRIMINAL = 'criminal';
    public const TYPE_CIVIL = 'civil';

    public static function typeOptions(): array
    {
        return [
            self::TYPE_CRIMINAL => 'Уголовные дела',
            self::TYPE_CIVIL => 'Гражданские дела',
        ];
    }

    public function getTypeLabelAttribute(): ?string
    {
        return self::typeOptions()[$this->type] ?? $this->type;
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}

