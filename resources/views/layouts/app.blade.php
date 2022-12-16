<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Review App</title>
    <meta name="description" content="Your Description Here">
    <meta name="keywords" content="free boostrap, bootstrap template, freebies, free theme, free website, free portfolio theme, portfolio, personal, cv">
    <meta name="author" content="Jenn, ThemeForces.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ url('assets/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('assets/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('assets/img/apple-touch-icon-114x114.png') }}">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/font-awesome-4.2.0/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">

    <!-- Slider
    ================================================== -->
    <link href="{{ url('assets/css/owl.carousel.css') }}" rel="stylesheet" media="screen">
    <link href="{{ url('assets/css/owl.theme.css') }}" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ url('assets/css/mystyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/responsive.css') }}">


    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{ url('assets/js/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Off Canvas Navigation
    ================================================== -->
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas"> <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <span class="fa fa-close"></span>
        </div>
        <div class="add-margin"></div>
        <ul class="nav navmenu-nav"> <!--- Menu -->
            <li><a href="{{ url('/') }}" class="page-scroll">Home</a></li>
            <li><a href="{{ url('review/book') }}" class="page-scroll">Books</a></li>
            <li><a href="{{ url('review/movie') }}" class="page-scroll">Movies</a></li>
            <li><a href="{{ url('review/record') }}" class="page-scroll">Records</a></li>
            @auth
              <li><a href="{{ url('user') }}" class="page-scroll">Profile</a></li>
              <li><a href="{{ url('logout') }}" class="page-scroll">Log out</a></li>
            @endauth
            <li><a href="{{ url('login') }}" class="page-scroll">Log in</a></li>
            <li><a href="{{ url('register') }}" class="page-scroll">Register</a></li>
        </ul><!--- End Menu -->
    </div> <!--- End Off Canvas Side Menu -->
    
    @yield('content')

    <!-- Contact Section -->
    <div id="contact">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contact Us</h2>
                <hr>
            </div>
            <div class="space"></div>

            <div class="row">
                <div class="col-md-3">
                    <address>
                        <strong>Address</strong><br>
                        <br>
                        ThemeForces.Com<br>
                        Igbalangao, Bugasong, Anitque<br>
                        5704, Philippines<br>
                        Phone: (123) 456-7890
                        <ul class="social">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                          </ul>
                    </address>
                </div>

                <div class="col-md-9">
                    <form autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name">
                                <input type="text" class="form-control" placeholder="Phone No.">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Email">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                        <div class="text-right">
                            <a href="#" class="btn send-btn">Send</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav id="footer">
        <div class="container">
             <div class="pull-left">
                <p>2022 © Christian. All Rights Reserved.</p>
            </div>
            <div class="pull-right"> 
                <a href="#home" class="page-scroll">Back to Top <span class="fa fa-angle-up"></span></a>
            </div>
        </div>
    </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.1.11.1.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jasny-bootstrap.min.js') }}"></script>

    <script src="{{ url('assets/js/owl.carousel.js') }}"></script>
    <script src="{{ url('assets/js/typed.js') }}"></script>
    <script>
      $(function(){
          $("#head-title").typed({
            strings: ["Join our community^1000", "Books - Movies - Records^1000" , "The best reviews^1000"],
            typeSpeed: 100,
            loop: true,
            startDelay: 100
          });
      });
    </script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="{{ url('assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/edit.js') }}"></script>
    @yield('scripts')
  </body>
</html>