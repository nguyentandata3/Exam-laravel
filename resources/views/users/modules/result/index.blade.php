@extends('master')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div id="customerList">
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
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
                                <th scope="col" style="width: 12%;">STT</th>
                                <th scope="col" style="width: 12%;">Question</th>
                                <th scope="col" style="width: 12%;">Image</th>
                                <th scope="col" style="width: 12%;">Correct answer</th>
                                <th scope="col" style="width: 12%;">Level</th>
                                <th scope="col" style="width: 12%;">Genre</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($answer_questions as $item)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                    </div>
                                </th>
                            @php 
                                if($item->genre_id == 1) {
                                    $data_questions = json_decode($item->question, true);
                                }
                            @endphp
                                @if($item->genre_id == 1)
                                <th scope="col" style="width: 12%;">{{ $data_questions['question'] }}</th>
                                @elseif($item->genre_id == 2)
                                <th scope="col" style="width: 12%;">{{ $item->question }}</th>
                                @endif 
                            @php
                                $image = empty($item->image) ? 'imagedefault.jpg' : $item->image;
                            @endphp
                                <th><img src="{{ asset('images/'.$image) }}" width="50px"></th>
                            @if($item->genre_id == 1)
                                @if ($item->answer == 'a')
                                <th scope="col" style="width: 12%;">{{ $data_questions['a'] }}</th>
                                @elseif ($item->answer == 'b')
                                <th scope="col" style="width: 12%;">{{ $data_questions['b'] }}</th>
                                @elseif ($item->answer == 'c')
                                <th scope="col" style="width: 12%;">{{ $data_questions['c'] }}</th>
                                @elseif ($item->answer == 'd')
                                <th scope="col" style="width: 12%;">{{ $data_questions['d'] }}</th>
                                @else 
                                <th scope="col" style="width: 12%;">{{ $item->answer }}</th>
                                @endif
                            @elseif($item->genre_id == 2)
                                <th scope="col" style="width: 12%;">{{ $item->answer }}</th>
                            @endif
                                @if ($item->level == 1)
                                    <th scope="col" style="width: 12%;">Easy</th>
                                @elseif($item->level == 2)
                                    <th scope="col" style="width: 12%;">Normal</th>
                                @else
                                    <th scope="col" style="width: 12%;">Hard</th>
                                @endif
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
                    <div class="pagination-wrap hstack gap-2" style="display: none;">
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
</div>
@endsection