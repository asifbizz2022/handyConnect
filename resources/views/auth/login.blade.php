<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Handy Connect</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
    <!-- Favicon -->
   
    <link rel="icon" type="image/png" href="{{ url('frontend/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>

    <!-- this is google font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Tinos:wght@700&display=swap" rel="stylesheet">

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    
</head>
<body>
<!--Start login register area-->
<section class="login-register-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                <div class="form form-login">
                    <div class="shop-page-title">
                        <div class="title text-center">Login Now</div>
                    </div>
                    <div class="row">
                         <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-xl-12">
                                <div class="input-field">
                                    <input type="text" name="email" placeholder="Enter Email *">
                                    <div class="icon-holder">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>    
                            </div> 
                            
                            <div class="col-xl-12">
                                <div class="input-field">
                                    <input type="text" name="password" placeholder="Enter Password">
                                    <div class="icon-holder">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </div>
                                </div>    
                            </div>
                           
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                        <div class="remember-text">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="remember" type="checkbox">
                                                    <span>Remember Me</span>
                                                </label>
                                            </div>  
                                        </div>
                                       
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-sm-12">
                                        <button class="shop-btn btn-block" type="submit">Login Now</button>
                                       
                                    </div>
                                   
                                </div>   
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-sm-12 mt-4">
                                <p class="text-center">OR LOGIN WITH</p>
                                <ul class="social-icon">
                                    
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus gplus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </form>    
                    </div>
                </div>    
            </div>
            
          
            
        </div>
    </div>
</section>      
<!--End login register area-->
</body>
<script>
    new Typed('#typed',{
    strings : ['Service', 'Services'],
    typeSpeed : 180,
    delaySpeed : 190,
    loop : true
  });
</script>

<!-- Scroll Top Button -->
<button class="scroll-top style2 scroll-to-target" data-target="html">
    <span>Top</span>
</button>

<script src="{{ asset('frontend/js/jquery.js')}}"></script>
<script src="{{ asset('frontend/js/appear.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/isotope.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.easing.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.enllax.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.mixitup.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.paroller.min.js')}}"></script>
<script src="{{ asset('frontend/js/owl.js')}}"></script>
<script src="{{ asset('frontend/js/validation.js')}}"></script>
<script src="{{ asset('frontend/js/wow.js')}}"></script>

<script src="{{ asset('frontend/assets/language-switcher/jquery.polyglot.language.switcher.js')}}"></script>
<script src="{{ asset('frontend/assets/timepicker/timePicker.js')}}"></script>                       
<script src="{{ asset('frontend/assets/html5lightbox/html5lightbox.js')}}"></script>
<!-- jQuery ui js -->
<script src="{{ asset('frontend/assets/jquery-ui-1.11.4/jquery-ui.js')}}"></script>
<!--Revolution Slider-->
<script src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{ asset('frontend/js/main-slider-script.js')}}"></script>

<!-- thm custom script -->
<script src="{{ asset('frontend/js/custom.js')}}"></script>
</body>
</html>