@extends('master')
@section('name', 'Quên mật khẩu')
@section('endname', 'Email')
@section('content')
<div class=" row auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    
    <?php
        use Illuminate\Support\Facades\Session;
    ?>
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="tb">
            <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Thông báo</h5>
            {{ (Session::get('success')) }}
        </div>
    @endif
    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible" id="tb">
            <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Thông báo</h5>
            {{ (Session::get('error')) }}
        </div>
    @endif

    @if (Session::get('logout'))
        <div class="alert alert-danger alert-dismissible" id="tb">
            <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Thông báo</h5>
            {{ (Session::get('logout')) }}
        </div>
    @endif
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5><p class="text-muted">Vui lòng nhập email đã đăng ký</p></h5>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('postSendemail') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="name" name="email" class="form-control" id="username" placeholder="Vui lòng nhập email">
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Gửi mật khẩu</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center mt_100">
                        <p class="mb-0">Bạn chưa có tài khoản ? <a href="{{ route('getRegister')}}" class="fw-semibold text-primary text-decoration-underline"> Đăng ký </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> Thi online. Tác giả <i class="mdi mdi-heart text-danger"></i> Nguyễn Tấn Đạt
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<script>
$("#close").click(function() {
    $("#tb").fadeToggle(1000);
});
</script>
@endsection