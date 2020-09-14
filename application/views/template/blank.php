<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head >
	<meta charset="utf-8">
	<title>Podivers Podomoro Unversity</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<!-- Favicons -->
	<link href="<?= base_url('assets/img/favicon') ?>" rel="icon">
	<link href="<?= base_url('assets/img/favicon') ?>" rel="apple-touch-icon">

	<link href="<?= base_url('assets/css/compiled-4.10.1.min.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/pu-custom.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/normalizer.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets/js/owlcarousel/assets/owl.carousel.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/js/owlcarousel/assets/owl.theme.default.min.css')?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.css"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/masongram.min.css');?>">

	<script src="<?= base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?= base_url('assets/js/mdb.min.js')?>"></script>
	<script src="<?= base_url('assets/js/universal-parallax.min.js')?>"></script>
	<script src="<?= base_url('assets/img-fitter/jquery.imgFitter.js')?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/owlcarousel/owl.carousel.min.js'); ?>"></script> 
	<script src="<?= base_url('assets/js/moment.js')?>"></script>
    <script src="<?= base_url('assets/lib/lightbox/js/lightbox.min.js'); ?>"></script>
	<!-- JWT Encode -->
    <script type="text/javascript" src="<?= base_url('assets/jwt/encode/hmac-sha256.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/jwt/encode/enc-base64-min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/jwt/encode/jwt.encode.js');?>"></script>

    <!-- JWT Decode -->
    <script type="text/javascript" src="<?= base_url('assets/jwt/decode/build/jwt-decode.min.js');?>"></script>    

    <!-- <script src="<?= base_url('assets/js/masongram.min.js');?>"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.1.1/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>

	<script src="assets/js/modernizr.custom.js"></script>
	<script src="<?= base_url('assets/js/provider.js')?>"></script>

	<script type="text/javascript">

		$(document).ready(function () {

	        window.base_url_blog = "<?= url_blog ?>";//routes url_blogs in index.php
	       	window.base_url_admblog = "<?= url_blog_admin ?>"; //routes url_blogs_admin in index.php
	       	window.base_url_js_sw = "<?= url_server_ws ?>";
	       	window.base_url_js = "<?= url_server ?>";

	    });

	</script>


	<style type="text/css">
	  html,
	  body,
	  header,
	  .view {
	  height: 100%;
	}

	@media (max-width: 740px) {
	  html,
	  body,
	  header,
	  .view {
	    height: 1000px;
	  }
	}
	@media (min-width: 800px) and (max-width: 850px) {
	  html,
	  body,
	  header,
  		.view {
	    height: 600px;
	  }
	}

	.btn .fa {
	  margin-left: 3px;
	}
	.top-nav-collapse {
		background-color: #ffffff !important;
		padding-top: 10px !important;
		webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);

		-webkit-transition: all 0.3s linear;
    	transition: all 0.3s linear;
		top: 0px;
	}

