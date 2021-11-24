<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Park;
use App\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class CameraInController extends Controller
{
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
    public function index()
    {
        $transactions = $this->transaction->latest()->paginate(5);
        return view('camerain.index', compact('transactions'));
    }
    public function add()
    {
        return view('camerain.add');
    }
    public function create(Request $request)
    {
        $data['brand_id'] = 2;
        $data['park_id'] = 1;
        $data['text_in'] = $request->text_in;
        $dataImage = $this->storageTraitUpload($request, 'image_in', 'transactions');
        $data['image_in'] = $dataImage['file_path'];
        $transaction = $this->transaction->create($data);
        Toastr::success('Thêm thành công', 'XE VÀO', ["positionClass" => "toast-top-center"]);
        return redirect()->route('camerain.index');
    }
    public function edit($id)
    {
        $transaction = $this->transaction->find($id);
        $brands = $this->brand->all();
        $brandOfTransaction = $transaction->brand->name;
        return view('camerain.edit', compact('transaction','brands','brandOfTransaction'));
    }
    public function update(Request $request, $id)
    {
        $data['text_in'] = $request->text_in;
        $data['brand_id'] = $request->brand_id;
        $this->transaction->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'XE VÀO', ["positionClass" => "toast-top-center"]);
        return redirect()->route('camerain.index');
    }
}
