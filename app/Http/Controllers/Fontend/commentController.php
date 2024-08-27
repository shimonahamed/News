<?php

namespace App\Http\Controllers\Fontend;

use App\Helpers\Support;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use function Nette\Utils\first;

class commentController extends Controller
{
//    use Support;
    public function store(Request $request){

        $comment = new Comment();
        $comment->visitor_id = auth()->guard('visitor')->user()->id;
        $comment->title = $request->input('title');
        $comment->comment = $request->input('message');

        $comment->save();

        return response()->json(['message' => 'Successfully created comment!', 'status' => 2000] , 200);
    }
    public function index(){
        $data['url'] = \request()->input('url');
        return view('auth.visitor_login', $data);
    }
    public function create(){
        $data['url'] = \request()->input('url');
        return view('auth.visitor_registration', $data);

    }
    public function commentList()
    {
        $data['comments'] = Comment::all();
        return view('backend.commentList',$data);
    }
    public function getcomment(){

        $data=Comment::with('visitor:id,name')->get();
        return response()->json(['result'=>$data,'status'=>2000]);
    }
    public function commentDelete(){
        $id=\request()->input('id');
        $comment=Comment::where('id',$id)->first();
        if ($comment){
            $comment->delete();
        }
    }



}

