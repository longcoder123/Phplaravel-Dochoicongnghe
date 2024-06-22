@extends('admin.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
                    <h4>Thông tin người mua</h4>
                    <p>Tên: {{ $order->name }}</p>
                    <p>Email: {{ $order->email }}</p>
                    <p>Số điện thoại: {{ $order->phone }}</p>
                    <p>Địa chỉ: {{ $order->address }}</p>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3" onclick="printInvoice()">In hóa đơn</button>
                    <div id="invoice">
                        <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
                        <h4>Thông tin người mua</h4>
                        <p>Tên: {{ $order->name }}</p>
                        <p>Email: {{ $order->email }}</p>
                        <p>Số điện thoại: {{ $order->phone }}</p>
                        <p>Địa chỉ: {{ $order->address }}</p>
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>ID đơn hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng</th>
                            </thead>
                            <tbody>
                                @foreach($ctdonhang as $ctdh)
                                <tr>
                                    <td>{{ $ctdh->id }}</td>
                                    <td>{{ $ctdh->order_id }}</td>
                                    <td>{{ $ctdh->product_name }}</td>
                                    <td>
                                        @if (is_numeric($ctdh->price))
                                            {{ number_format($ctdh->price, 0, ',', '.') }} VND
                                        @else
                                            Giá không hợp lệ
                                        @endif
                                    </td>
                                    <td>
                                        @if (is_numeric($ctdh->quantity))
                                            {{ $ctdh->quantity }}
                                        @else
                                            Số lượng không hợp lệ
                                        @endif
                                    </td>
                                    <td>
                                        @if (is_numeric($ctdh->price) && is_numeric($ctdh->quantity))
                                            {{ number_format($ctdh->price * $ctdh->quantity, 0, ',', '.') }} VND
                                        @else
                                            Tổng không hợp lệ
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Tính tổng tiền của đơn hàng -->
                        @php
                            $total = 0;
                            foreach ($ctdonhang as $ctdh) {
                                if (is_numeric($ctdh->price) && is_numeric($ctdh->quantity)) {
                                    $total += $ctdh->price * $ctdh->quantity;
                                }
                            }
                        @endphp
                        <div class="mt-3">
                            <h4>Tổng tiền đơn hàng: {{ number_format($total, 0, ',', '.') }} VND</h4>
                        </div>
                    </div>
                    <!-- Thêm liên kết phân trang -->
                    <div class="d-flex justify-content-center">
                        {{ $ctdonhang->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        var printContents = document.getElementById('invoice').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        window.location.reload();
    }
</script>

@stop
