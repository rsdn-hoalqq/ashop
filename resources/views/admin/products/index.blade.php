@extends('templates.adminlte.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm
            <small>Shop</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->
                <div class="container">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="editor_create btn btn-info btn-lg ShowModalProducts" >Thêm mới</button>

                    <div class="modal fade" id="myModalProducts" role="dialog">
                        <form id="FormProducts" action="" data-url="{{route('admin.products.store')}}" data-editUrl="{{route('admin.products.update')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="action" value="CreateP">
                            <input type="hidden" id="idOKP" name="id" value="">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title titleOKP">Thêm sản phẩm</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="usr">Tên:</label>
                                            <input required minlength="5" maxlength="100" type="text" name="ten" class="form-control" id="ten">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Danh mục:</label>
                                            <select required name="producer_id" id="producer_id" class="form-control" >
                                                <option value="">--Chọn danh mục---</option>
                                                @foreach($arProducers as $arProducer)
                                                    <option value="{{$arProducer->producer_id}}">{{$arProducer->produce_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Loại:</label>
                                            <select required name="id_type" id="id_type" class="form-control" >
                                                <option value="">--Chọn loại---</option>
                                                @foreach($TypeProducts as $arTypeProducts)
                                                    <option value="{{$arTypeProducts->id}}">{{$arTypeProducts->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  for="pwd">Đơn giá:</label>
                                            <input required type="number" name="gia" class="form-control" id="gia">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Giá giảm:</label>
                                            <input required type="number" name="giam" class="form-control" id="giam">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Số lượng:</label>
                                            <input required type="number" name="sl" class="form-control" id="sl">
                                        </div>
                                        <div class="form-group">
                                            <label id="hinh" for="exampleInputFile">Hình ảnh</label>
                                            <input  type="file" id="exampleInputFile" name="picture">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả:</label>
                                            <textarea required class="form-control" name="mota" id="mota" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết:</label>
                                            <textarea required class="form-control" name="chitiet" id="chitet" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default BTNCreateProducts kill">Create</button>
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
                        #Products tr td img{
                            width: 50px;
                            height: 30px;
                        }
                    </style>
                    <div class="box-body">
                        <table id="Products" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phâm</th>
                                <th>Danh mục</th>
                                <th>Đơn giá</th>
                                <th>Giảm giá</th>
                                <th>Số lượng</th>
                                <th>Hình ảnh</th>
                                <th>Ngày Thêm</th>
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