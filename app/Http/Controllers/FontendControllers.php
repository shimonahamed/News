<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FontendControllers extends Controller
{
    public function index(){
        $data['slider']=News::with('category:categrory_name,id')->take(3)->skip(0)->orderBy('id','DESC')->get();
        $data['news']=News::take(4)->skip(0)->orderBy('id','DESC')->get();
        $data['FeaturedNews']=News::take(5)->skip(0)->orderBy('id','DESC')->get();
        $data['latestNews']=News::take(4)->skip(6)->orderBy('id','DESC')->get();
        $data['latNews']=News::take(1)->skip(9)->orderBy('id','DESC')->get();
        $data['latNews2']=News::take(4)->skip(11)->orderBy('id','DESC')->get();
        return view('fontend.homepage',$data);
    }

    public function webcategory($cateId){
        $category = categoryModel::find($cateId);
        $data['category'] = $category;

        $data['news'] = News::with('author:name,id')->where('category_id', $cateId)->paginate(10);
        $data['categories'] = categoryModel::all();


        return view('fontend.category', $data);



    }
    public function newsDetails($newsId)
    {
        $data['news'] = News::with('author:name,id', 'category:categrory_name,id')->where('id', $newsId)->first();
        $data['comment']=DB::table('comment')->get();
        $data['view_count']=News::find($newsId)->increment('view_count');
        return view('fontend.news_details', $data);
    }



}

