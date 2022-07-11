<div class="col-md-2">
	<div class="item">
		<div class="avarta">
			<a href="{{ route('home.single.product', $item->slug) }}"><img src="{{ @$item->image }}" class="img-fluid" alt="{{ @$item->name }}"></a>
			<div class="abs">
				<ul class="list-inline text-center">
					<li class="list-inline-item"><a href="" class="modal-product" data-id="{{ $item->id }}" data-toggle="modal" data-target="#myModal"><img src="{{__BASE_URL_FRONTEND__}}/images/zoom.png" class="img-fluid" alt=""></a></li>
					<li class="list-inline-item"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/vote.png" class="img-fluid" alt=""></a></li>
				</ul>
			</div>
		</div>
		<div class="info">
			<h3><a href="{{ route('home.single.product', $item->slug) }}">{{ @$item->name }}</a></h3>
			<div class="vote">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			@if($item->sale_price)
				<div class="price"><span>{{ number_format($item->sale_price,0, '.', '.') }}đ</span></div>
				<div class="price"><del><span>{{ number_format($item->regular_price,0, '.', '.') }}đ</span></del></div>
			@else
				<div class="price"><span>{{ number_format($item->regular_price,0, '.', '.') }}đ</span></div>
				<div class="price"><span></span></div>

			@endif
			<div class="btn-add">
				<a title="Thêm vào giỏ hàng" class="add-cart" data-id="{{ $item->id }}">Thêm vào giỏ hàng</a>
			</div>
		</div>
	</div>
</div>