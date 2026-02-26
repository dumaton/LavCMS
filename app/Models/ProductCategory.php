<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    public const TYPE_EQUIPMENT = 'equipment';
    public const TYPE_CHEMISTRY = 'chemistry';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'svg_icon',
        'description',
        'type',
        'show_on_home',
        'is_active',
        'sort_order',
    ];

    public static function typeOptions(): array
    {
        return [
            self::TYPE_EQUIPMENT => 'Промышленное оборудование',
            self::TYPE_CHEMISTRY => 'Промышленная химия',
        ];
    }

    public function getTypeLabelAttribute(): ?string
    {
        return self::typeOptions()[$this->type] ?? $this->type;
    }

    protected $casts = [
        'show_on_home' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function scopeShowOnHome(Builder $query): Builder
    {
        return $query->where('show_on_home', true);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

