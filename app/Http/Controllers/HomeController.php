<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\web_image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $banners = DB::table('web_images')->get();
        
        $category = DB::table('categories')->take(4)->get();
        $hotproducts = DB::table('product_varient')->take(6)->get();

        return view('pages.home',compact('banners','category','allproduct','hotproducts'));

    }
}
