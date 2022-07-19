<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lingga Store | Wedding Invitation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{asset('assets')}}/img/lingga.png" rel="icon">
  <link href="{{asset('assets')}}/img/lingga.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/css/main.css" rel="stylesheet">
  @stack('css')
  <style>
    .float{
      position:fixed;
      padding:5px;
      width:100px;
      height:40px;
      bottom:70px;
      right:15px;
      background-color:#11887A;
      color:#FFF;
      border-radius:5px;
      text-align:center;
      font-size:20px;
      z-index:100;
    }
    .float span{
      font-size: 12pt;
      font-weight: lighter;
    }
    .my-float{
      margin-top:10px;
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @yield('content')
  <a href="https://wa.me/6285772933413?text=Hallo Admin lingga-store.com" class="float" target="_blank">
    <i class="bi bi-whatsapp my-float"></i> <span>Chat</span>
  </a>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Lingga Store</h3>
              <p>Jasa Pembuatan Undangan Digital, Prose Cepat dan Banyak Metode Pembayaran

                <br><br>
                <strong>Phone:</strong> 085772933413<br>
                <strong>Email:</strong> info@lingga-store.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="https://www.instagram.com/linggastorew/" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-envelope"></i></a>
                <a href="https://wa.me/6285772933413?text=Hallo Admin lingga-store.com" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Links</h4>
            <ul>
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('/catalog')}}">Katalog</a></li>
              <li><a href="{{url('/articel')}}">Artikel</a></li>
              <li><a href="{{url('/faqs')}}">FAQs</a></li>
              <li><a href="{{url('/contact')}}">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Lingga Store</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets')}}/js/main.js"></script>

</body>

</html>