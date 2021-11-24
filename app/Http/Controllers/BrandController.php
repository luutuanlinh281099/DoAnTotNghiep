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

class BrandController extends Controller
{
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
        $brands = $this->brand->paginate(10);
        return view('brand.index', compact('brands'));
    }
    public function add()
    {
        return view('brand.add');
    }
    public function create(Request $request)
    {
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $this->brand->create($data);
        Toastr::success('Thêm thành công', 'LOẠI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('brand.index');
    }
    public function edit($id)
    {
        $brand = $this->brand->find($id);
        return view('brand.edit', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $this->brand->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'LOẠI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('brand.index');
    }
    public function delete($id)
    {
        $this->brand->find($id)->delete();
        Toastr::error('Xóa thành công', 'LOẠI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('brand.index');
    }
}
