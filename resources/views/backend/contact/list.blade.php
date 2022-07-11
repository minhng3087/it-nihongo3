
@extends('backend.layouts.master')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', 'Danh sách')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('backend.components.messages-error')
                <form action="{!! route($module['module'].'.postMultiDel') !!}" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="btnAdd" style="display: none;">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
                            <i class="fa fa-trash-o"></i> Xóa
                        </button>
                    </div>
                    @include('backend.components.table')
                </form>

                <p style="color: red">Nhấn vào trạng thái để duyệt nhanh bình luận.</p>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $('#table-ajax').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '{!! route('contact.anyData') !!}',
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox'},
                    {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                    @foreach ($module['table'] as $key => $item)
                        {data: '{{ $key }}', name: '{{ $key }}'},
                    @endforeach
                    {data: 'action', name: 'action'},

                ],
                'columnDefs': [{
                    'targets': [0, 1],
                    'orderable': false,
                    'searchable': false,
                    'checkboxes': {
                        'selectRow': true
                    }
                }],
                language: {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Xem _MENU_ mục",
                    "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                    "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Đầu",
                        "sPrevious": "Trước",
                        "sNext": "Tiếp",
                        "sLast": "Cuối"
                    }
                }
            });
        });

    </script>
    <script>
        jQuery(document).ready(function($) {
            $('body').on('click', '.activeq', function(event) {
                id = $(this).data('id');
                var btn = $(this);
                $.get('{{ route('contact.active') }}?id='+id, function(data) {
                    btn.html(data);
                });
            });
        });
    </script>
@endsection