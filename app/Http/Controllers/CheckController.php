<?php

namespace App\Http\Controllers;

use App\Models\product_varient;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CheckController extends Controller
{

    public function singlproData(Request $request)
    {
       $prodetails = $request->all();

    // dd($prodetails);

    Session::put('prodetails', $prodetails);
        return view('pages.checkout',compact("prodetails"));
    }

}
