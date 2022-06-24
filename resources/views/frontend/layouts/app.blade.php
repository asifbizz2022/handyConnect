@include('frontend.layouts.stylesheets')
<body>
<div class="boxed_wrapper">

<div class="preloader style-two"></div> 

<!-- main header -->
<header class="main-header style2">
    <!--Start header top style2-->
    <!-- <div class="header-top-style2">
        <div class="container">
            <div class="outer-box clearfix">
               
                <div class="top-left float-left">
                    <p> <a style="color: aliceblue;" href="https://wa.me/98392229" target="_blank"><i class="fa fa-whatsapp"></i> HP Number:  9839 2229</a>
                    </p>
                </div>
                
                <div class="top-middle float-left">
                    <p><b>Office Tel:</b> <span class="icon-phone"></span> Call: 6734 1229</p>
                </div>
              
                
                <div class="top-right float-right">
                    <div class="language-switcher">
                        <div id="polyglotLanguageSwitcher">
                            <form action="#">
                                <select id="polyglot-language-options">
                                    <option id="en" value="en" selected>English</option>
                                    <option id="fr" value="fr">French</option>
                                    <option id="es" value="es">Spanish</option>
                                </select>
                            </form>
                        </div>
                    </div>
                   
                </div>

            </div>  
        </div>
    </div> -->
    <!--End header top style2-->
    <!--Start Header upper style2-->
    <!-- <div class="header-upper-style2">
        <div class="container-fluid clearfix">
            <div class="outer-box clearfix"> 
                <div class="header-upper-left">
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt="Awesome Logo" title="" style="width: 172px; height: 80px;"></a>
                    </div>
                </div>
                <div class="header-upper-right clearfix">
                    <ul class="header-contact-info clearfix">
                        <li>
                            <div class="single-item">
                                <div class="icon">
                                    <span class="icon-maps-and-location"></span>  
                                </div>
                                <div class="text">
                                    <p>  1 Pemimpin Drive #04-01/02 One Pemimpin S’pore 576151
                                    </p>  
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-item">
                                <div class="icon">
                                    <span class="icon-mail"></span>  
                                </div>
                                <div class="text">
                                   <p><a style="color: #000;" href="mailto::hello@handyconnect.com"> hello@handyconnect.com</a></p>
                                </div>
                            </div>
                        </li> 
                    </ul>    
                </div>
            </div>
        </div>
    </div> -->
    <!--End Header Upper style2-->
    <!--Start Header Lawer-->
    <div class="header-lower ">
        <div class="container mob-block">
            <div class="outer-box clearfix ">
                <div class="header-lawer-left float-left ">
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu style2 navbar-expand-lg ">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li class=""><a href="{{ route('about_us') }}">About Us</a>
                                        
                                    </li>
                                    <li class=""><a href="{{ route('services') }}">Services</a>
                                       
                                    </li>
                                    <!-- <li><a href="https://goodmaninterior.com/residential-home-renovation/" target="_blank">Projects</a>
                                        
                                    </li> -->
                                    <li class=""><a href="{{ route('blog') }}">News</a>
                                        
                                    </li>
                                    <li><a href="{{ route('contact')}}">Contact</a>
                                      </li>
                                    
                                </ul>
                            </div>
                        </nav>                        
                        <!-- Main Menu End-->
                        <div class="menu-right-content-style2">
                            <div class="outer-search-box">
                                <div class="seach-toggle"><i class="fa fa-search"></i></div>
                                <ul class="search-box">
                                    <li>
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <input type="search" name="search" placeholder="Search Here" required>
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>   
                </div>
                <div class="header-lawer-right float-right">
                    <div class="social-links">
                        <ul class="social-links-style1">
                            <li>
                                <a class="envelop" href="mailto:hello@handyconnect.com.sg"><i class="fa fa-envelope" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="fb" href="https://www.facebook.com/HandyConnect.SG/"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="tw" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="youtube" href="https://wa.me/6598392229"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="button">
                        <a href=""><span class="icon-login" data-toggle="modal" data-target="#myModal"></span>Get a Quote</a>
                    </div>    
                </div>
                
            </div>    
        </div>    
    </div>
    <!--End Header Lawer-->
  
    <!--Sticky Header-->
    <div class="sticky-header style2">
        <div class="container">
            <div class="clearfix">
                <!--Logo--> 
                <div class="logo float-left">
                    <a href="{{ route('home') }}" class="img-responsive"><img src="{{ asset('frontend/images/logo.png')}}" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu style2 dropdown-menus2 navbar-expand-lg">
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="{{ route('home')}}">Home</a></li>
                                <li class=""><a href="{{ route('about_us')}}">About Us</a>
                                    
                                </li>
                                <li class=""><a href="{{ route('services')}}">Services</a>
                                   
                                </li>
                                <!-- <li class=""><a href="https://goodmaninterior.com/residential-home-renovation/" target="_blank">Projects</a>
                                  
                                </li> -->
                                <li class=""><a href="{{ route('blog') }}">News</a>
                                    
                                </li>
                                <li><a href="{{ route('contact') }}">Contact</a>
                                  </li>
                                  <li style="background-color: #b49f64;"><a href="#" style="padding: 25px 15px; color: #fff;" data-toggle="modal" data-target="#myModal">Get a Quote</a>
                                  </li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div>
    </div>
    <!--End Sticky Header-->
@include('frontend.layouts.getQuote')
</header>

@yield('content')

@include('frontend.layouts.footer')
@include('frontend.layouts.scripts')
