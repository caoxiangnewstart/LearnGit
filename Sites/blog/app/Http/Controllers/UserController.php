<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/9/27
 * Time: 下午4:15
 */
namespace App\Http\Controllers;
//use App\User;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    public function __construct()
    {
        //为单独的控制器指定中间件
//        $this->middleware('token:token_tes');
        //还可以指定中间件的作用对象或者不作用对象
//        $this->middleware('token:token_tes')->only('show');
//        $this->middleware('token:token_tes')->except('show');
        //闭包注册中间件
        $this->middleware(function($request, $next){
            return $next($request);
        });
    }

    public function index(){
         $url = route('routename');
         return '<form method="get" action="'.$url.'">'.csrf_field().'<button type="submit">提交</button></form>';
     }

     public function routename(){
         return "this is routename redirect by route function";
     }

     public function show($id){
         return view('user.profile',['userinfo'=> User::findOrFail($id)]);
     }

     public function db(User $user){
        return $user->getUsers();
     }
}
