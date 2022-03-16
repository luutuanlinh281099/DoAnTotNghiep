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
    @include('partials.content-header', ['name' => 'Tin tức', 'key' => 'Thêm mới'])
    <div class="col-md-12">
    </div>
    <form action="{{ route('newpaper.create') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" class="@error('content') is-invalid @enderror form-control tinymce_editor_init"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" placeholder="Nhập tác giả">
                        </div>
                        <div class="form-group">
                            <label>Lượt xem</label>
                            <input type="text" class="form-control @error('view') is-invalid @enderror" name="view" placeholder="Nhập lượt xem">
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