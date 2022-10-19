@extends('master')
@section('name', 'Câu hỏi')
@section('endname', 'Chỉnh sửa')
@section('midname', 'Chỉnh sửa câu hỏi')
@section('content')
<form method="post" action="{{ route('admin.answerquestions.update',['answerquestion_id' => $answer_questions->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-12">

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label" >Hình thức</label>
                    <input type="text" class="form-control" id="cleave-ccard" value="{{ $genres->name }}" readonly>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="genre_id" class="form-control" id="cleave-ccard" value="{{ $genres->id }}">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Cấp độ</label>
                    <select name='level' class="form-control" >
                        <option value="1">Dễ</option>
                        <option value="2">Vừa</option>
                        <option value="3">Khó</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-12">
                <label for="cleave-ccard" class="form-label">Câu hỏi</label>
                <textarea name="question[question]" class="form-control" id="question" cols="30" rows="10">{{ old('question[question]', $questions['question']) }}</textarea>
                <script>
                    CKEDITOR.replace('intro', {
                        filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form'
                    });</script>
            </div>
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image', $answer_questions->image) }}">
                </div>
            </div>

            @if($genres->id == 1)

                <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Câu trả lời A</label>
                        <input type="text" name="question[a]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời mới A" value="{{ old('question[a]', $questions['a']) }}">
                    </div>
                </div><!-- end col -->

                 <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Câu trả lời B</label>
                        <input type="text" name="question[b]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời mới C" value="{{ old('question[b]', $questions['b']) }}">
                    </div>
                </div><!-- end col -->

                 <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Câu trả lời C</label>
                        <input type="text" name="question[c]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời mới C" value="{{ old('question[c]', $questions['c']) }}">
                    </div>
                </div><!-- end col -->

                 <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Câu trả lời D</label>
                        <input type="text" name="question[d]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời mới D" value="{{ old('question[d]', $questions['d']) }}">
                    </div>
                </div><!-- end col -->

                <div class="col-xl-12">
                    <div class="mb-3">
                        <label for="cleave-ccard" class="form-label">Đáp án</label>
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
                    <label for="cleave-ccard" class="form-label">Đáp án đúng</label>
                    <input type="text" name="answer" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập đáp án mới" value="{{ old('answer', $answer_questions->answer) }}">
                </div>
            </div><!-- end col -->
            @endif
        </div>
        <div class="col-xl-12">
            <button class="btn btn-success add-btn" type="submit">Chỉnh sửa</button>
            <a class="btn btn-danger add-btn" href="{{ route('admin.answerquestions.index',['exam_id' => $exams->id]) }}">Hủy bỏ chỉnh sửa</a>
        <div class="col-xl-12">
    </form>

@endsection