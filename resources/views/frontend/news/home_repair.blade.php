@extends('frontend.layouts.app')

@section('content')  
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/news.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h4>DO YOU NEED HOME REPAIRS BEFORE YOU SELL?</h4>
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
                           
                            <p>Help me get my home ready for sale! There are tons of home repairs you could do to improve
                                the overall appeal of the home you are trying to sell. It is important to remember what areas
                                of your home are in urgent need of repair, then prioritize them so that you can achieve the
                                greatest return to the overall marketability of your home. There are both the minor and major
                                repair works to be done:</p>
                            
                        </div>
                        <div class="upgrades-quotes-box">
                           <h3>1. Minor Repairs</h3>
                           <br>
                         <p>Based on our experience of performing interior works for the past decade, we know that the
                            little minor repairs can really add to your house value. Simple touch ups like painting can boost
                            your overall appeal to prospective buyers</p>
                            <p>When painting, choose a neutral colour, like soft grey or lily white. A more neutral colour
                                backdrop helps people focus on your home’s best features for eg. TV feature wall, lightings
                                and false ceiling. Paint only the key areas inside your homes.</p>
                                <p>Polishing floor surfaces like marble and parquet can offer great value as well since replacing
                                    such floor surfaces cost thousands of dollars. It is also smart to get rid of any signs of cigarette
                                    burns or pet fur by thoroughly vacuuming and deodorizing.</p>
                                    <p>Another quick way to improve the way your home looks is to change to more trendy light
                                        fixtures to create “move-in ready” impression of your homes.</p>

                        <div class="upgrades-quotes-box">
                            <h3>2. Major Repairs</h3>
                            <br>
                          <p>Other major repairs may include repairing roof. However, unless it is in dire need of repair,
                            chances are no one is going to offer you a fair price if it remains unfixed. So if you have any
                            major work to do on your home’s structure, it is best to get them done before putting this list together. Still have questions on what could be done to your homes before selling? Contact us today!</p>
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