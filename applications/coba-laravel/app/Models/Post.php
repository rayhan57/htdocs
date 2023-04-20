<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['user', 'category'];

    public function scopeFilter($query, array $filters) {
        if (isset($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        }
        if (isset($filters['category'])) {
            $category = $filters['category'];
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        }
        if (isset($filters['user'])) {
            $user = $filters['user'];
            $query->whereHas('user', function ($query) use ($user) {
                $query->where('slug', $user);
            });
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
