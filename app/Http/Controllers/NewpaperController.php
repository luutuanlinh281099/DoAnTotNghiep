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

session_start();
class NewpaperController extends Controller
{
    // khai báo các thuộc tính và phương thức
    private $user;
    private $brand;
    private $park;
    private $transaction;
    private $newpaper;
    public function __construct(User $user, Brand $brand, Park $park, Transaction $transaction, Newpaper $newpaper)
    {
        $this->user = $user;
        $this->brand = $brand;
        $this->park = $park;
        $this->transaction = $transaction;
        $this->newpaper = $newpaper;
    }
    // trang hiển thị tin tức
    public function index()
    {
        $newpapers = $this->newpaper->latest()->paginate(10);
        return view('newpaper.index', compact('newpapers'));
    }
    // đến trang thêm tin tức
    public function add()
    {
        return view('newpaper.add');
    }
    // tạo tin tức mới
    public function create(Request $request)
    {
        $data['tittle'] = $request->tittle;
        $data['content'] = $request->content;
        $data['author'] = $request->author;
        $data['view'] = $request->view;
        $this->newpaper->create($data);
        Toastr::success('Thêm thành công', 'TIN TỨC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('newpaper.index');
    }
    // sửa thông tin tin tức
    public function edit($id)
    {
        $newpaper = $this->newpaper->find($id);
        return view('newpaper.edit', compact('newpaper'));
    }
    // cập nhật lại tin tức
    public function update(Request $request, $id)
    {
        $data['tittle'] = $request->tittle;
        $data['content'] = $request->content;
        $data['author'] = $request->author;
        $data['view'] = $request->view;
        $this->newpaper->find($id)->update($data);
        Toastr::warning('Sửa thành công', 'TIN TỨC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('newpaper.index');
    }
    // xóa tin tức
    public function delete($id)
    {
        $this->newpaper->find($id)->delete();
        Toastr::error('Xóa thành công', 'TIN TỨC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('newpaper.index');
    }
}
