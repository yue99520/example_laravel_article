<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use MorphComment;

    //拿到一個commentable物件（上層）
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
