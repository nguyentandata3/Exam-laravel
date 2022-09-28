@extends('master')
@section('name', 'Home')
@section('content')
<div class="col-12 p-1 pull-center">
    <div class="col-12 p-1 d-flex">
        <div class="col-7 h3 text-primary p-1 pl-2 mt-4 mb-2"> Giới Thiệu </div>
        <div class="col-5 p-1 mt-4 pull-right text-center">
            <div class="fb-like fb_iframe_widget" data-href="https://thithu.edu.vn/home" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=608991086262571&amp;container_width=528&amp;href=https%3A%2F%2Fthithu.edu.vn%2Fhome&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small&amp;width="><span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe name="fa99e7cb13af24" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.3/plugins/like.php?action=like&amp;app_id=608991086262571&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2324a03570d84c%26domain%3Dthithu.edu.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fthithu.edu.vn%252Ff3e66caaa2ec958%26relation%3Dparent.parent&amp;container_width=528&amp;href=https%3A%2F%2Fthithu.edu.vn%2Fhome&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small&amp;width=" style="border: none; visibility: visible; width: 150px; height: 28px;" class=""></iframe></span></div>
        </div>
    </div>
    <div class="col-12 py-1 pl-3 pr-3 pl-md-4 pr-md-4 pl-lg-5 pr-lg-5" style="font-family: Nunito; text-align: justify">
        <p class="lh-3 fz-4"> <span class="text-success">Thi Thử Online </span> được thành lập để tạo ra một Thư Viện các Đề Thi Trung Học Phổ Thông (THPT) Quốc Gia. Các đề thi được tổng hợp và chọn lọc từ các đề thi chính thức, tham khảo của Bộ Giáo Dục, các Sở Giáo Dục và các Trường Chuyên trong cả nước. Hy vọng Thi Thử Online sẽ là nguồn tài liệu tham khảo hữu ích cho các bạn học sinh (và giáo viên) để chuẩn bị tốt nhất cho kỳ thi đại học hay thi THPT Quốc gia. Hãy đăng ký thành viên và bắt đầu Thi Thử Online hoàn toàn miễn phí. Bài làm sẽ được chấm điểm ngay sau khi Nộp bài và được lưu lại trong phần Bảng Điểm của từng thành viên để cho các bạn tiện theo dõi.</p>
        
        <p class="lh-3 fz-4"> Nếu các bạn thấy trang <span class="text-success">Thi Thử Online </span> hữu ích, các bạn hãy ấn <span class="text-info">"Thích"</span> và <span class="text-info">"Chia sẻ"</span> để cho nhiều người cùng sử dụng (khi đó các bạn sẽ được <span class="text-info">thi thử miễn phí</span> không bị giới hạn bởi số đề thi). Và khi có nhiều người cùng sử dụng trang Thi Thử Online, chúng tôi sẽ cập nhật càng nhiều đề thi, đáp án và nhiều tính năng khác nữa.</p>

        <!--p class="lh-3 fz-4"> Trang web này là hoàn toàn miễn phí, lập ra với mục đích phi lợi nhuận và tạo điều kiện giúp cho tất cả các bạn học sinh có điều kiện học tập như nhau bất kể vùng miền. Nếu bạn thấy trang web này hữu ích, hãy <a href="https://thithu.edu.vn/donation">Donate cho chúng tôi tại đây</a>, để chúng tôi thêm nhiều đề thi, tính năng mới. Cảm ơn. </p-->

        <!--p class="lh-3 fz-4 text-dark border border-primary rounded m-1 p-2"><i> Hiện nay chúng tôi đang tìm kiếm các bạn Cộng Tác Viên để giúp hoàn thiện đáp án cụ thể cho các câu hỏi đã có, nếu bạn nào có kinh nghiệm về Latex/Mathjax (và không phải thi tốt nghiệp năm nay) và muốn tham gia làm cộng tác viên xin hãy <a href="https://thithu.edu.vn/emails/tuyenctv"> <u>Liên Hệ</u></a> với chúng tôi. </i></p-->

    </div>
    <div class="col-12 h3 text-primary pt-1 mt-1 mb-2"> Tuyển Chọn Các Đề Thi </div>
</div>
@foreach($subjects as $subject)
<div class="col-12 col-lg-8 p-0 p-xs-1 p-lg-2 pull-center">
    <div class="col-12 p-1"></div>
        <div class="box box-info">
            <div class="box-header with-border">
            <h4 class="box-title pt-3"> <a href="{{ route('subjects', ['subject_id' => $subject->id]) }}" class="text-success"><b> {{ $subject->name }} </b></a></h4>
        </div>
        <div class="box-body p-1">
            <!-- De thi ngan - de_this_sortBy_best_score -->
            @foreach($exams as $key => $exam)
                @if($key == $subject->id)
                @foreach($exam as $item)
                <div class="col-12 text-left pl-2 pl-md-3 pt-2 pb-0 d-flex">
                    <div class="col-10 text-dark pl-1 pr-2 pr-md-3 py-0 fz-4"> 
                        <a class="text-dark" href="{{ route('exams', ['exam_id' => $item->id]) }}">{{ $item->name }}</a> 
                    </div>
                    <div class="col-2 p-0 text-right">
                        <span class="text-center pb-0">
                            <a class="btn btn-sm btn-primary p-1 buttontt" href="{{ route('exams', ['exam_id' => $item->id]) }}"> View Exam </a> &nbsp;
                        </span>
                    </div>
                </div>
                @endforeach
                @endif
            @endforeach
        </div>
        <p class="text-right mt-2 mr-2"> <a class="text-primary" href="{{ route('subjects', ['subject_id' => $subject->id]) }}"><b><i> More &nbsp;&nbsp; </i></b> </a> </p>
    </div>
</div>
@endforeach
@endsection