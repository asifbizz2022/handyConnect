@extends('frontend.layouts.app')
@section('content')   

<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/contact-us.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h1>Contact us</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <div class="home-icon">
                            <a href="{{ route('home') }}"><span class="icon-home"></span></a>
                        </div>
                        <ul class="clearfix">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Contact</li>
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
 
<!--Start contact form area-->
<section class="contact-info-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="sec-title-style1 float-left">
                                <div class="title">Send Your Message</div>
                                <div class="text"><div class="decor-left"><span></span></div><p>Contact Form</p></div>
                            </div>
                            <div class="text-box float-right">
                                <p>Looking for a Handyman? Our team is ready to assist you!</p>
                            </div>
                        </div> 
                    </div>   
                    <div class="inner-box">
                        <form id="contact-form" name="contact_form" class="default-form" action="{{ route('contact_email')}}" method="post" onsubmit ="alert('Thank You For Contact Us')">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-box">   
                                                <input type="text" name="first_name" value="" placeholder="First name" required="">
                                            @error('first_name')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            </div> 
                                            <div class="input-box"> 
                                                <input type="email" name="email" value="" placeholder="Email" required="">
                                             @error('email')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box"> 
                                                <input type="text" name="last_name" value="" required placeholder="Last Name">
                                             @error('last_name')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="input-box"> 
                                                <input type="text" name="phone" value="" required placeholder="Phone">
                                             @error('phone')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            </div> 
                                        </div>  
                                    </div> 
                                    <div class="row">
                                         <div class="col-xl-12">
                                            <div class="input-box"> 
                                                <input type="text" name="contact_subject" required value="" placeholder="Subject">
                                              @error('contact_subject')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror   
                                            </div>     
                                        </div> 
                                    </div>   
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="input-box">    
                                        <textarea name="contact_message" placeholder="Your Message..." required=""></textarea>
                                         @error('contact_message')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="button-box">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button type="submit" >Send Message<span class="flaticon-next"></span></button>    
                                    </div>         
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--End contact form area-->

<!--Start Contact Address Area-->
<section class="contact-address-area">
    <div class="container-fluid">
       
        <div class="row no-gutters">
            <div class="col-md-9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d112044.63941097634!2d179.92996215820315!3d28.64788980000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19c00785ce17%3A0x2fba503efd4bb8da!2sA1%20Handyman%20Singapore!5e0!3m2!1sen!2sin!4v1643943871607!5m2!1sen!2sin" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-3">
                    <!--Start Single Contact Address Box-->
                   <div class="single-contact-address-box main-branch">
                    <h3>Main Branch</h3>
                    <div class="inner">
                        <ul>
                            <li>
                                <div class="title">
                                    <h4>Address:</h4>
                                </div>
                                <div class="text">
                                    <p>1 Pemimpin Drive #04-02 One Pemimpin, Singapore 576151</p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <h4>Phone:</h4>
                                </div>
                                <div class="text">
                                    <p>+65 9839 2229</p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <h4>Email:</h4>
                                </div>
                                <div class="text">
                                <p>hello@handyconnect.com.sg</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--End Single Contact Address Box-->
                </div>
                   
              
            </div>
        </div>
    </div>
</section>  
<!--End Contact Address Area-->  
@endsection