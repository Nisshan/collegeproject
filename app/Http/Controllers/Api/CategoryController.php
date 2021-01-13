<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Category;
//use Debugger;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    
    public function index()
    {
        $categories = Category::orderBy('position')->get();
        return response()->json($categories);
        //lad($categories);
        //return Debugger::dump($categories);
        // return response()->json([
        //     Debugger::dump($categories)
        //     ]);
        //\
    }

    public function show($id)
    {
        $categories =  Category::find($id)->posts()->get();
        return response()->json($categories);
        // return response()->json([
        //     Debugger::dump($categories)
        //     ]);
    } 
    
    // Get Parent Category used by Home
    public function getParentCategory()
    {
        return Category::where('status',1)->where('parent_id',0)->orderBy('position')->get();
        // return response()->json([
        // Debugger::dump($categories)
        // ]); 
    }
    // Get Child Category By Parent Category ID used by CategoryNewsSection
    public function getChildCategory($parent_id)
    {
        return Category::where('status',1)->where('parent_id',$parent_id)->orderBy('position')->get(); 
    }
    
    //Get latest post by category name
    public function getPostByCategorySlug($slug)
    {
        $category_id = Category::where('slug',$slug)->pluck('id');
        //return $category_id;
        foreach ($category_id as $id) {
            //return $id;
            return Category::where('status',1)->find($id)->posts()->latest('created_at')->get();
        }    
    }
    // public function getCategoryByParentId($parent_id)
    // {
    //     return Category::where('status',1)->where('parent_id',$parent_id)->get(); 
    // }
    
    // //Get latest post by category id
    // public function getPostByCategoryId($id)
    // {
    //     return Category::where('status',1)->find($id)->posts()->latest('created_at')->take(4)->get(); 
    // }
    // public function getPostByCategoryId($id)
    // {
    //     return Category::find($id)->posts()->take(4)->get(); 
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return view('admin.categories.create');
    }

}
