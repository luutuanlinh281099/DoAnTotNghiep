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
    @include('partials.content-header', ['name' => 'Xe ra', 'key' => 'Thêm mới'])
    <div class="col-md-12">
    </div>
    <form action="{{ route('cameraout.create') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Ảnh chụp</label>
                            <input type="file" class="form-control-file" name="image_out">
                        </div>
                        <div class="form-group">
                            <label>Biển số</label>
                            <input type="text" class="form-control @error('text_out') is-invalid @enderror" name="text_out" placeholder="Nhập biển số" value="{{ old('text_out') }}">
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