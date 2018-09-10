
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Quản lý user</h5>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="line"></div>

    <!-- Page statistics and control buttons area -->

    <div class="line"></div>

    <!-- Main content wrapper -->
    <div class="wrapper">

        <!-- Note --> @if (count($errors) > 0)
        <div class="nNote nInformation hideit">
            <p><strong>Thông báo:


                                @foreach ($errors->all() as $error)
                                   <strong style="color: red">{{ $error }}</strong>
                                @endforeach


                  </strong>

                </p>
        </div>
    @endif

    <!-- Chart -->


        <!-- Widgets -->
        <div class="widgets">
            <div class="oneTwo">

                <!-- Partners list widget -->


                <!-- Website stats widget -->


                <!-- Latest update widget -->

            </div>

            <!-- 2 columns widgets -->
            <div class="oneTwo">

                <!-- Search -->

                <!-- Purchase info widget -->


                <!-- New users widget -->


                <!-- My tasks table widget -->

                <div class="clear"></div>

            </div>
            <div class="clear"></div>
        </div>

        <!-- Events calendar -->


        <!-- Media table -->


            <form action="{{route('admin.user.store')}}" id="index" class="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <div class="widget">
                        <div class="title"><img src="{{$adminUrl}}/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Thêm user</h6></div>
                        <div class="formRow">
                            <label class="fix">Username<span class="req">*</span></label>
                            <div class="formRight"><input name="username" id="username" type="text" value=""  /></div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="fix">Password<span class="req">*</span> </label>
                            <div class="formRight"><input name="password" type="password" value="" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="fix">Fullname<span class="req">*</span></label>
                            <div class="formRight"> <input name="fullname" type="text" value="" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow" >
                            <labe class="fix"l>Email<span class="req">*</span></label>
                            <div class="formRight"> <input name="email" type="text" value="" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="fix">Avarta<span class="req">*</span></label>
                            <div class="formRight"> <input name="picture" type="file" value="" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="fix">Quyền<span class="req">*</span></label>
                            <div class="formRight">  <label style="display: inline">Mod</label>

                                <input style="display: inline" name="id_level"  type="radio" value="2" title="Mod" />
                                <label style="display: inline">Member</label>
                                <input style="display: inline" name="id_level"  type="radio" value="3" title="Member" /></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="submit" class="redB" /></div>
                </fieldset>
            </form>
        <script>
            $( document ).ready( function () {

                $( "#index" ).validate( {
                    ignore: [],
                    debug: false,
                    rules: {
                        username: {
                            required: true,
                            maxlength: 100,
                            minlength: 3,
                        },
                        password:{
                            required:true,
                            minlength: 5,

                        },
                        fullname:{
                            required:true,

                        },
                        id_level:{
                            required:true,

                        },
                        email:{
                            required:true,
                            email:true,
                            remote: "{{route('admin.user.AjaxCheckEmail')}}"
                        },
                    },
                    messages: {
                        username: {
                            required: "Vui lòng nhập vào đây",
                            maxlength: "Vui lòng nhập tối đa 100 ký tự",
                            minlength: "Vui lòng nhập tối thiểu 3 ký tự",
                        },
                        password: {
                            required: "Vui lòng nhập vào đây",
                            minlength: "Vui lòng nhập tối thiểu 5 ký tự",

                        },
                        fullname:{
                            required: "Vui lòng nhập vào đây",
                        },
                        id_level:{
                            required: "Vui lòng chọn 1",
                        },
                        email:{
                            required: "Vui lòng nhập vào đây",
                            email:"Email chưa đúng định dạng",
                            remote:"Email đã tồn tại",
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
        <!-- Dynamic table -->


    </div>

    <!-- Footer line -->
        @include('templates.admin.footer')

</div>

    @stop