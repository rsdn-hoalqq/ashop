
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


            <form action="{{route('admin.user.update',['id'=>$arItems->id])}}" id="index" class="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <div class="widget">
                        <div class="title"><img src="{{$adminUrl}}/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Sửa user</h6></div>
                        <div class="formRow">
                            <label class="fix">Username<span class="req">*</span></label>
                            <div class="formRight"><input name="username" id="username" type="text" value="{{$arItems->username}}" readonly /></div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="fix">Password<span class="req">*</span> </label>
                            <div class="formRight"><input name="password" type="password" value="{{$arItems->password}}" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="fix">Email<span class="req">*</span> </label>
                            <div class="formRight"><input name="email" type="text" value="{{$arItems->email}}"  readonly/></div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="fix">Fullname<span class="req">*</span></label>
                            <div class="formRight"> <input name="fullname" type="text" value="{{$arItems->fullname}}" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <labe class="fix">Avata:</label> <br>
                            <img style="width: 20%;height: 20%; padding-left: 160px" src="{{$imgUrl}}/files/{{$arItems->images}}">
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="fix">New Avata<span class="req">*</span></label>
                            <div class="formRight"> <input name="picture" type="file" value="" /></div>
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

                        }
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
                        }
                    },
                });
            });
        </script>
        <!-- Dynamic table -->


    </div>

    <!-- Footer line -->
        @include('templates.admin.footer')

</div>

    @stop