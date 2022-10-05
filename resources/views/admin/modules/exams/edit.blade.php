@extends('master')
@section('name', 'Đề thi')
@section('endname', 'Chỉnh sửa')
@section('midname', 'Chỉnh sửa đề thi')
@section('content')
<form method="post" action="{{ route('admin.exams.update',['id' => $exams->id]) }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tên đề thi cũ</label>
                    <input type="text" class="form-control" id="cleave-ccard" value="{{ old('name', $exams->name) }}" readonly>
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tên đề thi mới</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" value="{{ old('name', $exams->name) }}">
                </div>

            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Tổng thời gian (Giờ : Phút : Giay)</label>
                    <div class="row ml-0">
                        <input type="text" name="hours" class="form-control col-1" placeholder="Giờ" value="0">
                        <input type="text" name="minutes" class="form-control col-1" placeholder="Phút" value="0">
                        <input type="text" name="seconds" class="form-control col-1" placeholder="Giây" value="0">
                    </div>    
                </div>
            </div><!-- end col -->
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Giới hạn số lần làm bài</label>
                    <input type="text" name="limit" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập giới hạn số lần làm bài">
                </div>
            </div><!-- end col -->

        </div>

        </div>
        <button class="btn btn-success" type="submit">Chỉnh sửa</button>
        <a class="btn btn-danger" href="{{ route('admin.exams.index', ['subject_id' => $exams->subject_id]) }}">Hủy bỏ</a>
    </div>
</form>
@endsection