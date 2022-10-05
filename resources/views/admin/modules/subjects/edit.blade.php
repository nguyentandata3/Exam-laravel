@extends('master')
@section('name', 'Môn thi')
@section('endname', 'Chỉnh sửa')
@section('midname', 'Chỉnh sửa tên môn thi')
@section('content')
<form method="post" action="{{ route('admin.subjects.update',['id' => $subjects->id]) }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tên môn thi cũ</label>
                    <input class="form-control" id="cleave-ccard" value="{{ $subjects->name }}" readonly>
                </div>

            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tên môn thi mới</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập tên môn thi mới">
                </div>
            </div><!-- end col -->
        </div>
        <button class="btn btn-success" type="submit">Chỉnh sửa</button>
        <a class="btn btn-danger" href="{{ route('admin.subjects.index') }}">Xóa</a>
    </div>
</form>
@endsection