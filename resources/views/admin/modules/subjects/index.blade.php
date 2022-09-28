@extends('master')
@section('name', 'Subjects')
@section('endname', 'List')
@section('midname', 'Subjects - List')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div id="customerList">
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a class="btn btn-success add-btn"href="{{ route('admin.subjects.create')}}"><i class="ri-add-line align-bottom me-1"></i> Add</a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <input type="text" class="form-control search" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th>Numercial Order</th>
                                <th>Subject name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach($subjects as $subject)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $subject->name }}</th>
                                <th>{{ date('d/m/Y', strtotime($subject->created_at)) }}</th>
                                <th>{{ date('d/m/Y', strtotime($subject->updated_at)) }}</th>
                                <th></th>
                                <th><a class="btn btn-sm btn-success" href="{{ route('admin.subjects.edit',['id' => $subject->id]) }}">Edit</a></th>
                                <th><a class="btn btn-sm btn-danger" href="{{ route('admin.subjects.destroy',['id' => $subject->id]) }}">Delete</a></th>
                              
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                    <div class="noresult" style="display: none;">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="pagination-wrap hstack gap-2">
                        <a class="page-item pagination-prev disabled" href="#">
                            Previous
                        </a>
                        <ul class="pagination listjs-pagination mb-0"><li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li></ul>
                        <a class="page-item pagination-next disabled" href="#">
                            Next
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
    <!-- end col -->
    @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
        </div><!-- end card header -->
        
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <a href=" {{ route('admin.subjects.create') }} " class="btn btn-sm btn-success fw-600">Create New Subject</a>
                <div class="mt-3 mb-1">
                    <thead>
                        <tr>
                            <th>Numercial Order</th>
                            <th>Subject name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th><a href=" {{ route('admin.exams.index', ['subject_id' => $subject->id]) }} ">{{ $subject->name }}</a></th>
                        <th>{{ date('d/m/Y', strtotime($subject->created_at)) }}</th>
                        <th>{{ date('d/m/Y', strtotime($subject->updated_at)) }}</th>
                        <th></th>
                        <th><a class="btn btn-sm btn-success" href="{{ route('admin.subjects.edit',['id' => $subject->id]) }}">Edit</a></th>
                        <th><a class="btn btn-sm btn-danger" href="{{ route('admin.subjects.destroy',['id' => $subject->id]) }}">Delete</a></th>
                        
                    </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Numercial Order</th>
                            <th>Subject name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </div>
            </div>
            </div><!-- end card -->
        <!-- end col -->
        </table>
@endsection
@endsection