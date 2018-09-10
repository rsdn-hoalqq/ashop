@extends('templates.shop.master')

	@section('content')
	<!-- SITE MAIN CONTENT -->
	<main class="main-content">
		<div class="container">
			<h1 class="pageTitle">Your search for <span style="color: red">"{{$keyword}}"</span> revealed the following:</h1>
			<hr class="hr--clear">

			<!-- begin list search results-->
			@foreach($arItems as $item)
				@php
				$id=$item->pid;
				$name=str_slug($item->name);
			@endphp
			<div class="row">
				<div class="col-sm-4 col-md-3 product_image"> <a href="{{route('shop.products.detail',['slug'=>$name,'id'=>$id])}}" title="Xem chi tiết"> <img src="{{$imgUrl}}/files/{{$item->image}}" alt="" /> </a> </div>
				<div class="col-sm-8 col-md-7">
					<h2 class="h4"><a href="{{route('shop.products.detail',['slug'=>$name,'id'=>$id])}}" title="">{{$item->name}}</a></h2>
					<p> <span class="sale_price"> <strong>GIÁ GIẢM</strong>
							<span class=money> {!!number_format( $item->promotion_price,0,",",".") !!} VND</span>
						</span>
						<br>
						<strong>GIÁ TRƯỚC ĐÂY</strong>
						<span class="visually-hidden">GIÁ TRƯỚC ĐÂY</span><s><span class=money>{!!number_format( $item->unit_price,0,",",".") !!} VND </span></s>
					</p>
					{{--<p style="font-family: ">{!!  str_limit($item->detail,150)!!}</p>--}}
				</div>
			</div>
			<hr>
			@endforeach
			<div id="pagination">

                {{$arItems->appends(['search'=>$keyword])->links()}}


			</div>
		</div>
	</main>
	
	<!-- SITE FOOTER -->
	@stop
