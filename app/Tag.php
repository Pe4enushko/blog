<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = false;
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany(Post::class);
    }
}
