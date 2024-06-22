@extends('admin.main')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <h5 class="alert alert-success">{{ session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Danh Sách Đơn Hàng</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <colgroup>
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col>
                            </colgroup>
                            <thead>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa Chỉ</th>
                                {{-- <th>Thời gian đặt</th> --}}
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                              @foreach($donhang as $dh)  
                                <tr>
                                    <td>{{$dh->id}}</td>
                                    <td>{{$dh->name}}</td>
                                    <td>{{$dh->email}}</td>
                                    <td>{{$dh->phone}}</td>
                                    <td>{{$dh->address}}</td>
                                    {{-- <td>{{$dh->created_at}}</td> --}}
                                    <td class="status">{{$dh->status}}</td>
                                    <td>
                                        <button class="btn toggle-status {{$dh->status == 'Đang chờ ...' ? 'btn-danger' : 'btn-warning'}}" data-id="{{$dh->id}}">
                                            {{$dh->status == 'Đang chờ ...' ? 'Xác Nhận đơn hàng' : 'Hoàn tác'}}
                                        </button>
                                        <button class="btn btn-danger delete-order" data-id="{{$dh->id}}">Xóa</button>

                                    </td>
                                </tr>
                              @endforeach      
                            </tbody>
                        </table>
                         <!-- Thêm liên kết phân trang -->
                         <div class="d-flex justify-content-center">
                            {{ $donhang->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.toggle-status');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const orderId = button.getAttribute('data-id');
                const currentStatus = button.closest('tr').querySelector('.status').textContent.trim();
                const newStatus = currentStatus === 'Đang chờ ...' ? 'Đã xác nhận' : 'Đang chờ ...';

                $.ajax({
                    url: '{{ route('orders.updateStatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: orderId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            const statusCell = button.closest('tr').querySelector('.status');
                            const actionCell = button.closest('td');
                            
                            // Cập nhật trạng thái đơn hàng
                            statusCell.textContent = response.status;
                            
                            // Cập nhật nút bấm
                            button.textContent = response.status === 'Đang chờ ...' ? 'Xác Nhận đơn hàng' : 'Hoàn tác';
                            button.classList.toggle('btn-danger', response.status === 'Đang chờ ...');
                            button.classList.toggle('btn-warning', response.status === 'Đã xác nhận');
                        }
                    }
                });
            });
        });

        // Add event listener for delete buttons
        const deleteButtons = document.querySelectorAll('.delete-order');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const orderId = button.getAttribute('data-id');
                if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')) {
                    $.ajax({
                        url: '{{ route('orders.delete', '') }}/' + orderId,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                button.closest('tr').remove();
                            } else {
                                alert('Đã có lỗi xảy ra khi xóa đơn hàng.');
                            }
                        }
                    });
                }
            });
        });
    });
</script>

</body>

@stop()