/*	.navbar:not(.top-nav-collapse) {
	  	background: white !important;
	  	-webkit-transition: all 0.2s linear;
		transition: all 0.2s linear;
	  	top: 29px;
	  	border-bottom: 1px solid #ddd;
	}
	.top-nav-collapse {
	  background-color: #2BBBAD !important;
	  padding-top: 10px !important;
	  webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
	}*/

	.navbar:not(.top-nav-collapse) {
	  /*background: transparent !important;*/
	}

	@media (max-width: 991px) {
	  .navbar:not(.top-nav-collapse) {
	    /*background: #424f95 !important;*/
	     background: #fff !important;
	  }
	}

	.btn-white {
	  /*color: black !important;*/
	}

	h6 {
	  line-height: 1.7;
	}

	.rgba-gradient {
	  background: -moz-linear-gradient(45deg, rgb(41 45 116 / 26%), rgb(92 200 213 / 44%) 100%);
	  background: -webkit-linear-gradient(45deg, rgb(41 45 116 / 26%), rgb(92 200 213 / 44%) 100%);
	  background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.7)), to(rgba(29, 210, 177, 0.7)));
	  background: -o-linear-gradient(45deg, rgb(41 45 116 / 26%), rgb(92 200 213 / 44%) 100%);
	  background: linear-gradient(to 45deg, rgb(41 45 116 / 26%), rgb(92 200 213 / 44%) 100%);
	}

	.card-footer {
	    padding: 0.75rem 1.25rem;
	    background-color: rgb(255 255 255);
	    border-top: 1px solid rgb(255 255 255);
	}
	.top-nav-collapse{
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
	}
	.btn-login{
		background: #fd0202;
	    border-radius: 20px;
	    padding: 0px 20px;
	}
	.top-nav-collapse .btn-login{
		background: #d32f2f ;
	    border-radius: 20px;
	    padding: 0px 20px;
	}
	.top-nav-collapse .btn-color{
		color: #fff;
	}
	/*.owl-item.active > div:after {
	  content: 'active';
	}
	.owl-item.center > div:after {
	  content: 'center';
	}
	.owl-item.active.center > div:after {
	  content: 'active center';
	}*/
	.nav-link{color: #fff };
	#owl-demo .item{
	  margin: 3px;
	}
	#owl-demo .item img{
		display: inline-flex;
		width: 100%;
		height: auto;
		opacity: 0.5;
		filter: brightness(80%);
		transition: 0.3s;
		filter: grayscale(100%); 
		-webkit-filter: grayscale(100%);
		-moz-filter: grayscale(100%);
		-ms-filter: grayscale(100%);
		-o-filter: grayscale(100%);
	}
	#owl-demo .item img:hover{
		opacity: 1;
		transition: 0.3s;
		filter: grayscale(0%); 
		-webkit-filter: grayscale(0%);
		-moz-filter: grayscale(0%);
		-ms-filter: grayscale(0%);
		-o-filter: grayscale(0%);

	}
	.owl-dots{
		display: inline-flex;
	}
	iframe{
		width: 246px;
	    height: 140px;
	}

	</style>

	<?php
		$hal = $this->uri->segment(1);
	?>
</head>
<!-- ======= Body ====== -->
<body class="scrollbar scrollbar-indigo">
<!-- ======= Hedear ====== -->

