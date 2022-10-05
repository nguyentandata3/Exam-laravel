@extends('master')
@section('name', 'Hình thức')
@section('endname', 'Chỉnh sửa')
@section('midname', 'Chỉnh sửa hình thức')
@section('content')
<form method="post" action="{{ route('admin.genres.update',['id' => $genres->id]) }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tên hình thức cũ</label>
                    <input class="form-control" id="cleave-ccard" value="{{ old('name', $genres->name) }}" readonly>
                </div>

            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tên hình thức mới</label>
                      <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập tên hình thức mới">
                </div>

            </div><!-- end col -->

        </div>
        <button class="btn btn-success" type="submit">Chỉnh sửa</button>
        <a class="btn btn-danger" href="{{ route('admin.genres.index') }}">Hủy bỏ</a>
    </div>
</form>
@endsection