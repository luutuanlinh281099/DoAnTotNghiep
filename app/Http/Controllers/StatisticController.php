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
class StatisticController extends Controller
{
    // tìm kiếm gửi xe
    public function search(Request $request)
    {
        $keywords = $request->search;
        $search = Transaction::where('text_out', 'like', '%' . $keywords . '%')->get();
        return view('cameraout.search', compact('search'));
    }
    // thống kê theo ngày
    public function date()
    {
        $from = null;
        $to = null;
        $transaction_sum = Transaction::whereNotNull('text_out')->count();
        $transaction_online = Transaction::whereNotNull('text_out')->whereNotNull('user_id')->count();
        $transaction_park = Transaction::whereNotNull('text_out')->where('price', '>', '0')->count();
        $transaction_month = Transaction::whereNotNull('text_out')->where('price', '=', '0')->count();
        $user = User::count();
        $newpaper = Newpaper::count();
        $member = Member::count();
        $money_park = Transaction::whereNotNull('text_out')->sum('price');
        $money_member = Member::sum('price');
        $money_all = $money_park + $money_member;
        return view('statistic.date', compact('transaction_sum', 'transaction_online', 'transaction_park', 'transaction_month', 'user', 'newpaper', 'member', 'money_park', 'money_all', 'from', 'to'));
    }
    // tìm kiếm theo ngày
    public function search_date(Request $request)
    {
        $from = $request->datefrom;
        $to = $request->dateto;
        $transaction_sum = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->count();
        $transaction_online = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->whereNotNull('user_id')->count();
        $transaction_park = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->where('price', '>', '0')->count();
        $transaction_month = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->where('price', '=', '0')->count();
        $user = User::whereBetween('created_at', [$from, $to])->count();
        $newpaper = Newpaper::whereBetween('created_at', [$from, $to])->count();
        $member = Member::whereBetween('created_at', [$from, $to])->count();
        $money_park = Transaction::whereBetween('created_at', [$from, $to])->whereNotNull('text_out')->sum('price');
        $money_member = Member::whereBetween('created_at', [$from, $to])->sum('price');
        $money_all = $money_park + $money_member;
        return view('statistic.date', compact('transaction_sum', 'transaction_online', 'transaction_park', 'transaction_month', 'user', 'newpaper', 'member', 'money_park', 'money_all', 'from', 'to'));
    }
    // thống kê theo bãi xe
    public function park()
    {
        $park_id = null;
        $transaction_sum = Transaction::whereNotNull('text_out')->count();
        $transaction_online = Transaction::whereNotNull('text_out')->whereNotNull('user_id')->count();
        $transaction_park = Transaction::whereNotNull('text_out')->where('price', '>', '0')->count();
        $transaction_month = Transaction::whereNotNull('text_out')->where('price', '=', '0')->count();
        $brand_max = Transaction::whereNotNull('text_out')->select('brand_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('brand_id')->pluck('total')->max();
        $brand_id = Transaction::whereNotNull('text_out')->select('brand_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('brand_id')->pluck('brand_id')->first();
        $brand = Brand::where('id', $brand_id)->first()->name;
        $text_max = Transaction::whereNotNull('text_out')->select('text_out', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('text_out')->pluck('total')->max();
        $text = Transaction::whereNotNull('text_out')->select('text_out', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('text_out')->pluck('text_out')->first();
        $money_park = Transaction::whereNotNull('text_out')->sum('price');
        $money_member = Member::sum('price');
        $money_all = $money_park + $money_member;
        $parks = Park::all();
        return view('statistic.park', compact('transaction_sum', 'transaction_online', 'transaction_month', 'transaction_park', 'brand', 'brand_max', 'text', 'text_max', 'money_all', 'money_park', 'parks', 'park_id'));
    }
    // tìm kiếm theo bãi xe
    public function search_park(Request $request)
    {
        $park_id = $request->park_id;
        $transaction_sum = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->count();
        $transaction_online = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->whereNotNull('user_id')->count();
        $transaction_park = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->where('price', '>', '0')->count();
        $transaction_month = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->where('price', '=', '0')->count();
        $brand_max = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->select('brand_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('brand_id')->pluck('total')->max();
        $brand_id = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->select('brand_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('brand_id')->pluck('brand_id')->first();
        $brand = Brand::where('id', $brand_id)->first()->name;
        $text_max = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->select('text_out', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('text_out')->pluck('total')->max();
        $text = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->select('text_out', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('text_out')->pluck('text_out')->first();
        $money_park = Transaction::where('park_id', $park_id)->whereNotNull('text_out')->sum('price');
        $money_member = Member::sum('price');
        $money_all = $money_park + $money_member;
        $parks = Park::all();
        return view('statistic.park', compact('transaction_sum', 'transaction_online', 'transaction_park', 'transaction_month', 'brand', 'brand_max', 'text', 'text_max', 'money_all', 'money_park', 'parks', 'park_id'));
    }
    // thống kê theo khách hàng
    public function list()
    {
        $user_singup = User::where('role_id', 3)->count();
        $month_all = Member::count();
        $month_user = Member::whereNotNull('user_id')->count();
        $user_max = Transaction::whereNotNull('text_out')->whereNotNull('user_id')->select('user_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('user_id')->pluck('total');
        $user_id = Transaction::whereNotNull('text_out')->whereNotNull('user_id')->select('user_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('user_id')->pluck('user_id');
        $user_count = Transaction::whereNotNull('text_out')->whereNotNull('user_id')->select('user_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('user_id')->pluck('user_id')->count();
        for ($i = 0; $i < $user_count; $i++) {
            $id = $user_id[$i];
            $user = User::where('id', $id)->first()->name;
            $user_name[] = $user;
        }
        return view('statistic.list', compact('user_id', 'user_max', 'user_name', 'user_singup', 'user_count', 'month_all', 'month_user'));
    }
    // tìm kiếm theo khách hàng
    public function search_user(Request $request)
    {
        $keywords = $request->search;
        $user = User::where('name', 'like', '%' . $keywords . '%')->get();
        return view('statistic.user', compact('user'));
    }
    // thống kê số lần sử dụng
    public function user_detail($id)
    {
        $user = User::where('id', $id)->first();
        $transactions = Transaction::where('user_id', $id)->whereNotNull('text_out')->latest()->paginate(10);
        return view('statistic.detail', compact('user', 'transactions'));
    }
}
