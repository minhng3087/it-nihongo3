@extends('backend.layouts.master')
@section('content')
@section('controller','Cập nhật tài khoản')
@section('action','Edit')
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
    <div class="box">
		@include('backend.components.messages-error')
        <div class="box-body">
        	<form method="post" action="backend/users/postedituse?id={{$data->id}}" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
          		<div class="row">
              		<div class="col-md-6 col-xs-12">
						<div class="clearfix"></div>
						<div class="form-group">
							<label for="ten">Loại tài khoản</label>
							<select name="level" class="form-control">
		                      	<option @if($data->level==1) selected @endif value="1">Quản trị admin</option>
		                      	<option @if($data->level==3) selected @endif value="3">Quản trị viên</option>
		                    </select>
						</div>		
						<div class="form-group">
					      	<label for="ten">Username</label>
					      	<input type="text" disabled value="{{ $data->username }}"  class="form-control" />
						</div>
						<div class="form-group @if ($errors->first('txtPasswordNew')!='') has-error @endif">
					      	<label for="ten">Password mới</label>
					      	<input type="password" name="txtPasswordNew" value=""  class="form-control" />
					      	@if ($errors->first('txtPasswordNew')!='')
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('txtPasswordNew'); !!}</label>
					      	@endif
						</div>
				    	<div class="form-group  @if ($errors->first('txtName')!='') has-error @endif">
					      	<label for="ten">Họ tên</label>
					      	<input type="text" name="txtName" value="{{ $data->name }}"  class="form-control" />
					      	@if ($errors->first('txtName')!='')
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('txtName'); !!}</label>
					      	@endif
						</div>
						<div class="form-group">
					      	<label for="alias">Email</label>
					      	<input type="email" name="txtEmail" id="txtEmail" value="{{ $data->email }}"  class="form-control" />
						</div>
						<div class="form-group">
					      	<label for="alias">Điện thoại</label>
					      	<input type="text" name="txtPhone" id="txtPhone" value="{{ $data->phone }}"  class="form-control" />
						</div>
                         <!------------------------>
                        <!------------------------>
					</div>
					<div class="col-md-6 col-xs-12"></div>
				</div>
			    <div class="clearfix"></div>
			    <div class="box-footer">
			    	<div class="row">
						<div class="col-md-6">
					    	<button type="submit" class="btn btn-primary">Cập nhật</button>
					    	<button type="button" class="btn btn-danger" onclick="javascript:window.location='backend'">Thoát</button>
				    	</div>
			    	</div>
			  	</div>
		    </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection()
