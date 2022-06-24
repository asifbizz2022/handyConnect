@extends('frontend.layouts.app')

@section('content')  
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/news.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                      <h4>INDOOR HOME
                        MAKEOVER</h4>
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
<!--Start blog single area-->
<section id="blog-area" class="blog-single-area">
    <div class="container">
        <div class="row">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="blog-post">
                    <div class="single-blog-post">
                        <div class="top-text-box">
                           
                          <p>I have relatives and friends visiting during the festive seasons. How about a quick indoor
                            makeover so that your home gives them a refreshing look?</p>
                            <p>Make great impressions by performing a quick, hassle-free and low cost home makeover. By
                                completing small but visually impactful home repairs and improvements that put your best foot
                                forward. Start by taking a look around your house and list down the items that need fixing or
                                a brand new look. For great ideas, take a look at our list below:</p>
                        </div>
                        <div class="upgrades-quotes-box">
                           <h3>Quick Fixes </h3>
                           <br>
                      <p>Cabinets: Give them a new face lift with new modernized hardware for eg. door handles. For
                        doors that do not close properly, realign or readjust the doors and tighten the hinges.</p>
                        <p>Painting – Whole house or just the living room. New colours make the whole house look
                            more brand new.</p>
                        </div>
                        <div class="blog-single-image-box">
                           <img src="{{ asset('frontend/images/blog-images/Painting-min.jpg')}}" alt="" class="img-fluid" style="width: 300px;">   
                        </div>
                      <p>Shelves – For a more decluttered look and well decorated shelves can give a refreshing new
                        look.</p>

                        <h3>Cabinets – More organized and clutter-free</h3>
                            <div class="blog-single-image-box">
                                <img src="{{ asset('frontend/images/blog-images/Storeroom Racks-min.jpg')}}" alt="" class="img-fluid" style="width: 300px;">   
                             </div>
                             <div class="upgrades-quotes-box">
                               
                                <br>
                            
                            <h3>Storage Baskets – Nature inspired home décor helps beautify your homes</h3>
                            <div class="blog-single-image-box">
                                <img src="{{ asset('frontend/images/blog-images/Goodman_s Loft Images (7)-min.jpg')}}" alt="" class="img-fluid" style="width: 300px;">   
                             </div>

                             <h3>Bathroom Accessories – Can brighten up the bathroom.</h3>
                             <div class="blog-single-image-box">
                                 <img src="{{ asset('frontend/images/blog-images/bathroom-accesories.jpg')}}" alt="" class="img-fluid" style="width: 300px;">
                                 <p>We are just one call away – 9839 2229 or download our App today!</p>   
                              </div>
                              
                             </div>
                         
                        <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('frontend/images/apple-store.jpg') }}" alt="" style="width: 150px;" class="img-fluid">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('frontend/images/google-play.jpg') }}" alt="" style="width: 150px;" class="img-fluid">
                    </div>
                </div>
                <div class="backlinks">
                    <a href="{{ route('blog')}}"><i class="fa fa-arrow-left"></i> Back to news</a>
                </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    
</section> 
<!--End blog single area-->                                                                        
                                                                       

@endsection