<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //url 参数需为test_role, 中间件参数需为 token_test
        if($role !== 'test_role' && request()->input('token') !== 'token_tes'){
            return redirect()->to('http://www.baidu.com');
        }
        return $next($request);
    }
}
