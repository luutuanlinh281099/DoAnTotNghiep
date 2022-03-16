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
    @include('partials.content-header', ['name' => 'Vé tháng', 'key' => 'Thêm mới'])
    <div class="col-md-12">
    </div>
    <form action="{{ route('member.create') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Biển số xe</label>
                            <input type="text" class="form-control @error('text') is-invalid @enderror" name="text" placeholder="Nhập biển số xe" value="{{ old('text') }}">
                        </div>
                        <div class="form-group">
                            <label>ID khách hàng</label>
                            <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" placeholder="Nhập id khách hàng" value="{{ old('user_id') }}">
                        </div>
                        <div class="form-group">
                            <label>Loại xe</label>
                            <select class="form-control select2_init" name="brand_id">
                                @foreach($brands as $Item)
                                <option value="{{ $Item->id }}" selected>{{ $Item->name }}</option>
                                @endforeach
                            </select>
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