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
     <div class="content">
          <div class="container-fluid">
               <h3 style="text-align: center;">TÌM KIẾM KHÁCH HÀNG</h3>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0" action="{{ route('statistic.search_user') }}" method="post" enctype="multipart/form-data">
                         @csrf
                         <input class="form-control mr-sm-2" type="search" size="100px" placeholder="Tìm kiếm tên khách hàng" aria-label="Search" name="search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
               </div>
               <h3 style="text-align: center;">DANH SÁCH CÁC KHÁCH HÀNG GỬI NHIỀU NHẤT</h3>
               <div class="col-md-12">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Tên khách hàng</th>
                                   <th scope="col">Email</th>
                                   <th scope="col">Ngày đăng kí</th>
                                   <th scope="col">Quản lí</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($user as $Item)
                              <tr>
                                   <td>{{ $Item->id }}</td>
                                   <td>{{ $Item->name }}</td>
                                   <td>{{ $Item->email }}</td>
                                   <td>{{ $Item->created_at }}</td>
                                   <td><a href="{{ route('statistic.user_detail', ['id' => $Item->id]) }}" class="btn btn-default">Chi tiết</a></td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection