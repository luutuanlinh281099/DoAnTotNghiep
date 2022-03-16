@extends('layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Bãi xe', 'key' => 'Chỉnh sửa'])
    <form action="{{ route('park.update', ['id' => $park->id]) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên bãi xe</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập loại xe" value="{{ $park->name }}">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="image_park" value="{{ $park->image }}">
                            <img class="feature_image" style="height: 200px; width: 200px" src="{{ $park->image }}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Số lượng ô</label>
                            <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" placeholder="Nhập giá tiền" value="{{ $park->qty }}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control @error('addr') is-invalid @enderror" name="addr" placeholder="Nhập đại chỉ" value="{{ $park->addr }}">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection