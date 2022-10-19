@extends('master')
@section('name', 'Câu hỏi')
@section('endname', 'Tạo mới')
@section('midname', 'Tạo mới 1 câu hỏi')
@section('content')
    <form method="post" action="{{ route('admin.answerquestions.postcheckGenre',['exam_id' => $exams->id]) }}">
        @csrf
        <div class="col-xl-12">
            <div class="mb-3">
                <label for="cleave-ccard" class="form-label" >Hình thức</label>
                <select for="cleave-ccard" class="form-control"  name="genre_id">
                    @foreach($genres as $genre)
                    <option value="{{ old('genres',$genre->id) }}">{{ old('genres', $genre->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div><!-- end col -->
        
        <button class="btn btn-success" type="submit">Next</button>
    </form>
@endsection
