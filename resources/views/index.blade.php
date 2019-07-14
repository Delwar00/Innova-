<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('website.name', 'Innova') }}</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="{{asset('frontpage')}}/img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="{{asset('frontpage')}}/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontpage')}}/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontpage')}}/img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="{{asset('frontpage')}}/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/css/style.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Innova</a>
      <div class="phone"><span>Call Today</span>320-123-4321</div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="#services" class="page-scroll">Services</a></li>
        <li><a href="#portfolio" class="page-scroll">Projects</a></li>
        <li><a href="#testimonials" class="page-scroll">Testimonials</a></li>
        <li><a href="#contact" class="page-scroll">Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro" style="background: url('{{asset("/storage")}}/{{$all_const_info->construct_image}}') center center no-repeat;">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1>{{$all_const_info->construct_title}}</h1>
            <p>{{$all_const_info->construct_details}}</p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">{{$all_const_info->construct_button}}</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-1">
        <h3>{{$all_const_info->construct_renovation}}</h3>
        <p>{{$all_const_info->construct_started}}</p>
      </div>
      <div class="col-xs-12 col-md-4 text-center">
          <a href="#contact" class="btn btn-custom btn-lg page-scroll">{{$all_const_info->construct_free_estimate}}</a>
       </div>
    </div>
  </div>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="{{asset('/storage')}}/{{$all_about_info->about_image}}" class="img-responsive" alt=""> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">

          <h2>{{$all_about_info->about_title}}</h2>

          <p>{{ str_limit($all_about_info->about_details,500)}}</p>
          <h3>{{$all_about_info->about_point}}</h3>
          <div class="list-style">
            <div class="col-lg-12 col-sm-12 col-xs-12">
              <ul>
                 @forelse($about_point as $about)
                    <li>{{$about->point}}</li>
                    @empty
                    <li>There Is no POints</li>

                @endforelse
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="section-title">
      <h2>Our Services</h2>
    </div>
    <div class="row">
@foreach($service_info as $service)
  <a href="{{url('/admin/service')}}/{{$service->id}}}}">
      <div class="col-md-4">
        <div class="service-media"> <img src="{{asset('/storage')}}/{{$service->service_image}}" alt="photo not found "> </div>
        <div class="service-desc">
          <h3>{{$service->service_title}}</h3>
          <p>{{$service->service_details}}</p>
        </div>
      </div>
  </a>
  @endforeach
    </div>
<br>
    <h4 style="width:20%;margin:auto">{{$service_info->links()}}</h4>
  </div>
</div>
<!-- Testimonials Section -->
<div id="testimonials">
  <div class="container">
    <div class="section-title">
      <h2>Testimonials</h2>
    </div>
    <div class="row">
    @foreach($testimonial_info as $testimonial)
      <div class="col-md-4">
        <div class="testimonial">
          <div class="testimonial-image"> <img src="{{asset('/storage')}}/{{$testimonial->testimonal_image}}" alt=""> </div>
          <div class="testimonial-content">
            <p>{{$testimonial->testimonal_details}}</p>
            <div class="testimonial-meta"> - {{$testimonial->testimonal_author}} </div>
          </div>
        </div>
      </div>
     @endforeach
    </div>
     <!-- <br>
    <h4 style="width:20%;margin:auto">{{$testimonial_info->links()}}</h4>-->
  </div>
</div>
<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2>Get In Touch</h2>
          <p>Please fill out the form below to send us an email and we will get back to you as soon as possible.</p>
        </div>


          @if(session('status'))
          <div class="alert alert-success">{{session('status')}}</div>
          @endif
        <form name="sentMessage" id="contactForm" novalidate method="post" action="{{ url('/contact/form/submit') }}">
            @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="name" name="sender_name" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="email" name="sender_email" class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="sender_message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
      <div class="contact-item">
        <h4>Contact Info</h4>
        <p><span>Address</span>4321 California St,<br>
          San Francisco, CA 12345</p>
      </div>
      <div class="contact-item">
        <p><span>Phone</span> +1 123 456 1234</p>
      </div>
      <div class="contact-item">
        <p><span>Email</span> info@company.com</p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; 2017 INNOVA. Design by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
  </div>
</div>
<script type="text/javascript" src="{{asset('frontpage')}}/js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="{{asset('frontpage')}}/js/bootstrap.js"></script>
<script type="text/javascript" src="{{asset('frontpage')}}/js/SmoothScroll.js"></script>
<script type="text/javascript" src="{{asset('frontpage')}}/js/nivo-lightbox.js"></script>
<script type="text/javascript" src="{{asset('frontpage')}}/js/jqBootstrapValidation.js"></script>
<!--<script type="text/javascript" src="{{asset('frontpage')}}/js/contact_me.js"></script> -->
<script type="text/javascript" src="{{asset('frontpage')}}/js/main.js"></script>
</body>
</html>
