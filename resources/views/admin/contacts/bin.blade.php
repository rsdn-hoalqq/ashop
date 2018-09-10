
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Thùng rác</h5>
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

                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
                    {{csrf_field()}}
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Ngày xóa</th>
                        <th>Tác vụ khác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        @php
                            $id=$item->id;
                        @endphp
                        <tr class="gradeA odd">
                            <td class="center"><a id="{{$id}}"  class="getTin">{{$item->id}}</a></td>
                            <td class="center"><a id="{{$id}}"  class="getTin">{{$item->fullname}}</a></td>
                            <td class="center"><a id="{{$id}}"  class="getTin">{{$item->email}}</a></td>

                            <td class="center"><a id="{{$id}}"  class="getTin">{{str_limit($item->comment,20)}}</a></td>
                            <td class="center"><a id="{{$id}}"  class="getTin">{{$item->deleted_at}}</a></td>
                            <td class="actBtns">
                                <a href="{{route('admin.contacts.back',['id'=>$id])}}" title="Không phải thùng rác" id="btnEdit" class="tipS"><img src="{{$adminUrl}}/images/icons/notifications/information.png" alt="" /></a>
                                    <a href="{{route('admin.contacts.focusDell',['id'=>$id])}}" title="Xóa" id="btnEdit" class="tipS"><img src="{{$adminUrl}}/images/icons/notifications/exclamation.png" alt="" /></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <script>
            $(document).on('click', 'table tr td a', function(event) {
                var idRead = $(this).attr('id');
                var token=$("input[name='_token']").val();
                if(idRead > 0){
                    $.ajax({
                        url: '{{route("admin.ajax.load")}}',
                        type: 'POST',
                        dataType: 'json',
                        data: {"_token":token,idRead: idRead},
                    })
                        .done(function(data) {
                            console.log(data);
                            if (data.status) {
                                $("#ajax").replaceWith(data.html);
                            }

                        })
                }
            });
        </script>
        {{--read--}}
        <div id="ajax"></div>



        <!-- Footer line -->
        @include('templates.admin.footer')

    </div>
@stop
