<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //custom response json genertaor
    function response_array_generator($output,$reason,$data,$token)
    {

    $array_data=array();

    $array_data["response"] = $output;

    if($output=="success")
    {
    if($token!="")
    {
    $array_data["token"] = $token;
    }
    if($data!="")
    {
    $array_data["data"] = $data;
    }
    }
    else
    {
    $array_data["reason"] = $reason;
    }

    $jsonobj=array($array_data);
    return json_encode($jsonobj);
    }


}
