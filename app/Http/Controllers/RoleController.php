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

session_start();
class RoleController extends Controller
{
    use StorageImageTrait;
    // hiển thị bãi xe
    public function index()
    {
        $roles = Role::paginate(10);
        return view('role.index', compact('roles'));
    }
}
