<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'description', 'author', 'is_archived', 'category_id'
    ];

    protected $withCount = ['likes', 'dislikes', 'favourites'];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function isLiked(): Attribute
    {
        return new Attribute(function () {
            return $this->likes()->where('user_id', auth()->user()->id)->exists();
        });
    }

    public function isDisliked(): Attribute
    {
        return new Attribute(function () {
            return $this->dislikes()->where('user_id', auth()->user()->id)->exists();
        });
    }

    public function isInFavourites(): Attribute
    {
        return new Attribute(function () {
            return $this->favourites()->where('user_id', auth()->user()->id)->exists();
        });
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhereHas('category', function ($query) use ($filters) {
                        $query->where('name', 'like', '%' . $filters['search'] . '%');
                    });
            });
        }
    }
}
