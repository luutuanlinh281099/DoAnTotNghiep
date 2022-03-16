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
     <div class="container">
          <div class="table-responsive cart_info">
               <br>
               <h2 class="title text-center">THÔNG TIN CHI TIẾT BÃI XE</h2>
               <table class="table table-condensed">
                    <thead>
                         <tr class="cart_menu">
                              <td class="total">Bãi xe</td>
                              <td class="image">Hình ảnh</td>
                              <td class="description">Địa chỉ</td>
                              <td class="price">Số lượng chỗ</td>
                              <td class="quantity">Còn trống</td>
                              <td>Lựa chọn</td>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <td class="cart_description">{{$park->name}}</td>
                              <td class="cart_product"><img src="{{ config('app.base_url') . $park->image }}" width="200px" height="200px"></td>
                              <td class="cart_price">{{$park->addr}}</td>
                              <td class="cart_quantity">{{$park->qty}}</td>
                              <td class="cart_total">{{ $park->qty - $into }}</td>
                              @if(Auth::check())
                              <td class="cart_delete" style="margin-top: 13px">
                                   @if($park->qty - $into > 0 and $transaction == null)
                                   <a href="{{ route('page.order', ['id' => $park->id]) }}" style="color: green;" class="btn btn-success float-right m-2">Đặt chỗ</a>
                                   @elseif( $transaction != null )
                                   <a href="{{ route('page.list') }}" style="color: red;" class="btn btn-danger float-right m-2">Hủy chỗ</a>
                                   @elseif( $park->qty - $into = 0 )
                                   <p href="" style="color: white;" class="btn btn-danger float-right m-2">Hết chỗ</p>
                                   @endif
                              </td>
                              @else
                              <td class="cart_delete" style="margin-top: 13px">
                                   <a href="{{ route('auth.login') }}" style="color: black;" class="btn btn-warning float-right m-2">Đăng nhập</a>
                              </td>
                              @endif
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</section>
@endsection