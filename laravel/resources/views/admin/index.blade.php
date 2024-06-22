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
                        <h3>Danh Sách Sản Phẩm <a href="{{route('themsp')}}"
                                class="btn btn-primary float-end">Thêm Sản Phẩm</a></h3>

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
                                <col class="col-divider">
                                <col class="col-divider">
                                <col>
                            </colgroup>
                            <thead>
                                <th>ID</th>
                                <th>Mã Loại</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Mô Tả</th>
                                <th>Ảnh</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                              @foreach($sanp as $sp)  
                                <tr>
                                    <td>{{$sp->id}}</td>
                                    <td>{{$sp->maloaisp}}</td>
                                    <td>{{$sp->tensp}}</td>
                                    <td>{{$sp->giasp}}</td>
                                    <td>{{$sp->soluongsp}}</td>
                                    <td class="description-cell">{{$sp->motasp}}</td>
                                    <td><img src="{{asset('uploads/admin/'.$sp->anhsp)}}" width="70px" height="70px" alt="Anh dai dien"> </td>
                                    <td>
                                        <a href="{{ route('suasp', ['id' => $sp->id]) }}" class="btn btn-primary">Sửa</a>
                                        <a href="{{ route('deletesp', ['id' => $sp->id]) }}" class="btn btn-danger">Xóa</a>
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
</body>

@stop()
