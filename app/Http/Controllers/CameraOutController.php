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

session_start();
class CameraOutController extends Controller
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
    // hiển thị thông tin xe ra
    public function index()
    {
        $transactions = $this->transaction->whereNotNull('text_out')->latest('updated_at')->paginate(10);
        return view('cameraout.index', compact('transactions'));
    }
    // thêm 1 xe mới
    public function add()
    {
        return view('cameraout.add');
    }
    // thêm 1 xe mới bằng chụp ảnh
    public function take()
    {
        return view('cameraout.take');
    }
    // nhận dữ liệu từ API và lưu vào DB
    public function create(Request $request)
    {
        $now = date('m');
        $keywords = $request->text;
        $member = $this->member->where('text', $keywords)->whereMonth('created_at', '=', $now)->first();
        if ($member == null) {
            $image_out = str_replace('app/public/', '', $request->plate);
            $id = $this->transaction->where('text_in', $keywords)->latest('id')->first()->id;
            $brand_id = $this->transaction->where('id', $id)->first()->brand_id;
            $price = $this->brand->where('id', $brand_id)->first()->price;
            Transaction::find($id)->update([
                'text_out' => $keywords,
                'image_out' => $image_out,
                'price' => $price
            ]);
            Toastr::success('Thêm thành công', 'XE RA', ["positionClass" => "toast-top-center"]);
            return redirect()->route('cameraout.index');
        } else {
            $user_id = $member->user_id;
            $image_out = str_replace('app/public/', '', $request->plate);
            $id = $this->transaction->where('text_in', $keywords)->latest('id')->first()->id;
            $brand_id = $this->transaction->where('id', $id)->first()->brand_id;
            $price = $this->brand->where('id', $brand_id)->first()->price;
            if ($user_id == null) {
                Transaction::find($id)->update([
                    'text_out' => $keywords,
                    'image_out' => $image_out,
                    'price' => 0,
                ]);
            } else {
                Transaction::find($id)->update([
                    'text_out' => $keywords,
                    'image_out' => $image_out,
                    'price' => 0,
                    'user_id' => $user_id,
                ]);
            }
            Toastr::success('Thêm thành công', 'XE RA', ["positionClass" => "toast-top-center"]);
            return redirect()->route('cameraout.index');
        }
    }
    // sửa lại biển số xe nếu sai
    public function edit($id)
    {
        $transaction = $this->transaction->find($id);
        $brands = $this->brand->all();
        return view('cameraout.edit', compact('transaction', 'brands'));
    }
    // cập nhật lại biển số xe
    public function update(Request $request, $id)
    {
        $data['text_in'] = $request->text;
        $data['text_out'] = $request->text;
        $data['brand_id'] = $request->brand_id;
        $this->transaction->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'XE RA', ["positionClass" => "toast-top-center"]);
        return redirect()->route('cameraout.index');
    }
}
