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
                           <div class="row"> 
                            <div class="col-6">
                                <div>
                                    <strong>Date : </strong>
                                    <span>{{ date('m d Y') }}</span>
                                </div>
                                <div>
                                     <label>@lang('customer.customer') @lang('role.name')</label>
                                    <span>
                                     {{ @$data->customer_name }}
                                </div>
                                <div>
                                    <strong>Email :</strong>
                                    <span>
                                        {{ @$data->email }}
                                    </span>
                                </div>
                                <div>
                                    <strong>Address :</strong>
                                    <span>
                                    {{ @@$data->address }}
                                    {{ @$data->state }}
                                    {{ @$data->country }}
                                    </span>
                                </div>
                                <div>
                                    <strong>Postal Code: </strong>
                                    <span>
                                    {{ @$data->zip_code }}
                                    </span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div>
                                    <strong>Quotation NO : </strong>
                                    <span>
                                   {{ @$data->companies_name }}
                                    </span>
                                </div>
                                <div>
                                    <strong>Company Reg No :</strong>
                                    <span>
                                     {{ @$data->companies_name }}

                                    </span>
                                </div>
                               <!--  <div>
                                    <strong>Payment Terms : </strong>
                                    <span>
                                     
                                    </span>
                                </div>  --> 
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