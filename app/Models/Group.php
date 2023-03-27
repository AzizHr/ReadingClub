<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $withCount = ['members'];

    protected $fillable = [
        'name', 'image', 'user_id', 'book_id'
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, Member::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function isJoined(): Attribute
    {
        return new Attribute(function () {
            return $this->members()->where('user_id', auth()->user()->id)->exists();
        });
    }

    public function isOwner(): Attribute
    {
        return new Attribute(function () {
            return $this->user()->where('id', auth()->user()->id)->exists();
        });
    }


    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
}
