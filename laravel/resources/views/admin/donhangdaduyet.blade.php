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
                        <h3>Đơn hàng đã duyệt</h3>
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
                                <th>Thời gian đặt</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                              @foreach($dhduyet as $dhd)  
                                <tr>
                                    <td>{{$dhd->id}}</td>
                                    <td>{{$dhd->name}}</td>
                                    <td>{{$dhd->email}}</td>
                                    <td>{{$dhd->phone}}</td>
                                    <td>{{$dhd->address}}</td>
                                    <td>{{$dhd->created_at}}</td>
                                    <td class="status">{{$dhd->status}}</td>
                                    <td>
                                       
                                        @if($dhd->status == 'Đã xác nhận')
                                        <a href="{{ route('admin.ctdonhang', ['orderId' => $dhd->id]) }}">Xem chi tiết đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
                              @endforeach      
                            </tbody>
                        </table>
                      
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
                                button.textContent = response.status === 'Đang chờ ...' ? 'Xác Nhận đơn hàng' : 'Hủy';
                                button.classList.toggle('btn-danger', response.status === 'Đang chờ ...');
                                button.classList.toggle('btn-warning', response.status === 'Đã xác nhận');

                                // Thêm hoặc xóa nút "Xem chi tiết đơn hàng"
                                let detailButton = actionCell.querySelector('.view-details');
                                if (response.status === 'Đã xác nhận') {
                                    if (!detailButton) {
                                        detailButton = document.createElement('a');
                                        detailButton.href = '#';
                                        detailButton.className = 'btn btn-info view-details';
                                        detailButton.textContent = 'Xem chi tiết đơn hàng';
                                        detailButton.setAttribute('data-id', orderId);
                                        actionCell.appendChild(detailButton);
                                    }
                                } else {
                                    if (detailButton) {
                                        detailButton.remove();
                                    }
                                }
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>

@stop()
