<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/script.js') }}"></script>



    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
    <script src="{{ asset('assets/owl-carousel/owl.carousel.js') }}"></script>
    <!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="{{ asset('assets/slitslider/js/modernizr.custom.79639.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/slitslider/js/jquery.ba-cond.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/slitslider/js/jquery.slitslider.js') }}"></script>
<!-- slitslider -->

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('agents')}}">Agents</a></li>
                <li><a href="{{route('blog')}}">Blog</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->
    <div class="container">
    <!-- Header Starts -->
        <div class="header">

            <a href="{{route('index')}}"><img style="width: 171px" src="{{ asset('images/logo.jpeg') }}" alt="Realestate"></a>

            @auth()
                <div class="dropdown pull-right ">
                    <div  class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                        <h4 style="color: #72B70F; font-weight: bolder;">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </h4>
                    </div>
                    <ul class="dropdown-menu m-0" aria-labelledby="dropdownMenu1">
                        <li><a href="{{route('profile.edit')}}"> {{ __('Profile') }}</a></li>
                        <li><a href="{{route('buysalerent')}}">Buy</a></li>
                        <li><a href="{{route('buysalerent')}}">Sale / Rent</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a style="color: black; margin-left: 19px;" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();"> {{ __('Log Out') }}</a></li>
                        </form>

                    </ul>
                </div>
            @endauth
            @guest()
                <div class=" pull-right">
                        <a  href="{{ route('login') }}" class="btn btn-info" >Login</a>
                        <a  href="{{ route('register') }}" class="btn btn-info" >Register</a>
                </div>
            @endguest

        </div>
    <!-- #Header Starts -->
    </div>
