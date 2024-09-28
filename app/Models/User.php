<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function avatar()
    {
        return $this->hasOne(Avatar::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postThroughCategory()
    {
        return $this->hasOneThrough(Post::class, Category::class);
    }

    public function postssssThroughCategory()
    {
        return $this->hasManyThrough(Post::class, Category::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
