<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 21:29:23 GMT -->
<head>

    <meta charset="utf-8" />
    <title>@yield('name', 'Home') | @yield('endname')</title>
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
    <!-- Style Css-->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="row d-flex mt-30">
    <div class="col-lg-8">
        @csrf
        <input type="hidden" name="time">

        @foreach ($answer_questions as $item)
        @php 
            $data_history = json_decode($results->history);
            foreach($data_history as $keyhistory => $value) {
                $history[$keyhistory] = $value;
            }
            if($item->genre_id == 1) {
                $data_questions = json_decode($item->question, true);
            }
        @endphp
        <div class="card" >
            <div class="card-body">
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table ">
                        <thead class="table-light">
                            <tr id="question{{$loop->iteration}}">
                                <?php  if(!empty($item->genre_id == 1)) { ?>
                                <th scope="col" style="width: 12%;">
                                Question {{ $loop->iteration }}: (Level<?php 
                                    if($item->level == 1) {?>
                                    Easy
                                    <?php } elseif ($item->level == 2) { ?>
                                    Normal 
                                    <?php } else {?>
                                    Hard
                                    <?php } ?>)
                                </th>
                                <?php }
                                elseif ($item->genre_id == 2) { ?>
                                <th scope="col" style="width: 12%;">Question {{ $loop->iteration }}: {{ $item->question }}</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach($data_questions as $key => $value)
                                @if($key == 'question') 
                                <tr>
                                    <th>{{$value}}</th>
                                </tr>
                                @else
                                    @if(!empty($history[$item->id]))
                                        @if($history[$item->id] == $key)
                                            @if($history[$item->id] == $item->answer)
                                            <tr>
                                                <td class="text_green"><input type="radio" name="{{ $item->id }}" value="{{$key}}" checked disabled>
                                                {{$value}}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td class="text_red"><input type="radio" name="{{ $item->id }}" value="{{$key}}" checked disabled>
                                                {{$value}}</td>
                                            </tr>
                                            @endif
                                        @else
                                            @if($key == $item->answer)
                                            <tr>
                                                <th class="text_green"><input type="radio" name="{{ $item->id }}" value="{{$key}}" disabled>
                                                {{$value}}</th>
                                            </tr>
                                            @else
                                            <tr>
                                                <td><input type="radio" name="{{ $item->id }}" value="{{$key}}" disabled>
                                                {{$value}}</td>
                                            </tr>
                                            @endif
                                        @endif
                                    @endif
                                    
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach     
    </div>
    <div class="col-3 time_and_exams">
        <div class="mt-2 mobile:hidden">
            <div class="styles_card__FMlAF">
                <h1 class="text-2xl mt-2 mb-3 d-flex justify-content-center w-100">Câu hỏi</h1>
                <div class="grid grid-cols-5 gap-3 justify-center items-center">
                    @foreach ($answer_questions as $item)
                    <div class="d-flex justify-content-center align-items-center ">
                        <div class="styles_box__3y3tx"> <a class="text_black" href="#question{{ $loop->iteration }}">{{ $loop->iteration }}</a></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('home/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/libs/simplebar/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/libs/node-waves/waves.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/libs/feather-icons/feather.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/plugins.js') }}"></script>

    <!-- App js -->
    <script type="text/javascript" src="{{ asset('home/js/app.js') }}"></script>

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
    feather.replace()
</script>

<script>
$("#close").click(function() {
    $("#tb").fadeToggle(1000);
});
</script>


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 21:29:23 GMT -->
</html>