@extends('frontend.layouts.app')

@section('content')   

<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/news.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h1>News</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <div class="home-icon">
                            <a href="{{ route('home') }}"><span class="icon-home"></span></a>
                        </div>
                        <ul class="clearfix">
                            <li><a href="{{ route('blog') }}">Articles</a></li>
                            
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<div class="site-whatsapp">
    <a href="https://wa.me/6597388330" target="_blank"><img src="{{ asset('frontend/images/wp-logo.png')}}" alt=""></a>  
  </div>
<!--Start blog area-->
<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="blog-post">
                    <div class="row clearfix">
                        <!--Start single blog post-->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('frontend/images/blog-images/Elderly-min.jpg')}}" alt="Awesome Image">
                                    </div>
                                
                                    
                                </div>
                                <div class="text-holder">
                                    <div class="text">
                                        <h3 class="blog-title"><a href="{{ route('aging_parents') }}">8 HOME MODIFICATIONS FOR YOUR AGING PARENTS</a></h3>
                                        
                                    </div> 
                                    <div class="meta-box">
                                        <ul class="meta-info">
                                            <li><a href="{{ route('aging_parents') }}">Read More</a></li>
                                            
                                        </ul>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End single blog post-->
                        <!--Start single blog post-->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('frontend/images/blog-images/home-repair.jpg')}}" alt="Awesome Image">
                                    </div>
                                
                                    
                                </div>
                                <div class="text-holder">
                                    <div class="text">
                                        <h3 class="blog-title"><a href="{{ route('home_repair') }}">DO YOU NEED HOME REPAIRS BEFORE YOU SELL?</a></h3>
                                        
                                    </div> 
                                    <div class="meta-box">
                                        <ul class="meta-info">
                                            <li><a href="{{ route('home_repair') }}">Read More</a></li>
                                            
                                        </ul>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End single blog post-->
                        <!--Start single blog post-->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('frontend/images/blog-images/small-bathroom.jpg')}}" alt="Awesome Image">
                                    </div>
                                
                                    
                                </div>
                                <div class="text-holder">
                                    <div class="text">
                                        <h3 class="blog-title"><a href="{{ route('small_bathroom') }}">SMALL BATHROOM STORAGE <br> IDEAS</a></h3>
                                        
                                    </div> 
                                    <div class="meta-box">
                                        <ul class="meta-info">
                                            <li><a href="{{ route('small_bathroom') }}">Read More</a></li>
                                            
                                        </ul>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End single blog post-->
                        
                    </div>
                    <div class="row clearfix">
                        <!--Start single blog post-->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('frontend/images/blog-images/puppy.jpg')}}" alt="Awesome Image">
                                    </div>
                                
                                    
                                </div>
                                <div class="text-holder">
                                    <div class="text">
                                        <h3 class="blog-title"><a href="{{ route('puppy_protect') }}">I HAVE A NEW PUPPY. HOW CAN I PROTECT MY HOME?
                                        </a></h3>
                                        
                                    </div> 
                                    <div class="meta-box">
                                        <ul class="meta-info">
                                            <li><a href="{{ route('puppy_protect') }}">Read More</a></li>
                                            
                                        </ul>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End single blog post-->
                        <!--Start single blog post-->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('frontend/images/blog-images/Shower Curtain-min.jpg')}}" alt="Awesome Image">
                                    </div>
                                
                                    
                                </div>
                                <div class="text-holder">
                                    <div class="text">
                                        <h3 class="blog-title"><a href="{{ route('install_shower') }}">REASONS TO INSTALL A SHOWER DOOR</a></h3>
                                        
                                    </div> 
                                    <div class="meta-box">
                                        <ul class="meta-info">
                                            <li><a href="{{ route('install_shower') }}">Read More</a></li>
                                            
                                        </ul>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End single blog post-->
                        <!--Start single blog post-->
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{ asset('frontend/images/blog-images/Storeroom Racks-min.jpg')}}" alt="Awesome Image">
                                    </div>
                                
                                    
                                </div>
                                <div class="text-holder">
                                    <div class="text">
                                        <h3 class="blog-title"><a href="{{ route('home_organization') }}">HOME ORGANIZATION <br> TIPS</a></h3>
                                        
                                    </div> 
                                    <div class="meta-box">
                                        <ul class="meta-info">
                                            <li><a href="{{ route('home_organization') }}">Read More</a></li>
                                            
                                        </ul>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End single blog post-->
                        
                    </div>
                    <div class="row">
                             <!--Start single blog post-->
                             <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="img-holder">
                                        <div class="inner">
                                            <img src="{{ asset('frontend/images/blog-images/Storeroom Racks-min.jpg')}}" alt="Awesome Image">
                                        </div>
                                    
                                        
                                    </div>
                                    <div class="text-holder">
                                        <div class="text">
                                            <h3 class="blog-title"><a href="{{ route('indor_home_makeover') }}">INDOOR HOME <br> MAKEOVER
                                            </a></h3>
                                            
                                        </div> 
                                        <div class="meta-box">
                                            <ul class="meta-info">
                                                <li><a href="{{ route('indor_home_makeover') }}">Read More</a></li>
                                                
                                            </ul>  
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!--End single blog post-->
                    </div>
                </div>
                
            </div>
            
           

        </div>
    </div>
</section>
<!--End blog area-->

@endsection