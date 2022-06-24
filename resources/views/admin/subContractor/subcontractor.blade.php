@extends('admin.layouts.main')
@section('content')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">
                                @lang('Sub Contractors')</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">@lang('Sub Contractors')
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
                                <h3 class="box-title titlefix">@lang('Sub Contractors')</h3>
                                <div class="box-tools float-right">
                                    <a href="#!" class="btn btn-primary btn-sm" onclick="open_modal('add_subcontractor','add_subcontractor_form')"><i class="fa fa-plus"></i>
                                        @lang('role.add')
                                        @lang('Subcontractor')
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="download_label">@lang('Sub Contractors') @lang('role.list')</div>
                                <table id="subcontractor_list" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('SC Unique Id')</th>
                                            <th>@lang('Name')</th>
                                            <th>@lang('Email')</th>
                                            <th>@lang('Address')</th>
                                            <th>@lang('Image')</th>
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
<div class="modal fade text-left" id="add_subcontractor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('subcontractor')</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_subcontractor_form">
                    @csrf
                    <label> @lang('name'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Name" class="form-control" name="name">
                    </div>
                    <label> @lang('email'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Email" class="form-control" name="email">
                    </div>
                    <label> @lang('mobile'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter mobile" class="form-control" name="mobile">
                    </div>
                    <label> @lang('password'): </label>
                    <div class="form-group">
                        <input type="password" placeholder="Enter password" class="form-control" name="password">
                    </div>
                    <label> @lang('address'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter address" class="form-control" name="address">
                    </div>
                    <label> @lang('image'): </label>
                    <div class="form-group">
                        <input type="file" class="image_dropify" data-allowed-file-extensions="png jpg jpeg" placeholder="Enter Sub Contractors Image" name="sub_contractors_image">
                    </div>
                    <label> @lang('past_jobs'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Past Jobs" class="form-control" name="past_jobs">
                    </div>
                    <label> @lang('past_job_cost'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Past Job Cost" class="form-control" name="past_job_cost">
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
<div class="modal fade text-left" id="edit_subcontractor_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">@lang('edit') @lang('subcontractor')</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_subcontractor_form">
                    @csrf
                    <label> @lang('name'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_subcontractor_name" placeholder="Enter Name" class="form-control" name="name">
                    </div>
                    <label> @lang('email'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_subcontractor_email" placeholder="Enter Email" class="form-control" name="email">
                    </div>
                    <label> @lang('mobile'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_subcontractor_mobile" placeholder="Enter mobile" class="form-control" name="mobile">
                    </div>
                    <label> @lang('address'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_subcontractor_address" placeholder="Enter address" class="form-control" name="address">
                    </div>
                    <label> @lang('image'): </label>
                    <div class="form-group">
                        <div class="text-center">
                            <img src="" alt="" id="edit_subcontractors_image" width="100">
                        </div>
                        <input type="file" class="form-control image_dropify" name="sub_contractors_image" data-allowed-file-extensions="png jpg jpeg">
                        <input type="text" class="form-control" name="sub_contractors_image_old" data-allowed-file-extensions="png jpg jpeg" id="sub_contractors_image_old">
                        <input type="hidden" name="id" id="edit_subcontractor_id">
                    </div>
                    <label> @lang('past_jobs'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_subcontractor_past_jobs" placeholder="Enter Past Jobs" class="form-control" name="past_jobs">
                    </div>
                    <label> @lang('past_job_cost'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_subcontractor_past_job_cost" placeholder="Enter Past Job Cost" class="form-control" name="past_job_cost">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" id="edit_subcontractor_form_btn">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Update</span>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- edit subcontractor --}}

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
                <form id="view_subcontractor_form" style="padding:18px">
                    @csrf

                    <div class="form-group">
                        <div class="row">

                            <b>@lang('Name'): </b>
                            <span id="view_subcontractor_name"> </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                           <b> @lang('Email'): </b>
                            <span id="view_subcontractor_email"> </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                           <b> @lang('Mobile'): </b>
                            <span id="view_subcontractor_mobile"> </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                           <b> @lang('Address'): </b>
                            <span id="view_subcontractor_address"> </span>
                        </div>

                    </div>
                 
                    <div class="form-group">
                        <div class="row">

                       <b> @lang('Past Job'): </b>
                            <span id="view_subcontractor_past_jobs"> </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                        <b>@lang('Past job Cost'): </b>
                            <span id="view_subcontractor_past_job_cost"> </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                           <b> @lang('image'): </b>
                            <div class="text-center">
                                <img src="" alt="" id="view_subcontractors_image" width="100">
                            </div>
                        </div>

                    </div>
                </form>
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
{{-- view subcontractor --}}

@section('javascript')
<script>
    $('#main_delete_link').click(function(e) {
        e.preventDefault();
        delete_modal_selected_data("{{ route('subcontractor.delete') }}", $(this).attr('href'),
            "{{ csrf_token() }}");
        subcontractor_list.ajax.reload();
    });

    function open_view_model(id) {
        $('#view_subcontractor_modal').modal('show');
        $.ajax({
            url: "{{ route('subcontractor.edit') }}",
            type: 'get',
            data: {
                id: id
            },
            dataType: 'json',

            success: function(data) {
                console.log(data)
                if (data.sub_contractors_image == null) {
                    sub_contractors_image = 'asset/admin/image/your-logo-here.jpg'
                } else {
                    sub_contractors_image = data.sub_contractors_image;
                }
                var url = "{{ asset('') }}";
                $('#view_subcontractor_id').val(data.id);
                $('#view_subcontractor_name').html(data.name);

                $('#view_subcontractor_email').html(data.email);
                $('#view_subcontractor_mobile').html(data.mobile);
                $('#view_subcontractor_address').html(data.address);
                $('#view_subcontractors_image').attr('src', url + sub_contractors_image);
                $('#view_subcontractor_past_jobs').html(data.past_jobs);
                $('#view_subcontractor_past_job_cost').html(data.past_job_cost);

                $('#main_loader').hide();

            },
            error: function(error) {
                // console.log(error);
                $('#main_loader').hide();
            }
        })
    }

    function open_edit_subcontractor_model(id) {
        $('#edit_subcontractor_modal').modal('show');
        $.ajax({
            url: "{{ route('subcontractor.edit') }}",
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
                if (data.sub_contractors_image == null) {
                    sub_contractors_image = 'asset/admin/image/your-logo-here.jpg'
                } else {
                    sub_contractors_image = data.sub_contractors_image;
                }
                var url = "{{ asset('') }}";
                $('#edit_subcontractor_id').val(data.id);
                $('#edit_subcontractor_name').val(data.name);
                $('#edit_subcontractor_email').val(data.email);
                $('#edit_subcontractor_mobile').val(data.mobile);
                $('#edit_subcontractor_address').val(data.address);
                $('#edit_subcontractors_image').attr('src', url + sub_contractors_image);
                $('#sub_contractors_image_old').val(data.sub_contractors_image);


                $('#edit_subcontractor_past_jobs').val(data.past_jobs);
                $('#edit_subcontractor_past_job_cost').val(data.past_job_cost);

                $('#main_loader').hide();

            },
            error: function(error) {
                // console.log(error);
                $('#main_loader').hide();
            }
        })
    }

    $('#edit_subcontractor_form_btn').click(function(e) {
        e.preventDefault();
        var form = $('#edit_subcontractor_form')[0];
        var data = new FormData(form);
        $.ajax({
            url: "{{ route('subcontractor.update') }}",
            type: 'post',
            data: data,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(data) {
                show_when_ajax_call('#edit_subcontractor_form_btn', 'edit_subcontractor_form');
            },
            success: function(data) {
                console.log(data);
                if (data.status == 'success') {
                    close_modal('edit_subcontractor_modal');
                    remove_after_ajax_call('#edit_subcontractor_form_btn', 'edit_subcontractor_form', 'Update')
                    successMsg(data.message);
                    subcontractor_list.ajax.reload();
                    close_modal('edit_subcontractor_modal')
                }
            },
            error: function(error) {
                show_errors_when_ajax_call('#edit_subcontractor_form_btn', 'edit_subcontractor_form', error, 'Update');
            }
        })
    })


    $('#add_subcontractor_form_btn').click(function(e) {
        e.preventDefault();
        var form = $('#add_subcontractor_form')[0];
        var data = new FormData(form);
        $.ajax({
            url: "{{ route('storesubcontractor') }}",
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
                    subcontractor_list.ajax.reload();
                    close_modal('add_subcontractor')
                }
            },
            error: function(error) {
                show_errors_when_ajax_call('#add_subcontractor_form_btn', 'add_subcontractor_form', error);
            }
        })
    })

    var dataTable

    $(document).ready(function() {
        loadDataTable();
    });
    $(document).ready(function() {
        subcontractor_list = $('#subcontractor_list').DataTable({
            "aaSorting": [],


            rowReorder: {
                selector: 'td:nth-child(2)'
            },

            ajax: {
                url: "{{ route('subcontractor.subcontractor_create') }}",
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
                    data: 'sub_contractors_unique_id',
                    name: 'sub_contractors_unique_id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'sub_contractors_image',
                    name: 'sub_contractors_image'
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