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
        $data['slider']=News::with('category:categrory_name,id')->take(3)->skip(0)->get();
        $data['news']=News::take(4)->skip(0)->get();
        $data['FeaturedNews']=News::take(5)->skip(0)->get();
        return view('fontend.homepage',$data);
    }
    public function webcategoryList(){

        return view('fontend.category');

    }
    public function webcategory($cateId){
        $category = categoryModel::find($cateId);
        $data['category'] = $category;

        $data['news'] = News::with('author:name,id')->where('category_id', $cateId)->paginate(10);
        $data['categories'] = categoryModel::all();

        return view('fontend.category', $data);

//        $data['news']=News::with('author:name,id')->where('category_id',$cateId);
//        return view('fontend.category',$data);

    }
    public function newsDetails($newsId)
    {
        $data['news'] = News::with('author:name,id', 'category:categrory_name,id')->where('id', $newsId)->first();
        $data['comment']=DB::table('comment')->get();
        return view('fontend.news_details', $data);
    }
    public static function commentcount($com_id){
        $comcount=comment::where('id',$com_id)->count();
        return $comcount;
    }


}

