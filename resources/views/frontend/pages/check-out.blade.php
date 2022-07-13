@extends('frontend.layouts.master')
@section('content')
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}">Trang chủ</a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">Thanh toán</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="payment" class="pt-20 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-md-4 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
						<span class="text-muted">Chi tiết đơn hàng</span>
						<span class="badge badge-secondary badge-pill">3</span>
					</h4>
					<ul class="list-group mb-3 sticky-top">
						@foreach (Cart::content() as $item)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0 text-wrap">
									<a title="{{ $item->name }}" 
										href="{{ route('home.single.product', $item->options->slug) }}
									">
										{{ $item->name }}
									</a>
								</h6>
								<small class="text-muted">
								</small>
							</div>
							<span class="text-muted">
							{{ $item->qty }} x {{ number_format($item->qty * $item->price, 0, '.','.') }}đ
							</span>
						</li>
						@endforeach
						<li class="list-group-item d-flex justify-content-between">
							<span>Tổng</span>
							<strong>{{ number_format(Cart::priceTotal(), 0, '.','.') }}đ</strong>
							<input type="hidden" id="base_price" value="{{ Cart::priceTotal() }}">
						</li>
					</ul>
				</div>
				<div class="col-md-8 order-md-1">
					<h4 class="mb-3">Billing address</h4>
					<form action="{{ route('home.check-out.post') }}" method="POST" id="formsreviews">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="firstName">Họ tên</label>
								<input type="text" placeholder="Họ tên" name="name" class="form-control">
								<div class="invalid-feedback"> Valid first name is required. </div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="lastName">Email</label>
								<input type="text" placeholder="Email" name="email" class="form-control email-cus">
								<div class="invalid-feedback"> Valid last name is required. </div>
							</div>
						</div>
						<div class="mb-3">
							<label for="username">Số điện thoại</label>
							<input type="text" placeholder="Số điện thoại" name="phone" class="form-control">
							<div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-3">
								<label for="country">Tỉnh / Thành phố</label>
								<select name="id_province" id="id_province" class="custom-select d-block w-100">
									<option value="">Tỉnh / Thành phố</option>
									@foreach ($province as $item)
										<option value="{{ $item->id }}">{{ $item->_name }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback"> Please select a valid country. </div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">Quận / Huyện</label>
								<select name="id_district" id="id_district" class="custom-select d-block w-100">
									<option value="">Quận / Huyện </option>
								</select>
								<div class="invalid-feedback"> Please provide a valid state. </div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">Phường / Xã</label>
								<select name="id_ward" id="id_ward" class="custom-select d-block w-100">
									<option value="">Phường / Xã </option>
								</select>
								<div class="invalid-feedback"> Please provide a valid state. </div>
							</div>
						</div>
						<div class="mb-3">
							<label for="address">Địa chỉ</label>
							<input type="text" class="form-control" id="address" placeholder="Địa chỉ cụ thể (ghi rõ số nhà, ngõ, ngách)" name="address">
						</div>
						<div class="mb-3">
							<label for="address">Nội dung</label>
							<textarea id="" cols="30" rows="10" placeholder="Nội dung" name="note" class="form-control" cols="3"></textarea>
						</div>
						<hr class="mb-4">
						<h4 class="mb-3">Hình thức thanh toán</h4>
						<div class="d-block my-3">
							<div class="custom-control custom-radio">
								<input type="radio" id="method-1" name="radio-group" checked class="custom-control-input">
								<label for="method-1" class="hide-bank active custom-control-label">Thanh toán khi nhận hàng</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="method-2" name="radio-group" class="custom-control-input">
								<label for="method-2" class="show-bank custom-control-label">Thanh toán online</label>
							</div>
						</div>
						<hr class="mb-4">
						<!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button> -->
						<input type="button" class="sent btn btn-primary btn-lg btn-block mb-4" value="Gửi đơn hàng">
					</form>
				</div>
			</div>
		</div>
	</section>
	<style>
		.help-block.error-help-block {
			color: red;
		}
	</style>
@stop
@section('scripts')
	<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{!! $jsValidator->selector('#formsreviews') !!}
	<script>
		jQuery(document).ready(function($) {
			$('#id_province').change(function(event) {
				id = $(this).val();
				$.get('{{ route('home.load.province') }}', { type : 'district', id : id  } , function(data) {
					$('#id_district').html(data);
				});
			});
			$('body').on('change', '#id_district', function(event) {
				id = $(this).val();
				$.get('{{ route('home.load.province') }}', { type : 'ward', id : id  } , function(data) {
					$('#id_ward').html(data);
				});
			});
		});
	</script>
	<script>
		function validateEmail($email) {
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );
		}
		jQuery(document).ready(function($) {
			$('.sent').click(function(event) {
				if($('#formsreviews').valid()){
					var email  = $('.email-cus');
					if(!validateEmail(email.val())){
						email.parent().removeClass('has-success').addClass('has-error');
						$('#email-error').text('Email phải là một địa chỉ email hợp lệ.');
					}else{
						$('#formsreviews').submit();
					}
				}
				event.preventDefault();
			});
		});
	</script>

@endsection