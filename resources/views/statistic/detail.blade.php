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
    <div class="content">
        <div class="container-fluid">
            <h3>Tìm kiếm khách hàng</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0" action="{{ route('statistic.search_user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" size="100px" placeholder="Tìm kiếm tên khách hàng" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3> Tên khách hàng: {{ $user->name }} </h3>
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
                                <td>{{ number_format($Item->price) }}</td>
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