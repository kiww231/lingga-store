<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('assets/')}}/img/lingga-logo.png" alt="">
        <!-- <h1>Lingga Store</h1> -->
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{url('/')}}" class="active">Home</a></li>
          <li><a href="{{url('/catalogue')}}">Katalog</a></li>
          <li><a href="{{url('/article')}}">artikel</a></li>
          <li><a href="{{url('/faqs')}}">FAQs</a></li>
          <li><a href="{{url('contact')}}">Kontak</a></li>
        </ul>
      </nav>
    </div>
  </header>