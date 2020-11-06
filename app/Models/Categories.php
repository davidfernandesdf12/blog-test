<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Categories extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'id',
        'title',
        'slug'
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

    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'post_categories', 'category_id', 'post_id')->withTimestamps();;
    }
}
