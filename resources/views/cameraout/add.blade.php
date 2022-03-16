@extends('layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Xe ra', 'key' => 'Thêm mới'])
    <div class="col-md-12">
    </div>
    <form id="form" action="{{ route('cameraout.create') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <h3 style="text-align: center;"> BÃI XE HAI BÀ TRƯNG </h3>
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Ảnh chụp</label>
                            <input id="image" type="file" class="form-control-file" name="file">
                            <small id="image-required" style="color: red; display: none;">Chọn ảnh</small>
                        </div>
                        <div class="col-md-12">
                            <button id="call-api" type="submit" class="btn btn-primary">Xác Nhận</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // gọi API nhận diện ảnh
    $('#call-api').on('click', function(e) {
        e.preventDefault();
        if ($('#image').val()) {
            $('#image-required').hide();
            var form = new FormData();
            form.append("file", $('#image')[0].files[0]);
            var settings = {
                "url": "http://127.0.0.1:8888/license-plate-file",
                "method": "POST",
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
            };
            // gọi API lưu vào db
            $.ajax(settings).done(function(response) {
                var result = JSON.parse(response);
                if (result.status == true) {
                    console.log(result.text, 'linh');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: `/cameraout/create`,
                        data: result,
                        success: function(data) {
                            Swal.fire('Biển số xe ra là: ' + result.text)
                        },
                        error: function(error) {}
                    });
                } else {
                    Swal.fire('Không nhận diện được biển số, vui lòng thử lại')
                }
                console.log(result);
            });
        } else {
            $('#image-required').show();
        }
    });
</script>
@endsection