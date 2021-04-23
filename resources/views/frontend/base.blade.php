<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Azeem English Magazine</title>
	<link rel="icon" href="{{URL::asset('images/logo-02.png')}}">
	<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href="{{URL::asset('css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('css/slider.css')}}" rel="stylesheet" type="text/css" />
	<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<!--Header Start-->

<body>
	<style>
		a:hover {
			text-decoration: none;
		}

		.dropdown {
			position: relative;
			padding-top: 10px;
			display: inherit;
		}

		.dropdown a:hover {
			color: white;
			background: black;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			overflow-y: scroll;

			max-height: 300px;
			background-color: #f9f9f9;
			width: 200px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);

			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			display: block;
		}

		.dropdown-content a:hover {
			color: white;
			background-color: indigo;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}
	</style>

	<div class="col-md-12 top" id="top">
		<div class="row">
			<div class="col-lg-9 top-left">
				<div class="col-lg-6">
					<span class="day" id="day">{{date('l, M d,Y.')}}</span>
				</div>


			</div>
			<div class="col-lg-3 top-right float-right">
				<a href="https://www.facebook.com/AEMisb/" target="_blank"><img src="{{URL::asset('images/icon-fb.png')}}" /></a>
				<a href="https://twitter.com/aec_islamabad" target="_blank"><img src="{{URL::asset('images/icon-twitter.png')}}" /></a>
				<a href="{{url('/subscribe')}}" class="btn btn-secondary">SUBSCRIBE</a>
			</div>
		</div>
	</div>

	<div class="col-lg-12 brand d-flex justify-content-around">
		<center class="col-lg-3 d-flex justify-content-center">
			@if($settings->logo)
			<a href="{{url('/')}}"><img src="{{url('settings')}}/{{$settings->logo}}" style="width:25%"></a>
			@endif
		</center>
		<div class="col-lg-6 d-flex justify-content-center">
			<a href="{{url('/')}}">
				<center class="hero" style="text-transform: uppercase; font-family:'Times New Roman', Times, serif;">Azeem English Magazine</center>
			</a>
		</div>

	</div>

	<div class="col-md-12 main-menu">
		<div class="col-md-12 menu">
			<nav class="navbar " id="">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#" style="color: white;">Azeem English Magazine</a>
					</div>

					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="/" class="{{request()->is('/') ? 'active' : '' }}"><i class="fa fa-home"></i></a></li>

							<li>
								<div class="dropdown">
									<a>Categories</a>
									<div class="dropdown-content">
										@foreach($categories as $cat)
										<a href="{{url('category')}}/{{$cat->slug}}" class="">{{$cat->title}}</a>
										@endforeach
									</div>
								</div>
							</li>
							<li>
								<a href="{{url('/contribute')}}">Contribute</a>
							</li>
							<li>
								<a href="{{url('/archives')}}">Archives</a>
							</li>



						</ul>
					</div>
				</div>
			</nav>

		</div>

	</div>


	<!--Header End-->

	@yield('content')


	<!--Footer Start-->
	<div class="col-md-12 bottom">
		<div class="col-md-4">
			<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid purple;">About Us</span></h3>

			@if($settings->logo)
			<img src="{{url('settings')}}/{{$settings->logo}}" style="width:25%; margin:10px;">
			@endif
			</span>
			<p align="justify">{{$settings->about}}</p>

		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid purple;">Quick Links</span>
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="row">
						<ul class="nav">
							@foreach($categories as $key=>$cat)
							@if($key< count($categories)/2) <li><a href="{{url('category')}}/{{$cat->slug}}">{{$cat->title}}</a></li>
								@endif
								@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6">
					<div class="row">
						<ul class="nav">
							@foreach($categories as $key=>$cat)
							@if($key >= count($categories)/2)
							<li><a href="{{url('category')}}/{{$cat->slug}}">{{$cat->title}}</a></li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid purple;">Contact Us</span></h3>
			<span class="name">Azeem English Magazine</span><br />
			Follow us at:<br /><br />
			<a href="https://www.facebook.com/AEMisb/"><img src="{{URL::asset('images/icon-fb.png')}}" /></a>
			<a href="https://twitter.com/aec_islamabad"><img src="{{URL::asset('images/icon-twitter.png')}}" /></a>

			<a href="#top" class="btn btn-default goto"><span class="glyphicon glyphicon-chevron-up"></span></a><br />
		</div>

	</div>

	<script>
		jQuery(document).ready(function() {
			var duration = 500;
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > 500) {
					jQuery('.goto').fadeIn(duration);
				} else {
					jQuery('.goto').fadeOut(duration);
				}
			});

			jQuery('.goto').click(function(event) {
				event.preventDefault();
				jQuery('html').animate({
					scrollTop: 0
				}, duration);
				return false;
			})
		});
	</script>
	<footer class="col-lg-12 ">
		<div class="col-sm-6">
			Copyright &copy;2000 - {{date('Y')}} <a href="https://aemagazine.pk">aemagazine.pk</a> All rights reserved.
		</div>

	</footer>

</body>

</html>
<!--Footer End-->