
<div class="products-grid">
    @foreach($arItems as $arItem)
        @php
            $name=$arItem->name;
            $pid=$arItem->pid;
            $name_slug=str_slug($name);
            $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'idzz'=>$pid]);
        @endphp
        <div class="grid_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="product_image"> <a href="{{$urlDetail}}"> <img src="{{$imgUrl}}/files/{{$arItem->image}}" alt=""> </a>
                <div class="action-buttons">
                    {{--<a class="btn-action wishlist" href="" title="Add To Wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>--}}
                    <a class="btn-action add-to-cart" href="javascript:void (0)" id="{{$pid}}" title="Mua"><span class="icon icon-cart" aria-hidden="true"></span></a>
                    <button type="button" class="btn-action btn-quickview" title="Xem" data-toggle="modal" data-target="#quickView-{{ $pid }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="product_detail">
                <h3 class="product_name"> <a href="{{$urlDetail}}">{{$arItem->name}}</a> </h3>
                <p>
                    {{--<label class="new">New</label>--}}
                @if($arItem->promotion_price==null)
                        <span class="product_price"><span> {!!number_format( $arItem->unit_price,0,",",".") !!} VND</span></span> </p>

                    @elseif($arItem->promotion_price!=null)
                        <span class="product_price"><span> {!!number_format( $arItem->promotion_price,0,",",".") !!} VND</span></span> </p>
                          <span class="product_price old_price"> <s> {!!number_format( $arItem->unit_price,0,",",".") !!} VND</s> </span>
                    @endif


            </div>
        </div>


    @endforeach
</div>
    @foreach($arItems as $arItem)
        @php
            $name=$arItem->name;
            $pid=$arItem->pid;
            $name_slug=str_slug($name);
            $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
        @endphp
        @include('templates.shop._modal')
    @endforeach
<script>

    $(document).ready(function () {

        $(".add-to-cart").click(function () {
            var idCart = $(this).attr('id');
            var token=$("input[name='_token']").val();
            $.ajax({
                url:'{{route('shop.cart.cart')}}',
                type:'get',
                cache:false,
                data:{"_token":token,"idCart":idCart},
                success:function (data) {
                    alert('Đặt hàng thành công');
                    window.location.reload();
                },
                error:function (data) {
                    alert('Sản phẩm tạm thời hết hàng');
                }
            });

        });
    });
</script>
{{ $arItems->links() }}
