function first_name_validation(first_name) {
    if (first_name) {
        $("#first_name_input").removeClass("has-success");
        $("#first_name_input").addClass("has-error");
        $("#first_name_alert").html(first_name);
    } else {
        $("#first_name_input").addClass("has-success");
        $("#first_name_input").removeClass("has-error");
        $("#first_name_alert").html("");
    }
}

function last_name_validation(last_name) {
    if (last_name) {
        $("#last_name_input").removeClass("has-success");
        $("#last_name_input").addClass("has-error");
        $("#last_name_alert").html(last_name);
    } else {
        $("#last_name_input").addClass("has-success");
        $("#last_name_input").removeClass("has-error");
        $("#last_name_alert").html("");
    }
}

function email_address_validation(email_address) {
    if (email_address) {
        $("#email_address_input").removeClass("has-success");
        $("#email_address_input").addClass("has-error");
        $("#email_address_alert").html(email_address);
    } else {
        $("#email_address_input").addClass("has-success");
        $("#email_address_input").removeClass("has-error");
        $("#email_address_alert").html("");
    }
}

function password_validation(password) {
    if (password) {
        $("#password_input").removeClass("has-success");
        $("#password_input").addClass("has-error");
        $("#password_alert").html(password);
    } else {
        $("#password_input").addClass("has-success");
        $("#password_input").removeClass("has-error");
        $("#password_alert").html("");
    }
}

function cpassword_validation(cpassword) {
    if (cpassword) {
        $("#cpassword_input").removeClass("has-success");
        $("#cpassword_input").addClass("has-error");
        $("#cpassword_alert").html(cpassword);
    } else {
        $("#cpassword_input").addClass("has-success");
        $("#cpassword_input").removeClass("has-error");
        $("#cpassword_alert").html("");
    }
}