@extends('frontend.layouts.app')

@section('content')  
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/news.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h4>REASONS TO INSTALL A SHOWER DOOR</h4>
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
                           
                          <p>When you are renovating a bathroom, one of the factors to consider is replacing or changing
                            your shower door or shower curtain. While a shower curtain may be the most appealing short
                            term cost option, it can result in additional expenses and problems in the long run.
                            </p>
                            <p>Disadvantages of installing a shower curtain:</p>
                        </div>
                        <div class="upgrades-quotes-box">
                           <h3>Maintenance and Upkeep </h3>
                           <br>
                         <p>Shower curtains need to be cleaned and maintained to prevent mould and mildew buildup.
                            This could mean washing your curtain with soap and water every week or replacing it every
                            several months to avoid constantly washing it.</p>
                        </div>
                        <div class="blog-single-image-box">
                           <img src="{{ asset('frontend/images/blog-images/Shower Curtain-min.jpg')}}" alt="" class="img-fluid" style="width: 300px;">   
                        </div>

                        <div class="upgrades-quotes-box">
                            <h3>Utilizing Floor Mats or Daily Towel C
                            </h3>
                            <br>
                       <p>Shower curtains tend to leave a wet mess on the floor after a shower, requiring extra clean up
                        time. Failing to clean up the wet area after a shower could result in mould and mildew on the
                        outside of your shower. Shower screens contain water more neatly than shower curtains.</p>
                         </div>
                         
                         <div class="upgrades-quotes-box">
                            <h3>Shower Curtains vs Shower Screens</h3>
                            <br>
                       <p>Shower curtains take away the modern look of your bathroom. If you are looking for a more
                        modern, classic look in your bathroom, consider installing a shower screen instead. Unless
                        you are prepared to keep up with the cleaning and maintenance, shower curtains can affect
                        the look and feel of your bathroom. The variety of designs that shower screens have can add
                        to overall aesthetic look of your bathroosm. The process of installing a shower screen can
                        vary depending on the layout of your bathroom. Need more advice? Let us help!</p>
                        <p>Get connected with our HandyConnect App to log in a case and we will contact you to resolve
                            the problem!</p>
                            <div class="blog-single-image-box">
                                <img src="{{ asset('frontend/images/blog-images/Shower Screen-min.jpg')}}" alt="" class="img-fluid" style="width: 300px;">   
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