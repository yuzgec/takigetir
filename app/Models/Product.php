<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia,Viewable
{
    use HasFactory,SoftDeletes,InteractsWithMedia,LogsActivity,InteractsWithViews;

    protected $guarded = [];
    protected $table = 'products';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug', 'price']);
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getCategory(){
        return $this->hasOne(ProductCategoryPivot::class);
    }

    public function getComment(){
        return $this->belongsTo(Comment::class, 'id', 'product_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('img')
            ->width(750)
            ->nonOptimized();

        $this->addMediaConversion('thumb')
            ->width(400)
            ->nonOptimized();

        $this->addMediaConversion('small')
            ->width(150)
            ->nonOptimized();
    }
}
