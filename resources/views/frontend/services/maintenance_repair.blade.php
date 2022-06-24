@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.breadcrumbs')


<div class="container">
    <div class="emergency-repairs-box">
        <div class="title">
            <h2>MAINTENANCE/REPAIR</h2>
            
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="emergency-repairs-content">
                    <ul>
                     <li> Installing TV Brackets</li>
                     <li>Installing Grab Bars &
                        Railings</li>
                        <li>Laying of Floor Kerbs for
                            Wheelchairs</li>
                            <li>Disinfection & Sanitation</li>
                            <li>Installing Store Room Racks
                                & Shelves</li>
                                <li>Drywall Partitioning</li>
                                <li>Water Proofing Treatment</li>
                                <li>Sanding of Parquet</li>
                                <li>Polishing of Marble Floor &
                                    Counter Top</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/2.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/3.jpg') }}" alt="" class="img-fluid">
                    </div>
                    
                    
                </div>
                <div class="row mt-2">
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/4.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/5.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/6.jpg') }}" alt="" class="img-fluid">
                    </div>
                    
                    
                </div>
                <div class="row mt-2">
                    <div class="col-md-4 mb-2">
                        <img src="{{ asset('frontend/images/main-services/Handyconnect/repair-maintenaince/7.jpg') }}" alt="" class="img-fluid">
                    </div>
                  
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection