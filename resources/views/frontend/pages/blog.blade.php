@extends('frontend.layouts.master')
@section('content')
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline text-uppercase">
					<li class="list-inline-item"><a href="index.php">Trang chủ</a></li>
					<li class="list-inline-item"><a href="javascript:0">blog</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="blog">
		<div class="container">
			<div class="content">
				<div class="list-news pb-100">
					<div class="row">
					@if(!empty($data))
						@foreach ($data as $item)
						<div class="col-md-4 col-sm-4">
							<div class="item">
								<div class="avarta"><a href="{{ route('home.post.single', $item->slug) }}">	<img src="{{ $item->image }}" class="img-fluid" width="100%" alt=""></a></div>
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
						<div class="col-md-12">
							<div class="pagination">
								{!! $data->links('vendor.pagination.custom') !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection