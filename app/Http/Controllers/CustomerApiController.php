<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Customer;

class CustomerApiController extends Controller
{

  public function add(Request $request)
  {
    $response=array();
    $data=array();

    $output="failed";

    $fname=$request->fname;
    $lname=$request->lname;
    $email=$request->email;
    $dob=$request->dob;
    $reason="";

    if($fname && $fname!="" && $lname && $lname!="" && $email && $email!="" && $dob && $dob!="")
    {
      $cus_data=Customer::where('cus_email',$email)->get();
      if(count($cus_data)>0)
      {
        $reason="Email id already exist";
      }
      else
      {
        $Customer=new Customer;
        $Customer->cus_fname=$fname;
        $Customer->cus_lname=$lname;
        $Customer->cus_dob=$dob;
        $Customer->cus_email=$email;
        $Customer->save();
        $output="success";
      }

    }
    else
    {
      $reason="Some Parameter data missing";
    }
    return $this->response_array_generator($output,$reason,$data,"");

  }
}
