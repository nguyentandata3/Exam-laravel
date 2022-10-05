@extends('master')
@section('name', 'Câu hỏi')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách câu hỏi')
@section('content')
<form action="{{ route('users.addSession',['exam_id' => $exam->id])}}" method="POST">
@csrf
<div class="justify-content-center text-center">
    <div class="col-12 text-first text-primary h4">{{$exam->name}}</div>
</div>

<div class="justify-content-center text-center">
    <button class="col-2 btn btn-success add-btn start">Bắt đầu làm bài</button>
</div>

<div class="col-12 col-md-10 col-lg-9 text-center d-flex">
    <div class="col-md-8 py-2 d-flex">
        <div class="col-12 text-left pt-2 text-dark d-flex fz-2">
            <div class="mr-1 p-1">
                <i class="fa fa-book" aria-hidden="true"></i>
                <span><b>{{ $total_question }}</b> Câu Hỏi </span>
            </div>
            <div class="mr-1 p-1">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span><i data-feather="clock"></i><b>{{$hours}} : {{ $minutes}} : {{$seconds}}</b></span>
            </div>
            <div class="mr-1 p-1">
                <i class="fa fa-star" aria-hidden="true"></i>
                @if ($first_point != null)
                <span>Điểm Cao: <a href="#" onclick="event.preventDefault();" data-toggle="tooltip" title="Thi bởi: {{ $first_point->fullname }} - Bạn có thể đạt điểm cao hơn không?" data-original-title=><b>{{ $first_point->point }}</b></a> </span>
                @endif
            </div>
            <div class="mr-1 p-1">
                <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                @if ($first_point != null)
                <span> Trung Bình: <b>{{ $medium_point }}</b> </span>
                @endif
            </div>
        </div>
    </div>
</div>
@foreach ($answer_questions as $item)
@php 
    if($item->genre_id == 1) {
        $data_questions = json_decode($item->question, true);
    }
@endphp
<div class="col-lg-12">
    <table class="table align-middle table-nowrap shadow-lg m-1 p-1 border border-muted rounded bg-white">
        <div class="col-12 p-1">
            <thead class="table-light">
                <tr>
                    <?php  if($item->genre_id == 1) { ?>
                    <th scope="col" style="width: 12%;">Câu hỏi {{ $loop->iteration }}:</th>
                </tr>
            </thead>
            <tbody class="table-light">
                <tr>       
                    <td scope="col">{!! strip_tags($data_questions['question']) !!}</td>
                    <?php }
                    elseif ($item->genre_id == 2) { ?>
                    <td scope="col" style="width: 12%;">Câu hỏi {{ $loop->iteration }}: {{ $item->question }}</td>
                    <?php } ?>
                </tr>
            </tbody>
        </div>
    </table>
</div>

@endforeach  
<div class="col col-lg-12">
    <div class="col-12 p-1">
        <button class="btn btn-success add-btn start" type="submit" id="testButton" data-time="15">Bắt đầu làm bài</button>
    </div>
</div>
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".start").click(function() {
            return confirm('Bắt đầu tính thời gian thi?');
        });
        $('[data-toggle="tooltip"]').tooltip(); 
        $('.btn-success').tooltip();  
    });
</script>
@endsection