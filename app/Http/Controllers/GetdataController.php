<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetdataController extends Controller
{

    public function laydata() {
        // $data = [];

        $html = file_get_html('https://tracnghiem.net/de-thi/de-thi-hk2-mon-tieng-anh-12-nam-2021-2022-5534.html');
        $answer = ($html->find('.exam-content ul li p'));
        $a = [];
        $j = 0;
        foreach ($answer as $key => $value) {
            $question[$j][$key] = " " . strip_tags($value) . "<br/>";
            if(strpos($question[$j][$key], "A.") != 0) {
                $a[$j]['a'] = strip_tags($question[$j][$key]);
                // $key++;
            }
            // if(strpos($question[$key], "B.") != 0) {
            //     $a[$j]['a'] = strip_tags($question[$key]);
            // }
            // if(strpos($question[$key], "A.") != 0) {
            //     $a[$j]['a'] = strip_tags($question[$key]);
            // }
            // if(strpos($question[$key], "A.") != 0) {
            //     $a[$j]['a'] = strip_tags($question[$key]);
            // }
            // if(strpos($question[$key], "A.") != 0) {
            //     $a[$j]['a'] = strip_tags($question[$key]);
            // }
            $j++;
        }
        dd($question);
        // function rand_string( $length ) {
        //     $chars = "abcd";
        //     $size = strlen( $chars );
        //     for( $i = 0; $i < $length; $i++ ) {
        //         $str = $chars[ rand( 0, $size - 1 ) ];
        //     }
        // return $str;
        // }
        // foreach($a as $key => $value) {
        //     $str = rand_string(1);
        //     $data[] = [];
        //     $data = [
        //         'question' => '1',
        //         'exam_id' => 3,
        //         'user_id' => 1,
        //         'created_at' => new \DateTime(),
        //         'answer' => $str,
        //         'level' => rand(1,3),
        //         'genre_id' => 1,
        //     ];
        //     dd($data);
        // DB::table('answer_questions')->insert($data);
        // }
    }
    
    public function postlaydata(Request $request) {
        dd($request);
    }

    public function index($category_id, $link) {
        $data = [];

        // $html = file_get_html($link);
        $html = file_get_html('https://tracnghiem.net/thptqg/de-thi-thpt-qg-nam-2022-mon-sinh-5693.html');
        $element_title = $html->find('.listproduct .item a h3');
        foreach($element_title as $key => $e) {
            $data[$key]['name'] = trim($e->plaintext);
            $data[$key]['intro'] = "Tóm tắt sản phẩm " . $data[$key]['name'];
            $data[$key]['content'] = "Nội dung sản phẩm " . $data[$key]['name'];
            $data[$key]['status'] = rand(1,2);
            $data[$key]['user_id'] = 1;
            $data[$key]['created_at'] = new \DateTime();
            $data[$key]['category_id'] = $category_id;
        }

        $element_img = $html->find('.listproduct .item a .item-img img');
        foreach($element_img as $key => $e) {
            if(count($element_title) > $key) {
                if($e->getAttribute("data-src") == false) {
                    $img_product = $e->src;
                }
                else {
                    $img_product = $e->getAttribute("data-src");
                }

                $file_name = basename($img_product);
                $file_path_in_src = public_path("images/$file_name");

                if (!empty($this->curl_image($img_product))) {

                    if(!file_put_contents($file_path_in_src, $this->curl_image($img_product))) {
                        echo "File downloading failed: " .$data[$key]['name'];
                    }
                }

                $data[$key]["image"] = $file_name;
            }
        }

        $element_price = $html->find('.listproduct .item a strong');
        foreach($element_price as $key => $e) {
            if(count($element_title) > $key) {
            $data[$key]['price'] = rand(10, 50);
            }
        }

    }

    public function getdata() {
        $result = DB::table('results')->get();

        foreach ($result as $item) {
            $link = $item->link;
            $category_id = $item->id;

            $this->index($category_id, $link);
        }
        echo "Thành công";
    }
    
    public function curl_image($link) {
        $curl_handle = curl_init();
        // curl_setopt($curl_handle, CURLOPT_URL, $link);
        curl_setopt($curl_handle, CURLOPT_URL,$link);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $query;
    }
}
