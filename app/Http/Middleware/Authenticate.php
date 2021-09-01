<?php

namespace App\Http\Middleware;
use Session;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    
    protected function redirectTo($request)
    {
        $id =Session::get('user_id');

        if (isset($id)){
            
        } else {
            return route('login');
        }  
         
    }
}
