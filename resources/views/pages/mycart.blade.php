

@extends('layout.default')
@section('content')

<style>
    .mycarts_sec {
    position: relative;
    padding-bottom: 50px;
    margin-bottom: 30px;
    padding-top: 50px;
}

.cart-button {
        display: inline-block;
    border: 1px solid #ddd;
    /* margin: -3px; */
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    padding: 6px 0 0 0;
    background: #eee;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.cart_incre_qty {
    display: flex;
}
.cart_incre_qty #decrease {
    /* border-radius: 8px 0 0 8px; */
    padding: 0 10px;
}
.Qty_val {
    /* width: 100%; */
    width: 35px;
    text-align: center;
    border: 1px solid #ddd;
}
.cart_incre_qty #increase {
    /* border-radius: 0 8px 8px 0; */
    padding: 0 10px;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="/mycart">Cart</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Cart</h1>
        </div>
    </div>
</section>

@if ($cart = App\Models\Cart::where('user_id', Auth::user()->user_id)->get())

@if ($cart->count() == 0)
    <section class="mycarts_sec  deee">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <h5 class="shop">My <span class="ct">Cart</span> </h5>
                </div>
                <div class="col-lg-2">
                    <a href="/" class="btn  home-btn3 shop-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Back to shop</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="emptyu">
                        <img src="/assets/img/no.png" class="img-fluid " alt="">
                        <p class="paresr">Your cart is empty. Start shopping!<br>

                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@else
<section class="product-cart product footer-padding">
    <form method="POST" action="/checkout">
        @csrf
    <div class="container">
        <div class="cart-section">
            <table class="table-responsive">
                <tbody class="table-responsive">
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUCT</h5>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">PRICE</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">QUANTITY</h5>
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">Product TOTAL</h5>
                            </div>
                        </td>

                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">ACTION</h5>
                            </div>
                        </td>

                    </tr>
                    @php
                    $totalAmt = 0;
                    @endphp
                    @foreach ($cart as $car)
                    <tr class="table-row ticket-row cart_closest_row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    @if ($vrs = App\Models\product::where('id', $car->product_id)->first())
                                    <a
                                        href="/single_products/{{ $car->product_varient_id }}/{{ $car->product_id }}">
                                        <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                            class="img-fluid" alt="" style="width:78px;height:78px;">
                                    </a>
                                    @endif
                               </div>
                                <div class="wrapper-content">

                                    <a href="/singleproducts/{{ $car->product_varient_id }}/{{ $car->product_id }}">
                                    @if ($vrs = App\Models\product::where('id', $car->product_id)->first())
                                    <h5 class="heading">{{ $vrs->product_name }}</h5>
                                   @endif
                                   </a>

                                   @if ($mart = App\Models\product_varient::where('id', $car->product_varient_id)->first())
                                   @if ($mart->varient == 1)
                                       <h5 class="heading">{{ $mart->value }}Liter</h5>
                                   @elseif ($mart->varient == 2)
                                       <h5 class="heading">{{ $mart->value }}ml</h5>
                                   @elseif ($mart->varient == 3)
                                       <h5 class="heading">{{ $mart->value }}grm</h5>
                                   @elseif ($mart->varient == 4)
                                       <h5 class="heading">{{ $mart->value }}kg</h5>
                                   @elseif ($mart->varient == 5)
                                       <h5 class="heading">{{ $mart->value }}nos</h5>
                                   @endif
                                  @endif
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                @if ($productstock = App\Models\ProductStock::where('pro_ver_id', $car->product_varient_id)->first())
                                <input type="hidden"  class="max_qty" name="available_stock[]"
                                    value="{{ $productstock->availablestock }}">
                            @endif
                            @if ($vrs1 = App\Models\product_varient::where('id', $car->product_varient_id)->first())


                                <input type="hidden" value="{{ $vrs1->product_id }}"
                                    name="product_id[]">
                                <input type="hidden" value="{{ $vrs1->id }}"
                                    name="product_varient_id[]">
                                <input type="hidden" value="{{ $vrs1->product_gst }}"
                                    name="gst[]">
                                <input type="hidden" class="saleprice" value="{{ $vrs1->offer_price }}"
                                    name="proprice[]" >
                                <input type="hidden"
                                    name="ogproprice[]" value="{{$vrs1->offer_price}}">
                                <input type="hidden" id="mrprice" value="{{ $vrs1->mrp_price }}"
                                    name="mrpprice[]">
                                <input type="hidden" class="TotalAmot" value="{{ $vrs1->offer_price }}" name="TotalAmot">

                                <h5 class="heading" id="price-{{ $vrs1->offer_price }}">
                                    ₹{{ $vrs1->offer_price }}</h5>

                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <div class="cart_incre_qty prds_inr">
                                    <button type="button" class="cart-button" onclick="cartcalculation(this, event)" id="decrease">-</button>
                                    <input type="number" name="product_quantity[]" class="Qty_val" value="{{ $car->product_quantity }}" onkeydown="return false //return value false"  style=" cursor: default;"/>
                                    <button type="button" class="cart-button" onclick="cartcalculation(this, event)" id="increase">+</button>
                                </div>

                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">

                                <h5 id="outputValue" class="outputValue heading">{{ $car->product_quantity * $vrs1->offer_price }}</h5>

                            </div>
                        </td>
                        @php
                        $totalAmt += $car->product_quantity * $vrs1->offer_price;
                        @endphp
                        <td class="table-wrapper">
                            <div class="table-wrapper-center rems removes_carts"  data-id="{{ $car->id }}"
                                class="btn  rems removes_carts">
                                <span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                            fill="#AAAAAA"></path>
                                    </svg>
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <input type="hidden" name="TotalAmt" class="Cartfull_Amt">
           <h5 class="heading" id="cartToatAmt" style="font-size: 2rem;padding-top: 30px;">{{ $totalAmt }}</h5>

                        </div>

                    </td>

                </tbody>
            </table>
        </div>
        <div class="wishlist-btn cart-btn cartside">

                <button type="button" data-id="{{ Auth::user()->user_id }}"
                    class="btn removall_cart shop-btn">Remove all</button>


             <a href="/product" class="shop-btn update-btn">Back to shop</a>
             <div class="d-flex justify-content-center">
                <button type="submit" class="btn shop-btn">Proceed to Checkout</button>
            </div>

        </div>

    </div>

    </form>
</section>



@endif
@endif

@endsection
