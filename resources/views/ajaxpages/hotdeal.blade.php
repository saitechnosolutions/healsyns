
<div id="productsContainer">
    <div class="product-sidebar-section" data-aos="fade-up">
        <div class="row g-5">

 @foreach ($products as $pr)
    <div class="col-lg-3 col-sm-6 {{ $pr->categoryid }}">
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

                <input type="number" hidden
                class="input_poo  productqty  ali_in"
                id="hair-{{ $pr->id }}-number"
                min="1" max="100" value="1"
                name="productqty" readonly>

          <div class="product-wrapper" data-aos="fade-up">
          <div class="product-img">
             {{-- @if ($vrs = App\Models\product::where('id', $pr->product_id)->first()) --}}

             @if ($vrs = App\Models\product::where('id', $pr->product_id)
        ->where('delete_status', 0)
        ->first())
               <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}">
                    <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                     class="img-fluid" alt="">
                </a>



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
            @endif
        </div>

        <div class="product-info">

            <div class="product-description">
                <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}" class="product-details">
                    {{-- @if ($vrs = App\Models\product::where('id', $pr->product_id)->first()) --}}
                    @if ($vrs = App\Models\product::where('id', $pr->product_id)
                    ->where('delete_status', 0)
                    ->first())
                    {{ $vrs->product_name }}
                    @endif
                </a>
                {{-- <div class="price">
                    <span class="price-cut">{{ $pr->mrp_price }}</span>
                    <span class="new-price">₹{{ $pr->offer_price }}</span>
                </div> --}}
                @foreach ($productVariants as $variants)
    @foreach ($variants as $pr)
        @if ($pr->delete_status === 0)
            <div class="price">
                <span class="price-cut">{{ $pr->mrp_price }}</span>
                <span class="new-price">₹{{ $pr->offer_price }}</span>
            </div>
        @endif
    @endforeach
@endforeach

            </div>
        </div>
        <div class="add_to_cart">
            <div class="product-cart-btn">

                @php
                // $products_varient = App\Models\product_varient::where('id', $pr->id)->first();

                $products_varient = App\Models\product_varient::where('delete_status','0')->where('id', $pr->id)->get()->first();

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
</div>
    </div>
</div>




