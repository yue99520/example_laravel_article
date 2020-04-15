<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    public function post($post)
    {
        return $this->posts()->save($post);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
