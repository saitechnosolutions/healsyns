$(document).on('click', '.state', function () {
    let id = $(this).val();
    $('.city').empty();
    $('.city').append(`<option value=" " disable>processing...</option>`);
    $.ajax({
        type: "GET",
        url: "/city/" + id,
        success: function (response) {
            $('.city').empty();
            $('.city').append(
                `<option value="" disable selected>Select City</option>`
            );
            response.forEach(element => {
                $('.city').append(
                    `<option value="${element['id']}">${element['name']}</option>`
                );
            });
        }
    });
});

function fetchAddressDetails() {
    // $('#pin_code_type').on('input', function () {
        var pinCode = $('#pin_code_type').val();

        // Clear existing options in the dropdown
        $('#city_input').empty();

        if (pinCode.length === 6) {
            // Make AJAX request to Laravel backend
            $.ajax({
                url: '/get-address-details',
                method: 'GET',
                data: {
                    pincode: pinCode
                },
                success: function (response) {
                    var district = response[0].match(/District: (.*?),/)[1];
                    var state = response[0].match(/State: (.*)/)[1];

                    $('#pin_district').val(district);
                    $('#pin_state').val(state);

                    // Iterate through each city in the response and add it to the dropdown
                    response.forEach(function (cityDetails) {
                        // Extract city, district, and state
                        var cityMatch = cityDetails.match(/City: (.*?),/);
                        var city = cityMatch ? cityMatch[1] : '';

                        // Append a new option to the dropdown
                        $('#city_input').append($('<option>', {
                            value: city,
                            text: city
                        }));
                    });
                },
                error: function (error) {
                    console.error('Error fetching address details:', error);
                }
            });
        } else {
            // Clear #pin_district and #pin_state if the length is less than 6
            $('#pin_district').val('');
            $('#pin_state').val('');
        }
    // });
}

$(document).ready(function () {
    $('#pin_code_type').on('input', function () {
    fetchAddressDetails();
    });
});
