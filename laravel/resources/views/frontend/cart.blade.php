@extends('frontend.main')
@section('content')


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Tên </th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cart -> list() as $key => $value)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('uploads/admin')}}/{{$value['image']}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{$value['name']}}</p>
                                </td>
                                <td>
                                <p class="mb-0 mt-4">{{floatval($value['price']) }}</p>

                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="{{floatval($value['quantity'])}}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ floatval($value['price']) * floatval($value['quantity']) }}</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4 btn-remove-product"
                                    data-product-id="{{ $key }}">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Tổng số  <span class="fw-normal">giỏ hàng</span></h1>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Tổng Tiền</h5>
                                <p class="mb-0 pe-4">{{number_format($cart->getTotalPrice())}}</p>
                            </div>
                            <a href="{{route('oder.checkout')}}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-remove-product').click(function() {
            var productId = $(this).data('product-id'); // Lấy id của sản phẩm từ thuộc tính data
            $.ajax({
                url: '{{ route("cart.delete") }}', // Đường dẫn đến route xử lý yêu cầu xóa
                method: 'POST', // Phương thức POST
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF
                    productId: productId // Id của sản phẩm cần xóa
                },
                success: function(response) {
                    // Xóa sản phẩm thành công, có thể cập nhật giao diện hoặc thông báo
                    location.reload(); // Tải lại trang để cập nhật giỏ hàng
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

        @stop()

 