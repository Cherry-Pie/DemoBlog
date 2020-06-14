<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Yaro\Jarboe\Pack\Image;

class Post extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'preview_image',
        'is_published',
        'published_at',
        'sort_weight',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'preview_image' => 'array',
    ];

    protected $dates = [
        'published_at',
    ];

    public $translatable = [
        'title',
        'content',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('sort_weight');
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDescriptionAttribute($value)
    {
        return mb_strimwidth(strip_tags($this->content), 0, 80, '...');
    }

    public function getPreviewAttribute($value)
    {
        return new Image($this->preview_image);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
