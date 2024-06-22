<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <h5 class="alert alert-success">{{ session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm Sản Phẩm <a href="{{route('Admin')}}"
                                class="btn btn-danger float-end">BACK</a></h3>

                    </div>
                    <div class="card-body">
                        <form action="{{route('storesp')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Mã Sản Phẩm:</label>
                                <input type="text" name="masp" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Tên Sản Phẩm:</label>
                                <input type="text" name="ten" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Ảnh đại diện:</label>
                                <input type="file" name="anhdaidien" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Giá Sản Phẩm:</label>
                                <input type="text" name="gia" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Số Lượng:</label>
                                <input type="text" name="soluong" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Mô Tả:</label>
                                <input type="text" name="mota" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="stock" name="stock">
                                    <label class="form-check-label" for="stock">
                                        Sản phẩm nổi bật
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu SP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
