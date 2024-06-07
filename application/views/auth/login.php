<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center">
        <div class="content">
            <div class="row justify-content-center push">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign In Block -->
                    <div class="block block-rounded mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Sign In</h3>
                            <div class="block-options">
                                <a class="btn-block-option fs-sm" href="op_auth_reminder.html">Forgot Password?</a>
                                <a class="btn-block-option" href="javascript:void(0)" onclick="register(); return false;" data-bs-toggle="tooltip" data-bs-placement="left" title="New Account">
                                    <i class="fa fa-user-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                <h1 class="h2 mb-1">
                                    <img src="<?= base_url() ?>assets/logo/logo-light.png" alt="" style="width:12%"> Sistem Inventory
                                </h1>
                                <p class="fw-medium text-muted">
                                    Welcome, please login.
                                </p>

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" id="form-login">
                                    <div class="py-3">
                                        <div class="mb-4">
                                            <input type="text" class="form-control form-control-alt form-control-lg" id="login_email" name="login_email" placeholder="Email">
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control form-control-alt form-control-lg" id="login_password" name="login_password" placeholder="Password">
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="login-remember" name="login-remember">
                                                <label class="form-check-label" for="login-remember">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" id="btn-sign_in" class="btn w-100 btn-alt-primary">
                                                <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
            <div class="fs-sm text-muted text-center">
                <strong>Sistem informasi Inventory</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
<script>
    $(function() {
        $("#form-login").validate({
            rules: {
                login_email: {
                    required: true,
                    email: true
                },
                login_password: {
                    required: true
                },
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                post_login($(form))
            }
        })
    })

    function register() {
        $.ajax({
            url: urlRegister,
            type: "GET",
            success: function(res) {
                $('#content-login').html(res);
            }
        })
    }

    function post_login($form) {
        $.ajax({
            url: urlPostLogin,
            type: "POST",
            dataType: "JSON",
            data: $form.serialize(),
            beforeSend: function() {
                $('#btn-sign_in').html('loading...');
                $('#btn-sign_in').prop('disabled', true);
            },
            success: function(res) {
                if (res.status == 'Success') {
                    One.helpers('jq-notify', {
                        type: 'success',
                        icon: 'fa fa-check me-1',
                        message: `${res.messages}`
                    });
                } else {
                    One.helpers('jq-notify', {
                        type: 'danger',
                        icon: 'fa fa-times me-1',
                        message: `${res.messages}`
                    });
                }

                setTimeout(function() {
                    if (res.status == 'Success') {
                        window.location.href = urlDashboard;
                    }
                    $('#btn-sign_in').html('<i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In');
                    $('#btn-sign_in').prop('disabled', false);
                }, 2000); // 2-second delay before redirecting
            }
        })
    }
</script>