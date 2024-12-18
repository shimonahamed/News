<?php


namespace App\Helpers;


trait Support
{
    public function retData($data, $message = null, $code = 2000){
        $retData = [];

        $retData['status'] = $code;

        if ($data && !empty($data)){
            $retData['result'] = $data;
        }
        if ($message){
        $retData['message'] = $message;
    }


        return response()->json($retData);
        }
}