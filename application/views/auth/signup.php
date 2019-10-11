

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="javascript:void(0)">Nonprofit Organization</a>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">Sign up a new membership</p>
            <form action="javascript:void(0)" class="p-40" id="signup_form" name="signup_form">
                <div id="first_name_input" class="form-group has-feedback">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span id="first_name_alert" class="help-block"></span>
                </div>
                <div id="last_name_input" class="form-group has-feedback">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span id="last_name_alert" class="help-block"></span>
                </div>
                <div id="email_address_input" class="form-group has-feedback">
                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Adress">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span id="email_address_alert" class="help-block"></span>
                </div>
                <div id="password_input" class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span id="password_alert" class="help-block"></span>
                </div>
                <div id="cpassword_input" class="form-group has-feedback">
                    <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    <span id="cpassword_alert" class="help-block"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                            <p> I agree to the <a href="#">terms</a></p>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" id="btnSignup">Sign Up</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="<?php echo base_url('login') ?>" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="sweetalert2.all.min.js"></script> -->
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <script type="text/javascript" src="<?= base_url('assets/javascript/signup.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/javascript/validation.js') ?>"></script>

