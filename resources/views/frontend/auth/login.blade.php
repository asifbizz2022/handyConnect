@extends('frontend.layouts.app')
@section('content')   

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
                                    <input type="text" name="name" placeholder="Enter Username *">
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
@endsecction