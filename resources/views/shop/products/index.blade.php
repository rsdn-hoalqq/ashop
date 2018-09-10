@extends('templates.shop.master')
@section('content')
    <main class="main-content">
        <div class="bredcrumbWrap">
            <div class="container">
                <nav class="breadcrumb"><a href="/" title="Back to the home page">Home</a> <span
                            aria-hidden="true">&rsaquo;</span> <span>{{isset($arTypes) ? $arTypes->name : ''}}</span>

                </nav>
            </div>
        </div>
        <div class="container">
            @include('templates.shop.lefbar')
            <div class="col-sm-9 main-col">
                {{--<header class="page-header">--}}
                {{--<div class="category_banner">--}}
                {{--<section class="flexslider mb30">--}}
                {{--<ul id="slider" class="slides">--}}
                {{--<li class="item"> <a href="#"> <img src="{{$publicUrl}}/images/category-banner-1.jpg" class="slide-img" alt="" /> </a> </li>--}}
                {{--<li class="item"> <a href="#"> <img src="{{$publicUrl}}/images/category-banner-2.jpg" class="slide-img" alt="" /> </a> </li>--}}
                {{--<li class="item"> <a href="#"> <img src="{{$publicUrl}}/images/category-banner-3.jpg" class="slide-img" alt="" /> </a> </li>--}}
                {{--</ul>--}}
                {{--</section>--}}
                {{--<script src="{{$publicUrl}}/js/flexslider.js" type="text/javascript"></script>--}}
                {{--<script type="text/javascript">--}}
                {{--$(document).ready(function() {--}}
                {{--$('.flexslider').flexslider({--}}
                {{--animation: "fade",--}}
                {{--controlNav:false--}}
                {{--});--}}
                {{--});--}}
                {{--</script>--}}
                {{--</div>--}}
                {{--<h2 class="section-title">{{isset($arTypes) ? $arTypes->name : ''}}</h2>--}}
                {{--<p>Lorem Ipsum is simply a dummy dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>--}}
                {{--<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>--}}
                {{--</header>--}}
                <div class="toolbar">

                    <div class="filter-sortby">
                        <label for="SortBy">Sắp xếp</label>
                        {{csrf_field()}}
                        <select name="SortBy" id="SortBy" class="{{$arTypes->id}}">
                            <option value="3" column-sort="pid" sort-value="DESC">Mặc định</option>
                            <option value="1" column-sort="promotion_price" sort-value="ASC">Giá từ thấp đến cao</option>
                            <option value="2" column-sort="promotion_price" sort-value="DESC">Giá từ cao đến thấp</option>
                            <option value="4" >Lượt xem nhiều nhất</option>
                        </select>
                    </div>
                </div>
                <div class="list-product">
                    @include("shop.products._products")
                </div>
            </div>
            <script>
                    $(document).on('click', '.pagination a', function () {
                     var curl = '{{ route("shop.products.index", [$slug, $id])  }}';
                     var price = $('.findSearch input[type=radio]:checked').val();
                     var brand = [];
                     $('.findSearch input[type=checkbox]:checked').each(function () {
                              brand.push(this.value);
                       });
                     var SortBy = $('#SortBy').val();
                     var url = '{{ route("shop.products.index", [$slug, $id])  }}';
                        var url = $(this).attr('href');
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: {price:price,brand:brand,order_id:SortBy },
                            success: function (result) {
                                if(result.status) {
                                    $('.list-product').html(result.html);
                                }
                            }
                        });
                        return false;
                    });

                    // $('body').on('change', '#SortBy', function() {
                    //     order_id = $(this).val();

                    //     url = '{{ route("shop.products.index", [$slug, $id])  }}' + '?order_id=' + order_id + '&price=' + price;

                    //     $.ajax({
                    //         url: url,
                    //         type: 'GET',
                    //         dataType: 'json',
                    //         success: function (result) {
                    //             if(result.status) {
                    //                 $('.list-product').html(result.html);
                    //             }
                    //         }
                    //     });
                    // });
               
            </script>
        </div>
    </main>
@stop