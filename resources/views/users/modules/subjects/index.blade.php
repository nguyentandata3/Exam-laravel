@extends('master')
@section('name', 'Exam')
@section('endname', 'List')
@section('midname', 'Exam list')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div id="customerList">
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="w-30">Exam name</th>
                                <th scope="col" class="w-12">Total time</th>
                                <th></th>
                                <th></th>
                                <th scope="col"  class="w-80">Test</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach($exams as $exam)
                            <tr>
                                <td scope="col" class="w-30"><a href="{{ route('users.exams',['exam_id' => $exam->id]) }}">{{ $exam->name }}</a></td>
                                @if($exam->total_time >= 3600)
                                    <td scope="col" style="width: 12%;">{{ (int)($exam->total_time / 3600) }} : {{ (int)(($exam->total_time % 3600) / 60) }} : {{ ($exam->total_time % 60)}}</td>
                                
                                @elseif($exam->total_time < 3600 && $exam->total_time > 60) 
                                    <td scope="col" style="width: 12%;">{{ (int)($exam->total_time / 60) }} : {{ ($exam->total_time % 60)}}</td>
                                
                                @else 
                                    <td scope="col" style="width: 12%;">{{ ($exam->total_time % 60)}}</td>
                                
                                @endif
                                <td></td>
                                <td></td>
                                <td><a class="btn btn-success add-btn w-80"  href="{{ route('users.exams',['exam_id' => $exam->id]) }}">Test</a></td>
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
            </div>
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection