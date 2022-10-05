<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 21:29:23 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Thi Online</title>
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
    <!-- Datatable Css-->
    <link href="{{ asset('home/css/datatable1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home/css/datatable2.css') }}" rel="stylesheet" type="text/css" />
    <!-- AOS Css-->
    <link href="{{ asset('home/css/aos.css') }}" rel="stylesheet" type="text/css" />
    <!-- Style Css-->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

<input type="hidden" value="{{ $timelife-$timecurrent }}" id="time_test"/>

<form method="post" id="test" action="{{ route('users.test',['exam_id' => $exam->id]) }}" enctype="multipart/form-data">
<div class="row d-flex mt-10">
    <div class="col-lg-8">
        @csrf
        <input type="hidden" name="time">

        @foreach ($answer_questions as $item)
        @php 
            if($item->genre_id == 1) {
                $data_questions = json_decode($item->question, true);
            }
            
            $number = rand(1,4);
            if($number == 1) {
                $face = 'data-aos=fade-down data-aos-easing="linear" data-aos-duration="300"';
            }
            elseif ($number == 2) {
                $face = 'data-aos=fade-right data-aos-easing="linear" data-aos-duration="300"';
            }
            elseif ($number == 3) {
                $face = 'data-aos=zoom-out-left data-aos-easing="linear" data-aos-duration="300"';
            }
            else {
                $face = 'data-aos=zoom-out-right data-aos-easing="linear" data-aos-duration="300"';
            }
            if($item->level == 1) {
                $level = 'bg_green';
            }
            elseif ($item->level == 2) {
                $level = 'bg_yellow';
            }
            else {
                $level = 'bg_red';
            }
        @endphp
        <div class="card ml-30" >
            <div class="card-body">
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table ">
                        <thead class="table-light">
                            <tr {{$face}} id="question{{$loop->iteration}}">
                                <?php  if(!empty($item->genre_id == 1)) { ?>
                                <th class="{{$level}}" scope="col" style="width: 12%;">
                                Câu hỏi {{ $loop->iteration }}: (Level<?php 
                                    if($item->level == 1)
                                    echo " Easy)";
                                    elseif ($item->level == 2) {
                                    echo " Normal)";
                                    }
                                    else {
                                    echo " Hard)";
                                    } ?>
                                </th>
                                <?php }
                                elseif ($item->genre_id == 2) { ?>
                                <th scope="col" style="width: 12%;">Question {{ $loop->iteration }}: {{ $item->question }}</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <tr>
                                <th> {!! $data_questions['question'] !!} </th>
                            </tr>
                            <tr data-aos="fade-right" data-aos-delay="300" >
                                <?php
                                    if(!empty($item->image)) { ?>
                                    <td><img src="{{ asset('images/'.$image) }}" width="50px"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php  
                                if($item->genre_id == 1) { ?>
                            <tr>
                                <td >
                                    <div class="col-12 p-1 col-md-6 pull-left">
                                        <div class="col-12 p-1 d-flex" style="padding:5px">
                                            <input class="answer" type="radio" data-idquestion="{{$loop->iteration}}" name="{{ $item->id }}" value="a">  
                                            <div>{{ $data_questions['a'] }}</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="col-12 p-1 col-md-6 pull-left">
                                        <div class="col-12 p-1 d-flex" style="padding:5px">
                                            <input class="answer" type="radio" data-idquestion="{{$loop->iteration}}" name="{{ $item->id }}" value="b">  
                                            <div>{{ $data_questions['b'] }}</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="col-12 p-1 col-md-6 pull-left">
                                        <div class="col-12 p-1 d-flex" style="padding:5px">
                                            <input class="answer" type="radio" data-idquestion="{{$loop->iteration}}" name="{{ $item->id }}" value="c">  
                                            <div>{{ $data_questions['c'] }}</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="col-12 p-1 col-md-6 pull-left">
                                        <div class="col-12 p-1 d-flex" style="padding:5px">
                                            <input class="answer" type="radio" data-idquestion="{{$loop->iteration}}" name="{{ $item->id }}" value="d">  
                                            <div>{{ $data_questions['d'] }}</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach     
    </div>
    <div class="col-3 time_and_exams">
        <div class="styles_card__FMlAF time">
                <i data-feather="clock"></i>
                <span id="time" ></span>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex pr-5"><i class="styles_box__3y3tx"></i></div>
                    <div class="p-0 d-flex">Chưa Làm</div>
                    <div class="pl-20 d-flex pr-5"><i class="styles_box__3y3tx bg-primary"></i></div>
                    <div class="p-0 d-flex">Đã làm</div>
                </div>
            </div>
            <div class="card-body">
                <div class="mt-2 mobile:hidden pb_400 relative">
                    <div class="styles_card__FMlAF pt-0">
                        <h1 class="text-2xl mt-2 mb-3 d-flex justify-content-center w-100 text-muted">Câu hỏi</h1>
                        <div class="simplebar-offset absolute mt_50">
                            <div class="simplebar-content-wrapper">
                                <div class="grid grid-cols-5 gap-3 justify-center items-center">
                                    @foreach ($answer_questions as $item)
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="styles_box__3y3tx checked_question{{ $loop->iteration }} "> 
                                            <a class=" text_black" href="#question{{ $loop->iteration }}">{{ $loop->iteration }}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <input type="submit" class="finish btn btn-success add-btn w-100" value="Submit">
        </div>
        </div>
    </div>
</div>
<input type="submit" class="finish submit_col_12 btn btn-success add-btn col-sm-12" value="Submit">
</form> 
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('home/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/libs/simplebar/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/libs/node-waves/waves.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/libs/feather-icons/feather.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/plugins.js') }}"></script>

    <!-- App js -->
    <script type="text/javascript" src="{{ asset('home/js/app.js') }}"></script>

    <!-- AOS js -->
    <script type="text/javascript" src="{{ asset('home/js/aos.js') }}"></script>

    <!-- Jquery js -->
    <script type="text/javascript" src="{{ asset('home/js/jquery.js') }}"></script>

    <!-- Datatable js -->
    <script type="text/javascript" src="{{ asset('home/js/datatable1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/datatable2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/datatable3.js') }}"></script>

    <!-- Style js -->
    <script type="text/javascript" src="{{ asset('home/js/style.js') }}"></script>

</body>

<script>
    AOS.init(); 
    feather.replace()
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
    //By using jQuery
    $(".finish").click(function() {
        flag = false;
        return confirm('Nộp bài?');
    });

  
    // window.beforeunload = function(){
    //     return 'Are you leave page?';
    // }
    
    
    
</script>

<script>
$("#close").click(function() {
    $("#tb").fadeToggle(1000);
});
</script>


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 21:29:23 GMT -->
</html>