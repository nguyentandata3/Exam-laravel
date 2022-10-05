@extends('master')
@section('name', 'Môn thi')
@section('endname', 'Tạo mới')
@section('midname','Tạo mới 1 môn thi')
@section('content')
<form method="post" action="{{ route('admin.subjects.store') }}">
    @csrf
    <div class="mt-4 ">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label ">Tên môn thi</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập tên môn thi">
                </div>
            </div><!-- end col -->
        </div>
    </div>
    <button class="btn btn-sm btn-success"  type="submit">Tạo</button>
</form>
@endsection