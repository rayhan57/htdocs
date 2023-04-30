<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable {
    use HasFactory, AuthenticatableTrait;

    // protected $fillable = ['name', 'slug', 'email', 'password'];

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
