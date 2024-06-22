@extends('admin.main')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <h5 class="alert alert-success">{{ session('status') }}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Danh Sách Người Dùng</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <!-- Định dạng cho các cột -->
                            <colgroup>
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col class="col-divider">
                                <col>
                            </colgroup>
                            <thead>
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                              @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if ($currentUser && $currentUser->id === $user->id)
                                            <span class="badge badge-success" style="color: brown">Đang online</span>
                                        @else
                                            <span class="badge badge-secondary" style="color: black">Offline</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($currentUser && $currentUser->id !== $user->id)
                                            <button class="btn btn-danger delete-user" data-id="{{ $user->id }}">Xóa</button>
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
            // Thêm sự kiện cho các nút xóa
            const deleteButtons = document.querySelectorAll('.delete-user');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = button.getAttribute('data-id');
                    if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
                        $.ajax({
                            url: '{{ route('users.delete', '') }}/' + userId,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    button.closest('tr').remove();
                                } else {
                                    alert('Đã có lỗi xảy ra khi xóa người dùng.');
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
