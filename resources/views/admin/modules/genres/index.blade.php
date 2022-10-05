@extends('master')
@section('name', 'Hình thức')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách hình thức')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Thêm, Tạo &amp; Xóa</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <div class="mt-3 mb-1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Hình thức</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($genres as $genre)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $genre->name }}</th>
                            <th>{{ date('d/m/Y', strtotime($genre->created_at)) }}</th>
                            <th>{{ date('d/m/Y', strtotime($genre->updated_at)) }}</th>
                            <th><a class="btn btn-success add-btn w-100" href="{{ route('admin.genres.edit',['id' => $genre->id]) }}">Chỉnh sửa</a></th>
                            <th><a class="btn btn-sm btn-danger w-100" href="{{ route('admin.genres.destroy',['id' => $genre->id]) }}">Xóa</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Hình thức</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </div>
            </div>
            </div><!-- end card -->
        <!-- end col -->
        </table>
@endsection