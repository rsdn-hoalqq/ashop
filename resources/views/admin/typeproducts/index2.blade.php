
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Quản lý loại sản phẩm</h5>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        @if(Session::has('msg'))
            <div class="nNote nInformation hideit">
                <p><strong>Thông báo: </strong> {{Session::get('msg')}}</p>
            </div>
        @endif
        <div class="line"></div>

        <!-- Page statistics area -->


        <div class="line"></div>

        <!-- Main content wrapper -->
        <div class="wrapper">

            <!-- Dynamic table -->
            <div class="widget">
                <div class="title"><img src="{{$adminUrl}}/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Loại sản phẩm</h6>
                   <a  title="Thêm loại SP"  class="smallButton  " id="myBtn" style="margin: 5px;"><img src="{{$adminUrl}}/images/icons/color/plus.png" alt="" /></a>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
                    <thead>
                    <tr>
                        <th>Mã loại SP</th>
                        <th>Tên loại SP</th>
                        <th>Thuộc danh mục</th>
                        <th>Ngày thêm</th>

                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arItems as $arPro)
                    <tr class="gradeA">
                        <td class="center">{{$arPro->id}}</td>
                        <td class="center">{{$arPro->name}}</td>
                        <td class="center"  >{{$arPro->pname}}</td>
                        <td class="center">{{$arPro->created_at}}</td>

                        <td class="actBtns">
                            <a href="{{route('admin.typeproducts.edit',['id'=>$arPro->id])}}" title="Update" id="myBtn" class="tipS"><img src="{{$adminUrl}}/images/icons/edit.png" alt="" /></a>
                            <a href="{{route('admin.typeproducts.destroy',['id'=>$arPro->id])}}" title="Remove" class="tipS"><img src="{{$adminUrl}}/images/icons/remove.png" alt="" /></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('admin.typeproducts.store')}}" class="form" id="index" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="widget">
                                <div class="title"><img src="{{$adminUrl}}/images/icons/dark/record.png" alt="" class="titleIcon" /><h6>Thêm loại sản phẩm</h6><div class="num"> <span class="close">&times;</span></div></div>
                                <div class="formRow">
                                    <label>Tên loại sản phẩm:<span class="req">*</span></label>
                                    <div class="formRight"><input type="text" name="name" value="" /></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label>Thuộc danh mục:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <div class="floatL">
                                            <select name="producer_id" id="producer_id" class="validate[required]" >
                                                @foreach($arProducers as $arProducer)
                                                <option value="{{$arProducer->producer_id}}">{{$arProducer->produce_name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><div class="clear"></div>
                                </div>
                                <div class="formSubmit"><input class="blueB ml10" id="next1" value="Reset" type="reset" /></div>
                                <div class="formSubmit"><input type="submit" value="submit" class="redB" /></div>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
        <script>
            $( document ).ready( function () {

                $( "#index" ).validate( {
                    ignore: [],
                    debug: false,
                    rules: {
                        name: {
                            required: true,

                        },
                    },
                    messages: {
                        name: {
                            required: "Vui lòng nhập vào đây",

                        },

                    },
                });
            });
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <!-- Footer line -->
        @include('templates.admin.footer')

    </div>
    @stop
