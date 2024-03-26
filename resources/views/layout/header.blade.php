    <!--------------- header-section --------------->
@php
    use App\Models\product;
    use App\Models\product_varient;

@endphp

<style>
 @media (min-width: 340px) and (max-width: 991px)
 {
.header-nav .list-text:hover {
    font-size: 1.2rem;
    color: #23989f;
    transform: 0.5s;
}
.rit i{
font-size: 1.8rem;
}
 }
.headbot{
    border-bottom: 1px solid #c1c1c1;
}
.dropstarttt .dropdown-menu[data-bs-popper] {
    top: 468px;
    right: -100%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border: none;
    background: #ffffff;
    padding: 20px 10px 10px;
    border-radius: 5px;
}


.dropstarttt .dropdown-menu::before {
    display: none;
     content: "";
     position: absolute;
     top: -10px;
     right: 20px;
     text-align: center;
     margin: 0 auto;
     width: 0;
     height: 0;
     border-style: solid;
     border-width: 0 7.5px 10px 7.5px;
     border-color: #ffffff;
 }

 .dropdown-item.active, .dropdown-item:active{
    color: #fff;
    text-decoration: none;
    background-color: #23989f;
 }
 .header-top marquee{
    width:60%;
 }
 /* .shead{
    position: fixed;
    top: 0px;
    z-index: 99999999999999999;
    width: 100%;
 } */

