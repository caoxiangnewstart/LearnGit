<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
Route::get('/', function () {
    return view('welcome');
//    return view('test');
});

/*Route::get('hello',function () {
   return 'hello,welcome to laravel';
});*/

//Route::get('hello', 'UserController@index');

Route::match(['get', 'post'],'foo', function () {
    return 'this is match route fetch get or post method';
});

Route::get('form',function(){
    return '<form method="post" action="/foo">'.csrf_field().'<button type="submit">提交</button></form>';
});

//使用view直接返回视图
Route::view('view','welcome',['name'=>'laravel test']);

//参数直接传递到控制器中
Route::get('/param/{param}','UserController@index');

//路由命名
Route::get('/user/profile','UserController@routename')->name('routename');

Route::get('redirect', function(){
    return redirect()->route('routename');
});

//路由命名之后，可以通过route('路由名称')生成可以跳转的url；
Route::get('/url','UserController@index');

//路由组
Route::group(['prefix'=>'/new'], function(){
    Route::get('/test1',"NewController@test1");
    Route::get('/flattentest',"NewController@flattentest");
    Route::get('/test2',"NewController@test2");
});


//静态门面
Route::get('/get/{key}',function($key){
    return Cache::get($key);
});

//访问当前路由
Route::get('/route',"NewController@route");

Route::get('/get',"NewController@getkey");

Route::get('/Cool',"NewController@Cool")->middleware('token:token_tes');
Route::get('/guzzlehttp',"NewController@guzzlehttp");
Route::get('/test',"NewController@test");
Route::get('/formRequest',"NewController@formRequest");
Route::get('/post',"NewController@post");

Route::get('/show/{id}',"UserController@show");

//资源路由
Route::resource('posts','PostController');

//声明被api消费的资源路由,默认的路由名称可以通过names参数进行修改
Route::apiResource('post','PostController',['names'=>['show1'=>'post.show']]);

//路由参数,路由缓存只针对控制器路由，不适用闭包路由
Route::get('/test/{id}',"NewController@test");

//withInput表单数据回填
Route::get('/form',"NewController@form");

//Response的cookie函数设置cookie
Route::get('/cookie/set',function(){
    return response('set cookie')->cookie('name','caoxiang',600);
});

Route::get('/cookie/get',function(\Illuminate\Http\Request $request){
    return $request->cookie('name');
});

//response 完整测试一次性session重定向
/*Route::get('/response/with',function(){
    //一次性session，将数据存在session中并返回
    return redirect('with')->with('name','曹祥');
});

Route::get('/with',function(){
    return view('test');
});

Route::get('/getsession',function(){
    return session('name','no data');
});*/

//response 生成强制文件下载(没有提示)
/*Route::get('/download/image',function(){
    return response()->download(storage_path('app/photo/ss.png','下载.png'));
});*/

//直接在浏览器显示文件，无需下载
/*Route::get('/showall/file',function (){
    return response()->file(storage_path('app/photo/ss.png'));
});*/

// collection test
/*Route::get('/map',function(){
    $arr = collect([
        ['name'=>'a','age'=>16],
        ['name'=>'b','age'=>18]
    ])->mapWithKeys(function($r){
        return [$r['name'].'-'.$r['age'] => $r];
    });
    return $arr->all();
});*/

Route::get('/db','UserController@db');

/*Route::get('/map',function(){
    $arr = collect([['name'=>'caoxiang']])->map(function($value,$key){
        //返回的是集合中每一个item的值
//        return [$value['name']=>$value];
        return $key;
    });
    return $arr->all();
});*/

//url
/*Route::get('/url/{id}',function($id){
//    return url()->current();//不带查询字符串的url
//    return url()->full();//完整的url
//    return url()->previous();//上一的请求的详细url
//    return $id;
});*/

/*Route::get('/setsession',function(){
    return session(['user'=>['age'=>28]]);
});

Route::get('/pushsession',function(\Illuminate\Http\Request $request){
    return $request->session()->push('user.name','caoxiang');
});

Route::get('/getsession',function (\Illuminate\Http\Request $request){
    return $request->session()->all();
});*/

//通过Artisan门面调用command
Route::get('/artisan',function(){
    //执行成功未发生错误，返回0
     return \Illuminate\Support\Facades\Artisan::call('command:name');
});

//Carbon 时间处理类 继承DateTime
Route::get('/carbon',function (){
    $parse_time = Carbon::parse("2018-09-09 12:22:22");
    echo $parse_time -> year."\n";
    echo $parse_time ->timestamp."\n";
});

//vue 路由
Route::get('/vue',function(){
    return view('test');
});

Route::get('/condition',function(){
    return view('condition');
});

Route::get('/list',function(){
    return view('list');
});

Route::get('/bindhref',function(){
    return 'bindhref';
});

Route::get('/laravel',function(){
    $arr = collect([
        ['id'=>1,'age'=>20,'name'=>'xiaohui'],
        ['id'=>2,'age'=>30,'name'=>'daping'],
    ]);
    //average
    $avg_age = $arr->average('age');//平均年龄
    //chunk
    $chunks =$arr ->chunk(1);
    //collapse将多个数组合并成一个,同键值的进行覆盖
    $collapsed = $arr->collapse();//{"id":2,"age":30,"name":"daping"}

    $arr2 = ['name','age'];
    $arr3 =['caoxiang',25];
    //combine将两数组按键值方式合并
    $combined = collect($arr2)->combine($arr3);//{"name":"caoxiang","age":25}

/*    //contains   key=>value，形式判断是否存在该键值对在数组中
//    dd($arr->contains('name','xiaohui'));
    //contains 回调函数
    $name = 'sss';
    $count_3 = $arr -> contains(function($value) use ($name){
        return $value['name'] === $name ? true : false;
    });
    dd($count_3);*/


/*    //集合内的总数
    dd($arr->count());*/

/*    //diff 集合差值，原集合存在
    $diff_item = collect([1,2,3])->diff([2,3]);
    dd($diff_item);*/

//transform会修改集合的本身？
    $collection = collect([1,2,3]);
    $new_c = $collection->map(function($item,$key){
        return $item*2;
    });
    dd($collection->all(),$new_c->all());

});





