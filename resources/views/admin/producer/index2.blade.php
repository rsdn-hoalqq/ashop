
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Quản lý danh mục sản phẩm</h5>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <!-- Note -->
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
                <div class="title"><img src="{{$adminUrl}}/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Danh mục sản phẩm</h6>
                    <a  id="myBtn" title="Thêm danh mục SP"  class="smallButton" style="margin: 5px;"><img src="{{$adminUrl}}/images/icons/color/plus.png" alt="" /></a>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
                    <thead>
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>

                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arItems as $arPro)
                        <tr class="gradeA">
                            <td class="center">{{$arPro->producer_id}}</td>
                            <td class="center">{{$arPro->produce_name}}</td>
                            <td class="actBtns">
                                <a href="{{route('admin.producer.edit',['id'=>$arPro->producer_id])}}" title="Update" id="myBtn" class="tipS"><img src="{{$adminUrl}}/images/icons/edit.png" alt="" /></a>
                                <a href="{{route('admin.producer.destroy',['id'=>$arPro->producer_id])}}" title="Remove"><img src="{{$adminUrl}}/images/icons/remove.png" alt="" /></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('admin.producer.store')}}" id="index" class="form" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="widget">
                                <div class="title"><img src="{{$adminUrl}}/images/icons/dark/record.png" alt="" class="titleIcon" /><h6>Thêm danh mục</h6><div class="num"> <span class="close">&times;</span></div></div>
                                <div class="formRow">
                                    <label>Tên danh mục:</label>
                                    <div class="formRight"><input type="text" name="produce_name" value="" /></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formSubmit"><input type="submit" value="Lưu" class="redB" /></div>
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
                        produce_name: {
                            required: true,

                        },
                    },
                    messages: {
                        produce_name: {
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
        <!-- The Modal -->


        <!-- Footer line -->
        @include('templates.admin.footer')

    </div>
@stop
