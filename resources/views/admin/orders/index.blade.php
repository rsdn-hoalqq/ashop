@extends('templates.adminlte.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Đơn hàng
                <small>Shop</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Đơn hàng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->
                    <div class="container">
                        <!-- Trigger the modal with a button -->

                        <div class="modal fade" id="myModalOrder" role="dialog">
                            <form id="FormOrder" action="{{route('admin.orders.data')}}" method="GET" data-show="{{route('admin.orders.show')}}" data-url="{{route('admin.orders.data')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="action" value="View">
                                <input type="hidden" id="idOrder" name="id" value="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title titleOK">Chi tiết đơn hàng</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group col-sm-6">
                                                <label for="usr">ID đơn hàng:</label>
                                                <input type="text" name="idbill" class="form-control" id="idbill" disabled>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="usr">Tên khách hàng</label>
                                                <input type="text" name="users" class="form-control" id="users" disabled>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="usr">Chi tiết sản phẩm mua:</label>
                                                <a   data-id="" class="editor_edit btn btn-primary showdetail" name="show" id="" data-type="View">View</a>
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <label for="usr">Tỉnh</label>
                                                <input type="text" name="tinh" class="form-control" id="tinh" disabled>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="usr">Huyện</label>
                                                <input type="text" name="huyen" class="form-control" id="huyen" disabled>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="usr">Xã</label>
                                                <input type="text" name="xa" class="form-control" id="xa" disabled>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="usr">SĐT</label>
                                                <input type="text" name="sdt" class="form-control" id="sdt" disabled>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="usr">Địa chỉ nhà</label>
                                                <input type="text" name="diachi" class="form-control" id="diachi" disabled>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="usr">Tổng thanh toán</label>
                                                <input type="text" name="tongtien" class="form-control" id="tongtien" disabled>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            <table id="Order" class="table table-bordered table-striped">
                                <thead>
                                <tr >
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <th class="text-center">Thời gian</th>
                                    <th class="text-center">Trạng thái</th>
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

            <div id="classModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="classModalLabel">
                                Chi Tiết Đơn hàng
                            </h4>
                        </div>
                        <div class="modal-body">
                            <table id="classTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Giá giảm</th>
                                    <th>Số lượng</th>
                                    <th>Hình ảnh</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>


@stop
