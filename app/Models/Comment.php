<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
		'content', 'group_id' , 'user_id'
	];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
