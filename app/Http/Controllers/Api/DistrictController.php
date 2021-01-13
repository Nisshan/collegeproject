<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\District;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();
        return response()->json($districts);
    }

    public function getDistrictByState($state_id){
        $district = District::where('state_id', $state_id)->get(); 
        return response()->json($district);
    }

    public function postByDistrictName($slug)
    {
        $district_id = District::where('slug',$slug)->pluck('id');//->toArray();
        
        foreach ($district_id as $id) { 
            return District::where('deleted_at', null)->find($id)->posts()->latest('created_at')->get();
        }
        //return response()->json($postByDistrict); 
    }

     //Get Post By District Id
     public function postByDistrictId($district_id)
     {
         $postByDistrict = Post::where('district_id', $district_id)->get();
         return response()->json($postByDistrict); 
     }
    // Latest Post By District Id
    public function latestPostByDistrictId($district_id)
    {   
        //Select Post $district_id
        $districts = Post::Select('district_id')->where('id',$district_id)->pluck('district_id')->toArray();
        //Retun Post by 
        return $postByDistrict = Post::where('district_id', $districts)->latest('created_at')->take(4)->get(); 
    }
}
