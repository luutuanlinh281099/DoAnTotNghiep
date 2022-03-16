@extends('layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
<style>
     .color-palette {
          height: 80px;
          line-height: 25px;
          text-align: center;
          padding-right: .75rem;
     }

     .color-palette.disabled {
          text-align: center;
          padding-right: 0;
     }

     .color-palette-set {
          margin-bottom: 15px;
     }

     .color-palette span {
          display: none;
          font-size: 12px;
     }

     .color-palette.disabled span {
          text-align: center;
          padding-left: .75rem;
     }

     .color-palette-box h4 {
          position: absolute;
          left: 1.25rem;
          margin-top: .75rem;
          color: rgba(255, 255, 255, 0.8);
          font-size: 12px;
          display: block;
          z-index: 7;
     }
</style>
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
               <h3 style="text-align: center;">DANH SÁCH CÁC KHÁCH HÀNG GỬI XE NHIỀU NHẤT</h3>
               <div class="col-md-12">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Tên khách hàng</th>
                                   <th scope="col">Số lần gửi</th>
                                   <th scope="col">Quản lí</th>
                              </tr>
                         </thead>
                         <tbody>
                              @for($i = 0 ; $i < $user_count ; $i ++) <tr>
                                   <td>{{ $user_id[$i] }}</td>
                                   <td>{{ $user_name[$i] }}</td>
                                   <td>{{ $user_max[$i] }}</td>
                                   <td><a href="{{ route('statistic.user_detail', [$id = $user_id[$i]]) }}" class="btn btn-default">Chi tiết</a></td>
                                   </tr>
                                   @endfor
                         </tbody>
                    </table>
               </div>
          </div>
          <div class="card card-default color-palette-box">
               <h3 style="text-align: center;"> KHÁCH HÀNG </h3>
               <div class="row">
                    @if( $user_singup == null )
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-primary color-palette">
                                   <h3 class="text-center">Số tài khoản đăng kí</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-primary color-palette">
                                   <h3 class="text-center">Số tài khoản đăng kí</h3>
                                   <h3>{{ $user_singup }}</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if( $user_count == null )
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-success color-palette">
                                   <h3 class="text-center">Số khách hàng online</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-success color-palette">
                                   <h3 class="text-center">Số khách hàng online</h3>
                                   <h3>{{ $user_count }}</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if( $month_all == null )
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-warning color-palette">
                                   <h3 class="text-center">Tổng số vé tháng</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-warning color-palette">
                                   <h3 class="text-center">Tổng số vé tháng</h3>
                                   <h3>{{ $month_all }}</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if ( $month_user == null )
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-danger color-palette">
                                   <h3 class="text-center">Vé tháng online</h3>
                                   <h3>0 </h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-6">
                         <div class="color-palette-set">
                              <div class="bg-danger color-palette">
                                   <h3 class="text-center">Vé tháng online</h3>
                                   <h3>{{ $month_user }}</h3>
                              </div>
                         </div>
                    </div>
                    @endif
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