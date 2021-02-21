<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="{{ url('/').$site_info->favicon }}">
		@if (isset($site_info->index_google))
			<meta name="robots" content="{{ $site_info->index_google == 1 ? 'index, follow' : 'noindex, nofollow' }}">
		@else
			<meta name="robots" content="noindex, nofollow">
		@endif
		{!! SEO::generate() !!}
		<meta name='revisit-after' content='1 days' />
		<meta name="copyright" content="GCO" />
		<meta http-equiv="content-language" content="vi" />
		<meta name="geo.region" content="VN" />
	    <meta name="geo.position" content="10.764338, 106.69208" />
	    <meta name="geo.placename" content="Hà Nội" />
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	 	<meta name="_token" content="{{csrf_token()}}" />
	 	<link rel="canonical" href="{{ \Request::fullUrl() }}">


		 <!--link css-->

		<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/tool.min.css" />
		<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/reset.min.css" />
		<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/main.min.css" />
		<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/page.min.css" />
		<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/responsive.min.css" />
		<link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/toastr.min.css" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1"> 

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/jquery.min.js"></script>

		<style>
	        -webkit-touch-callout: none;
	        -webkit-user-select: none;
	        -moz-user-select: none;
	        -ms-user-select: none;
	        -o-user-select: none;
	        user-select: none;
	    </style>

		<style>
			.cslder {
			   display: block;
			   text-align: center;
			   height: 20px;
			   position: relative;
			   display: none;
			   clear: both
		   }

		   .cslder .cswrap {
			   position: absolute;
			   top: 50%;
			   left: 50%;
			   -webkit-transform: translate(-50%,-50%);
			   transform: translate(-50%,-50%)
		   }

		   .csdot {
			   width: 5px;
			   height: 5px;
			   border: 1px solid #00a850;
			   background: #00a850;
			   border-radius: 50%;
			   float: left;
			   margin: 0 2px;
			   -webkit-transform: scale(0);
			   transform: scale(0);
			   -webkit-animation: fx 1000ms ease infinite 0ms;
			   animation: fx 1000ms ease infinite 0ms
		   }

		   .csdot:nth-child(2) {
			   -webkit-animation: fx 1000ms ease infinite 300ms;
			   animation: fx 1000ms ease infinite 300ms
		   }

		   .csdot:nth-child(3) {
			   -webkit-animation: fx 1000ms ease infinite 600ms;
			   animation: fx 1000ms ease infinite 600ms
		   }

		   .csslder {
			   display: block;
			   text-align: center;
			   height: 20px;
			   position: relative;
			   clear: both
		   }

		   .csslder .csswrap {
			   position: absolute;
			   top: 50%;
			   left: 50%;
			   -webkit-transform: translate(-50%,-50%);
			   transform: translate(-50%,-50%)
		   }

		   .cssdot {
			   width: 10px;
			   height: 10px;
			   border: 1px solid #00a850;
			   background: #00a850;
			   border-radius: 50%;
			   float: left;
			   margin: 0 5px;
			   -webkit-transform: scale(0);
			   transform: scale(0);
			   -webkit-animation: fx 1000ms ease infinite 0ms;
			   animation: fx 1000ms ease infinite 0ms
		   }

		   .cssdot:nth-child(2) {
			   -webkit-animation: fx 1000ms ease infinite 300ms;
			   animation: fx 1000ms ease infinite 300ms
		   }

		   .cssdot:nth-child(3) {
			   -webkit-animation: fx 1000ms ease infinite 600ms;
			   animation: fx 1000ms ease infinite 600ms
		   }
		   .loadingcover {
			   position: fixed;
			   top: 0;
			   left: 0;
			   right: 0;
			   bottom: 0;
			   background-color: rgba(255,255,255,.75);
			   z-index: 100;
		   }

		   .loadingcover .csslder {
			   top: 50%
		   }

		   @-webkit-keyframes fx {
			   50% {
				   -webkit-transform: scale(1);
				   transform: scale(1);
				   opacity: 1
			   }

			   100% {
				   opacity: 0
			   }
		   }

		   @keyframes fx {
			   50% {
				   -webkit-transform: scale(1);
				   transform: scale(1);
				   opacity: 1
			   }

			   100% {
				   opacity: 0
			   }
		   }

		   .bg-banner,.slider_banner--home:after{
		   		background: url({{url('').@$site_info->background_page->slider}});
    			background-size: 100% 100%;
		   }
		   .news{
		   		background: url({{url('').@$site_info->background_page->main_footer}});
    			background-size: 100% 100%;
		   }
		   .y-kien-kh,.sp_page--chinh,.chi-tiet-sp{
		   		background: url({{url('').@$site_info->background_page->main}});
    			background-size: 100% 100%;
		   }
		</style>
	 	

	 	@if (!empty($site_info->ticktok))
		<!-- Ticktok -->
			<script>
				(function() {
					var ta = document.createElement('script'); ta.type = 'text/javascript'; ta.async = true;
					ta.src = 'https://analytics.tiktok.com/i18n/pixel/sdk.js?sdkid={{ $site_info->ticktok }}';
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(ta, s);
				})();
			</script>
		@endif

		@if (!empty($site_info->google_analytics))
		<!-- Google Analysis -->
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
				ga('create', '{{ $site_info->google_analytics }}', 'auto');
				ga('send', 'pageview');
			</script>
		@endif

		@if (!empty($site_info->google_tag_manager))
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','{{ $site_info->google_tag_manager }}');</script>
		@endif

	</head> 
	<body class="page-body home-body">

		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ @$site_info->google_tag_manager }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

		@if (!empty($site_info->facebook_pixel))
		<!-- Facebook Pixel -->
			<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window, document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '{{ $site_info->facebook_pixel }}');
				fbq('track', 'PageView');
		  </script>
		@endif

		<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ @$site_info->facebook_pixel }}&ev=PageView&noscript=1"/></noscript>

		@if (!empty($site_info->facebook_chat))
			<!-- Load Facebook SDK for JavaScript -->
			<div id="fb-root"></div>
			<script>
			window.fbAsyncInit = function() {
				FB.init({
				xfbml            : true,
				version          : 'v8.0'
				});
			};

			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		@endif

			<div class="loadingcover" style="display: none;">
				<p class="csslder">
					<span class="csswrap">
						<span class="cssdot"></span>
						<span class="cssdot"></span>
						<span class="cssdot"></span>
					</span>
				</p>
			</div>
			<h1 class="h1_seo d-none">Thọ Quang Phát</h1>
			@include('frontend.teamplate.header')
				
				@yield('main')

			@include('frontend.teamplate.footer')

		<!-- <script type="text/javascript" src="{{ __BASE_URL__ }}/js/jquery.min.js"></script> --> 

		<script src="{{ __BASE_URL__ }}/js/tool.min.js"></script>
		<script defer src="{{ __BASE_URL__ }}/js/main.js"></script> 


		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/toastr.min.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/tdt.js"></script>
		<script>
		    $(document).ready(function () {
		        function playVideo() {
		            $(".play").click(function () {
		                $(this).children(".introduce__thumbnail").toggleClass("active");
		            });
		        }
		        playVideo();

		        function slideService() {
		            $(".slide__service").slick({
		                dots: false,
		                infinite: false,
		                speed: 300,
		                slidesToShow: 4,
		                slidesToScroll: 4,
		                autoplay: true,
		                arrows: true,
		                lazyLoad: "ondemand",
		                responsive: [{
		                    breakpoint: 1024,
		                    settings: {
		                        slidesToShow: 3,
		                        slidesToScroll: 3,
		                        infinite: true,
		                    },
		                },
		                {
		                    breakpoint: 600,
		                    settings: {
		                        slidesToShow: 2,
		                        slidesToScroll: 2,
		                    },
		                },
		                {
		                    breakpoint: 480,
		                    settings: {
		                        slidesToShow: 1,
		                        slidesToScroll: 1,
		                    },
		                },
		                ],
		            });
		        }
		        slideService();

		        function slideCustomers() {
		            $(".customers__slide").slick({
		                infinite: true,
		                slidesToShow: 1,
		                slidesToScroll: 1,
		                lazyLoad: "ondemand",
		                autoplay: true,
		            });
		        }
		        slideCustomers();

		        function slideNew() {
		            $(".new__slide").slick({
		                dots: false,
		                infinite: false,
		                speed: 300,
		                slidesToShow: 4,
		                slidesToScroll: 4,
		                autoplay: true,
		                arrows: true,
		                lazyLoad: "ondemand",
		                responsive: [{
		                    breakpoint: 1024,
		                    settings: {
		                        slidesToShow: 3,
		                        slidesToScroll: 3,
		                        infinite: true,
		                    },
		                },
		                {
		                    breakpoint: 600,
		                    settings: {
		                        slidesToShow: 2,
		                        slidesToScroll: 2,
		                    },
		                },
		                {
		                    breakpoint: 480,
		                    settings: {
		                        slidesToShow: 1,
		                        slidesToScroll: 1,
		                    },
		                },
		                ],
		            });
		        }
		        slideNew();
		    });
		</script>
        
		@yield('script')

		<script type="text/javascript">
			$(document).ready(function(){
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			});
		</script>


		@if (Session::has('toastr'))

			<script>

				jQuery(document).ready(function($) {

					toastr["success"]('{{ Session::get('toastr') }}', 'Thông báo');

				});

			</script>

		@endif
		
		@if (!empty($site_info->script))
			{!! $site_info->script !!}
		@endif

	</body>
</html>