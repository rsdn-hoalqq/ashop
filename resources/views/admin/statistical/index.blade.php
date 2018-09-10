@extends('templates.adminlte.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thống kê
                <small>Sản phẩm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Danh mục</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Thống kê theo ngày</h3>
                        </div>
                        <!-- /.box-header -->
                        <style>
                            table tr td{
                                text-align: center;
                            }
                        </style>
                        <div class="box-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr >
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Ngày bán</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Số Lượng</th>

                                </tr>


                                {{--</thead>--}}
                                <tbody>
                                {{--{{ \Carbon\Carbon::createFromTimestamp(strtotime($getCount->created_at))->diffForHumans()  }}--}}
                                @foreach($getDate as $getCount)
                                    <tr>
                                        <td>{{$getCount->id_detail}}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($getCount->created_at))->diffForHumans()  }} ( {{$getCount->created_at}} )</td>
                                        <td>{{$getCount->name}}</td>
                                        <td>{{$getCount->quantity}}</td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <h3>Tổng số sản phẩm đã bán: {{$sumDate}}</h3>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Thống kê theo tháng</h3>
                        </div>
                        <!-- /.box-header -->
                        <style>
                            table tr td{
                                text-align: center;
                            }
                        </style>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr >
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Ngày bán</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Số Lượng</th>

                                </tr>
                                </thead>
                                <tbody>
                                {{--{{ \Carbon\Carbon::createFromTimestamp(strtotime($gets->created_at))->diffForHumans() }}--}}
                                @foreach($getMonth as $gets)
                                    <tr>
                                        <td>{{$gets->id_detail}}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($gets->created_at))->diffForHumans() }} ( {{$gets->created_at}} )</td>
                                        <td>{{$gets->name}}</td>
                                        <td>{{$gets->quantity}}</td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <h3>Tổng số sản phẩm đã bán: {{$sumMonth}}</h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Thống kê theo Năm</h3>
                        </div>
                        <!-- /.box-header -->
                        <style>
                            table tr td{
                                text-align: center;
                            }
                        </style>
                        <div class="box-body">
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Ngày bán</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Số Lượng</th>

                                </tr>


                                </thead>
                                <tbody>
                                @foreach($getYear as $getY)
                                    <tr>

                                        <td>{{$getY->id_detail}}</td>
                                        <td> {{ \Carbon\Carbon::createFromTimestamp(strtotime($getY->created_at))->diffForHumans() }} ( {{$getY->created_at}} )</td>
                                        <td>{{$getY->name}}</td>
                                        <td>{{$getY->quantity}}</td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <h3>Tổng số sản phẩm đã bán: {{$sumYear}}</h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


@stop