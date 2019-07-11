<!DOCTYPE html>
<html>
<head>
	<title>CSTC.COM.NP</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('front-end/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-end/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-end/css/font-awesome.css') }}">
	 <link rel="stylesheet" type="text/css" href="{{ asset('front-end/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" />
	<link rel="shortcut icon" href="{{ asset('back-end/images/image.png') }}" type="image/png">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ url('/') }}"><img src="{{ asset('front-end/images/title.png') }}" class="img-responsive"></a>
						<h4>you are valuable because we care</h4>
					</div>
					<div class="col-sm-3 col-sm-offset-3" id="head-info">
						<ul>
							<li>cstc@vianet.com.np</li>
							<li>Putalisadak, Kathmandu</li>
							<li>(+977)-1-4418816 / 970</li>
						</ul>
					</div>
				</div>				
			</div>
		</div> 	
		<div class="clearfix"></div>		
		<div class="col-sm-12" id="menu-bg">
			<div class="menu"  data-spy="affix" data-offset-top="197">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-4">
					
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <!-- <a class="navbar-brand" href="#">Brand</a> -->
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      	<ul class="nav navbar-nav">
						        <li><a href="{{ url('/') }}">Home</a></li>
					         	<li class="dropdown">
						          	<a href="{{ url('/about-us') }}" class="dropbtn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us <span class="caret"></span></a>
							          <ul class="dropdown-menu">
							            <li><a href="{{ url('/about-us') }}">Company Profile</a></li>
							             <li role="separator" class="divider"></li>
							            <li><a href="{{ url('/about-us') }}#mission-info">Mission</a></li>
							             <li role="separator" class="divider"></li>
							            <li><a href="{{ url('/about-us') }}#resources">Resources</a></li>						
							          </ul>
					        	</li>
					       	  	<li><a href="{{ url('/service') }}">Services</a></li>
				          		<li><a href="{{ url('/solution') }}">Business Solution</a></li>
				          		<li><a href="{{ url('/download') }}">Downloads</a></li>
					          	<li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
					      	</ul> 
						</div><!-- /.navbar-collapse -->	 
					</div>  
				</div>
			</div>	<!-- /menu -->
		</div>
		<div class="clearfix"></div>
	</div>