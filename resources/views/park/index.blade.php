@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Bãi xe', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('park.add') }}" class="btn btn-success float-right m-2"> Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Bãi xe</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parks as $Item)
                            <tr>
                                <td>{{ $Item->id }}</td>
                                <td>{{ $Item->name }}</td>
                                <td>{{ $Item->addr }}</td>
                                <td><img src="{{$Item->image}}" width="200px" height="200px"></td>
                                <td>{{ $Item->qty }}</td>
                                <td>
                                    <a href="{{ route('park.edit', ['id' => $Item->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('park.delete', ['id' => $Item->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $parks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection