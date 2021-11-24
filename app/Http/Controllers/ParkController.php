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

class ParkController extends Controller
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
        $parks = $this->park->paginate(10);
        return view('park.index', compact('parks'));
    }
    public function add()
    {
        return view('park.add');
    }
    public function create(Request $request)
    {
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $this->park->create($data);
        Toastr::success('Thêm thành công', 'BÃI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('park.index');
    }
    public function edit($id)
    {
        $park = $this->park->find($id);
        return view('park.edit', compact('park'));
    }
    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $this->park->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'BÃI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('park.index');
    }
    public function delete($id)
    {
        $this->park->find($id)->delete();
        Toastr::error('Xóa thành công', 'BÃI XE', ["positionClass" => "toast-top-center"]);
        return redirect()->route('park.index');
    }
}
