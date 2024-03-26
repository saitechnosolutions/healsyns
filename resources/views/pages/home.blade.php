@php

    use App\Models\product;
    use App\Models\product_varient;

@endphp
@extends('layout.default')
@section('content')
<style>

.header .lead {
  max-width: 620px;
}
.gallery-container a {
  width: 240px;
  margin: 5px;
}

.gallery-container a img {
  max-width: 100%;
  height: auto;
}

 .testimonial-area {
    padding: 20px 0px 150px 0px;
}
.button {
    padding: 1.4rem 4.6rem;
  margin: 4rem 0;
  text-align: center;
  border-radius: 3rem;
  display: inline-block;
  background: #23989f;
  font-size: 1.6rem;
  font-weight: 500;
  position: relative;
  color: #FFFFFF;
  font-family: "Inter", sans-serif;
  transition: all 0.3s;
  overflow: hidden;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


.style-section .wrapper-subtitle {

    font-size: 2.4rem;
    font-weight:500;
}

.vvimg{
    background: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    border: 0px solid rgb(0, 0, 0);
    box-shadow: rgb(0, 0, 0) 0px 0px 0px;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 2px;
    width: 50px;
    gap: 0px;
    height: 50px;
    display: flex;
    padding: 0px;
    margin: -20px 0px 0px;
    flex-shrink: 0;
    z-index: 1;
    position: relative;
    font-size: inherit;
    overflow: hidden;
    flex-grow: 0;
    object-fit: cover;
    object-position: center top;

    left: 35%;
}
.product-wrapper .newvideo{
    height:10rem;
}
.newvv{
    width: 100%;
    padding: 0 0 10px 0;
    border-radius: 1.2rem;
    background-color: #FFFFFF;
    font-family: "Jost", sans-serif;
    cursor: pointer;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    position: relative;
    transition: all 0.2s;
    border: 1px solid #FFFFFF;
    overflow: hidden;

}
</style>

    <section id="heroo" class="heroo">
        <div class="swiper hero-swiper">

            <div class="swiper-wrapper hero-wrapper ">
                @if ($banners = App\Models\web_image::all())
                @foreach ($banners as $ban)
                    <div class="swiper-slide hero-slider-one ban1" style=" background:url('{{ env('MAIN_URL') }}images/{{ $ban->image }}') no-repeat center / cover !important">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle"><span class="wrapper-inner-title"></span>
                                    </h5>
                                    <h1 class="wrapper-details"></h1>
                                    {{-- <a href="/product" class="shop-btn"></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section style="margin-top: 5px;">
        <div class="half-half-image-text"  style="background: url('assets/img/shape-1.png')no-repeat center;background-size:cover;">
            <div class="container">

              <div class="row">
                <div class="col-12 col-lg-7 col-md-6">
                    <div class="img" style="background: url('assets/img/ab1.jpg')no-repeat center;background-size:cover;" data-aos="fade-right"></div>
                  </div>

                <div class="col-12 col-lg-5 col-md-6">

                  <div class="content">
                    <h5 style="text-align:center">About Us</h5>
                   <p  data-aos="fade-up-left" style="margin-top: 50px;">We are a preventive and functional health management company that aims to preserve good health and enrich cell vitality !!</p>
                   <a href="/about" data-aos="zoom-in-up"><button class="button" style="vertical-align:middle"><span>Know More</span></button>
                   </a>
                   </div>

                </div>


              </div>
            </div>
        </div>
    <section>
{{-- ---------------------------------------------Our Categories------------------------------------------------ --}}
    <section class="product fashion-style">
        <div class="container">
            <div class="section-title" style="margin-bottom: 4rem;">
                <h5 >Our Categories</h5>
                <a href="/product" class="view">View All</a>
            </div>
            <div class="style-section cat1">
                <div class="row gy-4 gx-5 gy-lg-0">
                    @if ($category = App\Models\category::all())
                    @foreach ($category->take(4) as $cat)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                        <div class="product-wrapper wrapper-two tty" data-aos="fade-up" style="background:url('{{ env('MAIN_URL') }}images/{{ $cat->category_image }}') no-repeat center / cover !important">
                            <div class="wrapper-info ggg3">
                                <span class="wrapper-subtitle">{{ $cat->category_name }}</span>

                                <a href="/product?categoryid=category-{{ $cat->id }}" class="shop-btn">Shop Now

                                    <span>
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                                transform="rotate(45 1.45312 0.914062)" />
                                            <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                                transform="rotate(135 8 7.45703)" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>

                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>

{{-- ----------------------------------------------Videos------------------------------------------------------ --}}
<section class="product arrival">
    <div class="container">
        <div class="section-title">
            <h5>Videos</h5>
        </div>
        <div class="arrival-section newww ">
            <div class="row g-5">
                <div class="autoplay">
                {{-- @if ($videos = App\Models\product::all()) --}}
                @if ($videos = App\Models\product::where('delete_status','0')->get())
                    @foreach ($videos->take(6) as $video)
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="newvv dvideo" data-aos="fade-up">
                                <div class="product-img newvideo" data-bs-toggle="modal" data-bs-target="#videoModal{{$video->id}}"
                                     data-video="{{ env('MAIN_URL') }}images/{{ $video->t_video }}"
                                     data-image="{{ env('MAIN_URL') }}images/{{ $video->product_image }}"
                                     data-name="{{ $video->product_name }}">
                                    <div class="i1">
                                        <video preload="none" loop="true" autoplay="true" playsinline="true"
                                               muted="true" mediatype="video"
                                               src="{{ env('MAIN_URL') }}images/{{ $video->t_video }}"
                                               style="border-radius: 2px; object-fit: cover; object-position: center top; z-index: 1; border: 0px solid rgb(255, 255, 255); width: 100%;"
                                               id="myVideo{{$video->id}}"></video>
                                    </div>
                                    <div class="mm2">
                                        <div class="vvimg">
                                            <img src="{{ env('MAIN_URL') }}images/{{ $video->product_image }}"
                                                 alt="videoimg">
                                        </div>
                                        <div class="product-description" style="text-align: center;">
                                            <a href="#" class="product-details">{{ $video->product_name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
            </div>
        </div>
    </div>
</section>
{{-- @if ($videos = App\Models\Product::all()) --}}
@if ($videos = App\Models\product::where('delete_status','0')->get())

@foreach ($videos->take(6) as $video)
  {{-- video model --}}
  <div class="modal fade" id="videoModal{{$video->id}}" tabindex="-1" aria-labelledby="videoModalLabel{{$video->id}}" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header"  style="border: white">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row mvideo">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <video width="100%" controls>
                        <source src="{{ env('MAIN_URL') }}images/{{ $video->t_video }}" type="video/mp4"  style="border-radius: 2px; object-fit: cover; object-position: center top; z-index: 1; border: 0px solid rgb(255, 255, 255);">
                    </video>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="video-details">
                    <img src="{{ env('MAIN_URL') }}images/{{ $video->product_image }}" alt="{{$video->product_name}}" style="width: 220px;
                    padding-bottom:10px">
                    <br>
                    <p style="line-height:1.4;font-size:14px;text-align:left;font-weight:400;color:black;padding-bottom:10px;text-align:center;">{{$video->product_name}}</p>

                    <p style="line-height:1.4;font-size:14px;text-align:left;font-weight:400;color:black;padding-bottom:10px;text-align:justify;">{{$video->product_specification}}</p>
                  </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@endforeach
@endif

{{--------------------------------------------------All product----------------------------------------------------------------------  --}}
<section class="product top-selling homee">
            <div class="container">
                <div class="section-title">
                    <h5>All Products</h5>
                    <a href="/product" class="view">View All</a>
                </div>
                <div class="top-selling-section">
                    @php
                $allProducts = Product::select('id')
                    ->where('delete_status', 0)
                    ->get()
                    ->toArray();

                $productVariants = product_varient::where('delete_status','0')->get()->groupBy('product_id');

                $products = collect();

                $counter = 0; // Counter variable to limit the number of images to six

                foreach ($allProducts as $product) {
                    $productId = $product['id'];

                    // Check if the product has variants
                    if ($productVariants->has($productId)) {
                        // Get the first product variant for the current product
                        $firstProductVariant = $productVariants[$productId]->first();

                        // Add it to the collection
                        $products->push($firstProductVariant);

                        // Increment the counter
                        $counter++;

                        // Break the loop if the counter reaches six
                        if ($counter == 6) {
                            break;
                        }
                    }
                }
            @endphp
                    <div class="row g-5">
                        @if ($products)
                        @foreach ($products as $pr)
                        <div class="col-lg-4 col-md-6 {{ $pr->categoryid }}">

                            <form class="ads_carts">
                                @csrf
                                @if (Auth::check())
                                    <input type="hidden"
                                        value="{{ Auth::user()->user_id }}"
                                        name="user_id" class="user_id">
                                @endif

                                {{-- @if ($var = App\Models\product_varient::where('product_id', $pr->product_id)->first()) --}}
                                <input type="hidden" value="{{ $pr->product_id }}"
                                    name="product_main_id" class="product_main_id">
                                {{-- @endif --}}

                                <input type="hidden" name="prd_varient_id"
                                    value="{{ $pr->id }}" class="prd_varient_id">

                                    {{-- <input type="number" hidden
                                    class="input_poo  productqty  ali_in" value="1"
                                    name="productqty" readonly> --}}

                                    <input type="number" hidden class="input_poo  productqty  ali_in" id="hair-{{ $pr->id }}-number"
                                    min="1" max="100" value="1"  name="productqty" readonly>


                         @if ($vrs = App\Models\product::where('id', $pr->product_id)->first())
                            <div class="product-wrapper" data-aos="fade-right">
                                <div class="product-img">
                                        <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}">
                                        <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                            class="img-fluid" alt=""></a>
                        @endif
                                    <div class="product-cart-items">
                                        <a  href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}" class="cart cart-item">
                                            <span>
                                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="40" height="40" rx="20" fill="white" />
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
                                        @php
                                            $wishlists = App\Models\wishlist::where('user_id', Auth::user()->user_id)->get();
                                            $isInWishlist = $wishlists->contains('product_id',$pr->product_id);
                                        @endphp

                                        @if ($isInWishlist)
                                            <button class="add_new_wishlist_submit " type="button"><i class="fa fa-heart-o heart type1" aria-hidden="true"></i></button>
                                        @else
                                            <button class="wish_list_icon add_new_wishlist_submit" type="button"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        @endif

                                        @else
                                        <a href="/loginn">
                                            <button type="button" class="wish_list_icon" >
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        @endif


                                    </div>
                                </div>
                                <div class="product-info">

                                    <div class="product-description">

                                        <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}" class="product-details">
                                            @if ($vrs = App\Models\product::where('id', $pr->product_id)->first())
                                            {{ $vrs->product_name }}
                                            @endif
                                        </a>
                                        <div class="price">
                                            <span class="price-cut">{{ $pr->mrp_price }}</span>
                                            <span class="new-price">₹{{ $pr->offer_price }}</span>
                                        </div>
                                    </div>
                                </div>
                             <div class="add_to_cart">
                                <div class="product-cart-btn">
                                    @php
                                    $products_varient = App\Models\product_varient::where('id', $pr->id)->first();

                                    @endphp

                                    @if ($stock = App\Models\ProductStock::where('pro_ver_id', $products_varient->id)->first())
                                    @if ($stock->availablestock == 0)
                                    <a class="product-btn">Out of stock</a>
                                    {{-- <div class="d-flex justify-content-center"><button class="cart_btn " type="button">Out Of Stock</button></div> --}}
                                    @else

                                    @if (Auth::check())
                                    <a href="/mycart" class="product-btn theme-btn1 add_new_cart_submit" data-bs-toggle="modal"
                                    data-bs-target="add_new_cart_submit">Add To Cart</a>
                                    @else
                                    <a href="/loginn" class="product-btn">Add To Cart</a>
                                    @endif

                                    @endif
                                    @endif


                                </div>

                            </div>




                            </div>
                        </form>
                        </div>


                       @endforeach
                      @endif

                    </div>
                </div>
            </div>
</section>
    {{-- <section class="product flash-sale">
        <div class="container">
            <div class="section-title">
                <h5>Hot deals</h5>

                <a href="/product" class="view">View All</a>
            </div>
            <div class="flash-sale-section">
                <div class="row g-5">
                    @if ($hotproducts = App\Models\product_varient::where('hot_deals', 1)->get())
                    @foreach ($hotproducts as $hpro)
                    <div class="col-lg-2 col-md-6">

                        <div class="product-wrapper" data-aos="fade-right" data-aos-duration="200">
                            <div class="product-img">


                                    @if ($vrs = App\Models\product::where('id', $hpro->product_id)->first())
                                    <div class="product-img">
                                        <a href="/singleproducts/{{ $hpro->id }}/{{ $hpro->product_id }}"> <img
                                                src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                                class="img-fluid" alt=""></a>
                                    </div>
                                     @endif

                                <div class="product-cart-items">
                                    <a href="/singleproduct" class="cart cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="20" fill="white" />
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
                                    <a href="/mywishlist" class="favourite cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="20" fill="#23989f" />
                                                <path
                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                    fill="#000" />
                                            </svg>

                                        </span>
                                    </a>

                                </div>
                            </div>
                            <div class="product-info">

                                <div class="product-description">
                                    <a href="/singleproduct/{{ $hpro->id }}/{{ $hpro->product_id }}" class="product-details">
                                        @if ($vrs = App\Models\product::where('id', $hpro->product_id)->first())
                                        {{ $vrs->product_name }}
                                        @endif
                                    </a>

                                    <div class="price">
                                        <span class="price-cut">₹{{ $hpro->mrp_price }}</span>
                                        <span class="new-price">₹{{ $hpro->offer_price }} </span>
                                    </div>
                                </div>


                            </div>
                            <div class="product-cart-btn">
                                <a href="/mycart" class="product-btn">Add To Cart</a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                        @endif


                </div>
            </div>
        </div>
    </section> --}}

<section>
        <div class="container carding">
            <div class="grid cardd">
                <article class="article">
                    <figure class="article__figure"><img class="article__cover" src="assets/img/k1.png">
                      <figcaption class="article__caption">
                        <h2 class="article__title" style="background: #D8F6F8">
                            WE ARE PREVENTIVE AND FUNCTIONAL HEALTH MANAGEMENT COMPANY THAT AIMS TO PRESERVE GOOD HEALTH AND ENRICH CELL VITALITY!!
                            </h2>

                    </figcaption>
                    </figure>
                  </article>
              <article class="article">
                <figure class="article__figure"><img class="article__cover" src="assets/img/k2.png">
                  <figcaption class="article__caption">
                    <h2 class="article__title" >DIGESTIVE HEALTH ENSURES OVERALL HEALTH!!
                    </h2>
                    <p class="article__info">If you wish “one drink- multiple benefits “- then it’s our Cider detox for sure!! Acv has been proven to improve fat metabolism and carbohydrate metabolism. The use of fermented drink has been a century old practice in many parts of the world.</p>
                  </figcaption>
                </figure>
              </article>
              <article class="article">
                <figure class="article__figure"><img class="article__cover"  src="assets/img/k3.png">
                  <figcaption class="article__caption">
                    <h2 class="article__title">ANTI OXIDANT IS THE NEED OF THE HOUR!!</h2>
                    <p class="article__info">If you wish to protect your overall health from the ill effects of stress, work overload, emotional overwhelms, then Master detox is the best way for it!!! It has the combination of mother of anti-oxidants for enriching and protecting health.</p>
                  </figcaption>
                </figure>
              </article>
              <article class="article">
                <figure class="article__figure"><img class="article__cover" src="assets/img/k4.png">
                  <figcaption class="article__caption">
                    <h2 class="article__title">KEEP IT MIMINAL!!</h2>
                    <p class="article__info">If you know the truth that “when it comes to Skincare minimal is the best option “, pick our Retexture wipes with the right combination of aha bha for easier and effective Skincare.
                    </p>
                  </figcaption>
                </figure>
              </article>


            </div>
          </div>
</section>

            <!--------------- best-sell-section-end--------------->
    <section class="latest product blog11">
        <div class="container">
            <div class="blog-section latest-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-sm-6">
                        <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                            {{-- <div class="wrapper-img">
                                <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="img">
                            </div> --}}
                            <div class="wrapper-info">

                                <h2 class="about-details wrapper-details">International Journal of Research
                                </h2>
                                <p>Effect of Triphala Guggulu and Punarnava Mandoor in the management of Obesity : An Observation Study.</p>
                                <div class="divider"></div>

                                <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7685257/" class="shop-btn" target="blank">
                                    Learn More
                                    <span>
                                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.6227 4.38176C12.5587 4.38176 12.4989 4.38176 12.4349 4.38176C8.56302 4.38176 4.69114 4.38176 0.819254 4.38176C0.7168 4.38176 0.614347 4.37785 0.516163 4.40129C0.195996 4.4677 -0.0302552 4.76459 0.00389589 5.05758C0.0423159 5.37791 0.302718 5.60839 0.644229 5.62793C0.712532 5.63183 0.780834 5.63183 0.853405 5.63183C4.71248 5.63183 8.57583 5.63183 12.4349 5.63183C12.4989 5.63183 12.5587 5.63183 12.6654 5.63183C12.5971 5.69824 12.5587 5.73731 12.516 5.77637C11.3805 6.8194 10.2407 7.86243 9.10517 8.90546C8.82342 9.16329 8.79354 9.51878 9.0326 9.77661C9.27166 10.0383 9.68574 10.0774 9.98029 9.86646C10.0272 9.8352 10.0657 9.79614 10.1084 9.75707C11.6494 8.34684 13.1905 6.93269 14.7273 5.51855C15.0987 5.17868 15.0987 4.83882 14.7273 4.49895C13.1777 3.077 11.6238 1.65504 10.0742 0.229172C9.8693 0.0416615 9.63878 -0.0481874 9.35276 0.0260357C8.88319 0.147137 8.70389 0.670605 9.00698 1.01437C9.0454 1.06125 9.09236 1.10032 9.13932 1.14329C10.2663 2.1746 11.389 3.20982 12.5203 4.24113C12.563 4.28019 12.6185 4.29972 12.6654 4.33098C12.6483 4.34269 12.6355 4.36223 12.6227 4.38176Z"
                                                fill="#23989f" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                            {{-- <div class="wrapper-img">
                                <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="img">
                            </div> --}}
                            <div class="wrapper-info">

                               <h2 class="about-details wrapper-details">International Journal of Research
                                </h2>
                                <p>Effect of Triphala Guggulu and Punarnava Mandoor in the management of Obesity : An Observation Study.</p>
                                <div class="divider"></div>

                                <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7685257/" class="shop-btn"  target="blank">
                                    Learn More
                                    <span>
                                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.6227 4.38176C12.5587 4.38176 12.4989 4.38176 12.4349 4.38176C8.56302 4.38176 4.69114 4.38176 0.819254 4.38176C0.7168 4.38176 0.614347 4.37785 0.516163 4.40129C0.195996 4.4677 -0.0302552 4.76459 0.00389589 5.05758C0.0423159 5.37791 0.302718 5.60839 0.644229 5.62793C0.712532 5.63183 0.780834 5.63183 0.853405 5.63183C4.71248 5.63183 8.57583 5.63183 12.4349 5.63183C12.4989 5.63183 12.5587 5.63183 12.6654 5.63183C12.5971 5.69824 12.5587 5.73731 12.516 5.77637C11.3805 6.8194 10.2407 7.86243 9.10517 8.90546C8.82342 9.16329 8.79354 9.51878 9.0326 9.77661C9.27166 10.0383 9.68574 10.0774 9.98029 9.86646C10.0272 9.8352 10.0657 9.79614 10.1084 9.75707C11.6494 8.34684 13.1905 6.93269 14.7273 5.51855C15.0987 5.17868 15.0987 4.83882 14.7273 4.49895C13.1777 3.077 11.6238 1.65504 10.0742 0.229172C9.8693 0.0416615 9.63878 -0.0481874 9.35276 0.0260357C8.88319 0.147137 8.70389 0.670605 9.00698 1.01437C9.0454 1.06125 9.09236 1.10032 9.13932 1.14329C10.2663 2.1746 11.389 3.20982 12.5203 4.24113C12.563 4.28019 12.6185 4.29972 12.6654 4.33098C12.6483 4.34269 12.6355 4.36223 12.6227 4.38176Z"
                                                fill="#23989f" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                            {{-- <div class="wrapper-img">
                                <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="img">
                            </div> --}}
                            <div class="wrapper-info">

                               <h2 class="about-details wrapper-details">International Journal of Research
                                </h2>
                                <p>Effect of Triphala Guggulu and Punarnava Mandoor in the management of Obesity : An Observation Study.</p>
                                <div class="divider"></div>

                                <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7685257/" class="shop-btn"  target="blank">
                                    Learn More
                                    <span>
                                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.6227 4.38176C12.5587 4.38176 12.4989 4.38176 12.4349 4.38176C8.56302 4.38176 4.69114 4.38176 0.819254 4.38176C0.7168 4.38176 0.614347 4.37785 0.516163 4.40129C0.195996 4.4677 -0.0302552 4.76459 0.00389589 5.05758C0.0423159 5.37791 0.302718 5.60839 0.644229 5.62793C0.712532 5.63183 0.780834 5.63183 0.853405 5.63183C4.71248 5.63183 8.57583 5.63183 12.4349 5.63183C12.4989 5.63183 12.5587 5.63183 12.6654 5.63183C12.5971 5.69824 12.5587 5.73731 12.516 5.77637C11.3805 6.8194 10.2407 7.86243 9.10517 8.90546C8.82342 9.16329 8.79354 9.51878 9.0326 9.77661C9.27166 10.0383 9.68574 10.0774 9.98029 9.86646C10.0272 9.8352 10.0657 9.79614 10.1084 9.75707C11.6494 8.34684 13.1905 6.93269 14.7273 5.51855C15.0987 5.17868 15.0987 4.83882 14.7273 4.49895C13.1777 3.077 11.6238 1.65504 10.0742 0.229172C9.8693 0.0416615 9.63878 -0.0481874 9.35276 0.0260357C8.88319 0.147137 8.70389 0.670605 9.00698 1.01437C9.0454 1.06125 9.09236 1.10032 9.13932 1.14329C10.2663 2.1746 11.389 3.20982 12.5203 4.24113C12.563 4.28019 12.6185 4.29972 12.6654 4.33098C12.6483 4.34269 12.6355 4.36223 12.6227 4.38176Z"
                                                fill="#23989f" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                            {{-- <div class="wrapper-img">
                                <img src="./assets/images/homepage-one/about/blog-img-1.webp" alt="img">
                            </div> --}}
                            <div class="wrapper-info">

                               <h2 class="about-details wrapper-details">International Journal of Research
                                </h2>
                                <p>Effect of Triphala Guggulu and Punarnava Mandoor in the management of Obesity : An Observation Study.</p>
                                <div class="divider"></div>

                                <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7685257/" class="shop-btn"  target="blank">
                                    Learn More
                                    <span>
                                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.6227 4.38176C12.5587 4.38176 12.4989 4.38176 12.4349 4.38176C8.56302 4.38176 4.69114 4.38176 0.819254 4.38176C0.7168 4.38176 0.614347 4.37785 0.516163 4.40129C0.195996 4.4677 -0.0302552 4.76459 0.00389589 5.05758C0.0423159 5.37791 0.302718 5.60839 0.644229 5.62793C0.712532 5.63183 0.780834 5.63183 0.853405 5.63183C4.71248 5.63183 8.57583 5.63183 12.4349 5.63183C12.4989 5.63183 12.5587 5.63183 12.6654 5.63183C12.5971 5.69824 12.5587 5.73731 12.516 5.77637C11.3805 6.8194 10.2407 7.86243 9.10517 8.90546C8.82342 9.16329 8.79354 9.51878 9.0326 9.77661C9.27166 10.0383 9.68574 10.0774 9.98029 9.86646C10.0272 9.8352 10.0657 9.79614 10.1084 9.75707C11.6494 8.34684 13.1905 6.93269 14.7273 5.51855C15.0987 5.17868 15.0987 4.83882 14.7273 4.49895C13.1777 3.077 11.6238 1.65504 10.0742 0.229172C9.8693 0.0416615 9.63878 -0.0481874 9.35276 0.0260357C8.88319 0.147137 8.70389 0.670605 9.00698 1.01437C9.0454 1.06125 9.09236 1.10032 9.13932 1.14329C10.2663 2.1746 11.389 3.20982 12.5203 4.24113C12.563 4.28019 12.6185 4.29972 12.6654 4.33098C12.6483 4.34269 12.6355 4.36223 12.6227 4.38176Z"
                                                fill="#23989f" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>


{{-- ----------------------------------------------------New arrival----------------------------------------------------------- --}}
    <section class="product top-selling homee">
        <div class="container">
            <div class="section-title">
                <h5>New Arrivals</h5>
                <a href="/product" class="view">View All</a>
            </div>
            <div class="top-selling-section">
                <div class="row g-5">
                    @php
                //    $newProducts = Product::select('id')->get()->toArray();
                $newProducts = Product::where('delete_status', '0')->select('id')->get()->toArray();
                    $newProducts = Product::where('delete_status', '0')->orderBy('id', 'desc')->get()->toArray();

                    $products = collect();

                    $counter = 0; // Counter variable to limit the number of images to six

                    foreach ($newProducts as $product) {
                        $productId = $product['id'];

                        // Check if the product has variants
                        if ($productVariants->has($productId)) {
                            // Get the last updated product variant for the current product
                            $lastUpdatedProductVariant = $productVariants[$productId]->first();

                            // Add it to the collection
                            $products->push($lastUpdatedProductVariant);

                            // Increment the counter
                            $counter++;

                            // Break the loop if the counter reaches six
                            if ($counter == 6) {
                                break;
                            }
                        }
                    }
                @endphp

    @if ($products)
        @foreach ($products as $pr)
            <div class="col-lg-4 col-md-6 {{ $pr->categoryid }}">
                <form class="ads_carts">
                    @csrf
                    @if (Auth::check())
                        <input type="hidden"
                            value="{{ Auth::user()->user_id }}"
                            name="user_id" class="user_id">
                    @endif

                    {{-- @if ($var = App\Models\product_varient::where('product_id', $pr->product_id)->first()) --}}
                    <input type="hidden" value="{{ $pr->product_id }}"
                        name="product_main_id" class="product_main_id">
                    {{-- @endif --}}

                    <input type="hidden" name="prd_varient_id"
                        value="{{ $pr->id }}" class="prd_varient_id">

                        {{-- <input type="number" hidden
                        class="input_poo  productqty  ali_in" value="1"
                        name="productqty" readonly> --}}

                        <input type="number" hidden class="input_poo  productqty  ali_in" id="hair-{{ $pr->id }}-number"
                        min="1" max="100" value="1"  name="productqty" readonly>

                @if ($vrs = App\Models\product::where('id', $pr->product_id)->first())
                    <div class="product-wrapper" data-aos="fade-right">
                        <div class="product-img">
                            {{-- <img src="./assets/img/N1.png"
                                alt="product-img"> --}}
                                <a
                                href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}">
                                <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                    class="img-fluid" alt=""></a>

                            <div class="product-cart-items">
                                <a  href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}" class="cart cart-item">
                                    <span>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="20" fill="white" />
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
                                @php
                                    $wishlists = App\Models\wishlist::where('user_id', Auth::user()->user_id)->get();
                                    $isInWishlist = $wishlists->contains('product_id',$pr->product_id);
                                @endphp

                                @if ($isInWishlist)
                                    <button class="add_new_wishlist_submit " type="button"><i class="fa fa-heart-o heart type1" aria-hidden="true"></i></button>
                                @else
                                    <button class="wish_list_icon add_new_wishlist_submit" type="button"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                @endif

                                @else
                                <a href="/loginn">
                                    <button type="button" class="wish_list_icon" >
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </button>
                                </a>
                                @endif

                            </div>
                        </div>
                        <div class="product-cart-items">
                            <!-- Add your cart and wishlist buttons here -->
                        </div>
                        <div class="product-info">
                            <div class="product-description">
                                <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}" class="product-details">
                                    {{ $vrs->product_name }}
                                </a>
                                <div class="price">
                                    <span class="price-cut">{{ $pr->mrp_price }}</span>
                                    <span class="new-price">₹{{ $pr->offer_price }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="add_to_cart">
                            <div class="product-cart-btn">

                                @php
                                // $products_varient = App\Models\product_varient::where('id', $pr->id)->first();

                                // $products_varient = product_varient::where('delete_status', '0')->where('id', $pr->id)->get()->first();
                                $products_varient = product_varient::where('delete_status', '0')->where('id', $pr->id)->get()->first();


                                @endphp

                                @if ($stock = App\Models\ProductStock::where('pro_ver_id', $products_varient->id)->first())
                                @if ($stock->availablestock == 0)
                                <a class="product-btn theme-btn1">Out of stock</a>
                                {{-- <div class="d-flex justify-content-center"><button class="cart_btn " type="button">Out Of Stock</button></div> --}}
                                @else

                                @if (Auth::check())
                               <a href="/mycart" class="product-btn theme-btn1 add_new_cart_submit" data-bs-toggle="modal"
                                data-bs-target="add_new_cart_submit">Add To Cart</a>
                                @else
                                <a href="/loginn" class="product-btn">Add To Cart</a>
                                @endif

                                @endif
                                @endif

                            {{-- @if (Auth::check())
                            <a href="/mycart" class="product-btn theme-btn1 add_new_cart_submit" data-bs-toggle="modal"
                            data-bs-target="add_new_cart_submit">Add To Cart</a>
                            @else
                            <a href="/loginn" class="product-btn">Add To Cart</a>
                            @endif --}}


                        </div>

                        </div>


                    </div>
                @endif
                </form>
            </div>
        @endforeach
    @endif
        </div>
            </div>
        </div>
    </section>


{{-- slick carosol --}}
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.autoplay').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }

  ]
            });

        });
    </script>

