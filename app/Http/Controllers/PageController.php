<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Park;
use App\Brand;
use App\Newpaper;
use App\Role;
use App\Member;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;

session_start();
class PageController extends Controller
{
    // khai báo các thuộc tính và phương thức
    use StorageImageTrait;
    private $user;
    private $brand;
    private $park;
    private $transaction;
    private $newpaper;
    private $member;
    public function __construct(User $user, Brand $brand, Park $park, Transaction $transaction, Newpaper $newpaper, Member $member)
    {
        $this->user = $user;
        $this->brand = $brand;
        $this->park = $park;
        $this->newpaper = $newpaper;
        $this->transaction = $transaction;
        $this->member = $member;
    }
    // xem thông tin chi tiết người dùng
    public function user($id)
    {
        $user = User::find($id);
        return view('page.user', compact('user'));
    }
    // hiển thị các bãi xe hiện có
    public function park()
    {
        $parks = $this->park->paginate(10);
        return view('page.park', compact('parks'));
    }
    // hiển thị thông tin từng bãi xe
    public function detail($id)
    {
        $user = Auth::user()->id;
        $park = $this->park->find($id);
        $into = $this->transaction->where('park_id', $id)->whereNull('image_out')->count();
        $transaction = $this->transaction->where('user_id', $user)->whereNull('image_in')->first();
        return view('page.detail', compact('park', 'into', 'transaction'));
    }
    // hiển thị lịch sử đặt xe trong bãi
    public function history($id)
    {
        $transaction_count = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->count();
        $transaction_sum = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->sum('price');
        $transactions = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->latest('id')->get();
        $transaction_time = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->latest('id')->first('updated_at')->updated_at;
        return view('page.history', compact('transactions', 'transaction_count', 'transaction_sum', 'transaction_time'));
    }
    // trang đặt chỗ
    public function order($id)
    {
        $brands = $this->brand->all();
        $park = $this->park->find($id);
        return view('page.order', compact('park', 'brands'));
    }
    // trang đăng kí vé tháng
    public function month()
    {
        $brands = $this->brand->all();
        return view('page.month', compact('brands'));
    }
    // đăng kí vé tháng
    public function member(Request $request)
    {
        if ($request->brand_id == 1) {
            $data['text'] = $request->text;
            $data['user_id'] = Auth::user()->id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 2000000;
            $this->member->create($data);
            Toastr::success('Thêm thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.page');
        } elseif ($request->brand_id == 2) {
            $data['text'] = $request->text;
            $data['user_id'] = Auth::user()->id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 200000;
            $this->member->create($data);
            Toastr::success('Thêm thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.page');
        } elseif ($request->brand_id == 3) {
            $data['text'] = $request->text;
            $data['user_id'] = Auth::user()->id;
            $data['brand_id'] = $request->brand_id;
            $data['price'] = 200000;
            $this->member->create($data);
            Toastr::success('Thêm thành công', 'VÉ THÁNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('auth.page');
        }
    }
    // lưu lại thông tin đặt chỗ vào DB
    public function transaction(Request $request, $id)
    {
        $transactions = $this->transaction->where('user_id', Auth::user()->id)->whereNull('image_in')->latest()->first();
        if ($transactions == null) {
            $data['user_id'] = Auth::user()->id;
            $data['brand_id'] = $request->brand_id;
            $data['park_id'] = $id;
            $data['text_in'] = $request->text_in;
            $this->transaction->create($data);
            Toastr::success('Đặt xe thành công', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('page.list');
        } else {
            Toastr::error('Không thể đặt thêm xe', 'KHÁCH HÀNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('page.list');
        }
    }
    // hiển thị thông tin xe đang đặt
    public function list()
    {
        $id = Auth::user()->id;
        $transactions = $this->transaction->where('user_id', $id)->whereNull('image_in')->get();
        $transaction = $this->transaction->where('user_id', $id)->whereNull('image_in')->first();
        $brands = $this->brand->all();
        return view('page.list', compact('transactions', 'transaction', 'brands'));
    }
    // xóa bỏ thông tin đặt xe
    public function delete($id)
    {
        $this->transaction->find($id)->delete();
        Toastr::error('Xóa thành công', 'ĐẶT XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('page.list');
    }
    // hiển thị tin tức
    public function paper($id)
    {
        $paper = $this->newpaper->find($id);
        Newpaper::where('id', $id)->increment('view', 1);
        return view('page.paper', compact('paper'));
    }
    // tìm kiếm tin tức
    public function search_new(Request $request)
    {
        $keywords = $request->search;
        $search = Newpaper::where('tittle', 'like', '%' . $keywords . '%')->get();
        return view('page.search', compact('search'));
    }
    // tìm kiếm đặt xe
    public function search_transaction(Request $request)
    {
        $id = Auth::user()->id;
        $transaction_count = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->count();
        $transaction_sum = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->sum('price');
        $transaction_time = $this->transaction->where('user_id', $id)->whereNotNull('image_out')->first()->updated_at;
        $keywords = $request->search;
        $transactions = Transaction::where('user_id', $id)->whereNotNull('image_out')->where('text_out', 'like', '%' . $keywords . '%')->get();
        return view('page.history', compact('transactions', 'transaction_count', 'transaction_sum', 'transaction_time'));
    }
}
