@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
@endsection

@section('content')
@if(Auth::user()->role_id == 1)
@include('partials.statistic')
@endif
@endsection