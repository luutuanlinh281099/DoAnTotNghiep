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
    @include('partials.content-header', ['name' => 'Khách hàng', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('user.add') }}" class="btn btn-success float-right m-2"> Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phân quyền</th>
                                <th scope="col">Ngày đăng kí</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $Item)
                            <tr>
                                <td>{{ $Item->id }}</td>
                                <td>{{ $Item->name }}</td>
                                <td>{{ $Item->email }}</td>
                                <td>{{ optional($Item->role)->permession }}</td>
                                <td>{{ $Item->created_at }}</td>
                                <td>
                                    <a href="{{ route('user.edit', ['id' => $Item->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('user.delete', ['id' => $Item->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection