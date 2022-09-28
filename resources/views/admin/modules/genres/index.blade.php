@extends('master')
@section('name', 'Genres')
@section('endname', 'List')
@section('midname', 'Genres - List')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <div class="mt-3 mb-1">
                    <thead>
                        <tr>
                            <th>Numerical Order</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($genres as $genre)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $genre->name }}</th>
                            <th>{{ date('d/m/Y', strtotime($genre->created_at)) }}</th>
                            <th>{{ date('d/m/Y', strtotime($genre->updated_at)) }}</th>
                            <th><a class="btn btn-success add-btn" href="{{ route('admin.genres.edit',['id' => $genre->id]) }}">Edit</a></th>
                            <th><a class="btn btn-sm btn-danger" href="{{ route('admin.genres.destroy',['id' => $genre->id]) }}">Delete</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Numerical Order</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </div>
            </div>
            </div><!-- end card -->
        <!-- end col -->
        </table>
@endsection