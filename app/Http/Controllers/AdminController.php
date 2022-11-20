<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Customer;
use App\Models\User;
use session;

class AdminController extends Controller
{

  public function index()
  {
    return view('admin/index',compact([]));
  }

  public function home()
  {
    $email_id=session('admin_username');
    $admin_name="";
    if($email_id && $email_id!="")
    {
      $admin_data=User::where('email',$email_id)->get();
      $customers=Customer::get();
      if(count($admin_data)>0)
      {
        $admin_name=$admin_data[0]['name'];
      }
    }
    return view('admin/home',compact(['admin_name','customers']));
  }

}
