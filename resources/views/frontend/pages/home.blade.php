@extends('frontend.layouts.master')
@section('content')
	<?php 
		if(!empty($dataContent->content)){
			$content = json_decode( $dataContent->content );
		}
		
	?>
	<section id="banner">
		<div class="slide-banner">
			@if (!empty($content->banner))
				@foreach ($content->banner as $id => $value)
					<div class="item">
						<div class="avarta"><img src="{{ $value->image}}" class="img-fluid" width="100%" alt=""></div>
						<div class="caption">
							<div class="container">
								<div class="content">
									<div class="info">
										{!! $value->desc !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</section>
	<section id="banner-top">
		<div class="container">
			<div class="content">
				<div class="list-banner-top">
					<div class="row"> 
						@if (!empty($content->banner_head))
							@foreach ($content->banner_head as $id => $value)
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<div class="avata"><a href="{{ $value->link }}"><img src="{{ $value->image }}" class="img-fluid" width="100%" alt="{{ $value->image }}"></a></div>
									<div class="info">
										{{ $value->desc }}
									</div>
								</div>
							</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="box-product">
		<div class="container">
			<div class="content">
				<div class="box-cate">
					<div class="row">
						<div class="col-md-3">
							<div class="left"><img src="{{__BASE_URL_FRONTEND__}}/images/icon1.png" class="img-fluid" alt="">Điện thoại<i></i></div>
						</div>
						<div class="col-md-9">
							<div class="right text-right">
								<ul class="list-inline">
									@if (!empty($content->category_moblie))
										@foreach($content->category_moblie as $key => $value)
											<?php $cate = \App\Models\Categories::find($value->category_id) ?>
											@if (!empty($cate))
												<li class="list-inline-item">
													<a class="category-moblie" href="{{ route('home.archive.product', $cate->slug) }}" >{{ $cate->name }}</a>
												</li>
											@endif
										@endforeach
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="list-product">
					<div class="row">
						<?php 
							$category = reset($content->category_moblie);
							$products = \App\Models\Products::where('brand_id', $category->category_id)->where('status', 1)->where('is_hot', 1)->take(4)->get();
							$brand = \App\Models\Categories::where('type', 'brand_category')->where('id', $category->category_id)->get();
						?>
						<div class="col-md-2">
							<div class="item item-left">
								<div class="avarta"><a href=""><img src="{{ $brand[0]->banner }}" class="img-fluid" alt=""></a></div>
							</div>
						</div>
						@foreach($products as $item)
							@include('frontend.components.product', ['item' => $item])
						@endforeach
					</div>
				</div>
							
			</div>
		</div>
	</section>
	<section class="box-product pt-50">
		<div class="container">
			<div class="content">
				<div class="box-cate">
					<div class="row">
						<div class="col-md-3">
							<div class="left"><img src="{{__BASE_URL_FRONTEND__}}/images/icon2.png" class="img-fluid" alt="">Laptop<i></i></div>
						</div>
						<div class="col-md-9">
							<div class="right text-right">
								<ul class="list-inline">
									@if (!empty($content->category_laptop))
										@foreach($content->category_laptop as $key => $value)
											<?php $cate = \App\Models\Categories::find($value->category_id) ?>
											@if (!empty($cate))
												<li class="list-inline-item">
													<a class="category-moblie" href="{{ route('home.archive.product', $cate->slug) }}">{{ $cate->name }}</a>
												</li>
											@endif
										@endforeach
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="list-product">
					<div class="row">
					<?php 
							$category = reset($content->category_laptop);
							$products = \App\Models\Products::where('brand_id', $category->category_id)->where('status', 1)->where('is_hot', 1)->take(4)->get();
							$brand = \App\Models\Categories::where('type', 'brand_category')->where('id', $category->category_id)->get();
						?>
						<div class="col-md-2">
							<div class="item item-left">
								<div class="avarta"><a href=""><img src="{{ $brand[0]->banner }}" class="img-fluid" alt=""></a></div>
							</div>
						</div>
						@foreach($products as $item)
							@include('frontend.components.product', ['item' => $item])
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="banner-hot" class="pt-50">
		<div class="container">
			@if (!empty($content->banner_mid))
				@foreach ($content->banner_mid as $id => $value)
					<div class="item">
						<a href="{{ $value->link }}"><img src="{{ $value->image }}" class="img-fluid" width="100%" alt="{{ $value->image }}"></a>
					</div>
				@endforeach
			@endif
		</div>
	</section>
	<section class="box-product pt-50">
		<div class="container">
			<div class="content">
				<div class="list-product">
					<div class="row">
						<div class="col-md-2">
							<div class="item item-left" style="height: 100%">
								<div class="cate-left text-left">
									<h3>TABLET</h3>
									<ul>
										@if (!empty($content->category_tablet))
										@foreach($content->category_tablet as $key => $value)
											<?php $cate = \App\Models\Categories::find($value->category_id) ?>
											@if (!empty($cate))
												<li class="list-inline-item">
													<a class="category-moblie" href="{{ route('home.archive.product', $cate->slug) }}">{{ $cate->name }}</a>
												</li>
											@endif
										@endforeach
									@endif
									</ul>
								</div>
							</div>
						</div>
						<?php 
							$category = reset($content->category_tablet);
							$products = \App\Models\Products::where('brand_id', $category->category_id)->where('status', 1)->where('is_hot', 1)->take(4)->get();
							$brand = \App\Models\Categories::where('type', 'brand_category')->where('id', $category->category_id)->get();
						?>
						@foreach($products as $item)
							@include('frontend.components.product', ['item' => $item])
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="box-product pt-50">
		<div class="container">
			<div class="content">
				<div class="box-cate">
					<div class="row">
						<div class="col-md-3">
							<div class="left">Sản phẩm mới<i></i></div>
						</div>
						<div class="col-md-9">
							<div class="right text-right">
								<ul class="list-inline">
									<li class="list-inline-item"><a href="product.php" class="active">Apple</a></li>
									<li class="list-inline-item"><a href="product.php">Samsung </a></li>
									<li class="list-inline-item"><a href="product.php">LG</a></li>
									<li class="list-inline-item"><a href="product.php">Samsung </a></li>
									<li class="list-inline-item"><a href="product.php">Samsung </a></li>
									<li class="list-inline-item"><a href="product.php">BlackBerry</a></li>
									<li class="list-inline-item"><a href="product.php">Oppo</a></li>
									<li class="list-inline-item"><a href="product.php">Vivo</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="list-product slide-prod">
					<div class="row">
						<div class="col-md-2">
							<div class="item">
								<div class="avarta">
									<a href="product-detail.php"><img src="{{__BASE_URL_FRONTEND__}}/images/pr1.png" class="img-fluid" alt=""></a>
									<div class="abs">
										<ul class="list-inline text-center">
											<li class="list-inline-item"><a href="" data-toggle="modal" data-target="#myModal"><img src="{{__BASE_URL_FRONTEND__}}/images/zoom.png" class="img-fluid" alt=""></a></li>
											<li class="list-inline-item"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/vote.png" class="img-fluid" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="info">
									<h3><a href="product-detail.php">Iphone XS 64G</a></h3>
									<div class="vote">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="price"><span>22.225.000đ</span></div>
									<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="item">
								<div class="avarta">
									<a href="product-detail.php"><img src="{{__BASE_URL_FRONTEND__}}/images/pr2.png" class="img-fluid" alt=""></a>
									<div class="abs">
										<ul class="list-inline text-center">
											<li class="list-inline-item"><a href="" data-toggle="modal" data-target="#myModal"><img src="{{__BASE_URL_FRONTEND__}}/images/zoom.png" class="img-fluid" alt=""></a></li>
											<li class="list-inline-item"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/vote.png" class="img-fluid" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="info">
									<h3><a href="product-detail.php">Iphone XS 64G</a></h3>
									<div class="vote">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="price"><span>22.225.000đ</span></div>
									<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="item">
								<div class="avarta">
									<a href="product-detail.php"><img src="{{__BASE_URL_FRONTEND__}}/images/pr1.png" class="img-fluid" alt=""></a>
									<div class="abs">
										<ul class="list-inline text-center">
											<li class="list-inline-item"><a href="" data-toggle="modal" data-target="#myModal"><img src="{{__BASE_URL_FRONTEND__}}/images/zoom.png" class="img-fluid" alt=""></a></li>
											<li class="list-inline-item"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/vote.png" class="img-fluid" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="info">
									<h3><a href="product-detail.php">Iphone XS 64G</a></h3>
									<div class="vote">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="price"><span>22.225.000đ</span></div>
									<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="box-hot pt-50 pb-50">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="left">
							<div class="item"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/hot1.png" class="img-fluid" width="100%" alt=""></a></div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="right">
							<div class="item"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/hot2.png" class="img-fluid" width="100%" alt=""></a></div>
							<div class="small-hot">
								<ul>
									<li><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/hot3.png" class="img-fluid" width="100%^" alt=""></a></li>
									<li><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/hot4.png" class="img-fluid" width="100%^" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section id="box-news">
		<div class="container">
			<div class="content">
				<div class="title-news">
					<h2 class="robo-bold text-uppercase"><span>Bài viết mới nhất</span></h2>
				</div>
				<div class="list-news">
					<div class="row">
						@if (count($posts_hot))
							@foreach ($posts_hot as $item)
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<div class="avarta"><a href="{{ route('home.post.single', $item->slug) }}">	<img src="{{ $item->image }}" class="img-fluid" width="100%" alt="{{ $item->name }}"></a></div>
									<div class="info">
										<div class="date robo-light"><i class="fa fa-clock-o"></i> {{ $item->published_at->diffForHumans() }}</div>
										<h3><a href="{{ route('home.post.single', $item->slug) }}" class="robo-bold">{{ $item->name }}</a></h3>
										<div class="desc">
											{{ $item->desc }}
										</div>
										<div class="view-now robo-light"><a href="{{ route('home.post.single', $item->slug) }}">Đọc thêm</a></div>
									</div>
								</div>
							</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="partner" class="pb-50">
		<div class="container">
			<div class="content">
				<div class="slide-part">
					<div class="row">
						@if (!empty($content->partner))
							@foreach ($content->partner as $key => $value)
								<div class="col-md-2"><div class="item"><a href="{{ $value->link }}"><img src="{{ $value->image}}" class="img-fluid" alt="{{ $value->desc }}"></a></div></div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="popup">
    	<div class="modal fade" id="myModal">
			<div class="modal-dialog">
        		<div class="modal-content">
				</div>
			</div>
		</div>
	</section>

@endsection


