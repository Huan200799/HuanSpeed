<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <base href="{{asset('/layout/frontend')}}/">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="css/rating.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
        $(function() {
            var pull        = $('#pull');
            menu        = $('nav ul');
            menuHeight  = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function(){
            var w = $(window).width();
            if(w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
</head>
<body>
    <!-- header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-md-2 col-sm-12 col-xs-12">
                    <h1>
                        <a href="{{asset('/')}}"><img style="width: 250px; height: 120px; margin-top: 4px;" src="img/home/logo.png"></a>
                        <nav><a id="pull" class="btn btn-danger" href="#">
                            <i class="fa fa-bars"></i>
                        </a></nav>
                    </h1>
                </div>
                <div id="timkiem" class="col-md-6 col-sm-12 col-xs-12">
                    <form action="{{route('search')}}" method="get">
                        <input type="text" name="search" placeholder="Nhập Tên Sản Phẩm?">
                        <button type="submit" class="site-btn">{{ trans('message.search')}}</button>
                    </form>
                </div>
                <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                    <a class="display" href="{{route('show')}}">Giỏ hàng</a>
                    <a href="{{route('show')}}">{{Cart::count()}}</a>
                </div>
                <div id="login" class="col-md-2 col-sm-12 col-xs-12">
                    <div>
                        @guest
                            <a href="{{route('login')}}">Login</a>

                        @else
                            <div class="dropdown" >
                                <a  class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name_user }}
                                    @if(Auth::user()->avatar != null)
                                    <img width="50px" height="30px" src="{{asset('avatar/'.Auth::user()->avatar)}}">
                                    @else
                                    @endif
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{route('Logout')}}" class="dropdown-item" id="logout_btn" style="color: black;">
                                    {{ trans('message.logout') }}
                                </a>
                                <a class="dropdown-item" href="{{asset('profile')}}">
                                    {{ trans('message.MyProfile') }}
                                </a>
                                <a class="dropdown-item" href="{{asset('suggest')}}">
                                    {{ trans('message.gopy') }}
                                </a>
                                <a class="dropdown-item" href="{{asset('order/'.Auth::id())}}">
                                    {{ trans('message.ordered') }}
                                </a>
                            </div>
                      </div>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </header><!-- /header -->
    <!-- endheader -->

    <!-- main -->
    <section id="body">
        <div class="container">
            <div class="row">
                <div id="sidebar" class="col-md-3">
                    <nav id="menu">
                        <ul>
                            <li class="menu-item">danh mục sản phẩm</li>
                            @foreach($catelist as $cate)
                            <li class="menu-item"><a href="{{asset('categories/'.$cate->id.'/'.$cate->categories_name_slug.'.html')}}" title="">{{$cate->categories_name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>

                </div>

                <div id="main" class="col-md-9">
                    <!-- main -->
                    <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
                    <div id="slider">
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/home/banner1.jpg"  style="height: 420px; width: 100%;">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/home/banner1.jpg"  style="height: 420px; width: 100%;">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/home/banner1.jpg"  style="height: 420px; width: 100%;">
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>


                @yield('main')


                </div>
            </div>
        </section>
    <!-- endmain -->

    <!-- footer -->
    <footer id="footer">
        <div id="footer-t">
            <div class="container">
                <div class="row">
                    <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                        <a href="{{asset('/')}}"><img style="width: 250px; height: 120px; margin-top: 4px;" src="img/home/logo.png"></a>
                    </div>
                    <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>About us</h3>
                        <p class="text-justify">Nguyễn Đình Huân.</p>
                    </div>
                    <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Hotline</h3>
                        <p>Phone Sale: (+84) 0776230169</p>
                        <p>Email: nguyendinhhuan999@gmail.com</p>
                    </div>
                    <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Contact Us</h3>
                        <p>Address 1: 08 Hà Văn Tính, Hoà Khánh Nam, Liên Chiểu, Đà Nẵng</p>
                        <p>Address 2: Số 20 Ngõ 07 Điện An, Điện An, Quảng Nam</p>
                    </div>
                </div>
            </div>
            <div id="footer-b">
                <div class="container">
                    <div class="row">
                        <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>Nguyễn Đình Huân Website Số I Việt Nam :))</p>
                        </div>
                        <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>© 2020 Nguyễn Đình Huân. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
                <div id="scroll">
                    <a onclick="topFunction()" id="myBtn"><img src="img/home/scroll.png"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- endfooter -->
</body>
</html>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
