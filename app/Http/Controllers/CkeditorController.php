<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload (Request $request)
    {
        //Upload file
        $imageName = time().'-'.$request->upload->getClientOriginalName();
        $request->upload->move(public_path('ckeditor'), $imageName);

        //Show file in CKEditor
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('ckeditor/'.$imageName); 
        $msg = 'Image successfully uploaded';
        $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        //Render HTML output
        @header('Content-type: text/html; charset=utf-8');
        echo $re;
    }
    
}
