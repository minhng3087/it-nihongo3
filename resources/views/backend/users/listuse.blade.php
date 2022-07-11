@extends('backend.layouts.master')
@section('controller','Users')
@section('action','Danh sách')
@section('content')
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('backend.components.messages-error')
        <div class="box-body">
          <div class="box-header">
            <a href="{{ route('backend.users.adduse') }}">
                <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm tài khoản</fa>
            </a>
          </div>

          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center with_dieuhuong">Stt</th>
                <th>Loại tài khoản</th>
                <th>Tên tài khoản</th>
                <th>Tên người dùng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $k=>$item)
    		      	<tr class="action-number">
    		      		<td class="">{{$k+1}}</td>
                  <td>@if($item->level==1) Quản trị admin @elseif($item->level==3) Quản trị viên @endif</td>
    		      	  <td>{!! $item->user_name !!}</td>
    		      	  <td>{!! $item->name !!}</td>
    		      	  <td>{!! $item->phone !!}</td>
    		      		<td>{!! $item->email !!}</td>
    		      	    <td>
                    @if($item->status>0)
                        <a href="backend/users/edituse?id={{$item->id}}&hienthi={{ time() }}" class="label label-success"><i class="fa fa-eye"></i> Tài khoản đang hoạt động</a>
                    @else
                      <a href="backend/users/edituse?id={{$item->id}}&hienthi={{ time() }}" class="label label-danger"><i class="fa fa-eye"></i> Đã Khóa tài khoản</a>
                    @endif
                  </td>
    		      		<td>
                    <a href="backend/users/edituse?id={{ $item->id}}" class="btn btn_edit">Chi tiết</a>
                    <a onClick="if(!confirm('Xác nhận xóa')) return false;" href="backend/users/{{$item->id}}/deleteuse" class="btn btn_del">Xóa</button></td>
    		      	</tr>
    		        @endforeach
            </tbody>
          </table>
         {{ $data->links() }}
        </div><!-- /.box-body -->
      
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<!------------------------------------------------------------------------->  
@endsection()