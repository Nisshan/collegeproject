<?php

namespace App\Http\Controllers;


use App\Gallery;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGallery()
    {
        return Datatables::of(Gallery::query())->addColumn('action', function ($gallery) {
            return '
                <div class="btn-group">
                    <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a type="button" href="' . route('galleries.show', [$gallery->id]) . '" >View</a></li>
                    <li><a href="' . route('galleries.edit', [$gallery->id]) . '">Edit</a></li>
                    <li class="divider"></li>
                    <li ><a class="delete" href="' . route('galleries.destroy', [$gallery->id]) . '">Delete</a></li>
                </ul>
             </div>
            ';
        })
            ->make(true);
    }

    public function index()
    {
        $user = auth()->user()->getAllPermissions()->count();
        if ($user > 0) {
            $data['galleries'] = Gallery::get();
            return view('admin.galleries.index')->with($data);
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
        if (auth()->user()->hasPermissionTO('create gallery')) {
            $data['posts'] = Post::all();
            return view('admin.galleries.create')->with($data);
        } else {
            flash(__('you are not authorized to create Gallery'));
            return redirect()->route('GalleryController@index');
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

        $image = explode(",", $request->images);
        $imageList = [];
        foreach ($image as $i) {
            $imageList[] = parse_url($i)['path'];
        }

        $covers = explode(',', $request->cover);
        $coverlist = [];
        foreach ($covers as $c) {
            $coverlist[] = parse_url($c)['path'];

        }
        $gallery = new Gallery;
        $gallery->cover = parse_url($c)['path'];;
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->slug = str_slug($gallery['title'], '-');
        do {
            $validatedSlug = Gallery::where('slug', $gallery->slug)->first();
            if ($validatedSlug) {
                $gallery->slug = str_slug($gallery->slug . ' ' . rand());
            }
        } while ($validatedSlug);
        $gallery->keywords = strip_tags(implode(',', $this->extractKeyWords($gallery['description'])));
        $gallery->meta_description = strip_tags(str_limit(trim($gallery['description']), 200));
        $gallery->user_id = auth()->id();

        $gallery->save();

        $imageModel = [];
        foreach ($imageList as $image) {
            $imageModel[] = [
                "gallery_id" => $gallery->id,
                "url" => $image
            ];
        }
        $post = Post::find($request->post_id);
        $gallery->post()->attach($post);

        $gallery->images()->createMany($imageModel);

        flash('Gallery Name Created Successfully')->success();
        return redirect()->action("GalleryController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->hasPermissionTo('view gallery')) {
            $data['images'] = [];
            $data['gallery'] = Gallery::with('images')->find($id);
            $images = $data['gallery']->images;
            foreach ($images as $image) {
                array_push($data['images'], $image->url);
            }
            $data['images'] = implode(',', $data['images']);

            return view('admin.galleries.view')->with($data);
        } else {
            flash(__('you are not authorized to view Gallery data'));
            return redirect()->action('GalleryController@index');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (auth()->user()->hasPermissionTo('edit gallery')) {
            $data['posts'] = Post::all();
            $data['gall'] =Gallery::find($id);
            $data['images'] = [];
            $tagpost = $data['gall']->post->pluck('id');
            $data['postss'] = [];
            $data['gallery'] = Gallery::with('images')->find($id);
            $images = $data['gallery']->images;

            foreach ($images as $image) {
                array_push($data['images'], $image->url);
            }
            $data['images'] = implode(',', $data['images']);
            //populate select2

            foreach ( $tagpost as $postgallery){
                array_push($data['postss'],$postgallery) ;
            }

            return view('admin.galleries.edit')->with($data);
        } else {
            flash(__('you are not authorized to edit Gallery data'));
            return view('admin.galleries.index');
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
        $gallery = Gallery::find($id);
        foreach ($gallery->images as $image) {
            $image->delete();
        }
        $image = explode(",", $request->images);
        $imageList = [];
        foreach ($image as $i) {
            $imageList[] = parse_url($i)['path'];
        }
        $covers = explode(',', $request->cover);
        $coverlist = [];
        foreach ($covers as $c) {
            $coverlist[] = parse_url($c)['path'];

        }
        $gallery->cover = implode(',', $coverlist);
        $gallery->title = $request->title;
        $gallery->description = $request->description;
//        $gallery->slug =$request->slug;
        $gallery->keywords = strip_tags($request->keywords);
        $gallery->meta_description = strip_tags(str_limit(trim($request->meta_description, 200)));
//        $gallery->user_id = auth()->id();
        $gallery->save();

        $imageModel = [];
        foreach ($imageList as $image) {
            $imageModel[] = [
                "gallery_id" => $gallery->id,
                "url" => $image
            ];
        }
        $post = Post::find($request->post_id);
        $gallery->post()->sync($post);

        $gallery->images()->createMany($imageModel);

        flash('Gallery Name Updated Successfully')->success();
        return redirect()->action("GalleryController@index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->hasPermissionTO('delete gallery')) {
            $gallery = Gallery::find($id);
            if (!$gallery) {
                flash(__('Unable to Find Gallery'))->error();
                return response()->json([
                    "error" => true,
                    "message" => 'Gallery does not exist'
                ], 400);
            }
            $delete = $gallery->delete();
            if ($delete) {
                flash(__('Gallery Deleted Successfully'))->success();
                return response()->json([
                    'error' => false,
                    "message" => 'Deleted Successfully'
                ], 200);

            } else {
                flash('Gallery cannot be Deleted')->error();
                return response()->json([
                    'error' => true,
                    'message' => "Gallery cannot be deleted"
                ], 400);

            }
        } else {
            flash(__('you are not authorized to delete Gallery'));
            return redirect()->action("GalleryController@index");
        }
    }
}
