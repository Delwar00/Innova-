<!DOCTYPE HTML>
<html lang="en-US">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width , initial-scale=1"/>
  <meta name="keywords" content="bike, bicycle, bycylce in bangladesh "/>
  <meta name="description" content="the website need to seo friendly then we add meta keywoeds , meta description, meta viewport , meta charset "/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

  <title>
    @foreach($service_info as $service)
    {{$service->service_title}}
    @endforeach
  </title>

  <!-- styleshetts -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/css/bootstrap.min.css" media="all" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/css/normalize.css" media="all" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/css/font-awesome.min.css" media="all" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontpage')}}/style.css" media="all" />

  <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontpage')}}/img/apple-touch-icon.png" />

  <!--[if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
</head>
<body>
      <div class="col-md-12">
          <h2 class="bg bg-primary text-center" style='padding:10px 0'>Service Information</h2>
          <div class="container">
              <div class="row">
            @foreach($service_info as $service)
                <div>
                  <img style="height:300px;width:100%" src="{{asset('/storage')}}/{{$service->service_image}}">
                </div>
                <div>
                  <h2>{{$service->service_title}}</h2>
                </div>
                <div>
                  <p>{{$service->service_details}}</p>
                </div>
            @endforeach

      </div>


      </div>
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{asset('frontpage')}}/js/bootstrap.min.js"></script>
    <!-- typed js link -->
  <script src="{{asset('frontpage')}}/js/typed.min.js"></script>
  <script src="{{asset('frontpage')}}/js/custom.js"></script>

</body>
</html>
