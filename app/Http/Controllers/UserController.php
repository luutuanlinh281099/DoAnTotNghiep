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
use Illuminate\Support\Facades\Hash;

session_start();
class UserController extends Controller
{
    // khai báo các thuộc tính và phương thức
    private $user;
    private $brand;
    private $park;
    private $transaction;
    private $role;
    public function __construct(User $user, Brand $brand, Park $park, Transaction $transaction, Role $role)
    {
        $this->user = $user;
        $this->brand = $brand;
        $this->park = $park;
        $this->transaction = $transaction;
        $this->role = $role;
    }
    // hiển thị thông tin người dùng
    public function index()
    {
        $users = $this->user->paginate(10);
        return view('user.index', compact('users'));
    }
    // thêm người dùng
    public function add()
    {
        $roles = $this->role->all();
        return view('user.add', compact('roles'));
    }
    // tạo mới người dùng
    public function create(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role_id'] = $request->role_id;
        $data['password'] = Hash::make($request->password);
        $this->user->create($data);
        Toastr::success('Thêm thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('user.index');
    }
    // chỉnh sửa lại thông tin người dùng
    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = $this->role->all();
        return view('user.edit', compact('user', 'roles'));
    }
    // cập nhật lại các thông tin
    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = $request->role_id;
        $this->user->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('user.index');
    }
    // xóa người dùng
    public function delete($id)
    {
        $this->user->find($id)->delete();
        Toastr::error('Xóa thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('user.index');
    }
}
