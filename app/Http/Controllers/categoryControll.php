<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class categoryControll extends Controller
{
    public function addCategory()
    {
        return view('backend.category.addCategory');
    }
    public function categoryList(){
        $data['categories'] = DB::table('categories')->get();
        return view('backend.category.categoryList',$data);

    }

    public function saveCat(Request $request){
        $category = new categoryModel();
        $category->categrory_name = $request->category_name ;
        $category->img = $request->img ;

        $category->details = $request->details ;
        $category->status = 1 ;
        $category->save();

        return view('backend.category.addCategory');
    }
    public function eidt($id){
        // Retrieve category by id
        $data = categoryModel::where('id',$id)->first();

        // Pass category data to the view
        return view('backend.category.eidtCategory', $data);
    }

//    public function update(Request $request){
//        $category = categoryModel::where('id', '$id')->first();
//        if ($category){
//            $id = request()->input('id');
//
//            $category = new categoryModel();
//            $category -> categrory_name = $request->input('category_name');
//            $category->img = $request->input('img') ;
//            $category->details = $request->input('details')  ;
//
//            $category->save();
//
//            Session::flash('success','SuccessFull Update');
//
//            return redirect()->back();
//
//        }
//
//        return redirect()->back();
//
//
//    }
    public function update(Request $request){
        // Validate incoming request data
        $request->validate([
            'id' => 'required', // Ensure id exists in category_models table
            'category_name' => 'required',
            'img' => 'required',
            'details' => 'required',
        ]);

        // Retrieve category by id
        $id = $request->input('id');
        $category = categoryModel::find($id);

        if ($category){
            // Update category attributes
            $category->categrory_name = $request->input('category_name');
            $category->img = $request->input('img');
            $category->details = $request->input('details');

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


