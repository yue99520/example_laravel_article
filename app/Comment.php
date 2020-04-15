<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use MorphComment;

    use MorphLike;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
