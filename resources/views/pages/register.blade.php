@extends('layout.default')
@section('content')

<style>
    .toggle-password1{
        padding:19px;
    }
    .input-group-append {
    position: absolute;
    right: 0px;
    z-index: 99;
}
</style>
 <!--------------- login-section--------------->
 <section class="login account footer-padding">
    <div class="container">
        <div class="login-section account-section">
            <div class="review-form">



               @if(session('error1'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error1') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
              @endif

                <h5 class="comment-title">Create Account</h5>
        <form action="register" class="register_form" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class=" account-inner-form">
                    <div class="review-form-name">
                        <label for="fname" class="form-label"> Name*</label>
                        <input type="text" class="form-control full_name" name="full_name"
                        maxlength="40" onkeydown="return /[a-z ]/i.test(event.key)" placeholder="Name" required>
                        @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                </div>


                <div class=" account-inner-form">
                    <div class="review-form-name">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control email" name="email" placeholder="user@gmail.com" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="review-form-name">
                    <label for="phone" class="form-label">Phone*</label>
                    <input type="text" maxlength="10" class="form-control phone" name="phone_number"
                    onkeypress="return phone1(event);" oninput="checkPhoneNumberLength(this)" placeholder="Phone number" required>

                    @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="review-form-name address-form">
                    <label for="pin" class="form-label">Password*</label>
                    <div class="paswer">
                        <div class="input-group">
                            <input class="form-control  bnub" id="myInput1" type="password"
                                name="password" placeholder="Four digit number" maxlength="4"
                                autocomplete="off"  onkeypress="return phone1(event);" required>

                            <div class="input-group-append">
                                <span class="input-group-text toggle-password1 form-control"
                                    onclick="togglePassword1()">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                </div>


                <div class="login-btn text-center">
                    <button type="submit" name="register_btn" id="register_btn"
                                            class="btn m-auto d-block home-btn3 shop-btn">
                                            Register</button>
                    <br>
                    <span class="shop-account">Already have an account ?<a href="/loginn">Log In</a></span>
                </div>

        </form>

            </div>
        </div>
    </div>
</section>


{{-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {




        const validator = new JustValidate(".register_form", {
            validateBeforeSubmitting: true,
        });

        validator
            .addField('.full_name', [{
                    rule: 'required',
                },
                {
                    rule: 'minLength',
                    value: 5,
                },
                {
                    rule: 'maxLength',
                    value: 30,
                }
            ])
            .addField('.email', [{
                    rule: 'required',
                },
                {
                    rule: 'email',
                }
            ])
            .addField('.bnub', [{
                rule: 'required',
                }, {
                    rule: 'minLength',
                    value: 4,
                },
                {
                    rule: 'maxLength',
                    value: 4,
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

                var formData = $('.register_form').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/registerr',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        swal.fire(
                            'Success',
                            response.success,
                            'success'
                        ).then(() => {
                            // Redirect to the login page
                            window.location.href = '/loginn';
                        });
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            swal.fire(
                                'Error!',
                                xhr.responseJSON.error,
                                'error'
                            );
                        } else {
                            swal.fire(
                                'Error!',
                                'Failed to update register data. Please try again later.',
                                'error'
                            );
                        }
                    }
                });
            });

    });
</script> --}}
<!--------------- login-section-end --------------->
@endsection



