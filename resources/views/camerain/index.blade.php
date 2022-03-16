@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Xe vào', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('camerain.add') }}" class="btn btn-success float-right m-2"> Thêm ảnh</a>
                    <a href="{{ route('camerain.take') }}" class="btn btn-warning float-right m-2"> Chụp ảnh</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Lượt</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Biển số</th>
                                <th scope="col">Bãi xe</th>
                                <th scope="col">Loại xe</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $Item)
                            <tr>
                                <td>{{ $Item->id }}</td>
                                <td><img src="{{$Item->image_in}}" width="200px" height="200px"></td>
                                <td>{{ $Item->text_in }}</td>
                                <td>{{ $Item->park->name }}</td>
                                <td>{{ $Item->brand->name }}</td>
                                <td>{{ $Item->created_at }}</td>
                                <td>
                                    <a href="{{ route('camerain.edit', ['id' => $Item->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection