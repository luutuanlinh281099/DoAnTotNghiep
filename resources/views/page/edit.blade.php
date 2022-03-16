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
                         <h3>Đổi mật khẩu</h3>
                         <form action="{{ route('auth.update',  ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="text" name="password" placeholder="Mật khẩu hiện tại">
                              <input type="text" name="newpassword" placeholder="Mật khẩu mởi">
                              <input type="text" name="renewpassword" placeholder="Nhập lại mật khẩu">
                              <button class="btn btn-primary">Xác nhận</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>
@endsection