<header class="header">
		
	<nav class="navbar navbar-expand-lg navbar-light lighten-4 fixed-top scrolling-navbar text-center ">
		<div class="container ">			

			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
			aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<!-- mobile -->
			<a href="<?= base_url() ?>" class="navbar-brand mobile-nav-logo  float-right">
				<img style="height: 35px;" src="<?= base_url() ?>assets/img/logo_Low.png" alt="Podomoro University">
			</a>
			<!-- Collapsible content -->
			<div class="collapse navbar-collapse justify-content-left " id="navbarSupportedContent2">

				<!-- Links -->
				<ul class="navbar-nav nav lighten-4 py-2 mr-md-0 mr-lg-4 pb-md-0">					
					
      				<li class="nav-item dropdown px-3">
				        <a class="nav-link dropdown-toggle text-uppercase text-hover-red " id="navbarDropdownMenuLink" data-toggle="dropdown"
				          aria-haspopup="true" aria-expanded="false">BEM</a>
				        <div class="dropdown-menu dropdown-danger" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item <?=($hal=='bem-news')?'active':'';?>" href="<?php base_url('')?>bem-news">News</a>
				          <a class="dropdown-item <?=($hal=='bem-event')?'active':'';?>" href="<?php base_url('') ?>bem-event">Event</a>
				          <a class="dropdown-item <?=($hal=='bem-gallery')?'active':'';?>" href="<?php base_url('') ?>bem-gallery">Gallery</a>
  				          <a class="dropdown-item <?=($hal=='bem-recruitment')?'active':'';?>" href="<?php base_url('') ?>bem-recruitment">Recruitment</a>

				        </div>
			        </li>						
					<li class="nav-item dropdown px-3">
				        <a class="nav-link dropdown-toggle text-uppercase text-hover-red " id="navbarDropdownMenuLink" data-toggle="dropdown"
				          aria-haspopup="true" aria-expanded="false">BPM</a>
				        <div class="dropdown-menu dropdown-danger" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item <?=($hal=='bpm-news')?'active':'';?>" href="<?php base_url('')?>bpm-news">News</a>
				          <a class="dropdown-item <?=($hal=='bpm-event')?'active':'';?>" href="<?php base_url('')?>bpm-event">Event</a>
				          <a class="dropdown-item <?=($hal=='bpm-gallery')?'active':'';?>" href="<?php base_url('')?>bpm-gallery">Gallery</a>
  				          <a class="dropdown-item <?=($hal=='bpm-recruitment')?'active':'';?>" href="<?php base_url('')?>bpm-recruitment">Recruitment</a>

				        </div>
			        </li>
			        <li class="nav-item dropdown px-3">
				        <a class="nav-link dropdown-toggle text-uppercase text-hover-red " id="navbarDropdownMenuLink" data-toggle="dropdown"
				          aria-haspopup="true" aria-expanded="false">UKM</a>
				        <div class="dropdown-menu dropdown-danger" aria-labelledby="navbarDropdownMenuLink" >
				          <a class="dropdown-item <?=($hal=='ukm-news')?'active':'';?>" href="<?php base_url('')?>ukm-news">News</a>
				          <a class="dropdown-item <?=($hal=='ukm-event')?'active':'';?>" href="<?php base_url('')?>ukm-event">Event</a>
				          <a class="dropdown-item <?=($hal=='ukm-gallery')?'active':'';?>" href="<?php base_url('')?>ukm-gallery">Gallery</a>
  				          <a class="dropdown-item <?=($hal=='ukm-recruitment')?'active':'';?>" href="<?php base_url('')?>ukm-recruitment">Recruitment</a>

				        </div>
			        </li>
			        <li class="nav-item dropdown px-3">
				        <a class="nav-link dropdown-toggle text-uppercase text-hover-red " id="navbarDropdownMenuLink" data-toggle="dropdown"
				          aria-haspopup="true" aria-expanded="false">HIMA</a>
				        <div class="dropdown-menu dropdown-danger" aria-labelledby="navbarDropdownMenuLink" >
				          <a class="dropdown-item <?=($hal=='hima-news')?'active':'';?>" href="<?php base_url('hima-news')?>hima-news">News</a>
				          <a class="dropdown-item <?=($hal=='hima-event')?'active':'';?>" href="<?php base_url('hima-news')?>hima-event">Event</a>
				          <a class="dropdown-item <?=($hal=='hima-gallery')?'active':'';?>" href="<?php base_url('hima-news')?>hima-gallery">Gallery</a>
  				          <a class="dropdown-item <?=($hal=='hima-recruitment')?'active':'';?>" href="<?php base_url('hima-news')?>hima-recruitment">Recruitment</a>

				        </div>
			        </li>
									

				</ul>

			</div>
			<!-- Navbar brand -->
			<a href="<?= base_url() ?>" class="d-sm-none d-md-none  navbar-brand nav-logo mx-auto active" id="showPutih" style="width: 10%;"><img src="<?= base_url() ?>assets/img/logo-podivers.png" alt="Podomoro University"></a>

			<a href="<?= base_url() ?>" class="d-sm-none d-md-none  navbar-brand nav-logo mx-auto hide" id="showColor" style="width: 10%;"><img src="<?= base_url() ?>assets/img/logo-podivers-blank.png" alt="Podomoro University"></a>
			
			<!-- Collapsible content -->
			<div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarSupportedContent2">

				<!-- Links -->
				<ul class="navbar-nav nav lighten-4 py-2 pt-md-2 pb-sm-5 pb-md-5 pb-lg-0 pt-lg-0">
					<li class="nav-item px-3">
						<a target="_blank" href="https://blogs.podomorouniversity.ac.id/" class="nav-link text-uppercase text-hover-red ">News </a>
					</li>	
					<li class="nav-item px-3">
						<a href="<?= base_url('event') ?>" class="nav-link text-uppercase text-hover-red ">Event </a>
					</li>	
					<li class="nav-item px-3">
						<a href="<?= base_url() ?>" class="nav-link text-uppercase text-hover-red ">Career </a>
					</li>
					<li class="nav-item px-3 btn-login btn-sm mx-md-5 mx-lg-0">
						<a target="_blank" href="https://portal.podomorouniversity.ac.id/portal-login" class="nav-link text-uppercase btn-color " style="color: #fff!important">Login</a>
					</li>				
				</ul>

			</div>


		</div>
		  <!-- Collapsible content -->
	</nav>
	

