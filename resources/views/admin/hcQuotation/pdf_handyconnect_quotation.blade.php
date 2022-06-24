    @extends('admin.layouts.main')
@section('content')
 <form method="POST" action="{{ route('hc-make-pdf-handyconnect') }}">
    @csrf
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
        data-menu="vertical-menu-modern" data-col="2-columns"> 
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-12 mb-2 mt-1">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">
                                    HandyConnect </h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('role.list')
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box col-md-12 mx-auto py-2"> 
                        <div class="justify-content-around p-1" >
                            <img src="{{ url('logo/logo.png') }}" alt="asd" style="width:30%; height: 30%;">
                            
                           
                        </div> 
                    
                        <hr>
                       
                        <div class="row"> 
                            <div class="col">
                                <div>
                                    <strong>Date : </strong>
                                    <span>{{ date('m d Y') }}</span>
                                </div>
                                <div>
                                    <strong>Person Name :</strong>
                                    <span>
                                    <input type="text" name="date" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Address :</strong>
                                    <span>
                                    <input type="text" name="customer-address" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Postal Code: </strong>
                                    <span>
                                    <input type="text" name="postal-code" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>  
                            </div>
                            <div class="col">
                                <div>
                                    <strong>Quotation/CONTRACT NO : </strong>
                                    <span>
                                    <input type="text" name="contract-no" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Company Reg No :</strong>
                                    <span>
                                    <input type="text" name='co-reg-no' class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Payment Terms : </strong>
                                    <span>
                                    <input type="text" name="payment-terms" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>  
                            </div>
                        </div> <hr>
                        <div class="row">
                            <div class="col"> 
                                
                                 <div class="mt-1">
                                  
                                    <strong>Company: </strong>
                                   <select class="form form-control" name="company"   >
                                      @foreach($companies as $company) 
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                       @endforeach
                                    </select> 
                                    
                                   <!--  <input type="text" name="residential-value" value="" class="form-control form-sm border-top-0 border-left-0 border-right-0 rounded-0">  
                                 --></div>

                                <div class="mt-1">
                                    <strong>Handy Connect Category : </strong> 
                                     <select class="form form-control" name="categories"   >
                                      @foreach($categories as $cat) 
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                       @endforeach
                                    </select> 
                                  <!--   
                                    <input type="text" name="type-of-work" value="" class="form-control form-sm border-top-0 border-left-0 border-right-0 rounded-0">  -->
                                </div>
                                <div class="mt-1">
                                    <strong>Handy Connect Service: </strong>
                                     <select class="form form-control" name="service"   >
                                     @foreach($services as $service) 
                                        <option value="{{$service->id}}">{{$service->service_name}}</option>
                                       @endforeach
                                   </select>
                                   <!--  <input type="text" name="scope-of-work" value=" " class="form-control form-sm border-top-0 border-left-0 border-right-0 rounded-0"> -->
                                </div>
                            </div>
                        </div> 
                        <br>
                         <div class="row">
                             <div class="col">
                                 <button type="submit" class="btn btn-primary">
                                <i class="fa fa-download"></i>    
                                 Generate Pdf</button>
                             </div>
                         </div>
                    </div>
               </div>
             </div>
        </div>
    </body>
</form>
@endsection
