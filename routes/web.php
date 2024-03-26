<?php

use Illuminate\Support\Facades\Route;
use App\Models\web_image;
use App\Models\User;
use App\Models\product;
use App\Models\product_varient;
use App\Models\product_child_image;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PHPMailerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\allproductcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\ajaxcontroller;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductOrdercontroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RelatedProductController;

// razor pay
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\payController;



Route::get("form", [PHPMailerController::class, "index"]);

Route::post('sendmail',[PHPMailerController::class,'contactmail']);


Route::get('/', function () {
    return view('pages.home');
});

Route::get('/loginn', function () {
    return view('pages.login');
});

Route::get('/registerr', function () {
    return view('pages.register');
});

Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/product', function () {
    return view('pages.allproduct');
});

Route::view('/checkout','pages.checkout');

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/mycart', function () {
    return view('pages.mycart');
});
Route::get('/order', function () {
    return view('pages.myorder');
});
Route::get('/mywishlist', function () {
    return view('pages.mywishlist');
});
Route::get('/privacy', function () {
    return view('pages.privacy_policy');
});
Route::get('/refunds_cancell', function () {
    return view('pages.refunds_cancellations');
});

Route::get('/shippolicy', function () {
    return view('pages.shippolicy');
});
Route::get('/singleproducts', function () {
    return view('pages.singleproduct');
});
Route::get('/terms', function () {
    return view('pages.terms');

});
Route::get('/myaccount', function () {
    return view('pages.user');
});


Route::POST('/register',[RegisterController::class,'register']);
Route::post('/login',[Registercontroller::class,'login']);
Route::GET('/logout',[Registercontroller::class,'logout']);


Route::post('/forgotsendOtp',[registercontroller::class,'forgotsendOtpfunction33']);
Route::post('/forgotcheckOtp',[registercontroller::class,'forgotcheckOtpfunction33']);
Route::post('/savepassword',[registercontroller::class,'savepassword33']);

// login otp

// Route::post('/sendOtp',[registercontroller::class,'sendOtpFunction']);
// Route::post('/checkOtp',[registercontroller::class,'checkOtp']);


Route::post('/getCategory',[allproductcontroller::class,'getCategory']);
Route::get('/getAllVariants',[allproductcontroller::class,'getAllVariants']);


Route::post('/hotdeal',[allproductcontroller::class,'hotdeal']);
Route::post('/price_range',[allproductcontroller::class,'pricefilter']);


Route::get('/search',[ajaxcontroller::class,'searchword']);

//singleproduct

Route::get('singleproducts/{id}/{varid}', [productcontroller::class,'customRedirect']);



//wishlist & cart page

Route::post('/add_cart',[ajaxcontroller::class,'add_cart']);
Route::post('/wishtocart',[ajaxcontroller::class,'wishtocart']);
Route::post('/add_wishlist',[ajaxcontroller::class,'add_wishlist']);


Route::GET('/cartremove/{id}',[ajaxcontroller::class,'removecart']);
Route::GET('/cartremove_all_cart/{id}',[ajaxcontroller::class,'cartremove_all_cart']);


Route::GET('/wishlistremove/{id}',[ajaxcontroller::class,'wishlistremove']);
Route::GET('/wishlist_remove_all/{id}',[ajaxcontroller::class,'wishlist_remove_all']);

// ==============its my =============== and checkout view remove
Route::get('single_products/{id}/{varid}', [ProductController::class, 'customRedirect']);

Route::post('/checkout', [CheckController::class, 'singlproData']);

Route::post('/siglesizedata', [productcontroller::class, 'sigleajaxdata']);
//coupon
Route::POST('/couponapply',[CouponController::class, 'coupondats']);


// pincode
Route::get('/get-address-details', [registercontroller::class, 'getAddressDetails']);
Route::get('/my_order_status/{id}',[productOrdercontroller::class,'my_order_status']);

//my account
Route::post('/update_product',[ajaxcontroller::class,'updateuser']);
Route::post('/upload', [ajaxcontroller::class, 'uploadImage']);


 Route::post('/payment',[PaymentController::class,'webpaymentIndexFunction']);

//order summary page
Route::view('my_order_status','pages.my_order_status');
Route::get('/my_order_status/{id}',[productOrdercontroller::class,'my_order_status']);





//Razor pay payment page

Route::POST('/checkoutmm',[CheckoutController::class,'checkout']);

Route::POST('/updatepaymentstatus',[CheckoutController::class,'updatepaymentstatus']);




