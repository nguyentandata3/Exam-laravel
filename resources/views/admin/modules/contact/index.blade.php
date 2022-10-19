@extends('master')
@section('name', 'Phản hồi')
@section('endname', 'Danh sách')
@section('midname', 'Danh sách phản hồi')
@section('content')
<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
?>
<div class="col-12 p-1 pull-center">
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible" id="tb">
        <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
        {{ (Session::get('success')) }}
    </div>
    @endif
</div>
<div class="col-lg-12">
    <div class="card">
        <table id="example" class="table table-striped table-bordered" style="width:100%">           
            <div class="card-body">
                <div class="mt-3 mb-1">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="w-12">Email</th>
                            <th class="w-30">Nội dung</th>
                            <th>Ngày gửi phản hồi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($contact as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="w-12">{{ $item->email }}</td>
                            <td class="w-30">{{ $item->content }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th class="w-12">Email</th>
                            <th class="w-30">Nội dung</th>
                            <th>Ngày gửi phản hồi</th>
                        </tr>
                    </tfoot>
                </div>
            </div>
            </div><!-- end card -->
        <!-- end col -->
        </table>
@endsection