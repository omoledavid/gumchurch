<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Series extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'no_episodes',
        'image'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($series) {
            $series->slug = Str::slug($series->name) . '-' . uniqid();
        });
    }
    public function sermons(): HasMany
    {
        return $this->hasMany(Sermon::class);
    }
}
