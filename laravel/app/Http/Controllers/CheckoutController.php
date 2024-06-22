<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Helper\cart;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(cart $cart){
        // Lấy thông tin người dùng từ session
        $user = Session::get('user');
        // Pass thông tin người dùng và giỏ hàng vào view
        return view('frontend.checkout', compact('cart', 'user'));
    }
    public function post_checkout(Request $request){
   // Validate the incoming request data
   $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255',
    'phone' => 'required|string|max:20',
    'address' => 'required|string|max:255',
    
    // Thêm các quy tắc kiểm tra khác tùy theo yêu cầu
]);

// Tạo một đơn hàng mới và lưu vào cơ sở dữ liệu
$order = new Order();
$order->name = $request->input('name');
$order->email = $request->input('email');
$order->phone = $request->input('phone');
$order->address = $request->input('address');
// Thêm các trường khác của đơn hàng nếu cần


$order->save();

// Lưu thông tin về sản phẩm vào bảng 'orderdetails'
$cart = Session::get('cart');
foreach ($cart as $productId => $item) {
    $orderDetail = new Orderdetails();
    $orderDetail->order_id = $order->id;
    
    $orderDetail->product_name = $item['name']; // Tên sản phẩm
    $orderDetail->price = $item['price']; // Giá sản phẩm
    $orderDetail->quantity = $item['quantity']; // Số lượng sản phẩm
    // Thêm các trường khác của chi tiết đơn hàng nếu cần
    $orderDetail->save();
    }
     // Xóa giỏ hàng sau khi đặt hàng thành công
     Session::forget('cart');

     // Đặt hàng thành công, chuyển hướng về trang home và hiển thị thông báo
     return redirect()->route('home')->with('success', 'Đặt hàng thành công! Cảm ơn bạn đã mua hàng.');
}
}