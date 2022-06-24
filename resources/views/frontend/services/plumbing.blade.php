@extends('frontend.layouts.app')
@section('content')   
@include('frontend.layouts.breadcrumbs')

<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>Plumbing Services</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                        <li> Changing Sink/Basin
                            Taps
                            </li>
                            <li>Clearing Toilet & Sink
                                Chokage</li>
                                <li>Replacing & Repairing
                                    Shower Sets</li>
                                    <li>Repairing All Leakages</li>
                                    <li>Repairing Water Closet
                                        Flushing Systems &
                                        Leakage</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Plumbing/Plumbing1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Plumbing/Plumbing2.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Plumbing/Plumbing3.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
