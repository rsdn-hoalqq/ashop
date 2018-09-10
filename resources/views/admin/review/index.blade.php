@extends('templates.adminlte.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bình luân
            <small>Sản phẩm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Bình luận</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thống kê review</h3>
                    </div>
                    <!-- /.box-header -->
                    <style>
                    table tr td{
                        text-align: center;
                    }
                </style>
                <div class="box-body">
                    <table id="review" class="table table-bordered table-striped">
                        <thead>
                            <tr >
                                <th class="text-center">ID RV</th>
                                <th class="text-center">ID Sản phẩm</th>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Bình luận</th>
                                <th class="text-center">Thời gian</th>
                                <th class="text-center">Trạng thái</th>
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