<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    //Get State and Category List
    Route::apiResource('states','Api\StateController'); 
    Route::apiResource('country','Api\CountryController'); 
    Route::apiResource('category','Api\CategoryController'); 
    Route::apiResource('posts','Api\PostController'); 
    Route::apiResource('districts','Api\DistrictController'); 
    //Route::apiResource('user','Api\UserController'); 

    //CategoryController
    //Get Category By Id
    Route::get('/cate/{categoryid}','Api\CategoryController@show');

    //Get Parent Category 
    Route::get('/parentCategory','Api\CategoryController@getParentCategory');
    
    //Get Child Category 
    Route::get('/childCategory/{parent_id}','Api\CategoryController@getChildCategory');

    // Get only 4 Post By Category Id
    Route::get('/categoryPost/{category_id}','Api\CategoryController@getPostByCategoryId');

    // Get Post By Category Name
    Route::get('/postByCategoryName/{name}','Api\CategoryController@getPostByCategorySlug');
    
    //Post Controller 
    // Get BreakingNews
    Route::get('/getBreakingNews/','Api\PostController@getBreakingNews');

    // Get BreakingNews
    Route::get('/mainNewsByCategory/{cate_id}','Api\PostController@getMainNewsByCategory');
    
    // Get Post Image by post Slug
    Route::get('/postImage/{post_slug}','Api\PostController@getPostImage');
    
    // Get PinnedPosts by category Id
    Route::get('/pinnedPosts/{category_id}','Api\PostController@getPinnedNewsByCatId');
    
    // Get Post By Slug
    Route::get('/postBySlug/{slug}','Api\PostController@show');
    
    // Get Post By District Id
    //DistrictController
    // Get District By State id
    Route::get('/districtByStateId/{state_id}','Api\DistrictController@getDistrictByState');
    
    Route::get('/postByDistrict/{district_id}','Api\DistrictController@postByDistrictId');
    
    // Get Post By District name
    Route::get('/postByDistrictName/{name}','Api\DistrictController@postByDistrictName');
    
    // Get Latest Post By District Id
    Route::get('/latestPostByDistrictID/{district_id}','Api\DistrictController@latestPostByDistrictId');
    
    //StateController
    // Get State By id
    Route::get('/stateById/{id}','Api\StateController@show');
    
    // Get Post By State Id
    Route::get('/postByState/{state_id}','Api\StateController@getLatestStateNews');
    
    // Get State By slug
    Route::get('/stateByName/{slug}','Api\StateController@getStateByName');
    
    //CountryController
    // Get Country By Id
    Route::get('/country/{id}','Api\CountryController@show');
    
    //UserController
    // Get User By id
    Route::get('/getUserById/{id}','Api\UserController@show');
    
    // Get Latest WorldNews
    Route::get('/getLatestWorldNews/','Api\PostController@getLatestWorldNews');
    
    // Get category by Parent Id
    //Route::get('/categoryByParentId/{parent_id}','Api\CategoryController@getCategoryByParentId');
    
    // // Get latest 1 Post By Category Id
    // Route::get('/latestpost/{categoryid}','Api\PostController@getPostByCategoryId');
    
  // Get Posts DistrictId in Array
  // Route::get('/DistrictIdInPosts/{district_id}', function($district_id){
  //   return $districts = explode(',',App\Post::Select('district_id')->where('id',$district_id)->pluck('district_id'));
  //   // return $district = explode(',',$districts);
  //   //return $post = App\Post::where('district_id',$district)->get();
  // });
  //Get CategoryPost with enum Status 2
  //Route::get('/getCategoryMainPost/{id}','Api\CategoryPostController@getCategoryMainPost');
  
  //Get CategoryPost with enum Status 2
  //Route::get('/getCategoryNormalPost/{id}','Api\CategoryPostController@getCategoryNormalPost');
  
//Route::post('verifyLogin', 'Api\AuthController@login');//->name('verifyLogin');
//Route::resource('login','Api\AuthController');
//Auth::routes();
//Route::post('login', 'Api\AuthController@login')->name('login');
//Route::post('register', 'Api\AuthController@register')->name('register');
//Auth::routes();

