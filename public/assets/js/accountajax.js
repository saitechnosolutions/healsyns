// ========================singleproduct code ===================


$(document).ready(function () {
    $('.price_ty').on('click', function () {
        var sizevar_id = $(this).data('vrid');
        $('.price_ty').removeClass('active');
        $('.sts').removeClass('active1');
        $(this).addClass('active1');
        //default qty 1 set
        $('.productqty').val('1');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/siglesizedata',
            method: "POST",
            data: {
                varid: sizevar_id
            },
            success: function (data) {
                // console.log('data', data);
                // alert(data.product_qty);
                $('.prd_varient_id').val(data.data['id']);
                $('.product_main_id').val(data.data['product_id']);

                $('.he_price').text('₹' + data.data['offer_price']);
                $('#proprice1').val(data.data['offer_price']);

                $('.he_par').text('₹' + data.data['mrp_price']);
                $('#mrprice').val(data.data['mrp_price']);

                $('#progst').val(data.data['product_gst']);

                $('#maxqty1').val(data.data['product_qty']);

                //total amount initial offerprice val ajax time
                $('#totalamt1').val(data.data['offer_price']);

                // offer calculation
                var mrp = $("#mrprice").val();
                var salePrice = $("#proprice1").val();
                if (mrp !== "" && salePrice !== "") {
                    var discount = ((mrp - salePrice) / mrp) * 100;
                    $(".offer").text('(' + discount.toFixed(2) + "%" + ')');
                }
            },
        });
    });
});







// ===============send otp =================

$(document).ready(function () {
    $('#sms_ot').on('click', function () {
        var mobile = $('#mobileInput').val();

        if (!mobile) {
            swal.fire('Error!', 'Please enter a mobile number', 'error');
            return;
        } else if (mobile.length < 10) {
            swal.fire('Error!', 'Mobile number must be at least 10 characters', 'error');
            return;
        }
        $("#sms_ot").attr("disabled", true);

        $.ajax({
            url: '/sendOtp',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({
                'mobile': mobile,
            }),
            complete: function () {
                $("#sms_ot").removeAttr("disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.includes('Mobile number already exists')) {
                    $('.entr_otp').hide();
                    $('#sms_ot_login').hide();
                    $('#sms_ot').show();
                    swal.fire('Error!', response, 'error');
                } else {
                    $('.entr_otp').show();
                    $('#sms_ot_login').show();
                    $('#sms_ot').hide();
                    swal.fire('Success', 'OTP sent Successfully', 'success');
                }
            },
            error: function (xhr) {
                console.log(xhr);
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    swal.fire('Error!', xhr.responseJSON.error, 'error');
                } else {
                    swal.fire('Error!', 'Already  used this mobile number', 'error');
                }
            }
        });
    });
});




// ========================  enter otp ============