</header>
<!-- Navbar -->
<!-- ======= Hedear ====== -->
<!-- ======= Content ====== -->

 <?= $content ?> 


<!-- ======= Content ====== -->
<!-- ======= Footer ====== -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">

            <div class="row">

                <div class="col-lg-4">

                    <div class="footer-info">
                        <img src="<?= base_url('assets/img/LOGO-Podomoro-University-L-mono-W.png')?>" alt="" style="width: 100%;">
                        <img style="padding: 10px 19px;width: 100%;" src="<?= base_url('assets/img/babson-logo-02.png')?>" alt="">
                             
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            
                            <li>
                            	<a target="_blank" href="https://podomorouniversity.ac.id"><lang>Podomoro University</lang></a>
                            </li>
                            <li>
                            	<a target="_blank" href="https://portal.podomorouniversity.ac.id/"><lang>Portal</lang></a>
                            </li>
                            <li>
                            	<a target="_blank" href="https://www.repository.podomorouniversity.ac.id"><lang>PU Repository</lang></a>
                            </li>
                            
                            <hr>
                            
                            <li>
                            	<a target="_blank" href="https://journal.podomorouniversity.ac.id/"><lang>PU Journal</lang></a>
                            </li>
                            <li>
                            	<a target="_blank" href="https://cblibrary.podomorouniversity.ac.id/"><lang>Library</lang></a>
                            </li>
                            <li>
                            	<a target="_blank" href="https://blogs.podomorouniversity.ac.id/"><lang>Blogs</lang></a>
                            </li>
                            <!-- <li>
                            	<a href="<?php echo base_url('mahasiswa'); ?>"><lang>Student</lang></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-links ">
                        
                        <h4><lang>Contact</lang></h4>
                        <p class="text-left" > <span id="Address"></span>
                        	Central Park Mall 3rd Floor - Unit 112 <br>
                            Podomoro City, Jl. Let. Jend. S. Parman Kav. 28<br>
                            West Jakarta, 11470, Indonesia<br>
                            <strong>Phone:</strong> <span id="Tlp">021-29200456</span><br>
                            <strong>Email:</strong> <span id="Email">info@podomorouniversity.ac.id</span><br><hr>
                            <span id="OpenClose"></span>Monday - Friday 10 AM - 5 PM <br>
                            Saturday 10 AM - 4 PM <br>
                            Sunday & Public Holiday CLOSED<br>
                        </p>
                    </div>
                   

                    <div class="social-links" style="margin-bottom: 30px;" id="Viewsosmed">
                    	<ul class="list-unstyled list-inline">
			                  <li class="list-inline-item">
			                    <a target="_blank" href="https://www.facebook.com/universitasagungpodomoro?fref=ts" class="facebook btn-floating btn-fb mx-1">
			                      <i class="fab fa-facebook-f"></i>
			                    </a>
			                  </li>
			                  <li class="list-inline-item">
			                    <a target="_blank" href="https://twitter.com/PodomoroUniv" class="twitter btn-floating btn-tw mx-1">
			                      <i class="fab fa-twitter"> </i>
			                    </a>
			                  </li>
			                 
			                  <li class="list-inline-item">
			                    <a target="_blank" href="https://www.instagram.com/podomorouniversity/" class="instagram btn-floating btn-li mx-1">
			                      <i class="fab fa-instagram"> </i>
			                    </a>
			                  </li>
			                  <!-- <li class="list-inline-item">
			                    <a class="btn-floating btn-dribbble mx-1">
			                      <i class="fa fa-dribbble"> </i>
			                    </a>
			                  </li> -->
			                </ul>
                    </div>
                    
                    <!-- <div class="footer-links" id="visitor"> -->
						<!-- Histats.com  (div with counter) -->
						<!-- <div id="histats_counter"></div> -->
						<!-- Histats.com  START  (aync)-->
						<!-- <script type="text/javascript">var _Hasync= _Hasync|| [];
						_Hasync.push(['Histats.start', '1,4367931,4,604,110,55,00011111']);
						_Hasync.push(['Histats.fasi', '1']);
						_Hasync.push(['Histats.track_hits', '']);
						(function() {
						var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
						hs.src = ('//s10.histats.com/js15_as.js');
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
						})();</script>
						<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4367931&101" alt="" border="0"></a></noscript> -->
						<!-- Histats.com  END  -->

                    <!-- </div> -->

                </div>

            </div>

        </div>

    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <?=date('Y')?> <strong><a href="https://portal.podomorouniversity.ac.id/meet-our-team" target="_blank" style="color: #fff;">Podomoro University</a></strong>
            </div><!-- 
            <div class="credits">

            </div> -->
        </div>
    </div>

