<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/Exam Online/html/default/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 21:29:20 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Đăng ký | Thi online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('home/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('home/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('home/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('home/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Style Css-->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
<form class="needs-validation" action="{{ route('postRegister') }}" method="POST">
    @csrf
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="{{ asset('home/images/admin.jpg') }}" version="1.1" xmlns:xlink="{{ asset('home/images/admin.jpg') }}" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>
        <!-- auth page content -->
        <div class="page-content">
            <div class="container">                
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible p_relative" id="tb">
                            <button type="button" class="close button_x" id="close">×</button>
                            <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                        </div>
                        @endif
                        <?php
                            use Illuminate\Support\Facades\Session;
                        ?>
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible" id="tb">
                                <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                                {{ (Session::get('success')) }}
                            </div>
                        @endif
                        @if (Session::get('error'))
                            <div class="alert alert-danger alert-dismissible" id="tb">
                                <button type="button" class="close" id="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>
                                {{ (Session::get('error')) }}
                            </div>
                        @endif
                    
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Tạo tài khoản mới</h5>
                                    <p class="text-muted">Tạo tài khoản miễn phí để thi online ngay bây giờ</p>
                                </div>
                                <div class="p-2 mt-4">
                                    
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập email" >
                                        <div class="invalid-feedback">
                                            Vui lòng nhập email
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Tên đăng nhập <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Vui lòng nhập tên đăng nhập" >
                                        <div class="invalid-feedback">
                                            Vui lòng nhập tên đăng nhập
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Vui lòng nhập đầy đủ họ tên" >
                                        <div class="invalid-feedback">
                                            Vui lòng nhập đầy đủ họ tên
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Mật khẩu</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input name="password" type="password" class="form-control pe-5 password-input" placeholder="Vui lòng nhập mật khẩu" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                            <i class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="i" id="password-addon"><i class="ri-eye-fill align-middle"></i></i>
                                            <div class="invalid-feedback">
                                                Vui lòng nhập mật khẩu
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Mật khẩu xác nhận</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input name="password_confirmation" type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Vui lòng nhập lại mật khẩu" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                            <i class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="i" id="password-addon"><i class="ri-eye-fill align-middle"></i></i>
                                            <div class="invalid-feedback">
                                                Vui lòng nhập lại mật khẩu
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="row form-label">
                                            <div class="col-12 mb-3">
                                                <label>Giới tính</label>
                                            </div>
                                            <div class="col ">
                                                <input type="radio" name="sex" value="1">
                                                <label class="fw-400" for="html">Nam</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="sex" value="2">
                                                <label class="fw-400" for="html">Nữ</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone" placeholder="Vui lòng nhập số điện thoại" >
                                        <div class="invalid-feedback">
                                            Vui lòng nhập số điện thoại
                                        </div>
                                    </div>


                                    <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                        <h5 class="fs-13">Mật khẩu cần phải có:</h5>
                                        <p id="pass-length" class="invalid fs-12 mb-2">Tối thiểu <b>8 ký tự</b></p>
                                        <p id="pass-lower" class="invalid fs-12 mb-2"> <b>Chữ thường</b> (a-z)</p>
                                        <p id="pass-upper" class="invalid fs-12 mb-2"> <b>Chữ in hoa</b> (A-Z)</p>
                                        <p id="pass-number" class="invalid fs-12 mb-0"> <b>Ít nhất 1 số</b> (0-9)</p>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Register</button>
                                    </div>
</form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="{{ route('getLogin')}}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
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
                                <script>document.write(new Date().getFullYear())</script> Exam Online. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('home/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('home/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('home/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('home/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('home/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ asset('home/libs/particles.js') }}/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('home/js/pages/particles.app.js') }}"></script>
    <!-- validation init -->
    <script src="{{ asset('home/js/pages/form-validation.init.js') }}"></script>
    <!-- password create init -->
    <script src="{{ asset('home/js/pages/passowrd-create.init.js') }}"></script>

    <!-- Jquery js -->
    <script src="{{ asset('home/js/jquery.js') }}"></script>

    <!-- Style js -->
    <script src="{{ asset('home/js/style.js') }}"></script>
    
</body>
<script>
$("#close").click(function() {
    $("#tb").fadeToggle(1000);
});
</script>
<!-- Mirrored from themesbrand.com/Exam Online/html/default/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 21:29:20 GMT -->
</html>