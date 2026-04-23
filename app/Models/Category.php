<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function($category) {
            // auto-generate slug if empty
            if (empty($category->slug)){
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}
