@extends('master')
@section('name', 'Đề thi')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách đề thi')
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
            <h4 class="card-title mb-0">Thêm, Sửa &amp; Xóa</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <div class="mt-3 mb-1">
                <a href=" {{ route('admin.exams.create') }} " class="btn btn-success add-btn fw-600">Tạo 1 đề thi mới</a>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Môn thi</th>
                            <th scope="col" class="w-30">Tên đề thi</th>
                            <th scope="col" class="w-12">Tổng thời gian</th>
                            <th scope="col" class="w-12">Ngày tạo</th>
                            <th scope="col" class="w-12">Ngày chỉnh sửa</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th scope="col" value="{{ $exam->id }}">{{ $exam->subject_name }}</th>
                            <th scope="col" class="w-30"><a href="{{ route('admin.answerquestions.index',['exam_id' => $exam->id]) }}">{{ $exam->name }}</a></th>
                            @if($exam->total_time >= 3600)
                                <th scope="col" style="width: 12%;">{{ (int)($exam->total_time / 3600) }} : {{ (int)(($exam->total_time % 3600) / 60) }} : {{ ($exam->total_time % 60)}}</th>
                            
                            @elseif($exam->total_time < 3600 && $exam->total_time > 60) 
                                    <th scope="col" style="width: 12%;">{{ (int)($exam->total_time / 60) }} : {{ ($exam->total_time % 60)}}</th>
                            
                            @else 
                                    <th scope="col" style="width: 12%;">{{ ($exam->total_time % 60)}}</th>
                            
                            @endif                                
                            {{-- <th scope="col" class="w-12">{{ $exam->limit}}</th> --}}
                            <th scope="col" class="w-12">{{ date('d/m/Y', strtotime($exam->created_at)) }}</th>
                            <th scope="col" class="w-12">{{ date('d/m/Y', strtotime($exam->updated_at)) }}</th>
                            <th><a class="btn btn-primary w-100" href="{{ route('admin.answerquestions.getcheckGenre',['exam_id' => $exam->id]) }}">Thêm 1 câu hỏi</a></th>
                            <th><a class="btn btn-success w-100"  href="{{ route('admin.exams.edit',['id' => $exam->id]) }}">Chỉnh sửa</a></th>
                            <th><a class="btn btn-danger w-100 delete" href="{{ route('admin.exams.destroy',['id' => $exam->id]) }}">Xóa</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Môn thi</th>
                            <th scope="col" class="w-30">Tên đề thi</th>
                            <th scope="col" class="w-12">Tổng thời gian</th>
                            <th scope="col" class="w-12">Ngày tạo</th>
                            <th scope="col" class="w-12">Ngày chỉnh sửa</th>
                            <th></th>
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
        return confirm('Xóa đề thi?');
    }); 
</script>
@endsection