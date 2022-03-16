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
          <div class="col-md-12">
               <br>
               <h2 class="title text-center">THỐNG KÊ</h2>
               <div class="row">
                    <div class="col-md 4">
                         <p style="font-size:20px">Tổng số lần đặt xe</p>
                         <h3>{{ $transaction_count }}</h3>
                    </div>
                    <div class="col-md 4">
                         <p style="font-size:20px">Tổng số tiền đã thanh toán</p>
                         <h3>{{ number_format($transaction_sum) }}đ</h3>
                    </div>
                    <div class="col-md 4">
                         <div class="inner">
                              <p style="font-size:20px">Lần đặt gần nhất</p>
                              <h3>{{ $transaction_time }}</h3>
                         </div>
                    </div>
               </div>
               <br>
               <h2 class="title text-center">TÌM KIẾM</h2>
               <form action="{{ route('page.search_transaction') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="search_box pull-center">
                         <input type="text" name="search" placeholder="Tìm kiếm biển số" />
                    </div>
               </form>
               <br>
               <table class="table">
                    <h2 class="title text-center">CHI TIẾT</h2>
                    <thead>
                         <tr>
                              <th scope="col">Hình ảnh vào</th>
                              <th scope="col">Biển số vào</th>
                              <th scope="col">Thời gian vào</th>
                              <th scope="col">Hình ảnh ra</th>
                              <th scope="col">Biển số ra</th>
                              <th scope="col">Thời gian ra</th>
                              <th scope="col">Loại xe</th>
                              <th scope="col">Giá tiền</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($transactions as $Item)
                         <tr>
                              <td><img src="{{$Item->image_in}}" width="200px" height="200px"></td>
                              <td>{{ $Item->text_in }}</td>
                              <td>{{ $Item->created_at }}</td>
                              <td><img src="{{$Item->image_out}}" width="200px" height="200px"></td>
                              <td>{{ $Item->text_out }}</td>
                              <td>{{ $Item->updated_at }}</td>
                              <td>{{ $Item->brand->name }}</td>
                              <td>{{ number_format($Item->price) }}</td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
     </div>
</section>
@endsection