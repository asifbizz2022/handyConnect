<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Handy Connect</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- master stylesheet -->
    <link rel="stylesheet" href="{{ asset('asset/font/css/style.css') }}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('asset/font/css/responsive.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Favicon -->

    <link rel="icon" type="image/png" href="{{ asset('asset/font/images/favicon/favicon-32x32.png') }}" sizes="32x32">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

</head>

<body>
    <div class="boxed_wrapper">

        <div class="preloader style-two"></div>

        <!-- main header -->
        <header class="main-header style2">
            <!--Start header top style2-->
            <div class="header-top-style2">
                <div class="container">
                    <div class="outer-box clearfix">
                        <!--Top Left-->
                        <div class="top-left float-left">
                            <p><span class="icon-saw"></span>Best Handyman Service in Singapore.</p>
                        </div>
                        <!--Top Middle-->
                        <div class="top-middle float-left">
                            <p><b>Need Help?:</b> <span class="icon-phone"></span> Call: +65 6734 1229</p>
                        </div>
                        <!--Top Right-->
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
            </div>
            <!--End header top style2-->
            <!--Start Header upper style2-->
            <div class="header-upper-style2">
                <div class="container-fluid clearfix">
                    <div class="outer-box clearfix">
                        <div class="header-upper-left">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('asset/font/images/logo.png') }}"
                                        alt="Awesome Logo" title="" style="width: 172px; height: 80px;"></a>
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
                                            <p> 1 Pemimpin Drive #04-02 One Pemimpin, Singapore 576151
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
                                            <p>sales@goodmaninterior.com</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper style2-->
            <!--Start Header Lawer-->
            <div class="header-lower">
                <div class="container">
                    <div class="outer-box clearfix">
                        <div class="header-lawer-left float-left">
                            <div class="nav-outer clearfix">
                                <!-- Main Menu -->
                                <nav class="main-menu style2 dropdown-menus2 navbar-expand-lg">
                                    <div class="navbar-header">
                                        <!-- Toggle Button -->
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li><a href="index.html">Home</a></li>
                                            <li class=""><a href="#">About Us</a>

                                            </li>
                                            <li class=""><a href="services.html">Services</a>

                                            </li>
                                            <li><a href="https://goodmaninterior.com/residential-home-renovation/"
                                                    target="_blank">Projects</a>

                                            </li>
                                            <li class=""><a href="#">News</a>

                                            </li>
                                            <li><a href="#">Contact</a>
                                                <ul>
                                                    <li><a href="#">FAQ</a></li>
                                                    <li><a href="#">Privacy Policy</a></li>
                                                    <li><a href="#">Terms & Conditions</a></li>
                                                </ul>
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
                                                        <input type="search" name="search" placeholder="Search Here"
                                                            required>
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
                                        <a class="envelop" href="#"><i class="fa fa-envelope"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="fb" href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="tw" href="#"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="youtube" href="#"><i class="fa fa-youtube-play"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="button">
                                <a href="#"><span class="icon-login"></span>Request a Call</a>
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
                            <a href="index.html" class="img-responsive"><img
                                    src="{{ asset('asset/font/images/logo.png') }}" alt="" title=""></a>
                        </div>
                        <!--Right Col-->
                        <div class="right-col float-right">
                            <!-- Main Menu -->
                            <nav class="main-menu style2 dropdown-menus2 navbar-expand-lg">
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="index.html">Home</a></li>
                                        <li class=""><a href="#">About Us</a>

                                        </li>
                                        <li class=""><a href="services.html">Services</a>

                                        </li>
                                        <li class=""><a
                                                href="https://goodmaninterior.com/residential-home-renovation/"
                                                target="_blank">Projects</a>

                                        </li>
                                        <li class=""><a href="#">News</a>

                                        </li>
                                        <li><a href="#">Contact</a>
                                            <ul>
                                                <li><a href="#">FAQ</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Terms & Conditions</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->
        </header>



        <!--Main Slider-->
        <section class="main-slider style2">
            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_two" data-version="5.4.1">
                    <ul>
                        <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689"
                            data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-rotate="0" data-saveperformance="off" data-slotamount="default"
                            data-thumb="{{ asset('asset/font/images/slides/v2-1.jpg') }}" data-title="Slide Title"
                            data-transition="parallaxvertical">

                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="{{ asset('asset/font/images/slides/v2-1.jpg') }}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['1000','800','800','500']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['-180','-150','-120','-125']"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="title">Welcome to Handy Connect</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['1000','800','800','400']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['-40','-30','-25','-35']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                    {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="big-title">
                                        Welcome To Handy Connect
                                    </div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['800','800','800','400']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['85','70','50','45']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                    {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="text">Lorem ipsum dolor, sit amet consectetur adipisicing
                                        elit. Vero, minus reiciendis dolor quod, exercitationem eligendi voluptatum
                                        veritatis quasi vitae perspiciatis vel quam excepturi laboriosam odio? Dolore
                                        atque quidem eum corporis.</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['800','800','800','500']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['170','155','120','125']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="btn-box">
                                        <a class="btn-one" href="#">About Company</a>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687"
                            data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-rotate="0" data-saveperformance="off" data-slotamount="default"
                            data-thumb="{{ asset('asset/font/images/slides/v2-2.jpg') }}" data-title="Slide Title"
                            data-transition="parallaxvertical">

                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="{{ asset('asset/font/images/slides/v2-2.jpg') }}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['1000','800','800','500']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['-180','-150','-120','-125']"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="title"> Welcome To Handy Connect</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['1000','800','800','400']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['-40','-30','-25','-35']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                    {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="big-title">
                                        Welcome To Handy Connect
                                    </div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['800','800','800','400']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['85','70','50','45']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                    {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Accusantium officiis nulla quas, culpa quam voluptatem placeat maxime quae
                                        nobis sapiente quod expedita veniam. Eaque molestiae ipsum assumenda repellendus
                                        praesentium modi.</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['800','800','800','500']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['170','155','120','125']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="btn-box">
                                        <a class="btn-one" href="#">Our Services</a>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688"
                            data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-rotate="0" data-saveperformance="off" data-slotamount="default"
                            data-thumb="{{ asset('asset/font/images/slides/v2-3.jpg') }}" data-title="Slide Title"
                            data-transition="parallaxvertical">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="{{ asset('asset/font/images/slides/v2-3.jpg') }}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['1000','800','800','500']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['-180','-150','-120','-125']"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="title"> Welcome To Handy Connect</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['1200','1100','1000','400']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['-40','-30','-25','-35']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                    {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="big-title">
                                        Welcome To Handy Connect
                                    </div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['800','800','800','400']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['85','70','50','45']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                    {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        elit. Voluptatum incidunt tempora vero veniam magnam at minus. Amet explicabo
                                        laboriosam libero accusamus corrupti beatae repellat in, harum enim, quas alias
                                        unde?</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['800','800','800','500']"
                                data-whitespace="normal" data-hoffset="['15','15','15','15']"
                                data-voffset="['170','155','120','125']" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content text-center">
                                    <div class="btn-box">
                                        <a class="btn-one" href="#">Our Services</a>
                                    </div>
                                </div>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <!--End Main Slider-->

        <section class="booking-call-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="booking-call">
                            <div class="title-box pull-left">
                                <div class="icon">
                                    <span class="flaticon-labor"></span>
                                </div>
                                <div class="title">
                                    <h3>Book Your Call &amp; Fix Your Problem</h3>
                                    <span>Get call back your affordable time.</span>
                                </div>
                            </div>
                            <div class="booking-call-form pull-right">
                                <form class="clearfix" method="post" action="#">
                                    <input type="text" name="number" placeholder="Your Mob Num..." required="">
                                    <button type="submit">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5 pt-5">

            <div class="row">
                <!--Start single service style3-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style3">
                        <div class="img-holder" style="height: 220px;">
                            <img src="{{ asset('asset/font/images/services/ser-style3-1.jpg') }}"
                                alt="Awesome Image">
                            <div class="icon-holder">
                                <span class="icon-idea"></span>
                            </div>
                            <div class="overlay-text">
                                <h3>Handyman Creative</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi et consectetur
                                    quasi fugit laborum </p>
                            </div>
                            <div class="overlay">
                                <div class="box">
                                    <div class="title">
                                        <h3>Handyman Creative</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi et
                                            consectetur quasi fugit laborum</p>
                                    </div>
                                </div>
                            </div>
                            <div class="readmore-button">
                                <a class="btn-three" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single service style3-->
                <!--Start single service style3-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style3">
                        <div class="img-holder">
                            <img src="{{ asset('asset/font/images/interior.png') }}" alt="Awesome Image">
                            <div class="icon-holder">
                                <span class="icon-wire"></span>
                            </div>
                            <div class="overlay-text">
                                <h3>GoodMan Loft</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi et consectetur
                                    quasi fugit laborum </p>
                            </div>
                            <div class="overlay">
                                <div class="box">
                                    <div class="title">
                                        <h3>GoodMan Loft</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi et
                                            consectetur quasi fugit laborum </p>
                                    </div>
                                </div>
                            </div>
                            <div class="readmore-button">
                                <a class="btn-three" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single service style3-->
                <!--Start single service style3-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style3">
                        <div class="img-holder">
                            <img src="{{ asset('asset/font/images/handy-good-man.png') }}" alt="Awesome Image">
                            <div class="icon-holder">
                                <span class="icon-repair"></span>
                            </div>
                            <div class="overlay-text">
                                <h3>GoodMan Interior</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi et consectetur
                                    quasi fugit laborum </p>
                            </div>
                            <div class="overlay">
                                <div class="box">
                                    <div class="title">
                                        <h3>GoodMan Interior</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi et
                                            consectetur quasi fugit laborum </p>
                                    </div>
                                </div>
                            </div>
                            <div class="readmore-button">
                                <a class="btn-three" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single service style3-->
            </div>
        </div>

        <!--Start about area Style2-->
        <section class="about-area-style2">
            <div class="pattern-layer paroller" data-paroller-factor="0.10" data-paroller-factor-lg="0.10"
                data-paroller-factor-md="0.10" data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                data-paroller-direction="horizontal"
                style="background-image:url({{ asset('asset/font/images/pattern/about-area-style2-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="about-content-style2">
                            <div class="year-box">
                                <span class="icon-worker"></span>
                                <p>ESTD 2018</p>
                            </div>
                            <div class="inner-content">
                                <h2>Welcome To Handy Connect</h2>
                                <div class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Eius veritatis molestiae quasi autem perferendis mollitia tempore magni. </p>
                                    <div class="border-box"></div>
                                    <div class="authorised-person">
                                        <h3>Owner name goes here</h3>
                                        <span>Chaiman & Founder of HandyConnect</span>
                                    </div>
                                    <div class="button">
                                        <a class="left" href="#">More About Us</a>
                                        <a class="right" href="#">Industry Served</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--End about Area Style2-->



        <section class="site-service mt-5 pt-5 mb-5 pb-5">
            <div class="container">
                <div>
                    <h1>Our <span id="typed">Servic</span><span class="typed-cursor">|</span></h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quaerat consequatur praesentium
                        iusto ab necessitatibus fugiat dolorem ducimus fuga neque, odit nesciunt magnam animi laudantium
                        cumque non tenetur quidem temporibus.</p>
                </div>

                <div class="row mb-5 mt-5">
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.1s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"><img src="{{ asset('asset/font/images/good-man-icon/basin 2.png') }}" alt=""
                                    class="img-fluid">
                                <p>Basin</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"><img src="{{ asset('asset/font/images/good-man-icon/door lock open.png') }}"
                                    alt="" class="img-fluid">
                                <p>Door</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/hang mirror.png') }}"
                                    alt="" class="img-fluid">
                                <p>Hang Mirror</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.7s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.7s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/gatelock.png') }}"
                                    alt="" class="img-fluid">
                                <p>Gatelock</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.9s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.9s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/pull bar icon.png') }}"
                                    alt="" class="img-fluid">
                                <p>Pull Bar</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 1s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/Shelf Assembly.png') }}"
                                    alt="" class="img-fluid">
                                <p>Shelf Assembly</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.1s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 1.1s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img
                                    src="{{ asset('asset/font/images/good-man-icon/Toilet bowl set.png') }}" alt=""
                                    class="img-fluid">
                                <p>Toilet Bowl Set</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.3s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 1.3s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img
                                    src="{{ asset('asset/font/images/good-man-icon/kitchen sinkonise.png') }}" alt=""
                                    class="img-fluid">
                                <p>Kitchen Sinknoise</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.5s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 1.5s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/wall mountain.png') }}"
                                    alt="" class="img-fluid">
                                <p>Wall Mountain</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.7s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 1.7s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/cupboard hinge.png') }}"
                                    alt="" class="img-fluid">
                                <p>Cupboard Hinge</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.9s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 1.9s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/shower.png') }}" alt=""
                                    class="img-fluid">
                                <p>Shower</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="2s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 2s; animation-name: flipInX;">
                        <div class="service-icon">
                            <a href="#"> <img
                                    src="{{ asset('asset/font/images/good-man-icon/Kitchen Sink choke.png') }}"
                                    alt="" class="img-fluid">
                                <p>Kitchen Sink Choke</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="choose-area mt-5 pt-5"
            style="background-image:url({{ asset('asset/font/images/parallax-background/choose-bg.jpg') }});">
            <div class="container">
                <div class="choose-image-box">
                    <img src="{{ asset('asset/font/images/mobile-app.png') }}" alt="Awesome Image">
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="single-choose-box left">
                            <div class="icon">
                                <div class="count">03</div>
                                <span class="icon-award1"></span>
                            </div>
                            <div class="text">
                                <h3>Header Goes Here</h3>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint voluptatem
                                    quia.</p>
                                <a href="#">Read More</a>
                            </div>
                            <div class="overlay-count">03</div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="choose-content">
                            <div class="sec-title-style2">
                                <span>Features &amp; Advantages</span>
                                <div class="title clr-white">Reason For Choosing Us</div>
                                <div class="decor"><span></span></div>
                                <div class="text">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint
                                        voluptatem quia.</p>
                                </div>
                            </div>
                            <div class="inner-content">
                                <!--Start Single Choose Box-->
                                <div class="single-choose-box">
                                    <div class="icon">
                                        <div class="count">01</div>
                                        <span class="icon-builder"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Header Goes Here</h3>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint
                                            voluptatem quia.</p>
                                        <a href="#">Read More</a>
                                    </div>
                                    <div class="overlay-count">01</div>
                                </div>
                                <!--End Single Choose Box-->
                                <!--Start Single Choose Box-->
                                <div class="single-choose-box">
                                    <div class="icon">
                                        <div class="count">02</div>
                                        <span class="icon-cost"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Header Goes Here</h3>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint
                                            voluptatem quia.</p>
                                        <a href="#">Read More</a>
                                    </div>
                                    <div class="overlay-count">02</div>
                                </div>
                                <!--End Single Choose Box-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--Start Latest Project Style2 Area-->
        <section class="latest-project-style2-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-carousel owl-carousel owl-theme style1">
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Air-Conditioning Works.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Air-Conditioning Works.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Air Condition Works</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Drilling Floor Holes.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Drilling Floor Holes.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Drilling Floor Holes</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Installing Ceiling Light.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Installing Ceiling Light.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Installing Celling Light</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->

                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Installing Power Points _ Switches.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Installing Power Points _ Switches.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Installing Power Switches</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Installing Shower Mixer.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Installing Shower Mixer.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Installing Shower Mixer</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Installing the Ceiling Fan.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Installing the Ceiling Fan.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Installing the Celling Fan</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->

                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Painting Works.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Painting Works.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Painting Works</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Plumbing Works.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Plumbing Works.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Plumbing Works</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                            <!--Start single project style2-->
                            <div class="single-project-style2">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('asset/font/images/Polishing Marble Floor.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                    <div class="overlay-content">
                                        <div class="inner-content">
                                            <div class="links-box">
                                                <ul>
                                                    <li><a href="#"><span class="icon-chain"></span></a></li>
                                                    <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                            href="images/Polishing Marble Floor.png">
                                                            <span class="icon-search"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-box">
                                        <h3><a href="#">Pollishing Marble Floor</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End single project style2-->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--End Latest Project Style2 Area-->
        <footer class="footer-area mt-5">
            <div class="footer-shape-bg wow slideInRight animated" data-wow-delay="300ms" data-wow-duration="2500ms"
                style="visibility: visible; animation-duration: 2500ms; animation-delay: 300ms; animation-name: slideInRight;">
            </div>
            <div class="container">
                <div class="row">
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-5 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="title">
                                <h3>About Company</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <div class="footer-company-info-text">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam optio culpa, quo
                                    cupiditate ipsa accusantium maxime maiores earum. Accusantium nobis odit porro eum
                                    soluta quidem totam sit libero cupiditate aspernatur.</p>
                                <a class="btn-two" href="#">More About Company<span
                                        class="icon-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-7 col-sm-12">
                        <div class="single-footer-widget useful-links-box marbtm50">
                            <div class="title">
                                <h3>Useful Links</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <div class="usefull-links">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Residential</a></li>
                                            <li><a href="#">Commercial</a></li>
                                            <li><a href="#">News</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <ul>
                                            <li><a href="#">Contact us</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                            <li><a href="#">FAQ</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget pdbtm50">
                            <div class="title">
                                <h3>News &amp; Updates</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <ul class="recent-news">
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('asset/font/images/footer/recent-news-1.jpg') }}"
                                            alt="Awesome Image">
                                        <div class="overlay-style-one bg1">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span
                                                            class="icon-link1"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>March 10, 2019</p>
                                        <h5><a href="#">Creating drama and<br> feeling with...</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('asset/font/images/footer/recent-news-2.jpg') }}"
                                            alt="Awesome Image">
                                        <div class="overlay-style-one bg1">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span
                                                            class="icon-link1"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>March 02, 2019</p>
                                        <h5><a href="#">Wondering if interior<br> design is dying...</a></h5>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget">
                            <div class="title">
                                <h3>Newsletter</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <div class="subscribe-box">
                                <div class="text">
                                    <p><span>*</span>Subscribe us &amp; get latest updates.</p>
                                </div>
                                <form class="subscribe-form" action="#">
                                    <input type="email" name="email" placeholder="Your Email">
                                    <button type="submit">Subscribe<span class="flaticon-next"></span></button>
                                </form>
                                <div class="footer-social-links">
                                    <ul class="social-links-style1">
                                        <li>
                                            <a class="envelop" href="#"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="fb" href="#"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="tw" href="#"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="youtube" href="#"><i class="fa fa-youtube-play"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                </div>
            </div>
        </footer>

        <!--Start footer bottom area-->
        <section class="footer-bottom-area-style2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="footer-bottom-content-style2">
                            <div class="copyright-text-style2">
                                <p>COPYRIGHTS © 2021 ALL RIGHTS RESERVED BY CSS OFFICE PTE LTD</p>
                            </div>
                            <div class="footer-menu-style1">
                                <ul>
                                    <li><a href="#">Terms &amp; Condition</a></li>
                                    <li><a href="#">Private Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->




    </div>
    <script>
        new Typed('#typed', {
            strings: ['Service', 'Asistance', 'Facility'],
            typeSpeed: 80,
            delaySpeed: 90,
            loop: true
        });
    </script>

    <!-- Scroll Top Button -->
    <button class="scroll-top style2 scroll-to-target" data-target="html">
        <span>Top</span>
    </button>


    <script src="{{ asset('asset/font/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/font/js/appear.js') }}"></script>
    <script src="{{ asset('asset/font/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/isotope.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.enllax.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/owl.js') }}"></script>
    <script src="{{ asset('asset/font/js/validation.js') }}"></script>
    <script src="{{ asset('asset/font/js/wow.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/slick.js') }}"></script>
    <script src="{{ asset('asset/font/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
    <script src="{{ asset('asset/font/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('asset/font/html5lightbox/html5lightbox.js') }}"></script>

    <!--Revolution Slider-->
    <script src="{{ asset('asset/font/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('asset/font/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/main-slider-script.js') }}"></script>

    <!-- thm custom script -->
    <script src="{{ asset('asset/font/js/custom.js') }}"></script>




</body>

</html>
