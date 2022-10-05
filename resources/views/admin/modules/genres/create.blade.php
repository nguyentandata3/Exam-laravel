@extends('master')
@section('name', 'Hình thức')
@section('endname', 'Tạo mới')
@section('midname','Tạo mới 1 hình thức')
@section('content')
<form method="post" action="{{ route('admin.genres.store') }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Hình thức</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập hình thức">
                </div>
            </div><!-- end col -->
        </div>
        <button class="btn btn-success add-btn" type="submit">Tạo</button>
    </div>
</form>
@endsection