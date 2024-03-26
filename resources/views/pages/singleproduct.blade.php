@extends('layout.default')
@section('content')

    <style>
        .qty_lit {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }

        .heartbtn {
            border: 1px solid #DEE2E7;
            border-radius: 100%;
            box-shadow: 0px 1px 2px 0px rgba(56, 56, 56, 0.08);
            transition: all 0.5s ease-in-out;
        }

        .lent {
            border-right: 2px solid #D9D9D9;
        }

        /* .dddd{
                                display: flex;
                            } */
        @media only screen and (max-width: 990px) {
            .lent {
                text-align: center;
                border-right: 0px;
            }
        }

        @media only screen and (max-width: 990px) {
            .product-info-img .product-top {
                height: 30rem;
            }
        }

        .singleblog {
            padding: 2rem 0;
        }

        .litre {
            /* display: flex; */
            justify-content: space-evenly;
            flex-flow: wrap;
        }

        .price_ty.active {
            border: 1px solid #23989f;
            background-color: #23989f;
            color: white;
        }


        .price_twe {
            font-size: 12px;
            font-weight: 400;
        }

        .price_ty {
            background: #fff;
            padding: 10px 2px;
            border: 1px solid #D5D5D5;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            margin: 3px 0;
            width: 85px;
        }

        .atrt {
            padding-left: 40px;
        }

        .qtys {
            color: #8B96A5;
            font-size: 14px;
            font-weight: 400;
        }

        .prds_inr {
            display: flex;
        }

        .fff {
            height: 70px;
        }

        .redt {
            display: flex;
            justify-content: space-between;
        }


        .gree {
            color: #23989f;
            font-weight: bold;
        }

        .offer {
            color: #B23333;
            font-size: 18px;
        }

        .he_par {
            color: #8B96A5;
            text-decoration: line-through;
            font-size: 16px;
            font-weight: 600;
        }

        .he_price {
            color: #1C1C1C;
            font-size: 24px;
            font-weight: 600;
        }

        .price_ty.active {
            border: 1px solid #23989f;
        }

        .sts.active1 {
            border: 1px solid #23989f;
            background-color: #23989f;
            color: white;
        }
    </style>
    <section class="product product-info">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="/">Home</a></span>
                <span class="devider">/</span>
                <span><a href="/product">Shop</a></span>
                <span class="devider">/</span>
                <span><a href="#">Product Details</a></span>
            </div>
            @if ($products = App\Models\product_varient::where('id', $proid->id)->first())
                <div class="product-info-section">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="product-info-img" data-aos="fade-right">
                                <div class="swiper product-top">
                                    <div class="swiper-wrapper">
                                        @if ($desc1 = App\Models\product_child_image::where('product_id', $protbl_data->id)->get())
                                            @foreach ($desc1 as $des)
                                                <div class="swiper-slide slider-top-img zoomable">
                                                    <img class="zoomable__img"
                                                        src="{{ env('MAIN_URL') }}images/{{ $des->product_child_image }}"
                                                        alt="img">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="swiper product-bottom">
                                    <div class="swiper-wrapper">
                                        @if ($desc1 = App\Models\product_child_image::where('product_id', $protbl_data->id)->get())
                                            @foreach ($desc1 as $des)
                                                <div class="swiper-slide slider-bottom-img">
                                                    <img src="{{ env('MAIN_URL') }}images/{{ $des->product_child_image }}"
                                                        alt="img">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="product-info-content" data-aos="fade-left">

                                <form class="ads_carts" action="/checkout" method="POST">
                                    @csrf
                                    @if (Auth::check())
                                        <input type="hidden" value="{{ Auth::user()->user_id }}" name="user_id"
                                            class="user_id">
                                    @endif

                                    <input type="hidden" class="product_main_id" value="{{ $products->product_id }}"
                                        name="product_id[]">
                                    <input type="hidden" class="prd_varient_id" value="{{ $products->id }}"
                                        name="product_varient_id[]">
                                    <input type="hidden" id="proprice1" value="{{ $products->offer_price }}"
                                        name="proprice1[]">
                                    <input type="hidden" id="mrprice" value="{{ $products->mrp_price }}"
                                        name="mrpprice[]">
                                    <input type="hidden" id="progst" value="{{ $products->product_gst }}"
                                        name="gst[]">
                                    <input type="hidden" id="totalamt1" name="proprice[]"
                                        value="{{ $products->offer_price }}">

                                    @if ($productstock = App\Models\ProductStock::where('pro_ver_id', $productstock->pro_ver_id)->first())
                                        <input type="hidden" id="maxqty1" value="{{ $productstock->availablestock }}"
                                            name="available_stock[]">
                                    @endif
                                    <div class="redt">
                                        @if ($stock = App\Models\ProductStock::where('pro_ver_id', $proid->id)->first())
                                            @if ($stock->availablestock == 0)
                                                <span class="inner-text">
                                                    <p class="cresesd"><i class="fa fa-times cresesd"
                                                            aria-hidden="true"></i> Out of
                                                        stock
                                                    </p>
                                                </span>
                                            @else
                                                <span class="inner-text">
                                                    <p class="gree"><i class="fa fa-check" aria-hidden="true"></i> In
                                                        stock </p>
                                                </span>
                                            @endif
                                        @endif

                                        {{-- @if (Auth::check())
                                            <button class="wish_list_icon   add_new_wishlist_submit" type="button"><i
                                                    class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        @else
                                            <a href="/loginn" class="wish_list_icon">
                                                <button type="button">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        @endif --}}

                                        @if (Auth::check())
                                            @php
                                                $wishlists = App\Models\wishlist::where(
                                                    'user_id',
                                                    Auth::user()->user_id,
                                                )->get();
                                                $isInWishlist = $wishlists->contains(
                                                    'product_varient_id',
                                                    $products->id,
                                                );
                                            @endphp

                                            @if ($isInWishlist)
                                                <button class="add_new_wishlist_submit heartbtn" type="button"><i
                                                        class="fa fa-heart-o heart type1" aria-hidden="true"></i></button>
                                            @else
                                                <button class="wish_list_icon add_new_wishlist_submit heartbtn"
                                                    type="button"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                            @endif
                                        @else
                                            <a href="/loginn">
                                                <button type="button" class="wish_list_icon heartbtn">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        @endif




                                        {{-- @if (Auth::check())
    @php
        $wishlists = App\Models\wishlist::where('user_id', Auth::user()->user_id)->get();
        $isInWishlist = $wishlists->contains('product_varient_id', $products->id);
    @endphp

    @if ($isInWishlist)
        <button class="wish_list_icon" type="button"><i class="fa fa-heart" aria-hidden="true"></i></button>
    @else
        <button class="wish_list_icon add_new_wishlist_submit" type="button"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
    @endif

@else
    <a href="/loginn" class="wish_list_icon">
        <button type="button">
            <i class="fa fa-heart-o" aria-hidden="true"></i>
        </button>
    </a>
@endif --}}



                                    </div>

                                    @if ($desc = App\Models\product::where('id', $protbl_data->id)->first())
                                        <h5>
                                            {{ $desc->product_name }}
                                        </h5>
                                    @endif
                                    @if ($desc = App\Models\product::where('id', $protbl_data->id)->first())
                                        <p class="content-paragraph">
                                            {{ $desc->product_description }}
                                            <span class="inner-text"></span>
                                        </p>
                                    @endif
                                    {{-- <div class="newww1"> --}}
                                    <div class="col-lg-8">
                                        <div class="pases">
                                            <h5><span class="he_price">₹{{ $products->offer_price }} </span>
                                                <span class="he_par">₹{{ $products->mrp_price }}</span> <span
                                                    class="offer">(63% OFF)</span>
                                            </h5>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                    <div class="qty_lit">
                                        <div class="col-lg-6  lent">
                                            @if ($mart = App\Models\product_varient::where('id', $varient_id->id)->first())
                                                @if ($mart->varient == 1)
                                                    <h5 class="qtys">Select Liter</h5>
                                                @elseif ($mart->varient == 2)
                                                    <h5 class="qtys">Select ml</h5>
                                                @elseif ($mart->varient == 3)
                                                    <h5 class="qtys">Select grm</h5>
                                                @elseif ($mart->varient == 4)
                                                    <h5 class="qtys">Select kg</h5>
                                                @elseif ($mart->varient == 5)
                                                    <h5 class="qtys">Select nos</h5>
                                                @endif
                                            @endif

                                            <div class="litre">
                                                @foreach ($varient as $product)
                                                    @php
                                                        $fgujh = App\Models\product_varient::where(
                                                            'product_id',
                                                            $product->product_id,
                                                        )->first();
                                                        $var = $fgujh->id;

                                                    @endphp
                                                    <button class="price_ty sts {{ $var == $product->id ? 'active' : '' }}"
                                                        data-vrid={{ $product->id }} type="button">
                                                        @if ($product->varient == 1)
                                                            {{ $product->value }} Liter
                                                        @elseif ($product->varient == 2)
                                                            {{ $product->value }} ml
                                                        @elseif ($product->varient == 3)
                                                            {{ $product->value }} grm
                                                        @elseif ($product->varient == 4)
                                                            {{ $product->value }} kg
                                                        @elseif ($product->varient == 5)
                                                            {{ $product->value }} nos
                                                        @endif
                                                        <br>
                                                        <span class="price_twe">Price: ₹{{ $product->offer_price }}</span>
                                                    </button>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="col-lg-6 lent1">
                                            <div class="atrt">
                                                <h5 class="qtys">Qty</h5>
                                                <div class="prds_inr">
                                                    <button class="btn_min1" type="button"
                                                        onclick="decrement(1,this)">-</button>
                                                    <input type="number" class="input_poo1  productqty" minqty="1"
                                                        value="1" name="product_quantity[]" id="qty1"
                                                        maxqty="{{ $productstock->availablestock }}" readonly>
                                                    <button class="btn_plus1" type="button"
                                                        onclick="increment(1,this)">+</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tyty">

                                        <div class="hhh">
                                            @auth
                                                @if ($stock = App\Models\ProductStock::where('pro_ver_id', $proid->id)->first())
                                                    @if ($stock->availablestock == 0)
                                                        <button type="button" class="desc_carbtn mb-2 shop-btn" disabled>Out
                                                            Of Stock &nbsp;</button>
                                                    @else
                                                        <button class="btn home-btn1 singproduct_btn shop-btn" type="submit"
                                                            name="buynowbtn">
                                                            BUY NOW
                                                            &nbsp;<img src="/assets/img/Layer_1.svg" class="img-fluid"
                                                                alt="" style="width: 16px">
                                                        </button>
                                                    @endif
                                                @endif
                                            @else
                                                <a class="btn home-btn1 shop-btn" href="/loginn">
                                                    BUY NOW
                                                    &nbsp;<img src="/assets/images/Layer_1.svg" class="img-fluid"
                                                        alt="" style="width: 16px">
                                                </a>
                                            @endauth
                                        </div>

                                        <div class="hhh hh2">

                                            @auth
                                                @if ($stock = App\Models\ProductStock::where('pro_ver_id', $proid->id)->first())
                                                    @if ($stock->availablestock == 0)
                                                        <button type="button" class="desc_carbtn mb-2" hidden disabled>Out Of
                                                            Stock &nbsp;</button>
                                                    @else
                                                        <a class="btn home-btn2 add_new_cart_submit shop-btn"
                                                            data-bs-toggle="modal" data-bs-target="add_new_cart_submit">ADD TO
                                                            CART

                                                            <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            @else
                                                <a class="btn home-btn2 shop-btn" href="/loginn">ADD TO CART

                                                    <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                                                </a>
                                            @endauth


                                            {{-- @if (Auth::check())
                                                <a class="btn home-btn2 add_new_cart_submit shop-btn"
                                                    data-bs-toggle="modal" data-bs-target="add_new_cart_submit">ADD TO
                                                    CART

                                                    <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a class="btn home-btn2 shop-btn" href="/loginn">ADD TO CART

                                                    <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                                                </a>
                                            @endif --}}

                                        </div>

                                    </div>
                                </form>
                                <hr>


                                <div class="product-share">
                                    <p>Share This:</p>
                                    <div class="social-icons">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                            target="_blank">
                                            <span class="facebook">
                                                <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3 16V9H0V6H3V4C3 1.3 4.7 0 7.1 0C8.3 0 9.2 0.1 9.5 0.1V2.9H7.8C6.5 2.9 6.2 3.5 6.2 4.4V6H10L9 9H6.3V16H3Z"
                                                        fill="#3E75B2" />
                                                </svg>
                                            </span>
                                        </a>

                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                            target="_blank">
                                            <span class="twitter">
                                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.0722 1.60052C16.432 1.88505 15.7562 2.06289 15.0448 2.16959C15.7562 1.74278 16.3253 1.06701 16.5742 0.248969C15.8985 0.640206 15.1515 0.924742 14.3335 1.10258C13.6933 0.426804 12.7686 0 11.7727 0C9.85206 0 8.28711 1.56495 8.28711 3.48557C8.28711 3.7701 8.32268 4.01907 8.39382 4.26804C5.51289 4.12577 2.9165 2.73866 1.17371 0.604639C0.889175 1.13814 0.71134 1.70722 0.71134 2.34742C0.71134 3.5567 1.31598 4.62371 2.27629 5.26392C1.70722 5.22835 1.17371 5.08608 0.675773 4.83711V4.87268C0.675773 6.5799 1.88505 8.00258 3.48557 8.32268C3.20103 8.39382 2.88093 8.42938 2.56082 8.42938C2.34742 8.42938 2.09845 8.39382 1.88505 8.35825C2.34742 9.74536 3.62784 10.7768 5.15722 10.7768C3.94794 11.7015 2.45412 12.2706 0.818041 12.2706C0.533505 12.2706 0.248969 12.2706 0 12.2351C1.56495 13.2309 3.37887 13.8 5.37062 13.8C11.8082 13.8 15.3294 8.46495 15.3294 3.84124C15.3294 3.69897 15.3294 3.52113 15.3294 3.37887C16.0052 2.9165 16.6098 2.31186 17.0722 1.60052Z"
                                                        fill="#3FD1FF" />
                                                </svg>
                                            </span>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                                            target="_blank"><img src="/assets/img/wha.png" class="img-fluid "
                                                alt="" style="width: 24px;"></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="product-description singleblog">
        <div class="container">
            <div class="product-detail-section">
                <nav>
                    <div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Description</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
                            type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">Instruction</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-benifit"
                            type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">
                        Benifits</button>

                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0" data-aos="fade-up">
                        @if ($desc = App\Models\product::where('id', $protbl_data->id)->first())
                            <div class="product-intro-section">
                                {{-- <h5 class="intro-heading">Introduction</h5> --}}
                                <p class="product-details">
                                    {{ $desc->product_specification }}

                                </p>
                            </div>
                        @endif

                    </div>


                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
                        <div class="product-review-section" data-aos="fade-up">


                            <div class="review-wrapper">
                                <div class="wrapper">
                                    <div class="wrapper-aurthor">
                                        <div class="wrapper-info">
                                            @if ($descaa = App\Models\product::where('id', $protbl_data->id)->first())
                                            <div class="author-details">
                                                {{-- <h5 class="intro-heading">Introduction</h5> --}}
                                                <p class="product-details">
                                                    {!! $descaa->product_instruction !!}

                                                </p>
                                            </div>
                                           @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-benifit" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
                        <div class="product-review-section" data-aos="fade-up">
                            <div class="review-wrapper">
                                <div class="wrapper">
                                    <div class="wrapper-aurthor">
                                        <div class="wrapper-info">
                                    @if ($benefit = App\Models\product::where('id', $protbl_data->id)->first())
                                    <div class="author-details">
                                        <p class="product-details">{!! $benefit->product_benifit !!}</p>
                                    </div>

                                   @endif
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




    {{-- <section class="product weekly-sale product-weekly footer-padding">
        <div class="container">
            <div class="section-title">
                <h5>Related Images</h5>
            </div>
            <div class="weekly-sale-section">
                <div class="row g-5">
                    @if ($relateproduct = App\Models\product::where('category_id', $protbl_data->category_id)->where('id', '!=', $protbl_data->id)->get())


                        @foreach ($relateproduct as $rproduct)
                            <div class="col-lg-3 col-md-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <a href=""><img
                                                src="{{ env('MAIN_URL') }}images/{{ $rproduct->product_image }}"
                                                alt="Related Image">
                                        </a>
                                        <div class="product-cart-items">
                                            <a href="#" class="cart cart-item">
                                                <span>
                                                    <svg width="40" height="40" viewBox="0 0 40 40"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="40" height="40" rx="20"
                                                            fill="white" />
                                                        <path
                                                            d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                            fill="#181818" />
                                                        <path
                                                            d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                            fill="black" fill-opacity="0.2" />
                                                        <path
                                                            d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                            fill="#181818" />
                                                        <path
                                                            d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                            fill="black" fill-opacity="0.2" />
                                                        <path
                                                            d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                            fill="#181818" />
                                                        <path
                                                            d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                            fill="black" fill-opacity="0.2" />
                                                        <path
                                                            d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                            fill="#181818" />
                                                        <path
                                                            d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                            fill="black" fill-opacity="0.2" />
                                                    </svg>
                                                </span>
                                            </a>

                                            @if (Auth::check())
                                                <a class="add_new_wishlist_submit">
                                                    <span>
                                                        <svg width="40" height="40" viewBox="0 0 40 40"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="40" height="40" rx="20"
                                                                fill="#23989f" />
                                                            <path
                                                                d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                                fill="#000" />
                                                        </svg>

                                                    </span>
                                                </a>
                                            @else
                                                <a href="/loginn" class="wish_list_icon">
                                                    <span>
                                                        <svg width="40" height="40" viewBox="0 0 40 40"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="40" height="40" rx="20"
                                                                fill="#23989f" />
                                                            <path
                                                                d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                                fill="#000" />
                                                        </svg>

                                                    </span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-description">

                                            <a href=" " class="product-details">{{ $rproduct->product_name }}
                                            </a>
                                            @if ($productvar = App\Models\product_varient::where('product_id', $protbl_data->id)->Where('product_id', '!=', $protbl_data->id)->first())
                                                <div class="price">
                                                    <span class="price-cut">₹{{ $productvar->mrp_price }}</span>
                                                    <span class="new-price">₹{{ $productvar->offer_price }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-cart-btn">
                                        @if (Auth::check())
                                            <a class="product-btn add_new_cart_submit" data-bs-toggle="modal"
                                                data-bs-target="add_new_cart_submit">ADD TO CART

                                            </a>
                                        @else
                                            <a class="product-btn" href="/loginn">ADD TO CART

                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section> --}}


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Your PHP variables
            var offerPrice = @json($products->offer_price);
            var mrpPrice = @json($products->mrp_price);

            // Update elements with these values
            $('.he_price').text('₹' + offerPrice);
            $('.he_par').text('₹' + mrpPrice);

            // Calculate discount
            var discount = ((mrpPrice - offerPrice) / mrpPrice) * 100;
            $(".offer").text('(' + discount.toFixed(2) + "%" + ')');
        });
    </script>

@endsection
