@extends('master')
@section('name', 'Profile')
@section('endname', 'Edit')
@section('midname', 'Edit Profile')
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
    <form action="{{ route('users.postProfile', ['user_uuid' => Auth::user()->uuid]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1">Username</label>
            <div class="col-9">
                <input type="text" id="username" class="form-control form-control-sm bg-white p-1" name="username" value={{ $user->username }}>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1">Full name</label>
            <div class="col-9">
                <input type="text" id="fullname" class="form-control form-control-sm bg-white p-1" name="fullname" value={{ $user->fullname }}>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="email" class="col-3 col-form-label col-form-label p-1">E-mail</label>
            <div class="col-9">
                <span id="email" class="text-secondary">{{ $user->email }}</span>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="user_type" class="col-3 col-form-label col-form-label p-1">Level</label>
            <div class="col-9">
                <?php
                    if($user->level == 1) { 
                        echo "Admin";
                    }
                    else {
                        echo "User";
                    }
                ?>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="sex" class="col-3 col-form-label col-form-label p-1">Sex</label>
            <div class="col-9">
                <select id="sex" name="sex" class="form-control bg-white p-2" required="">
                    <option value=""> --- Choose ---</option>
                    <option value="1" selected=""> Male </option>
                    <option value="0"> Female </option>
                </select>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="dob" class="col-3 col-form-label col-form-label p-1">Birth</label>
            <div class="col-9">
                <input type="date" id="dob" class="form-control form-control-sm bg-white p-1 
                    " name="birth" value="2022-07-06" required="">
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="phone" class="col-3 col-form-label col-form-label p-1">Phone</label>
            <div class="col-9">
                <input type="text" id="phone" class="form-control form-control-sm bg-white p-1" name="phone" value="{{  $user->phone }}">
            </div>
        </div>

        <div class="col-12 p-1  justify-content-start d-flex">
            <label for="avatar" class="col-3 col-form-label col-form-label p-1 ">Avatar</label>
            <div class="col-3">
                <?php
                    $avatar = empty($user->avatar) ? 'imagedefault.png' : $user->avatar;
                ?>
                <img id="avatar" src="{{ asset('images/'.$avatar)}}" class="rounded-circle" style="height: 60px; width: 60px">
            </div>
            <div class="col-6">
                <label for="avatar">Change avatar</label>
                <input type="file" name="avatar">
            </div>
        </div>

        <div class="col-12 p-4 d-flex justify-content-center text-center"></div>
            <label class="col-3 col-form-label col-form-label p-1 "></label>
            <button type="submit" class="btn btn-sm btn-primary">Edit</button>
        </div>

    </form>
</div>
@endsection