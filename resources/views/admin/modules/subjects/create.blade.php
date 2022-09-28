@extends('master')
@section('name', 'Subject')
@section('endname', 'Create')
@section('midname','Create new subject')
@section('content')
<form method="post" action="{{ route('admin.subjects.store') }}">
    @csrf
    <div class="mt-4 ">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label ">Name subject</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Please input Subject name ">
                </div>
            </div><!-- end col -->
        </div>
    </div>
    <button class="btn btn-sm btn-success"  type="submit">Create</button>
</form>
@endsection