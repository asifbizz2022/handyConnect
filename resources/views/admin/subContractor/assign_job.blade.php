@extends('admin.layouts.main')
@section('content')

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
                                    @lang('Assign Job')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('Assign Job')
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
                                    <h3 class="box-title titlefix">@lang('Assign Job')</h3>
                                    <div class="box-tools float-right">
                                            <a href="#!" class="btn btn-primary btn-sm"
                                                onclick="open_modal('add_subcontractor','add_subcontractor_form')"><i
                                                    class="fa fa-plus"></i>
                                                @lang('Asign Job')
                                            </a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="download_label">@lang('Assign Job') @lang('role.list')</div>
                                      <table   id="assign_job_list" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('Job Unique Id')</th>
                                                <th>@lang('SC Name')</th>
                                                <th>@lang('Customer name')</th>
                                                <th>@lang('Order')</th>
                                                <th>@lang('Status')</th>
                                                <th>@lang('role.action')</th> 
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
                
              
                            
                            
            </div>
        </div>
    </body>

    {{-- modal --}}
    <div class="modal fade text-left" id="add_subcontractor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.Assign') @lang('subcontractor')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_subcontractor_form">
                        @csrf
                        <label> @lang('Subcontractor Name'): </label>
                        <div class="form-group">
                           <select name="subcontractor_name" id="sub_contractor_id" class="form-control subcontractor_list">
                            <option>
                                -----CLICK TO CHOOSE SUB CONTRACTOR-----
                            </option>
                            </select>
                        </div>
                            <label> @lang('Customer Name'): </label>
                        <div class="form-group">
                           <select name="customer_name" id="customer_id" class="form-control customer_list">
                              
                           <option>
                                -----CLICK TO CHOOSE CUSTOMERS-----
                            </option>
                            </select>
                        </div>
                            <label> @lang('Order'): </label>
                        <div class="form-group">
                           <select name="customer_order" id="customer_order_id" class="form-control customer_order">
                            <option>
                                Please Select Customer First
                            </option>
                            </select>
                        </div> 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_subcontractor_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- edit subcontractor --}}
     <div class="modal fade text-left" id="edit_assign_job_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">@lang('view') @lang('subcontractor')</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
             <div class="modal-body">
                <form id="edit_subcontractor_form">    
                    <table class="w-100">
                        <tbody>
                            <tr>
                                <td>
                                    <label> @lang('Subcontractor Name') : </label>
                                </td>
                                <td> 
                                    <input type="hidden" name="id" class="id">
                                    <input type="hidden" name="sid" class="sucontractor_id">
                                     <select  name='sbcid' class="form-control">
                                    @foreach($subcontractor as $sbc)
                                   
                                        <option value="{{ $sbc->id }}">{{ $sbc->name }}</option>
                                  
                                    @endforeach
                                      </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <label> @lang('Customer Name') : </label>
                                </td>
                                <td>
                                    
                                    <select  name='cstid' class="form-control">
                                    @foreach($customers as $cstm)
                                    
                                        <option value="{{ $cstm->customer_unique_id }}">{{ $cstm->name }}</option>
                                   
                                    @endforeach
                                     </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> @lang('Order') : </label>
                                </td>
                                <td>
                                       <select  name='customer_order' class="form-control">
                                    @foreach($orders as $ord)
                                  
                                        <option value="{{ $ord->order_id }}">{{ $ord->order_id }}</option>
                                    
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> @lang('Status') : </label>
                                </td>
                                <td>
                                    
                                    <select class="form-control" name="status">
                                        <option>In Process</option>
                                        <option>Completed</option>
                                        <option>Cancelled</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                 </form>
                </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" id="update_table">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Update</span>
                </button>
            </div>
        </div>
    </div>
</div>
    {{-- view subcontractor --}}
     <div class="modal fade text-left" id="view_subcontractor_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">@lang('view') @lang('subcontractor')</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
             <div class="modal-body">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <label> @lang('Subcontractor Name') : </label>
                                </td>
                                <td> 
                                    <span id='sucontractor-name'></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <label> @lang('Customer Name') : </label>
                                </td>
                                <td>
                                    <span id="customer-name"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> @lang('Order') : </label>
                                </td>
                                <td>
                                    <span id="order"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> @lang('Status') : </label>
                                </td>
                                <td>
                                    <span id="status-name"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

            </div>
        </div>
    </div>
</div>

@section('javascript')
<script>
   $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

