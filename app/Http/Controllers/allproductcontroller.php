<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_varient;
use App\Models\productslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class allproductcontroller extends Controller
{
    public function getAllVariants()
    {

        $allProducts = Product::select("id")->get()->toArray();

        $productVariants = product_varient::get()->groupBy("product_id");
      
        $products = collect();


        foreach ($allProducts as $product) {
            $productId = $product['id'];

            // Check if the product has variants
            if ($productVariants->has($productId)) {
                // Get the first product variant for the current product
                $firstProductVariant = $productVariants[$productId]->first();

                // Add it to the collection
                $products->push($firstProductVariant);
            }
        }

        return view('ajaxpages.hotdeal', ['products' => $products]);
    }
    public function getCategory(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $filters = $request->input('checkedValues'); // Assuming checkedValues is an array

        $products = product_varient::where('categoryid', $categoryId);


        if($filters) {
            foreach ($filters as $key => $filter) {
                if (!empty($filter) && $filter == 3) {
                    $products->where('hot_deals', 1);
                }

                if (!empty($filter) && $filter == 4) {
                    $products = DB::table('product_varient')->orderBy('id', 'desc')->limit(5);
                }

                if (!empty($filter) && $filter == 1) {
                    $products = DB::table('product_varient')
                    ->join(
                        DB::raw('(SELECT product_varient_id, COUNT(product_varient_id) as count
                                FROM product_slots
                                GROUP BY product_varient_id
                                HAVING count >= 2) as counts'),
                        'product_varient.id', '=', 'counts.product_varient_id'
                    )
                    ;
                }

            }
        }

        $allProducts = Product::select("id")->where('category_id', $categoryId)->get()->toArray();

        $products = $products->get()->groupBy("product_id");

        $finalProducts = collect();




        foreach ($allProducts as $product) {
            $productId = $product['id'];

            // Check if the product has variants
            if ($products->has($productId)) {
                // Get the first product variant for the current product
                $firstProductVariant = $products[$productId]->first();

                // Add it to the collection
                $finalProducts->push($firstProductVariant);
            }
        }

        if ($finalProducts->count() == 0) {
            return view('ajaxpages.nodata');
            }

        return view('ajaxpages.hotdeal', ['products' => $finalProducts]);
    }


public function hotdeal(Request $request){

    $checkboxValues = $request->input('option');


    if (in_array('3', $checkboxValues)) {
        $products = DB::table('product_varient')->where('hot_deals', 1)->get();
    } elseif (in_array('4', $checkboxValues)) {
        $products = DB::table('product_varient')->orderBy('id', 'desc')->limit(5)->get();
    } elseif (in_array('1', $checkboxValues)) {
        $products = DB::table('product_varient')
            ->join(
                DB::raw('(SELECT product_varient_id, COUNT(product_varient_id) as count
                        FROM product_slots
                        GROUP BY product_varient_id
                        HAVING count >= 2) as counts'),
                'product_varient.id', '=', 'counts.product_varient_id'
            )
            ->get();
    } else {
        $products = DB::table('product_varient')->get();
    }

    $finalProductIds = collect();
    $result = collect();

    foreach ($products as $product) {
        $product_id = $product->product_id;

        if (!$finalProductIds->contains($product_id)) {
            $finalProductIds->push($product_id);
            $result->push($product);
        }
    }

    if ($result->count() == 0) {
    return view('ajaxpages.nodata');
    }

    return view('ajaxpages.hotdeal', ['products' => $result]);

}



public function pricefilter(Request $request)
{
    // Get inputs from the request
    $min_num = $request->input("min_num");
    $max_num = $request->input("max_num");
    $checkboxValues = $request->input('checkedValues');
    $categoryId = $request->input('categoryId');


   // Apply additional filters based on checkbox values
    if ($checkboxValues !== null) {
        if (in_array('3', $checkboxValues)) {
            $products = product_varient::where('hot_deals', 1)->get();
        } elseif (in_array('4', $checkboxValues)) {
            $products = product_varient::orderBy('id', 'desc')->limit(5)->get();
        } elseif (in_array('1', $checkboxValues)) {
            $products = DB::table('product_varient')
                ->join(
                    DB::raw('(SELECT product_varient_id, COUNT(product_varient_id) as count
                            FROM product_slots
                            GROUP BY product_varient_id
                            HAVING count >= 2) as counts'),
                    'product_varient.id', '=', 'counts.product_varient_id'
                )
                ->get();
        }
    } else {
        $products = product_varient::get();
    }


    // $products = Product::select("id")->get()->toArray();

    // $productVariants = product_varient::get()->groupBy("product_id");
    if (is_numeric($categoryId)) {
        $products1 = product_varient::where('categoryid', $categoryId)->get();
        $products = $products1->whereBetween('offer_price', [$min_num, $max_num]);
    }


    if ($min_num !== null && $max_num !== null) {
        $products = $products->whereBetween('offer_price', [$min_num, $max_num]);
    }

    // $products = $products->whereBetween('offer_price', [$min_num, $max_num]);


    $products = $products->whereBetween('offer_price', [$min_num, $max_num]);

    $finalProductIds = collect();
    $result = collect();

    foreach ($products as $product) {
        $product_id = $product->product_id;

        if (!$finalProductIds->contains($product_id)) {
            $finalProductIds->push($product_id);
            $result->push($product);
        }
    }




    // Check if there are no products
    if ($result->count() == 0) {
        return view('ajaxpages.nodata');
    }

    // Return the view with the filtered products
    return view('ajaxpages.hotdeal', ['products' => $result]);
}


}
