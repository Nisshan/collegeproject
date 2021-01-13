<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    public function images()
    {
        return $this->hasMany(Image::class, 'gallery_id');
    }
    public function post(){
        return $this->belongsToMany(Post::class,'gallery_post');
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
