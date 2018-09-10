
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Quản lý danh mục</h5>
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


            <form action="" class="form" method="post" id="index" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <div class="widget">
                        <div class="title"><img src="{{$adminUrl}}/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Sửa danh mục</h6></div>
                        <div class="formRow">
                            <label>Mã danh mục<span class="req">*</span></label>
                            <div class="formRight"><input name="username" id="username" type="text" value="{{$arItems->producer_id}}" readonly /></div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow">
                            <label>Tên danh mục<span class="req">*</span></label>
                            <div class="formRight"> <input name="produce_name" type="text" value="{{$arItems->produce_name}}" /></div>
                            <div class="clear"></div>
                        </div>

                    </div>
                    <div class="formSubmit"><input class="blueB ml10" id="next1" value="Reset" type="reset" /></div>
                    <div class="formSubmit"><input type="submit" value="submit" class="redB" /></div>
                </fieldset>
            </form>
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
            <!-- Dynamic table -->


        </div>

        <!-- Footer line -->
        @include('templates.admin.footer')

    </div>

@stop