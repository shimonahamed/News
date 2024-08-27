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
 

    public function update(Request $request)
    {
        try {
            $id = $request->input('id');

            $category = categoryModel::where('id', $id)->first();

            if ($category) {
                $category->categrory_name = $request->input('categrory_name');
                $category->details = $request->input('details');
                $category->update();

                return response()->json(['status' => 2000]);
            }

            return response()->json(['status' => 3000]);
        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }

    public function savecat(Request $request)
    {
        try {
            $category = new categoryModel();
            $category->categrory_name = $request->input('categrory_name');
            $category->details = $request->input('details');
            $category->save();

            return response()->json(['status' => 2000]);
        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }



public function deleteCat($id)
{
    try {
        $category = categoryModel::where('id', $id)->first();

        if ($category) {
            $category->delete();
            return response()->json(['status' => 2000]);
        }

        return response()->json(['status' => 3000]);
    } catch (\Exception $e) {
        return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
    }
}


}
