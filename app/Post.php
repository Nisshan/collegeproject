<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category(){
        return $this->belongsToMany(Category::class,'category_post');
    }
    public function districts(){
        return $this->belongsToMany(District::class,'district_post');
    }
    public function images(){
        return $this->hasMany(PostImage::class);
    }
    public function hashs(){
        return $this->hasMany(Hash::class);
    }
    public function event(){
        return $this->belongsToMany(Event::class,'event_post');
    }
    public  function statuss(){
        return $this->hasMany(Status::class,'post_id');
    }
    public function gallery(){
        return $this->belongsToMany(Gallery::class,'gallery_post','gallery_id');
    }

    use SoftDeletes;
    protected $dates=['deleted_at','event_id'];
}
