@extends('master')
@section('name', 'Thông tin cá nhân')
@section('endname', 'Chỉnh sửa')
@section('midname', 'Chỉnh sửa thông tin')
@section('content')
<div class="col-md-10 col-lg-8 pb-2 text-left bg-white">
    <div class="col-12  p-2 h4 justify-content-center text-center">
        Thông tin cá nhân
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
            <label for="name" class="col-3 col-form-label col-form-label p-1">Tên đăng nhập</label>
            <div class="col-9">
                <span id="username" class="text-secondary">{{ $user->username }}</span>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="name" class="col-3 col-form-label col-form-label p-1">Họ và tên</label>
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
            <label for="user_type" class="col-3 col-form-label col-form-label p-1">Cấp độ</label>
            <div class="col-9">
                <?php
                    if($user->level == 1) { 
                        echo "Quản trị viên";
                    }
                    else {
                        echo "Thành viên";
                    }
                ?>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="sex" class="col-3 col-form-label col-form-label p-1">Giới tính</label>
            <div class="col-9">
                <select id="sex" name="sex" class="form-control bg-white p-2" required="">
                    <option value="1" selected=""> Male </option>
                    <option value="0"> Female </option>
                </select>
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="dob" class="col-3 col-form-label col-form-label p-1">Ngày sinh</label>
            <div class="col-9">
                <input type="date" id="dob" class="form-control form-control-sm bg-white p-1 
                    " name="birth" value="2022-07-06" required="">
            </div>
        </div>

        <div class="col-12 p-1 justify-content-start d-flex">
            <label for="phone" class="col-3 col-form-label col-form-label p-1">Số điện thoại</label>
            <div class="col-9">
                <input type="text" id="phone" class="form-control form-control-sm bg-white p-1" name="phone" value="{{  $user->phone }}">
            </div>
        </div>

        <div class="col-12 p-1  justify-content-start d-flex">
            <label for="avatar" class="col-3 col-form-label col-form-label p-1 ">Ảnh đại diện</label>
            <div class="col-3">
                <?php
                    $avatar = empty($user->avatar) ? 'defaultimage.png' : $user->avatar;
                ?>
                <img id="avatar" src="{{ asset('images/'.$avatar)}}" class="rounded-circle" style="height: 60px; width: 60px">
            </div>
            <div class="col-6">
                <label for="avatar">Đổi ảnh đại diện</label>
                <input type="file" name="avatar">
            </div>
        </div>

        <div class="col-12 p-4 d-flex justify-content-center text-center">
            <label for="phone" class="col-3 col-form-label col-form-label p-1"></label>
            <button type="submit" class="col-9 p-1 btn btn-sm btn-success">Chỉnh sửa</button>
        </div>

    </form>
</div>
@endsection