@extends('frontend.layouts.master')
@section('content')
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline text-uppercase">
					<li class="list-inline-item"><a href="{{ url('/') }}">Trang chủ</a></li>
					<li class="list-inline-item"><a href="{{ route('home.new.product') }}">sản phẩm</a></li>
					<li class="list-inline-item"><a href="javascript:0">{{ $data->name }}</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="product"> 
		<div class="container">
			<div class="content">
				<div class="preview pb-100">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="slide-thumbs">
								<div class="slider-for">
									<!-- @if (count($data->ProductImage()->where('type', 'more_image_product')->where('image', '!=', null)->get()))
                                    	@foreach ($data->ProductImage()->where('type', 'more_image_product')->where('image', '!=', null)->get() as $item)
                                    		<div class="carousel-item">
		                                    	<a title="{{ $data->name }}" href="{{ $item->image }}" data-fancybox="group" class ="lightbox" data-fancybox="lib-1">
		                                    		<img src="{{ $item->image }}" class="img-fluid" width="100%" alt="{{ $data->name }}">
		                                    	</a>
		                                    </div>
                                    	@endforeach
                                    @endif -->
									<div class="carousel-item">
										<img src="{{ $data->image }}" class="img-fluid" width="100%" alt="{{ $data->name }}">
									</div>
                                </div>
                                <!--/.Slides-->
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<form action="{{ route('home.post-add-cart') }}" method="POST">
							@csrf
								<div class="info-prev">
									<div class="cate">
										<h1>{{ $data->name }}</h1>
										<div id="product-version">
											
												<?php $price = $data->regular_price; ?>
												@if ($data->regular_price != 0)
													<span class="price">{{ number_format($data->regular_price,0, '.', '.') }}đ</span>
												@endif
										</div>
										<div class="desc">
										{{ @$data->sort_desc }}
										@if (count($data->ProductGift))
											<ul>
												@foreach ($data->ProductGift as $gift)
													<?php $indexParent = $loop->index; ?>
													@if ($gift->type == 'options')
														<li>{!! $gift->desc !!}</li>
															<?php $options_gift = json_decode( $gift->value );?>
															@if (!empty($options_gift->list))
																@foreach ($options_gift->list as $key => $value)
																	<li>
																		{{ $value->title }}
																	</li>
																@endforeach
															@endif
														@else
														<li>{!! $gift->desc !!}</li>
													@endif
												@endforeach
											</ul>
										@endif
										</div>
										<div class="quantity-add">
											<ul class="list-inline">
												<li class="list-inline-item">
													<div class="quantity">
														<span class="mont">Số lượng:</span>
														<div class="number-spinner">
															<span class="ns-btn">
																<a data-dir="dwn"><span class="icon-minus">-</span></a>
															</span>
															<input type="text" class="pl-ns-value" value="1" maxlength="5" readonly name="qty">
															<span class="ns-btn">
																<a data-dir="up"><span class="icon-plus">+</span></a>
															</span>
														</div>
													</div>
												</li>
												<li class="list-inline-item">
													<div class="add-cart">
														<button type="submit" class="btn btn-primary" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<input type="hidden" id="id_price" name="price" value="{{ @$price }}">
								<input type="hidden" name="id_product" value="{{ $data->id }}">
							</form>
						</div>
					</div>
				</div>
				<div class="tab-detail">
					<ul class="nav nav-tabs" role="tablist">
						<li class="">
							<a class="active text-uppercase robo-bold" data-toggle="tab" href="#tabs-1" role="tab">Chi tiết sản phẩm</a>
						</li>
						<li class="">
							<a class="text-uppercase robo-bold" data-toggle="tab" href="#tabs-2" role="tab">Đánh giá</a>
						</li>
					</ul>
					<div class="detail pb-100">
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								{!! @$data->content !!}
								<div class="box-thongso">
									{!! @$data->specifications !!}
								</div>
							</div>
							<div class="tab-pane" id="tabs-2" role="tabpanel">
								{!! @$data->evaluate !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="box-product pb-50" >
		<div class="container"> 
			<div class="content">
				<div class="title">
					<h2 class="robo-bold text-uppercase">Sản phẩm liên quan</h2>
				</div>
				<div class="list-product slide-prod">
					<div class="row">
						@foreach($product_same_category as $item)
						<div class="col-md-2">
							@include('frontend.components.product-2', ['item' => $item])
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="popup">
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    	<div class="modal-body">
			      	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        <div class="preview">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="slide-thumbs">
									<div class="avarta" style="border: 1px solid #ddd;"><img class="" src="images/thumb1.png" class="img-fluid" width="100%" alt="Third slide"></div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="info-prev">
									<div class="cate">
										<h1>iPhone 11 Pro Max 512GB </h1>
										<div class="vote">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>	
										<div class="price">3.567.000 đ</div>
										<div class="desc">
											Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 512GB mới ra mắt trong năm 2019 của Apple.
											<ul>
												<li>Trong hộp có: Sạc,Tai nghe,Cây lấy sim,Cáp,Sách hướng dẫn,Hộp</li>
												<li>Bảo hành chính hãng 12 tháng.</li>
												<li>Lỗi là đổi mới trong 1 tháng tại hơn 2005 siêu thị toàn quốc Xem chi tiết</li>
												<li>Phiếu mua hàng trị giá 1 triệu <span>(được quy đổi thành tiền mặt) *</span></li>
											</ul>
										</div>
										<div class="quantity-add">
											<ul class="list-inline">
												<li class="list-inline-item">
													<div class="quantity">
					                                    <span class="mont">Số lượng:</span>
														<div class="number-spinner">
															<span class="ns-btn">
																<a data-dir="dwn"><span class="icon-minus">-</span></a>
															</span>
															<input type="text" class="pl-ns-value" value="1" maxlength="5" readonly name="qty">
															<span class="ns-btn">
																<a data-dir="up"><span class="icon-plus">+</span></a>
															</span>
														</div>
					                                </div>
												</li>
												<form action="{{ route('home.post-add-cart') }}" method="POST">
													@csrf
													<div class="add-cart">
														<button type="submit" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
													</div>
												</form>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			    </div>
		    </div>
		  </div>
		</div>
	</section>

@stop

@section('scripts')
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.version-check-box').click(function() {
				var key = $(this).val();
				$.ajax({
					url : '{{ route('home.version.product') }}',
					method: 'get',
					data: {
						key: key,
					},
					success: function(data) {
						$("#product-version").html(data);
					}
				})
			});

			var numberSpinner = (function() {
			$('.number-spinner>.ns-btn>a').unbind().click(function() {
				var btn = $(this),
				oldValue = btn.closest('.number-spinner').find('input').val().trim(),
				newVal = 0;

				if (btn.attr('data-dir') === 'up') {
				newVal = parseInt(oldValue) + 1;
				} else {
				if (oldValue > 1) {
					newVal = parseInt(oldValue) - 1;
				} else {
					newVal = 1;
				}
				}
				
				btn.closest('.number-spinner').find('input').val(newVal);
			});
			$('.number-spinner>input').keypress(function(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
				}
				return true;
			});
			})();
			
		});

	</script>
@endsection