@extends('admin.layouts.admin')
@section('breadcrumb_lv1', 'Dashboard')
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Booking::where('type', 1)->count() }}</h3>

                    <p>Đặt bàn mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Booking::where('type', 0)->count() }}</h3>

                    <p>Số lượng món mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\User::where('role_id', '!=', 1)->whereDate('created_at', \Carbon\Carbon::now())->count() }}</h3>

                    <p>Người dùng mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header row d-flex">
                    <div class="col-4 flex-nowrap align-items-center d-flex font-weight-bold mr-2">
                        @csrf
                        <p style="width: 25%" class="mr-1">Từ ngày:</p>
                        <input type="date" id="dateFrom" class="form-row form-control">
                    </div>
                    <div class="col-4 flex-nowrap align-items-center d-flex font-weight-bold mr-2">
                        <p class="mr-2" style="width: 25%">Đến ngày:</p>
                        <input type="date" id="dateTo" class="form-row form-control">
                    </div>
                    <div class="col-3 flex-nowrap align-items-center d-flex font-weight-bold mr-2">
                        <button type="submit" id="btn_sort" class="btn btn-success">Lọc kết quả</button>
                        {{--                        <label class="col-12">{{__('admin_home.filter_the')}}</label>--}}
                        {{--                        <select class="p-2 form-row form-control col-8" id="selectSort">--}}
                        {{--                            <option value="">----------Select----------</option>--}}
                        {{--                            <option value="day">{{__('admin_home.sub7day')}}</option>--}}
                        {{--                            <option value="lastmonth">{{__('admin_home.last_month')}}</option>--}}
                        {{--                            <option value="thismonth">{{__('admin_home.this_month')}}</option>--}}
                        {{--                            <option value="month">{{__('admin_home.sub12month')}}</option>--}}
                        {{--                        </select>--}}
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart"
                             style="position: relative; height: 500px;">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 500px;"></canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </section>
    </div>
    <!-- /.row (main row) -->
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                url: '{{auth()->user()->role_id == 3 ? route('staff.report') : route('admin.report')}}',
                method: 'GET',
                success: function (result) {
                    chartData(result.date, result.data)
                }
            })
        })
        $('#btn_sort').on('click', function () {
            var dateTo = $('#dateTo').val();
            var dateFrom = $('#dateFrom').val();
            var token = $('input[name="_token"]').val()
            $.ajax({
                url: '{{auth()->user()->role_id == 3 ? route('staff.report') : route('admin.report')}}',
                method: 'GET',
                data: {
                    dateFrom: dateFrom,
                    dateTo: dateTo,
                },
                success: function (result) {
                    removeCanvas();
                    chartData(result.date, result.data);
                }
            });
        })

        function chartData(dates, datas) {
            var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
            var lable = [];
            var data = [];
            for (var i = 0; i < dates.length; i++) {
                lable.push(dates[i]);
                data.push(datas[i]);
            }
            console.log(lable)
            var salesChartData = {
                labels: lable,
                datasets: [
                    {
                        label: 'Doanh thu',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: data
                    }
                ]
            }
            var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            })
        }

        function removeCanvas() {
            $('#revenue-chart-canvas').remove();
            $('#revenue-chart').append('<canvas id="revenue-chart-canvas" height="300" style="height: 500px;"></canvas>');
        }
    </script>
@endpush
