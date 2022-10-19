@extends('master')
@section('name', 'Môn thi')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách môn thi')
@section('content')
<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
?>
<div class="col-12 p-1 pull-center">
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible" id="tb">
        <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
        {{ (Session::get('success')) }}
    </div>
    @endif
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Tạo, Chỉnh sửa &amp; Xóa</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <a href=" {{ route('admin.subjects.create') }} " class="btn btn-sm btn-success fw-600">Tạo 1 môn thi mới</a>
                <div class="mt-3 mb-1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên môn thi</th>
                            <th>Ngày tạo</th>
                            <th>Ngày chỉnh sửa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href=" {{ route('admin.exams.index', ['subject_id' => $subject->id]) }} ">{{ $subject->name }}</a></td>
                        <td>{{ date('d/m/Y', strtotime($subject->created_at)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($subject->updated_at)) }}</td>
                        <td><a class="btn btn-sm btn-success w-100" href="{{ route('admin.subjects.edit',['id' => $subject->id]) }}">Chỉnh sửa</a></td>
                        <td><a class="btn btn-sm btn-danger w-100 delete" href="{{ route('admin.subjects.destroy',['id' => $subject->id]) }}">Xóa</a></td>
                        
                    </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên môn thi</th>
                            <th>Ngày tạo</th>
                            <th>Ngày chỉnh sửa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </div>
            </div>
            </div><!-- end card -->
        <!-- end col -->
        </table>
        
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
    $(".delete").click(function() {
        flag = false;
        return confirm('Xóa môn thi này?');
    }); 
</script>
@endsection