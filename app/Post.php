<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $appends = [
        'display_comments',
        'liker_names'
    ];

    protected $with = [
        'author',
    ];

    protected $withCount = [
        'comments',
        'likers'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function getCommentCountAttribute() // getCommentCountAttribute -> comment_count
    {
        return $this->comments()->count();
    }

    public function getDisplayCommentsAttribute()
    {
        return $this->comments()->latest()->take(5)->get();
    }

    public function getLikesCountAttribute()
    {
        return $this->likers()->count();
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'likes')->using(Like::class);
    }

    public function getLikerNamesAttribute()
    {
        return $this->likers()->get();
    }
}
