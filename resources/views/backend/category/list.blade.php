@extends('backend.layouts.master')
@section('controller', @$module['name'] )
@section('controller_route', route('category.index'))
@section('action', 'Danh sách')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('backend.components.messages-error')
                <div class="btnAdd">
                    <a href="{{ route($module['module'].'.create') }}">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</button>
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                            <th>Danh mục</th>
                            <th>Số danh mục con</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php listCate($data); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
