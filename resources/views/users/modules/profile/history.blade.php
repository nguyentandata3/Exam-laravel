@extends('master')
@section('name', 'Bảng điểm')
@section('endname', 'Lịch sử thi')
@section('midname', 'Lịch sử thi')
@section('content')
@foreach ($answer_questions as $item)
@php 
    if($item->level == 1) {
        $level = 'bg_green';
        }
    elseif ($item->level == 2) {
        $level = 'bg_yellow';
        }
    else {
        $level = 'bg_red';
    }
    $data_history = json_decode($results->history);
    foreach($data_history as $keyhistory => $value) {
        $history[$keyhistory] = $value;
    }
    if($item->genre_id == 1) {
        $data_questions = json_decode($item->question, true);
    }
@endphp
<div class="card ml-30">
    <div class="card-body">
        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table ">
                <thead class="table-light">
                    <tr id="question{{$loop->iteration}}">
                        <?php  if(!empty($item->genre_id == 1)) { ?>
                        <th class="{{$level}}" scope="col" style="width: 12%;">
                        Câu hỏi {{ $loop->iteration }}: (Mức độ<?php 
                            if($item->level == 1) {?>
                            dễ)
                            <?php } elseif ($item->level == 2) { ?>
                            vừa)
                            <?php } else {?>
                            khó)
                            <?php }?>
                        </th>
                        <?php }
                        elseif ($item->genre_id == 2) { ?>
                        <th scope="col" style="width: 12%;">Question {{ $loop->iteration }}: {{ $item->question }}</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach($data_questions as $key => $value)
                        @if($key == 'question') 
                            @if(!empty($history[$item->id]))
                            <tr>
                                <th>{{$value}} </th>
                            </tr>
                            @else
                            <tr>
                                <th>{{$value}} <div class="text_red">Bạn không chọn đáp án</div></th>
                            </tr>
                            @endif
                        @else
                            @if(!empty($history[$item->id]))
                                @if($history[$item->id] == $key)
                                    @if($history[$item->id] == $item->answer)
                                    <tr>
                                        <td class="text_green"><input type="radio" value="{{$key}}" checked disabled>
                                        {{$value}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="text_red"><input type="radio" value="{{$key}}" checked disabled>
                                        {{$value}}</td>
                                    </tr>
                                    @endif
                                @else
                                    @if($key == $item->answer)
                                    <tr>
                                        <th class="text_green"><input type="radio" value="{{$key}}" disabled>
                                        {{$value}}</th>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><input type="radio" value="{{$key}}" disabled>
                                        {{$value}}</td>
                                    </tr>
                                    @endif
                                @endif
    
                            @else
                                @if($key == $item->answer)
                                <tr>
                                    <th class="text_green"><input type="radio" value="{{$key}}" disabled>
                                    {{$value}}</th>
                                </tr>
                                @else
                                <tr>
                                    <td><input type="radio" value="{{$key}}" disabled>
                                    {{$value}}</td>
                                </tr>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach   
@endsection 
