@extends('layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
<style>
    #camera {
        width: 800px;
        height: 450px;
    }

    #image {
        width: 800px;
        height: 450px;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Xe ra', 'key' => 'Chụp ảnh'])
    <div class="container-fluid">
    <h3 style="text-align: center;"> BÃI XE HAI BÀ TRƯNG </h3>
        <div style="margin-left: 300px;">
            <h3>Camera</h3>
            <div class="row">
                <div class="card" id="camera"></div>
                <div>
                    <button style="margin-left: 50px" type="button" class="btn btn-success btn-lg" onclick="take_snapshot()">Chụp ảnh</button>
                </div>
            </div>
            <h3>Ảnh chụp</h3>
            <div class="row">
                <div class="card" id="image"></div>
                <div>
                    <button style="margin-left: 50px" type="button" class="btn btn-primary btn-lg" onclick="save_snap()">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js "></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var data;
    Webcam.set({
        width: 800,
        height: 450,
        image_format: "jpeg",
        jpg_quality: 720,
    });
    Webcam.attach("#camera");
    // chụp ảnh
    function take_snapshot() {
        Webcam.snap(function(data_image) {
            document.getElementById("image").innerHTML =
                '<img id="base64image" src="' + data_image + '"/>';
            data = data_image.substr(23);
        });
    }
    // gửi qua server AI
    function save_snap() {
        console.log(data, 'data');
        var settings = {
            "url": "http://127.0.0.1:8888/license-plate-base64",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "base64": data
            }),
        };
        // gọi API lưu vào db
        $.ajax(settings).done(function(response) {
            if (response.status == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: `/cameraout/create`,
                    data: response,
                    success: function(data) {
                        Swal.fire('Biển số xe ra là: ' + response.text)
                    },
                    error: function(error) {}
                });
            } else {
                Swal.fire('Không nhận diện được biển số, vui lòng thử lại')
            }
            console.log(response);
        });
    }
</script>
@endsection