</style>
    <header id="header" class="header shead" style="background-color: white;">
        <div class="header-top-section top1">
            <div class="container">
                <div class="header-top">
                    <div class="header-profile">


                        <a href="/"><span>Healthsyns Biocorp Pvt Ltd
                        </span></a>
                    </div>
                    <marquee  direction="left" style="font-size:15px">
                        100% PURE AND NATURAL PRODUCTS
                    </marquee>

                    <div class="header-contact d-none d-lg-block">
                        <a href="tel:+91 8610809690">
                            <span>Need help? Call us:</span>
                            <span class="contact-number">+ 91 8610809690
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <div class="header-center-section d-none d-lg-block top2">
            <div class="container">
                <div class="header-center">
                    <div class="logo">
                        <a href="/">
                            <img src="./assets/img/logo.png" alt="logo" >
                        </a>
                    </div>

                    <div class="header-cart-items">

                        <div class="header-search" style="font-size: 18px;">
                             <button type="button" class="iconses_one rit" data-bs-toggle="modal" data-bs-target="#search" id="newk"><i class="fa fa-search hd" aria-hidden="true" style="color:white"></i> </button>
                       </div>


                @if (Auth::check())
                @php $wishlistCount = \App\Models\wishlist::where('user_id', Auth::user()->user_id)->count(); @endphp
                <a href="/mywishlist" class="iconses_one  wish_list_ic1">
                      <div class="num_couny add_to_wishlist_num">{{ $wishlistCount }}</div><i class="fa fa-heart hd"
                        aria-hidden="true"></i>
                </a>
                @else
                <a href="#" class="iconses_one" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <div class="num_couny">0</div><i class="fa fa-heart hd" aria-hidden="true"></i>
                </a>
                @endif

                @if (Auth::check())
                        @php $cartCount = \App\Models\Cart::where('user_id', Auth::user()->user_id)->count(); @endphp
                        <a href="/mycart" class="iconses_one" id="cartIcon">
                            <div class="num_couny add_to_cart_num">{{ $cartCount }}</div><i
                                class="fa fa-shopping-cart hd" aria-hidden="true"></i>
                        </a>
                       @else
                        <a href="#" class="iconses_one" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <div class="num_couny">0</div><i class="fa fa-shopping-cart hd"
                                aria-hidden="true"></i>
                        </a>
                @endif


                <div class="loger header-user">
                    <div class="dropstarttt">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="fill-current">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z">
                                    </path>
                                </svg>
                            </span></a>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink" style="padding: 5px 20px 10px 20px;">
                            @if (Auth::check())
                                <li>
                                    <div class="headbot">
                                    <a class="dropdown-item drop1 @if (Request::segment(1) == 'myaccount') active @endif "
                                        href="/myaccount">My Account</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="headbot">
                                    <a class="dropdown-item drop1" href="/logout">Logout</a>
                                   </div>
                                </li>
                            @else
                                <li class="droplink">
                                    <div class="headbot">
                                    <a class="dropdown-item drop1" href="/loginn">Login</a>
                                    </div>
                                </li>
                                <li class="droplink">
                                    <div class="headbot">
                                    <a class="dropdown-item drop1 @if (Request::segment(1) == 'register') active @endif "
                                        href="/registerr">Register</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                    </div>
                </div>
            </div>
        </div>

        <nav class="mobile-menu d-block d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                    aria-controls="offcanvasWithBothOptions">
                    <span>
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="14" height="1" fill="#FFFFFF" />
                            <rect y="8" width="14" height="1" fill="#FFFFFF" />
                            <rect y="4" width="10" height="1" fill="#FFFFFF" />
                        </svg>
                    </span>
                </button>
                <a href="/" class="mobile-header-logo">
                    <img src="./assets/img/new4.png" alt="logo" >
                </a>
                 <div class="loger header-user">
                    <div class="dropstarttt">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="fill-current">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z">
                                    </path>
                                </svg>
                            </span></a>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink" style="padding: 5px 20px 10px 20px;">
                            @if (Auth::check())
                                <li>
                                    <div class="headbot">
                                    <a class="dropdown-item drop1 @if (Request::segment(1) == 'myaccount') active @endif "
                                        href="/myaccount">My Account</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="headbot">
                                    <a class="dropdown-item drop1" href="/logout">Logout</a>
                                   </div>
                                </li>
                            @else
                                <li class="droplink">
                                    <div class="headbot">
                                    <a class="dropdown-item drop1" href="/loginn">Login</a>
                                    </div>
                                </li>
                                <li class="droplink">
                                    <div class="headbot">
                                    <a class="dropdown-item drop1 @if (Request::segment(1) == 'register') active @endif "
                                        href="/registerr">Register</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">

                <div class="offcanvas-body">
                    <div class="header-top">
                        <div class="header-top">
                            <div class="header-cart ">

                                <div class="header-search" style="font-size: 20px;">
                                    <button type="button" class="iconses_one rit" data-bs-toggle="modal" data-bs-target="#search"><i class="fa fa-search hd" aria-hidden="true"></i> </button>
                                    </div>

                                    <div class="header-compaire">

                                        @if (Auth::check())
                                    @php $wishlistCount = \App\Models\wishlist::where('user_id', Auth::user()->user_id)->count(); @endphp
                                    <a href="/mywishlist" class="iconses_one  wish_list_ic">
                                          <div class="num_couny add_to_wishlist_num">{{ $wishlistCount }}</div><i class="fa fa-heart hd"
                                            aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="#" class="iconses_one" data-bs-toggle="modal" data-bs-target="#loginModal">
                                        <div class="num_couny">0</div><i class="fa fa-heart hd" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                    </div>

                                    <div class="header-favourite">
                                        @if (Auth::check())
                                            @php $cartCount = \App\Models\Cart::where('user_id', Auth::user()->user_id)->count(); @endphp
                                            <a href="/mycart" class="iconses_one" id="cartIcon">
                                                <div class="num_couny  add_to_cart_num">{{ $cartCount }}</div><i
                                                    class="fa fa-shopping-cart hd" aria-hidden="true"></i>
                                            </a>
                                           @else
                                            <a href="#" class="iconses_one" data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                                <div class="num_couny">0</div><i class="fa fa-shopping-cart hd"
                                                    aria-hidden="true"></i>
                                            </a>
                                    @endif
                                    </div>
                            </div>


                            </div>
                        <div class="shop-btn">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">

                            </button>
                        </div>
                    </div>



                    <div class="d-lg-block">
                        <div class="container">
                            <div class="header-nav">

                                <div class="header-nav-menu">
                                    <ul class="menu-list">
                                        <li>
                                            <a href="/">
                                                <span class="list-text">Home</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/about">
                                                <span class="list-text">About Us</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product">
                                                <span class="list-text">Product</span>
                                            </a>
                                            {{-- <ul class="header-sub-menu">
                                                <li><a href="blogs-details.html">Blog-details</a></li>
                                            </ul> --}}
                                        </li>

                                        <li>
                                            <a href="/contact">

                                                <span class="list-text">Contact Us</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
     <div class="header-bottom d-lg-block d-none top3">
            <div class="container">
                <div class="header-nav">
                    <div class="category-menu-section position-relative">
                        <div class="empty position-fixed" onclick="tooglmenu()"></div>
                        <button class="dropdown-btn" onclick="tooglmenu()">
                            <span class="dropdown-icon">
                                <svg width="14" height="9" viewBox="0 0 14 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="14" height="1" />
                                    <rect y="8" width="14" height="1" />
                                    <rect y="4" width="10" height="1" />
                                </svg>
                            </span>
                            <span class="list-text">
                                All Categories
                            </span>
                        </button>

                        @if ($cat = App\Models\category::all())
                        <div class="category-dropdown position-absolute" id="subMenu">
                            <ul class="category-list">
                                @foreach ($cat as $ca)
                                <li class="category-list-item">
                                    <a href="/product?categoryid=category-{{ $ca->id }}">
                                        <div class="dropdown-item">
                                            <div class="dropdown-list-item">
                                                <span class="dropdown-img">
                                                    <img src="{{ env('MAIN_URL') }}images/{{ $ca->category_image }}"
                                                        alt="dress">
                                                </span>
                                                <span class="dropdown-text">
                                                    {{ $ca->category_name }}
                                                </span>
                                            </div>
                                            <div class="drop-down-list-icon">
                                                <span>
                                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                            transform="rotate(45 1.5 0.818359)" fill="#1D1D1D" />
                                                        <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                            transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="header-nav-menu">

                        <ul class="menu-list">
                            <li>
                                <a href="/">
                                    <span class="list-text">Home</span>
                                </a>
                            </li>

                            <li>
                                <a href="/about">
                                    <span class="list-text">About Us</span>
                                </a>
                            </li>
                            <li>
                                <a href="/product">
                                    <span class="list-text">Product</span>
                                </a>

                            </li>

                            <li>
                                <a href="/contact">

                                    <span class="list-text">Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </header>
{{-- =============================search modal ================== --}}

 <div class="search_engine modal right fade" id="search" class="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></button>
                <h4 class="modal-title" id="myModalLabel2">SEARCH OUR SITE</h4>
            </div>

            {{-- <div class="modal-body">
                <form action="" method="post">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Search" name="searchwordsss"
                            id="searchwordsss" aria-label="Recipient's username" aria-describedby="basic-addon2" style="font-size:15px;">
                        <span class="input-group-text" id="basic-addon2" style="font-size: 16px;"><i class="fa fa-search hd"
                                aria-hidden="true"></i> </span>
                    </div>
                </form>

                <h5 class="fdjjee" style="margin-bottom: 1rem;">Search Results</h5>
                <div class="full_sided_head">
                    <div id="search_group"></div>
                    @if ($products = App\Models\product_varient::all())
                        @foreach ($products as $pr)
                            <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}"
                                class="first_node  ghh">
                                @if ($rt = App\Models\product::where('id', $pr->product_id)->first())
                                    <img src="{{ env('MAIN_URL') }}images/{{ $rt->product_image }}" class="img-fluid"
                                        width="70px" alt="">
                                @endif
                                <div class="para_ht">
                                    @if ($desc = App\Models\product::where('id', $pr->product_id)->first())
                                        <h5 class="gro1">{{ $desc->product_name }}</h5>
                                    @endif
                                    @if ($desc = App\Models\product_varient::where('id', $pr->id)->first())
                                        <h5 class="he_para11">₹{{ $desc->offer_price }} <span
                                                class="he_para12">₹{{ $desc->mrp_price }} </span> </h5>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    @endif


                </div>
            </div> --}}
            <div class="modal-body">
                <form id="searchForm" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control searchmodelword" placeholder="Search" name="searchwordsss"
                            id="searchwordsss" aria-label="Recipient's username"  aria-describedby="basic-addon2" style="font-size:15px;">
                        <span class="input-group-text" id="basic-addon2" style="font-size: 16px;"><i class="fa fa-search hd"
                                aria-hidden="true"></i> </span>
                    </div>
                </form>

                <h5 class="fdjjee" style="margin-bottom: 1rem;" id="overall_search_res">Search Results</h5>
                <div class="full_sided_head">
                    <div id="search_group"></div>
                    {{-- @if ($products = App\Models\product_varient::all())
                        @foreach ($products as $pr)
                            <a href="/singleproducts/{{ $pr->id }}/{{ $pr->product_id }}"
                                class="first_node  ghh">
                                @if ($rt = App\Models\product::where('id', $pr->product_id)->first())
                                    <img src="{{ env('MAIN_URL') }}images/{{ $rt->product_image }}" class="img-fluid"
                                        width="70px" alt="">
                                @endif
                                <div class="para_ht">
                                    @if ($desc = App\Models\product::where('id', $pr->product_id)->first())
                                        <h5 class="gro1">{{ $desc->product_name }}</h5>
                                    @endif
                                    @if ($desc = App\Models\product_varient::where('id', $pr->id)->first())
                                        <h5 class="he_para11">₹{{ $desc->offer_price }} <span
                                                class="he_para12">₹{{ $desc->mrp_price }} </span> </h5>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    @endif --}}


                </div>

            </div>
        </div>
    </div>
</div>




