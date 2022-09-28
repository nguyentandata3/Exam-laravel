@extends('master')
@section('name', 'Answer Question')
@section('endname', 'List')
@section('midname', 'Answer Question List')
@section('content')
<form method="post" action="{{ route('admin.answerquestions.update',['exam_id' => $exams->id, 'id_answerquestion' => $answer_questions->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-12">

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label" >Genre</label>
                    <input type="text" class="form-control" id="cleave-ccard" value="{{ $genres->name }}" readonly>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="genre_id" class="form-control" id="cleave-ccard" value="{{ $genres->id }}">
                </div>
            </div><!-- end col -->
            <div class="mb-3">
                <label for="cleave-ccard" class="form-label">Choose level</label>
                <select name='level' class="form-control" >
                    <option value="1">Easy</option>
                    <option value="2">Normal</option>
                    <option value="3">Hard</option>
                </select>
            </div>

            <div class="col-xl-12">
                <label for="cleave-ccard" class="form-label">Question</label>
                <textarea name="question[question]" class="form-control" id="question" cols="30" rows="10">{{ old('question[question]', $questions['question']) }}</textarea>
                <script>
                    CKEDITOR.replace('intro', {
                        filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form'
                    });</script>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" value="{{ old('image', $answer_questions->image) }}">
            </div>

            @if($genres->id == 1)

                <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Answer A</label>
                        <input type="text" name="question[a]" class="form-control" id="cleave-ccard" placeholder="Please input new Answer A" value="{{ old('question[a]', $questions['a']) }}">
                    </div>
                </div><!-- end col -->

                 <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Answer B</label>
                        <input type="text" name="question[b]" class="form-control" id="cleave-ccard" placeholder="Please input new Answer C" value="{{ old('question[b]', $questions['b']) }}">
                    </div>
                </div><!-- end col -->

                 <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Answer C</label>
                        <input type="text" name="question[c]" class="form-control" id="cleave-ccard" placeholder="Please input new Answer C" value="{{ old('question[c]', $questions['c']) }}">
                    </div>
                </div><!-- end col -->

                 <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Answer D</label>
                        <input type="text" name="question[d]" class="form-control" id="cleave-ccard" placeholder="Please input new Answer D" value="{{ old('question[d]', $questions['d']) }}">
                    </div>
                </div><!-- end col -->

                <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Correct Answer</label>
                        <select name="answer" class="form-control" value="{{ old('answer', $answer_questions->answer)}}">
                            <option value="a" {{ old('answer', $answer_questions->answer) == 'a' ? 'selected' : '' }}>A</option>
                            <option value="b" {{ old('answer', $answer_questions->answer) == 'b' ? 'selected' : '' }}>B</option>
                            <option value="c" {{ old('answer', $answer_questions->answer) == 'c' ? 'selected' : '' }}>C</option>
                            <option value="d" {{ old('answer', $answer_questions->answer) == 'd' ? 'selected' : '' }}>D</option>
                        </select>
                        
                        </div>
                </div><!-- end col -->
            
            @else
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Answer</label>
                    <input type="text" name="answer" class="form-control" id="cleave-ccard" placeholder="Please input new Answer" value="{{ old('answer', $answer_questions->answer) }}">
                </div>
            </div><!-- end col -->
            @endif
        </div>
        <button class="btn btn-success add-btn" type="submit">Edit</button>
        <a class="btn btn-sm btn-danger" href="{{ route('admin.answerquestions.index',['exam_id' => $exams->id]) }}">Cancel</a>
    </form>

@endsection