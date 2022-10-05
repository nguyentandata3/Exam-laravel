@extends('master')
@section('name', 'Đề thi')
@section('endname', 'Tạo mới')
@section('midname', 'Tạo 1 đề thi mới')
@section('content')
<form method="post" action="{{ route('admin.exams.store') }}">
    @csrf
    <div class="col-xl-12">
        <div class="mb-3">
            <select name='subject_id' class="form-control" >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="mb-3">
            <label for="cleave-ccard" class="form-label">Tên đề thi</label>
            <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập tên đề thi">
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

    <div class="col-xl-12">
        <div class="mb-3">
        <button class="btn btn-success add-btn" type="submit">Tạo đề thi</button>
        </div>
    </div>
</form>
@endsection