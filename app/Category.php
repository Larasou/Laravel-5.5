<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = str_slug($category->name);
        });

        static::deleting(function ($category) {
            $category->posts->each->delete();
        });

    }


    public function posts() {
        return $this->hasMany(Post::class);
    }
}
