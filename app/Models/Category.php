<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'color_hex',
    ];

    public $translatable = [
        'title',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
