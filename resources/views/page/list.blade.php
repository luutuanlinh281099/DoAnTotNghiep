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
          <div class="col-md-1"></div>
          @if($transaction !== null)
          <div class="col-md-10">
               <br>
               <h2 class="title text-center">Qúy khách vui lòng đến bãi xe sau khi đặt chỗ trước 20 phút để đảm bảo còn chỗ</h2>
               <table class="table">
                    <thead>
                         <tr>
                              <th scope="col">Bãi xe</th>
                              <th scope="col">Loại xe</th>
                              <th scope="col">Biển số</th>
                              <th scope="col">Thời gian</th>
                              <th scope="col">Lựa chọn</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($transactions as $Item)
                         <tr>
                              <td>{{ $Item->park->name }}</td>
                              <td>{{ $Item->brand->name }}</td>
                              <td>{{ $Item->text_in }}</td>
                              <td>{{ $Item->created_at }}</td>
                              <td>
                                   <a class="btn btn-default" href="{{ route('page.delete', ['id' => $Item->id]) }}">Xóa bỏ</a>
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
               <br>
               <br>
               <br>
               <br>
               <br>
          </div>
          @else
          <br>
          <br>
          <h2 class="title text-center">Bạn chưa đặt trước chỗ, hãy đặt chỗ để đảm bảo có 1 trải nghiệm tốt </h2>
          <h2 class="title text-center">Bảng giá gửi xe</h2>
          <div class="container">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">Loại xe</th>
                                   <th scope="col">Giá tiền</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($brands as $Item)
                              <tr>
                                   <td>{{ $Item->name }}</td>
                                   <td>{{ number_format($Item->price) }}đ</td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
                    <div class="row" style="margin-bottom: 30px;">
                         <a class="btn btn-primary" style="margin-left: 100px;" href="{{ route('page.park') }}">Đặt chỗ để xe</a>
                         <a class="btn btn-primary" style="margin-left: 50px;" href="{{ route('page.month') }}">Đăng kí vé tháng</a>
                    </div>
                    @endif
               </div>
          </div>
</section>
@endsection