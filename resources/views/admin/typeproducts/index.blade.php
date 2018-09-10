@extends('templates.adminlte.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Loại
            <small>Sản phẩm</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Loại</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->
                <div class="container">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="editor_create btn btn-info btn-lg ShowModal">Thêm
                        mới
                    </button>

                    <div class="modal fade" id="myModalType" role="dialog">
                        <form id="FormType" action="" data-url="{{route('admin.typeproducts.store')}}" data-editUrl="{{route('admin.typeproducts.update')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="action" value="Create">
                            <input type="hidden" id="idOK" name="id" value="">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title titleOK">Thêm loại</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="usr">Name:</label>
                                            <input required minlength="5" maxlength="100" type="text" name="name" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label id="hinh" for="exampleInputFile">Hình ảnh</label>
                                            <input  type="file" id="exampleInputFile" name="picture">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Danh mục:</label>
                                            <select required name="producer_id" id="producer_id" class="form-control" >
                                                <option value="">--Chọn danh mục---</option>
                                                @foreach($arProducers as $arProducer)
                                                <option value="{{$arProducer->producer_id}}">{{$arProducer->produce_name}}</option>
                                                @endforeach
                                            </select>
                                            {{--<input type="email" name="userEmail" class="form-control" id="userEmail">--}}
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default BTNcreatetype">Create</button>
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
                    <div class="box-body">
                        <table id="dataType" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên loại</th>
                                    <th>Logo</th>
                                    <th>Danh muc</th>
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

<script type="text/javascript">

</script>
@stop