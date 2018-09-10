@extends('templates.adminlte.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Khách hàng
                <small>Shop</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Khách hàng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Thống kê</h3>
                        </div>
                        <!-- /.box-header -->
                        <style>
                            table tr td{
                                text-align: center;
                            }
                        </style>
                        <div class="box-body">
                            <table id="account" class="table table-bordered table-striped">
                                <thead>
                                <tr >
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tên khách hàng</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">SĐT</th>
                                    <th class="text-center">Ngày thêm</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
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
