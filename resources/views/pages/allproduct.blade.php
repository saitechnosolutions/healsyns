@php
    use App\Models\product;
    use App\Models\product_varient;

@endphp

@extends('layout.default')
@section('content')
<style>

 .accordion-body {
    padding: 1rem 1.25rem;
}

.feat {
    color: #1C1C1C !important;
    font-weight: 600;
    background: #fff !important;
    border: none;
}
.accordion-button {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    background-color: #fff;
    border: 0;
    border-radius: 0;
    overflow-anchor: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, border-radius .15s ease;
}
 /* =============================range value ========================== */
 .wrapper {
     width: 100%;
     background: #fff;
     border-radius: 5px;
     padding: 14px 12px 25px;
     box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
 }

 header h2 {
     font-size: 24px;
     font-weight: 600;
 }

 header p {
     margin-top: 5px;
     font-size: 16px;
 }

 .price-input {
     width: 100%;
     display: flex;
     margin: 15px 0 25px;
 }

 .price-input .field {
     display: flex;
     width: 100%;
     height: 45px;
     align-items: center;
 }

 .field input {
     width: 100%;
     height: 100%;
     outline: none;
     font-size: 15px;
     margin-left: 12px;
     border-radius: 5px;
     text-align: center;
     border: 1px solid #ffffff;
     -moz-appearance: textfield;
 }

 input[type="number"]::-webkit-outer-spin-button,
 input[type="number"]::-webkit-inner-spin-button {
     -webkit-appearance: none;
 }

 .price-input .separator {
     width:50%;
     display: flex;
     font-size: 19px;
     align-items: center;
     justify-content: center;
 }

 .slider {
     height: 5px;
     position: relative;
     background: #ddd;
     border-radius: 5px;
 }

 .slider .progress {
     height: 100%;
     left: 2%;
     right: 2%;
     position: absolute;
     border-radius: 5px;
     background: #23989f;
 }

 .range-input {
     position: relative;
 }

 .range-input input {
     position: absolute;
     width: 100%;
     height: 5px;
     top: -5px;
     background: none;
     pointer-events: none;
     -webkit-appearance: none;
     -moz-appearance: none;
 }

 input[type="range"]::-webkit-slider-thumb {
     height: 17px;
     width: 17px;
     border-radius: 50%;
     background: #23989f;
     pointer-events: auto;
     -webkit-appearance: none;
     box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
 }

 input[type="range"]::-moz-range-thumb {
     height: 17px;
     width: 17px;
     border: none;
     border-radius: 50%;
     background: #670066;
     pointer-events: auto;
     -moz-appearance: none;
     box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
 }

 .accordion-button:not(.collapsed)::after {
    background-image:url('/assets/img/dd2.svg');
    transform: rotate(-180deg);
}
.accordion-button::after {
    flex-shrink: 0;
    width: 1.25rem;
    height: 1.25rem;
    margin-left: auto;
    content: "";
    background-image: url('/assets/img/dd2.svg');
    background-repeat: no-repeat;
    background-size: 1.25rem;
    transition: transform .2s ease-in-out;
}

.all_cat_section .nav-tabs {
    border: none;
}
/* .nav-link {
    font-weight: 600;
    color: #670066 !important;
} */

 .moving
 {
 width: 1000px;

 }

 .product-img{
   margin-top:10px;
 }
 .allpro .product-wrapper{
        height:26.5rem;
}
@media (max-width: 550px)
{
.allpro .product-wrapper .product-img {

    height: 22rem;
}
.allpro .product-wrapper {
    height: 34.5rem;
}
.allpro .product-wrapper .product-img {
    margin-top: 0px;
}
}
</style>

