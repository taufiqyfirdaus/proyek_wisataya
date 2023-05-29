@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-dashboard"></i>  Administrator</h1>
    <p>Halaman Administrator Wisataya</p>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection
@section('content')
    <h1>Selamat Datang di Administrator</h1>
@endsection