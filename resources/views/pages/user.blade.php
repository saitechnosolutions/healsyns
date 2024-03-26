@extends('layout.default')
@section('content')
<style>
    .formm1 {
    border: 1px solid #ccc; /* Border color and thickness */
    padding: 20px; /* Add some padding for spacing */
    border-radius: 10px; /* Optional: Add border radius for rounded corners */
    width: fit-content; /* Make the container width fit its content */
    margin: 0px; /* Center the container horizontally */
}
.home-btn7 {
    background: #00908D;
    animation: btn 2s ease-in-out;
    font-size: 10px;
    position: relative;
    /* width: 88%; */
    z-index: 1;
    border-radius: 5px !important;

    /* margin: 0 10px 10px 10px; */
    color: #fff;

}
</style>
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="/">Home</a></span>
                <span class="devider">/</span>
                <span><a href="/myaccount">Dashboard</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">User Dashboard</h1>
            </div>
        </div>
    </section>

    <section class="user-profile footer-padding">
        <div class="container">
            <div class="user-profile-section">
                <div class="dashboard-heading ">
                    <h5 class="dashboard-title"> Account Settings</h5>

                </div>
                <div class="user-dashboard">
                    <div class="nav nav-item nav-pills  me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">

                        <!-- nav-buttons -->
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                            <span>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.21258 4.98254C9.21258 6.17687 9.20926 7.37119 9.21391 8.56552C9.21723 9.41928 9.69987 9.9079 10.5483 9.90989C12.2512 9.91454 13.9547 9.91454 15.6576 9.90989C16.5007 9.9079 16.9966 9.40799 16.9979 8.56751C16.9999 6.16757 16.9999 3.76763 16.9979 1.36835C16.9973 0.508624 16.4961 0.00340804 15.6423 0.00274416C13.9613 0.000752505 12.2804 0.00141639 10.5994 0.00274416C9.69722 0.00340804 9.2159 0.488044 9.21391 1.40022C9.21059 2.59388 9.21258 3.78821 9.21258 4.98254ZM7.78722 12.0522C7.78722 10.8579 7.78921 9.66359 7.78656 8.46926C7.78456 7.57036 7.31122 7.09104 6.42028 7.08971C4.73933 7.08639 3.05837 7.08705 1.37742 7.08971C0.489805 7.09104 0.00251398 7.57965 0.0018501 8.46395C0.000522332 10.8526 0.000522332 13.2413 0.0018501 15.6299C0.00251398 16.4896 0.503747 16.9969 1.35551 16.9982C3.04775 17.0002 4.73933 17.0002 6.43157 16.9982C7.2913 16.9969 7.78257 16.5036 7.78589 15.6359C7.78988 14.4409 7.78722 13.2466 7.78722 12.0522ZM3.89022 5.66236C4.75261 5.66236 5.61499 5.66767 6.47738 5.66103C7.28665 5.65439 7.77925 5.16444 7.78523 4.35782C7.79253 3.34075 7.79253 2.32302 7.78523 1.30595C7.77925 0.505968 7.27337 0.00473581 6.47339 0.00274416C4.75924 -0.00123915 3.04576 -0.000575264 1.33161 0.00274416C0.519016 0.00407193 0.00516952 0.516591 0.00251398 1.32719C-0.00146932 2.32236 -0.000141552 3.31752 0.00251398 4.31268C0.00450564 5.15648 0.49578 5.65638 1.33626 5.66169C2.18736 5.667 3.03846 5.66236 3.89022 5.66236ZM13.1083 11.3372C12.2459 11.3372 11.3835 11.3319 10.5211 11.3386C9.71248 11.3452 9.21988 11.8358 9.21457 12.6431C9.20793 13.6602 9.20727 14.6779 9.21457 15.695C9.22055 16.493 9.72908 16.9955 10.5271 16.9969C12.2412 17.0008 13.9547 17.0002 15.6689 16.9969C16.4801 16.9955 16.994 16.481 16.9973 15.6704C17.0013 14.6752 16.9999 13.6801 16.9973 12.6849C16.9953 11.8418 16.502 11.3425 15.6622 11.3379C14.8111 11.3333 13.9594 11.3372 13.1083 11.3372Z" />
                                    <path
                                        d="M9.21223 4.98269C9.21223 3.78837 9.21024 2.59404 9.2129 1.39971C9.21489 0.487533 9.69621 0.00289744 10.5984 0.00223355C12.2794 0.000905786 13.9603 0.000241902 15.6413 0.00223355C16.495 0.00356132 16.9963 0.508777 16.9969 1.36784C16.9983 3.76778 16.9989 6.16773 16.9969 8.567C16.9963 9.40748 16.5004 9.90739 15.6566 9.90938C13.9537 9.91402 12.2502 9.91402 10.5473 9.90938C9.69886 9.90672 9.21622 9.41877 9.2129 8.56501C9.20891 7.37135 9.21223 6.17702 9.21223 4.98269Z" />
                                    <path
                                        d="M7.78832 12.0524C7.78832 13.2467 7.79098 14.441 7.78699 15.6353C7.78434 16.503 7.2924 16.9963 6.43267 16.9976C4.74043 16.9996 3.04885 16.9996 1.35661 16.9976C0.504845 16.9963 0.00361284 16.4891 0.00294895 15.6294C0.00162118 13.2407 0.00162118 10.8521 0.00294895 8.4634C0.00361284 7.57911 0.490904 7.09115 1.37852 7.08916C3.05947 7.08651 4.74043 7.08584 6.42138 7.08916C7.31231 7.09115 7.785 7.56981 7.78766 8.46871C7.79031 9.6637 7.78832 10.858 7.78832 12.0524Z" />
                                    <path
                                        d="M3.89062 5.6621C3.03952 5.6621 2.18775 5.66609 1.33665 5.66077C0.496177 5.65613 0.00490302 5.15622 0.00224748 4.31243C-0.000408054 3.31726 -0.00107194 2.3221 0.00224748 1.32694C0.0055669 0.516336 0.519413 0.00381733 1.33201 0.00248957C3.04616 -0.000829855 4.75964 -0.000829855 6.47379 0.00248957C7.27311 0.00448122 7.77965 0.50505 7.78563 1.30569C7.79293 2.32276 7.79293 3.3405 7.78563 4.35757C7.77965 5.16485 7.28771 5.6548 6.47777 5.66077C5.61539 5.66741 4.753 5.6621 3.89062 5.6621Z" />
                                    <path
                                        d="M13.1081 11.3378C13.9592 11.3378 14.811 11.3338 15.6621 11.3391C16.5019 11.3444 16.9952 11.843 16.9972 12.6862C16.9998 13.6813 17.0005 14.6765 16.9972 15.6716C16.9939 16.4822 16.48 16.9968 15.6687 16.9981C13.9546 17.0014 12.2411 17.0014 10.527 16.9981C9.72831 16.9961 9.21977 16.4935 9.21446 15.6962C9.20716 14.6791 9.20716 13.6614 9.21446 12.6443C9.21977 11.837 9.71237 11.3464 10.521 11.3398C11.3834 11.3325 12.2458 11.3378 13.1081 11.3378Z" />
                                </svg>
                            </span>
                            <span class="text">Dashboard</span>
                        </button>

                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            <span>
                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.96898 10.7061H3.78814C1.6967 10.7061 0.00346265 12.4028 0 14.4942V18.3481H13.7606V14.4942C13.7571 12.4028 12.0604 10.7061 9.96898 10.7061Z" />
                                    <path
                                        d="M6.88098 9.17603C9.41488 9.17603 11.469 7.12191 11.469 4.58802C11.469 2.05412 9.41488 0 6.88098 0C4.34709 0 2.29297 2.05412 2.29297 4.58802C2.29297 7.12191 4.34709 9.17603 6.88098 9.17603Z" />
                                </svg>
                            </span>
                            <span class="text">
                                Personal Info
                            </span>
                        </button>


                        <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order"
                            aria-selected="false">
                            <span>
                                <svg width="15" height="18" viewBox="0 0 15 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.9643 15.8454C10.8728 15.8399 10.8054 15.8331 10.7381 15.8331C9.37517 15.8324 8.01229 15.8324 6.60539 15.8324C6.85294 16.5145 6.77799 17.099 6.11648 17.4676C5.68672 17.7076 5.24457 17.6615 4.86018 17.3562C4.36027 16.9594 4.3087 16.4409 4.56175 15.8317C3.82667 15.8317 3.13285 15.8406 2.43903 15.8296C1.53136 15.8152 0.910425 14.8958 1.25974 14.0638C1.34845 13.852 1.51898 13.6581 1.69295 13.502C2.43628 12.8384 3.19199 12.1872 3.95182 11.5429C4.11204 11.4075 4.16499 11.2816 4.11479 11.074C3.36389 7.96037 2.61506 4.8454 1.87999 1.72768C1.82085 1.476 1.71564 1.42512 1.48597 1.432C0.997754 1.44712 0.507472 1.43681 0 1.43681C0 1.06824 0 0.741614 0 0.390921C0.782525 0.390921 1.54786 0.377856 2.31182 0.397798C2.58825 0.405362 2.70308 0.630905 2.76772 0.885329C3.01389 1.86177 3.27725 2.83339 3.5138 3.81189C3.57775 4.07732 3.68846 4.22034 3.96901 4.19971C3.98001 4.19903 3.9917 4.20315 4.00339 4.20315C4.60369 4.21003 4.95026 4.4507 5.25488 5.03863C6.60195 7.64613 10.1907 7.96587 12.0686 5.68981C12.2206 5.50622 12.3512 5.44639 12.585 5.4904C13.0911 5.58529 13.6027 5.64855 14.1136 5.71801C14.333 5.74826 14.4306 5.85416 14.4251 6.08314C14.3839 7.93906 14.3461 9.79498 14.3144 11.6509C14.3089 11.9816 14.0937 11.9665 13.8661 11.9665C11.0819 11.9651 8.29697 11.9693 5.51274 11.9596C5.2425 11.959 5.03897 12.0291 4.8368 12.2072C4.05428 12.8962 3.25525 13.5659 2.47135 14.2536C2.37095 14.3416 2.32488 14.4908 2.25337 14.6111C2.38264 14.6552 2.51192 14.737 2.64119 14.737C6.60608 14.7439 10.571 14.7425 14.5358 14.7425C14.6823 14.7425 14.8288 14.7425 15 14.7425C15 15.1152 15 15.4514 15 15.8193C14.3426 15.8193 13.6935 15.8193 13.0127 15.8193C13.25 16.4568 13.2156 17.0055 12.6442 17.4064C12.2536 17.68 11.7406 17.6814 11.3521 17.4091C10.78 17.011 10.7339 16.4636 10.9643 15.8454Z" />
                                    <path
                                        d="M8.8449 6.1337C7.15883 6.12476 5.787 4.74744 5.78906 3.06549C5.79113 1.37254 7.18564 -0.00685072 8.88753 2.55979e-05C10.5702 0.00690192 11.9413 1.38835 11.9392 3.07374C11.9372 4.77563 10.555 6.14264 8.8449 6.1337ZM9.94924 1.61802C9.38194 2.22039 8.85178 2.78287 8.31199 3.35636C8.11326 3.12806 7.94342 2.93278 7.76394 2.72786C7.48201 2.96853 7.22553 3.1872 6.95735 3.41618C7.28191 3.80125 7.57484 4.16708 7.8884 4.51502C8.10157 4.75225 8.43232 4.77082 8.65236 4.54458C9.33656 3.83907 10.0042 3.11775 10.6382 2.44593C10.4031 2.16332 10.1858 1.9027 9.94924 1.61802Z" />
                                </svg>
                            </span>
                            <span class="text">
                                Order
                            </span>
                        </button>

                        <div class="nav-link">
                            <a href="/logout">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_113_3043)">
                                            <path
                                                d="M7.50224 15.7537C7.50224 16.0247 7.50895 16.2465 7.5 16.4683C7.4597 17.5682 6.52164 18.2515 5.4806 17.9155C4.00075 17.4383 2.52761 16.9387 1.05448 16.4392C0.380597 16.2107 0 15.6641 0 14.9405C0 10.4892 0 6.03569 0.00223881 1.58218C0.00223881 0.627852 0.629104 0.00955666 1.59403 0.00731646C4.28731 0.00283606 6.98284 -0.00164434 9.67612 0.000595862C11.0104 0.00283606 11.9798 0.961641 12 2.29904C12.0112 2.99126 12.0067 3.68124 12 4.37347C11.9955 4.90439 11.6933 5.25162 11.2478 5.25162C10.8022 5.25386 10.4955 4.90663 10.491 4.37571C10.4843 3.69693 10.4933 3.0159 10.4888 2.33712C10.4843 1.79276 10.209 1.50153 9.67388 1.49705C8.72463 1.48585 7.77761 1.49481 6.82836 1.49481C6.72313 1.49481 6.61791 1.49481 6.46791 1.49481C6.51492 1.55081 6.53284 1.59114 6.56418 1.60682C7.24254 1.91597 7.51119 2.46481 7.51119 3.1884C7.50672 6.72791 7.50895 10.2674 7.50895 13.8069C7.50895 13.9436 7.50895 14.0802 7.50895 14.2415C8.32164 14.2415 9.09179 14.2662 9.8597 14.2303C10.2649 14.2124 10.4888 13.8898 10.491 13.4396C10.4978 12.5031 10.4955 11.5645 10.4933 10.6259C10.4933 10.2854 10.594 10.0008 10.9119 9.83507C11.3888 9.58865 11.9754 9.89332 11.9888 10.4511C12.0179 11.5511 12.0493 12.6577 11.9664 13.7532C11.8746 14.9494 10.9052 15.7447 9.69403 15.7514C8.97537 15.7559 8.26343 15.7537 7.50224 15.7537Z" />
                                            <path
                                                d="M13.4942 6.75005C13.4942 6.02423 13.5009 5.33425 13.492 4.64651C13.4875 4.27463 13.5927 3.96997 13.9532 3.81539C14.3136 3.66082 14.6046 3.79523 14.8688 4.06181C15.8002 5.0027 16.7405 5.93462 17.674 6.87326C18.1061 7.30786 18.1129 7.69094 17.6897 8.11882C16.7494 9.06642 15.8024 10.0073 14.8599 10.9549C14.6091 11.2058 14.327 11.3402 13.9755 11.1946C13.6129 11.0445 13.492 10.7533 13.4964 10.3769C13.5032 9.68695 13.4987 8.99473 13.4987 8.24875C13.3576 8.24875 13.2345 8.24875 13.1114 8.24875C12.2808 8.24875 11.4479 8.25099 10.6173 8.24651C10.0711 8.24427 9.75315 7.962 9.75987 7.4938C9.76435 7.03456 10.0912 6.75453 10.6352 6.75229C11.5666 6.75005 12.5024 6.75005 13.4942 6.75005Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_113_3043">
                                                <rect width="18" height="18" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="text">
                                    Logout
                                </span>
                            </a>
                        </div>

                    </div>

                    <!-- personal info -->
                    <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">

                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="user-profile">
                                <div class="user-title">
                                    <p class="paragraph">Hello, {{ Auth::user()->name }}</p>
                                    <h5 class="heading">Welcome to your Profile </h5>
                                </div>
                                <div class="profile-section">
                                    <div class="row g-5">
                                        <div class="col-lg-12">
                                            <div class="info-section">
                                                <div class="seller-info">
                                                    <h5 class="heading">Personal Information</h5>
                                                    <div class="info-list">
                                                        <div class="info-title">
                                                            <p>Name:</p>
                                                            <p>User Id:</p>
                                                            <p>Email:</p>
                                                            <p>Phone:</p>
                                                            {{-- <p>City:</p>
                                                            <p>Zip:</p> --}}
                                                        </div>
                                                        <div class="info-details">
                                                            <p>{{ Auth::user()->name }}</p>
                                                            <p>{{ Auth::user()->user_id }}</p>
                                                            <p>{{ Auth::user()->email }}</p>
                                                            <p>{{ Auth::user()->phone_number }}</p>
                                                            {{-- <p>Haydarabad, Rord 34</p>
                                                            <p>3454</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="devider"></div>
                                                 <div class="shop-info">
                                                    <h5 class="heading">User Profile</h5>
                                                    <div class="img-upload-section">
                                                        <div class="logo-wrapper">
                                                            <form action="/upload" class="edit_profile_img" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="logo-upload ">
                                                                @if (Auth::check() && Auth::user()->profile_image)
                                                                <img class="proimg upload-img" src="/assets/images/{{ Auth::user()->profile_image }}" alt="#">
                                                                @else
                                                                <img class="proimg upload-img" src="assets/images/homepage-one/sallers-cover.png" alt="#">
                                                                @endif
                                                            </div>
                                                           </form>
                                                        </div>
                                                    </div>

                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- my perosnal form --}}
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">
                         <div class="seller-application-section">
                               <div class="row ">
                                    <div class="col-lg-7">
                                        <div class=" account-section">
                                            <form action="/update_user" method="post" id="update_user">
                                                @csrf

                                            <div class="review-form">

                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <input type="hidden" value="{{ Auth::user()->user_id }}" name="user_id">
                                                        <label class="form-label roboto_set">Full Name</label>
                                                        <input type="text" class="form-control full_name"
                                                            value="{{ Auth::user()->name }}" name="first_name">
                                                    </div>
                                                </div>
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label class="form-label roboto_set">Email</label>
                                                        <input type="email" class="form-control email" value="{{ Auth::user()->email }}"
                                                            name="email">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label class="form-label roboto_set">Mobile Number</label>
                                                        <input type="text" class="form-control phone"
                                                            value="{{ Auth::user()->phone_number }}" onkeypress="return phone1(event);"
                                                            oninput="checkPhoneNumberLength(this)" name="phone">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 passwor_manage_acc">
                                                    <div class="form-group  pt-3">
                                                        <label class="roboto_set">Password <span class="text-danger">(Four digit number)</span></label>
                                                        <input type="text" placeholder="Enter Password"
                                                            class="form-control passwor_manage_acc" name="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="button" id="show_passwoi" class="btn  mt-1">Update password </button>
                                                </div>

                                                <div class="submit-btn">
                                                    <button type="button" id="updateButton" class="btn shop-btn mt-2">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="img-upload-section">
                                            <div class="logo-wrapper">
                                                <h5 class="comment-title">Logo</h5>
                                                <form action="/upload" class="edit_profile_img" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="logo-upload ">
                                                    @if (Auth::check() && Auth::user()->profile_image)
                                                    <img class="proimg upload-img" src="/assets/images/{{ Auth::user()->profile_image }}" alt="#">
                                                    @else
                                                    <img class="proimg upload-img" src="assets/images/homepage-one/sallers-cover.png" alt="#">
                                                    @endif
                                                </div>
                                               </form>
                                            </div>
                                        </div>
                                        <br>
                                        <form action="/upload" class="edit_profile_img" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @method('put') --}}
                                            <div class="formm1">
                                            <label class="roboto_set" for="image" style="font-size: 14px;">Please select An image </label>
                                            <br>
                                            <br>
                                            <input type="hidden" value="{{ Auth::user()->user_id }}" name="userid">
                                            <input type="file" name="image" class="acp_img" accept=".jpg, .jpeg, .png" required>

                                            <button type="submit" class="btn btn-md home-btn7 mt-4 mb-4 ">Upload</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                         </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab" tabindex="0">
                            <div class="cart-section">


                        @if ($orders = App\Models\product_order::where('user_id', Auth::user()->user_id)->whereIn('payment_status', [1, 2])->orderBy('created_at', 'desc')->get())
                        @if ($orders->isEmpty())
                            <p class="text-center">No orders placed for this account.</p>
                        @else
                        <table>
                            <tbody>
                            <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUCT</h5>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                <h5 class="table-heading">QUANTITY</h5>
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                            <h5 class="table-heading">PRICE</h5>
                            </div>
                            </td>

                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                <h5 class="table-heading">STATUS</h5>
                                </div>
                            </td>

                            </tr>

                            @foreach ($orders as $oo)
                                @if ($slots1 = App\Models\ProductSlot::where('order_id', $oo->order_id)->first())
                            <tr class="table-row ticket-row">
                     <a href="/my_order_status/{{ $slots1->order_id }}" class="orde_ert">
                         <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                            <div class="wrapper-img">

                                @if ($vrs13 = App\Models\product::where('id', $slots1->product_id)->first())
                                <a href="/single_products/{{ $slots1->product_varient_id }}/{{ $slots1->product_id }}">
                                <img src="{{ env('MAIN_URL') }}images/{{ $vrs13->product_image }}"
                                    class="img-fluid" alt="">
                                </a>
                                 @endif
                            </div>
                            <div class="wrapper-content">
                                @if ($vrs11 = App\Models\product::where('id', $slots1->product_id)->first())
                                <a href="/single_products/{{ $slots1->product_varient_id }}/{{ $slots1->product_id }}">
                                <h5 class="heading">{{ $vrs11->product_name }}</h5>
                            </a>
                            @endif
                            @if ($mart = App\Models\product_varient::where('id', $slots1->product_varient_id)->first())
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
                                <h5 class="heading">{{ $slots1->quantity }}</h5>

                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                              <div class="table-wrapper-center">
                                <h5 class="heading">₹{{ $oo->total_amount }}</h5>

                               </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    @if ($oo->is_cancelled == 0)
                                    @if ($oo->delivery_status == 0)
                                        <h5 class="last_h heading"><i class="fa fa-circle  cret1"
                                                aria-hidden="true"></i>pending</h5>
                                    @elseif ($oo->delivery_status == 1)
                                        <h5 class="last_h heading"><i class="fa fa-circle  cret"
                                                aria-hidden="true"></i>Packing</h5>
                                    @elseif ($oo->delivery_status == 2)
                                        <h5 class="last_h heading"><i class="fa fa-circle  cret"
                                                aria-hidden="true"></i>Dispatched</h5>
                                    @elseif ($oo->delivery_status == 3)
                                        <h5 class="last_h heading"><i class="fa fa-circle  cret"
                                                aria-hidden="true"></i>Delivery</h5>
                                    @elseif ($oo->delivery_status == 4)
                                        <h5 class="last_h heading"><i class="fa fa-circle  cret"
                                                aria-hidden="true"></i>
                                            Delivered on {{ $slots1->delivery_date }}</h5>
                                        <p class="last_p heading">Your item has been delivered</p>
                                    @endif
                                @else
                                    <h5 class="last_h heading"><i class="fa fa-circle  cret1"
                                            aria-hidden="true"></i>cancelled</h5>
                                @endif

                                </div>
                            </td>
                    </a>
                            </tr>

                            @endif
                            @endforeach
                        @endif

                            </tbody>
                            </table>
                            </div>

                        </div>
                        @else
                        <p class="text-center">No orders placed for this account.</p>
                    @endif



                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.passwor_manage_acc').hide();

            $('#show_passwoi').on('click', function() {
                $('.passwor_manage_acc').show();
                $('#show_passwoi').hide();
            })
        });
    </script>
    {{-- <script>
        $(document).ready(function() {

            const validator = new JustValidate("#update_user", {
                validateBeforeSubmitting: true,
            });
            // const validator = new JustValidate('.updatesbanner');
            validator
                .addField('.full_name', [{
                        rule: 'required',
                    },
                    {
                        rule: 'minLength',
                        value: 3,
                    },
                    {
                        rule: 'maxLength',
                        value: 30,
                    }
                ])
                .addField('.email', [
                    {
        rule: 'required',
        errorMessage: 'Password is required'
    },
    {
        rule: 'customRegexp',
        value: /^\d{4}$/,
        errorMessage: 'Password should be a four-digit number'
    },
                ])

                .addField('.phone', [{
                        rule: 'required',
                    }, {
                        rule: 'minLength',
                        value: 10,
                    },
                    {
                        rule: 'maxLength',
                        value: 10,
                    },
                ])

                .onSuccess(() => {
                    e.preventDefault();

                    var formData = new FormData($('#update_user')[0]);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/update_product',
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            swal.fire(
                                'Success',
                                'Your User form has been Updated',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    window.location.href = "/myaccount";
                                }
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            if (xhr.responseJSON && xhr.responseJSON.error) {
                                swal.fire('Error!', xhr.responseJSON.error, 'error');
                            } else {
                                swal.fire('Error!', 'An error occurred during the update.',
                                    'error');
                            }
                        }
                    });
                });

        });
    </script> --}}
    <script>
    $(document).ready(function() {

        const validator = new JustValidate("#update_user", {
            validateBeforeSubmitting: true,
        });

        validator
            .addField('.full_name', [{
                    rule: 'required',
                },
                {
                    rule: 'minLength',
                    value: 3,
                },
                {
                    rule: 'maxLength',
                    value: 30,
                },
                {
    rule: 'customRegexp',
    value: /^[a-zA-Z]+$/,
    errorMessage: 'Name should contain only letters'
},
            ])
            .addField('.email', [{
                    rule: 'required',
                    errorMessage: 'Email is required'
                },
                {
                    rule: 'email',
                    errorMessage: 'Please enter a valid email address'
                }
            ])
            .addField('.phone', [{
                    rule: 'required',
                    errorMessage: 'Phone number is required'
                },
                {
                    rule: 'minLength',
                    value: 10,
                    errorMessage: 'Phone number should be at least 10 digits'
                },
                {
                    rule: 'maxLength',
                    value: 10,
                    errorMessage: 'Phone number should not exceed 10 digits'
                },
                {
                    rule: 'numeric',
                    errorMessage: 'Phone number should contain only digits'
                }
            ]);

        // Handle form submission
        $('#update_user').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '/update_user', // Update the URL to match your endpoint
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    swal.fire(
                        'Success',
                        'Your user form has been updated',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            window.location.href = "/myaccount";
                        }
                    });
                },
                error: function(xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        swal.fire('Error!', xhr.responseJSON.error, 'error');
                    } else {
                        swal.fire('Error!', 'An error occurred during the update.', 'error');
                    }
                }
            });
        });

    });

</script>
@endsection

