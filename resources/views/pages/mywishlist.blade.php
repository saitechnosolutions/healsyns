@extends('layout.default')
@section('content')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="/">Home</a></span>
                <span class="devider">/</span>
                <span><a href="/mywishlist">Wishlist</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Wishlist</h1>
            </div>
        </div>
    </section>

    <div id="error-message" style="display: none;"></div>

    @if ($wishlists = App\Models\wishlist::where('user_id', Auth::user()->user_id)->get())
        @if ($wishlists->count() == 0)
            <section class="mycarts_sec  deee">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <h5 class="shop">My <span class="ct">Wishlist</span> </h5>
                        </div>
                        <div class="col-lg-2">
                            <a href="/" class="btn  home-btn3 shop-btn"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>
                                Back to shop</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="emptyu">
                                <img src="/assets/img/no.png" class="img-fluid " alt="">
                                <p class="paresr">You don’t have any products in the Wishlist yet. <br>
                                    <span class="paresr1"> You will find a lot of interesting products on our “Shop”
                                        page.</span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @else
            <section class="cart product wishlist footer-padding" data-aos="fade-up">
                <div class="container">
                    <div class="cart-section wishlist-section">
                        <table class="table-responsive">
                            <tbody>
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
                                            <h5 class="table-heading">Cart</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">ACTION</h5>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($wishlists as $wishlist)
                                    <tr class="table-row ticket-row">
                                        {{-- <form class="ads_carts"> --}}
                                        @if (Auth::check())
                                            <input type="hidden" value="{{ Auth::user()->user_id }}" name="user_id"
                                                class="user_id">
                                        @endif

                                        <input type="hidden" value="{{ $wishlist->product_id }}" name="product_main_id"
                                            class="product_main_id">

                                        <input type="hidden" name="prd_varient_id"
                                            value="{{ $wishlist->product_varient_id }}" class="prd_varient_id">

                                        <td class="table-wrapper wrapper-product">
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    @if ($vrs = App\Models\product::where('id', $wishlist->product_id)->first())
                                                        <a
                                                            href="/single_products/{{ $wishlist->product_varient_id }}/{{ $wishlist->product_id }}">
                                                            <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                                                class="img-fluid" alt=""
                                                                style="width: 78px;height:78px;">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="wrapper-content">
                                                    <a href="/singleproducts/{{ $wishlist->product_varient_id }}/{{ $wishlist->product_id }}">
                                                    @if ($vrs = App\Models\product::where('id', $wishlist->product_id)->first())
                                                        <h5 class="heading">{{ $vrs->product_name }}</h5>
                                                    @endif
                                                    </a>
                                                    @if ($mart = App\Models\product_varient::where('id', $wishlist->product_varient_id)->first())
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
                                                @if ($vrs1 = App\Models\product_varient::where('id', $wishlist->product_varient_id)->first())
                                                    <h5 class="rubee heading" id="price-{{ $vrs1->offer_price }}">
                                                        ₹{{ $vrs1->offer_price }}</h5>
                                                @endif

                                            </div>
                                        </td>


                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">

                                              <a class="btn home-btn8 shop-btn"
                                                    data-bs-toggle="modal" data-pid="{{ $wishlist->product_id }}"
                                                    data-pvid="{{ $wishlist->product_varient_id }}"
                                                    data-uid="{{ Auth::user()->user_id }}" data-qty="1"
                                                    data-bs-target="add_new_cart_submit" id="add-to-cart-btn">ADD TO CART <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                                                </a>
                                   {{-- @php
                                    $products_varient = App\Models\product_varient::where('id', $wishlist->product_varient_id)->first();
                                    @endphp

                                    @if ($stock = App\Models\ProductStock::where('pro_ver_id', $products_varient->id)->first())
                                    @if ($stock->availablestock == 0)
                                    <a class="btn home-btn8 shop-btn">Out of stock</a>

                                    @else

                                    @if (Auth::check())
                                   <a href="/mycart" class="btn home-btn8 shop-btn add_new_cart_submit" data-bs-toggle="modal"
                                    data-bs-target="add_new_cart_submit">Add To Cart</a>
                                    @else
                                    <a href="/loginn" class="btn home-btn8 shop-btn">Add To Cart</a>
                                    @endif

                                    @endif
                                    @endif --}}
                                            </div>
                                        </td>


                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center rems removes_wishlist"
                                                data-id="{{ $wishlist->id }}">
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
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="wishlist-btn">
                        <a class="clean-btn removall_wishlist" data-id="{{ Auth::user()->user_id }}"
                            style="border: none;background-color: transparent;">Clean Wishlist</a>
                        <a href="/" class="shop-btn">Back to shop</a>
                    </div>
                </div>
            </section>
        @endif
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#add-to-cart-btn').click(function(e){

                e.preventDefault();

                // Get data attributes
                var pid = $(this).data('pid');
                var pvid = $(this).data('pvid');
                var uid = $(this).data('uid');
                var qty = $(this).data('qty');

                // AJAX request
                $.ajax({
                    url: '/wishtocart',
                    method: 'POST',
                    data: {
                        pid: pid,
                        pvid: pvid,
                        uid: uid,
                        qty: qty
                    },
                    success: function(response){
                        if (response.error) {
                            swal.fire(
                        'Error!',
                        'This product is already in the cart',
                        'error'
                    );
                   } else
                   {
                   window.location.href = '/mycart';
                   }

                    },
                    error: function(xhr, status, error){
                     console.log("Error occurred:", error);
                }

                });
            });
        });
    </script>
@endsection