@endsection

    {{-- <div class="testimonial-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="section-header text-center">

						<h2>What Clients Says</h2>

                    </div>
				</div>
				<div class="col-sm-12">

                        <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" id="carouselExampleIndicators">
                        <div class="carousel-indicators">
							<button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
                                <div class="icon-area">
									<i class="fa fa-comments"></i>
								</div>
								<div class="content text-center">
									<p>
                                        Don't think if the product makes any difference to your muscle, i mean it may not that be effective but taste wise this is the best in the market. sugar level is perfect in terms of quantity. don't compare it with the whey protein this belongs to different category of protein.</p>
                                    <div class="person"><img  src="assets/img/p11.png" alt=""></div>
									<h5>Ricky Makkar</h5>

								</div>
							</div>
							<div class="carousel-item">
								<div class="icon-area">
									<i class="fa fa-comments"></i>
								</div>
								<div class="content text-center">
									<p>Good nutrition drink as compared to other alternative available in terms of daily nutrition requirement. The reason it makes better than other alternative is the presence of blend of three protein and their quantity. The daily protein we need is 0.8 gm x (our weight). This drink completes the one third part of our daily protein need. And that's a good thing. A worth try!</p>
									<div class="person"><img src="assets/img/p12.png"></div>
									<h5>Rampal Singh</h5>

								</div>
							</div>
							<div class="carousel-item">
								<div class="icon-area">
									<i class="fa fa-comments"></i>
								</div>
								<div class="content text-center">
									<p>Fantastic... Really nutritious.. Everyone must take this... 5 star product... For complete the nutrition index of protein... which is required in daily LIFE IT'S GOOD BUT .. Remember it's not that kind of protein like MUSCLE BLAZE OR ASITIS CONCENTRATE OR ISOLATE ... SO FIRST CLEAR THE CONCEPT OF WHAT KIND OF PROTEIN IS THIS IN YOUR MIND BEFORE PURCHASE THIS PRODUCT</p>
									<div class="person"><img src="assets/img/p11.png"></div>
									<h5>Ankur lal</h5>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

    {{-- <section class="product best-seller">
        <div class="container">
            <div class="best-selling-section">
                <div class="sec">
                    <h5 style="text-align: center;padding-bottom:15px;">Best Sellers</h5>

                </div>
                <div class="best-selling-items">

                    <div class="product-wrapper">
                        <div class="wrapper-img">
                            <span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"/></svg>
                                </span>
                            </span>
                        </div>
                        <div class="wrapper-info">
                            <a href="seller-sidebar.html" class="wrapper-details">Free Delivery</a>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="wrapper-img">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/></svg>
                            </span>
                        </div>
                        <div class="wrapper-info">
                            <a href="seller-sidebar.html" style="width:77px;font-weight:500;">Premium packaging
                            </a>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="wrapper-img">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"/></svg>
                            </span>
                        </div>
                        <div class="wrapper-info">
                            <a href="seller-sidebar.html" class="wrapper-details">Friendly support
                            </a>
                        </div>
                    </div>

                    <div class="product-wrapper">
                        <div class="wrapper-img">
                            <span>
                             	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="_x39_198261_xA0_Image_1_" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve" width="100px" height="95px"><style type="text/css">	.st0{display:none;}	.st1{display:inline;}	.st2{fill:black;}</style><g class="st0">	<g class="st1">		<path class="st2" d="M404.11,307.98c0-1.41-0.63-3.3-1.65-4.15c-16.74-13.83-36-21.23-58.3-22.5v5.61   c0,11.79-0.05,23.58,0.02,35.37c0.03,4.06-0.86,8.13-4.9,9.15c-3.01,0.75-7.35,0.33-9.8-1.41   c-39.38-27.8-78.57-55.88-117.75-83.95c-6.42-4.61-6.51-10.83-0.2-15.35c39.32-28.19,78.67-56.36,118.2-84.26   c2.42-1.71,7.27-2.31,9.67-1.01c2.44,1.31,4.42,5.59,4.55,8.65c0.5,11.95,0.2,23.93,0.22,35.9c0,1.72,0.15,3.44,0.25,5.6   c20.5-1.02,40.21,1.09,59.36,7.34v-93H241.26v6.03c0,17.16,0.02,34.3-0.01,51.46c-0.02,7.77-2.98,10.81-10.59,10.84   c-15.71,0.04-31.43,0.03-47.16,0c-7.93-0.02-10.82-3-10.83-11.13c-0.03-17.15-0.01-34.3-0.01-51.45v-5.61H10.01v308.09h393.7   c0.22-0.78,0.39-1.11,0.39-1.44C404.14,380.51,404.19,344.24,404.11,307.98z M129.35,400.94H27.13v-16.51h102.23V400.94z    M129.54,366.72H27.31v-16.51h102.23V366.72z"></path>		<path class="st2" d="M489.66,353.47c-3.17,43.89-23.48,78.29-59.78,103.19c-1.18,0.81-2.41,1.53-3.65,2.24   c-0.25,0.14-0.66,0.02-1.55,0.02c1.94-2.4,3.71-4.46,5.36-6.62c27.23-35.73,33.74-75.06,16.58-116.47   c-17.05-41.13-49.01-64.72-93.36-70.82c-5.28-0.72-10.68-0.83-16.02-0.88c-7.04-0.07-10.14,3.09-10.2,10.09   c-0.08,10.67-0.02,21.35-0.02,33.2c-32.48-23.21-64.19-45.84-96.68-69.05c32.18-23,63.89-45.66,96.68-69.09v30.4   c0.01,10.66,2.26,13.07,12.76,12.93c19.51-0.27,38.82,0.3,57.73,6.29C454.77,237.04,493.98,293.59,489.66,353.47z"></path>		<path class="st2" d="M228.99,41.39c-7.09,7.04-13.39,13.26-19.66,19.52c-9.62,9.58-19.14,19.28-28.9,28.71   c-1.59,1.53-4.21,2.81-6.37,2.82c-49.66,0.15-99.33,0.11-148.99,0.1c-0.53,0-1.06-0.09-2.26-0.2c1.02-1.29,1.71-2.39,2.59-3.27   c15.01-15.06,30-30.13,45.17-45.03c1.58-1.54,4.21-2.81,6.37-2.81c49.66-0.15,99.33-0.12,148.99-0.11   C226.47,41.12,226.99,41.21,228.99,41.39z"></path>		<path class="st2" d="M460.36,41.43c-17.05,17.04-33.32,33.34-49.7,49.53c-0.97,0.97-2.81,1.53-4.25,1.54   c-50.2,0.07-100.4,0.04-150.6,0.02c-0.31,0-0.62-0.23-1.47-0.56c1-1.12,1.83-2.14,2.76-3.07C272,73.98,286.87,59.02,301.9,44.24   c1.6-1.55,4.17-3,6.29-3c49.66-0.18,99.33-0.13,148.99-0.12C457.84,41.12,458.51,41.24,460.36,41.43z"></path>		<path class="st2" d="M472.32,53.82v171.36c-8.85-4.4-17.42-8.65-25.99-12.93c-7.18-3.58-14.44-7.01-21.46-10.88   c-1.61-0.9-3.38-3.29-3.39-5.01c-0.21-29.63-0.18-59.25-0.07-88.88c0-1.56,0.81-3.5,1.91-4.62   C439.4,86.65,455.58,70.54,472.32,53.82z"></path>		<path class="st2" d="M280.56,41.11C266.53,56.92,253.4,71.7,240.3,86.5c-5.33,6.02-12.63,11.3-15.33,18.34   c-2.69,7.01-0.81,15.81-0.84,23.83c-0.05,10.67-0.01,21.34-0.01,32.16c-1.18,0.15-1.85,0.32-2.53,0.32   c-10.34,0.01-20.68,0.01-31.45,0.01c-0.12-1.76-0.32-3.29-0.32-4.83c-0.02-15.71-0.14-31.43,0.12-47.15   c0.04-2.49,1.24-5.59,2.97-7.35c19.04-19.34,38.23-38.54,57.57-57.57c1.76-1.74,4.81-2.87,7.33-3.01   C264.9,40.85,272.04,41.11,280.56,41.11z"></path>	</g></g><g>	<path class="st2" d="M32.6,102.44v185.93h263.64V102.44H32.6z M117.59,229.6c-1.53,11.14-10.86,19.8-22.1,20.23  c-5.81,0.22-11.65,0.21-17.47,0.01c-12.23-0.42-22.18-10.23-22.37-22.46c-0.24-16.02-0.23-32.04-0.01-48.06  c0.17-12.47,10.19-22.31,22.68-22.65c5.5-0.15,11-0.14,16.5-0.01c11.39,0.27,20.69,8.37,22.66,19.59  c1.06,6.02-1.4,10.49-6.24,11.34c-4.66,0.83-7.95-2.16-9.08-8.31c-0.82-4.42-3.4-6.93-7.91-7.06c-5.01-0.14-10.04-0.16-15.05,0  c-5.1,0.17-7.96,3.13-8.05,8.37c-0.12,7.61-0.03,15.21-0.03,22.82c0,7.12-0.04,14.24,0.01,21.36c0.04,6.7,2.77,9.49,9.34,9.57  c4.37,0.05,8.74,0.09,13.11-0.01c5.13-0.12,7.72-2.43,8.6-7.39c1.01-5.75,4.3-8.72,8.88-8.04  C115.78,219.6,118.37,223.85,117.59,229.6z M194.56,225.16c-2.84,15.57-17.27,25.99-32.9,24.64  c-15.74-1.37-28.05-14.49-28.32-30.46c-0.18-10.67-0.17-21.35,0-32.01c0.27-17.18,14.07-30.71,31.08-30.69  c17,0.02,30.68,13.56,31.02,30.78c0.1,5.34,0.02,10.67,0.02,16.01c0.11,0,0.23,0.01,0.35,0.01  C195.45,210.69,195.85,218.08,194.56,225.16z M272.21,218.09c-2.66,18.21-18.51,31.27-36.88,31.76c-4.85,0.13-9.7,0.07-14.55,0.04  c-7-0.05-9.73-2.72-9.76-9.65c-0.04-12.29-0.01-24.58-0.01-36.87s-0.02-24.58,0.01-36.87c0.02-7.23,2.68-9.87,10.01-9.85  c6.14,0.02,12.36-0.4,18.4,0.43c17.62,2.43,30.7,14.89,33.01,32.54C273.66,198.96,273.56,208.76,272.21,218.09z"></path>	<path class="st2" d="M467.49,314.63c-0.04-25-16.37-41.39-41.29-41.41c-24.45-0.03-48.89,0.01-73.33-0.02  c-15.49-0.02-25.23-9.69-25.27-25.06c-0.03-13.27,0-26.55-0.02-39.82c0-1.57-0.14-3.13-0.21-4.71h-14.93v139.55  c11.72,0,23.05,0.08,34.37-0.11c1.41-0.03,3.24-1.21,4.11-2.41c20.2-27.85,57.5-27.85,77.69-0.01c0.88,1.2,2.7,2.39,4.11,2.42  c11.32,0.19,22.65,0.11,34.77,0.11C467.49,333.32,467.5,323.97,467.49,314.63z M366.69,296.44c-5.34,0.23-10.69,0.23-16.02,0  c-4.55-0.2-7.63-3.71-7.49-7.93c0.13-4.05,3.14-7.06,7.49-7.49c0.32-0.03,0.64-0.03,0.97-0.03h7.28v0.03  c2.59,0,5.19-0.15,7.77,0.03c4.34,0.31,7.36,3.42,7.49,7.46C374.32,292.71,371.22,296.24,366.69,296.44z"></path>	<path class="st2" d="M296.29,304.65v38.51h-4.92c-35.13,0-70.25-0.05-105.38,0.07c-3.26,0.01-5.14-0.97-7.04-3.66  c-18.69-26.46-57.31-26.23-76.15,0.25c-1.05,1.47-3.07,3.18-4.65,3.2c-21.37,0.2-42.74,0.13-64.1,0.1c-0.45,0-0.9-0.21-1.56-0.37  v-38.1H296.29z"></path>	<path class="st2" d="M172.13,366.24c0.11,17.19-13.81,31.26-30.96,31.31c-17.16,0.05-31.18-13.93-31.18-31.09  c0-16.97,13.79-30.91,30.71-31.06C157.91,335.24,172.03,349.1,172.13,366.24z"></path>	<path class="st2" d="M420.84,366.65c-0.08,17.14-14.17,31.03-31.37,30.9c-17.12-0.13-30.95-14.29-30.77-31.5  c0.17-16.91,14.15-30.68,31.12-30.65C406.99,335.42,420.92,349.45,420.84,366.65z"></path>


                                    <rect x="187.47" y="358.98" class="st2" width="155.89" height="14.99"></rect>

                                    	<path class="st2" d="M401.06,257.61c-17.5,0-34.14,0.11-50.78-0.08c-4.01-0.05-6.91-2.83-6.98-6.81  c-0.24-15.65-0.09-31.31-0.09-46.91c19.98-3.03,36.41,5.79,44.53,23.73C392.12,237.24,396.36,246.99,401.06,257.61z"></path>	<path class="st2" d="M94.65,358.97v15.28H68.28c-3.4,0-6.79,0.01-10.18-0.01c-7.81-0.03-10.29-2.58-10.3-10.54v-4.73H94.65z"></path>	<path class="st2" d="M467.41,366.82c-0.37,4.24-2.84,7.11-7.05,7.28c-8.02,0.32-16.06,0.09-24.18,0.09v-15.12h31.27  C467.45,361.74,467.63,364.3,467.41,366.82z"></path>	<path class="st2" d="M257.64,197.78c0.01,3.88,0.02,7.75,0,11.63c-0.08,15.16-9.72,24.86-24.79,24.94c-1.91,0.01-3.81,0-6.11,0  v-61.57C244.75,169.43,257.6,179.9,257.64,197.78z"></path>	<path class="st2" d="M179.89,218.75c-0.22,8.8-6.9,15.5-15.35,15.58c-8.64,0.09-15.55-6.73-15.67-15.75  c-0.13-10.19-0.12-20.39,0-30.58c0.11-9.09,6.9-15.85,15.58-15.81c8.64,0.04,15.29,6.86,15.45,15.98  c0.09,5.01,0.02,10.03,0.02,15.05C179.91,208.4,180.02,213.58,179.89,218.75z"></path></g></svg>
                            </span>
                        </div>
                        <div class="wrapper-info">
                            <a href="seller-sidebar.html" class="wrapper-details">COD Available</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <script src="https://kit.fontawesome.com/def866007f.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
        {{-- category slider --}}
    {{-- <script>
      document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {

        slidesPerView: 4,
        spaceBetween: 10,
        loop: true,

        autoplay: {
            delay: 1000,
        },


        breakpoints: {
            // when window width is <= 992px
            992: {
                slidesPerView: 4,
            },
            // when window width is <= 768px
            768: {
                slidesPerView: 3,
            },
            // when window width is <= 576px
            576: {
                slidesPerView: 2,
            },
            410: {
                slidesPerView: 1,
            },
            320: {
                slidesPerView: 1,
            },

        },
    });
     });
    </script> --}}
