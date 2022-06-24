@extends('frontend.layouts.app')

@section('content')

   
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/news.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h4>8 HOME MODIFICATIONS FOR YOUR AGING PARENTS</h4>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area--> 
<div class="site-whatsapp">
    <a href="https://wa.me/6597388330" target="_blank"><img src="images/wp-logo.png" alt=""></a>  
  </div>
<!--Start blog single area-->
<section id="blog-area" class="blog-single-area">
    <div class="container">
        <div class="row">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="blog-post">
                    <div class="single-blog-post">
                        <div class="top-text-box">
                           
                            <p>As the baby boomer generation gets older, planning home modifications to ensure easy “aging
                                in place” gets challenging but important. Almost 90% of seniors want to stay in their current
                                homes as they age. They would prefer to stay within their own homes. Are your parents feeling
                                the same too? To create the most comfortable and safest environment, you will need a good
                                plan for modification work to take place.</p>
                                <p>To help with the planning process, we have listed eight of the most important home upgrades
                                    to help your family take care of the elderly as they enjoy their retirement years in the comfort
                                    of their own homes.</p>
                            
                        </div>
                        <div class="upgrades-quotes-box">
                           <h3>1. Replace Cabinet and Door Handles</h3>
                           <br>
                           <p>Traditional knobs may prove to be more difficult for people with arthritis to grasp firmly and the
                            twisting motions can prove to be rather challenging for them. Choose lever handles that allow
                            people with all abilities to easily open and close their cabinets or doors, and the hardware can
                            look just as stylish as any other handle. A small modification like this can keep life moving at
                            a normal pace for anyone who is feeling a little stiffer with age.</p>
                        </div>
                        <div class="blog-single-image-box">
                           <img src="images/blog-images/Door Lever Handle-min.jpg" alt="" class="img-fluid" style="width: 300px;">   
                        </div>

                        <div class="upgrades-quotes-box">
                            <h3>2. Install Grab Bars and Railings</h3>
                            <br>
                           <p>Typically, grab bars are installed in the shower areas or near the toilet seating areas. They
                            are simple devices that make a difference to ensure safety of the elderly or handicapped. They
                            help to stabilize as they maneuver and offer a good handhold for a moment of rest. Grab bars
                            require proper installation so they can safely bear the weight of the person holding onto them. Finding an expert handyman for the job is thus very important. Consider adding grab bars
                            around the house for better safety precaution to prevent falls</p>
                         </div>
                         <div class="blog-single-image-box">
                            <img src="images/blog-images/Grab Bars-min.jpg" alt="" class="img-fluid" style="width: 300px;">   
                         </div>
                         <div class="upgrades-quotes-box">
                            <h3>3. Make Showering Convenient and Safe</h3>
                            <br>
                           <p>In addition to installing grab bars, installing corner seats in the shower area provides another
                            layer of safety and precaution. The seat allows anyone who is feeling uneasy standing on their
                            feet a place to sit and rest while they shower. </p>
                         </div>
                         <div class="blog-single-image-box">
                            <img src="images/blog-images/Shower Seat-min.jpg" alt="" class="img-fluid" style="width: 300px;">   
                         </div>
                         <div class="upgrades-quotes-box">
                            <h3>4. Anti-Slip Floor Tiles</h3>
                            <br>
                           <p>According to research, the leading cause of accidental death in the home after the age of 65
                            is falls. Many of these falls occur in the kitchen or toilets and it is easy to see why. Hazards
                            include carrying heavy pans, unnoticed spills, slippery wet surfaces cause one to fall easily.
                            Consider getting no-glare, non-slip tiles with rough surfaces to ensure a safe, easy to maintain
                            and simple to clean surfaces.</p>
                         </div>
                         <div class="blog-single-image-box">
                            <img src="images/blog-images/Rough Floor Tiles-min.jpg" alt="" class="img-fluid" style="width: 300px;">   
                         </div>
                         <div class="upgrades-quotes-box">
                            <h3>5. Widen Doorways
                            </h3>
                            <br>
                           <p>Narrow doorways are a difficult obstacle for wheelchair users and anyone such as family or
                            nurse who may be assisting your parents on a daily basis. The door widening upgrade is an
                            important one but it is a job that requires some expertise. 
                            </p>
                         </div>


                         <div class="upgrades-quotes-box">
                            <h3>6. Lowering Light Switches</h3>
                            <br>
                         <p>Lowering light switches below the standard height and within reach of anyone who needs to
                            touch the switches from their wheelchairs. Speak to our handyman today!</p>
                         </div>
                         <div class="blog-single-image-box">
                            <img src="images/blog-images/Switches-min.jpg" alt="" class="img-fluid" style="width: 300px;">   
                         </div>
                       
                        
                    </div>
                          
                    <h2>
                        How much do these projects cost?
                    </h2>
              <p>For most accurate job estimates, do approach HandyConnect for more details for example,
                how big is your floor area? What is the movement like around the house? How many switches
                require changes etc. For a more extensive renovation work needed, kindly approach
                Goodman Interior – our interior design and renovation service under the Goodman group.</p>
                <h3>Download our App Today!</h3>
                <p>Get your elderly or anyone needing this App to reach our Handyman directly!</p>
                  
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
<!--End blog single area-->                                                                        
@endsection