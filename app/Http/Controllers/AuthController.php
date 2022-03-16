<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Park;
use App\Brand;
use App\Newpaper;
use App\Transaction;
use App\Role;
use App\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

session_start();
class AuthController extends Controller
{
    // mở trang login
    public function login()
    {
        return view('login');
    }
    // đăng nhập vào hệ thống
    public function sigin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->login_email,
            'password' => $request->login_password,
            'role_id' => 3,
        ])) {
            Toastr::info('Đăng nhập thành công', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.page');
        } elseif (Auth::attempt([
            'email' => $request->login_email,
            'password' => $request->login_password,
            'role_id' => 1,
        ])) {
            Toastr::info('Đăng nhập thành công', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.home');
        } elseif (Auth::attempt([
            'email' => $request->login_email,
            'password' => $request->login_password,
            'role_id' => 2,
        ])) {
            Toastr::info('Đăng nhập thành công', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.home');
        } else {
            Toastr::error('Đăng nhập thất bại', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.login');
        }
    }
    // đăng kí thành viên mới
    public function sigup(Request $request)
    {
        $keyword = $request->signup_email;
        $check = User::where('email', $keyword)->first();
        if ($check == null) {
            $user = User::create([
                'name' => $request->signup_username,
                'email' => $request->signup_email,
                'password' => Hash::make($request->signup_password),
                'role_id' => 3
            ]);
            Toastr::success('Đăng kí thành công', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.login');
        } else {
            Toastr::error('Đăng kí thất bại, tên người dùng đã được sử dụng', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.login');
        }
    }
    // đăng xuất
    public function logout()
    {
        Auth::logout();
        Toastr::info('Đăng xuất thành công', 'ĐĂNG XUẤT', ["positionClass" => "toast-top-center"]);
        return view('login');
    }
    // trang admin
    public function home()
    {
        if (Auth::check()) {
            return view('homeadmin');
        } else {
            return view('login');
        }
    }
    // trang khách hàng
    public function page()
    {
        $newpaper_last = Newpaper::latest()->paginate(5);
        $newpaper_hot = Newpaper::latest('view')->paginate(5);
        $newpaper_all = Newpaper::all();
        return view('homepage', compact('newpaper_last', 'newpaper_hot', 'newpaper_all'));
    }
    // đổi mật khẩu
    public function edit()
    {
        return view('page.edit');
    }
    // đổi mật khẩu trong DB
    public function update(Request $request, $id)
    {
        $auth = Auth::user($id)->password;
        if (Hash::check($request->password, $auth) == true) {
            if ($request->newpassword == $request->renewpassword) {
                User::find($id)->update([
                    'password' => Hash::make($request->newpassword)
                ]);
                Toastr::success('Đổi mật khẩu thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
                return redirect()->route('auth.login');
            } else {
                Toastr::warning('Đổi mật khẩu hông thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
                return view('page.edit');
            }
        } else {
            Toastr::warning('Đổi mật khẩu hông thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
            return view('page.edit');
        }
    }
    // xóa tài khoản
    public function delete($id)
    {
        User::find($id)->delete();
        Toastr::error('Xóa thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('auth.login');
    }
    // hiển thị data ra biểu đồ
    public function getChartData()
    {
        $now = date('m');
        $moneys = [];
        $transactions = [];
        $months = [];
        for ($month = 1; $month <= $now; $month++) {
            $from = Carbon::create(date('Y'), $month);
            $to = $from->copy()->endOfMonth();
            $money = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->sum('price');
            $transaction = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->count();
            $moneys[] = $money / 10000;
            $transactions[] = $transaction;
            $months[] = 'Tháng ' . $month;
        }
        $data = [
            'label' => $months,
            'tong_luot_xe' => $transactions,
            'tong_doanh_thu' => $moneys,
        ];
        return response()->json($data);
    }
}
