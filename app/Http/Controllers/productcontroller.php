<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_varient;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    //
    public function customRedirect($id, $varid)
    {

        $proid = product_varient::find($id);


        $varid = product_varient::find($varid);  //don't use this

        $productstock = ProductStock::select('*')->where('pro_ver_id', $proid->id)->first();
//@dd($productstock);
        $protbl_data = product::select('*')->where('id', $proid->product_id)->first();

        // dd($protbl_data);

        $varient_id = product_varient::select('*')->where('id', $proid->id)->first();

        // dd($varient_id );
        $varient = product_varient::select('*')->where('product_id', $proid->product_id)->get();

        // dd($varient);
        return view("pages.singleproduct", compact("proid", "varient", "varient_id", "productstock", 'protbl_data'));
    }

    public function sigleajaxdata(Request $request)
    {
        $varid = $request->input('varid');
        $varient_id = product_varient::select('*')->where('id', $varid)->first();

       return response()->json(['data' => $varient_id]);


    }



}
