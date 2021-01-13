<?php

namespace App\Http\Controllers;

use App\Post;
use App\Status;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user() ->getAllPermissions()->count();

        if($user > 0){
            $data['posts'] = Post::all();
            $data['last'] = Post::orderBy('id', 'desc')->paginate(5);
            $data['tpost'] = Post::where('created_at', '>=', Carbon::today()->toDateString());
            
            $postId =  Status::where('status','2')->pluck('post_id');
            $data['breakingNews'] = Post::where('deleted_at',null)->whereIn('id', $postId)->take(4)->latest('created_at', '>=', Carbon::today()->toDateString())->get();
            $data['bnews'] =  Post::where('deleted_at',null)->whereIn('id', $postId)->where('created_at', '>=', Carbon::today()->toDateString())->get();

            //$data['status'] = Post::where('created_at', '>=', Carbon::today()->toDateString())->where('status',1)->paginate(5);
            $data['todaypost'] = Post ::where('created_at', '>=', Carbon::today()->toDateString());
            //return $data['status'];
            return view('dashboard')->with($data);
        }
        else
        {
            return redirect()->route('home');
        }
    }

}
