@extends('backend.layouts.master')
@section('controller','Trang')
@section('controller_route',route('pages.list'))
@section('action','Danh sách')
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('backend.components.messages-error')
               	<form action="{{ route('pages.build.post',['page' => $data->type]) }}" method="POST">
					@csrf
					<input name="type" value="{{ $data->type }}" type="hidden">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Trang</label>
								<input type="text" class="form-control" value="{{ $data->name_page }}" disabled="">
				 				
								@if (\Route::has($data->route))
									<h5>
										<a href="{{ route($data->route) }}" target="_blank">
					                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					                        Link: {{ route($data->route) }}
					                    </a>
									</h5>
				                @endif
							</div>
							
						</div>
					</div>
					<div class="nav-tabs-custom">
				        <ul class="nav nav-tabs">

							<li class="active">
				            	<a href="#activity1" data-toggle="tab" aria-expanded="true">Banner</a>
				            </li>

							<li class="">
				            	<a href="#activity2" data-toggle="tab" aria-expanded="true">Danh mục sản phẩm</a>
				            </li>

							<li class="">
				            	<a href="#activity5" data-toggle="tab" aria-expanded="true">Banner - Đầu trang</a>
				            </li>

				            <li class="">
				            	<a href="#activity3" data-toggle="tab" aria-expanded="true">Banner - Giữa trang</a>
				            </li>

							<li class="">
				            	<a href="#activity6" data-toggle="tab" aria-expanded="true">Banner - Cuối trang</a>
				            </li>

				            <li class="">
				            	<a href="#activity4" data-toggle="tab" aria-expanded="true">Đối tác</a>
				            </li>

				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
						$content = json_decode($data->content);

					} ?>
				    <div class="tab-content">

				    	<div class="tab-pane active" id="activity1">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										@if (!empty($content->banner))
											@foreach ($content->banner as $id => $value)
												<?php $index = $loop->index + 1;?>
												@include('backend.repeater.row-banner-home')
											@endforeach
										@endif
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'banner-home', '.banners')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>
				    	<div class="tab-pane" id="activity2">
				    		<div class="row">
				    			<div class="col-sm-4">
				    				<div class="repeater" id="repeater">
					    				<label for="">Chọn danh mục điện thoại</label>
					    				<table class="table table-bordered table-hover category-moblie">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Danh mục</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->category_moblie))
													@foreach ($content->category_moblie as $id => $value)
														<?php $index = $loop->index + 1;?>
														@include('backend.repeater.row-category-moblie')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'category-moblie', '.category-moblie')">Thêm
								            </button>
						                </div>
						            </div>
				    			</div>
				    			<div class="col-sm-4">
				    				<div class="repeater" id="repeater">
					    				<label for="">Chọn danh mục Laptop</label>
					    				<table class="table table-bordered table-hover category-laptop">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Danh mục</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->category_laptop))
													@foreach ($content->category_laptop as $id => $value)
														<?php $index = $loop->index + 1;?>
														@include('backend.repeater.row-category-laptop')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'category-laptop', '.category-laptop')">Thêm
								            </button>
						                </div>
						            </div>
				    			</div>

								<div class="col-sm-4">
				    				<div class="repeater" id="repeater">
					    				<label for="">Chọn danh mục Tablet</label>
					    				<table class="table table-bordered table-hover category-tablet">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Danh mục</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->category_tablet))
													@foreach ($content->category_tablet as $id => $value)
														<?php $index = $loop->index + 1;?>
														@include('backend.repeater.row-category-tablet')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'category-tablet', '.category-tablet')">Thêm
								            </button>
						                </div>
						            </div>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="tab-pane" id="activity3">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners-mid">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										@if (!empty($content->banner_mid))
											@foreach ($content->banner_mid as $id => $value)
												<?php $index = $loop->index + 1;?>
												@include('backend.repeater.row-banner-home-mid')
											@endforeach
										@endif
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'banner-home-mid', '.banners-mid')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>

						<div class="tab-pane" id="activity5">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners-head">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										@if (!empty($content->banner_head))
											@foreach ($content->banner_head as $id => $value)
												<?php $index = $loop->index + 1;?>
												@include('backend.repeater.row-banner-home-head')
											@endforeach
										@endif
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'banner-home-head', '.banners-head')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>

						<div class="tab-pane" id="activity6">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners-end">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										@if (!empty($content->banner_end))
											@foreach ($content->banner_end as $id => $value)
												<?php $index = $loop->index + 1;?>
												@include('backend.repeater.row-banner-home-end')
											@endforeach
										@endif
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'banner-home-end', '.banners-end')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>
				    	<div class="tab-pane" id="activity4">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover partner">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Logo</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										@if (!empty($content->partner))
											@foreach ($content->partner as $id => $value)
												<?php $index = $loop->index + 1;?>
												@include('backend.repeater.row-partner')
											@endforeach
										@endif
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'partner', '.partner')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>


			           	<button type="submit" class="btn btn-primary">Lưu lại</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
@stop