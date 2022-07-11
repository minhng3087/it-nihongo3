@extends('frontend.layouts.master')
@section('content')

<?php 
	if(!empty($dataContent->content)){
		$content = json_decode( $dataContent->content );
	}
?>
<section id="bread">
	<div class="container">
		<div class="content">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="{{ url('/') }}">Trang chủ</a></li>
				<li class="list-inline-item"><a href="javascript:0">Liên hệ</a></li>
			</ul>
		</div>
	</div>
</section>
<section id="contact" class="pt-50">
	<div class="container">
		<div class="content">
			@include('backend.components.messages-error')
			<div class="title text-center"><h2 class="robo-med">Liên hệ với chúng tôi</h2></div>
			<div class="info-contact pt-50">
				<div class="row">
					<div class="col-md-12">
						<div class="left">
							<form action="{{ route('home.contact.post') }}" method="post">
								@csrf
								<div class="list-item-contact">
									<div class="row">
										<div class="col-md-6">
											<div class="item"><input type="text" name="name" placeholder="Họ & tên*"></div>
										</div>
										<div class="col-md-6">
											<div class="item"><input type="text" name="phone" placeholder="Số điện thoại"></div>
										</div>
										<div class="col-md-6">
											<div class="item"><input type="text" name="email" placeholder="Email"></div>
										</div>
										<div class="col-md-6">
											<div class="item"><textarea name="content" id="" cols="30" rows="10" placeholder="Nội dung"></textarea></div>
										</div>
										<div class="col-md-6"></div>
										<div class="col-md-6">
											<div class="item text-right"><button type="submit">Gửi</button></div>
										</div>
									</div>
								</div>
							</form>
							<div class="info-place">
								{!! @$content->contact->desc !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="maps">
	{!! @$content->contact->map !!}
	</div>
</section>
@stop