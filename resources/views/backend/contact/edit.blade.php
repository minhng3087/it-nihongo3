@extends('backend.layouts.master')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', 'Chỉnh sửa')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
				@include('backend.components.messages-error')
                <form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
                    @csrf
                    @if(isUpdate(@$module['action']))
                        {{ method_field('put') }}
                    @endif
                	<div class="row">
                		<div class="col-sm-12">
                			<div class="form-group">
                				<label for="">Họ tên</label>
                				<input type="text" class="form-control" value="{{ @$data->name }}" readonly="">
                			</div>
                			<div class="form-group">
                				<label for="">Email</label>
                				<input type="text" class="form-control" value="{{ @$data->email }}" readonly="">
                			</div>
                			<div class="form-group">
                				<label for="">Số điên thoại</label>
                				<input type="text" class="form-control" value="{{ @$data->phone }}"  readonly="">
                			</div>
                			
                			<div class="form-group">
                				<label for="">Nội dung</label>
                				<textarea class="form-control" name="content" rows="6" readonly="">{{ @$data->content }}</textarea>
                			</div>
                            <label class="custom-checkbox" style="margin-bottom: 10px ">
                                @if(isUpdate(@$module['action']))
                                    <input type="checkbox" name="status" value="1" {{ @$data->status == 1 ? 'checked' : null }}> Duyệt
                                @else
                                    <input type="checkbox" name="status" value="1" checked> Duyệt
                                @endif
                            </label>
                			<button type="submit" class="btn btn-primary">Lưu lại</button>
                		</div>
                	</div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('css')
	<style>
		.row-upload .col-upload {
		    padding: 0 7px;
		}
		.row-upload {
		    display: inline-flex;
		    width: 100%;
		    flex-wrap: wrap;
		    margin: 0 -7px;
		}
		.row-upload .col-upload img {
		    width: 70px;
		    height: 70px;
		    object-fit: cover;
		    border-radius: 3px;
		}
	</style>
@endsection