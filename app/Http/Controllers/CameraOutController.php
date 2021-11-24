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

class CameraOutController extends Controller
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
        $transactions = $this->transaction->whereNotNull('text_out')->latest('updated_at')->paginate(5);
        return view('cameraout.index', compact('transactions'));
    }
    public function add()
    {
        return view('cameraout.add');
    }
    public function create(Request $request)
    {
        $keywords = $request->text_out;
        $id = $this->transaction->where('text_in', $keywords)->latest()->first()->id;
        $data['text_out'] = $request->text_out;
        $dataImage = $this->storageTraitUpload($request, 'image_out', 'transactions');
        $data['image_out'] = $dataImage['file_path'];
        $this->transaction->FIND($id)->update($data);
        Toastr::success('Thêm thành công', 'XE RA', ["positionClass" => "toast-top-center"]);
        return redirect()->route('cameraout.index');
    }
    public function edit($id)
    {
        $transaction = $this->transaction->find($id);
        $brands = $this->brand->all();
        return view('cameraout.edit', compact('transaction','brands'));
    }
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
