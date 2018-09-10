
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Quản lý sản phẩm</h5>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <div class="line"></div>

        <!-- Page statistics area -->
        @if(Session::has('msg'))
            <div class="nNote nInformation hideit">
                <p><strong>Thông báo: </strong> {{Session::get('msg')}}</p>
            </div>
        @endif
        <div class="line"></div>
        <!-- Main content wrapper -->
        <div class="wrapper">

            <div class="widget">
                <div class="title"><img src="{{$adminUrl}}/images/icons/dark/full2.png" alt="" class="titleIcon" />
                    <a  href="{{route('admin.products.create')}}" title="Thêm  SP"  class="smallButton  " id="myBtn" style="margin: 5px;"><img src="{{$adminUrl}}/images/icons/color/plus.png" alt="" /></a>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
                    <thead>
                    <tr>
                        <th id="example">Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>
                        <th>Chi tiết</th>
                        <th>Đơn giá</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Hình ảnh</th>
                        <th>Ngày thêm</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arPros as $arPro)
                    <tr class="gradeA">
                        <td class="center">{{$arPro->pid}}</td>
                        <td > {{$arPro->proname}}</td>
                        <td class="center">{{$arPro->cname}}</td>
                        <td class="center">{{$arPro->pname}}</td>
                        <td>{!!  str_limit($arPro->description,15)!!}</td>
                        <td>{!!str_limit($arPro->detail,50)!!}</td>
                        <td class="center">{{$arPro->unit_price}}</td>
                        <td class="center">{{$arPro->promotion_price}}</td>
                        <td class="center">{{$arPro->soluong}}</td>
                        <td class="center"><img style="width: 70px;height: 70px" src="{{$imgUrl}}/files/{{$arPro->image}}"></td>
                        <td>{{$arPro->created_at}}</td>
                        <td class="actBtns">
                           <a href="{{route('admin.products.edit',['id'=>$arPro->pid])}}" title="Update" id="btnEdit" class="tipS"><img src="{{$adminUrl}}/images/icons/edit.png" alt="" /></a>
                            <a href="{{route('admin.products.destroy',['id'=>$arPro->pid])}}" title="Remove" class="tipS"><img src="{{$adminUrl}}/images/icons/remove.png" alt="" /></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>



        </div>





        <!-- Footer line -->
        @include('templates.admin.footer')

    </div>
    @stop
