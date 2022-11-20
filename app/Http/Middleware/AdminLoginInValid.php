<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use session;
use DB;
use App\Models\User;

class AdminLoginInValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $login=false;
        $email_id=session('admin_username');
        if($email_id && $email_id!="")
        {
          $admin_data=User::where('email',$email_id)->get();
          if(count($admin_data)>0)
          {
            $login=true;
          }
        }
        if($login)
        {
          return $next($request);
        }
        else
        {
          return redirect('admin/');
        }
    }
}
