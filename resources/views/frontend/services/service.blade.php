@extends('frontend.layouts.app')
@section('content')   
@include('frontend.layouts.breadcrumbs')

<section class="site-service mt-5 pt-5 mb-5">
    <div class="container">
        <div class="sec-title-style2 text-center">
            <span>Our Services</span>
            <div class="title">What We Do For You</div>
            <div class="decor center"><span></span></div>
           
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('electricals')}}"><img src="{{ asset('frontend/images/main-services/Handyconnect/Electrical/Electrical1.jpg')}}" alt="">
                    <p>Electrical</p>
                </a>    
                    
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('plumbing')}}"> <img src="{{ asset('frontend/images/main-services/Handyconnect/Plumbing/Plumbing1.jpg')}}" alt="">
                    <p>Plumbing</p>
                </a>
                   
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('carpentry')}}">  <img src="{{ asset('frontend/images/main-services/Handyconnect/Carpentry/Carpentry1.jpg')}}" alt="">
                    <p>Carpentry</p>
                </a>
                  
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('painting')}}"><img src="{{ asset('frontend/images/main-services/Handyconnect/Painting/Painting1.jpg')}}" alt="">
                    <p>Painting</p>
                </a>
                    
                    
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <div class="service-main"> <a href="{{route('furniture') }}"><img src="{{ asset('frontend/images/main-services/Handyconnect/Furniture Assembly/Furniture-Assembly.jpg')}}" alt="">
                    <p>Furniture Assembly
                    </p>
                </a>    
                    
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('door_gate')}}"> <img src="{{ asset('frontend/images/main-services/Handyconnect/NAVIGATION TAB/Door-and-Gate.jpg')}}" alt="">
                    <p>Door and Gate</p>
                </a>
                   
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('air_condition') }}">  <img src="{{ asset('frontend/images/main-services/Handyconnect/NAVIGATION TAB/Air-Conditioning1.jpg')}}" alt="">
                    <p>Air-Conditioning</p>
                </a>
                  
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-main"> <a href="{{ route('maintenance_repair') }}"><img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/1.jpg')}}" alt="">
                    <p>Other Maintenance / Repair Work</p>
                </a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>



@endsection