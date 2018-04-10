<?php

namespace App;

use cebe\markdown\GithubMarkdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'body'];
    protected $with = ['user', 'category'];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->update([
                'slug' => str_slug("p{$model->id}-{$model->name}")
            ]);
        });
    }

    public function path() {
        return "/post/{$this->slug}";
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class); 
    }

    public function getBodyAttribute($body)
    {
        return (new GithubMarkdown())->parse($body);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
