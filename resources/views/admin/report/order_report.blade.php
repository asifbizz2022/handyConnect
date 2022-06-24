@extends('admin.layouts.main')
@section('content')
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
        data-menu="vertical-menu-modern" data-col="2-columns">
        <div id="reportrange"  class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
            <span></span> <b class="caret"></b>
        </div>
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-12 mb-2 mt-1">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">
                                    @lang('Order Report')</h5>
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

                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title titlefix">@lang('Order Report')</h3>
                                </div>
                                <div class="box-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="GET" action="{{route('admin.get_order_report')}}">
                                                @csrf
                                                <div class="row">
                                                  <div class="col-5">
                                                    <label for="startDate" class="">Start Date</label>
                                                    <input type="date" class="form-control" name="start_date" value="{{$date['start_date']}}">
                                                  </div>
                                                  <div class="col-5">
                                                    <label for="endDate" class="">End Date</label>
                                                    <input type="date" class="form-control" name="end_date" value="{{$date['end_date']}}">
                                                  </div>
                                                  <div class="col-2">
                                                    <label for="" class=""> </label>
                                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                                  </div>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                                    <div class="download_label">@lang('Sales Report') @lang('role.list')</div>
                                        <table id="sales_report" cellspacing="0" width="100%" class="text-center">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Cutomer Name</th>
                                                    <th>Service Title</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total = 0; ?>
                                                @foreach($reports as $report)
                                                <tr>
                                                    <td class="date">{{$report['created_at']}}</td>
                                                    <td>{{$report['Customer']['name']}}</td>
                                                    <td>{{$report['Service']['service_name']}}</td>
                                                    <td>{{$report['Service']['price']}}</td>
                                                    <td>{{$report['Status']['status_name']}}</td>
                                                </tr>
                                                <?php $total += $report['Service']['price']; ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer border-top pb-1" style="margin-left: 75%;">
                                        <h5>Total Sales</h5>
                                        <span class="text-primary text-bold-500">{{$total}}</span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Report Chart View for {{$date['start_date']}} to {{$date['end_date']}}</h5>
                        <div class="">
                            <canvas id="sales-report-Chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </body>
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Sales Report for <samp id="report-date"></samp></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="text-center"><i class="fa fa-spinner fa-spin" style="font-size:35px"></i></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@section('javascript')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script>
        var dataTable
        $(document).ready(function () {
            //getChartReport();
            sales_report = $('#sales_report').DataTable({
            "aaSorting": [],
            "paging": true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
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
            })
        });

        function getChartReport(){
            var value = [];
            var label = [];
            var color = [];
            var data = <?php echo json_encode($reports); ?>;
            $.each( data, function(key, values){
                value.push(values.total_sales_amount);
                label.push(values.date);
                color.push(generateRandomColor());
            });
            //Chart.js
            var ctx = document.getElementById('sales-report-Chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: label,
                datasets: [{
                    label: 'Total Sales',
                    backgroundColor: color,
                    barPercentage: 0.4,
                    data: value,
                }]
                },
                options: {
                    layout: {
                    padding: 15,
                    },
                    plugins: {
                    legend: {
                        display: false,
                    }
                    }
                }
            });
        }
        function generateRandomColor(){
            var r = () => Math.random() * 256 >> 0;
            return `rgba(${r()}, ${r()}, ${r()},0.8)`;
        }
        $(document).on("click","#report_view", function(){
            var date = $(this).data("date");
            $('#report-date').text(date);
        });

    </script>
@endsection
@endsection
