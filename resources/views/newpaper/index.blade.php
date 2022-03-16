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
    @include('partials.content-header', ['name' => 'Tin tức', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('newpaper.add') }}" class="btn btn-success float-right m-2"> Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newpapers as $Item)
                            <tr>
                                <td>{{ $Item->id }}</td>
                                <td>{{ $Item->tittle }}</td>
                                <td>{{ $Item->content }}</td>
                                <td>{{ $Item->author }}</td>
                                <td>{{ $Item->view }}</td>
                                <td>{{ $Item->created_at }}</td>
                                <td>
                                    <a href="{{ route('newpaper.edit', ['id' => $Item->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('newpaper.delete', ['id' => $Item->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $newpapers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection