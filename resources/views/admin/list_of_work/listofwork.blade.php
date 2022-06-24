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
                                    @lang('List Of Works')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('List Of Works')
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
                                    <h3 class="box-title titlefix">@lang('List Of Works')</h3>
                                    <div class="box-tools float-right">
                                            <a href="#!" class="btn btn-primary btn-sm"
                                                onclick="open_modal('add_listofwork','add_listofwork_form')"><i
                                                    class="fa fa-plus"></i>
                                                @lang('role.add') 
                                                @lang('List')
                                            </a>
                                                                           </div>
                                </div>
                                <div class="box-body">
                                    <div class="download_label">@lang('List Of Works') @lang('role.list')</div>
                                    <table class="" id="listofwork_list" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('Id')</th>
                                                <th>@lang('Work Name')</th>
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
    <div class="modal fade text-left" id="add_listofwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('listofwork')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_listofwork_form">
                        @csrf
                        <label> @lang('work_name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Work Name"
                                class="form-control" name="work_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_listofwork_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- edit listofwork --}}
    <div class="modal fade text-left" id="edit_listofwork_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('edit') @lang('listofwork')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_listofwork_form">
                        @csrf
                        <label> @lang('work_name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Work Name"
                                class="form-control" name="work_name"  id="edit_listofwork_work_name">
                        </div>
                        <input type="hidden" name="id" id="edit_listofwork_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="edit_listofwork_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit listofwork --}}



@section('javascript')
    <script>
        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ route('listofwork.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            listofwork_list.ajax.reload();
        });

        function open_edit_listofwork_model(id) {
            $('#edit_listofwork_modal').modal('show');
            $.ajax({
                url: "{{ route('listofwork.edit') }}",
                type: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    // console.log(data)
                  
                    var url = "{{ asset('') }}";
                    $('#edit_listofwork_id').val(data.id);
                    $('#edit_listofwork_work_name').val(data.work_name);
                   
                    $('#main_loader').hide();

                },
                error: function(error) {
                    console.log(error);
                    $('#main_loader').hide();
                }
            })
        }

        $('#edit_listofwork_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#edit_listofwork_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ route('listofwork.update') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#edit_listofwork_form_btn', 'edit_listofwork_form');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        close_modal('edit_listofwork_modal');
                        remove_after_ajax_call('#edit_listofwork_form_btn', 'edit_listofwork_form','Update')
                        successMsg(data.message);
                        listofwork_list.ajax.reload();
                        close_modal('edit_listofwork_modal')
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#edit_listofwork_form_btn', 'edit_listofwork_form', error,'Update');
                }
            })
        })


        $('#add_listofwork_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_listofwork_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ route('storelistofwork') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#add_listofwork_form_btn', 'add_listofwork_form');
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        close_modal('add_listofwork');
                        remove_after_ajax_call('#add_listofwork_form_btn', 'add_listofwork_form')
                        successMsg(data.message);
                        listofwork_list.ajax.reload();
                        close_modal('add_listofwork')
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#add_listofwork_form_btn', 'add_listofwork_form', error);
                }
            })
        })

var dataTable
 
$(document).ready(function () {
    loadDataTable();
});
        $(document).ready(function() {
            listofwork_list = $('#listofwork_list').DataTable({
                "aaSorting": [],


                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                
                ajax: {
                    url: "{{ route('listofwork.listofwork_create') }}",
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
              
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'work_name',
                        name: 'work_name'
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        });
    </script>
@endsection

@endsection
