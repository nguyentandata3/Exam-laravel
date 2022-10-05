@extends('master')
@section('name', 'Bảng điểm')
@section('endname', 'Lịch sử thi')
@section('midname', 'Lịch sử thi')
@section('content')
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
?>
<div class="row justify-content-center fz-4">
    <div class="col-12 pt-3 col-md-10 d-flex h3 text-primary justify-content-center text-center">
       Bảng điểm
    </div>
    <div class="col-12  pb-4 col-md-10 d-flex h4 text-primary font-weight-bold font-italic justify-content-center text-center"> {{ Auth::user()->fullname }}
    </div>

    
    <div class="col-12 col-md-10 border-bottom border-top py-1 bg-white">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Môn Thi</th>
                    <th>Đề Thi</th>
                    <th>Thời gian hoàn thành</th>
                    <th>Điểm số</th>
                </tr>
            </thead>

            <tbody>
                @foreach($results as $item)
                <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $item->subject_name }}</td>
                    <td><a href="{{ route('users.history', ['history_id' => $item->id]) }}">{{ $item->exam_name }}</a></td>
                    @php
                        $hours = (int)($item->completion_time / 3600);
                        $minutes = (int)(($item->completion_time - $hours * 3600) / 60);
                        $seconds = (int)(($item->completion_time - ($hours * 3600 + $minutes * 60 )) % 3600);
                    @endphp
                    <td>{{ $hours }} : {{ $minutes }} : {{ $seconds }}</td>
                    @php
                        $total_question = DB::table('answer_questions')->where('exam_id', $item->exam_id)->count();
                    @endphp
                    <td>{{ $item->point }}/{{$total_question}}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Môn Thi</th>
                    <th>Đề Thi</th>
                    <th>Thời gian hoàn thành</th>
                    <th>Điểm số</th>
                </tr>
            </tfoot>

        </table>
    </div>
</div>
@endsection