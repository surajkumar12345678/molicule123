<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Session::get('admin_id');
        if(isset($id))
        {
            

        }else{
            $request->session()->flash('error','Access Denied');
            return redirect('/admin');

        }
        
        return $next($request);
    }
}
