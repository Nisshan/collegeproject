<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Http\Controllers\Controller;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $categoryByNewsId = Post::find($id)->category;
        return response()->json($categoryByNewsId);
        
    }
    
    public function getLatestPost($id){
        $results = Post::latest('datetime')->first();
        return response()->json($results);
    }

    // Get CategoryPost with enum Status 2
    public function getCategoryNormalPost($id){
       // Category::find($id)->posts()->take(4)->get(); 
        $results = Category::find($id)->posts()->latest('created_at')->get()->where('status',2);
        return response()->json($results);
    }

    // Get CategoryPost with enum Status 2
    public function getCategoryMainPost($id){
        // Category::find($id)->posts()->take(4)->get(); 
         $results = Category::find($id)->posts()->latest('created_at')->get()->where('status',1);
         return response()->json($results);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
