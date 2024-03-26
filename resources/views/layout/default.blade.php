<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="./assets/img/logo22.png">
    <base href="http://127.0.0.1:8000/">
    {{-- <base href="https://healsyns.karthikeyanvenkidusamy.com/"> --}}
    <!--title  -->
    <title>Healsyns</title>


  <!--------------- swiper-css ---------------->
  <link rel="stylesheet" href="./css/swiper10-bundle.min.css">

  <!--------------- bootstrap-css ---------------->
  <link rel="stylesheet" href="./css/bootstrap-5.3.2.min.css">

  <!---------------------- Range Slider ------------------->
  <link rel="stylesheet" href="css/nouislider.min.css">

  <!---------------------- Scroll ------------------->
  <link rel="stylesheet" href="css/aos-3.0.0.css">

  <!--------------- additional-css ---------------->
  <link rel="stylesheet" href="./css/style.css">

{{-- aos --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

{{-- fontawsome5 --}}
<script src="https://kit.fontawesome.com/def866007f.js" crossorigin="anonymous"></script>

{{-- slick slider --}}

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
</head>


<body>
   @include('layout.header')


    @section('content')

    @show


    @include('layout.footer')




 <!--------------- jQuery ---------------->
 <script src="assets/js/jquery_3.7.1.min.js"></script>

 <!--------------- bootstrap-js ---------------->
 <script src="assets/js/bootstrap_5.3.2.bundle.min.js"></script>

 <!--------------- Range-Slider-js ---------------->
 <script src="assets/js/nouislider.min.js"></script>

 <!--------------- scroll-Animation-js ---------------->
 <script src="assets/js/aos-3.0.0.js"></script>

 <!--------------- swiper-js ---------------->
 <script src="assets/js/swiper10-bundle.min.js"></script>

 <!--------------- additional-js ---------------->
 <script src="assets/js/shopus.js"></script>


 <script src="/assets/js/accountajax.js"></script>
 <script src="/assets/js/register.js"></script>
 <script src="/assets/js/contact.js"></script>

{{-- aos --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- toastify --}}

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

{{-- slick slider --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    AOS.init();
  </script>

{{-- <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script> --}}

<script>
        $(document).ready(function() {
            $('.entr_passwrd').hide();
            $('#sms_ot_login').hide();
            $('.entr_otp').hide();
            $('#sms_ot').on('click', function() {
                $('.entr_passwrd').show();
            })
        });

        $(document).ready(function() {
            $('#set_password').hide();
            $('#forgot_sms_ot_login').hide();

            $('.frgot_enter_paswrd').hide();
            $('.entr_fotgot_otps').hide();
        });
</script>



{{-- eye script --}}
<script>
    function togglePassword1() {
        var passwordInput = document.getElementById("myInput1");
        var passwordIcon = document.querySelector(".toggle-password1 i");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    }
</script>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("myInput");
        var passwordIcon = document.querySelector(".toggle-password i");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    }
</script>

{{-- nav head --}}
{{-- <script>
    window.addEventListener('scroll', function() {
        var header = document.getElementById('header');
        var top1 = document.querySelector('.top1');
        var top2 = document.querySelector('.top2');
        var top3 = document.querySelector('.top3');

        if (window.scrollY > 0) {
            header.classList.add('scrolled');
            top1.style.display = 'none';
            top2.style.display = 'none';
            top3.style.display = 'block';
        } else {
            header.classList.remove('scrolled');
            top1.style.display = 'block';
            top2.style.display = 'block';
            top3.style.display = 'none';
        }
    });
</script> --}}


<script>
    $(function() {

        // Function to extract query parameter from URL
        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Get the category ID from the URL
        const categoryId = getQueryParam('categoryid');
        console.log(categoryId);

        if (categoryId) {
            $("#" + categoryId).trigger("click");
        }

    })
</script>

{{-- search input clear model --}}


{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = document.querySelector('.search_engine.modal');
        myModal.addEventListener('hidden.bs.modal', function () {
            var searchInput = document.querySelector('.searchmodelword');
            searchInput.value = '';
        });

    });
</script> --}}



