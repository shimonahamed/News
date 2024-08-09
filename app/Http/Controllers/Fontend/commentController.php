<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function index(){
        $data['url'] = \request()->input('url');
        return view('auth.visitor_login');
    }
    public function create(){
        $data['url'] = \request()->input('url');
        return view('auth.visitor_registration');

    }
    public function store(Request $request){
        $comment = new comment();
        $comment->visitor_id = auth()->guard('visitor')->user()->id;
        $comment->title = $request->input('title');
        $comment->comment = $request->input('message');
        $comment->save();

        return response()->json(['message' => 'Successfully created comment!', 'status' => 2000] , 200);
    }
}
