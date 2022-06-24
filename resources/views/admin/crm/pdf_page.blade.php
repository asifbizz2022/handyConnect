<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<p>
     <div class="justify-content-around p-1" >
            <img src="{{ url('logo/logo.png') }}" alt="asd" style="width:30%; height: 30%;">
     </div> 

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <strong>Person Name :</strong>
                                                        <span>{{ $customer_name}}</span> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <strong> Delivery Date:</strong>
                                                        <span>{{ date('m d Y') }}</span>                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>company:</label>
                                                        Goodman Enterprise Pte Ltd
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <h4>@lang('vendor.address')</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Address</label>
                                                        {{ $address }}
                                                        {{ $country }}
                                                        {{ $state }}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <h4>@lang('role.add') @lang('services.services')</h4>
                                        <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="download_label">{{ @$data->name }} @lang('services.service')
                                                @lang('role.list')</div>
                                            <table class="" id="service_list" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('services.service')</th>
                                                        <th>@lang('crm.quantity')</th>
                                                        <th>@lang('crm.uom')</th>
                                                        <th>@lang('services.tax')</th>
                                                        <th>@lang('services.price')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                                   
                           <div class="row"> 
                            <div class="col-6">
                                <div>
                                    <strong>Date : </strong>
                                    <span>{{ date('m d Y') }}</span>
                                </div>
                                <div>
                                    <strong>Person Name :</strong>
                                    <span>
                                    {{ $customer_name}}
                                    </span>
                                </div>
                                <div>
                                    <strong>Address :</strong>
                                    <span>
                                    {{ $address }}
                                    {{ $country }}
                                    {{ $state }}
                                    </span>
                                </div>
                                <div>
                                    <strong>Postal Code: </strong>
                                    <span>
                                    {{$zip_code}} 
                                    </span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div>
                                    <strong>Quotation NO : </strong>
                                    <span>
                                   {{ $company_name}}
                                    </span>
                                </div>
                                <div>
                                    <strong>Company Reg No :</strong>
                                    <span>
                                    {{ $company_name}}
                                    </span>
                                </div>
                                <div>
                                    <strong>Payment Terms : </strong>
                                    <span>
                                        -
                                    </span>
                                </div>  
                            </div>
                        </div> <hr>
                        <div class="row">
                            <div class="col"> 
                                
                                 <div class="mt-1">
                                    <strong>Company : </strong>
                                    
                                    <strong>Goodman Enterprise Pte Ltd</strong>
                                </div>

                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="download_label">{{ @$data->name }} @lang('services.service')
                                                @lang('role.list')</div>
                                            <table class="" id="service_list" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('services.service')</th>
                                                        <th>@lang('crm.quantity')</th>
                                                        <th>@lang('crm.uom')</th>
                                                        <th>@lang('services.tax')</th>
                                                        <th>@lang('services.price')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                        </div> 
                        </p>
</body>
</html>