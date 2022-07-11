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
               	<form action="{{ route('pages.build.post', ['page' => $data->type]) }}" method="POST">
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
				            	<a href="#setting" data-toggle="tab" aria-expanded="true" >Thiết lập trang</a>
				            </li>
				        </ul>
				    </div>
						<?php if(!empty($data->content)){
							$content = json_decode($data->content);

						} ?>

                        <div class="tab-pane" id="setting">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Link map</label>
                                        <textarea type="text" name="content[contact][map]" class="form-control">{{ @$content->contact->map }}</textarea>
                                    </div>
                                    <div class="form-group">
										<label for="">Text</label>
										<textarea name="content[contact][desc]" class="content">{!! @$content->contact->desc !!}</textarea>
									</div>
                                </div>
                            </div>

                        </div>
			           <button type="submit" class="btn btn-primary">Lưu lại</button>
				</form>
			</div>
		</div>
	</div>
@stop