<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Nette\Utils\data;

class categoryControll extends Controller
{
    public function index(){
        return view('fontend.category');
    }
    public function addCategory()
    {
        return view('backend.category.addCategory');
    }
    public function categoryList()
    {
        $data['categories'] = categoryModel::all();
        return view('backend.category.categoryList', $data);
    }


    public function saveCat(Request $request){
        $this->validate($request,[
            'category_name'=>'required',

        ]);

        $category = new categoryModel();
        $category->categrory_name = $request->category_name ;

        $category->status = 1 ;

        $category->save();
        Session::flash('success','SuccessFull Save');

        return view('backend.category.addCategory');
    }


    public function edit($id){
        $data = categoryModel::where('id',$id)->first();
        return view('backend.category.eidtCategory', $data);
    }

    public function update(Request $request ){
        $request->validate([
            'id' => 'required',
            'category_name' => 'required',
        ]);

        $id = $request->input('id');
        $category = categoryModel::find($id);

        if ($category){
            $category->categrory_name = $request->input('category_name');
//            $category->img = $request->input('img');
//            $category->details = $request->input('details');

            $category->save(); // Save the updated category

            // Flash success message to session
            Session::flash('success', 'Successfully updated category');


        }

        // If category is not found, redirect back
        return redirect()->back()->with('error', 'Category not found');

    }



    public function delete($id)
    {
        $category = categoryModel::where('id', $id)->first();

        if ($category) {
            $category->delete();



            return redirect()->back();
        }



        return redirect()->back();
    }
}


