<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//If not Prefix Can't Login
Route::group(['prefix'=> 'admin'] ,function(){
    Auth::routes();
    //resources route for controller in admin pannel
    Route::group(['middleware' => 'auth' ], function(){
    // admin routes 
    Route::get('/dashboard','DashboardController@index')->name('dashboard')->middleware('auth');

        // Used for Create,Edit,Update,Delete...
        Route::resource('countries','CountryController');
        Route::resource('states','StateController');
        Route::resource('districts','DistrictController');
        Route::resource('categories','CategoryController');
        Route::resource('posts','PostController');
        Route::resource('galleries','GalleryController');
        Route::resource('roles','RoleController',['except'=> ['destroy']]);
        Route::resource('permissions','PermissionController',['only' => ['index', 'show']]);
        Route::resource('users','UserController',['except'=> ['destroy']]);
        Route::resource('events','EventController');
        Route::resource('pages','PageController');
        
        // Used for by AJAX for Dynaminc Dropdown
        Route::get('get-state-list','DistrictController@getStateList');
        Route::get('getDistrictList','DistrictController@getDistrictList');
        
        //position route used By category.index
        Route::post('categories/index', 'CategoryController@updateOrder')->name('orderupdate');
        //Route::post('categories','CategoryController@updateOrder')->name('sort');
        
        //testing news count
        Route::get('news','NewsViewController@index')->name('newsindex');
        Route::get('breakingnews', 'PostController@breakingnews')->name('breakingnews');
        Route::get('show/{slug}','NewsViewController@show')->name('newsview');
        Route::get('todaypost', 'PostController@todaypost')->name('todayposts');

        
        //Used By Datatables
        Route::get('getCategory', 'CategoryController@getCategory');
        Route::get('getCountry', 'CountryController@getCountry');
        Route::get('getGallery', 'GalleryController@getGallery');
        Route::get('getDistrict', 'DynamicDependent@getDistrict');
        Route::get('getState', 'StateController@getState');
        Route::get('getPosts', 'PostController@getPosts');
        Route::get('getRoles', 'RoleController@getRoles');
        Route::get('getUsers', 'UserController@getUsers');
        Route::get('getEvents','EventController@getEvents');
        Route::get('getPages', 'PageController@getPages');
    });
});

//ajax controller
//Route::get('dropdownlist','DynamicDependent@index');
//Route::get('get-state-list','DynamicDependent@getStateList');
//Route::get('/','HomeController@index');

//Route::get('/home', 'HomeController@index')->name('home');

// Data tables
// Route::group(['middleware' => 'auth','prefix' => 'dataset'], function () {
//         
// User needs to be authenticated to enter here.
//});
