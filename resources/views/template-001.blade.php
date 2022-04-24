<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
	<title>Wedding {{$result->panggilan_pria . ' & ' . $result->panggilan_wanita}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<link rel="shortcut icon" href="{{asset('assets/admin')}}/images/lingga.png">
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('assets/template_001')}}/css/style.css">
	<style>
		.overlay {
			height: 100%;
			width: 100%;
			display: none;
			position: fixed;
			text-align: center;
			z-index: 9999;
			top: 0;
			left: 0;
			box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.9);
			background-image: url({{asset('uploads/image_background/'.$result->event)}});
		}

		.overlay .btn {
			border: none !important;
			background: #F14E95;
			color: #fff;
			font-size: 16px;
			text-transform: uppercase;
			font-weight: 400;
		}

		.overlay-content {
			position: relative;
			top: 25%;
			width: 100%;
			text-align: center;
			margin-top: 30px;
		}

		

		.overlay a:hover, .overlay a:focus {
			color: #f1f1f1;
		}

		.overlay .closebtn {
			position: absolute;
			top: 20px;
			right: 45px;
			font-size: 60px;
		}

		@media screen and (max-height: 450px) {
			.overlay a {font-size: 20px}
			.overlay .closebtn {
				font-size: 40px;
				top: 15px;
				right: 35px;
			}
		}
	</style>

	<!-- Modernizr JS -->
	<script src="{{asset('assets/template_001')}}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 4000,
			timerProgressBar: false,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})
	</script>
	</head>
	<body>
	@if (session('success'))
		<script>
			Toast.fire({
				icon: 'success',
				title: "{{ session('success') }}"
			})
		</script>
	@elseif (session('errors'))
		<script>
			Toast.fire({
				icon: 'error',
				title: "{{ session('errors') }}"
			})
		</script>
	@endif
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2" style="width: 40%;">
					<div id="fh5co-logo" style="width: 100%;"><a href="index.html">Wedding<strong>.</strong></a></div>
				</div>
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{asset('uploads/image_background/'.$result->header)}});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>{{$result->panggilan_pria}} &amp; {{$result->panggilan_wanita}}</h1>
							<h2>We Are Getting Married</h2>
							<div class="simply-countdown simply-countdown-one"></div>
							<p><a href="#" class="btn btn-default btn-sm">Save the date</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Assalamu'alaikum Wr. Wb.</h2>
					<p>Dengan memohon rahmat dan ridho Allah SWT, Mohon do'a restu Bapak/Ibu/Saudara/i dalam rangka melangsungkan pernikahan kami :</p>
				</div>
			</div>
			<div class="couple-wrap animate-box">
				<div class="couple-half">
					<div class="groom">
						<img src="{{asset('uploads/mempelai/'.$result->foto_pria)}}" alt="groom" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3>{{$result->nama_panjang_pria}}</h3>
						<p><b>Putra dari</b><br>
						Bapak {{$result->ayah_pria}} & Ibu {{$result->ibu_pria}}</p>
					</div>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
					<div class="bride">
						<img src="{{asset('uploads/mempelai/'.$result->foto_wanita)}}" alt="groom" class="img-responsive">
					</div>
					<div class="desc-bride">	
						<h3>{{$result->nama_panjang_wanita}}</h3>
						<p><b>Putri dari</b><br>
						Bapak {{$result->ayah_wanita}} & Ibu {{$result->ibu_wanita}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-event" class="fh5co-bg" style="background-image:url({{asset('uploads/image_background/'.$result->event)}});">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Acara Pernikahan</h2>
				</div>
			</div>
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>Akad</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span>{{date('H:i', strtotime($result->waktu_mulai))}} WIB</span>
										<span>{{date('H:i', strtotime($result->waktu_selesai))}} WIB</span>
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span>{{$result->hari_pernikahan}}</span>
										<span>{{Carbon\Carbon::parse($result->tgl_pernikahan)->isoFormat('D MMMM Y')}}</span>
									</div>									
									<p><b>Lokasi Akad</b><br>
                                        {{$result->alamat}}</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>Resepsi</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span>{{date('H:i', strtotime($result->waktu_mulai))}} WIB</span>
										<span>{{date('H:i', strtotime($result->waktu_selesai))}} WIB</span>
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span>{{$result->hari_pernikahan}}</span>
										<span>{{Carbon\Carbon::parse($result->tgl_pernikahan)->isoFormat('D MMMM Y')}}</span>
									</div>
                                    <p><b>Lokasi Akad</b><br>
                                        {{$result->alamat}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-couple-story">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>We Love Each Other</span>
					<h2>Our Story</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<ul class="timeline animate-box">
						<li class="animate-box">
							<div class="timeline-badge" style="background-image:url({{asset('assets/template_001')}}/images/couple-1.jpg);"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">First We Meet</h3>
									<span class="date">December 25, 2015</span>
								</div>
								<div class="timeline-body">
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</li>
						<li class="timeline-inverted animate-box">
							<div class="timeline-badge" style="background-image:url({{asset('assets/template_001')}}/images/couple-2.jpg);"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">First Date</h3>
									<span class="date">December 28, 2015</span>
								</div>
								<div class="timeline-body">
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</li>
						<li class="animate-box">
							<div class="timeline-badge" style="background-image:url({{asset('assets/template_001')}}/images/couple-3.jpg);"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">In A Relationship</h3>
									<span class="date">January 1, 2016</span>
								</div>
								<div class="timeline-body">
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</li>
			    	</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-gallery" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Our Memories</span>
					<h2>Wedding Gallery</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-12">
					<ul id="fh5co-gallery-list">
						@foreach($gallery as $val)
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('uploads/gallery/'.$val->image)}}); "> 
							<a href="{{asset('uploads/gallery/'.$val->image)}}">
								<div class="case-studies-summary">
								</div>
							</a>
						</li>
						@endforeach
					</ul>		
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-testimonial">
		<div class="container">
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Friends Wishes</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="wrap-testimony">
							<div class="owl-carousel-fullwidth">
								@if(@$ucapan)
								@foreach($ucapan as $val)
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="{{asset('assets/template_001')}}/images/love.jpg" alt="user">
										</figure>
										<span>{{$val->nama}}</span>
										<blockquote>
											<p>"{{$val->pesan}}"</p>
										</blockquote>
									</div>
								</div>
								@endforeach
								@else
								<div class="item">
									<div class="testimony-slide active text-center">
										<blockquote>
											<p>"-Belum Ada Ucapan-"</p>
										</blockquote>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-services" class="fh5co-section-gray">
		<div class="container">
			
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Lokasi</h2>
                    <span>{{$result->alamat}}</span>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="animate-box text-center" data-animate-effect="fadeInLeft">
						<iframe src="{{$result->map}}" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <br>
                        <br>
                        <a href="https://goo.gl/maps/gWH13L5xBpkdaafq9" target="_blank" class="btn btn-primary"><i class="icon-location2"></i> Tandai Map</a>
					</div>
                </div>
			</div>
		</div>
	</div>


	<div id="fh5co-started" class="fh5co-bg" style="background-image:url({{asset('uploads/image_background/'.@$result->attending)}});">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Do'a dan Ucapan</h2>
					<p>Berikan doa dan ucapan untuk calon pengantin</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1">
					<form class="form-inline" action="{{url('kirim_ucapan')}}" method="post">
						@csrf
						<input type="hidden" name="id_mempelai" value="{{@$result->id_mempelai}}"/>
						<div class="col-md-12 col-sm-4">
							<div class="form-group">
								<label for="name" class="sr-only">Nama</label>
								<input type="name" class="form-control" id="name" placeholder="Masukan Nama" name="nama">
							</div>
						</div>
						<div class="col-md-12 col-sm-4">
							<div class="form-group">
								<label for="email" class="sr-only">Pesan</label>
								<textarea class="form-control" name="pesan" placeholder="Berikan ucapan dan do'a restu"></textarea>
							</div>
						</div>
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-default">Kirim Ucapan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo" style="padding:20px">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-instagram"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-phone"></i></a></li>
						</ul>
					</p>
					<small class="block">&copy; {{date('Y')}} <a href="{{url('/')}}" target="_blank">linggastore.com</a></small> 
				</div>
			</div>
		</div>
	</footer>
	</div>
	<div id="myNav" class="overlay">
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>{{$result->panggilan_pria . ' & ' . $result->panggilan_wanita}}</h2>
						<p>Kepada Bapak/Ibu/Saudara/i</p>
						<p style="color: yellow;">{{$to}}</p>
						<p>Tanpa Mengurangi Rasa Hormat, Kami Mengundang Anda Untuk Hadir Di Acara Pernikahan Kami.</p>
						<a href="#" onclick="closeNav()" class="btn">Buka Undangan</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<audio id="myAudio" src="{{asset('assets')}}/music/music-001.mp3" preload="auto"></audio>
	<div class="floatmusic">
		<a onClick="togglePlay()" class="play" style="cursor: pointer;"><i class="icon-pause"></i></a>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('assets/template_001')}}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('assets/template_001')}}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{asset('assets/template_001')}}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{asset('assets/template_001')}}/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="{{asset('assets/template_001')}}/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="{{asset('assets/template_001')}}/js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="{{asset('assets/template_001')}}/js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('assets/template_001')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('assets/template_001')}}/js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="{{asset('assets/template_001')}}/js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="{{asset('assets/template_001')}}/js/main.js"></script>
	<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

	<script>
		var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);
		var data_tahun  = "{{date('Y', strtotime($result->tgl_akad))}}";
		var data_bulan  = "{{date('m', strtotime($result->tgl_akad))}}";
		var data_tgl    = "{{date('d', strtotime($result->tgl_akad))}}";
		
		// default example
		simplyCountdown('.simply-countdown-one', {
			year: data_tahun,
			month: data_bulan,
			day: data_tgl
		});

		//jQuery example
		$('#simply-countdown-losange').simplyCountdown({
			year: data_tahun,
			month: data_bulan,
			day: data_tgl,
			enableUtc: false
		});

		$('document').ready(function(){
			openNav();  
		})

		function openNav() {
			$("body").css({"overflow":"hidden"});
			document.getElementById("myNav").style.display = "block";
		}

		function closeNav() {
			$("body").css({"overflow":"visible"});
			document.getElementById("myNav").style.display = "none";
			togglePlay(); 
		}

		var myAudio = document.getElementById("myAudio");
		function togglePlay() {
			return myAudio.paused ? myAudio.play() : myAudio.pause();
		};

		$('.play').click(function(){
			var $this = $(this);
			$this.toggleClass('active');
			if($this.hasClass('active')){
				$this.html('<i class="icon-play"></i>'); 
			} else {
				$this.html('<i class="icon-pause"></i>');
			}
		});
	</script>

	</body>
</html>

