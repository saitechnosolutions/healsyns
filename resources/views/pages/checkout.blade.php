@extends('layout.default')
@section('content')

@php
$prodetails = session('prodetails');
@endphp
<style>
    .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}
.input-group-text {
    display: flex;
    align-items: center;
    padding: 1.70rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    white-space: nowrap;
   background-color: #fff;
    border:1px solid rgba(174, 28, 154, 0.08);
    border-radius: 0.25rem;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border:1px solid rgba(174, 28, 154, 0.08);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.form-check-label {
    font-weight: 400;
    font-size:15px;
}
#flexCheckDefault1 {
    border-radius: 100px;
}
</style>
 <section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="/checkout">Checkout</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Checkout</h1>
        </div>
    </div>
</section>

<section class="checkout product footer-padding">
    <div class="container">
        <div class="checkout-section">
            {{-- <form action="/payment" method="POST"> --}}

         <form name="addClientsdata" id="checkout" action="/checkoutmm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="checkout-wrapper">

                        <div class="account-section billing-section">
                            <h5 class="wrapper-heading">Shipping Details</h5>

                      @php
                      $user = Auth::user();

                    //   @dd($user);

                      $userData = null; // Initialize $userData to null

                      if ($user) {
                          $userId = $user->user_id;

                          $userData = App\Models\User::join('user_addresses', 'users.user_id', '=', 'user_addresses.user_id')
                              ->where('users.user_id', $userId)
                              ->select('users.name', 'users.phone_number', 'users.email', 'user_addresses.address_line_one', 'user_addresses.city', 'user_addresses.state', 'user_addresses.pincode', 'user_addresses.area_name')
                              ->first();
                      }
                      @endphp
                            <div class="review-form">
                                <div class=" account-inner-form">
                                    <div class="review-form-name">
                                        <label for="" class="form-label"> Name</label>
                                        <input type="text" id="us_id" value="{{ $userData?->name ?? '' }}"
                                        class="form-control c_userid" name="us_id">
                                       <span class="text-danger" id="msg1"></span>
                                    </div>

                                </div>

                                <div class=" account-inner-form">
                                    <div class="review-form-name">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control c_email"
                                        value="{{ $userData?->email ?? '' }}" name="email">
                                        <span class="text-danger" id="msg3"></span>
                                    </div>
                                    <div class="review-form-name">
                                        <label for="phone" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+91</span>
                                            </div>
                                            <input type="text" class="form-control c_phone"
                                                value="{{ $userData?->phone_number ?? '' }}" id="PhoneNumber" name="phone"
                                                placeholder="Enter Your Phone Number Here" maxlength="10" required
                                                onkeypress="return phone2(event);">
                                        </div>
                                        <span class="text-danger" id="msg2"></span>
                                    </div>
                                </div>

                                <div class="review-form-name address-form">
                                    <label for="address" class="form-label">Door No, Street, Area*</label>
                                    <input type="text" class="form-control c_addres"
                                   name="address_line_one" required>
                                   <span class="text-danger" id="msg4"></span>
                                </div>

                                <div class="account-inner-form city-inner-form">
                                    <div class="review-form-name">
                                        <label for="" class="form-label" >Pincode*</label>
                                        <input type="text" class="form-control pincode c_pincode" id="pin_code_type" name="pin_code"
                                            pattern="[0-9]{6}" maxlength="6" onkeypress="return phone1(event);"
                                            oninput="checkPhoneNumberLength(this)" required>
                                            <span class="text-danger" id="msg5"></span>
                                    </div>

                                    <div class="review-form-name">
                                        <label for="" class="form-label">State</label>
                                        <input type="text" class="form-control pin_state" id="pin_state" name="pin_state"
                                            readonly required>
                                            <span class="text-danger" id="msg6"></span>
                                    </div>
                                </div>

                                <div class="account-inner-form city-inner-form">
                                    <div class="review-form-name">
                                        <label for="" class="form-label">District</label>
                                        <input type="text" class="form-control pin_district" id="pin_district"
                                            name="pin_district" readonly required>
                                            <span class="text-danger" id="msg7"></span>

                                    </div>
                                    <div class="review-form-name">
                                        <label for="" class="form-label">Area</label>
                                        <select name="city_input" class="form-select city_input" id="city_input" >
                                            <option value="" hidden>Select Area</option>
                                        </select>

                                        <span  id="msg8" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>



                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-wrapper">
                      <div class="account-section billing-section">
                          <h5 class="wrapper-heading">Order Summary</h5>
                          <div class="order-summery">
                              <div class="subtotal product-total">
                                  <h5 class="wrapper-heading">PRODUCT</h5>
                                  <h5 class="wrapper-heading">TOTAL</h5>
                              </div>
                              <hr>
                        @foreach ($prodetails['product_id'] as $key => $singleProduct)
                            @php
                              $cartProduct = App\Models\product::find($singleProduct);

                              @endphp
                               <div class="subtotal product-total">
                                  <ul class="product-list">
                                      <li>
                                          <div class="product-info " style="background: transparent;">

                                              {{-- <img src="{{ env('MAIN_URL') }}images/{{ $cartProduct['product_image'] }}" style="width: 50px;" alt="#"> --}}

                                              <input type="hidden" name="Product_Name[]" value="{{ $cartProduct['product_name'] }}">
                                                   @php
                                                      $proid = $prodetails['product_id'][$key];
                                                      $varient = App\Models\Product::where('products.id', $proid)
                                                      ->join('product_varient', 'products.id', '=', 'product_varient.product_id')
                                                      ->first();
                                                   @endphp
                                                  <h5 class="wrapper-heading">
                                                       {{ $varient->product_name }} - {{ $varient->value }}
                                                       @if($varient->varient == 1)
                                                       Liter
                                                       @elseif($varient->varient == 2)
                                                       ml
                                                       @elseif($varient->varient == 3)
                                                       grm
                                                       @elseif($varient->varient == 4)
                                                       kg
                                                       @elseif($varient->varient == 5)
                                                       no's
                                                       @endif
                                                   </h5>
                                                   <input type="hidden" value="{{ $prodetails['product_quantity'][$key] }}" class="proqty" name="product_quantity[]">
                                                   <p class="paragraph">Qty: {{ $prodetails['product_quantity'][$key] }}</p>

                                          </div>

                                          @php
                                                $totalAmount = 0;
                                                $discount = 0;
                                                $totalAmount += $prodetails['proprice'][$key] * $prodetails['product_quantity'][$key];
                                          @endphp
                                        <div class="price">
                                              <h5 class="wrapper-heading">₹{{ $totalAmount }}.00</h5>
                                        </div>
                                      </li>
                                  </ul>
                              </div>

                        @endforeach



                       @if (isset($prodetails))
                           @php
                               $totalAmount = 0;
                               $discount = 0;
                           @endphp
                           @foreach ($prodetails['proprice'] as $key => $pro)
                               @php
                                   $totalAmount += (float) $pro * $prodetails['product_quantity'][$key];
                                    //@dd( $totalAmount);
                               @endphp
                           @endforeach

                           @php
                               $totalGst = 0;
                           @endphp

                           @foreach ($prodetails['gst'] as $key => $gst)
                               @php
                                   $totalGst += ($prodetails['proprice'][$key] * (float) $gst * $prodetails['product_quantity'][$key]) / 100;

                               @endphp
                           @endforeach


                           {{-- <div class="sub_to1 subtotal product-total">
                            <h5 class="subtot1 wrapper-heading">Product total:</h5>
                            <input type="hidden" class="totalamt" value="{{ $totalAmount }}"
                                name="">
                            <h5 class="subtot1 productamt wrapper-heading">₹{{ number_format($totalAmount, 2) }}</h5>
                          </div> --}}

                           {{-- Without Tax --}}

                           @php
                               $totalAmount = $totalAmount - $totalGst;
                           @endphp

                           @foreach ($prodetails['product_id'] as $key => $prod_id)
                               <input type="hidden" value="{{ $prod_id }}" class="prod_id" name="product_id[]">
                           @endforeach

                           @foreach ($prodetails['product_varient_id'] as $key => $prod_var_id)
                               <input type="hidden" value="{{ $prod_var_id }}" class="var_id"
                                   name="product_varient_id[]">
                           @endforeach

                           @foreach ($prodetails['product_quantity'] as $key => $proqty)
                               <input type="hidden" value="{{ $proqty }}" class="proqty" name="product_quantity[]">
                           @endforeach
                       @endif


                       <div>
                          <a style="font-weight:500;">Have a coupon ?</a>

                          <div class="input-group mb-3 mt-1">
                            <input type="hidden" class="loginid" name="user_id"
                            value="{{ $user->user_id }}">
                        <input type="text" class="form-control coupocode" name="couponcode"
                            placeholder="Add Coupon" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <input type="hidden" class="totalamt" name="totalamt"
                            value="{{ round($totalAmount) }}">
                        {{-- <input type="hidden" class="taxamt" value="{{ $prodetails['gst'] }}" name="taxamt"> --}}
                        <div class="input-group-append">
                            <button type="button" class="input-group-text coupon_btn"
                                id="basic-addon2">Apply</button>
                        </div>

                      </div>

                      <span class="error-message text-danger"></span>

                      <div class="sub_to1 subtotal product-total">
                          <h5 class="subtot1 wrapper-heading">Subtotal:</h5>
                          <input type="hidden" class="totalamt" value="{{ $totalAmount }}"
                              name="">
                          <h5 class="subtot1 productamt wrapper-heading">₹{{ number_format($totalAmount, 2) }}</h5>
                      </div>


                      <div class="subtotal product-total">
                          <ul class="product-list">
                              <li>
                                  <div class="product-info">
                                      <p class="paragraph">Discount:</p>
                                  </div>
                                  <div class="price">
                                    <input type="hidden" class="discamnt" name="discount_amount" value="">
                                <h5 class="subtot1 text_re discountprint wrapper-heading">-₹0.00</h5>
                                <input type="hidden" value="0" class="discamnt">
                                  </div>
                              </li>
                              <li>
                                  <div class="product-info">
                                      <h5 class="wrapper-heading">Tax:</h5>
                                  </div>
                                  <div class="price">
                                    <input type="hidden" name="gst_amount" class="tax_amt_display" value="{{ $totalGst }}" name="">
                                    <h5 class="subtot1 text_gre textamt wrapper-heading"> + ₹ {{ $totalGst }}</h5>
                                  </div>
                              </li>
                              <li>
                                <h5 class="subtot1 wrapper-heading">Delivery Charge:</h5>
                                @php
                                    $del = App\Models\Delivery_Charge_Detail::first();
                                @endphp
                                @if ($totalAmount >= $del->minimum_price)
                                    <h5 class="wrapper-heading subtot1 text_gre delivery_amt"> Free </h5>
                                    <input type="hidden" name="delivery_amt"
                                        class="delivery_amt_display" value="0">
                                @else
                                    <input type="hidden" name="delivery_amt"
                                        class="delivery_amt_display" value="{{ $del->delivery_charge }}">
                                    <h5 class="subtot1 text_gre delivery_amt wrapper-heading"> + ₹
                                        {{ $del->delivery_charge }}</h5>
                                @endif

                            </li>
                          </ul>
                      </div>

                      <hr>

                      <div class="subtotal total sub_to">
                          <h5 class="wrapper-heading tot1">TOTAL</h5>
                          <h5 class="wrapper-heading price tot" id="proamt">₹ 0.00</h5>
                          <input type="hidden" name="order_total_amount" class="finalpay"
                              value="">
                      </div>
                      <button type="button" class="btn shop-btn checkoutform">Pay Now</button>

                      {{-- <div class="col-lg-12">
                        <div class="form-check" id="online_pay">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Online Payment
                            </label>
                            <input class="form-check-input" type="checkbox" name="online_pay" value="1" checked
                                id="flexCheckDefault1">
                        </div>
                        <div class="form-check pt-2" id="cash_pay">
                            <label class="form-check-label"  for="flexCheckDefault2">
                                Cash/Pay on Delivery
                                </br>
                                <span style="font-size:11px;"> Pay Cash/UPI/Card at the time of delivery</span>
                            </label>
                            <input class="form-check-input" type="checkbox" name="cash_pay" value="2"
                                id="flexCheckDefault2">
                        </div>
                        <br>
                    </div>

                    <button type="button" class="btn   shop-btn checkoutform pays1">Pay Now</button>

                    <button type="button" class="btn   shop-btn checkoutform checkoutform_one">Proceed Now</button> --}}
                  </div>

            </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(window).on('load', function() {
    var pinnn = $('#pin_code_type').val();
    if(pinnn != ""){
        fetchAddressDetails();
    }
});
</script>
@endsection
