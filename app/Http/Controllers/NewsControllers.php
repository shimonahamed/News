<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\categoryModel;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $data = News::where('id', $id)->first();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'News deleted successfully.');
        }

        return redirect()->back()->with('error', 'News not found.');
    }

}
