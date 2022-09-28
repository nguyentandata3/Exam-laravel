@extends('master')
@section('name', 'Exam')
@section('endname', 'List')
@section('midname', 'Exam list')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <div class="mt-3 mb-1">
                <a href=" {{ route('admin.exams.create') }} " class="btn btn-success add-btn fw-600">Create A Exam</a>
                    <thead>
                        <tr>
                            <th>Numerial Order</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class="w-30">Exam name</th>
                            <th scope="col" class="w-12">Total time</th>
                            <th scope="col" class="w-12">Limit</th>
                            <th scope="col" class="w-12">Created At</th>
                            <th scope="col" class="w-12">Updated At</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @for($i = 1; $i < 50; $i++)
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
                            <th scope="col" class="w-12">{{ $exam->limit}}</th>
                            <th scope="col" class="w-12">{{ date('d/m/Y', strtotime($exam->created_at)) }}</th>
                            <th scope="col" class="w-12">{{ date('d/m/Y', strtotime($exam->updated_at)) }}</th>
                            <th><a class="btn btn-primary" href="{{ route('admin.answerquestions.getcheckGenre',['exam_id' => $exam->id]) }}">Add Question</a></th>
                            <th><a class="btn btn-success add-btn"  href="{{ route('admin.exams.edit',['id' => $exam->id]) }}">Edit</a></th>
                            <th><a class="btn btn-sm btn-danger" href="{{ route('admin.exams.destroy',['id' => $exam->id]) }}">Delete</a></th>
                        </tr>
                        @endforeach
                    @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Numerial Order</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class="w-30">Exam name</th>
                            <th scope="col" class="w-12">Total time</th>
                            <th scope="col" class="w-12">Limit</th>
                            <th scope="col" class="w-12">Created At</th>
                            <th scope="col" class="w-12">Updated At</th>
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
@endsection