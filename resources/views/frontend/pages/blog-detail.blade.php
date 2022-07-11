@extends('frontend.layouts.master')
@section('content')
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline text-uppercase">
					<li class="list-inline-item"><a href="{{ url('/') }}">Trang chủ</a></li>
					<li class="list-inline-item"><a href="{{ url('/tin-tuc')}}">Blog</a></li>
					<li class="list-inline-item"><a href="javascript:0">{{ $data->name }}</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="news-detail">
		<div class="container">
			<div class="content">
				<div class="tab-detail">
					<div class="detail pb-50">
						<div class="row">
							<div class="col-md-9">
								<div class="tab-content">
									<div class="tab-pane active" id="tabs-1" role="tabpanel">
										<div class="title-hot">
										 	{!! $data->content !!}
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="side-bar">
									<div class="other-detail">
										<div class="title-other">BÀI VIẾT LIÊN QUAN</div>
										<div class="list-item-other">
											@foreach($post_related as $item)
											<div class="item">
												<div class="date"><i class="fa fa-clock-o"></i>{{ $item->published_at->diffForHumans() }}</div>
												<h4><a href="{{ route('home.post.single', $item->slug) }}">{{ @$item->desc }}</a></h4>
											</div>
											@endforeach
										</div>
										<div class="new-detail">
											<div class="title-other">BÀI VIẾT MỚI NHẤT</div>
											<div class="list-new-bar">
												@if(!empty($posts_hot))
													@foreach($posts_hot as $item)
													<div class="item">
														<div class="avarta"><a href="{{ route('home.post.single', $item->slug) }}"><img src="{{ $item->image }}" class="img-fluid" alt=""></a></div>
														<div class="info">
															<div class="date"><i class="fa fa-clock-o"></i>{{ $item->published_at->diffForHumans() }}</div>
															<h4><a href="{{ route('home.post.single', $item->slug) }}">{{ $item->title }}</a></h4>
															<div class="desc">{{ $item->desc}}</div>
															<div class="read-more"><a href="{{ route('home.post.single', $item->slug) }}">Đọc thêm</a></div>
														</div>
													</div>
													@endforeach
												@endif
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
</main>
@endsection
