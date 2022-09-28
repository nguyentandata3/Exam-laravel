@extends('master')
@section('name', 'Transcript')
@section('endname', 'History')
@section('midname', 'Transcript')
@section('content')
<?php
use Illuminate\Support\Facades\Auth;
?>
<div class="row justify-content-center fz-4">
    <div class="col-12 pt-3 col-md-10 d-flex h3 text-primary justify-content-center text-center">
       Transcript
    </div>
    <div class="col-12  pb-4 col-md-10 d-flex h4 text-primary font-weight-bold font-italic justify-content-center text-center"> {{ Auth::user()->fullname }}
    </div>

    
    <div class="col-12 col-md-10 d-flex border-bottom border-top py-1 bg-white">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Subject</th>
                    <th>Exam</th>
                    <th>Time</th>
                    <th>Point</th>
                </tr>
            </thead>

            <tbody>
                @foreach($results as $item)
                <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $item->subject_name }}</td>
                    <td><a href="{{ route('users.history', ['history_id' => $item->id]) }}">{{ $item->exam_name }}</a></td>
                    <td>{{ $item->completion_time }}</td>
                    <td>{{ $item->point }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection