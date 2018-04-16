<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Anh | Blog</title>

    
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{ asset('blog_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('blog_assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('blog_assets/css/lightbox.css') }}" rel="stylesheet"> 
    <link href="{{ asset('blog_assets/css/animate.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('blog_assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('blog_assets/css/responsive.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('blog_assets/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('blog_assets/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('blog_assets/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('blog_assets/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('blog_assets/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                    <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ route('blog.home') }}">
                        <h1><img src="{{ asset('blog_assets/images/logo.png') }}" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('blog.home') }}">Home</a></li>
                        <li class="dropdown"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="">About</a></li>
                                <li><a href="">About 2</a></li>
                                <li><a href="">Services</a></li>
                                <li><a href="">Pricing</a></li>
                                <li><a href="">Contact us</a></li>
                                <li><a href="">Contact us 2</a></li>
                                <li><a href="">404 error</a></li>
                                <li><a href="">Coming Soon</a></li>
                            </ul>
                        </li>                    
                        <li class="dropdown"><a href="blog.html">Blog<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a class="active" href="">Blog Default</a></li>
                                <li><a href="">Timeline Blog</a></li>
                                <li><a href="">2 Columns + Right Sidebar</a></li>
                                <li><a href="">1 Column + Left Sidebar</a></li>
                                <li><a href="">Blog Masonary</a></li>
                                <li><a href="">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">Portfolio<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="">Portfolio Default</a></li>
                                <li><a href="">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="">3 Columns + Right Sidebar</a></li>
                                <li><a href="">3 Columns + Left Sidebar</a></li>
                                <li><a href="">2 Columns</a></li>
                                <li><a href="">Portfolio Details</a></li>
                            </ul>
                        </li>                         
                        <li><a href="{{ route('blog.about') }}">About Anh</a></li>                    
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
    
    @yield('page-breadcrumb')
    

    @yield('content')
    
    <!--/#blog-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6 col-md-push-1">
                    <div class="testimonial bottom">
                        <h2>Quotes</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile1.png" alt=""></a>
                            </div>
                            <div class="media-body text-justify">
                                <blockquote>Con người chúng ta rồi cũng trưởng thành và cả những giấc mơ cũng phải trưởng thành</blockquote>
                                <h3><a href="#">- Chris Khoa</a></h3>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile2.png" alt=""></a>
                            </div>
                            <div class="media-body text-justify">
                                <blockquote>Cuộc đời có 1 bầu trời <br> còn Ta có 1 đôi cánh</blockquote>
                                <h3><a href="">- Trần Đăng Khoa</a></h3>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6 col-md-push-1">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                            E-mail: <a href="mailto:someone@example.com">anhngtrung@gmail.com</a> <br> 
                            Phone: +84 86 860 33 96 <br> 
                            Fax: +84 24 33 635 562 <br> 
                        </address>

                        <h2>Address</h2>
                        <address>
                            Dong Khe road <br> 
                            Dan Phuong, Dan Phuong district <br> 
                            Hanoi Capital<br> 
                            Vietnam <br> 
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-md-push-1">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Your Company 2017. All Rights Reserved.</p>
                        <p>Crafted by <a target="_blank" href="http://designscrazed.org/">Tử Đằng Kết Vỹ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->


    <script type="text/javascript" src="{{ asset('blog_assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('blog_assets/js/bootstrap.min.js') }}"></script>
    
    @yield('footer')

    <script type="text/javascript" src="{{ asset('blog_assets/js/lightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('blog_assets/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('blog_assets/js/main.js') }}"></script>   
</body>
</html>
