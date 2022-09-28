@extends('master')
@section('name', 'Answer Questions')
@section('endname', 'Create')
@section('midname', 'Create new Answer Questions')
@section('content')
    <form method="post" action="{{ route('admin.answerquestions.store',['exam_id' => $exams->id], ['genre_id' => $genres->id]) }}" enctype="multipart/form-data">
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
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Choose level</label>
                    <select name='level' class="form-control" >
                        <option value="1">Easy</option>
                        <option value="2">Normal</option>
                        <option value="3">Hard</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-12">
                <label for="cleave-ccard" class="form-label">Question</label>
                <textarea name="question[question]" class="form-control" id="question" cols="30" rows="10"></textarea>
                <script>
                    CKEDITOR.replace('intro', {
                        filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form'
                    });</script>
            </div>

            <div class="col-xl-12">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            @if($genres->id == 1)

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Answer A</label>
                    <input type="text" name="question[a]" class="form-control" id="cleave-ccard" placeholder="Please input Answer A">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Answer B</label>
                    <input type="text" name="question[b]" class="form-control" id="cleave-ccard" placeholder="Please input Answer B">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Answer C</label>
                    <input type="text" name="question[c]" class="form-control" id="cleave-ccard" placeholder="Please input Answer C">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Answer D</label>
                    <input type="text" name="question[d]" class="form-control" id="cleave-ccard" placeholder="Please input Answer D">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Correct Answer</label>
                    <select name="answer" class="form-control">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>
            </div><!-- end col -->
            
            @else
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Answer</label>
                    <input type="text" name="answer" class="form-control" id="cleave-ccard" placeholder="Please input Answer">
                </div>
            </div><!-- end col -->
            @endif
        </div>
        <div class="col-xl-12">
            <div class="mb-3">
                <button class="btn btn-success add-btn form-control" type="submit">Create Exam</button>
            </div>
        </div>
    </form>
@endsection