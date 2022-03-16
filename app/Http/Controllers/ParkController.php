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
use App\Traits\StorageImageTrait;

session_start();
class ParkController extends Controller
{
    // khai báo các thuộc tính và phương thức
    use StorageImageTrait;
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
    // hiển thị bãi xe
    public function index()
    {
        $parks = $this->park->paginate(10);
        return view('park.index', compact('parks'));
    }
    // trang bãi xe mới
    public function add()
    {
        return view('park.add');
    }
    // tạo loại xe mới
    public function create(Request $request)
    {
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['addr'] = $request->addr;
        $dataImage = $this->storageTraitUpload($request, 'image_park', 'parks');
        $data['image'] = $dataImage['file_path'];
        $this->park->create($data);
        Toastr::success('Thêm thành công', 'BÃI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('park.index');
    }
    // trang sửa loại xe
    public function edit($id)
    {
        $park = $this->park->find($id);
        return view('park.edit', compact('park'));
    }
    // cập nhật lại loại xe
    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['addr'] = $request->addr;
        $dataImage = $this->storageTraitUpload($request, 'image_park', 'parks');
        $data['image'] = $dataImage['file_path'];
        $this->park->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'BÃI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('park.index');
    }
    // xóa loại xe
    public function delete($id)
    {
        $this->park->find($id)->delete();
        Toastr::error('Xóa thành công', 'BÃI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('park.index');
    }
}
