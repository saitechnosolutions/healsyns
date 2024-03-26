@extends('layout.default')
@section('content')
 <style>
 .broo {
 border: 1px solid #D4D7E3;
background: #F7FBFF;
}

.loher {
display: flex;
align-items: center;
 }
 .review-form-name input{
 border-radius: 20px;
 }
.roboto {
    color: #0C1421;
    font-size: 16px;
    font-weight: 400;
    font-family: 'Roboto Flex', sans-serif;
}
.login_pass_ide {
    position: absolute;
    right: 5px;
    width: 31px;
    top: 14px;
    background: transparent;
    border: none !important;
    z-index: 11;
}
.logses_ful .fa-eye-slash {
    color: #23989f;
}
.home-btn3 {
    background: #23989f;
    animation: btn 2s ease-in-out;
    font-size: 16px;
    position: relative;
    width: 100%;
    z-index: 1;
    border-radius: 5px !important;
    padding: 13px 20px;
    color: #fff;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.home-btn3:hover{
    background: #181818;
    color:white;
}
    </style>
    <!--------------- login-section --------------->
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">


                    {{-- @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif --}}

                    @if(session('error'))
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                    @endif


                    @if(session('success1'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      {{ session('success1') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                   @endif



                    <h5 class="comment-title">Log In</h5>

                    <form action="/login" class="login_form" method="POST">
                        @csrf
                        <div class="review-inner-form ">

                            <div class="review-form-name">
                                <label for="mobile" class="form-label">Mobile Number</label>

                                <input type="text" maxlength="10" class="form-control broo"  onkeypress="return phone1(event);"  name="login_mblnum" required>
                            </div>

                            <div class="review-form-name form-group">
                                <label for="password" class="form-label">Password (4 Digit)</label>
                                <div class="loginssss">
                                    <div class="input-group">
                                         <input class="form-control  mert broo"id="myInput" type="password"   onkeypress="return phone1(event);" maxlength="4" name="login_passwrd"
                                          required placeholder="Password" autocomplete="off" style=" border-radius: 20px;">
                                        <div class="input-group-append">
                                            <span
                                                class="input-group-text toggle-password form-control  login_pass_ide"
                                                onclick="togglePassword()">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-form-name checkbox">
                                    <a class="pind" href="#"data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot
                                        Password ?</a>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button class="btn  home-btn3  logins shop-btn" type="submit">
                                Sign In</button>
                            {{-- <a href="/user" class="shop-btn">Log In</a> --}}
                            <span class="shop-account">Dont't have an account ?<a href="/registerr">Create
                                    account</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--------------- login-section-end --------------->

    {{-- forgot password --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="border: white;">
          <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="">
            <div class="row" style="padding: 0px 50px;margin-bottom:5px;">
                <div class="col-lg-12 pt-5">
                    <div class="form-group">
                        <label for="" class="roboto" style="margin-bottom:5px;">Email Address</label>
                        <input type="email" id="forgot_emailInput" class="form-control roboto emil forgot_emailInput">
                    </div>
                </div>
                <div class="col-lg-12 pt-2" style="margin-top: 10px;">
                    <input type="text" class="form-control roboto entr_fotgot_otps"
                        maxlength="4" name=""
                        placeholder="Enter OTP">
                </div>

                <div class="col-lg-12 pt-2">
                    <input type="text" class="form-control roboto frgot_enter_paswrd"
                        name="" maxlength="4" id="enter_pswrd" placeholder="Enter New Four digit Password">
                        <span id="error_message" style="color: red;"></span>
                    </div>
                <!-- ... Other form fields ... -->
                <div class="col-lg-12 pt-2">
                    <div class="tree text-center">
                        <button type="button" class="btn  home-btn3" id="forgot_sms_ot">
                            Send OTP
                        </button>
                    </div>
                </div>
                <div class="col-lg-12 pt-2">
                    <div class="tree text-center">
                        <button type="button" class="btn  home-btn3"
                            id="forgot_sms_ot_login">
                            submit</button>
                    </div>
                </div>

                <div class="col-lg-12 pt-2">
                    <div class="tree text-center">
                        <button type="button" class="btn  home-btn3" id="set_password">
                            Set Password</button>
                    </div>
                </div>
                <!-- ... Other form buttons ... -->
            </div>
        </form>


      </div>
    </div>
  </div>

  <script>
    // Get the input element and error message span
    var inputElement = document.getElementById('enter_pswrd');
    var errorMessageSpan = document.getElementById('error_message');

    // Add event listener to input field for validation
    inputElement.addEventListener('input', function() {
        var inputValue = inputElement.value;

        // Check if input value is not a number
        if (isNaN(inputValue)) {
            errorMessageSpan.textContent = "Please enter a valid number";
        } else {
            errorMessageSpan.textContent = ""; 
        }
    });
</script>

@endsection
