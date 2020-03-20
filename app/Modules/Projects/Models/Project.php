<?php

namespace App\Modules\Projects\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Project extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'projects';

    protected $fillable = [
        'title', 'description', 'active', 'slug', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where($this->table . '.active', 1);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(238)
            ->height(168)
            ->sharpen(10)
            ->nonOptimized();

        $this->addMediaConversion('big')
            ->width(1036)
            ->height(533)
            ->sharpen(10)
            ->nonOptimized();
    }
}
