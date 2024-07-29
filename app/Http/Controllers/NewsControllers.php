<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\categoryModel;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\Mime\Header\all;

class NewsControllers extends Controller
{

    public function index()
    {

        $data['news'] = News::join('users','news.create_by','=','users.id')->select('news.*','users.name as user_name')->get();
       return view('backend.news.newsList',$data);
    }


    public function create()
    {
        $data['categories']=categoryModel::where('status',1)->get();
        return view('backend.news.addNews',$data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'img' => 'required',
            'details' => 'required',
        ]);

        $input=$request->except('_token');
        $news=new News();
        $news->fill($input);
        $news->date=date('Y-m-d');
        $news->create_by=auth()->user()->id;
        $news->save();

        return redirect()->back();
    }


    public function show($id)
    {
        $newsItem = News::join('users', 'news.create_by', '=', 'users.id')
            ->where('news.id', $id)
            ->select('news.*', 'users.name as user_name')
            ->first();

        if (!$newsItem) {
            abort(404, 'News item not found');
        }

        // Pass the news item to the view
        return view('backend.news.show', ['news' => $newsItem]);
    }


    public function edit($id)
    {


        $data=News::where('id',$id)->first();
        $item =categoryModel::where('status',1)->get();


        return view('backend.news.eidtNews',[

            'data'=>$data,
            'item'=>$item
        ]);

    }



    public function update(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'img'=>'required',
            'details'=>'required',
        ]);
        $id=$request->input('id');

        $news=News::find($id);
        if ($news){

            $news->title=$request->input('title');
            $news->img=$request->input('img');
            $news->details=$request->input('details');
            $news->save();

            Session::flash('seccuss','Successfull Update');
            return redirect()->back();
        }
        return redirect()->route('news.edit')->with('error', 'News not found.');

    }


    public function destroy($id)
    {
        $date = News::where('id', $id)->first();

        if ($date) {
            $date->delete();
            return redirect()->back()->with('success', 'News deleted successfully.');
        }

        return redirect()->back()->with('error', 'News not found.');
    }


}
