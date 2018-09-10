@include('templates.shop.header')

    <!-- SITE MAIN CONTENT -->
    <main class="main-content">
        <!-- BREADCRUMB -->
        <div class="bredcrumbWrap">
            <div class="container">
                <nav class="breadcrumb"> <a href="http://adornthemes.com/" title="Back to the home page">Trang chủ</a><span aria-hidden="true">›</span><span>Giỏ hàng</span></nav>
            </div>
        </div>
        <div class="container">
            <h1 class="pageTitle">Giỏ hàng của tôi</h1>


            <form action="" method="post" enctype="multipart/form-data" novalidate class="cart table-wrap">
                {{csrf_field()}}
                <table class="cart-table full table--responsive">
                    <thead class="cart__row cart__header-labels">
                    <tr>
                        <th colspan="2" class="text-center">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody class="dataUpdate">
                    {{--ajax đâu--}}
                    @foreach($content as $item)
                        @php
                            $name=$item->name;
                            $pid=$item->id;
                            $name_slug=str_slug($name);
                            $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
                        @endphp

                    <tr class="cart__row">
                        <td><a href="{{route('shop.cart.delete',['id'=>$item->rowId])}}"  title="Remove"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="{{$urlDetail}}" class="cart__image"> <img src="{{$imgUrl}}/files/{{$item->options->img}}" alt=""> </a>
                            <a  class="update-cart" id="{{$item->rowId}}" title="Update"><i class="fa fa-upload" aria-hidden="true"></i></a >
                        </td>

                        <td> {!! $item->name !!}<br >

                            @if($item->options->soluong>10)
                                <small>{{$item->options->type_pro}}</small>
                                <p	class="cart-variant" style="color: #c59c20;">✓ Còn hàng </p>
                                @elseif($item->options->soluong <=10)
                                <small>{{$item->options->type_pro}}</small>
                                <p	class="cart-variant" style="color: #c59c20;">Chỉ còn {{$item->options->soluong}} sản phẩm trong kho </p>
                                @endif
                           </td>
                        <td data-label="Price" class="price">{!!number_format( $item->price,0,",",".") !!}VND</td>
                        <td data-label="Quantity" class="qty"><div class="input-group spinner number">
                                <button class="spinbtn btnminus" type="button">
                                    <span aria-hidden="true" class="icon icon-minus"></span>
                                </button>
                                @if($item->qty>$item->options->soluong)

                                    <input type="text" class=" txt-qty" value="{!! $item->qty = $item->options->soluong!!}">
                                    @elseif($item->qty<=$item->options->soluong)
                                <input type="text" class=" txt-qty" value="{!! $item->qty !!}">
                                @endif

                                <button class="spinbtn btnplus" type="button">
                                    <span aria-hidden="true" class="icon icon-plus"></span>
                                </button>
                            </div></td>
                        <td data-label="Total" class="text-right">{!!number_format( $item->price*$item->qty,0,",",".") !!} VND</td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="row cart__row">

                    <div class="col-sm-4 col-lg-5">


                        <!--[if lte IE 8]>
                        <style> #shipping-calculator { display: none; } </style>
                        <![endif]-->

                    </div>
                    <div class="col-sm-4 col-lg-3	text-right pull-right cat-total">
                        <p> {{\Gloudemans\Shoppingcart\Facades\Cart::count()}} SẢN PHẨM</p>
                        <p><span class="cart__subtotal-title">Tổng tiền</span> <span class="h3 cart__subtotal"><span class=money>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></span></p>
                        <p><em>(Tổng số tiền thanh toán)</em></p>

                        <button name="checkout" class="btn" type="button" OnClick="location.href='{{route('shop.cart.checkout')}}'">Thanh toán</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
    var UrLAjax = '{{route('shop.cart.update')}}';
</script>
    <!-- SITE FOOTER -->
   @include('templates.shop.footer')
