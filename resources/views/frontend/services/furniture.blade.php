@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.breadcrumbs')


<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>Furniture Assembly</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                      <li>For any furniture purchased online</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/Furniture Assembly/Furniture-Assembly.jpg') }}" alt="" class="img-fluid">
                    </div>
                    
                    
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection