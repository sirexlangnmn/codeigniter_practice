

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html">Nonprofit Organization</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="javascript:void(0)" method="post" id="loginForm" name="loginForm" >
                <div id="email_address_input" class="form-group has-feedback">
                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span id="email_address_alert" class="help-block"></span>
                </div>
                <div id="password_input" class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span toggle="#password" class="fa fa-eye-slash field-icon toggle-password form-control-feedback"></span>
                    <span id="password_alert" class="help-block"></span>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" id="btnLogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-2"></div>
                </div>
                <div class="row">
                    <div class="box-body">
                        <p class="text-muted">By signing in to your account, you agree to Philippines - Luxembourg Society 
                            <a href="">Terms</a> and consent to our <a href="">Cookie Policy</a> and <a href="">Privacy Policy.</a> 
                        </p> 
                    </div>
                </div>
            </form>
           
        </div>
        
        <p>Not have account? <a href="<?php echo base_url() ?>"><b>Sign Up</b></a></p>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


    <script src="sweetalert2.all.min.js"></script> -->
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <script type="text/javascript" src="<?= base_url('assets/javascript/login.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/javascript/validation.js') ?>"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
