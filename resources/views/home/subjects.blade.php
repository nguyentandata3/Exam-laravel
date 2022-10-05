@extends('master')
@section('name', 'Đề thi')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách đề thi')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div id="customerList">
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="w-30">Tên đề thi</th>
                                <th scope="col" class="w-12">Tổng thời gian làm bài</th>
                                <th></th>
                                <th></th>
                                <th scope="col"  class="w-80"></th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach($exams as $exam)
                            <tr>
                                <td scope="col" class="w-30"><a href="{{ route('users.exams',['exam_id' => $exam->id]) }}">{{ $exam->name }}</a></td>
                                @if($exam->total_time >= 3600)
                                    <td scope="col" style="width: 12%;">{{ (int)($exam->total_time / 3600) }} : {{ (int)(($exam->total_time % 3600) / 60) }} : {{ ($exam->total_time % 60)}}</td>
                                
                                @elseif($exam->total_time < 3600 && $exam->total_time > 60) 
                                    <td scope="col" style="width: 12%;">{{ (int)($exam->total_time / 60) }} : {{ ($exam->total_time % 60)}}</td>
                                
                                @else 
                                    <td scope="col" style="width: 12%;">{{ ($exam->total_time % 60)}}</td>
                                
                                @endif
                                <td></td>
                                <td></td>
                                <td><a class="btn btn-success add-btn w-80"  href="{{ route('exams',['exam_id' => $exam->id]) }}">Xem đề thi</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection