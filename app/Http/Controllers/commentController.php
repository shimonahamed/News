<?php

namespace App\Http\Controllers;


use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class commentController extends Controller
{
    public function commentStore(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $comment=new comment();
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->message=$request->message;
        $comment->date=date('Y-m-d');
        $comment->website=$request->website;
        $comment->save();

        Session::flash('success','SuccessFull Save');
        return redirect()->back();

    }
//    public function commentList(){
//        return view('fontend.news_details');
//    }

}
