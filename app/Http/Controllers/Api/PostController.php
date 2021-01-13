<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\District;
use App\Status;
use App\PostView;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $posts = Post::all();   
        return response()->json($posts);
        //$posts = Post::where('w',$id)->get();
        //return response()->json($posts);
    }
    
    // Get Post By their Slug
    public function show($slug)
    {   
        $posts =  Post::where('slug',$slug)->get();
        return response()->json($posts); 
    }
    
    //Get Post Image
    public function getPostImage($slug)
    {
        $postId = Post::where('slug',$slug)->pluck('id');
        //return $postId;
        foreach($postId as $id){
            return Post::where('deleted_at', null)->find($id)->images()->get();
        }
    }

    public function getBreakingNews()
    {   
        //$postId returns post id in status with status 2
        //return 2;
        $postId = Status::where('status',3)->latest('created_at')->take(4)->pluck('post_id');
        //return $postId;
        return Post::whereIn('id', $postId)->latest('created_at')->get();
        
    }

    public function getPinnedNewsByCatId($id)
    {   
        //$postId returns post id in status with status 5
        $postId = Status::where('status',6)->pluck('post_id');
        return Category::where('deleted_at',null)->find($id)->posts()->whereIn('post_id', $postId)->latest('created_at')->get();
    }

    public function getMainNewsByCategory($id)
    {   
        //$postId returns post id in status with status 4
        $postId =  Status::where('status',5)->pluck('post_id');
        return Category::where('deleted_at',null)->find($id)->posts()->whereIn('post_id', $postId)->latest('created_at')->take(1)->get();
    }
    // public function getLatestWorldNews()
    // {
    //     //$district_id = District::where()
    //     return Post::where('district_id','!=', 1)
    //     ->where('district_id','!=', 2)
    //     ->where('district_id','!=', 3)
    //     ->where('district_id','!=', 4)
    //     ->latest('created_at')->take(6)
    //     ->orWhereNull('district_id')->get(); 
    // }
    
    
}
