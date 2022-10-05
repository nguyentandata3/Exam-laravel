@extends('master')
@section('name', 'Câu hỏi')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách Câu hỏi')
@section('content')
<form action="{{ route('users.addSession',['exam_id' => $exam->id]) }}" method="POST">
@csrf
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
                <th scope="col" style="width: 12%;">Đề thi {{ $loop->iteration }}:</th>
            </tr>
        </thead>
        <tbody class="table-light">
            <tr>       
                <td scope="col">{{ $data_questions['question'] }}</td>
                <?php }
                elseif ($item->genre_id == 2) { ?>
                <td scope="col" style="width: 12%;">Đề thi {{ $loop->iteration }}: {{ $item->question }}</td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>

@endforeach  
<div class="col-lg-12">
    <div class="col-12 p-1">
    <button class="btn btn-success add-btn start" type="submit" id="testButton" data-time="15">Bắt đầu làm bài</button>
</div>
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
    $(".start").click(function() {
        return confirm('Bắt đầu tính thời gian thi?');
    });
</script>
@endsection