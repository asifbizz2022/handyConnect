@extends('frontend.layouts.app')
@section('content')   
@include('frontend.layouts.breadcrumbs')
<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>Electrical Services</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                        <li>Installing Water Heaters</li>
                        <li>Installing Door Bells</li>
                        <li>Installing Ceiling Fans
                            and Lights</li>
                        <li>Installing LED Lights</li>
                        <li>Installing Closed-Circuit
                            TV</li>
                        <li>Replacing Light Bulbs &
                            Transformers</li>
                        <li>And Many More…</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Electrical/Electrical1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Electrical/Electrical2.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Electrical/Electrical3.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row mt-4">
                    
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Electrical/Electrical4.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Electrical/Electrical5.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
