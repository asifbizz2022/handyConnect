@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.breadcrumbs')


<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontendimages/slider/banner/SERVICES.png); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="inner-content clearfix">
                   
                        <div class="title">
                           <h1> Air-Conditioning
                        </h1>
                        </div>
                        <div class="breadcrumb-menu">
                            <div class="home-icon">
                                <a href="{{ route('home') }}"><span class="icon-home"></span></a>
                            </div>
                            <ul class="clearfix">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li class="active">Air-Conditioning
                                </li>
                            </ul>    
                        </div>
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

<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>Air-Conditioning</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                      <li>Sale of Air-Conditioners</li>
                      <li>Maintenance & Repair
                    </li>
                    <li>Regular Servicing
                    </li>
                   <li>VRV System</li>
                   <li>Installation & Duct Works</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/NAVIGATION TAB/Air-Conditioning1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/NAVIGATION TAB/Air-Conditioning2.jpg') }}" alt="" class="img-fluid">
                    </div>
                    
                    
                </div>
               
            </div>
        </div>
    </div>
</div>


@endsection