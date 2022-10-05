@extends('master')
@section('name', 'Exam')
@section('endname', 'Create')
@section('midname', 'Create new Exam')
@section('content')
<form method="post" action="{{ route('admin.exams.store') }}">
    @csrf
    <div class="col-xl-12">
        <div class="mb-3">
            <select name='subject_id' class="form-control" >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="mb-3">
            <label for="cleave-ccard" class="form-label">Exam Name</label>
            <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Please input Exam name">
        </div>
    </div><!-- end col -->

    <div class="col-xl-12">
        <div class="mb-3">
            <label for="cleave-ccard" class="form-label">Total time (Hours : Minutes : Seconds)</label>
            <div class="row ml-0">
                <input type="text" name="hours" class="form-control col-1" placeholder="Hours" value="0">
                <input type="text" name="minutes" class="form-control col-1" placeholder="Minutes" value="0">
                <input type="text" name="seconds" class="form-control col-1" placeholder="Seconds" value="0">
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-12">
        <div class="mb-3">
            <label for="cleave-ccard" class="form-label">Limit</label>
            <input type="text" name="limit" class="form-control" id="cleave-ccard" placeholder="Please input Limit exam">
        </div>
    </div><!-- end col -->

    <div class="col-xl-12">
        <div class="mb-3">
        <button class="btn btn-success add-btn" type="submit">Create Exam</button>
        </div>
    </div>
</form>
@endsection