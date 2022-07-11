@extends('backend.layouts.master')
@section('controller', 'Quà tặng sản phẩm' )
@section('controller_route', route('products.edit', request('id')))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
       	@include('backend.components.messages-error')
       	<form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
       		<input type="hidden" name="id_product" value="{{ request('id') }}">
			@csrf
			@if(isUpdate(@$module['action']))
		        @method('PUT')
		    @endif
		    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#activity" data-toggle="tab" aria-expanded="true">Nội dung</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<div class="form-group">
                    				<label for="">Mô tả</label>
                    				<textarea class="content" name="desc">{!! old('desc', @$data->desc) !!}</textarea>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<label for="">Loại</label>
                    		<select name="type" class="form-control" id="type">
                    			<option value="default" {{ @$data->type == 'default' ? 'selected' : null }}>Mặc định</option>
                    			<option value="options" {{ @$data->type == 'options' ? 'selected' : null }}>Lựa chọn</option>
                    		</select>
                    	</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </div>
		</form>
	</div>
@stop