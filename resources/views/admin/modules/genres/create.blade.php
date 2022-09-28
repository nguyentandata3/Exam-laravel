@extends('master')
@section('name', 'Genre')
@section('endname', 'Create')
@section('midname','Create new genre')
@section('content')
<form method="post" action="{{ route('admin.genres.store') }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Genres name</label>
                    <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Please input Genre name ">
                </div>
            </div><!-- end col -->
        </div>
        <button class="btn btn-success add-btn" type="submit">Create</button>
    </div>
</form>
@endsection