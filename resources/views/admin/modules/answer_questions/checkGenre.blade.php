@extends('master')
@section('name', 'Answer Questions')
@section('endname', 'Create')
@section('midname', 'Create new Answer Questions')
@section('content')
    <form method="post" action="{{ route('admin.answerquestions.postcheckGenre',['exam_id' => $exams->id]) }}">
        @csrf
        <div class="col-xl-12">
            <div class="mb-3">
                <label for="cleave-ccard" class="form-label" >Genre</label>
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
