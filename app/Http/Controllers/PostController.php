<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Hash;
use App\PostImage;
use App\District;
use App\Post;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts()
    {
        return Datatables::of(Post::query())->addColumn('action', function ($post) {
            return '
             <div class="btn-group">
                <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a type="button" href="' . route('posts.show', [$post->id]) . '" >View</a></li>
                    <li><a type="button" href="' . route('posts.edit', [$post->id]) . '">Edit</a></li>
                    <li class="divider"></li>
                    <li><a class="delete" type="button" href="' . route('posts.destroy', [$post->id]) . '">Delete</a></li>
                </ul>
            ';
        })
            ->make(true);
    }

    public function index()
    {
        $user = auth()->user()->getAllPermissions()->count();
        if ($user > 0) {
            $data['posts'] = Post::all();
            return view('admin.posts.index')->with($data);
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('create post')) {
            $data['districts'] = District::all();
            $data['states'] = DB::table("states")->pluck("name", "id");
            $data['categories'] = DB::table("categories")->pluck("name", "id");
            $data['countries'] = DB::table("countries")->pluck("name", "id");
            return view('admin.posts.create')->with($data);
        } else {
            flash(__('you are not authorized to create post'));
            return view('admin.posts.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function extractKeyWords($string)
    {
        mb_internal_encoding('UTF-8');
        $stopwords = array();
        $string = preg_replace('/[\pP]/u', '', trim(preg_replace('/\s\s+/iu', '', mb_strtolower($string))));
        $matchWords = array_filter(explode(' ', $string), function ($item) use ($stopwords) {
            return !($item == '' || in_array($item, $stopwords) || mb_strlen($item) <= 2 || is_numeric($item));
        });
        $wordCountArr = array_count_values($matchWords);
        arsort($wordCountArr);
        return array_keys(array_slice($wordCountArr, 0, 10));
    }

    public function store(Request $request)
    {
        $status = $request->status;
        $image = explode(",", $request->images);
        $tag= explode(',',$request->tags);

        foreach ($tag as $t){
            $ta[] = $t;
        }

        $imageList = [];
        foreach ($image as $i) {
            $imageList[] = parse_url($i)['path'];
        }

        $covers = explode(',', $request->cover);
        $coverlist = [];
        foreach ($covers as $c) {
            $coverlist[] = parse_url($c)['path'];
        }

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:100'
        ]);
        $post = new Post;
        $post->cover = parse_url($c)['path'];
        $post->title = trim($request->title);
        $post->description = trim($request->description);
        $post->slug = str_slug($post['title'], '-');
        do {
            $validatedSlug = Post::where('slug', $post->slug)->first();
            if ($validatedSlug) {
                $post->slug = str_slug($post->slug . ' ' . rand());
            }
        } while ($validatedSlug);
        $post->keywords = implode(',', $this->extractKeyWords($post['description']));
        $post->meta_description = strip_tags(str_limit(trim($post['description']), 200));
        $post->user_id = auth()->id();
        $post->save();

        $district = District:: find($request->district_id);
        $post->districts()->attach($district);

        $category = Category::find($request->category_id);
        $post->category()->attach($category);

        $imageModel = [];
        foreach ($imageList as $image) {
            $imageModel[] = [
                "post_id" => $post->id,
                "image" => $image
            ];
        }

        foreach ($ta as $hash){
            $hashs[]= [
                'post_id' => $post->id,
                'hash' =>$hash,
            ];
        }

        foreach ($status as $stat ){
            $statuss[] = [
                'post_id' => $post->id,
                'status' => $stat,
            ];
        }
        $post->images()->createMany($imageModel);
        $post->hashs()->createMany($hashs);
        $post->statuss()->createMany($statuss);

        flash('Post Created Successfully')->success();
        return redirect()->action('PostController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->hasPermissionTo('view post')) {

            $data['images'] = [];
            $data['post'] = Post::with('images')->find($id);
            $images = $data['post']->images;
            foreach ($images as $image) {
                array_push($data['images'], $image->image);
            }
            $data['images'] = implode(',', $data['images']);
            $data['stat'] = Post::with('statuss')->find($id);
            return view('admin.posts.view')->with($data);
        } else {
            flash(__('you are not authorized to view post Details'));
            return view('admin.posts.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->hasPermissionTo('edit post')) {
            //status checking to check in checkbox
            $data['status'] = Post::with('statuss')->find($id);
            $data['statu']=$data['status']->statuss->pluck('status');
            $data['stats'] =[];
            foreach ($data['statu'] as $sta){
                array_push($data['stats'],$sta);
            }
//select2 populate
            $data['posts'] = Post::find($id);
            $data['categories'] = Category::all();
            $data['categs'] = [];
            $catego = $data['posts']->category->pluck('id');

            foreach ($catego as $cats){
                array_push($data['categs'],$cats);
            }

//tags processing to show in form
            $data['tags'] = Post::with('hashs')->find($id);
            $tags = $data['tags']->hashs;
            $data['tagg'] = [];
            foreach ($tags as $tag){
                array_push($data['tagg'],$tag->hash) ;
            }
            $data['taggs'] = implode(',',$data['tagg']);

//image path extract
            $data['images'] = [];
            $data['post'] = Post::with('images')->find($id);
            $images = $data['post']->images;
            foreach ($images as $image) {
                array_push($data['images'], $image->image);
            }
            $data['images'] = implode(',', $data['images']);

            $data['districts'] = District::all();
            $data['states'] = DB::table("states")->pluck("name", "id");
//            $data['categories'] = DB::table("categories")->pluck("name", "id");
            $data['countries'] = DB::table("countries")->pluck("name", "id");
            return view('admin.posts.edit')->with($data);
        } else {
            flash(__('you are not authorized to edit post'));
            return view('admin.posts.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image = explode(",", $request->images);
        $imageList = [];
        foreach ($image as $i) {
            $imageList[] = parse_url($i)['path'];
        }
        $images = implode(',', $imageList);
        $covers = explode(',', $request->cover);
        $coverlist = [];
        foreach ($covers as $c) {
            $coverlist[] = parse_url($c)['path'];

        }
        $post = Post::find($id);

        foreach ($post->statuss as $status){
            $status->delete();
        }
        $status = $request->status;

        $post = Post::find($id);
        foreach ($post->images as $image) {
            $image->delete();
        }
        foreach ($post->hashs as $hash){
            $hash->delete();
        }
        $post->cover = parse_url($c)['path'];
        $post->title = trim($request->title);
        $post->description = trim($request->description);
//        $post->slug =$request->slug;
//        $post->status = $request->status;
        $post->keywords = $request->keywords;
//            implode(',', $this->extractKeyWords($post['description']));
        $post->meta_description = strip_tags(str_limit(trim($post['description']), 200));
        $post->save();

        $category = Category::find($request);
        $post->category()->sync($category);

        $district = District:: find($request->district_id);
        $post->districts()->sync($district);

        $imageModel = [];
        foreach ($imageList as $image) {
            $imageModel[] = [
                "post_id" => $post->id,
                "image" => $image
            ];
        }
        $tag= explode(',',$request->tags);

        foreach ($tag as $t){
            $ta[] = $t;
        }
        foreach ($ta as $hash) {
            $hashs[] = [
                'post_id' => $post->id,
                'hash' => $hash,
            ];
        }
        foreach ($status as $stat ){
            $statuss[] = [
                'post_id' => $post->id,
                'status' => $stat,
            ];
        }
        $post->images()->createMany($imageModel);
        $post->hashs()->createMany($hashs);
        $post->statuss()->createMany($statuss);


        flash('Post Edited Successfully')->success();
        return redirect()->action('PostController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->hasPermissionTo('delete post')) {
            $post = Post::find($id);
            if (!$post) {
                flash('Unable to Find Post')->error();
                return response()->json([
                    "error" => true,
                    "message" => 'Post does not exist'
                ], 400);
            }
            $delete = $post->delete();
            if ($delete) {
                flash('Post Deleted Successfully')->success();
                return response()->json([
                    'error' => false,
                    "message" => 'Deleted Successfully'
                ], 200);

            } else {
                flash('Post cannot be Deleted')->error();
                return response()->json([
                    'error' => true,
                    'message' => "Post cannot be deleted"
                ], 400);

            }
        } else {
            flash(__('you are not authorized to Delete Post'));
            return view('admin.posts.index');
        }
    }

    public function todaypost(){
        if (auth()->user()->hasPermissionTo('view post')) {
        $data['posts'] = Post::where('created_at', '>=', Carbon::today()->toDateString())->get();
        return view('admin.posts.todaypost')->with($data);
        }
        else {
            flash(__('you are not authorized to Delete Post'));
            return view('admin.posts.index');
        }
    }

    public function breakingnews(){
        if (auth()->user()->hasPermissionTo('view post')) {
            $data['posts'] = Post::with('statuss')->where('created_at', '>=', Carbon::today()->toDateString())->get();
            return view('admin.posts.breakingnews')->with($data);
        }
        else {
            flash(__('you are not authorized to Delete Post'));
            return view('admin.posts.index');
        }

    }

}
