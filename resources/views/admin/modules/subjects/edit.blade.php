@extends('master')
@section('name', 'Subject')
@section('endname', 'Edit')
@section('midname', 'Edit subject name')
@section('content')
<form method="post" action="{{ route('admin.subjects.update',['id' => $subjects->id]) }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Old subject name</label>
                    <input class="form-control" id="cleave-ccard" value="{{ $subjects->name }}" readonly>
                </div>

            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">New subject name</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Please input new Subject name">
                </div>
            </div><!-- end col -->
        </div>
        <button class="btn btn-success" type="submit">Edit</button>
        <a class="btn btn-danger" href="{{ route('admin.subjects.index') }}">Cancel</a>
    </div>
</form>
@endsection