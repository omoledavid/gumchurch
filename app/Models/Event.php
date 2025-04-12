<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'location',
        'start_date',
        'end_date',
        'thumbnail',
        'image',
        'content',
        'is_recurring',
        'status',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->slug = Str::slug($event->title) . '-' . uniqid();
        });
    }

    // Scope for upcoming events
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now())->where('status', 'upcoming');
    }
}
