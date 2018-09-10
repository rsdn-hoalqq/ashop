<div class="widget" id="ajax" >
    <div class="title">
    <img src="{{$adminUrl}}/images/icons/dark/money.png" alt="" class="titleIcon" />
    <h6>Email</h6>
    <div class="topIcons">
    {{--<a href="#" class="tipS" title="Download statement"><img src="{{$adminUrl}}/images/icons/downloadTop.png" alt="" /></a>--}}
    {{--<a href="#" class="tipS" title="Print invoice"><img src="{{$adminUrl}}/images/icons/printTop.png" alt="" /></a>--}}
    <a href="{{route('admin.contacts.dell',['id'=>$detailRead->id])}}" class="tipS" title="Xóa"><img src="{{$adminUrl}}/images/icons/dropped.png" alt="" /></a>
    </div>
    </div>
    <div class="newOrder">
    <div class="userRow">
    <a href="#" title=""><img src="{{$adminUrl}}/images/user.png" alt="" class="floatL" /></a>
    <ul class="leftList">
    <li><a href="#" title="" id="name"><strong>{{ $detailRead->fullname }}</strong></a></li>
    <li>Email: {{ $detailRead->email }}</li>
    </ul>
    <ul class="rightList">
    <li><a href="#" title=""> <strong>#{{ $detailRead->id }}</strong></a></li>
    {{--<li class="orderIcons"><span class="oUnfinished"></span><span class="oShipped tipN" title="Shipped on Feb 2nd, 2012"></span><span class="oPaid tipN" title="Paid on Feb 1st, 2012"></span></li>--}}
    </ul>
    <div class="clear"></div>
    </div>

    <div class="cLine"></div>

    <div class="orderRow">
    <ul class="leftList">
    <li>Thời gian:</li>
    <li>Số điện thoại:</li>
    <li>Nội dung:</li>
    </ul>
    <ul class="rightList">
    <li><strong>{{ $detailRead->created_at }}</strong> </li>
    <li><strong class="green">0{{ $detailRead->phone }}</strong></li>
    <li>
    <strong class="orange">
        {{ $detailRead->comment }}
    </strong></li>
    </ul>
    <div class="clear"></div>
    </div>

    <div class="cLine"></div>
    <div class="totalAmount"><h6 class="floatL blue">Nhấn vào đây để <a href="{{route('admin.contacts.read',['sends'=>$detailRead->id])}}" style="text-decoration: underline">Trả lời</a></h6><h6 class="floatR blue">$12,157.99</h6><div class="clear"></div></div>
    </div>
</div>

