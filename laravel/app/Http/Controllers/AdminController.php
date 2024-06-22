<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\sanpham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //liet ke -list - L
    public function index(){
        $sanp = sanpham::all(); 
        return view ('admin.index',compact('sanp')); 
    }
    //liệt kê danh sách đơn hàng


    public function dhang()
    {
        
            $donhang = Order::all(); 
            $donhang = Order::paginate(5);
            $currentUser = Auth::user();
            return view('admin.donhang', compact('donhang', 'currentUser'));
       
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // update status
    public function updateStatus(Request $request)
    {
        $order = Order::find($request->id);
        if ($order) {
            $order->status = $request->status;
            $order->save();
            return response()->json(['success' => true, 'status' => $order->status]);
        }
        return response()->json(['success' => false]);
    }
    //đơn hàng đã duyệt
    public function updateddathang(Request $request){
        $dhduyet = Order::where('status','Đã xác nhận')->get();      
        return view('admin.donhangdaduyet',compact('dhduyet'));
    }



    // liệt kê danh sách chi tiết đơn hàng
  

   public function ctdhang($orderId)
   {
       $ctdonhang = Orderdetails::where('order_id', $orderId)->paginate(8);
       $order = Order::find($orderId); // Lấy thông tin đơn hàng tương ứng
       return view('admin.ctdonhang', compact('ctdonhang', 'order'));
   }

    // liệt kê danh sách tài khoản người dùng
     // Liệt kê danh sách người dùng
     public function user()
     {
         $users = User::all();
         $currentUser = Auth::user();
         return view('admin.user', compact('users', 'currentUser'));
     }


    // xóa tài khoản
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    //them - create -C
    public function addsp(){
        return view ('admin.create');
    }
    public function store(Request $request){

        
        $sanp = new sanpham; // Chú ý chữ s hoa ở đây
        $sanp->maloaisp =$request->input('masp');
        $sanp->tensp = $request->input('ten');
        $sanp->giasp = $request->input('gia');
        $sanp->soluongsp = $request->input('soluong');
        $sanp->motasp = $request->input('mota');
        if($request->hasFile('anhdaidien')){
            $file = $request->file('anhdaidien'); 
            $extension = $file->getClientOriginalExtension(); // Chú ý chữ s hoa ở đây
            $filename = time().'.'.$extension;
            $file->move('uploads/admin', $filename); // Sử dụng storeAs() để lưu tệp tin
            $sanp->anhsp = $filename;
        }
        $sanp->save();
        return redirect()->back()->with('status', 'Thêm sản phẩm thành công');
    }
    
    //capnhat -update - U
    public function editsp($id){
        $sanp = sanpham::find($id);
        return view ('admin.edit',compact('sanp'));

    }
    public function update(Request $request, $id){
      
        $sanp = Sanpham::find($id);
        $sanp->maloaisp =$request->input('masp');
        $sanp->tensp = $request->input('ten');
        $sanp->giasp = $request->input('gia');
        $sanp->soluongsp = $request->input('soluong');
        $sanp->motasp = $request->input('mota');
        if($request->hasFile('anhdaidien')){
            //co file dinh kem trong form update thi tim file cu va xoa di
            // neu khong co anh dai dien cu thi k xoa
            $anhcu = 'uploads/admin/'. $sanp->anhdaidien;
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }
            $file = $request->file('anhdaidien'); // Chú ý sử dụng phương thức file() thay vì files()
            $extension = $file->getClientOriginalExtension(); // Chú ý chữ s hoa ở đây
            $filename = time().'.'.$extension;
            $file->move('uploads/admin', $filename); // Sử dụng storeAs() để lưu tệp tin
            $sanp->anhsp = $filename;
        }
        $sanp->update();
        return redirect()->back()->with('status', 'Cập nhật sản phẩm thành công');

    }
    //xoa - delete - D
    public function delete($id){
        $sanp = Sanpham::find($id);
        $anhdaidien = 'uploads/admin/'. $sanp->anhdaidien;
        if(File::exists($anhdaidien)){
            File::exists($anhdaidien);
        }
        $sanp->delete();
        return redirect()->back()->with('status','Xoá sản phẩm thành công');
    }
    
}
