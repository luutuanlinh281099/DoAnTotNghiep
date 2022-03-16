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
class MemberController extends Controller
{
    // khai báo các thuộc tính và phương thức
    use StorageImageTrait;
    private $user;
    private $brand;
    private $park;
    private $transaction;
    private $member;
    public function __construct(User $user, Brand $brand, Park $park, Transaction $transaction, Member $member)
    {
        $this->user = $user;
        $this->brand = $brand;
        $this->park = $park;
        $this->transaction = $transaction;
        $this->member = $member;
    }
    // hiển thị danh sách vé tháng
    public function index()
    {
        $members = $this->member->paginate(10);
        return view('member.index', compact('members'));
    }
    // trang đăng kí vé tháng mới
    public function add()
    {
        $users = $this->user->all();
        $brands = $this->brand->all();
        return view('member.add', compact('brands', 'users'));
    }
    // tạo vé tháng mới
    public function create(Request $request)
    {
        if ($request->brand_id == 1) {
            $data['text'] = $request->text;
            $data['user_id'] = $request->user_id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 2000000;
            $this->member->create($data);
            Toastr::success('Thêm thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('member.index');
        } elseif ($request->brand_id == 2) {
            $data['text'] = $request->text;
            $data['user_id'] = $request->user_id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 200000;
            $this->member->create($data);
            Toastr::success('Thêm thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('member.index');
        } elseif ($request->brand_id == 3) {
            $data['text'] = $request->text;
            $data['user_id'] = $request->user_id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 200000;
            $this->member->create($data);
            Toastr::success('Thêm thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('member.index');
        }
    }
    // trang sửa vé tháng
    public function edit($id)
    {
        $users = $this->user->all();
        $brands = $this->brand->all();
        $member = $this->member->find($id);
        return view('member.edit', compact('member', 'brands', 'users'));
    }
    // cập nhật lại vé tháng
    public function update(Request $request, $id)
    {
        if ($request->brand_id == 1) {
            $data['text'] = $request->text;
            $data['user_id'] = $request->user_id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 2000000;
            $this->member->find($id)->update($data);
            Toastr::warning('Sửa thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('member.index');
        } elseif ($request->brand_id == 2) {
            $data['text'] = $request->text;
            $data['user_id'] = $request->user_id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 200000;
            $this->member->find($id)->update($data);
            Toastr::warning('Sửa thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('member.index');
        } elseif ($request->brand_id == 3) {
            $data['text'] = $request->text;
            $data['user_id'] = $request->user_id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 200000;
            $this->member->find($id)->update($data);
            Toastr::warning('Sửa thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('member.index');
        }
    }
    // xóa ve tháng
    public function delete($id)
    {
        $this->member->find($id)->delete();
        Toastr::error('Xóa thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('member.index');
    }
}
