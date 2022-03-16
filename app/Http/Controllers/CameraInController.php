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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

session_start();
class CameraInController extends Controller
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
    // hiển thị camera đầu vào của bãi
    public function index()
    {
        $transactions = $this->transaction->whereNotNull('image_in')->latest()->paginate(10);
        return view('camerain.index', compact('transactions'));
    }
    // thêm 1 xe mới bằng thêm file
    public function add()
    {
        return view('camerain.add');
    }
    // thêm 1 xe mới bằng chụp ảnh
    public function take()
    {
        return view('camerain.take');
    }
    // nhận dữ liệu từ API và lưu vào DB
    public function create(Request $request)
    {
        $keywords = $request->text;
        $image_in = str_replace('app/public/', '', $request->plate);
        $transactions = $this->transaction->whereNotNull('user_id')->where('text_in', $keywords)->whereNull('image_in')->latest('id')->first();
        if ($transactions == null) {
            Transaction::create([
                'text_in' => $keywords,
                'image_in' => $image_in,
                'park_id' => 1,
                'brand_id' => 1,
            ]);
            Toastr::success('Thêm thành công', 'XE VÀO', ["positionClass" => "toast-top-center"]);
            return redirect()->route('camerain.index');
        } else {
            $id = $transactions->id;
            Transaction::find($id)->update([
                'image_in' => $image_in,
            ]);
            Toastr::success('Thêm thành công', 'XE VÀO', ["positionClass" => "toast-top-center"]);
            return redirect()->route('camerain.index');
        }
    }
    // sửa biển xe nếu nhận diện sai
    public function edit($id)
    {
        $transaction = $this->transaction->find($id);
        $brands = $this->brand->all();
        $brandOfTransaction = $transaction->brand->name;
        return view('camerain.edit', compact('transaction', 'brands', 'brandOfTransaction'));
    }
    // cập nhật lại biển xe
    public function update(Request $request, $id)
    {
        $data['text_in'] = $request->text_in;
        $data['brand_id'] = $request->brand_id;
        $this->transaction->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'XE VÀO', ["positionClass" => "toast-top-center"]);
        return redirect()->route('camerain.index');
    }
    // quét xe ma
    public function clean()
    {
        $limit = Carbon::now()->subMinute(20);
        $transaction_delete = Transaction::whereNull('image_in')->where('created_at', '<', $limit)->get();
        foreach ($transaction_delete as $Item) {
            $id = $Item->id;
            Transaction::find($id)->delete();
        };
        Toastr::info('Đã quét cơ sở dữ liệu', 'XE VÀO', ["positionClass" => "toast-top-center"]);
        return redirect()->route('auth.home');
    }
}
