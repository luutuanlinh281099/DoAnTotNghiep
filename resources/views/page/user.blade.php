@extends('layouts.page')

@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<section>
     <div class="shopper-informations">
          <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                    <div class="shopper-info">
                         <br>
                         <h2 class="title text-center">THÔNG TIN KHÁCH HÀNG</h2>
                         <form>
                              <input type="text" placeholder="Họ tên" value="{{ $user->name }}">
                              <input type="text" placeholder="Email" value="{{ $user->email }}">
                              <input type="password" placeholder="Password" value="{{ $user->password }}">
                         </form>
                         <a class="btn btn-primary" href="{{ route('auth.edit') }}">Đổi mật khẩu</a>
                         <a class="btn btn-primary" href="{{ route('page.month') }}">Đăng kí vé tháng</a>
                         <a class="btn btn-primary" href="{{ route('auth.delete', ['id' => $user->id]) }}">Xóa tài khoản</a>
                    </div>
                    <br>
               </div>
          </div>
     </div>
</section>
@endsection