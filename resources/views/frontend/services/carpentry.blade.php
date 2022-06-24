@extends('frontend.layouts.app')
@section('content')   
@include('frontend.layouts.breadcrumbs')

<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>Carpentry Services</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                        <li> Repairing/Replacing Cabinet Doors
                            </li>
                            <li>Installing Door Handles</li>
                                <li>Adjusting Hinges</li>
                                    <li>Varnishing Furniture</li>
                                   <li>Installing Shelves & Picture Frames</li>
                                   <li>Installing Bathroom Accessories & Curtain
                                    Rods</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Carpentry/Carpentry1.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Carpentry/Dish Rack.png')}}" alt="" class="img-fluid">
                    </div>
                    
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
