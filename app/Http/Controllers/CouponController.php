<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\product_order;
use App\Models\productorder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // public function coupondats(Request $request)
    // {
    //     $couponCode = $request->input('couponcode');
    //     $totalAmount = $request->input('totalamount');
    //     $userId = $request->input('userId');
    //     $taxamt = $request->input('taxamt');

    //     // Retrieve the coupon details
    //     $coupon = Coupon::where('codename', $couponCode)->first();
    //     $discount = $coupon->discount;
    //     if (!$coupon) {
    //         echo "Coupon not found";
    //         return;
    //     }

    //     $expiryDate = $coupon->end_date;
    //     $startDate = $coupon->start_date;
    //     $currentDate = Carbon::now()->format('Y-m-d');

    //     // Check if the coupon is expired
    //     if ($currentDate > $expiryDate) {
    //         return response()->json(['error' => 'Coupon has expired'], 400);
    //     }

    //     // Check if the user has orders with payment_status != 1
    //     $orderCount = product_order::where('user_id', $userId)->where('payment_status', '!=', 1)->count();

    //     if ($orderCount >= 0 && $currentDate >= $startDate && $currentDate <= $expiryDate) {

    //        $disamt = ($totalAmount * $discount) / 100;
    //        $totalTaxAmount = $totalAmount - $disamt;

    //        $responseArray = [
    //         'disamt' => $disamt,
    //         'totalAmount' => $totalAmount,
    //         'totalProAmount' => $totalTaxAmount,
    //         'taxamt' => $taxamt,
    //     ];

    //        return response()->json($responseArray);
    //     }
    // }
    public function coupondats(Request $request)
{
    $couponCode = $request->input('couponcode');
    $totalAmount = $request->input('totalamount');
    $userId = $request->input('userId');
    $taxamt = $request->input('taxamt');

    // Retrieve the coupon details
    $coupon = Coupon::where('codename', $couponCode)->first();
    if (!$coupon) {
        return response()->json(['error' => 'Coupon not found'], 404);
    }

    $expiryDate = $coupon->end_date;
    $startDate = $coupon->start_date;
    $currentDate = Carbon::now()->format('Y-m-d');

    // Check if the coupon is expired
    if ($currentDate > $expiryDate) {
        return response()->json(['error' => 'Coupon has expired'], 400);
    }

    // Check if the user has already used a coupon for payment
    $usedCoupon = product_order::where('user_id', $userId)->where('coupon_code', $couponCode)->exists();
    if ($usedCoupon) {
        return response()->json(['error' => 'You have already used this coupon for payment.'], 400);
    }

    // Check if the user has orders with payment_status != 1
    $orderCount = product_order::where('user_id', $userId)->where('payment_status', '!=', 1)->count();

    if ($orderCount >= 0 && $currentDate >= $startDate && $currentDate <= $expiryDate) {

        $disamt = ($totalAmount * $coupon->discount) / 100;
        $totalTaxAmount = $totalAmount - $disamt;

        $responseArray = [
            'disamt' => $disamt,
            'totalAmount' => $totalAmount,
            'totalProAmount' => $totalTaxAmount,
            'taxamt' => $taxamt,
        ];

        return response()->json($responseArray);
    }
}

}

// public function coupondats(Request $request)
// {
//     $couponCode = $request->input('couponcode');
//     $totalAmount = $request->input('totalamount');
//     $userId = $request->input('userId');
//     $taxamt = $request->input('taxamt');

//     // Retrieve the coupon details
//     $coupon = Coupon::where('codename', $couponCode)->first();
//     if (!$coupon) {
//         return response()->json(['error' => 'Coupon not found'], 400);
//     }

//     $discount = $coupon->discount;
//     $expiryDate = $coupon->end_date;
//     $startDate = $coupon->start_date;
//     $currentDate = Carbon::now()->format('Y-m-d');

//     // Check if the coupon is expired
//     if ($currentDate > $expiryDate) {
//         return response()->json(['error' => 'Coupon has expired'], 400);
//     }

//     // Check if the user has orders with payment_status = 1 (payment success)
//     $paidOrdersCount = product_order::where('user_id', $userId)->where('payment_status', 1)->count();
//     if ($paidOrdersCount > 0) {
//         return response()->json(['error' => 'You have already used a coupon.'], 400);
//     }

//     // Check if the user has orders with payment_status != 1
//     $unpaidOrdersCount = product_order::where('user_id', $userId)->where('payment_status', '!=', 1)->count();
//     if ($unpaidOrdersCount > 0 && $currentDate >= $startDate && $currentDate <= $expiryDate) {
//         $disamt = ($totalAmount * $discount) / 100;
//         $totalTaxAmount = $totalAmount - $disamt;

//         $responseArray = [
//             'disamt' => $disamt,
//             'totalAmount' => $totalAmount,
//             'totalProAmount' => $totalTaxAmount,
//             'taxamt' => $taxamt,
//         ];

//         return response()->json($responseArray);
//     }
// }

