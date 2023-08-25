<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentLike;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'parent_id',
        'author',
        'email',
        'text',
        'likes',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function hasBeenLikedByClient()
    {
        return $this->likes()->where('uuid', request()->cookie('anonymous_session'))->exists();
    }

}