<section class="product product-sidebar footer-padding allpro">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="sidebar" data-aos="fade-right">
                    <div class="sidebar-section">
                        <div class="sidebar-wrapper">
                            <h5 class="wrapper-heading"><a href="/product">All Categories</a></h5>
                            <div class="sidebar-item" style="padding-bottom:25px;">
                             <ul class="sidebar-list">
                                <li>
                                  <input id="all_for" class="form-check-input acts all_acts nav-link1" type="checkbox"
                                    data-category="all">
                                   <label for="all_for">
                                    All Products
                                   </label>
                                </li>
                             </ul>
                            </div>

                            @if ($cat = App\Models\category::all())
                            <div class="sidebar-item">
                                <ul class="sidebar-list">

                                    @foreach ($cat as $ca)

                                    <li>
                                        <input class="form-check-input nav-link1" type="checkbox" id="categorys-{{ $ca->id }}" name="cat-{{ $ca->id }}" data-category="{{ $ca->id }}">
                                        <label for="categorys-{{ $ca->id }}">
                                            {{ $ca->category_name }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <hr>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="regularHeadingSecond">
                                <button class="accordion-button collapsed feat" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#regularCollapseSecond" aria-expanded="false"
                                    aria-controls="regularCollapseSecond" style="font-size:1.8rem;">
                                    Price Range
                                </button>
                            </h2>
                            <div id="regularCollapseSecond" class="accordion-collapse collapse"
                                aria-labelledby="regularHeadingSecond" data-bs-parent="#regularAccordionRobots">
                                <div class="accordion-body">
                                    <form class="price_range">
                                        <div class="wrapper">
                                            <div class="price-input">
                                                <div class="field">
                                                    <span>Min</span>
                                                    <input type="number" class="input-min  fr" value="0" readonly>
                                                </div>
                                                <div class="separator">-</div>
                                                <div class="field">
                                                    <span>Max</span>
                                                    <input type="number" class="input-max  fr" value="6000" readonly>
                                                </div>
                                            </div>
                                            <div class="slider">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="range-input">
                                                <input type="range" class="range-min rabge" min="0" max="6000"
                                                    name="min_num" value="0" step="100">
                                                <input type="range" class="range-max rabge" min="0"
                                                    max="6000" name="max_num" value="6000" step="100">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12">

                <div class="product-sidebar-section" data-aos="fade-up">
                    <div class="container all_cat_section">
                        <div class="row  rte">
                            <div class="col-lg-12 col-md-12">
                                <ul class="nav nav-tabs" id="myTabs" style="border: none;">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-12 brack">
                                            <button class="nav-link des_one1 active" hidden data-category="all">All Products</button>
                                        </div>

                                        <div class="col-lg-12 col-md-10 col-10 moving">
                                            <marquee onMouseOver="this.stop()" onMouseOut="this.start()" style="font-size: 20px;">
                                                <div class="d-flex">
                                                    @if ($cat = App\Models\category::all())
                                                        @foreach ($cat as $ca)
                                                            <button type="button" class="nav-link des_one1"
                                                                id="category-{{ $ca->id }}" name="cat-{{ $ca->id }}"
                                                                data-category="{{ $ca->id }}">{{ $ca->category_name }}</button>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </marquee>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                       <!-- Display all products here -->
                    <div class="row g-5 er">
                        @php
                        $allProducts = Product::select('id')
                        ->where('delete_status', 0)
                            ->get()
                            ->toArray();

                        $productVariants = product_varient::where('delete_status','0')->get()->groupBy('product_id');

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

                        @endphp


        @if ($products)
            @foreach ($products as $pr)
                        <div class="col-lg-3 col-sm-4 {{ $pr->categoryid }}">
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

                            <input type="number" hidden class="input_poo  productqty  ali_in" id="hair-{{ $pr->id }}-number" min="1" max="100" value="1"  name="productqty" readonly>

                            <div class="product-wrapper" data-aos="fade-up">
                                <div class="product-img">
                                    @if ($vrs = App\Models\product::where('id', $pr->product_id)->first())
                                    <a
                                    href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}">
                                    <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                        class="img-fluid" alt=""></a>
                                    @endif


                                <div class="product-cart-items">
                                     <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}" class="cart cart-item">
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
                                            <span class="price-cut">₹{{ $pr->mrp_price }}</span>
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
                        </form>
                        </div>
                        @endforeach
                        @endif


                    </div>

                    <div id="productsContainer"></div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- all product checkbox --}}

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $(".filtercheck").click(function() {
            $(".all_cat_section .nav-link.active").removeClass("active");
            setTimeout(function() {
                $("html, body").scrollTop(200);
            }, 1000);
        });
    });
    $(document).ready(function() {
        $(".nav-link1").click(function() {
            $(".all_cat_section .nav-link.active").removeClass("active");
            setTimeout(function() {
                $("html, body").scrollTop(200);
            }, 1000);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".all_cat_section .nav-link.des_one1.active").click(function() {
            $(".filtercheck").prop("checked", false);
        });
    });
    $(document).ready(function() {
        $("des_one1.active").click(function() {
            $(".nav-link1").prop("checked", false);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.form-check-input').click(function() {
            // Uncheck all checkboxes except the one that was clicked
            $('.form-check-input').not(this).prop('checked', false);
        });
    });
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the checkbox element
        var secondCategoryCheckbox = document.getElementById('categorys-2'); // Assuming the ID of the "Second Category" checkbox is 'categorys-2'

        // Add event listener for change event
        secondCategoryCheckbox.addEventListener('change', function() {
            // Check if the checkbox is unchecked
            if (!this.checked) {
                // Redirect the user to view all products
                window.location.href = '/product';
            }
        });
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all checkboxes with class 'form-check-input'
        var checkboxes = document.querySelectorAll('.form-check-input');

        // Loop through each checkbox
        checkboxes.forEach(function(checkbox) {
            // Add event listener for change event
            checkbox.addEventListener('change', function() {
                // Get the category ID from the data attribute
                var categoryId = this.dataset.category;

                // Check if the checkbox is unchecked
                if (!this.checked) {
                    // Redirect the user to view all products
                    window.location.href = '/product';
                }
            });
        });
    });
</script>


@endsection

