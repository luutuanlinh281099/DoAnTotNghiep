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
               <div class="col-md-12">
                    <h3 style="text-align: center;"> CHỌN MỐC THỜI GIAN </h3>
                    <h4> VUI LÒNG NHẬP CHỌN CẢ HAI MỐC THỜI GIAN </h4>
                    @if( $from == null or $to == null )
                    <form action="{{ route('statistic.search_date') }}" method="post" class="form-inline" role="form">
                         {{csrf_field()}}
                         <div class="form-group">
                              <label class="sr-only" for="">Từ ngày</label>
                              <input type="date" class="form-control @error('datafrom') is-invalid @enderror" name="datefrom" placeholder="Input field" value="">
                         </div>
                         <div class="form-group">
                              <label class="sr-only" for="">Đến ngày</label>
                              <input type="date" class="form-control @error('datato') is-invalid @enderror" name="dateto" placeholder="Input field" value="">
                         </div>
                         <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>
                    @else
                    <form action="{{ route('statistic.search_date') }}" method="post" class="form-inline" role="form">
                         {{csrf_field()}}
                         <div class="form-group">
                              <label class="sr-only" for="">Từ ngày</label>
                              <input type="date" class="form-control @error('datafrom') is-invalid @enderror" name="datefrom" placeholder="Input field" value="{{ $from }}">
                         </div>
                         <div class="form-group">
                              <label class="sr-only" for="">Đến ngày</label>
                              <input type="date" class="form-control @error('datato') is-invalid @enderror" name="dateto" placeholder="Input field" value="{{ $to }}">
                         </div>
                         <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>
                    @endif
                    <br>
               </div>
          </div>
          <div class="card card-default color-palette-box">
               @if( $from == NULL or $to == NULL )
               <h3 style="text-align: center;"> TỪ TRƯỚC TỚI NAY </h3>
               @else
               <h3 style="text-align: center;"> TỪ NGÀY {{ $from }} ĐẾN NGÀY {{ $to }} </h3>
               @endif
               <div class="row">
                    @if( $transaction_online == null )
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-primary color-palette">
                                   <h3 class="text-center">Số lượt xe online</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-primary color-palette">
                                   <h3 class="text-center">Số lượt xe online</h3>
                                   <h3>{{ $transaction_online }} lượt</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if( $transaction_park == null )
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-secondary color-palette">
                                   <h3 class="text-center">Số lượt xe lẻ</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-secondary color-palette">
                                   <h3 class="text-center">Số lượt xe lẻ</h3>
                                   <h3>{{ $transaction_park }} lượt</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if( $transaction_month == null )
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-success color-palette">
                                   <h3 class="text-center">Số lượt xe vé tháng</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-success color-palette">
                                   <h3 class="text-center">Số lượt xe vé tháng</h3>
                                   <h3>{{ $transaction_month }} lượt</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if ( $transaction_sum == null )
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-orange color-palette">
                                   <h3 class="text-center">Tổng số lượt xe</h3>
                                   <h3>0 </h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-orange color-palette">
                                   <h3 class="text-center">Tổng số lượt xe</h3>
                                   <h3>{{ $transaction_sum }} lượt </h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if( $money_park == null)
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-warning color-palette">
                                   <h3 class="text-center">Doanh thu vé lẻ</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-warning color-palette">
                                   <h3 class="text-center">Doanh thu vé lẻ</h3>
                                   <h3>{{ number_format($money_park) }} đ</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if( $money_all == null )
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-danger color-palette">
                                   <h3 class="text-center">Tổng doanh thu</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-danger color-palette">
                                   <h3 class="text-center">Tổng doanh thu</h3>
                                   <h3>{{ number_format($money_all) }} đ</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if($user == null)
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-black color-palette">
                                   <h3 class="text-center">Số khách hàng mới</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-black color-palette">
                                   <h3 class="text-center">Số khách hàng mới</h3>
                                   <h3>{{ $user }}</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if($newpaper == null)
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-light color-palette">
                                   <h3 class="text-center" style="color: black">Số tin tức mới</h3>
                                   <h3 style="color: black">0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-light color-palette">
                                   <h3 class="text-center" style="color: black">Số tin tức mới</h3>
                                   <h3 style="color: black">{{ $newpaper }} lần</h3>
                              </div>
                         </div>
                    </div>
                    @endif
                    @if($member == null)
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-purple color-palette">
                                   <h3 class="text-center">Số tin vé tháng</h3>
                                   <h3>0</h3>
                              </div>
                         </div>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                         <div class="color-palette-set">
                              <div class="bg-purple color-palette">
                                   <h3 class="text-center">Số vé tháng</h3>
                                   <h3>{{ $member }}</h3>
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