<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/11/21
 * Time: 下午2:23
 */

namespace App\Http\Controllers;


class VueController extends Controller
{
    public function index(){
        return view('vue.index');
    }
}
