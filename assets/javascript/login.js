$('#loginForm').submit(function() {
    $.ajax({
        url: base_url + 'login-process',
        type: 'post',
        data: $('#loginForm').serialize(),
        beforeSend: function() {
            $('#btnLogin').html(
                '<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span> Please wait...'
            );
        },
        success: function(data) {
            // alert(data.type)
            // alert(data.title)
            // exit;
            if (data.type) {
                if (data.type === "success") {
                    window.location.replace(base_url + 'dashboard')
                }

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Your created credential has been saved',
                    showConfirmButton: false,
                    timer: 5000
                })

            }


            email_address_validation(data.email_address);
            password_validation(data.password);

            $('#btnLogin').html('LOGIN')
        }
    });
});