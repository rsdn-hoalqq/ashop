
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Hòm thư</h5>
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
                        <th>Tác vụ khác</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            @php
                            $id=$item->id;
                            @endphp
                        <tr class="gradeA odd">
                            <td class="center"><p id="{{$id}}"  class="getTin">{{$item->id}}</p></td>
                            <td class="center"><p id="{{$id}}"  class="getTin">{{$item->fullname}}</p></td>
                            <td class="center"><p id="{{$id}}"  class="getTin">{{$item->email}}</p></td>
                            <td class="center"><p id="{{$id}}"  class="getTin">{{str_limit($item->comment,20)}}</p></td>
                            <td class="actBtns" id="reply">
                                @if($item->status==0)
                                    <a href="javascript:void (0)"  title="Chưa xem" id="{{$item->id}}" class="tipS"><img src="{{$adminUrl}}/images/icons/notifications/exclamation.png" alt="" /></a>
                                @elseif($item->status==1)
                                    <a href="javascript:void (0)"  title="Đã xem" id="{{$item->id}}" class="tipS"><img src="{{$adminUrl}}/images/icons/notifications/accept.png" alt="" /></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
        <p style="padding-left: 450px"><b>Lưu ý:</b> Tin sẽ được xóa sau 30 ngày.</p>
        <script>
            $(document).on('click', 'table tr td p', function(event) {
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
        <script>
            $(document).on('click', 'table tr td a', function(event) {
                var idRead = $(this).attr('id');
                var token=$("input[name='_token']").val();
                var this_button = $(this);

                if(idRead > 0){

                    $.ajax({
                        url: '{{route("admin.contacts.tick")}}',
                        type: 'POST',
                        dataType: 'json',
                        data: {"_token":token,idRead: idRead},
                    })
                        .done(function(data) {
                            console.log(data);
                            if (data.status) {
                                this_button.replaceWith(data.html);
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
