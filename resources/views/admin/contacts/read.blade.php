
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Send mail</h5>
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


                </div>

                <!-- 2 columns widgets -->
                <div class="oneTwo">

                    <!-- Search -->

                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
            </div>

            <!-- Events calendar -->


            <!-- Media table -->


            <form action="{{route('admin.contacts.fuck')}}" class="form" method="get" id="index" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <div class="widget">
                        <div class="title"><img src="{{$adminUrl}}/images/icons/dark/list.png" alt="" class="titleIcon" /><h6 style="color: #015be2">{{$send->fullname}}</h6></div>
                        <div class="formRow">
                            <label>Tới:<span class="req"></span></label>
                            <div class="formRight"> <input id="name" style="color: #2e9ad0" name="name" type="text" value="{{$send->email}}" /></div>
                            <div class="clear"></div>
                        </div>



                        <div class="formRow">
                            <label>Chủ đề:<span class="req">*</span></label>
                            <div class="formRight"> <input name="subject" id="subject" type="text" value="" /></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label></label>
                            <div class="formRight"> <p style="font-size: large">{{$send->comment}}</p></div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label>Nội dung:<span class="req">*</span></label>
                            <div class="formRight">
                                <textarea rows="8" cols="" name="detail" id="editor1"  class="validate[required]" ></textarea>
                                <script type="text/javascript" >
                                    CKEDITOR.replace( 'editor1', {
                                        filebrowserBrowseUrl: '{{$adminUrl}}/js/ckfinder/ckfinder.html',
                                        filebrowserImageBrowseUrl: '{{$adminUrl}}/js/ckfinder/ckfinder.html?type=Images',
                                        filebrowserFlashBrowseUrl: '{{$adminUrl}}/js/ckfinder/ckfinder.html?type=Flash',
                                        filebrowserUploadUrl: '{{$adminUrl}}/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: '{{$adminUrl}}/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: '{{$adminUrl}}/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                    } );
                                </script>
                            </div><div class="clear"></div>
                        </div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Gởi mail" class="redB" /></div>
                </fieldset>
            </form>
            <script>
                $( document ).ready( function () {

                    $( "#index" ).validate( {
                        ignore: [],
                        debug: false,
                        rules: {
                            name: {
                                required: true,
                                maxlength: 100,
                            },
                            detail: {
                                required: function(){
                                    CKEDITOR.instances.detail.updateElement();
                                },
                                minlength: 5,
                            },
                            subject:{
                                required:true,

                            }
                        },
                        messages: {
                            name: {
                                required: "Vui lòng nhập vào đây",
                                maxlength: "Vui lòng nhập tối đa 100 ký tự",
                            },
                            detail: {
                                required: "Vui lòng nhập vào đây",
                                minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                            },
                            subject:{
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