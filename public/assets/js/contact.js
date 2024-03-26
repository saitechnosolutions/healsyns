function checkphonenumber() {
    let Phonenumber = $(".phone").val();
    var Pattern = /^(?!.*(\d)\1{9})[6-9]\d{9}$/;

    if (Phonenumber == "") {
        $('#message3').html("*Please fill the Phone number");
        $('#message3').show();
        return false;
    } else if (Phonenumber.length != 10) {
        $('#message3').html("*Please enter a 10-digit phone number");
        $('#message3').show();
        return false;
    } else if (!Pattern.test(Phonenumber)) {
        $('#message3').html("*Please enter a valid phone number");
        $('#message3').show();
        return false;
    } else {
        $('#message3').hide();
        return true;
    }
}

function checkPhoneNumberLength(input) {
    const value = input.value;
    if (value.length > 10) {
        input.value = value.slice(0, 10); // Truncate input to 10 digits
    }
}



function phone1(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
  }

