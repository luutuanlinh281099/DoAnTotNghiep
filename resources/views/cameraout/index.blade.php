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
    @include('partials.content-header', ['name' => 'Xe ra', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('cameraout.add') }}" class="btn btn-success float-right m-2"> Chụp ảnh</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Lượt</th>
                                <th scope="col">Hình ảnh vào</th>
                                <th scope="col">Biển số vào</th>
                                <th scope="col">Thời gian vào</th> 
                                <th scope="col">Hình ảnh ra</th>
                                <th scope="col">Biển số ra</th>
                                <th scope="col">Thời gian ra</th>
                                <th scope="col">Loại xe</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $Item)
                            <tr>
                                <td>{{ $Item->id }}</td>
                                <td><img src="{{$Item->image_in}}" width="200px" height="200px"></td>
                                <td>{{ $Item->text_in }}</td>
                                <td>{{ $Item->created_at }}</td>
                                <td><img src="{{$Item->image_out}}" width="200px" height="200px"></td>
                                <td>{{ $Item->text_out }}</td>
                                <td>{{ $Item->updated_at }}</td>
                                <td>{{ $Item->brand->name }}</td>
                                <td>{{ $Item->brand->price }}</td>
                                <td>
                                    <a href="{{ route('cameraout.edit', ['id' => $Item->id]) }}" class="btn btn-default">Chỉnh sửa</a>
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