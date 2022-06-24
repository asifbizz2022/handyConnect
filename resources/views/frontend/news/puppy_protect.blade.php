@extends('frontend.layouts.app')

@section('content')  
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/news.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h4>I HAVE A NEW PUPPY. HOW CAN I PROTECT MY HOME?</h4>
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
                           
                           <p>Create an environment that suits the needs of the new dog so they are not tempted by things
                            they should not be getting into. Follow the tips below and you will realise you do not need
                            many home repairs.</p>
                            
                        </div>
                        <div class="upgrades-quotes-box">
                           <h3>Get a Doggy Door </h3>
                           <br>
                          <p>Pet door installation can be a way to give your puppy more independence, and at the same
                            time free up the time spent having to let them out into the yard area. Do send your puppy for
                            training at the same time so that they will get used to things around the house.</p>
                        </div>
                        <div class="blog-single-image-box">
                           <img src="{{ asset('frontend/images/blog-images/Doggy Door-min.jpg')}}" alt="" class="img-fluid" style="width: 300px;">   
                        </div>

                        <div class="upgrades-quotes-box">
                            <h3>Watch the Floors
                            </h3>
                            <br>
                         <p>Flooring and wooden furniture tend to stain much quicker with a new puppy is around, so it is
                            important to have potty pads or cleaners around at all times. Urine can have a detrimental
                            effect on wooden floors since it can seep through underneath leading to warping. To protect
                            your floors, ensure your pet’s nails are trimmed often and toilet train your puppy as early as
                            possible.</p>
                         </div>
                         
                         <div class="upgrades-quotes-box">
                            <h3>Fix any Damage Right Away</h3>
                            <br>
                         <p>Make sure you don’t let chewed up walls or boards stay in your home unrepaired. It could lead
                            into a gaping one in no time and it can lead to other safety hazards. We, the professionals at
                            HandyConnect, know how to help. Contact us for more advice.</p>
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
    
</section> 
                                                                       
@endsection