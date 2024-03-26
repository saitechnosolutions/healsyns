<?php

namespace App\Http\Controllers;

use App\Models\product_order;
use App\Models\product_order_user_adress;
use Illuminate\Http\Request;

class productOrdercontroller extends Controller
{
    //
    public function my_order_status($id){

        $order_id = product_order::select('*')->where('order_id', $id)->first();
        $product_address = product_order_user_adress::all();
        return view("pages.my_order_status", compact("order_id","product_address"));
    }
}
