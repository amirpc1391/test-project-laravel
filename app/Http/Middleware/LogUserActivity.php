<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogIn;

class LogUserActivity
{
    public function handle(Request $request, Closure $next)
    {
       $body=json_encode($request->all());
       $url=$request->url();
       $ip=$request->ip();

       auth()->user()->logs()->create([
        'url'=>$url,
        'ip'=>$ip,
        'body'=>$body
       ]);
       return $next($request);
    }

}
