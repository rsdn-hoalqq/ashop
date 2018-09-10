<div class="row">
    <div class="col-sm-3 sidebar"><!-- Categories -->

        <div class="sidebar_widget">
            <div class="widget-title">
                <h3>Thương Hiệu</h3>
            </div>
            <div class="widget-content">
                <ul class="sidebar_categories">

                    @if(isset($aaaa))
                    @foreach(\App\Model\Producer::find($aaaa->producer_id)->post as $types)
                            @php
                                $id_2=$types->id;
                                $name=$types->name;
                                $name_slug=str_slug($name);

                                $url=route('shop.products.index',['slug'=>$name_slug,'id'=>$id_2]);
                            @endphp
                    <li><a href="{{$url}}" title="">{{$types->name}}</a>  <span>({{\Illuminate\Support\Facades\DB::table('products')->where('id_type',$types->id)->count()}})</span></li>

                    @endforeach
                        @endif

                </ul>
            </div>
        </div>

        <!-- Product Filters -->

        <div class="sidebar_widget">
            <div class="widget-title">
                <h3>Product Filters</h3>
            </div>
            <div class="widget-content">
                <div class="sidebar_tags">
                    <h4>Price</h4>
                    <ul class="findSearch">
                        <li>
                            <input type="radio" name="frice" class="checkbox price" value="5" id="price0" />
                            <label for="price0"><span></span>Dưới 1 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="frice"  class="checkbox price" value="6" id="price2"/>
                            <label for="price2"><span></span>Từ 1 - 3 triệu </label>
                        </li>
                        <li>
                            <input type="radio" name="frice" class="checkbox price" value="7" id="price4"/>
                            <label for="price4"><span></span>Từ 3 - 7 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="frice" class="checkbox price" value="8" id="price6"/>
                            <label for="price6"><span></span>Từ 7 - 10 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="frice" class="checkbox price" value="9" id="price8"/>
                            <label for="price8"><span></span>Trên 10 triệu</label>
                        </li>
                    </ul>


                    <h4>Brand</h4>
                    <ul class="findSearch">
                        @foreach(\App\Model\Producer::find($aaaa->producer_id)->post as $types)
                            @php
                                $id_1=$types->id;
                                $name=$types->name;
                                $name_slug=str_slug($name);

                                $url=route('shop.products.index',['slug'=>$name_slug,'id'=>$id_1]);
                            @endphp
                        <li>
                            <input  type="checkbox" name="brand" value="{{$types->id}}" id="brand{{$types->id}}"/>
                            <label for="brand{{$types->id}}"> <span></span>{{$types->name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $(document).on('change','.findSearch input , #SortBy',function(){
                    var curl = '{{ route("shop.products.index", [$slug, $id])  }}';
                    var price = $('.findSearch input[type=radio]:checked').val();
                    var page = $('.pagination li.active>span').text();
                    page =  (parseInt(page));
                    var brand = [];
                    $('.findSearch input[type=checkbox]:checked').each(function () {
                              brand.push(this.value);
                        });
                    var SortBy = $('#SortBy').val();
                    $.ajax({
                        url: curl,
                        type: 'GET',
                        dataType: 'json',
                        data: {price:price,brand:brand,order_id:SortBy,page:page },
                        success: function (result) {
                              if(result.status) {
                                $('.list-product').html(result.html);
                            }
                        }
                    });
                });
                // $('input[type="radioss"]').click(function () {
                //     price=$(this).val();
                //     curl = '{{ route("shop.products.index", [$slug, $id])  }}' + '?price=' + price + '&order_id=' + order_id;
                //     $.ajax({
                //         url: curl,
                //         type: 'GET',
                //         dataType: 'json',
                //         success: function (result) {
                //             if(result.status) {
                //                 $('.list-product').html(result.html);
                //             }
                //         }
                //     });
                // })
            })
        </script>
    
        <!-- Featured Product Carousel-->



        <!-- Static Block Banner-->

        <div class="static-banner-block"> <a href="#"> <img src="{{$publicUrl}}/images/static_banner.jpg" alt="" /> </a> </div>

        <!-- CMS Block-->

        {{--<div class="sidebar_widget">--}}
            {{--<div class="widget-title">--}}
                {{--<h3> Static Block</h3>--}}
            {{--</div>--}}
            {{--<div class="widget-content">--}}
                {{--<p>Static Text Block(CMS) displayed at the left side of collection page.you can put here your own text,images,a tag.. </p>--}}
                {{--<p>You can manage this text block from admin panel sidebar.</p>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- All Product Tags -->

        {{--<div class="sidebar_widget">--}}
            {{--<div class="widget-title">--}}
                {{--<h3>Tags</h3>--}}
            {{--</div>--}}
            {{--<div class="widget-content">--}}
                {{--<ul class="product-tags">--}}
                    {{--<li class="filter--active"> </li>--}}
                    {{--<li> <a href="#" title="Show products matching tag $100 - $300">$100 - $300</a> </li>--}}
                    {{--<li> <a href="#" title="Show products matching tag $1000 - $1500">$1000 - $1500</a> </li>--}}

                {{--</ul>--}}
                {{--<span class="btn btnview">View All </span>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>