
@extends('templates.admin.master')
@section('content')
    <div id="rightSide">
    @include('templates.admin.header')

    <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Quản lý subscribe</h5>
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
                <div class="title">
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
                    <thead>
                    <tr>
                        <th>ID review</th>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Review</th>
                        <th>Thời gian</th>
                    
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                        <tr class="gradeA">
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"  ></td>
                            <td class="center"></td>
                            <td></td>
                            
                            <td class="actBtns">
                                <a href="" title="Remove" class="tipS"><img src="{{$adminUrl}}/images/icons/remove.png" alt="" /></a>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>

            </div>

        </div>
       

       
        <!-- Footer line -->
        @include('templates.admin.footer')

    </div>
@stop
