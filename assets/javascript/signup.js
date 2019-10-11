$("#signup_form").submit(function() {
    $.ajax({
        url: base_url + "signup_process",
        type: "post",
        data: $("#signup_form").serialize(),
        beforeSend: function() {
            $('#btnSignup').html(
                '<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span> Please wait...'
            );
        },
        success: function(data) {
            // alert(data.type);
            // exit();
            if (data.type) {
                if (data.type === "success") {
                    window.location.replace(base_url + 'login')
                }

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Your created credential has been saved',
                    showConfirmButton: false,
                    timer: 5000
                })

                // const Toast = Swal.mixin({
                //     toast: true,
                //     position: "top-end",
                //     showConfirmButton: false,
                //     timer: 5000,
                // });

                // Toast.fire({
                //     type: data.type,
                //     title: data.title,
                // });
            }

            first_name_validation(data.first_name);
            last_name_validation(data.last_name);
            email_address_validation(data.email_address);
            password_validation(data.password);

            $('#btnSignup').html('SIGN UP')
        }
    });
});

$("#first_name").keyup(function() {
    $.ajax({
        url: base_url + "signup_validation",
        type: "post",
        data: $("#signup_form").serialize(),
        success: function(data) {
            first_name_validation(data.first_name);
        }
    });
});

$("#last_name").keyup(function() {
    $.ajax({
        url: base_url + "signup_validation",
        type: "post",
        data: $("#signup_form").serialize(),
        success: function(data) {
            last_name_validation(data.last_name);
        }
    });
});

$("#email_address").keyup(function() {
    $.ajax({
        url: base_url + "signup_validation",
        type: "post",
        data: $("#signup_form").serialize(),
        success: function(data) {
            email_address_validation(data.email_address);
        }
    });
});

$("#password").keyup(function() {
    $.ajax({
        url: base_url + "signup_validation",
        type: "post",
        data: $("#signup_form").serialize(),
        success: function(data) {
            password_validation(data.password);
        }
    });
});


$("#cpassword").keyup(function() {
    $.ajax({
        url: base_url + "signup_validation",
        type: "post",
        data: $("#signup_form").serialize(),
        success: function(data) {
            cpassword_validation(data.cpassword);
        }
    });
});