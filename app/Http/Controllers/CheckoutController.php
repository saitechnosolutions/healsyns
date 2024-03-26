<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Crypto;
use App\Models\ProductStock;
use App\Models\ProductOrder;
use App\Models\ProductVarient;
use App\Models\ProductSlot;
use App\Models\ProductOrderUserAddress;
use App\Models\User;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Session;
use Exception;


class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $currentTime = Carbon::now('Asia/Kolkata');

        $data = $request->all();
         //@dd($data);
        $userId = $request->user_id;
        $delivery_amt = $request->delivery_amt;
        $lastId = ProductOrder::max('id');
        $orderId = sprintf('HS-ORD-PR-%06d', $lastId + 1);
        ProductOrder::query()->create([
            'order_id' => $orderId, 'date_ordered_on' => now(), 'user_id' => $userId, 'order_time' => $currentTime->toDateTimeString(), "payment_status" => 0,
        ]);
         $user_details = DB::table('users')->select('name','phone_number','user_default_address_id')->where('user_id',$userId)->first();
        // ================update code ================

        $firstname = str_replace("'", '"', $request->us_id);
        $phone = str_replace("'", '"', $request->phone);
        $email = str_replace("'", '"', $request->email);
        $address = str_replace("'", '"', $request->address_line_one);
        $pincode = str_replace("'", '"', $request->pin_code);
        $state = str_replace("'", '"', $request->pin_state);
        $city = str_replace("'", '"', $request->pin_district);
        $areaname = str_replace("'", '"', $request->city_input);

        $pincodeId = DB::table('all_india_pincodes')->select('id')->where('officename',$areaname)->first();
        $pincodeIdValue = $pincodeId ? $pincodeId->id : null;
        if($user_details->user_default_address_id == null){
            $useraddresid = DB::table('user_addresses')
            ->insertGetId([
                'user_id' => $userId,
                'address_first_name' => $firstname,
                'address_phone_number' => $phone,
                'address_line_one' => $address,
                'pincode' => $pincode,
                'pincode_id' => $pincodeIdValue,
                'state' => $state,
                'city' => $city,
                'area_name' => $areaname,
            ]);
            $userupdate = DB::table('users')
            ->where('user_id', $userId,)
            ->update([
                'name' => $firstname,
                'email' => $email,
                'user_default_address_id'=>$useraddresid
            ]);
        }else{

            DB::table('user_addresses')->where("id" ,$user_details->user_default_address_id )
            ->update([
                'user_id' => $userId,
                'address_first_name' => $firstname,
                'address_phone_number' => $phone,
                'address_line_one' => $address,
                'pincode' => $pincode,
                'pincode_id' => $pincodeIdValue,
                'state' => $state,
                'city' => $city,
                'area_name' => $areaname,
            ]);
            DB::table('users')
            ->where('user_id', $userId,)
            ->update([
                'name' => $firstname,
                'email' => $email,
                'user_default_address_id'=>$user_details->user_default_address_id
            ]);
        }

       // get user details using user id
        $user_details2 = DB::table('users')->select('name','phone_number','user_default_address_id')->where('user_id',$userId)->first();

        $user_address = DB::table('user_addresses')->select('address_line_one','city','state','pincode')->where('id',$user_details2->user_default_address_id)->first();

        $order = ProductOrder::query()->where("order_id", $orderId)->first();

        //dd($order);
        $productId = str_replace("'", '"', $request->product_id);
        $quantity = str_replace("'", '"', $request->product_quantity);
        $productVarientId = str_replace("'", '"', $request->product_varient_id);
        $delvieryDate  = date('Y-m-d', strtotime(Carbon::parse($request->from_date)));


        // ====================end ===============
        $slots = [];
        $grandTotalAmount = 0;
        $totalAmount = $request->order_total_amount ?? 0;
        $gst_amount = $request->gst_amount ?? 0;
        $discount_amount = $request->discount_amount ?? 0;
        $userId = $order->user_id;
        $user = User::query()->where("user_id", $userId)->first();


        foreach ($productVarientId as $key => $value) {
            $grandTotalAmount += (ProductVarient::findOrFail($value)->offer_price * $quantity[$key]);
        // dd($totalAmount);
            $slots[] = [
                'delivery_date' => $delvieryDate,
                'order_id' => $orderId,
                "product_id" => $productId[$key],
                "product_varient_id" => $productVarientId[$key],
                "quantity" => $quantity[$key]
                // 'created_at' => Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s'),
                // 'updated_at' => Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s')
            ];
        }

        // to display the details for users
        $data['order_id'] = $orderId;
        $data['customer_name'] = $user_details->name;
        $data['phone_number'] = $user_details->phone_number;
        $data['address'] = $user_address->address_line_one;
        $data['city'] = $user_address->city;
        $data['state'] = $user_address->state;
        $data['pincode'] = $user_address->pincode;
        $data['total_amount'] = $totalAmount;
        $data['grand_total_amount'] = $grandTotalAmount;
        $data['gst_amount'] = $gst_amount;
        $data['discount_amount'] = $discount_amount;
        $data['slots'] = $slots;

        // to convert array to object
        $order_details = (object) $data;

         //dd($order_details);
         $this->createProductSlot(
            $slots,
            $totalAmount,
            $orderId,
            $grandTotalAmount,
            $gst_amount,
            $discount_amount,
            $delivery_amt
        );

        return view('payment.payment', [
            'order_details' => $order_details ,'delivery_amt' => $delivery_amt
        ]);

    }


    public function createProductSlot($slots,$totalAmount,$orderId,$grandTotal,$gstAmount,$discountAmount,$delivery_amt)
    {
        // dd($grandTotal);
        $order = ProductOrder::query()->where("order_id", $orderId)->first();
        foreach($slots as $slot) {
                $slot = json_decode(json_encode($slot), true);
    // dd($slot);f
               ProductSlot::create($slot);
         }
        $order->update([
            "total_amount" => $totalAmount,
            "gst_amount" => $gstAmount,
            "discount_amount" => $discountAmount,
            "delivery_charge" => $delivery_amt ?? 0,
            "grand_total_amount" => $grandTotal
            ]);

    }



    public function updatepaymentstatus(Request $request)
    {
        $order_id = $request->order_id;

        $order_details = DB::table('product_orders')->where('order_id',$order_id)->first();
        $productOrder =   ProductOrder::query()->where("order_id", $order_id)->first();
        $userId = $productOrder->user_id;
        $user = User::query()->where("user_id", $userId)->with("defaultAddress")->first();

        $alldata = $request->all();

             if($request->razorpay_payment_id)
             {
                $msg = "Thank you for shopping with us. Your transaction is successful. We will be shipping your order to you soon.";

                // to update success details
                $user = User::query()->where("user_id", $userId)->with("defaultAddress")->first();
                $productOrder = ProductOrder::query()->where("order_id", $order_id)->first();
                $productSlot = ProductSlot::query()->where("order_id", $order_id)->get();

                $productOrder->update([
                    "payment_status" => 1
                ]);

                $this->addProductOrderDeliveryAddress($order_id, $user);
                Cart::where("user_id", $userId)->delete();

                // to reduce stock after product

                foreach ($productSlot as $slot) {
                    $productVarientId = $slot['product_varient_id'];
                    $quantity = $slot['quantity'];

                    // Get the current stock information for the product
                    $productStock = ProductStock::where('pro_ver_id', $productVarientId)->first();
                    $productVarient = ProductVarient::where('id', $productVarientId)->first();

                    // Update available_stock and sale_stock based on the quantity
                    $availableStock = $productStock->availablestock - $quantity;
                    $saleStock = $productStock->salestock + $quantity;

                    $productVarientAvailQty = $productVarient->product_qty - $quantity;

                    // Update the ProductStock table
                    ProductStock::where('pro_ver_id', $productVarientId)->update([
                        'availablestock' => $availableStock,
                        'salestock' => $saleStock,
                    ]);

                    // Update the Product Varient Qty table
                    ProductVarient::where('id', $productVarientId)->update([
                        'product_qty' => $productVarientAvailQty,
                    ]);

                  return view('payment.paymentsuccess');


            }

        }

    }

        public function addProductOrderDeliveryAddress($orderId, $user)
        {
            $defaultUserAddress =  $user->defaultAddress->toArray();
            ProductOrderUserAddress::create([
                ...$defaultUserAddress,
                "order_id" => $orderId,
            ]);
        }
}
