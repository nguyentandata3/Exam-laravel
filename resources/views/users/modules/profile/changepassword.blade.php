@extends('master')
@section('name', 'Profile')
@section('endname', 'Password')
@section('midname', 'Change Password')
@section('content')
<div class="col-md-10 col-lg-8 pb-2 text-left bg-white">
    <div class="col-12  p-2 h4 justify-content-center text-center">
        Infomation
    </div>
<div class="container">
    <?php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Session;
    ?>
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="tb">
            <button type="button" class="close" data-dismiss="alert" id="close" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ (Session::get('success')) }}
        </div>
    @endif

    @if (Session::get('alert'))
        <div class="alert alert-danger alert-dismissible" id="tb">
            <button type="button" class="close" data-dismiss="alert" id="close" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ (Session::get('alert')) }}
        </div>
    @endif
    <form action="{{ route('users.postChangePassword', ['uuid' => Auth::user()->uuid]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1">Current Password</label>
            <div class="col-9">
                <input type="password"  class="form-control form-control-sm bg-white p-1" name="old_password">
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1">New Password</label>
            <div class="col-9">
                <input type="password" class="form-control form-control-sm bg-white p-1" name="new_password">
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1">Confirm New Password</label>
            <div class="col-9">
                <input name="new_password_confirmation" type="password" class="form-control form-control-sm bg-white p-1">
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1"></label>
            <div class="col-9">
                <button type="submit" class="btn btn-sm btn-success">Change Password</button>
            </div>
            <div class="col-9">
                <a href="{{ route('users.profile', ['user_uuid' => Auth::user()->uuid]) }}" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection