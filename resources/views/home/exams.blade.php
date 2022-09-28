@extends('master')
@section('name', 'Answer Questions')
@section('endname', 'List')
@section('midname', 'Answer Questions list')
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
                <th scope="col" style="width: 12%;">Question {{ $loop->iteration }}:</th>
            </tr>
        </thead>
        <tbody class="table-light">
            <tr>       
                <td scope="col">{{ $data_questions['question'] }}</td>
                <?php }
                elseif ($item->genre_id == 2) { ?>
                <td scope="col" style="width: 12%;">Question {{ $loop->iteration }}: {{ $item->question }}</td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>

@endforeach  
<div class="col-lg-12">
    <div class="col-12 p-1">
    <button class="btn btn-success add-btn" type="submit" id="testButton" data-time="15">Test</button>
</div>
</form>
@endsection