<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'name', 'slug', 'email', 'firstname', 'lastname', 'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            User::first()->update([
                'rank_id' => 6,
                'title' => 'Prof.',
                'name' => 'Larasou',
                'email' => 'contact@larasou.com'
            ]);
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rank()
     {
         return $this->belongsTo(Rank::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function comments() {
        return $this->hasMany(Comment::class); 
    }
}
