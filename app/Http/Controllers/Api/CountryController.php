<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country as CountryResource;
class CountryController extends Controller
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
        $countries= Country::all();
        return response()->json($countries);
    }   

    public function show($id)
    {
        //Find Country By ID
        $countries = Country::find($id);
        return response()->json($countries);
    }
}