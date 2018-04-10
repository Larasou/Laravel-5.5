<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $with = ['user', 'post'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
           $comment->user_id  = auth()->id();
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
