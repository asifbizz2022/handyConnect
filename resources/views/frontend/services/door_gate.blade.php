@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.breadcrumbs')

<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>Door & Gate</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                      <li>Lock Replacement</li>
                      <li>Handle/Knob Replacement
                    </li>
                    <li>Hinge Replacement
                    </li>
                    <li>Replacement of Bathroom & Kitchen Doors</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/NAVIGATION TAB/Door-and-Gate.jpg') }}" alt="" class="img-fluid">
                    </div>
                    
                    
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection