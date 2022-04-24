<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Error 404 | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/admin')}}/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('assets/admin')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin')}}/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{asset('assets/admin')}}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="text-center">
                            <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>4</h1>
                            <h4 class="text-uppercase text-danger mt-3">Mempelai Tidak Terdaftar</h4>
                            <p class="text-muted mt-3">Silahkan Menghubungi admin untuk informasi lebih lanjut. Termakasih!</p>

                            <a class="btn btn-info mt-3" href="{{url('/')}}"><i class="mdi mdi-reply"></i>Kembali</a>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            {{date('Y')}} © Lingga Wedding - linggastore.com
        </footer>

        <!-- bundle -->
        <script src="{{asset('assets/admin')}}/js/vendor.min.js"></script>
        <script src="{{asset('assets/admin')}}/js/app.min.js"></script>
        
    </body>
</html>
