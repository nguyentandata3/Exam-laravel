@extends('master')
@section('name', 'Answer Question')
@section('endname', 'List')
@section('midname', 'Answer Question list')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <a href=" {{ route('admin.answerquestions.getcheckGenre', ['exam_id' => $exam_id]) }} " class="btn btn-success fw-600" class="">Create A Question</a>
                <div class="mt-3 mb-1">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 12%;">STT</th>
                            <th scope="col" style="width: 12%;">Question</th>
                            <th scope="col" style="width: 12%;">Image</th>
                            <th scope="col" style="width: 12%;">Correct answer</th>
                            <th scope="col" style="width: 12%;">Level</th>
                            <th scope="col" style="width: 12%;">Genre</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($answer_questions as $item)
                        <tr>
                            <td scope="row"> {{ $loop->iteration  }} </td>
                            <?php  
                                if($item->genre_id == 1) { 
                                $data_questions = json_decode($item->question, true); ?>
                                <td scope="col" style="width: 12%;">{{ $data_questions['question'] }}</td>
                            <?php    } ?>

                            <?php 
                                if(!empty($image)) {
                                $image = empty($item->image) ? 'imagedefault.jpg' : $item->image;
                                }
                            ?>
                            <td><img src="{{ asset('images/'<?php $image ?>) }}" width="50px"></td>

                            <?php  
                            if($item->genre_id == 1) { ?>
                                @if ($item->answer == 'a')
                                <td scope="col" style="width: 12%;">{{ $data_questions['a'] }}</td>
                                @elseif ($item->answer == 'b')
                                <td scope="col" style="width: 12%;">{{ $data_questions['b'] }}</td>
                                @elseif ($item->answer == 'c')
                                <td scope="col" style="width: 12%;">{{ $data_questions['c'] }}</td>
                                @elseif ($item->answer == 'd')
                                <td scope="col" style="width: 12%;">{{ $data_questions['d'] }}</td>
                                @else 
                                <td scope="col" style="width: 12%;">{{ $item->answer }}</td>
                                @endif
                            <?php } ?>

                            @if ($item->level == 1)
                                <td scope="col" style="width: 12%;">Easy</td>
                            @elseif($item->level == 2)
                                <td scope="col" style="width: 12%;">Normal</td>
                            @else
                                <td scope="col" style="width: 12%;">Hard</td>
                            @endif
                            <td scope="col" style="width: 12%;">{{ $item->genre_name }}</td>
                            <td><a class="btn btn-success w-100" href="{{ route('admin.answerquestions.edit',['exam_id' => $item->exam_id,
                                                                                'answerquestion_id' => $item->id]) }}">Edit</a></td>
                            <td><a class="btn btn-danger w-100" href="{{ route('admin.answerquestions.destroy',['exam_id' => $item->exam_id,
                                                                                'answerquestion_id' => $item->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col" style="width: 12%;">STT</th>
                            <th scope="col" style="width: 12%;">Question</th>
                            <th scope="col" style="width: 12%;">Image</th>
                            <th scope="col" style="width: 12%;">Correct answer</th>
                            <th scope="col" style="width: 12%;">Level</th>
                            <th scope="col" style="width: 12%;">Genre</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </div>
            </div>
        </table>
    </div>
</div>
@endsection