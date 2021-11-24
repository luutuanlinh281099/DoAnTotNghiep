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
    @include('partials.content-header', ['name' => 'Loại xe', 'key' => 'Chỉnh sửa'])
    <form action="{{ route('brand.update',  ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên loại xe</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập loại xe" value="{{ $brand->name }}">
                        </div>
                        <div class="form-group">
                            <label>Giá tiền</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Nhập giá tiền" value="{{ $brand->price }}">
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