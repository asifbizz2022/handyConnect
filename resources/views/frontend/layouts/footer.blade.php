

<footer class="footer-area mt-5">
    <div class="footer-shape-bg wow slideInRight animated" data-wow-delay="300ms" data-wow-duration="2500ms" style="visibility: visible; animation-duration: 2500ms; animation-delay: 300ms; animation-name: slideInRight;"></div>
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget-style3 marbtm-50">
                    <div class="footer-logo">
                        <a href="{{ route('home')}}"><img src="{{ asset('frontend/images/logo.png')}}" alt="Footer Logo"></a>    
                    </div>
                    
                    <div class="footer-social-links">
                        <ul class="social-links-style2">
                            
                            <li>
                                <a class="fb" href="https://www.facebook.com/HandyConnect.SG/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                            </li>
                           
                            <li>
                                <a class="envelop" href="https://www.instagram.com/handyconnect.sg/?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
                            </li>
                           
                            <li>
                                <a class="mail" href="mailto:hello@handyconnect.com.sg"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a class="youtube" href="https://wa.me/6598392229" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <a href="#"><img src="{{ asset('frontend/images/google-play.jpg')}}" alt="" class="img-fluid"></a>
                        </div>
                        <div class="col-md-6">
                            <a href="#"><img src="{{ asset('frontend/images/apple-store.jpg')}}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget useful-links-box marbtm50">
                    <div class="title">
                        <h3>Our Information
                            </h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <ul class="contact-details">
                        <li>
                            <h5 style="color: #b49f64;">Address</h5>
                            <p> 1 Pemimpin Drive #04-01/02 One Pemimpin S’pore 576151
                            </p>
                        </li>
                        <li>
                            <h5 style="color: #b49f64;">Phone</h5>
                           <p>+65 9839 2229</p>
                        </li>
                        <li>
                            <h5 style="color: #b49f64;">Email</h5>
                            <p>hello@handyconnect.com.sg</p>
                        </li>      
                    </ul>
                </div>
            </div>
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
                                    <li><a href="{{ route('about_us') }}">About us</a></li>
                                    <li><a href="{{ route('services') }}">Service</a></li>
                                    <li><a href="{{ route('blog') }}">News</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                    <li><a href="{{ route('careers') }}">Careers</a></li>
                                    <li><a href="{{ route('faqs')}}">FAQ</a></li>
                                    
                                </ul>    
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget">
                    <div class="title">
                        <h3>Enquiry</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <div class="subscribe-box">
                        <div class="text">
                            <!-- <p><span>*</span>Subscribe us &amp; get latest updates.</p> -->
                        </div>
                        <form method="post" class="subscribe-form" action="{{ route('enquiry_mail') }}">
                            @csrf
                            <input type="email" name="email" required  placeholder="Your Email">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            <button type="submit">Enquire Now<span class="flaticon-next"></span></button>
                        </form>
                        
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
                          
                            <li><a href="terms-condition-faq.html">Privacy Policy</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
<!--End footer bottom area--> 

</div> 
