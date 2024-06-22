<?php 
namespace App\Helper;
use App\Models\Carts;
class cart{
    public $items = [];
    private $total_quantity = 0;
    private $total_price = 0;
    public function __construct(){
        $this ->items = session('cart') ? session('cart'):[];
    }
    //phương thức lấy về danh sách sản phẩm trong giỏ
    public function list(){
        return $this->items;
    }
    //thêm mới sản phẩm vào giỏ hàng 
    public function add($chitietsp, $quantity = 1) {
        $item = [
            'productsId' => $chitietsp->id,
            'name' => $chitietsp->tensp,
            'price' => $chitietsp->giasp,
            'image' => $chitietsp->anhsp,
            'quantity' => $quantity
        ];
    
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        if(array_key_exists($chitietsp->id, $this->items)) {
            // Nếu đã tồn tại, cập nhật số lượng mới
            $this->items[$chitietsp->id]['quantity'] += $quantity;
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng
            $this->items[$chitietsp->id] = $item;
        }
    
        // Cập nhật giá tiền của sản phẩm dựa trên số lượng mới
        $this->items[$chitietsp->id]['total_price'] = floatval($this->items[$chitietsp->id]['price']) * floatval($this->items[$chitietsp->id]['quantity']);
    
        session(['cart' => $this->items]);
    }
    
    // cập nhật giỏ hàng 

   

public function saveToDatabase() {
    foreach ($this->items as $productId => $item) {
        // Tạo hoặc cập nhật thông tin sản phẩm trong giỏ hàng
        Carts::updateOrCreate(
            ['product_id' => $productId],
            ['quantity' => $item['quantity']]
        );
    }
}

    //xóa sản phẩm khỏi giỏ hàng
// Trong Helper Cart
public function delete($productId) {
    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if (array_key_exists($productId, $this->items)) {
        // Sử dụng model Cart để xóa sản phẩm khỏi cơ sở dữ liệu
        Carts::where('product_id', $productId)->delete();
        
        // Sau khi xóa khỏi cơ sở dữ liệu, cập nhật lại session giỏ hàng
        unset($this->items[$productId]);
        session(['cart' => $this->items]);
        
        // Trả về true nếu xóa thành công
        return true;
    }
    
    // Trả về false nếu sản phẩm không tồn tại trong giỏ hàng
    return false;
}

    
    // phương thức lấy tổng tiền
    public function getTotalPrice(){
        $totalPrice = 0;
        foreach($this->items as $item){
            $totalPrice += floatval($item['price']) * floatval($item['quantity']);
        }
        return $totalPrice;
    }
    public function getTotalQuantity(){
        $total = 0;
        foreach($this->items as $item){
            $total += ($item['quantity']);
        }
        return $total;
    }
}