//Auth::routes();

//Route::get('/stateByName/{name}', function($name){
  //  return $state = App\State::where('name', $name)->get(); 
//});0

//Route::get('/stateById/{id}', function($id){
//    return $state = App\State::where('id', $id)->firstOrFail(); 
//});
// Return Posts By Their District Id
//Route::get('/postByDistrict/{district_id}', function($district_id){
  //  return $postByDistrict = App\Post::where('district_id', $district_id)->get(); 
//});
// Get 6 Latest post 
//Route::get('/latestPostByDistrictID/{district_id}', function($district_id){
  //  $districts = App\Post::Select('district_id')->where('id',$district_id)->pluck('district_id')->toArray();
   // return $postByDistrict = App\Post::where('district_id', $districts)->latest('created_at')->take(6)->get(); 
//});
// Get Post By Category Id
//Route::get('/categoryPost/{postid}',function($id){
//    return App\Category::find($id)->posts()->take(4)->get();   
//});

//Get Post By Their Slug
//Route::get('/post/{slug}', function($slug){
//    return $post = App\Post::where('slug', $slug)->get(); 
//});

//Route::get('/latestpost/{categoryid}',function($id){
    //Using Pivot
    //Shows the Posts of Category with $id 
    //posts() is relation defined in Category model
  //  return App\Category::find($id)->posts()->latest('created_at')->take(1)->get();  
//});

//Route::get('/country/{id}', function($id){
  //  return $country = App\Country::where('id', $id)->get();
//});

//Route::get('/categoryByParentId/{parent_id}', function($parent_id){
  //  return $category = App\Category::where('parent_id',$parent_id)->get();
   // return $district = explode(',',$districts);
    //return $post = App\Post::where('district_id',$district)->get();
//});

// Get District By State Id
//Route::get('/districtByStateId/{state_id}', function($state_id){
//    return $district = App\District::where('state_id', $state_id)->get(); 
//});

// Get District By State Id
//Route::get('/districtByStateId/{state_id}', function($state_id){
  //  return $district = App\District::where('state_id', $state_id)->get(); 
//});

//Route::get('/cate/{categoryid}',function($id){
    //Using Pivot
    //Shows the Posts of Category with $id 
    //posts() is relation defined in Category model
  //  return App\Category::find($id)->posts()->get();   
//});   

// Get User By Their id,the user id will be stored in post
// which is created by that user
//This is used in PostAuthorDetails
//Route::get('/getUserById/{id}',function($id){
  //  return App\User::where('id', $id)->get();  
//});
/*
Auth::routes();

Route::group(['prefix'=> 'admin', 'middleware' => 'auth'], function(){

    Route::resource('countries','CountryController');
    Route::resource('states','StateController');
    Route::resource('districts','DistrictController');
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');
    Route::resource('galleries','GalleryController');

});

Route::resource('news','NewsController');

//Route::get('dropdownlist','DynamicDependent@index');
Route::get('get-state-list','DistrictController@getStateList');
Route::get('getDistrictList','HomeController@getDistrictList');

//Route::post('getStateID', 'NewsController@getStateID')->name('getState');
//Route::post('getSingleNews', 'NewsController@getSingleNews')->name('getSingleNews');
Route::get('getStateList','HomeController@getStateList');
Route::get('/single-news/{id}', 'newsController@singleNewsInfo');
Route::get('/category-news/{id}', 'newsController@categoryNewsInfo');
Route::get('/state-news/{id}', 'newsController@StateNews');
Route::get('/district-news/{id}', 'newsController@DistrictNews');
// Get Data

Route::group(['middleware' => 'auth','prefix' => 'dataset'], function () {
    // User needs to be authenticated to enter here.
    Route::get('getCategory', 'CategoryController@getCategory');
    Route::get('getCountry', 'CountryController@getCountry');
    Route::get('getGallery', 'GalleryController@getGallery');
    Route::get('getDistrict', 'DynamicDependent@getDistrict');
    Route::get('getState', 'StateController@getState');
    Route::get('getPosts', 'PostController@getPosts');

});
*/