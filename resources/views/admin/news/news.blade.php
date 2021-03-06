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
                                @lang('News Feed')</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">@lang('News Feed')
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
                                <h3 class="box-title titlefix">@lang('News Feed')</h3>
                                <div class="box-tools float-right">
                                    <a href="#!" class="btn btn-primary btn-sm"
                                        onclick="open_modal('add_news','add_news_form')"><i class="fa fa-plus"></i>
                                        @lang('role.add')
                                        @lang('News')
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="download_label">@lang('News')</div>
                                <table class="" id="news_scope" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th>@lang('Id')</th> -->
                                            <th>@lang('Image')</th>
                                            <th>@lang('Title')</th>
                                            <th>@lang('Description')</th>
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
<div class="modal fade text-left" id="add_news" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('News')</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_news_form">
                    @csrf
                    <label>@lang('Title'): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Title" class="form-control" name="title">
                    </div>
                    <label>@lang('Image'): </label>
                    <div class="form-group">
                        <input type="file" class="image_dropify" name="news_image"
                            data-allowed-file-extensions="png jpg jpeg">
                    </div>

                    <label> @lang('description'): </label>
                    <div class="form-group">
                        <textarea id="" placeholder="Enter Description" class="form-control ckeditor" name="description"
                            rows="4"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" id="add_news_form_btn">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Save</span>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}

{{-- edit news --}}
<div class="modal fade text-left" id="edit_news_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">@lang('edit') @lang('news')</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_news_form">
                    @csrf

                    <!-- to send id -->
                    <input type="hidden" value="" name="id" id="updateId">
                    <!-- to send id -->
                    <label>@lang('Title'): </label>
                    <div class="form-group">
                        <input type="text" id="edit_news_title" placeholder="Enter Title" class="form-control"
                            name="title">
                    </div>
                    <label>@lang('Image'): </label>
                    <div class="form-group">
                        <input type="file" id="edit_news_image" class="image_dropify" name="news_image"
                            data-allowed-file-extensions="png jpg jpeg">
                    </div>
                    <label> @lang('description'): </label>
                    <div class="form-group">
                        <textarea id="edit_news_description" placeholder="Enter Work Name" class="form-control ckeditor"
                            name="edit_news_description" rows="4">
                            </textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" id="edit_news_form_btn">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Update</span>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- edit news --}}



@section('javascript')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $('#main_delete_link').click(function (e) {
        e.preventDefault();
        delete_modal_selected_data("{{ route('news.delete') }}", $(this).attr('href'),
            "{{ csrf_token() }}");
        news_scope.ajax.reload();
    });


    function open_edit_news_model(id) {

        $('#edit_news_modal').modal('show');
        $.ajax({
            url: "{{ route('news.edit') }}",
            type: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            beforeSend: function () {
                $('#main_loader').show();
            },
            success: function (data) {
                var url = "{{ asset('') }}";
                $("#updateId").val(data[0].id);
                $('#edit_news_title').val(data[0].title);
                CKEDITOR.instances['edit_news_description'].setData(data[0].description);
                $('#edit_news_image').attr('value', url + data[0].news_image);
                $('#edit_news_image').attr('default-value', url + data[0].news_image);
                $('#main_loader').hide();

            },
            error: function (error) {
                $('#main_loader').hide();
            }
        })
    }

    $('#edit_news_form_btn').click(function (e) {
        e.preventDefault();
        var form = $('#edit_news_form')[0];
        var data = new FormData(form);
        var description = CKEDITOR.instances['edit_news_description'].getData();
        data.append('description', description);
        $.ajax({
            url: "{{ route('news.update') }}",
            type: 'post',
            data: data,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function (data) {
                show_when_ajax_call('#edit_news_form_btn', 'edit_news_form','Update');
            },
            success: function (data) {
                console.log(data);
                if (data.status == 'success') {
                    close_modal('edit_news_modal');
                    remove_after_ajax_call('#edit_news_form_btn', 'edit_news_form', 'Update')
                    successMsg(data.message);
                    news_scope.ajax.reload();
                    close_modal('edit_news_modal')
                }
            },
            error: function (error) {
                show_errors_when_ajax_call('#edit_news_form_btn', 'edit_news_form', error );
            }
        })
    })


    $('#add_news_form_btn').click(function (e) {
        e.preventDefault();
        var form = $('#add_news_form')[0];
        var data = new FormData(form);
        var description = CKEDITOR.instances['description'].getData();
        data.append('description', description);
        $.ajax({
            url: "{{ route('storenews') }}",
            type: 'post',
            data: data,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function (data) {
                show_when_ajax_call('#add_news_form_btn', 'add_news_form');
            },
            success: function (data) {
                // console.log(data);
                if (data.status == 'success') {
                    close_modal('add_news');
                    remove_after_ajax_call('#add_news_form_btn', 'add_news_form')
                    successMsg(data.message);
                    news_scope.ajax.reload();
                    close_modal('add_news')
                }
            },
            error: function (error) {
                show_errors_when_ajax_call('#add_news_form_btn', 'add_news_form', error);
            }
        })
    })

    var dataTable

    $(document).ready(function () {
        loadDataTable();
    });
    $(document).ready(function () {
        news_scope = $('#news_scope').DataTable({
            "aaSorting": [],


            rowReorder: {
                selector: 'td:nth-child(2)'
            },

            ajax: {
                url: "{{ route('news.news_create') }}",
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
                    customize: function (win) {
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
                data: 'news_image',
                name: 'news_image'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'description',
                name: 'description'
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