<?php


namespace App;


trait MorphComment
{
    //post a comment under this commentable object
    public function comment($comment)
    {
        $this->comments()->attach($comment);
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, "commentable")->withTimestamps();
    }
}
