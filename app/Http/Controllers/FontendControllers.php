<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FontendControllers extends Controller
{
    public function index(){
        $data['slider']=News::with('cat:categrory_name,id')->take(3)->skip(0)->get();
        $data['news']=News::take(4)->skip(0)->get();
        return view('fontend.homepage',$data);
    }
    public function webcategory($cateId){

        $data['news']=News::with('author:name,id')->where('category_id',$cateId);
        return view('fontend.category',$data);

    }
    public function newsDetails($newsId)
    {
        $data['news'] = News::with('author:name,id', 'cat:categrory_name,id')->where('id', $newsId)->first();
        return view('fontend.news_details', $data);
    }


}
