<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Maintenance | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
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

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">

                        <div class="text-center">
                            <img src="{{asset('assets/admin')}}/images/maintenance.svg" height="140" alt="File not found Image">
                            <h3 class="mt-4">Maaf Website Sedang Ada Perbaikan</h3>
                            <p class="text-muted">Jika ada yang mau ditanyakan silahkan hubungi admin di <a href="https://wa.me/62812929777978" target="_blank">0812929777978</a></p>

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="text-center mt-3 ps-1 pe-1">
                                        <i class="dripicons-jewel bg-primary maintenance-icon text-white mb-2"></i>
                                        <h5 class="text-uppercase">Why is the Site Down?</h5>
                                        <p class="text-muted">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                    </div>
                                </div> <!-- end col-->
                                <div class="col-md-4">
                                    <div class="text-center mt-3 ps-1 pe-1">
                                        <i class="dripicons-clock bg-primary maintenance-icon text-white mb-2"></i>
                                        <h5 class="text-uppercase">What is the Downtime?</h5>
                                        <p class="text-muted">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical but the majority.</p>
                                    </div>
                                </div> <!-- end col-->
                                <div class="col-md-4">
                                    <div class="text-center mt-3 ps-1 pe-1">
                                        <i class="dripicons-question bg-primary maintenance-icon text-white mb-2"></i>
                                        <h5 class="text-uppercase">Do you need Support?</h5>
                                        <p class="text-muted">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embar.. <a href="mailto:#" class="text-muted fw-bold">no-reply@domain.com</a></p>
                                    </div>
                                </div> <!-- end col-->
                            </div> <!-- end row-->
                        </div> <!-- end /.text-center-->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            {{date('Y')}} © lingga-store.com
        </footer>

        <!-- bundle -->
        <script src="{{asset('assets/admin')}}/js/vendor.min.js"></script>
        <script src="{{asset('assets/admin')}}/js/app.min.js"></script>
        
    </body>
</html>
