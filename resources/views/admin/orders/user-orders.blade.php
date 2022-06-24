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
                                    Orders</h5>
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
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id=" "  role="tabpanel" aria-labelledby="nav-home-tab"> 
                    <div class="box">
                        <div class="box-header">
                            
                        </div>
                        <div class="box-body">
                            @include('admin.orders.orders')
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>




@section('javascript')
    <script>
        // $('#main_delete_link').click(function(e) {
        //     e.preventDefault();
        //     delete_modal_selected_data("{{ URL::signedRoute('admin.employee.delete') }}", $(this).attr('href'),
        //         "{{ csrf_token() }}");
        //     employee_list.ajax.reload();
        // }); 
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
        });

       
        
        $(document).on('click', '.approve-it', function(){
            var $id = $(this).attr('value');
            $.ajax({
                url: '{{ url("order/status/approve") }}'+'/'+$id,
                type : 'post',
                dataType : 'Json',
                success: function(data){
                    if(data == 1){
                        console.log(data);
                        location.reload();
                    } 
                 
                }
            });
        });

        $(document).on('click', '.not-approve-it', function(){
            var $id = $(this).attr('value');
            $.ajax({
                url: '{{ url("order/status/deapprove") }}'+'/'+$id,
                type : 'post',
                dataType : 'Json',
                success: function(data){
                    if(data == 1){
                        console.log(data);
                        location.reload();
                    } 
                 
                }
            });
        });

        $(document).on('change','.order-status', function(){
            var $status = $('.order-status option:selected').val();
            var $type ;
            $.ajax({
                url : '{{ url("orders/status") }}'+'/'+$status,
                type: 'post', 
                dataType: 'Json',
                success :function(data){
                     
                    $.each(data, function(key ,value){
                        /*if(value.order_status == 1){
                            $type = '<span class="badge badge-info">Aprooved</span>';
                        }
                        if(value.order_status == 2){
                            $type = '<span class="badge badge-success">Completed</span>';
                        }
                        if(value.order_status == 3){
                            $type = '<span class="badge badge-danger">Cancelled</span>';
                        }
                        if(value.order_status == 4){
                            $type = '<span class="badge badge-primary">Pending</span>';
                        }*/
                        $('.order-table-row').append('<tr><td>\
                        <span>'+value.name+'</span><br>\
                        <span>'+value.email+'</span><br>\
                        <span>'+value.mobile+'</span><br>\
                        </td>\
                        <td>\
                        <span>'+value.customer_name+'</span><br>\
                        <span>'+value.customer_contact+'</span><br>\
                        <span>'+value.service_type+'</span><br>\
                        </td>\
                        <td>\
                        <span>'+value.service_name+'</span><br>\
                        <span>'+value.price+'</span><br>\
                        <span>'+value.type+'</span><br>\
                        </td>\
                        <td><span>'+$type+'</span></td></tr>');
                    });
                }
            });
        });

        $('#order-list ').DataTable( {

            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "arSorting": [],

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

                 
],
        });
      });
    </script>
@endsection

@endsection
