<?php

namespace App\Http\Controllers;
use App\Helper\cart;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\Carts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index(cart $cart){
       
        
        return view('frontend.cart',compact('cart'));
    }
    public function add(Request $request, Cart $cart){
    $user = Auth::user(); // Lấy người dùng đã xác thực
    $productId = $request->id; // Lấy ID của sản phẩm từ request
    $quantity = $request->quantity;
    $chitietsp = sanpham::find($request->id); // Lấy thông tin sản phẩm từ database

    // Thêm sản phẩm vào giỏ hàng tạm thời
    $cart->add($chitietsp, $quantity);

    // Kiểm tra xem người dùng đã có giỏ hàng chưa
    if (!$user->cart) {
        // Tạo một giỏ hàng mới nếu chưa có
        $newCart = new Carts();
        $newCart->product_id = $productId;
        $newCart->quantity = $quantity;
        $newCart->user_id = $user->id;
        $newCart->save();
    } else {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng của người dùng chưa
        $cartItem = Carts::where('user_id', $user->id)->where('product_id', $productId)->first();
        
        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, tạo sản phẩm mới trong giỏ hàng
            $newCart = new Carts();
            $newCart->product_id = $productId;
            $newCart->quantity = $quantity;
            $newCart->user_id = $user->id;
            $newCart->save();
        }
    }

    return redirect()->route('cart.index');
}

        public function delete(Request $request, cart $cart) {
        $productId = $request->productId; // Lấy id của sản phẩm cần xóa khỏi giỏ hàng từ request
        $cart->delete($productId); 
        $cart->saveToDatabase(); 
        return redirect()->back()->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công');
    }
    

}
