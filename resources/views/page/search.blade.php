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
     <h2 class="title text-center" style="margin-top:30px">Kết quả tìm kiếm</h2>
     <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
               @foreach ($search as $Item)
               <article class="item-news item-news-common off-thumb">
                    <h3 class="title-news"><a href="{{ route('page.paper', ['id' => $Item->id]) }}">{{ $Item->tittle }}</a></h3>
                    <p class="description"><a href="">Tác giả: {{ $Item->author }}</a><span class="meta-news"></p>
                    <p class="description"><a href="">Lượt xem: {{ $Item->view }}</a><span class="meta-news"></p>
                    <p class="description"><a href="">Thời gian: {{ $Item->created_at }}</a><span class="meta-news"></p>
               </article>
               @endforeach
          </div>
     </div>
</section>
@endsection