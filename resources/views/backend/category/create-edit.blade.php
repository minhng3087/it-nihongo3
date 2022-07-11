@extends('backend.layouts.master')
@section('controller', @$module['name'] )
@section('controller_route', route('category.index'))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
		@include('backend.components.messages-error')
       	<form action="{{ updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) }}" method="POST">
			@csrf
			@if(isUpdate(@$module['action']))
				@method('PUT')
		    @endif
		    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#activity" data-toggle="tab" aria-expanded="true">Danh mục sản phẩm</a>
                    </li>
                    <li class="">
                    	<a href="#banner" data-toggle="tab" aria-expanded="true">Banner đầu trang</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name', @$data->name) }}">
						</div>
						<div class="form-group">
							<label for="">Đường dẫn tĩnh</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', @$data->slug) }}">
						</div>
						<div class="form-group">
							<label for="">Danh mục cha</label>
							<select name="parent_id" class="form-control">
								<option value="0">Danh mục cha</option>
                               	{{ menuMulti( $categories , 0 , '' ,   old( 'parent_id', @$data->parent_id )) }}
							</select>
						</div>
                    </div>
                    <div class="tab-pane" id="setting">
                    	<div class="row">
                    		<div class="col-sm-2">
                    			<div class="form-group">
                    				<label for="">Hình ảnh</label>
                    				 <div class="image">
			                            <div class="image__thumbnail">
			                                <img src="{{ !empty(@$data->image) ? @$data->image : __IMAGE_DEFAULT__ }}"
			                                     data-init="{{ __IMAGE_DEFAULT__ }}">
			                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                <input type="hidden" value="{{ old('image', @$data->image) }}" name="image"/>
			                                <div class="image__button" onclick="fileSelect(this)">
			                                	<i class="fa fa-upload"></i>
			                                    Upload
			                                </div>
			                            </div>
			                        </div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <div class="tab-pane" id="banner">
                    	<div class="row">
			                <div class="col-sm-12">
								<div class="repeater" id="repeater">
					                <table class="table table-bordered table-hover">
					                    <thead>
						                    <tr>
						                    	<th style="width: 30px;">STT</th>
						                    	<th style="width: 200px">Hình ảnh</th>
						                    	<th>Nội dung</th>
						                    </tr>
					                	</thead>
					                    <tbody>
					                    	@php if(!empty($data->meta_orthers)){
					                    		$meta_orthers = json_decode( $data->meta_orthers );
					                    	}
											@endphp
					                    	@for ($i = 1; $i <= 3; $i++)
												<tr>
													<td class="index">{{ $i }}</td>
													<td>
							                           <div class="image">
							                               <div class="image__thumbnail">
							                                   <img src="{{ !empty($meta_orthers->{ $i }->image) ? $meta_orthers->{ $i }->image : __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
							                                   <a href="javascript:void(0)" class="image__delete" 
							                                   onclick="urlFileDelete(this)">
							                                    <i class="fa fa-times"></i></a>
							                                   <input type="hidden" value="{{ @$meta_orthers->{ $i }->image }}" name="meta_orthers[{{ $i }}][image]"  />
							                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
							                               </div>
							                           </div>
													</td>
													<td>
														<div class="form-group">
															<label for="">Tiêu đề banner</label>
															<input type="text" class="form-control" name="meta_orthers[{{ $i }}][title]" value="{{ @$meta_orthers->{ $i }->title }}">
														</div>
														<div class="form-group">
															<label for="">Liên kết</label>
															<input type="text" class="form-control" name="meta_orthers[{{ $i }}][link]" value="{{ @$meta_orthers->{ $i }->link }}">
														</div>
													</td>
												</tr>
											@endfor
					                    </tbody>
					                </table>
					            </div>
					        </div>
					    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </div>
		</form>
			
	</div>
@stop