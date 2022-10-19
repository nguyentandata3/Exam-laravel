@extends('master')
@section('name', 'Liên hệ')
@section('endname', 'Thông tin')
@section('midname', 'Thông tin liên hệ')
@section('content')
<div class="container box">

    <h3 class="text_info mt-30"> Ý Kiến Của Bạn </h3>

    <form method="post" action="{{ route('feedback') }}">
        @csrf
        <div class="form-group">
            <label> Họ và Tên </label>
            <input type="text" name="name" class="form-control" placeholder="Vui lòng nhập tên của bạn">
        </div>
        <div class="form-group">
            <label> Địa Chỉ Email </label>
            <input type="text" name="email" class="form-control" placeholder="Vui lòng nhập email của bạn">
        </div>
        <div class="form-group">
            <label> Thông tin góp ý </label>
            <textarea name="content" class="form-control" style="height: 60px;"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Gửi Ý Kiến" class="btn btn-info">
        </div>
    </form>

</div>
@endsection