<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    public $fillable =['post_id','status'];
    use SoftDeletes;
    protected $dates=['deleted_at'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
