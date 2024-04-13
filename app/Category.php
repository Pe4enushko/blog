<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = false;
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
