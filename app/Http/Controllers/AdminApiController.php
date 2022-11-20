<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Customer;
use App\Models\User;

class AdminApiController extends Controller
{

  public function login(Request $request)
  {
    $response=array();
    $data=array();

    $output="failed";

    $email=$request->email;
    $password=$request->password;

    //Basic Login
    $md5_password=md5($password);
    $reason="";

    if($email && $email!="" && $password && $password!="")
    {
      $admin_data=User::where('email',$email)->get();
      if(count($admin_data)>0)
      {
        $cpassword=$admin_data[0]['password'];
        if($md5_password==$cpassword)
        {
          session(['admin_username' => $email]);
          $output="success";
        }
        else
        {
          $reason="Password is wrong";
        }
      }
      else
      {
        $reason="Invalid user name";
      }

    }
    else
    {
      $reason="Some Parameter data missing";
    }
    return $this->response_array_generator($output,$reason,$data,"");

  }

  public function logout(Request $request)
  {
      $response=array();
      $data=array();

      $output="failed";

      session(['admin_username' => ""]);
      $output="success";
    return $this->response_array_generator($output,"",$data,"");

  }

  public function customerStatus(Request $request)
  {
    $response=array();
    $data=array();

    $output="failed";

    $status=$request->status;
    $cus_id=$request->cus_id;

    Customer::where('id',$cus_id)->update(['cus_status' => $status]);
    $customer=Customer::where('id',$cus_id)->get();
    if(count($customer)>0)
    {
      $msg = "Hi ".$customer[0]['cus_fname']." ".$customer[0]['cus_fname'].",";
      $cus_email=$customer[0]['cus_email'];

      $emailmsg=$msg."Your rejected by admin";
      if($status==1)
      {
      $emailmsg=$msg."Your approved by admin";
      }

      @mail($cus_email,"Mail from admin",$emailmsg);
      
    }
    $output="success";

    return $this->response_array_generator($output,"",$data,"");
  }



}
