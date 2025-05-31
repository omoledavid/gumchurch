<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sermon extends Model
{
    protected $fillable = [
        'topic',
        'series_id',
        'preacher',
        'description',
        'slug',
        'video',
        'audio',
        'image',
        'body',
        'thumbnail',
        'pdf_file',
        
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sermon) {
            $sermon->slug = Str::slug($sermon->topic) . '-' . uniqid();
        });
    }

    public function series()
    {
        return $this->belongsTo(Series::class);  // Assuming a sermon belongs to a series
    }
}
