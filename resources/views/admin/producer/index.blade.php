@extends('templates.adminlte.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Mục
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
                <div class="container">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="editor_create btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm mới</button>
                    <div class="modal fade" id="myModal" role="dialog">
                        <form id="FormUser" action="" method="POST">
                            {{csrf_field()}}
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title titleOK">Thêm danh mục</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="usr">Name:</label>
                                            <input type="text" name="userName" class="form-control" id="usr">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default BTNSubmit BTNcreate">Create</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
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
                    <table id="producer" class="table table-bordered table-striped">
                        <thead>
                            <tr >
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Chức năng</th>
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