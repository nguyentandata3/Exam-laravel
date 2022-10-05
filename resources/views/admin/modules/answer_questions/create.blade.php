@extends('master')
@section('name', 'Câu hỏi')
@section('endname', 'Tạo mới')
@section('midname', 'Tạo mới câu hỏi')
@section('content')
    <form method="post" action="{{ route('admin.answerquestions.store',['exam_id' => $exams->id], ['genre_id' => $genres->id]) }}" enctype="multipart/form-data">
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
                <textarea name="question[question]" class="form-control" id="question" placeholder="Vui lòng nhập câu hỏi" cols="30" rows="10"></textarea>
                <script>
                    CKEDITOR.replace('intro', {
                        filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form'
                    });</script>
            </div>

            <div class="col-xl-12">
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            @if($genres->id == 1)

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Câu trả lời A</label>
                    <input type="text" name="question[a]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời A">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Câu trả lời B</label>
                    <input type="text" name="question[b]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời B">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Câu trả lời C</label>
                    <input type="text" name="question[c]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời C">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Câu trả lời D</label>
                    <input type="text" name="question[d]" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập câu trả lời D">
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Đáp án</label>
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
                    <label for="cleave-ccard" class="form-label">Đáp án</label>
                    <input type="text" name="answer" class="form-control" id="cleave-ccard" placeholder="Vui lòng nhập đáp án">
                </div>
            </div><!-- end col -->
            @endif
        </div>
        <div class="col-xl-12">
            <div class="mb-3">
                <button class="btn btn-success add-btn form-control" type="submit">Tạo câu hỏi</button>
            </div>
        </div>
    </form>
@endsection