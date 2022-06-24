@extends('admin.layouts.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                        Add Quotation
                     </h5>
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                           <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                              class="bx bx-home-alt"></i></a>
                           </li>
                           <li class="breadcrumb-item active text-capitalize">Add Quotation
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <h3 class="box-title titlefix">Add Quotation</h3>
                        <div class="box-tools float-right">
                           {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                           @lang('role.add') @lang('services.service')
                           </a> --}}
                        </div>
                     </div>
                     <div class="box-body">
                        <h4>Bill To</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>@lang('customer.customer') @lang('role.name')</label>
                                    <div class="position-relative has-icon-left">
                                       {{ @$data->customer_name }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label> Delivery Date</label>
                                    <div class="position-relative has-icon-left">
                                       {{ @$data->delivery_date }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>company</label>
                                    <div class="position-relative has-icon-left">
                                       {{ @$data->companies_name }}
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
                                    <div class="position-relative has-icon-left">
                                       <input type="text" class="form-control" name="address"
                                          placeholder="Address" id="address" disabled
                                          value="{{ @@$data->address }}">
                                       <div class="form-control-position">
                                          <i class='bx bxs-landmark'></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>@lang('vendor.country')</label>
                                    <div class="position-relative has-icon-left">
                                       <input type="text" class="form-control" name="country"
                                          placeholder="@lang('vendor.country')" id="country" disabled
                                          value="{{ @$data->country }}">
                                       <div class="form-control-position">
                                          <i class='bx bxs-flag-alt'></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>@lang('vendor.state')</label>
                                    <div class="position-relative has-icon-left">
                                       <input type="text" class="form-control" name="state"
                                          placeholder="@lang('vendor.country')" id="state" disabled
                                          value="{{ @$data->state }}">
                                       <div class="form-control-position">
                                          <i class='bx bxs-city'></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>@lang('vendor.zip_code')</label>
                                    <div class="position-relative has-icon-left">
                                       <input type="text" class="form-control" name="country"
                                          placeholder="@lang('vendor.country')" id="zip_code" disabled
                                          value="{{ @$data->zip_code }}">
                                       <div class="form-control-position">
                                          <i class='bx bx-map'></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>@lang('vendor.email')</label>
                                    <div class="position-relative has-icon-left">
                                       <input type="email" class="form-control" name="email"
                                          placeholder="@lang('vendor.email')" value="{{ @$data->email }}"
                                          id="email" disabled>
                                       <div class="form-control-position">
                                          <i class="bx bx-mail-send"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="controls">
                                    <label>@lang('vendor.mobile')</label>
                                    <div class="position-relative has-icon-left">
                                       <input type="number" class="form-control" name="mobile"
                                          placeholder="@lang('vendor.mobile')"
                                          value="{{ @$data->mobile }}" id="mobile" disabled>
                                       <div class="form-control-position">
                                          <i class="bx bx-mobile"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <h4>@lang('services.services')</h4>
                        <div class="row">
                           <div class="col-md-12 ">
                              <div class="download_label">{{ @$data->name }} @lang('services.service')
                                 @lang('role.list')
                              </div>
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
                        <section>
                           <div class="text-right">
                              <button class="el_adder btn btn-primary   my-1">
                              <i class="fa fa-plus mr-1"></i>Add
                              </button>
                           </div>
                           <div class="border list_table">
                              <table class='table table-sm decoy-table'>
                                 <tbody class='tbody'>
                                    <tr class='services-row'>
                                       <td style="width:3in;" id="add-list"> 
                                          <label>Services</label>
                                          <select class="form form-control get_services rounded-0" id="get_services" > 
                                          </select>
                                       </td>
                                       <td>
                                          <label>Quantity</label>
                                          <input type="text" name="qty[]" class="rounded-0 form-control  form-sm qty" min="2">
                                       </td>
                                       <td>
                                          <label>UOM<span class="ml-3 text-danger unit-name"></span></label>
                                          <input disabled type="text" name="uom[]" class="rounded-0 form-control form-sm  uom"> 
                                       </td>
                                       <td>
                                          <label>TAX</label>
                                          <input disabled type="text" name="tax[]" class="rounded-0 form-control form-sm  tax"  >
                                       </td>
                                       <td>
                                          <label>Price</label>
                                          <input disabled type="text" name="price[]" class="rounded-0 form-control form-sm  price"  >
                                       </td>
                                       <td> 
                                          <label></label>
                                          <a href="javascript:void(0)" class="rounded-0 remove-row btn btn-danger"><i
                                             class="bx bx-x"></i></a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </section>
                        <section>
                        <form id="add_quotation_form">
                           @csrf
                           <h4>@lang('role.add') Expected Price</h4>
                           <div class="row">
                              <div class="col-md-12 ">
                                 <div class="form add_service_repeater">
                                    <div>
                                       <div data-repeater-item class="add_service_count">
                                          <div class="row justify-content-between">
                                             <div class="col-md-2 col-sm-12 form-group">
                                                <label for="name">Total                                 Price</label>
                                                <input type="text" name="total_price"
                                                   class="form-control " value="{{ $total }}"
                                                   disabled>
                                             </div>
                                             <div class="col-md-2 col-sm-12 form-group">
                                                <label for="quantity">Total
                                                @lang('crm.quantity')</label>
                                                <input type="number" class="form-control qq"
                                                   placeholder="@lang('crm.quantity')"
                                                   value="{{ $total_quantity }}"
                                                   name="total_quantity" disabled>
                                             </div>
                                             <div class="col-md-2 col-sm-12 form-group">
                                                <label for="gender">@lang('services.tax')</label>
                                                <select name="tax[]" class="form-control service_tax"
                                                   multiple="multiple">
                                                </select>
                                             </div>
                                             {{-- 
                                             <div class="col-md-2 col-sm-12 form-group">
                                                <label for="price">Expected
                                                @lang('services.price')</label>
                                                <input type="number" class="form-control"
                                                   placeholder="@lang('services.price')" name="price"
                                                   id="ex_price">
                                             </div>
                                             --}}
                                          </div>
                                          <hr>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 d-flex align-items-end flex-column">
                              <div class="col-md-2 col-sm-12 ">
                                 <label for="">Total Price :</label><strong>${{ $total }}</strong>
                              </div>
                              <div class="col-md-2 col-sm-12 ">
                                 <label for="">Tax :</label><strong id="total_tax"></strong>
                              </div>
                              <div class="col-md-2 col-sm-12 ">
                                 <label for="">Final Price :</label><strong id="final_price"></strong>
                              </div>
                           </div>
                           <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                              <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                 id="add_quotation_form_btn">@lang('role.save')
                              </button>
                              <button type="reset" class="btn btn-light">@lang('role.cancel')</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
@section('javascript')
<script>
   var servicesArray = [];  
       // add_quotation_form
       $('#add_quotation_form_btn').click(function(e) {
           e.preventDefault();
           var form = $('#add_quotation_form')[0];
           var data = new FormData(form);
           data.append('id', "{{ request()->admin_quotation }}");
           if ("{{ !empty(request()->vendor_crm_id) }}") {
               data.append('vendor_crm_id', "{{ request()->vendor_crm_id }}");
           }
           $.ajax({
               url: "{{ URL::signedRoute('admin.admin_quotation.store') }}",
               type: 'post',
               data: data,
               dataType: 'json',
               cache: false,
               processData: false,
               contentType: false,
               beforeSend: function() {
                   show_when_ajax_call('#add_quotation_form_btn', 'add_quotation_form')
               },
               success: function(data) {
                   console.log(data)
                   if (data.status == 'success') {
                       remove_after_ajax_call('#add_quotation_form_btn', 'add_quotation_form')
                       successMsg(data.message);
                        
                       setTimeout(() => {
                           window.location.href = data.url;
                       }, 1000);
                   }
               },
               error: function(error) {
                   console.log(error)
                   show_errors_when_ajax_call('#add_quotation_form_btn', 'add_quotation_form',
                       error)
               }
           })
       });
   
   
       $('.service_tax').change(function() {
           var tax = $(this).val();
           let sum = 0;
   
           for (let i = 0; i < tax.length; i++) {
               sum += parseFloat(tax[i]);
           }
   
           var total = "{{ $total }}";
           var cal_tax = total * (sum / 100);
   
           $('#total_tax').html('$' + cal_tax)
           var final_price = parseFloat(cal_tax) + parseFloat("{{ $total }}");
           $('#final_price').html('$' + final_price)
       });
   
       // $('#ex_price').change(function() {
       //     // console.log($(this).val())
       //     var tax = $('.service_tax').val();
       //     let sum = 0;
   
       //     for (let i = 0; i < tax.length; i++) {
       //         sum += parseInt(tax[i]);
       //     }
   
       //     var total = $(this).val() == '' ? "{{ $total }}" : $(this).val();
       //     var cal_tax = total * (sum / 100);
   
       //     $('#total_tax').html('$' + cal_tax)
   
       //     var final_price = parseFloat(cal_tax) + parseFloat(total)
       //     $('#final_price').html('$' + final_price)
   
       // });
   
       $(document).ready(function() {
           get_all_tax();
       });
   
       function get_all_tax() {
           $.ajax({
               url: "{{ URL::signedRoute('admin.tax.get_all_tax') }}",
               type: 'get',
               dataType: 'json',
               beforeSend: function() {
                   $('#main_loader').show()
               },
               success: function(data) {
   
                   $(".service_tax").select2({
                       dropdownAutoWidth: true,
                       width: '100%',
                       data: data,
                       placeholder: "Search",
                   });
   
                   $('#main_loader').hide()
               }
           })
       }
   
   
       $(document).ready(function() {
           service_list = $('#service_list').DataTable({
               "aaSorting": [],
   
               rowReorder: {
                   selector: 'td:nth-child(2)'
               },
               //responsive: 'false',
               dom: "Bfrtip",
               buttons: [
   
                   {
                       extend: 'copyHtml5',
                       text: '<i class="fas fa-file"></i>',
                       titleAttr: 'Copy',
                       title: $('.download_label').html(),
                       exportOptions: {
                           columns: ':visible'
                       }
                   },
   
                   {
                       extend: 'excelHtml5',
                       text: '<i class="fa fa-file-excel"></i>',
                       titleAttr: 'Excel',
   
                       title: $('.download_label').html(),
                       exportOptions: {
                           columns: ':visible'
                       }
                   },
   
                   {
                       extend: 'csvHtml5',
                       text: '<i class="fa fa-file-text"></i>',
                       titleAttr: 'CSV',
                       title: $('.download_label').html(),
                       exportOptions: {
                           columns: ':visible'
                       }
                   },
   
                   {
                       extend: 'pdfHtml5',
                       text: '<i class="fa fa-file-pdf"></i>',
                       titleAttr: 'PDF',
                       title: $('.download_label').html(),
                       exportOptions: {
                           columns: ':visible'
   
                       }
                   },
   
                   {
                       extend: 'print',
                       text: '<i class="fa fa-print"></i>',
                       titleAttr: 'Print',
                       title: $('.download_label').html(),
                       customize: function(win) {
                           $(win.document.body)
                               .css('font-size', '10pt');
   
                           $(win.document.body).find('table')
                               .addClass('compact')
                               .css('font-size', 'inherit');
                       },
                       exportOptions: {
                           columns: ':visible'
                       }
                   },
   
                   {
                       extend: 'colvis',
                       text: '<i class="fa fa-columns"></i>',
                       titleAttr: 'Columns',
                       title: $('.download_label').html(),
                       postfixButtons: ['colvisRestore']
                   },
               ],
               ajax: {
                   url: "{{ route('admin.crm.show_service_data_for_crm') }}",
                   type: 'get',
                   data: {
                       id: "{{ @$data->id }}"
                   },
   
               },
               columns: [{
                       data: 'service_name',
                       name: 'service_name'
                   },
                   {
                       data: 'quantity',
                       name: 'quantity'
                   },
                   {
                       data: 'uom',
                       name: 'uom'
                   },
                   {
                       data: 'tax',
                       name: 'tax'
                   },
                   {
                       data: 'price',
                       name: 'price'
                   },
                   // {
                   //     data: 'action'
                   // }
               ]
           })
       });
   
   function get_all_services_list() {
           $.ajax({
               url: "{{ route('admin.service.get_all_services_list') }}",
               type: 'get',
               dataType: 'json',
               beforeSend: function() {
                   $('#main_loader').show()
               },
               success: function(data) {
   
                   $(".service_list").select2({
                       dropdownAutoWidth: true,
                       width: '100%',
                       data: data, "autoWidth": true ,
                       placeholder: "Search",
                   });
   
                   $('#main_loader').hide()
               }
           })
       }
   
    function get_all_unit_of_measures() {
           $.ajax({
               url: "{{ route('admin.units.get_all_unit_of_measures') }}",
               type: 'get',
               dataType: 'json',
               beforeSend: function() {
                   $('#main_loader').show();
               },
               success: function(data) {
                   $(".uom").select2({
                       dropdownAutoWidth: true,
                       width: '100%',
                       data: data,
                       placeholder: "Search",
                   }); 
   
                   $('#main_loader').hide();
               },
               error: function(error) {
                   console.log(error)
                   $('#main_loader').hide();
               }
           })
       }
   
   
       $(document).ready(function() {
           // form repeater jquery
           $('.add_service_repeater').repeater({
               show: function() {
                   $(this).slideDown();
                   get_all_services_list();
                 
               },
               hide: function(deleteElement) {
                   if (confirm('Are you sure you want to delete this element?')) {
                       $(this).slideUp(deleteElement);
                   }
               }
           });
   
       });
   
       $(document).on("click", ".service_list", function(event) {
           alert();
           $(this).autocomplete({
               source: function(request, response) {
                   $.ajax({
                       type: 'get',
                       url: "{{ route('admin.crm.search_service') }}",
                       dataType: "json",
                       data: {
                           term: request.term,
                       },
                       success: function(data) {
                           response(data);
                       },
                   });
               },
               select: function(event, ui) {
                   if (ui.item.id != 0) {
                       $(this).closest('.add_service_count').find(
                           ".service_id").this(ui.item.id);
                       $(this).closest('.add_service_count').find(
                           ".uom").select2('val', ui.item.unit);
                       $(this).closest('.add_service_count').find(
                           ".tax").this(ui.item.tax);
                       console.log(ui.item.price)
                       $(this).closest('.add_service_count').find(
                           ".service_price").val(ui.item.price);
                        
   
                   }
               },
               minLength: 1,
           });
   
       });
       function get_services_array(){
           
           
       }
       
   function operations(){
      
   }
   
   var sum_amount = [];
   $(document).ready(function() {
   
   $.ajaxSetup({
           headers:
           { 
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
           }
   });
   get_all_services_list();
   //get_company_list();
   get_services_array();
   
   $.ajax({
       url : '{{ url("get/services/list") }}',
       type : 'post',
       dataType : 'json',
       success: function(data){
           servicesArray = data;
   
          $.each(data, function(key, value){ 
              
   
           $('.get_services').append('<option class="services-opt" value='+value.id+'><span>'+value.service_name+'</option>');
          });
       }
   });
   
   
   
   $(document).on('click','.el_adder', function(e){
       e.preventDefault();
           $('.services-row').clone().last().appendTo('.tbody') ;
           $('.remove-row').addClass('remove');
       });
   
       $(document).on('change', '#get_services', function(e){
           e.preventDefault();
           //console.log($(this).find('.services-opt').val());
       });
   
       $(document).on('click','.remove', function(){ 
          $(this).parent().parent().remove();
       });
   
       $(document).on('keyup','.services-row', function(e){ 
           e.preventDefault();  
   
           var id = $(this).find('.get_services option:selected').val();
   
           var qty = $(this).find('.qty');
           var uom = $(this).find('.uom');
           var tax = $(this).find('.tax');  
           var unit = $(this).find('.unit-name');
           var price = $(this).find('.price');
   
           $('.price').each(function(){ 
               sum_amount.push(this.value);
                 //console.log(sum_amount.length);
           });
   
           optArray = [];
   
           $.ajax({
               url : '{{url("get/selected/row")}}'+'/'+id,
               type :'post',
               dataType: 'json',
               success: function(data){
                   optArray = data;
                   $.each(data, function(key, value){ 
                       console.log();
                       uom.val(value.unit);   
                       //unit.text(value.unit);
                       tax.val(value.tax);
                       price.val(parseFloat(value.price * qty.val()));
                   });
               }
           }); 
               
           console.log(optArray);
           // var optArray = $(this).find('.get_services option:selected').text().split(","); 
           // var optStr = $(this).find('.get_services option:selected span').text().split(','); 
           
           // var opt_value = $(this).find('.get_services option:selected').text();
           // var opt_valueArray = opt_value.split(",");
           // let price = opt_valueArray[1]; 
   
         
   
       });
   
       $(document).on('keyup', '.fields-row', function(e){
           e.preventDefault();
           var qty ;
           var id = $(this).find('.service_list option:selected').val()
           $.ajax({
               url :'{{ url("get/rows") }}'+'/'+id,
               type : 'POST',
               data : {
                   id : id
               },
               success: function(data){
                   //console.log(data);
                   $.each(data, function(key, value){
                       qty = value.unit;
                       console.log(value.unit);
                   });
               }
   
           });
          //console.log($(this).find('.quantity').val());
          //console.log($(this).find('.service_list option:selected').val());
          $(this).find('.quantity').val(qty);
          console.log(qty);
       });
   
           
   });
   
</script>
@endsection
@endsection