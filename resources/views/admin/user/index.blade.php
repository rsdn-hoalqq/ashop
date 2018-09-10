@extends('templates.adminlte.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>Shop</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->
                    <div class="container">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="editor_create btn btn-info btn-lg ShowModalUser" >Thêm mới
                        </button>
                        <div class="modal fade" id="myModalUser" role="dialog">
                            <form id="FormUsers" action="" method="POST" data-url="{{route('admin.user.store')}}" data-editUrl="{{route('admin.user.update')}}" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="CreateU">
                                <input type="hidden" id="idOKU" name="id" value="">
                                {{csrf_field()}}
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title titleOKU">Thêm user</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="usr">Họ và tên:</label>
                                                <input type="text" name="fullname" class="form-control" id="fullname">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">Tên đăng nhập:</label>
                                                <input type="text" name="username" class="form-control" id="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Email:</label>
                                                <input type="email" name="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Mật khẩu:</label>
                                                <input type="password" name="password" class="form-control" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Nhập lại mật khẩu:</label>
                                                <input type="password" name="rePassword" class="form-control" id="rePassword">
                                            </div>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="2">
                                                        Mod
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="3">
                                                        Member
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="hinh" for="exampleInputFile">Hình ảnh</label>
                                                <input  type="file" id="exampleInputFile" name="picture">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-default BTNCreateU">Create</button>
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
                        @if(Session::has('msg'))
                            <div class="nNote nInformation hideit">
                                <p style="color: red"><strong>Thông báo: </strong> {{Session::get('msg')}}</p>
                            </div>
                    @endif
                    <!-- /.box-header -->
                        <style>
                            #Products tr td img{
                                width: 50px;
                                height: 30px;
                            }
                        </style>
                        <div class="box-body">
                            <table id="User" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Quyền</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Chức năng</th>

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