<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use function Spatie\FlareClient\message;

class categoryApiController extends Controller
{
    public function index(){
        $data=categoryModel::get();
        return response()->json(['result'=>$data,'status'=>2000]);
    }
    public function eidt($id){

        $data = categoryModel::where('id',$id)->first();

        return response()->json(['result'=>$data,'status'=>2000]);

    }
    public function update(Request $request,$id){
        try{
            $validate=Validator::make($request->all(),[
                'categrory_name'=>'required',
                'details'=>'required',
                'id'=>'required',
                ]);
            if ($validate->fails()){
                return response()->json(['result'=>$validate->errors(),'status'=>3000]);
            }
            $id = $request->input('id');
            $category = categoryModel::find($id);

            if ($category){
                $category->categrory_name = $request->input('category_name');
                $category->details = $request->input('details');
                $category->update();
                return response()->json(['result'=>null,'message'=>'Successfully Update','status'=>2000]);

            }

        }catch (Exception $exception){

            return response()->json(['result'=>null,'message'=>$exception->getMessage(),'status'=>2000]);

        }
    }
}
