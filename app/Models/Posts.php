<?php

namespace App\Models;

use Illuminate\Cache\TaggableStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Posts extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory, HasSlug, HasTags;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'enabled',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'post_categories', 'post_id', 'category_id')->withTimestamps();;
    }
}
