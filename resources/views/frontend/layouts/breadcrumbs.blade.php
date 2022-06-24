<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/slider/banner/SERVICES.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="inner-content clearfix">
                    @if(isset($title))
                        <div class="title">
                           <h1> {{ $title }}</h1>
                        </div>
                        <div class="breadcrumb-menu">
                            <div class="home-icon">
                                <a href="{{ route('home') }}"><span class="icon-home"></span></a>
                            </div>
                            <ul class="clearfix">
                     @if(isset($sub_title))
                                <li><a href="{{ route('home')}}">{{ $sub_title}}</a></li>
                    @endif
                                <li class="active">{{ $title }}</li>
                    @endif
                            </ul>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--End breadcrumb area-->
<div class="site-whatsapp">
    <a href="https://wa.me/6597388330" target="_blank"><img src="{{ asset('frontend/images/wp-logo.png')}}" alt=""></a>  
  </div>
