<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\city;
use App\Models\product;
use App\Models\product_varient;
use App\Models\ProductSlot;
use App\Models\state;
use App\Models\User;
use App\Models\user_addres;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ajaxcontroller extends Controller
{
    //
    // public function updateuser(Request $request)
    // {
    //     try {
    //         $user_id = $request->input("user_id");
    //         $name = $request->input("first_name");
    //         $email = $request->input("email");
    //         $phone_number = $request->input("phone");



    //         $user = User::where('user_id', $user_id)->first();
    //         if (!$user) {
    //             return response()->json(['error' => 'User not found'], 404);
    //         }

    //         // Check for changes in phone number and email before querying the database
    //         if ($phone_number !== $user->phone_number) {
    //             $mobileNumberCheck = DB::table('users')->where('phone_number', $phone_number)->count();
    //             if ($mobileNumberCheck > 0) {
    //                 throw new \Exception('Phone number already exists.');
    //             }
    //         }

    //         if ($email !== $user->email) {
    //             $emailCheck = DB::table('users')->where('email', $email)->count();
    //             if ($emailCheck > 0) {
    //                 throw new \Exception('Email already exists.');
    //             }
    //         }

    //         if ($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $filename = time() . '.' . $image->getClientOriginalExtension();

    //             if ($image->move(public_path('/assets/images/'), $filename)) {
    //                 $user->profile_image = $filename;
    //             } else {
    //                 // Handle the case where the image upload fails
    //                 return response()->json(['error' => 'Error uploading image'], 500);
    //             }
    //         }

    //     //    if ($Password) {
    //     //         DB::table('users')
    //     //             ->where('phone_number', $phone_number)
    //     //             ->update([
    //     //                 "password" => Hash::make($Password)
    //     //             ]);

    //     //             return response()->json(['success' => 'User updated successfully']);
    //     //     }

    //         // Update user properties
    //         $user->name = $name;
    //         $user->first_name = $name;
    //         $user->email = $email;
    //         $user->phone_number = $phone_number;


    //         // Save changes
    //         if ($user->save()) {
    //             return response()->json(['success' => 'User updated successfully']);
    //         } else {
    //             return response()->json(['error' => 'Error updating user'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 422);
    //     }
    // }
    public function updateuser(Request $request)
    {
        try {
            $user_id = $request->input("user_id");
            $name = $request->input("first_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone");
            $Password = $request->input("Password");

            $user = User::where('user_id', $user_id)->first();

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Check for changes in phone number and email before querying the database
            if ($phone_number !== $user->phone_number) {
                $mobileNumberCheck = DB::table('users')->where('phone_number', $phone_number)->count();
                if ($mobileNumberCheck > 0) {
                    throw new \Exception('Phone number already exists.');
                }
            }

            if ($email !== $user->email) {
                $emailCheck = DB::table('users')->where('email', $email)->count();
                if ($emailCheck > 0) {
                    throw new \Exception('Email already exists.');
                }
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                if ($image->move(public_path('/assets/images/'), $filename)) {

                    $user->profile_image = $filename;

                      if (Storage::disk("subdomain")->put("public/images/$filename", file_get_contents(public_path('/assets/images/') . $filename))) {
                    // Additional logic if needed
                }


                } else {
                    // Handle the case where the image upload fails
                    return response()->json(['error' => 'Error uploading image'], 500);
                }
            }

            // if ($Password) {
            //     DB::table('users')
            //         ->where('phone_number', $phone_number)
            //         ->update([
            //             "password" => Hash::make($Password)
            //         ]);

            //         return response()->json(['success' => 'User updated successfully']);
            // }
            if ($Password && strlen($Password) == 4 && ctype_digit($Password)) {
                $user->password = Hash::make($Password);
            } elseif ($Password) {
                throw new \Exception('Password must be a four-digit number(ex:1234).');
            }

            // Update user properties
            $user->name = $name;
            $user->first_name = $name;
            $user->email = $email;
            $user->phone_number = $phone_number;

            // Save changes
            if ($user->save()) {
                return response()->json(['success' => 'User updated successfully']);
            } else {
                return response()->json(['error' => 'Error updating user'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }


    public function uploadImage(Request $request)
    {
        $user_id = $request->input('userid');
        $user = User::where('user_id',$user_id)->first();

        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                if ($image->move(public_path('/assets/images/'), $filename)) {
                    $user->profile_image = $filename;
                    $user->save();

                    return back()->with('success','Profile image updated successfully');
                } else {
                    // Handle the case where the image upload fails
                    return response()->json(['error' => 'Error uploading image'], 500);
                }
        }
    }



    public function add_adress(Request $request)
    {
        $user_id = $request->input("user_id");
        $firstname = $request->input("firstname");
        $address = $request->input("address");
        $pin_state = $request->input("pin_state");
        $pin_district = $request->input("pin_district");
        $city_input = $request->input("city_input");

        // $stateId = $request->input("state");
        // $state = state::find($stateId);
        // $stateName = $state->name;

        // $cityId = $request->input("city");
        // $city = city::find($cityId);
        // $cityName = $city->name;

        $phone = $request->input("phone");
        $pincode = $request->input("pin_code");
        $pincodeId = DB::table('all_india_pincodes')->select('id')->where('officename', $city_input)->first()->id;
        // $landmark = $request->input("landmark");

        $defaultAddress = $request->has('status');

        $add_user = new user_addres;

        if (!$add_user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $add_user->user_id = $user_id;
        $add_user->address_first_name = $firstname;
        $add_user->address_line_one = $address;
        $add_user->state = $pin_state;
        $add_user->city = $pin_district;
        $add_user->area_name = $city_input;
        // $add_user->state_id = $stateId;
        // $add_user->state = $stateName;
        // $add_user->city_id = $cityId;
        // $add_user->city = $cityName;
        $add_user->address_phone_number = $phone;
        $add_user->pincode = $pincode;
        $add_user->pincode_id = $pincodeId;
        // $add_user->landmark = $landmark;
        $user = User::where('user_id', $user_id)->first();
        // dd($user);
        if ($user->user_default_address_id == null) {
            if ($add_user->save()) {
                $userupdate = DB::table('users')
                    ->where('user_id', $user_id, )
                    ->update([
                            'name' => $firstname,
                            'user_default_address_id' => $add_user->id
                        ]);
                return back()->with('success', 'User updated successfully');
            } else {
                return back()->with('error', 'Error updating user');
            }


        }
        // Save changes
        if ($add_user->save()) {
            if ($defaultAddress) {
                $user = User::where('user_id', $user_id)->first();
                //  dd( $user);
                if ($user) {
                    $user->user_default_address_id = $add_user->id;
                    $user->save();

                }
            }

            return back()->with('success', 'User updated successfully');
        } else {
            return back()->with('error', 'Error updating user');
        }

    }





    public function make_default_address($id){

        $newDefaultAddressId = $id;

        $user_one = auth()->user();

        if ($user_one) {
            $user_one->user_default_address_id = $newDefaultAddressId;

            if ($user_one->save()) {
                return back()->with('success', 'User default address updated successfully.');
            } else {
                return back()->with('error', 'Failed to update the user default address.');
            }
        } else {
            return back()->with('error', 'User not authenticated');
        }
    }



    public function edit_manage_addres($id)
    {

        $editaddres = user_addres::where('id', $id)->first();

        return view('pages.edit_manage_addres', compact('editaddres'));

    }


    public function deletaddress($id)
    {

        $editAddress = user_addres::find($id);

        if ($editAddress) {
            $editAddress->delete();

            return back();
        }


    }


    public function edit_update_managae_address(Request $request)
    {

        $user_adress_id = $request->user_address_id;
        $address = $request->address;
        $pin_state = $request->pin_state;
        $pin_district = $request->pin_district;
        $city_input = $request->city_input;
        // $stateId = $request->state;
        // $state = state::find($stateId);
        // $stateName = $state->name;

        // $cityId = $request->city;
        // $city = city::find($cityId);
        // $cityName = $city->name;

        $phone = $request->phone;
        $pincode = $request->pincode;
        $pincodeId = DB::table('all_india_pincodes')->select('id')->where('officename', $city_input)->first()->id;
        // $landmark = $request->landmark;


        $edit_user = user_addres::find($user_adress_id);


        $edit_user->address_line_one = $address;
        // $edit_user->state_id = $stateId;
        // $edit_user->state = $stateName;
        // $edit_user->city_id = $cityId;
        // $edit_user->city = $cityName;
        $edit_user->address_phone_number = $phone;
        $edit_user->pincode = $pincode;
        $edit_user->pincode_id = $pincodeId;
        // $edit_user->landmark = $landmark;
        $edit_user->state = $pin_state;
        $edit_user->city = $pin_district;
        $edit_user->area_name = $city_input;

        if ($edit_user->save()) {
            return back()->with('Success', 'User updated successfully');
        } else {
            return back()->with('error', 'Error updating user');
        }

    }


    public function searchword(Request $request)
    {
       $searchWord = $request->input;
        $products = DB::table('product_varient')
            ->join('products', 'product_varient.product_id', '=', 'products.id')
            ->where('products.product_name', 'like', '%' . $searchWord . '%')
            ->where('products.delete_status', '=', 0)
            ->where('product_varient.delete_status', '=', 0)
            ->select('product_varient.*', 'products.product_name', 'products.product_image')
            ->get();

        return view('ajaxpages.search')->with('products', $products);
    }



    public function add_cart(Request $request)
    {

        $user_id = $request->input("user_id");
        $product_main_id = $request->input("product_main_id");
        $productqty = $request->input("productqty");
        $prd_varient_id = $request->input("prd_varient_id");


        $existingCart = Cart::where('user_id', $user_id)
            ->where('product_varient_id', $prd_varient_id)
            ->first();

        wishlist::where('user_id', $user_id)
            ->where('product_varient_id', $prd_varient_id)
            ->delete();

        if ($existingCart) {
            // $existingCart->product_quantity += $productqty;
            // $existingCart->save();

            return response()->json(['error' => 'Already Added']);
        } else {
            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->product_id = $product_main_id;
            $cart->product_varient_id = $prd_varient_id;
            $cart->product_quantity = $productqty;

            if ($cart->save()) {
                $product = product::find($product_main_id);
                $product_varient = product_varient::find($prd_varient_id);

                return response()->json([
                    'success' => true,
                    'product_name' => $product->product_name,
                    'mrp_price' => $product_varient->mrp_price,
                    'offer_price' => $product_varient->offer_price,
                    'product_image' => env('MAIN_URL') . 'images/' . $product->product_image,
                ]);
            } else {
                return response()->json(['error' => 'Failed to add to cart']);
            }
        }

    }

    public function wishtocart(Request $request)
    {

        $product_main_id = $request->input('pid');
        $prd_varient_id = $request->input('pvid');
        $user_id = $request->input('uid');
        $productqty = $request->input('qty');


        $existingCart = Cart::where('user_id', $user_id)
            ->where('product_varient_id', $prd_varient_id)
            ->first();

        wishlist::where('user_id', $user_id)
            ->where('product_varient_id', $prd_varient_id)
            ->delete();

        if ($existingCart) {
            // $existingCart->product_quantity += $productqty;
            // $existingCart->save();

            return response()->json(['error' => 'Already Added']);
        } else {
            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->product_id = $product_main_id;
            $cart->product_varient_id = $prd_varient_id;
            $cart->product_quantity = $productqty;

            if ($cart->save()) {
                $product = product::find($product_main_id);
                $product_varient = product_varient::find($prd_varient_id);

                return response()->json([
                    'success' => true,
                    'product_name' => $product->product_name,
                    'mrp_price' => $product_varient->mrp_price,
                    'offer_price' => $product_varient->offer_price,
                    'product_image' => env('MAIN_URL') . 'images/' . $product->product_image,
                ]);
            } else {
                return response()->json(['error' => 'Failed to add to cart']);
            }
        }

    }




    public function removecart($id)
    {
        // dd($id);
        $cart = DB::table('carts')
            ->where('id', $id)
            ->delete();
        if ($cart) {
            return response()->json(['success' => 'Removed']);
        }

    }

    public function cartremove_all_cart($id)
    {

        $remove_all_cart = DB::table('carts')
            ->where('user_id', $id)
            ->delete();
        if ($remove_all_cart) {
            return response()->json(['success' => 'Removed']);
        }
    }




    public function add_wishlist(Request $request)
    {

        $user_id = $request->input("user_id");
        $product_main_id = $request->input("product_main_id");
        $productqty = $request->input("productqty");
        $prd_varient_id = $request->input("prd_varient_id");


        $existingwishlist = wishlist::where('user_id', $user_id)
            ->where('product_varient_id', $prd_varient_id)
            ->first();

        if ($existingwishlist) {
            // $existingCart->product_quantity += $productqty;
            // $existingCart->save();

            return response()->json(['error' => 'Already Added']);
        } else {
            $cart = new wishlist();

            $cart->user_id = $user_id;
            $cart->product_id = $product_main_id;
            $cart->product_varient_id = $prd_varient_id;
            $cart->product_quantity = $productqty;

            if ($cart->save()) {
                $product = product::find($product_main_id);
                $product_varient = product_varient::find($prd_varient_id);

                return response()->json([
                    'success' => true,
                    'product_name' => $product->product_name,
                    'mrp_price' => $product_varient->mrp_price,
                    'offer_price' => $product_varient->offer_price,
                    'product_image' => env('MAIN_URL') . 'images/' . $product->product_image,
                ]);
            } else {
                return response()->json(['error' => 'Failed to add to cart']);
            }
        }

    }

    public function wishlistremove($id)
    {
        // dd($id);
        $wishlists = DB::table('wishlists')
            ->where('id', $id)
            ->delete();
        if ($wishlists) {
            return response()->json(['success' => 'Removed']);
        }

    }

    public function wishlist_remove_all($id)
    {

        $wishlists_all = DB::table('wishlists')
            ->where('user_id', $id)
            ->delete();
        if ($wishlists_all) {
            return response()->json(['success' => 'Removed']);
        }
    }


    public function cancelProductFucntion(Request $request)
    {


        $productSlotId = $request->product_slot_id;
        $reasonForCancel = $request->reason_for_cancel;

        $productSlot = ProductSlot::findOrFail($productSlotId);

        $orderId = $productSlot->order_id;


        $productSlot->update([
            "is_cancelled" => 2,
            "cancel_reason" => $reasonForCancel
        ]);
        if ($productSlot) {
            return response()->json(['success' => 'Removed']);
        }

    }






}
