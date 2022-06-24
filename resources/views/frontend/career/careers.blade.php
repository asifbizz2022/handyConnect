@extends('frontend.layouts.app')
@section('content')   

<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/career.jpg); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h1>Careers</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <div class="home-icon">
                            <a href="{{ route('home')}}"><span class="icon-home"></span></a>
                        </div>
                        <ul class="clearfix">
                            <li><a href="{{ route('home')}}">Home</a></li>
                            <li class="active">Careers</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area--> 
<div class="site-whatsapp">
    <a href="https://wa.me/6597388330" target="_blank"><img src="{{ asset('frontend/images/wp-logo.png') }}" alt=""></a>  
  </div>
<!--Start about area Style1-->
<section class="about-area-style1 secpd1">
    <div class="container">

        <h2 class="career-heading text-center">Job Openings</h2>
        <div class="job-open-list mb-5">
            <ul>
                <li><a href="#" data-toggle="modal" data-target="#myModal1">Plumber</a></li>
                <hr>
                <li><a href="#">Carpenter</a></li>
                <hr>
                <li><a href="#">Electrician</a></li>
                <hr>
            </ul>
        </div>
        <div class="modal modal-quote" id="myModal1">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Plumber</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                 <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui impedit, odio suscipit tenetur, sequi repudiandae quidem delectus perferendis dolor unde dolorum voluptatum voluptas? Quis illum vero assumenda commodi similique ducimus.</p>
                </div>
          
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
          
              </div>
            </div>
          </div>
        <form id="career-form" name="career_form" class="default-form" action="{{ route('career_mail')}}" method="post" enctype="multipart/form-data"  onsubmit ="alert('Your Application Submitted Successfully')">
            @csrf
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="about-style1-content">
                   
                    <div class="inner-content">
                     
                        <div class="input-box">   
                            <input type="text" name="name" value="" placeholder="Full Name" required="" class="form-control">
                            @error('name')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      	  @enderror
                        </div> 
                        <div class="input-box">   
                            <input type="text" name="email" value="" placeholder="Email" required="" class="form-control mt-3">
                           @error('email')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      	  @enderror
                        </div> 
                        <div class="input-box">    
                            <textarea style="height: 150px;" name="career_message" placeholder="Your Message..." required="" class="form-control mt-3"  aria-required="true"></textarea>
                           @error('career_message')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      	  @enderror
                        </div>
                    </div>    
                </div>   
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="about-style1-content">
                
                    <div class="inner-content">
                     
                        <div class="input-box">   
                            <input type="text" name="phone" value="" placeholder="Phone" required="" class="form-control">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div> 
                        <div class="input-box">   
                            <input type="text" name="career_subject" value="" placeholder="Subject" required="" class="form-control mt-3">
                          @error('career_subject')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div> 
 
                        <div class="input-box">   
                            <input type="text" name="position" value="" placeholder="Position" required="" class="form-control mt-3">
                         @error('position')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div> 
                        <div class="input-box">   
                            <label for="files" name="file" class="btn mt-3" style="border: 1px solid #e1e1e1;">Upload Your Resume</label>
                            <input id="files" style="visibility:hidden;" name="file" type="file">
                         @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div> 
                        <button type="submit" class="btn btn-primary btn-career btn-block mt-2">Submit</button>
                    </div>    
                </div>   
            </div>
         </div>
        </form> 
    </div>
</section>
<!--End about Area Style1-->
 @endsection