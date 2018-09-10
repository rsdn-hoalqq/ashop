@if($item->status==0)
    <a href="javascript:void (0)"  title="Chưa xem" id="{{$item->id}}" class="tipS"><img src="{{$adminUrl}}/images/icons/notifications/exclamation.png" alt="" /></a>
@elseif($item->status==1)
    <a href="javascript:void (0)"  title="Đã xem" id="{{$item->id}}" class="tipS"><img src="{{$adminUrl}}/images/icons/notifications/accept.png" alt="" /></a>
@endif