$(document).ready(function () {
    $('#sms_ot_login').on('click', function () {
        var enteredOTP = $('#otpInput').val();
        var mobile = $('#mobileInput').val();
        $.ajax({
            url: '/checkOtp',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({
                'otp': enteredOTP,
                'mobile': mobile,
            }),
            success: function (response) {
                console.log(response);
                if (response.success) {
                    swal.fire({
                        title: 'Success',
                        text: 'Login Successfully',
                        icon: 'success',
                        didClose: function () {
                            location.reload();
                        }
                    });
                } else {
                    swal.fire({
                        title: 'Warning',
                        text: 'Incorrect OTP. Please try again.',
                        icon: 'warning'
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                swal.fire({
                    title: 'Warning',
                    text: 'Incorrect OTP. Please check.',
                    icon: 'warning'
                });
            }
        });
    });
});




// =================================== forgot send otp new=============

$(document).ready(function () {
    $('#forgot_sms_ot').on('click', function () {
        var email = $('.forgot_emailInput').val(); // Use email input for email address

        if (!email) {
            swal.fire('Error!', 'Please enter an email address', 'error');
            return;
        }

        $("#forgot_sms_ot").attr("disabled", true);

        $.ajax({
            url: '/forgotsendOtp',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({
                'email': email, // Send email instead of mobile
            }),
            complete: function () {
                $("#forgot_sms_ot").removeAttr("disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.includes('Email not found')) {
                    swal.fire('Error!', response, 'error');
                } else {
                    $(".entr_fotgot_otps").show();
                    $("#forgot_sms_ot").hide();
                    $("#forgot_sms_ot_login").show();
                    swal.fire('Success', 'OTP sent Successfully', 'success');
                }
            },
            error: function (xhr) {
                console.log(xhr);
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    swal.fire('Error!', xhr.responseJSON.error, 'error');
                } else {
                    swal.fire('Error!', 'Email address not found. Please try again.', 'error');
                }
            }
        });
    });
});


// ======================== FORGOT enter otp new============

$(document).ready(function () {
    $('#forgot_sms_ot_login').on('click', function () {
        var enteredOTP = $('.entr_fotgot_otps').val();
        var email = $('.forgot_mobileInput').val();
        $.ajax({
            url: '/forgotcheckOtp',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({
                'otp': enteredOTP,
                'email': email,
            }),
            // success: function (response) {
            //     console.log(response);
            //     if (response.success) {


            //         $(".entr_fotgot_otps").hide();
            //         $(".frgot_enter_paswrd").show();
            //         $("#forgot_sms_ot_login").hide();
            //         $("#set_password").show();
            //         swal.fire({
            //             title: 'Success',
            //             text: 'OTP is correct! Please enter your password.',
            //             icon: 'success',
            //         });
            //     }
            //     else {

            //         swal.fire({
            //             title: 'Warning',
            //             text: response.message,
            //             icon: 'warning'
            //         });
            //     }

            // },
            // error: function (xhr) {
            //     console.log(xhr);

            //     swal.fire({
            //         title: 'Warning',
            //         text: 'Incorrect OTP. Please check.',
            //         icon: 'warning'
            //     });
            // }
            success: function (response) {
                console.log(response);
                if (response.success) {
                    // OTP is correct, show password input
                    $(".entr_fotgot_otps").hide();
                    $(".frgot_enter_paswrd").show();
                    $("#forgot_sms_ot_login").hide();
                    $("#set_password").show();
                    swal.fire({
                        title: 'Success',
                        text: 'OTP is correct! Please enter your password.',
                        icon: 'success',
                    });
                } else {
                    if (response.error === 'expired') {
                        // Expired OTP, show warning
                        swal.fire({
                            title: 'Warning',
                            text: response.message,
                            icon: 'warning'
                        });
                    } else {
                        // Incorrect OTP, show warning
                        swal.fire({
                            title: 'Warning',
                            text: response.message,
                            icon: 'warning'
                        });
                    }
                }
            },
            error: function (xhr) {
                console.log(xhr);
                // Error in the request, show warning
                swal.fire({
                    title: 'Warning',
                    text: 'Error in the request. Please try again later.',
                    icon: 'warning'
                });
            }

        });
    });
});


// =================================enter password new============



$(document).ready(function () {
    $('#set_password').on('click', function () {
        var frgot_enter_paswrd = $('.frgot_enter_paswrd').val();
        var email = $('.forgot_emailInput').val();

        if (!frgot_enter_paswrd) {
            swal.fire({
                title: 'Error',
                text: 'Enter Password',
                icon: 'error',
            });
            return;
        }

        $.ajax({
            url: '/savepassword',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({
                'frgot_enter_paswrd': frgot_enter_paswrd,
                'email': email,
            }),
            success: function (response) {
                console.log(response);
                if (response.success) {
                    // OTP is correct, show password input
                    $('#passwordInput').show();
                    swal.fire({
                        title: 'Success',
                        text: 'password set successfully.',
                        icon: 'success',
                    })
                    location.reload();
                } else {
                    // Incorrect OTP, show warning
                    swal.fire({
                        title: 'Warning',
                        text: 'Incorrect OTP. Please try again.',
                        icon: 'warning'
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                // Error in the request, show warning
                swal.fire({
                    title: 'Warning',
                    text: 'Incorrect OTP. Please check.',
                    icon: 'warning'
                });
            }
        });
    });
});




// ==============  user update fields ===============

$(document).ready(function () {
    $('#updateButton').on('click', function (e) {
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
            success: function (response) {
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
            error: function (xhr) {
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








//    set default address button

$(document).on('click', '#make_default1', function (e) {
    e.preventDefault();

    var defaultUrl = $(this).attr('href');

    swal.fire({
        title: "Make as Default",
        text: "Are you sure you want to make this address as default?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, make it default!",
        cancelButtonText: "No, cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            // Display a success message
            swal.fire("Success", "The address has been set as default.", "success")
                .then(() => {
                    // Reload the page when the user clicks "OK"
                    window.location.href = defaultUrl;
                });
        } else {
            swal.fire("Cancelled", "The address has not been set as default.", "info");
        }
    });
});



//   =================    delete adres btn ============

$(document).on('click', '.delete-address1', function (e) {
    e.preventDefault();

    var deleteUrl = $(this).attr('href');
    var addressId = $(this).data('address-id');

    swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this address!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform the action (redirect or any other logic)
            window.location.href = deleteUrl;
        } else {
            swal.fire("Cancelled", "The address has not been deleted.", "info");
        }
    });
});









// ============================= edit manage address ========================



// $(document).ready(function () {
//     $('#edit_adress').on('click', function () {
//         var edit_adress = $('.edit_manage_addres').serialize();
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         swal.fire(
//             'Success',
//             'Edited Manage user address sucessfully',
//             'success'
//         ).then((confirmation) => {
//             if (confirmation) {
//                 $.ajax({
//                     url: '/edit_manage_ajax',
//                     type: 'post',
//                     data: edit_adress,
//                     success: function (response) {
//                         console.log(response);
//                         location.reload();
//                     },
//                     error: function (error) {
//                         console.log(error);
//                         swal.fire(
//                             'Error!',
//                             'The phone number has been already entered . please enter valid number',
//                             'error'
//                         )
//                     }
//                 });
//             }
//         });
//     });
// });





// ================= search word nav bar ==================

// $("#searchwordsss").on("input", function () {
//     let input = $(this).val();
//     $('.ghh').hide();
//     $.ajax({
//         url: '/search', // Update with your route
//         method: 'GET',
//         data: {
//             input: input
//         },
//         success: function (response) {
//             if (response.trim() === "") {
//                 $("#search_group").html('<div class="no-product-message">No products found.</div>');
//             } else {
//                 $("#search_group").html(response);
//             }
//         },
//         error: function (err) {
//             console.error(err);
//         }
//     });
// });



    // $("#searchwordsss").on("input", function () {
    //     let input = $(this).val();
    //     $('.ghh').hide();
    //     $.ajax({
    //         url: '/search', // Update with your route
    //         method: 'GET',
    //         data: {
    //             input: input
    //         },
    //         success: function (response) {
    //             if (response.trim() === "") {
    //                 $("#search_group").html('<div class="no-product-message">No products found.</div>');
    //             } else {
    //                 $("#search_group").html(response);
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err);
    //         }
    //     });
    // });

    // // Handle form submission
    // $("#searchForm").submit(function (event) {
    //     event.preventDefault(); // Prevent default form submission
    //     // Your existing AJAX search functionality can go here
    //     let input = $("#searchwordsss").val();
    //     $('.ghh').hide();
    //     $.ajax({
    //         url: '/search', // Update with your route
    //         method: 'GET',
    //         data: {
    //             input: input
    //         },
    //         success: function (response) {
    //             if (response.trim() === "") {
    //                 $("#search_group").html('<div class="no-product-message">No products found.</div>');
    //             } else {
    //                 $("#search_group").html(response);
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err);
    //         }
    //     });
    // });



// Function to fetch and display product variants
function displayProductVariants(input = '') {
    $.ajax({
        url: '/search', // Update with your route
        method: 'GET',
        data: {
            input: input
        },
        success: function (response) {
            if (response.trim() === "") {
                $("#search_group").html('<div class="no-product-message">No products found.</div>');
            } else {
                $("#search_group").html(response);
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}

// Attach event listener to modal open event
$('#search').on('shown.bs.modal', function (e) {
    // Clear search input field
    $('#searchwordsss').val('');
    // Display product variants
    displayProductVariants();
});

// Search input event
$("#searchwordsss").on("input", function () {
    let input = $(this).val();
    $('.ghh').hide();
    // Display filtered product variants
    displayProductVariants(input);
});

// Handle form submission
$("#searchForm").submit(function (event) {
    event.preventDefault(); // Prevent default form submission
    // Display filtered product variants
    let input = $("#searchwordsss").val();
    displayProductVariants(input);
});




// ==========================  add to cart ================



$(document).ready(function () {
    $(document).on('click', ".add_new_cart_submit", function () {
        var product_main_id = $(this).closest("form").find('.product_main_id').val();
        var user_id = $('.user_id').val();
        var productqty = $(this).closest("form").find('.productqty').val();
        var prd_varient_id = $(this).closest("form").find('.prd_varient_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/add_cart',
            type: 'post',
            data: {
                product_main_id: product_main_id,
                user_id: user_id,
                productqty: productqty,
                prd_varient_id: prd_varient_id,
            },
            success: function (response) {
                if (response.success) {
                    // Update modal content with product details
                    $('#add_new_cart_submit .product_name').text(response.product_name);
                    $('#add_new_cart_submit .he_para').text(response.product_price);
                    $('#add_new_cart_submit .he_para').html('₹' + response.offer_price + '  <span class="he_para1">₹' + response.mrp_price + '</span>');
                    $('#add_new_cart_submit .product_image').attr('src', response.product_image);

                    if ($('#add_new_cart_submit').length > 0) {
                        $('#add_new_cart_submit').modal('show');
                        setTimeout(function () {
                            $('#add_new_cart_submit').modal('hide');
                        }, 2000);
                    } else {
                        console.error('Modal not found!');
                    }

                    var cartIcon = $('#cartIcon');
                    var currentItemCount = parseInt(cartIcon.find('.add_to_cart_num').text());
                    cartIcon.find('.add_to_cart_num').text(currentItemCount + 1);

                    var cartIcon1 = $('#cartIcon1');
                    var currentItemCount1 = parseInt(cartIcon1.find('.add_to_cart_num').text());
                    cartIcon1.find('.add_to_cart_num').text(currentItemCount1 + 1);
                } else {
                    swal.fire({
                        icon: 'info', // Set the icon to 'info' for an information icon
                        // title: 'Info!',
                        text: 'This product is already in the cart',
                    });
                    // swal.fire(
                    //     'Error!',
                    //     'This product is already in the cart',
                    //     'error'
                    // );
                }
            },
        });
    });
});



// $(document).on("click", ".rems", function () {

//     swal.fire({
//         title: "Are you sure?",
//         text: "You want to delete this Product..!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, delete it!",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 method: "GET",
//                 url: `cartremove/${id}`,
//                 success: function (data) {
//                     swal.fire({
//                         position: 'center',
//                         icon: 'success',
//                         title: 'Your Product has beed Deleted..',
//                         showConfirmButton: false,
//                         timer: 1500
//                     })

//                     location.reload();
//                 },
//                 error: function (data) {
//                     swal.fire(
//                         "Deleted!",
//                         "Your file has been deleted.",
//                         "success"
//                     );
//                 },
//             });
//         }
//     });
// });

$(document).on("click", ".removes_carts", function () {
    const id = $(this).data('id');
    let isFirstClick = true;

    swal.fire({
        title: "Are you sure?",
        text: "You want to remove this Product in Cart..!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, remove it!",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        closeOnClickOutside: false,
        closeOnEsc: false,
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            // User confirmed the deletion
            $.ajax({
                type: 'GET',
                url: '/cartremove/' + id,
                success: function (response) {
                    console.log(response);
                    swal.fire(
                        'Success',
                        'Product deleted successfully',
                        'success'
                    ).then(() => {
                        // Reload the page after the success alert is closed
                        location.reload();
                    });
                },
                error: function (error) {
                    console.error('Error:', error);
                    swal.fire(
                        'Error',
                        'Failed to delete the product',
                        'error'
                    );
                }
            });
        } else if (isFirstClick) {
            // This is the first click, close the SweetAlert without doing anything
            isFirstClick = false;
            swal.fire.close();
        } else {
            // User clicked cancel on subsequent clicks, close the SweetAlert
            swal.fire.close();
        }
    });
});




$(document).on("click", ".removall_cart", function () {
    const id = $(this).data('id');
    let isFirstClick = true;

    swal.fire({
        title: "Are you sure?",
        text: "You want to Remove all the cart products..!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Remove it!",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        closeOnClickOutside: false,
        closeOnEsc: false,
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            // User confirmed the deletion
            $.ajax({
                type: 'GET',
                url: '/cartremove_all_cart/' + id,
                success: function (response) {
                    console.log(response);
                    swal.fire(
                        'Success',
                        'Remove all Products successfully',
                        'success'
                    ).then(() => {
                        // Reload the page after the success alert is closed
                        location.reload();
                    });
                },
                error: function (error) {
                    console.error('Error:', error);
                    swal.fire(
                        'Error',
                        'Failed to delete the products',
                        'error'
                    );
                }
            });
        } else if (isFirstClick) {
            // This is the first click, close the SweetAlert without doing anything
            isFirstClick = false;
            swal.fire.close();
        } else {
            // User clicked cancel on subsequent clicks, close the SweetAlert
            swal.fire.close();
        }
    });
});







// =================================== add to wish list ================


$(document).ready(function () {
    $(document).on('click', '.add_new_wishlist_submit',  function () {

        var button = $(this);
        var i = $(this);
        var product_main_id = $(this).closest("form").find('.product_main_id').val();
        var user_id = $('.user_id').val();
        var productqty = $(this).closest("form").find('.productqty').val();
        var prd_varient_id = $(this).closest("form").find('.prd_varient_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/add_wishlist',
            type: 'post',
            data: {
                product_main_id: product_main_id,
                user_id: user_id,
                productqty: productqty,
                prd_varient_id: prd_varient_id,
            },
            success: function (response) {
                if (response.success) {

                    $('#add_new_wishlist_submit .product_name').text(response.product_name);
                    $('#add_new_wishlist_submit .he_para').text(response.product_price);
                    $('#add_new_wishlist_submit .he_para').html('₹' + response.offer_price + '   <span class="he_para1">₹' + response.mrp_price + '</span>');
                    $('#add_new_wishlist_submit .product_image').attr('src', response.product_image);
                    button.addClass('wish_list_icon');
                    button.addClass('heart');

                    if ($('#add_new_wishlist_submit').length > 0) {
                        $('#add_new_wishlist_submit').modal('show');
                        setTimeout(function () {
                            $('#add_new_wishlist_submit').modal('hide');
                        }, 2000);
                    } else {
                        console.error('Modal not found!');
                    }

                    var cartIcon = $('.wish_list_ic');
                    var currentItemCount = parseInt(cartIcon.find('.add_to_wishlist_num').text());
                    cartIcon.find('.add_to_wishlist_num').text(currentItemCount + 1);

                    var cartIcon1 = $('.wish_list_ic1');
                    var currentItemCount1 = parseInt(cartIcon1.find('.add_to_wishlist_num').text());
                    cartIcon1.find('.add_to_wishlist_num').text(currentItemCount1 + 1);
                } else {

                    swal.fire({
                        icon: 'info', // Set the icon to 'info' for an information icon
                        // title: 'Info!',
                        text: 'This product is already in the Wishlist',
                    });
                }
            },
        });
    });
});




$(document).on("click", ".removes_wishlist", function () {
    const id = $(this).data('id');
    let isFirstClick = true;

    swal.fire({
            title: "Are you sure?",
            text: "You want to Remove this product from wishlist..!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Remove it!",
            cancelButtonText: "Cancel",
            allowOutsideClick: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
        })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
                // User confirmed the deletion
                $.ajax({
                    type: 'GET',
                    url: '/wishlistremove/' + id,
                    success: function (response) {
                        console.log(response);
                        swal.fire(
                            'Success',
                            'wishlist Product removed successfully',
                            'success'
                        );
                        location.reload();
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        swal.fire(
                            'Error',
                            'Failed to delete the product',
                            'error'
                        );
                    }
                });
            } else if (isFirstClick) {
                // This is the first click, close the SweetAlert without doing anything
                isFirstClick = false;
                swal.fire.close();
            } else {
                // User clicked cancel on subsequent clicks, close the SweetAlert
                swal.fire.close();
            }
        });
});



$(document).on("click", ".removall_wishlist", function () {
    const id = $(this).data('id');

    swal.fire({
            title: "Are you sure?",
            text: "You want to remove all this product from wishlist..!",
            icon: "question",
            showCancelButton: true, // Set showCancelButton to true
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, remove it!",
            cancelButtonText: "Cancel", // Text for the cancel button
            allowOutsideClick: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
        })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
                // User confirmed the deletion
                $.ajax({
                    type: 'GET',
                    url: '/wishlist_remove_all/' + id,
                    success: function (response) {
                        console.log(response);
                        swal.fire(
                            'Success',
                            'wishlist Product Remove successfully',
                            'success'
                        );
                        location.reload();
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        swal.fire(
                            'Error',
                            'Failed to delete the product',
                            'error'
                        );
                    }
                });
            } else {
                swal.fire.close();
            }
        });
});








