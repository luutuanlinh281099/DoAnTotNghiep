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
     <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
               <br>
               <h2 class="title text-center">Chi tiết tin tức</h2>
               <div class="row">
                    <div class="col-md-9 col-8">
                         <h2 style="font-size: 30px"> {{ $paper->tittle }} </h2>
                    </div>
               </div>
               <div class="row">
                    <p style="font-size: 20px"> {{ $paper->content }} </p>
               </div>
               <div class="row">
                    <h4> Tác giả: {{ $paper->author }} </h4>
               </div>
               <div class="row">
                    <h4> Lượt xem: {{ $paper->view }} </h4>
               </div>
               <div class="row">
                    <h4> Thời gian: {{ $paper->created_at }} </h4>
               </div>
          </div>
     </div>
</section>
@endsection