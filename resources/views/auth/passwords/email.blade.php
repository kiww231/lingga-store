<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Recover Password | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/admin')}}/images/lingga.png">

        <!-- App css -->
        <link href="{{asset('assets/admin')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin')}}/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{asset('assets/admin')}}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                            <a href="index.html" class="logo-dark">
                                <span><img src="{{asset('assets/admin')}}/images/lingga-logo.png" alt="" height="18"></span>
                            </a>
                            <a href="index.html" class="logo-light">
                                <span><img src="{{asset('assets/admin')}}/images/lingga-logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Reset Password</h4>
                        <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>

                        <!-- form -->
                        <form action="#">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>
                            <div class="mb-0 text-center d-grid">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-lock-reset"></i> Reset Password </button>
                            </div>
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Back to <a href="{{route('login')}}" class="text-muted ms-1"><b>Log In</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="{{asset('assets/admin')}}/js/vendor.min.js"></script>
        <script src="{{asset('assets/admin')}}/js/app.min.js"></script>

    </body>

</html>