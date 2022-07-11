@extends('backend.layouts.master')
@section('controller', @$module['name'] )
@section('controller_route', route(@$module['module'].'.index'))
@section('action', 'Cập nhật')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('backend.components.messages-error')
                <form action="{{ route('product-attributes.update',@$data) }}" method="POST">
                	@csrf
					@method('PUT')
                	<div class="row">
                		<div class="col-sm-12">
                			<div class="form-group">
			               		<label for="">Tên loại thuộc tính</label>
			               		<input type="text" name="name" class="form-control" required value="{{ @$data->name }}">
			               	</div>
			               	<div class="form-group">
			               		<label for="">Loại thuộc tính</label>
								<select name="type" class="form-control">
									<option value="color" {{ @$data->type == 'color' ? 'selected' : null }} >Color</option>
									<option value="input" {{ @$data->type == 'input' ? 'selected' : null }}>Options</option>
								</select>
			               	</div>
							<button  type="submit" class="btn-primary btn">Lưu lại</button>
                		</div>
                	</div>
                </form>
            </div>
        </div>
    </div>
@stop