function open_edit_subcontractor_model(id){
    $('#edit_assign_job_modal').modal('show');
    $.ajax({
        url: "{{ route('subcontractor.edit_job') }}",
        type: 'get',
        data: {
            id: id
        },
        dataType: 'json',
        beforeSend: function() {
            $('#main_loader').show();
        },
        success: function(data) { 
            $.each(data, function(key, value){
                console.log(value);
                $('.id').val(value.id);
                    $('.sucontractor_id').val(value.sub_contractor_id);
                    $('.sucontractor-name').val(value.subcontractor_name);
                    
                    $('.customer_id').val(value.customer_id);
                    $('.customer-name').val(value.customer_name);
                    
                    $('.order').val(value.order_id);
                    $('.status-name').val(value.sts); 
                    $('#main_loader').hide();
            }); 

        },
        error: function(error) {
            // console.log(error);
            $('#main_loader').hide();
        }
  });
}

 $('#update_table').click(function(e) {
        e.preventDefault();
        var form = $('#edit_subcontractor_form')[0];
        var data = new FormData(form);
        $.ajax({
            url: "{{ route('subcontractor.update_job') }}",
            type: 'post',
            data: data,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(data) {
                show_when_ajax_call('#update_table', 'edit_subcontractor_form');
            },
            success: function(data) {
                console.log(data);
                if (data.status == 'success') {
                    close_modal('edit_assign_job_modal');
                    remove_after_ajax_call('#update_table', 'edit_subcontractor_form', 'Update')
                    successMsg(data.message);
                    assign_job_list.ajax.reload();
                    close_modal('edit_assign_job_modal')
                }
            },
            error: function(error) {
                show_errors_when_ajax_call('#update_table', 'edit_subcontractor_form', error, 'Update');
            }
        })
    })
    
    
function open_view_modal(id) {
     
    $('#view_subcontractor_modal').modal('show');
    $.ajax({
        url: "{{ route('subcontractor.view_job') }}",
        type: 'get',
        data: {
            id: id
        },
        dataType: 'json',
        beforeSend: function() {
            $('#main_loader').show();
        },
        success: function(data) { 
            $.each(data, function(key, value){
                console.log(value);
                    $('#sucontractor-name').text(value.subcontractor_name);
                    $('#customer-name').text(value.customer_name);
                    $('#order').text(value.order_id);
                    $('#status-name').text(value.sts); 
                    $('#main_loader').hide();
            });
         

        },
        error: function(error) {
            // console.log(error);
            $('#main_loader').hide();
        }
  });
} 
        
    $(document).ready(function() {
        
        get_all_subcontractor(); 
        get_all_customer(); 
        
        
        assign_job_list = $('#assign_job_list').DataTable({ 
            
                "aaSorting": [],
 
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                
                ajax: {
                    url: "{{ route('subcontractor.create_job') }}",
                    type: 'get',

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
              
                columns:  [
                    {
                        data: 'job_unique_id',
                        name: 'job_unique_id'
                    },
                    {
                        data: 'subcontractor_name',
                        name: 'subcontractor_name'
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name'
                    },
                    {
                        data: 'order_id',
                        name: 'order_id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                      
                    }

                ]
            }); 
        function get_all_subcontractor() {
            $.ajax({
                url: "{{ route('subcontractor.get_all_subcontractor') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                     
                    $('#main_loader').hide();
                    var len = data.length;
                    $('.subcontractor_list').empty();
                    for (var i = 0; i < len; i++) {
                        $('.subcontractor_list').append('<option value="' + data[i]['id'] + '">' + data[i]['name'] +
                            '</option>')
                    }

                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        } 
        function get_all_customer() {
            $.ajax({
                url: "{{ route('admin.customer.get_all_customer') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                      
                    $('#main_loader').hide();
                    var len = data.length;
                    $('.customer_list').empty();
                    $('.customer_list').append('<option value="">Select Customer</option>')
                    for (var i = 0; i < len; i++) {
                        $('.customer_list').append('<option value="' + data[i]['customer_unique_id'] + '">' + data[i]['name'] +
                            '</option>')
                    }

                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        } 
        
        //delete function 
        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ route('subcontractor.delete_job') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            assign_job_list.ajax.reload();
        });
        //view 
        
       
        
        $(document).on("change","#customer_id", function(){
            var customer_unique_id = $('#customer_id').val();
            $.ajax({
                url: "{{ route('subcontractor.get_customer_order') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "customer_unique_id" : customer_unique_id
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    // console.log(data)
                    $('#main_loader').hide();
                    var len = data.length;
                    $('.customer_order').empty();
                    if(len == 0) {
                        $('.customer_order').append('<option value="">No Order Found</option>')
                    }
                    for (var i = 0; i < len; i++) {
                        $('.customer_order').append('<option value="' + data[i]['order_id'] + '">' + data[i]['service']['service_name'] + ' (#'+ data[i]['service_unique_id'] +')'+
                            '</option>')
                    }

                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        }); 
        
        $('#add_subcontractor_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_subcontractor_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ route('subcontractor.store_job') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#add_subcontractor_form_btn', 'add_subcontractor_form');
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                         close_modal('add_subcontractor');
                          remove_after_ajax_call('#add_subcontractor_form_btn', 'add_subcontractor_form')
                         successMsg(data.message);
                         assign_job_list.ajax.reload();
                        
                       
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#add_subcontractor_form_btn', 'add_subcontractor_form', error);
                }
            })
        });    
        
    });       
</script>
@endsection

@endsection