$(document).ready(function () {
    $('.nav-link1').click(function () {
        var categoryId = $(this).data('category');

        // var checkedValues = $('.nav-link1:checked').map(function () {
        //     return $(this).data('category');
        // }).toArray();

        if (categoryId === 'all') {
            $.ajax({
                url: '/getAllVariants',
                type: 'GET',
                success: function (response) {
                    $('#productsContainer').html(response);
                    $('.er').hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        } else {
            $.ajax({
                url: '/getCategory',
                type: 'post',
                data: {
                    "categoryId": categoryId,
                    // "checkedValues": checkedValues.length ? checkedValues : []
                },
                success: function (response) {
                    $('#productsContainer').html(response);
                    $('.er').hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }
    });
});








$(document).ready(function () {
    $('.nav-link').click(function () {
        var categoryId = $(this).data('category');

        var checkedValues = $('.filtercheck:checked').map(function () {
            return $(this).val();
        }).toArray();





        if (categoryId === 'all') {
            $.ajax({
                url: '/getAllVariants',
                type: 'GET',
                success: function (response) {
                    $('#productsContainer').html(response);
                    $('.er').hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        } else {
            $.ajax({
                url: '/getCategory',
                type: 'post',
                data: {
                    "categoryId": categoryId,
                    "checkedValues": checkedValues.length ? checkedValues : []
                },
                success: function (response) {
                    $('#productsContainer').html(response);
                    $('.er').hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }

    });
});

//    hotdeal ajax

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.filtercheck').change(function () {
        var checkedValues = $('.filtercheck:checked').map(function () {
            return $(this).val();
        }).toArray();


        if (checkedValues.length == 0) {
            $.ajax({
                url: '/getAllVariants',
                type: 'GET',
                success: function (response) {
                    $('#productsContainer').html(response);
                    $('.er').hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });

            return;
        }

        $.ajax({
            type: 'Post',
            url: '/hotdeal',
            data: {
                option: checkedValues
            },
            success: function (response) {
                $('#productsContainer').html(response);
                $('.er').hide()
            },
            error: function (error) {
                $('#productsContainer').html(error);
                // location.reload();
            }
        });
    });
});


//  price range filter

$(document).ready(function () {
    $('.rabge').on('change', function () {
        var checkedValues = $('.filtercheck:checked').map(function () {
            return $(this).val();
        }).toArray();

        // Declare categoryId outside the click event
        var categoryId;


            categoryId = $(".nav-link.des_one1.active").data('category');


        var price_range = $('.price_range').serialize();

        $.ajax({
            url: '/price_range',
            type: 'post',
            data: {
                checkedValues: checkedValues,
                "min_num": $(".range-min").val(),
                "max_num": $(".range-max").val(),
                "categoryId": categoryId,
            },
            success: function (response) {
                $('#productsContainer').html(response);
                $('.er').hide();
            },
            error: function (error) {
                // Handle error if needed
            }
        });
    });
});




$(document).ready(function () {
    $('#cancel_productses').on('click', function () {
        var cancel = $('.cancel_product_class').serialize();

        $.ajax({
            url: '/cancelProductFucntion',
            type: 'post',
            data: cancel,
            success: function (response) {
                swal.fire(
                    'Success',
                    'cancel Product successfully',
                    'success'
                );
                location.reload();
                // $('#productsContainer').html(response)
                // $('.er').hide()
            },
            error: function (error) {

            }
        });
    });
});
