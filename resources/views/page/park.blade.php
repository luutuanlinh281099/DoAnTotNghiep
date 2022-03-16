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
          <div class="col-sm-12 padding-right" style="margin-top: 50px;">
               <div class="features_items">
                    <h2 class="title text-center">DANH SÁCH BÃI XE</h2>
                    @foreach($parks as $Item)
                    <div class="col-sm-4">
                         <div class="product-image-wrapper">
                              <div class="single-products">
                                   <div class="productinfo text-center">
                                        <img style="width: 400px; height: 300px;" src="{{ config('app.base_url') . $Item->image }}" alt="" />
                                        <h2>{{ $Item->name }}</h2>
                                        <p>{{$Item->addr}}</p>
                                        <a href="{{ route('page.detail', ['id' => $Item->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                                   </div>
                                   <div class="product-overlay">
                                        <div class="overlay-content">
                                             <h2>{{ $Item->name }}</h2>
                                             <p>{{$Item->addr}}</p>
                                             <a href="{{ route('page.detail', ['id' => $Item->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    @endforeach
               </div>
          </div>
     </div>
</section>
@endsection