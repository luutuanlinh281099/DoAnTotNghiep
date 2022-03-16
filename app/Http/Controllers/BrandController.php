<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Park;
use App\Brand;
use App\Role;
use App\Member;
use App\Newpaper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

session_start();
class BrandController extends Controller
{
    // khai báo các thuộc tính và phương thức
    private $user;
    private $brand;
    private $park;
    private $transaction;
    public function __construct(User $user, Brand $brand, Park $park, Transaction $transaction)
    {
        $this->user = $user;
        $this->brand = $brand;
        $this->park = $park;
        $this->transaction = $transaction;
    }
    // trang hiển thị loại xe
    public function index()
    {
        $brands = $this->brand->paginate(10);
        return view('brand.index', compact('brands'));
    }
    // đến trang thêm loại xe
    public function add()
    {
        return view('brand.add');
    }
    // tạo loại xe mới
    public function create(Request $request)
    {
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $this->brand->create($data);
        Toastr::success('Thêm thành công', 'LOẠI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('brand.index');
    }
    // sửa thông tin loại xe
    public function edit($id)
    {
        $brand = $this->brand->find($id);
        return view('brand.edit', compact('brand'));
    }
    // cập nhật lại loại xe
    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $this->brand->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'LOẠI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('brand.index');
    }
    // xóa loại xe 
    public function delete($id)
    {
        $this->brand->find($id)->delete();
        Toastr::error('Xóa thành công', 'LOẠI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('brand.index');
    }
}
