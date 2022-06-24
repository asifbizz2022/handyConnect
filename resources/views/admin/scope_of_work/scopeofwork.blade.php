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
                                    @lang('Scope Of Works')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('Scope Of Works')
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
                                    <h3 class="box-title titlefix">@lang('Scope Of Works')</h3>
                                    <div class="box-tools float-right">
                                            <a href="#!" class="btn btn-primary btn-sm"
                                                onclick="open_modal('add_scopeofwork','add_scopeofwork_form')"><i
                                                    class="fa fa-plus"></i>
                                                @lang('role.add') 
                                                @lang('scope')
                                            </a>
                                                                           </div>
                                </div>
                                <div class="box-body">
                                    <div class="download_label">@lang('Scope Of Works') @lang('role.scope')</div>
                                    <table class="" id="scopeofwork_scope" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('Id')</th>
                                                <th>@lang('Work Description')</th>
                                                <th>@lang('List Work')</th>
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
    <div class="modal fade text-left" id="add_scopeofwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('Scope Of Work')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_scopeofwork_form">
                        @csrf
                        <label> @lang('work_description'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Work Name"
                                class="form-control" name="work_description">
                        </div>
                        <label> @lang('work_name'): </label>
                        <div class="form-group">
                            <select name="work_name" id="scope_id" class="form-control work_list">
                            <option>
                                -----CLICK TO CHOOSE WORK LIST-----
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
                    <button type="button" class="btn btn-primary ml-1" id="add_scopeofwork_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- edit scopeofwork --}}
    <div class="modal fade text-left" id="edit_scopeofwork_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('edit') @lang('scopeofwork')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_scopeofwork_form">
                        @csrf
                        <label> @lang('work_description'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Work Name"
                                class="form-control" name="work_description"  id="edit_scopeofwork_work_description">
                        </div>
                        <label> @lang('work_name'): </label>
                        <div class="form-group">
                        <select name="work_name" id="edit_scopeofwork_work_list" class="form-control work_list"></select>
                        </div>
                        <input type="hidden" name="id" id="edit_scopeofwork_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="edit_scopeofwork_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit scopeofwork --}}



@section('javascript')
    <script>
        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ route('scopeofwork.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            scopeofwork_scope.ajax.reload();
        });


        $(document).ready(function() {
            get_all_listofwork();
        });

        function get_all_listofwork() {
            $.ajax({
                url: "{{ route('listofwork.get_all_listofwork') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    // console.log(data)
                    $('#main_loader').hide();
                    var len = data.length;
                    $('.work_list').empty();
                    for (var i = 0; i < len; i++) {
                        $('.work_list').append('<option value="' + data[i]['id'] + '">' + data[i]['work_name'] +
                            '</option>')
                    }

                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        }

        function open_edit_scopeofwork_model(id) {
            $('#edit_scopeofwork_modal').modal('show');
            $.ajax({
                url: "{{ route('scopeofwork.edit') }}",
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
                    $('#edit_scopeofwork_id').val(data.id);
                    $('#edit_scopeofwork_work_description').val(data.work_description);
                    $('#edit_scopeofwork_work_list').val(data.scope_id);
                    $('#main_loader').hide();

                },
                error: function(error) {
                    console.log(error);
                    $('#main_loader').hide();
                }
            })
        }

        $('#edit_scopeofwork_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#edit_scopeofwork_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ route('scopeofwork.update') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#edit_scopeofwork_form_btn', 'edit_scopeofwork_form');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        close_modal('edit_scopeofwork_modal');
                        remove_after_ajax_call('#edit_scopeofwork_form_btn', 'edit_scopeofwork_form','')
                        successMsg(data.message);
                        scopeofwork_scope.ajax.reload();
                        close_modal('edit_scopeofwork_modal')
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#edit_scopeofwork_form_btn', 'edit_scopeofwork_form', error);
                }
            })
        })


        $('#add_scopeofwork_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_scopeofwork_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ route('storescopeofwork') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#add_scopeofwork_form_btn', 'add_scopeofwork_form');
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        close_modal('add_scopeofwork');
                        remove_after_ajax_call('#add_scopeofwork_form_btn', 'add_scopeofwork_form')
                        successMsg(data.message);
                        scopeofwork_scope.ajax.reload();
                        close_modal('add_scopeofwork')
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#add_scopeofwork_form_btn', 'add_scopeofwork_form', error);
                }
            })
        })

var dataTable
 
$(document).ready(function () {
    loadDataTable();
});
        $(document).ready(function() {
            scopeofwork_scope = $('#scopeofwork_scope').DataTable({
                "aaSorting": [],


                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                
                ajax: {
                    url: "{{ route('scopeofwork.scopeofwork_create') }}",
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
                        data: 'work_description',
                        name: 'work_description'
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
