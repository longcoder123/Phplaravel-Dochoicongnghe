<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sanpham;
class FrontendController extends Controller{
    public function index(){
        $sp = sanpham::all(); // chỉ láy những sản phẩn được đánh dấu stock
        $spbanchay = sanpham::where('stock',1)->get();
        $sprobot = sanpham::where('maloaisp','Robot')->get();
        $spoto = sanpham::where('maloaisp','Oto')->get();
        $spghe = sanpham::where('maloaisp','GheGaming')->get();
        $spkinh = sanpham::where('maloaisp','Kinh')->get();
        return view("frontend.index",compact('sp','spbanchay','sprobot','spoto','spghe','spkinh'));   
}

public function contact(){
    return view("frontend.contact");
}
public function Shop(){ // câu lệnh lấy ra sản phẩm mới nhất $spnoibat = sanpham::orderby('created_at','ASC'or''DESC)->take(3)->get(); ASC : lấy giảm dần , DESC lấy tăng dần , created_at bảng thời gian trong sql
    $Sanpham = sanpham::take(8)->get(); // giới hạn chỉ lấy ra 8 sản phẩm
    $spnoibat = sanpham::where('stock',1)->get();
    $sprobot = sanpham::where('maloaisp','Robot')->get();
    return view("frontend.Shop", compact('Sanpham','spnoibat','sprobot'));
}

public function Shopdetail($id) {
    $chitietsp = sanpham::find($id); // lấy thông tin sản phẩm từ database
    
    $spbanchay = sanpham::where('stock',1)->get();
    return view("frontend.Shopdetail", compact('chitietsp','spbanchay'));
}



}
