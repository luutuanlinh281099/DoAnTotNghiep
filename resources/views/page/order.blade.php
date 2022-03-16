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
                    <br>
                    <h2 class="title text-center">ĐẶT CHỖ</h2>
                    <div class="shopper-info">
                         <h3>Nhập thông tin</h3>
                         <form action="{{ route('page.transaction', ['id' => $park->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="text" placeholder="Tên khách hàng" name="user_id" value="{{Auth::user()->name}}">
                              <input type="text" placeholder="Bãi xe" name="park_id" value="{{ $park->name }}">
                              <input type="text" placeholder="Biển số xe" name="text_in" value="">
                              <div class="form-group">
                                   <label>Loại xe</label>
                                   <select class="form-control select2_init" name="brand_id">
                                        @foreach($brands as $Item)
                                        <option value="{{ $Item->id }}" selected>{{ $Item->name }} ( {{ number_format($Item->price) }}đ )</option>
                                        @endforeach
                                   </select>
                              </div>
                              <button class="btn btn-primary">Xác nhận</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>
@endsection