<script>
// range value

    const rangeInput = document.querySelectorAll(".range-input input"),
        priceInput = document.querySelectorAll(".price-input input"),
        range = document.querySelector(".slider .progress");
    let priceGap = 100;

    priceInput.forEach((input) => {
        input.addEventListener("input", (e) => {
            let minPrice = parseInt(priceInput[0].value),
                maxPrice = parseInt(priceInput[1].value);

            if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                if (e.target.className === "input-min") {
                    rangeInput[0].value = minPrice;
                    range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                } else {
                    rangeInput[1].value = maxPrice;
                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            }
        });
    });

    rangeInput.forEach((input) => {
        input.addEventListener("input", (e) => {
            let minVal = parseInt(rangeInput[0].value),
                maxVal = parseInt(rangeInput[1].value);

            if (maxVal - minVal < priceGap) {
                if (e.target.className === "range-min") {
                    rangeInput[0].value = maxVal - priceGap;
                } else {
                    rangeInput[1].value = minVal + priceGap;
                }
            } else {
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        });
    });
</script>


<script>
    // all categories and  home
    function increaseValue(id) {
        var value = parseInt(document.getElementById(id + '-number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById(id + '-number').value = value;
    }

    function decreaseValue(id) {
        var value = parseInt(document.getElementById(id + '-number').value, 10);
        value = isNaN(value) ? 0 : value;
        // value < 1 ? value = 1 : '';
        // value--;
        value = (value <= 1) ? 1 : value - 1;
        document.getElementById(id + '-number').value = value;
    }


    // add to cart


    function increaseValue1(id) {
        var value = parseInt(document.getElementById(id + '-number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById(id + '-number').value = value;
    }

    function decreaseValue1(id) {
        var value = parseInt(document.getElementById(id + '-number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById(id + '-number').value = value;
    }
</script>


{{-- add to cart product total --}}
<script>

      $(document).ready(function() {
            updateTotal();
            singletocheckout();
        });

    function cartcalculation(el, event) {

        var $carts = $(el).closest('.cart_closest_row');
        var $qtyInput = $carts.find('.Qty_val');
        var $priceInput = $carts.find('.saleprice');
        var $totalAmountInput = $carts.find('.TotalAmot');
        var maxQty = $carts.find('.max_qty').val();

        var qty = parseInt($qtyInput.val());
        console.log("event"+event.target.id);
        var proprice = parseFloat($priceInput.val());
        if (event.target.id === 'increase') {
            if (qty < maxQty) {
                var newQty = qty + 1;

                $qtyInput.val(newQty);
                var totalamt = newQty * proprice;
                console.log(totalamt);
                $(el).closest('tr').find('#outputValue').text(totalamt);

              $totalAmountInput.val(totalamt.toFixed(2));

            } else {
                Toastify({
                text: "Out Of Stock",
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
            }
        } else if (event.target.id === 'decrease') {
            if (qty > 1) {
                var newQty = qty - 1;
                $qtyInput.val(newQty);
                var totalamt = newQty * proprice;
                $(el).closest('tr').find('#outputValue').text(totalamt);
                $totalAmountInput.val(totalamt.toFixed(2));
            }
        }
        mainamount();
    }

    function mainamount() {
        $totalfulamot = 0;
        $('.outputValue').each(function(){
            let val = $(this).text();
            $totalfulamot += parseFloat(val);
        });
        // $('.TotalAmot').each(function() {
        //     let val = $(this).val();
        //     var qty = $(this).closest('tr').find('.Qty_val').val();
        //     $totalfulamot += parseFloat(val);

        // })
        $('#cartToatAmt').text('Product Grand Total ₹' + (parseFloat($totalfulamot)).toFixed(2));
        $('.Cartfull_Amt').val(parseFloat($totalfulamot).toFixed(2));
    }
    // starting total amount
    $(document).ready(function() {
        mainamount();
    })

    function updateTotal() {
        let totalAmount = 0;
        // Loop through all product prices and quantities
        $('[id^="price-"]').each(function() {
            const priceText = $(this).text().replace('₹', '');
            const price = !isNaN(parseFloat(priceText)) ? parseFloat(priceText) : 0;
            const productId = $(this).attr('id').split('-')[1]; // Extract the product ID
            const input = $(`#hair-${productId}-number`);
            const quantity = !isNaN(parseInt(input.val())) ? parseInt(input.val()) : 0;
            totalAmount += price // Consider both price and quantity

            // change code
            $(`#price_offer_${productId}`).val(price);
            $(this).closest('div').find('.cart_qty').val(quantity);
        });

        // Update the total amount
        $('.totalamtcart').val(totalAmount);
        $('#totalAmount').text(`₹${totalAmount.toFixed(2)}`);
    }

    function updatePriceAndTotal(offerPrice) {
        updatePrice(offerPrice);
        updateTotal();
    }
</script>



<script>
    function increment(idd, event) {
        var qtty = $('#qty' + idd).val();
        var maxqty = $('#maxqty' + idd).val();
        var proprice = $('#proprice' + idd).val();
        var mrprice = $('#mrprice' + idd).val();
        var totalamt;
        if (qtty != maxqty) {
            qtty = parseInt(qtty) + 1;
            $('#qty' + idd).val(qtty);
            totalamt = parseFloat(proprice) * parseFloat(qtty);
            // $('#totalamt' + idd).val(totalamt.toFixed(2));
        } else {
            Toastify({
                text: "Out Of Stock",
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        }
    }

    function decrement(idd1, event) {
        var qtty1 = $('#qty' + idd1).val();
        var minqty = 1;
        // var minqty = $('#minqty' + idd1).val();
        var proprice1 = $('#proprice' + idd1).val();
        var mrprice = $('#mrprice' + idd1).val();
        var totalamtt;

        if (qtty1 != minqty) {
            qtty1 = parseInt(qtty1) - 1;
            $('#qty' + idd1).val(qtty1);
            totalamt1 = parseFloat(proprice1) * parseFloat(qtty1);
            // $('#totalamt' + idd1).val(totalamt1.toFixed(2));
        }
    }

    // $(document).ready(function() {

    //     $('.coupon_btn').on("click", function() {
    //         var couponcode = $('.coupocode').val();
    //         var totalamount = $('.totalamt').val();
    //         var taxamt = $('.taxamt').val();
    //         var userId = $('.loginid').val();

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         $.ajax({
    //             url: '/couponapply',
    //             type: 'POST',
    //             // Replace with your actual API endpoint
    //             data: {
    //                 couponcode: couponcode,
    //                 totalamount: totalamount,
    //                 userId: userId,
    //                 taxamt: taxamt
    //             },
    //             success: function(response) {
    //               alert("Coupon code apply.");
    //                 // $('.success-message').text('Coupon code apply.');
    //                  console.log(response);

    //                 var discountedAmount = response.disamt;
    //                 console.log("discountedAmount", discountedAmount);
    //                 $('.discountprint').text('-₹' + discountedAmount);
    //                 var disamt = $('.discamnt').val(discountedAmount);

    //                 singletocheckout();
    //             },
    //             error: function(xhr, status, error) {
    //                 $('.error-message').text('An error occurred while applying the coupon. Please try again later.');
    //         }

    //         });
    //     });

    // });



// $(document).ready(function() {
//     $('.coupon_btn').on("click", function() {
//         var couponcode = $('.coupocode').val();
//         var totalamount = $('.totalamt').val();
//         var taxamt = $('.taxamt').val();
//         var userId = $('.loginid').val();

//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             url: '/couponapply',
//             type: 'POST',
//             data: {
//                 couponcode: couponcode,
//                 totalamount: totalamount,
//                 userId: userId,
//                 taxamt: taxamt
//             },
//             success: function(response) {
//                 alert("Coupon code applied.");
//                 console.log(response);

//                 var discountedAmount = response.disamt;
//                 console.log("discountedAmount", discountedAmount);
//                 $('.discountprint').text('-₹' + discountedAmount);
//                 var disamt = $('.discamnt').val(discountedAmount);

//                 singletocheckout();
//             },
//             error: function(xhr, status, error) {
//                 var errorMessage = 'An error occurred while applying the coupon. Please try again later.';
//                 if (xhr.responseJSON && xhr.responseJSON.error && xhr.responseJSON.error === 'Coupon has expired') {
//                     errorMessage = 'The coupon has expired.';
//                 }
//                 $('.error-message').text(errorMessage).show(); // Show error message
//                 // alert(errorMessage); // Show alert for expired coupon

//                 // Hide error message after 5 seconds (5000 milliseconds)
//                 setTimeout(function() {
//                     $('.error-message').hide();
//                 }, 5000);
//             }
//         });
//     });
// });

$(document).ready(function() {
    $('.coupon_btn').on("click", function() {
        var couponcode = $('.coupocode').val();
        var totalamount = $('.totalamt').val();
        var taxamt = $('.taxamt').val();
        var userId = $('.loginid').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/couponapply',
            type: 'POST',
                data: {
                    couponcode: couponcode,
                    totalamount: totalamount,
                    userId: userId,
                    taxamt: taxamt
                },
                success: function(response) {
                    alert("Coupon code applied.");
                    console.log(response);

                    var discountedAmount = response.disamt;
                    console.log("discountedAmount", discountedAmount);
                    $('.discountprint').text('-₹' + discountedAmount);
                    var disamt = $('.discamnt').val(discountedAmount);

                    singletocheckout();
                },
                error: function(xhr, status, error) {
                    var errorMessage = 'An error occurred while applying the coupon. Please try again later.';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        if (xhr.responseJSON.error === 'Coupon has expired') {
                            errorMessage = 'The coupon has expired.';
                        } else if (xhr.responseJSON.error === 'You have already used a coupon.') {
                            errorMessage = 'You have already used a coupon.';
                        }
                    }
                    $('.error-message').text(errorMessage).show();
                    setTimeout(function() {
                        $('.error-message').hide();
                    }, 5000);
                }
            });
        });
    });




    function singletocheckout() {

      var totalamt = $('.totalamt').val();
            var discamnt = $('.discamnt').val();
            var delivery_amt = $('.delivery_amt_display').val();
            var tax_amt = $('.tax_amt_display').val();
            var netTotal = totalamt - discamnt;

            // var roundedNetTotal = Math.round(parseFloat(netTotal));
            // var roundedTaxAmt = Math.round(parseFloat(tax_amt));
            // console.log('roundedNetTotal', roundedNetTotal)
            // console.log('roundedTaxAmt', roundedTaxAmt)
            // var gstval = $('.tax_amt_display').val();
            // var taxAmount = (netTotal * gstval) / 100;
            //    var nn = $('.textamt').text('+₹ ' + taxAmount.toFixed(2));


            var gstval = $('.tax_amt_display').val();
            // console.log("nettotal",netTotal);
            // totalsamt = parseInt(netTotal) + parseInt(gstval);
            // console.log(parseFloat(netTotal) , parseFloat(delivery_amt) , parseFloat(tax_amt));
            totalsamt = parseFloat(netTotal) + parseFloat(delivery_amt) + parseFloat(tax_amt);




            // var paytamt = totalsamt + gstval;
            $('#proamt').text('₹ ' + totalsamt.toFixed(2));
            $('.finalpay').val(totalsamt);
        }


    // checkout checkbox
    $(document).ready(function() {
        $('.checkout_checkbox').change(function() {
            if (this.checked) {
                $('.same_adress_row').show();

                var uname = $('.c_userid').val();
                var phone = $('.c_phone').val();
                var email = $('.c_email').val();
                var addres = $('.c_addres').val();
                var city = $('.c_city').val();
                var state = $('.c_state').val();
                var pincode = $('.c_pincode').val();
                var landmark = $('.c_landmark').val();

                $('.d_name').val(uname);
                $('.d_phone').val(phone);
                $('.d_email').val(email);
                $('.d_address').val(addres);
                $('.d_city').val(city);
                $('.d_state').val(state);
                $('.d_pincode').val(pincode);

                var $dropdown = $('.d_landmark');
                $dropdown.append('<option value="' + landmark + '" selected>' + landmark + '</option>');
                $('.d_landmark').append(option);
            } else {
                $('.same_adress_row').hide();
            }
        });
        // ============checkout form validation ====================
        $('.checkoutform').on('click', function() {
            checkfullname();
            checkphone();
            checkmail();
            checkaddress();
            checkpincode();
            checkstate();
            checkcity();
            checkarea();

            if (checkfullname() == true && checkphone() == true && checkmail() == true &&
                checkaddress() == true && checkpincode() == true && checkstate() == true &&
                checkcity() ==
                true && checkarea() == true) {

                $(".checkoutform").attr('type', 'submit');
            } else {
                $(".checkoutform").attr('type', 'button');
            }
        });
        $('.c_userid').on("input", function() {
            checkfullname();
        });
        $('.c_phone').on("input", function() {
            checkphone();
        });
        $('.c_email').on("input", function() {
            checkmail();
        });
        $('.c_addres').on("input", function() {
            checkaddress();
        });
        $('.c_pincode').on("input", function() {
            checkpincode();
        });
        $('.c_state').on("input", function() {
            checkstate();
        });
        $('.c_city').on("input", function() {
            checkcity();
        });
        $('.c_landmark').on("input", function() {
            checkarea();
        });

        function checkfullname() {
            let fullname = $('.c_userid').val();
            if (fullname == '') {
                $("#msg1").html("*Please enter Full Name");
                $('#msg1').show();
                return false
            } else {
                $('#text1').hide();
                return true
            }
        }

        function checkphone() {
            let Phone01 = $('.c_phone').val();
            var Pattern = /^[6,7,8,9][0-9]{0,9}$/;

            if (Phone01 == '') {
                $("#msg2").html("*Please enter the Phone Number");
                $("#msg2").show();
                return false
            } else if (Phone01.length < 10 || Phone01.length > 10) {
                $("#msg2").html('*Please correct format');
                $("#msg2").show();
                return false
            } else if ((!Pattern.test(Phone01))) {
                $("#msg2").html('*Please correct format');
                $("#msg2").show();
                return false
            } else {
                $("#msg2").hide();
                return true
            }
        }

        function checkmail() {
            let Email = $('.c_email').val();
            mail = /^([A-Za-z0-9_.])+\@([a-z])+\.([a-z])+$/;

            if (Email == '') {
                $("#msg3").html("* Please enter the email");
                $("#msg3").show();
                return false
            } else if ((!mail.test(Email))) {
                $("#msg3").html("* Enter  email correct format");
                $("#msg3").show();
                return false
            } else {
                $("#msg3").hide();
                return true
            }
        }

        function checkaddress() {
            let addres = $('.c_addres').val();
            if (addres == '') {
                $("#msg4").html("*Please enter address");
                $('#msg4').show();
                return false
            }
            else if (addres.length < 10 || addres.length > 20) {
                $("#msg4").html('Address should be 20 characters');
                $("#msg4").show();
                return false
            }  else {
                $('#msg4').hide();
                return true
            }
        }

        function checkpincode() {
            let pincode = $('.c_pincode').val();
            if (pincode == '') {
                $("#msg5").html("This field is required");
                $('#msg5').show();
                return false
            } else if (pincode.length < 6 || pincode.length > 6) {
                $("#msg5").html('Pincode should be 6 characters');
                $("#msg5").show();
                return false
            } else {
                $('#msg5').hide();
                return true
            }
        }

        function checkstate() {
            let state = $('.c_state').val();
            if (state == '') {
                $("#msg6").html("This field is required");
                $('#msg6').show();
                return false
            } else {
                $('#msg6').hide();
                return true
            }
        }

        function checkcity() {
            let city = $('.c_city').val();
            if (city == '') {
                $("#msg7").html("This field is required");
                $('#msg7').show();
                return false
            } else {
                $('#msg7').hide();
                return true
            }
        }

        function checkarea() {
            let area = $('.c_landmark').val();
            if (area == '') {
                $("#msg8").html("This field is required");
                $('#msg8').show();
                return false
            } else {
                $('#msg8').hide();
                return true
            }
        }

    });
</script>





<script>
    function updateTotalCartAmount() {
        let totalCartValue = 0;
        $('[name="ogproprice[]"]').each(function(index, element) {

            totalCartValue += (element.value * $(".cart_qty")[index].value);
            $(".totalamtcart").val(totalCartValue);
            $("#totalAmount").html(`₹${totalCartValue}`)
        })
    }

    $(function() {
        updateTotalCartAmount();
    })
</script>


{{-- coupon code --}}
<script>
    $(document).ready(function() {
        // Function to show the modal
        function showModal() {
            $('#ofersModal').modal('show');
        }
        showModal();

        setInterval(function() {
            showModal();
        }, 60000000); // 60000 milliseconds = 1 minute
    });
</script>

{{-- paynow --}}
<script>
    $(document).ready(function() {
        $('.form-check-input').click(function() {
            // Uncheck all checkboxes except the one that was clicked
            $('.form-check-input').not(this).prop('checked', false);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.checkoutform_one').hide();
        $('#flexCheckDefault2').on('click', function() {
            $('.checkoutform_one').show();
            $('.pays1').hide();
        })
        $('#flexCheckDefault1').on('click', function() {
            $('.pays1').show();
            $('.checkoutform_one').hide();
        })
    });
</script>

<script>
    var list = document.querySelectorAll('.des_one1 ')

    function setactive() {
        list.forEach((item) =>
            item.classList.remove('active'));
        this.classList.toggle('active')
    }


    list.forEach((item) =>
        item.addEventListener('click', setactive));
</script>



</body>

</html>

