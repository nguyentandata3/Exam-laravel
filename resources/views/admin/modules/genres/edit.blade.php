@extends('master')
@section('name', 'Genre')
@section('endname', 'Edit')
@section('midname', 'Edit genre name')
@section('content')
<form method="post" action="{{ route('admin.genres.update',['id' => $genres->id]) }}">
    @csrf
    <div class="mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">Old Genre</label>
                    <input class="form-control" id="cleave-ccard" value="{{ old('name', $genres->name) }}" readonly>
                </div>

            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="mb-3">
                    <label for="cleave-ccard" class="form-label">New Genre</label>
                      <input type="text" name="name" class="form-control" id="cleave-ccard" placeholder="Please input new Genre">
                </div>

            </div><!-- end col -->

        </div>
        <button class="btn btn-success" type="submit">Edit</button>
        <a class="btn btn-danger" href="{{ route('admin.genres.index') }}">Cancel</a>
    </div>
</form>
@endsection