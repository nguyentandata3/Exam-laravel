@extends('master')
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
<div class="col-lg-12" >
    <div class="col-12-p1">
        <table class="table align-middle table-nowrap shadow-lg m-1 p-1 border border-muted rounded bg-white">
            <thead class="table-light">
                <tr id="question{{$loop->iteration}}">
                    <?php  if(!empty($item->genre_id == 1)) { ?>
                    <th class="{{$level}}" scope="col" style="width: 12%;">
                    Question {{ $loop->iteration }}: (Level<?php 
                        if($item->level == 1) {?>
                        Easy
                        <?php } elseif ($item->level == 2) { ?>
                        Normal 
                        <?php } else {?>
                        Hard
                        <?php } ?>)
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
                    <tr>
                        <th>{{$value}}</th>
                    </tr>
                    @else
                        @if(!empty($history[$item->id]))
                            @if($history[$item->id] == $key)
                                @if($history[$item->id] == $item->answer)
                                <tr>
                                    <td class="text_green"><input type="radio" name="{{ $item->id }}" value="{{$key}}" checked disabled>
                                    {{$value}}</td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text_red"><input type="radio" name="{{ $item->id }}" value="{{$key}}" checked disabled>
                                    {{$value}}</td>
                                </tr>
                                @endif
                            @else
                                @if($key == $item->answer)
                                <tr>
                                    <th class="text_green"><input type="radio" name="{{ $item->id }}" value="{{$key}}" disabled>
                                    {{$value}}</th>
                                </tr>
                                @else
                                <tr>
                                    <td><input type="radio" name="{{ $item->id }}" value="{{$key}}" disabled>
                                    {{$value}}</td>
                                </tr>
                                @endif
                            @endif
                        @endif
                        
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach   
@endsection 
