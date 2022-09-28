@extends('master')
@section('name', 'Exam')
@section('endname', 'Edit')
@section('midname', 'Edit exam')
@section('content')
<form method="post" action="{{ route('admin.exams.update',['id' => $exams->id]) }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Old Exam name</label>
                    <input type="text" class="form-control" id="cleave-ccard" value="{{ old('name', $exams->name) }}" readonly>
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">New Exam name</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" value="{{ old('name', $exams->name) }}">
                </div>

            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Total time (Seconds)</label>
                    <input type="text" name="total_time" class="form-control" id="cleave-ccard" placeholder="Please input Total time">
                </div>
            </div><!-- end col -->
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Limit</label>
                    <input type="text" name="limit" class="form-control" id="cleave-ccard" placeholder="Please input Limit exam">
                </div>
            </div><!-- end col -->

        </div>

        </div>
        <button class="btn btn-success" type="submit">Edit</button>
        <a class="btn btn-danger" href="{{ route('admin.exams.index', ['subject_id' => $exams->subject_id]) }}">Cancel</a>
    </div>
</form>
@endsection