</footer>

<a href="#" class="back-to-top indigo-color"><i class="fa fa-chevron-up"></i></a>

<!-- scrip js -->
<script type="text/javascript">

	// Back to top button
	$(function() {
		$('.scrolling-navbar').css({'background': 'transparent','box-shadow': 'none'});
		$('.nav-link').css({'color': '#fff '});
		$('.btn-login').css({'background': 'rgb(255 255 255 / 52%) '});
		$('.scrollbar').scroll(function() {
			
			if ($(this).scrollTop() >= 100) {				
				$('.back-to-top').fadeIn('slow');
				$('#showColor').addClass('active');
				$('#showPutih').removeClass('active');
				$('#showPutih').addClass('hide');
				// $('.scrolling-navbar').hide();
				$('.scrolling-navbar').css({'background': '#fff ','box-shadow': '0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12)'});
				$('.nav-link').css({'color': '#000 '});
				$('.btn-login').css({'background': 'rgb(211 47 47)'});
				$('.btn-login .nav-link').css({'color': '#fff'});
				
			} else {

				$('.back-to-top').fadeOut('slow');	
				$('#showColor').removeClass('active');
				$('#showPutih').addClass('active');
				// $('.scrolling-navbar').show();
				$('.scrolling-navbar').css({'background': 'transparent','box-shadow': 'none'});
				$('.nav-link').css({'color': '#fff '});
				$('.btn-login').css({'background': 'rgb(255 255 255 / 52%)'});
			}
			});

			$('.back-to-top').click(function(){
			$('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
			return false;
			});

	});

</script>
<script type="text/javascript">
	$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
	  var next = $(this).next();
	  if (!next.length) {
	    next = $(this).siblings(':first');
	  }
	  next.children(':first-child').clone().appendTo($(this));

	  for (var i=0;i<1;i++) {
	    next=next.next();
	    if (!next.length) {
	      next=$(this).siblings(':first');
	    }
	    next.children(':first-child').clone().appendTo($(this));
	  }
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
 
	  $('#owl-demo').owlCarousel({
		    loop:true,
		    items:10,
		    nav:true,
		    dots: false,
		    margin:40,
		    responsive:{
		        0:{
		            items:2
		        },
		        600:{
		            items:5
		        },
		        1000:{
		            items:6
		        }
		    },
		    navText: ['<span class="fas fa-chevron-left fa-1x grey-text"></span>','<span class="fas fa-chevron-right fa-1x  grey-text"></span>']
		})
	 
	});
</script>
<script type="text/javascript">
	new universalParallax().init({
		speed: 4
	});
</script>
<script type="text/javascript">
  	// Animations init
	new WOW().init();
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('.img-fitter').imgFitter({
        // CSS background position
        backgroundPosition: 'center center',
        // for image loading effect
        fadeinDelay: 400,
        fadeinTime: 1200

    });
  })
</script>
<script type="text/javascript">
		$('.owl-carousel2').owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        },
		        1000:{
		            items:5,
		            nav:true,
		            loop:false
		        }
		    }
		})
		// $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){			
		// 	var next = $(this).next();
		// 	if (!next.length) {
		// 	next = $(this).siblings(':first');
		// 	}
		// 	next.children(':first-child').clone().appendTo($(this));

		// 	for (var i=0;i<4;i++) {
		// 	next=next.next();
		// 	if (!next.length) {
		// 	  next=$(this).siblings(':first');
		// 	}
		// 	console.log('ok');
		// 	next.children(':first-child').clone().appendTo($(this));
		// 	}
		// });
</script>

<!-- ======= Footer ====== -->
<!-- ======= Body ====== -->
</body>
</html>


