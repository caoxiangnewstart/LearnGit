<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/9/28
 * Time: 上午11:41
 */

namespace App\Http\Controllers;
use Carbon\Carbon;
use \Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Redis as Redis;
//use Illuminate\Filesystem\Cache;
use App\Model\User;
use \GuzzleHttp\Client;
use \GuzzleHttp\Promise\Promise;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function test1(){
        $data = collect(['first','second',null])->map(function($name){
            return strtoupper($name);
        })->reject(function($name){
            return empty($name);
        });
        var_dump($data);
    }

    public function flattentest(){
        $data = collect(['first',1=>['second',['third']]])->flatten(2);
        var_dump($data);
    }

    public function test2(){
/*        except是collection中用于去除collect对象中指定键值的model
        $data = collect(['first'=>['first','second'],'second'=>'second'])->except('first');
        return $data;*/
        $data = collect(['first'])->has(0);
        var_dump($data);
    }

    public function getkey(){
        //predis,redis未设置密码的时候，需要将密码值设置为null
        $redis = Redis::connection('default');
        $name =$redis ->get('name');
        var_dump($name);
    }

    public function collecTion(){
        $data = [['name'=>'caoxiang','age'=>25],['name'=>'liulin','age'=>26]];
        $newdata = collect($data)->mapWithKeys(function($item){
            return [$item['name']=>$item['age']];
        });
        var_dump($newdata->all());
    }

    public function Cool(){
/*        $now = Carbon::now();
        $bool = $now->toTimeString();
        var_dump($bool);*/
        $now = implode('',['a','b']);
        return $now;
    }

    /**
     * http_build_query
     */
    public function test(){
/*        $data = array('foo'=>'bar',
            'baz'=>'boom',
            'cow'=>'milk',
            'php'=>'hypertext processor');

        echo http_build_query($data) . "\n";*/
//        return $request->get('name'); get,input都是一样的
//        return [$request->input('name'), $id];
//        return [$request->url(),$request->fullUrl(),$request->method()];
        return redirect('/form')->withInput(['name'=>'曹祥']);
    }

    public function form(){
        return view('test');
    }
    /**
     * \GuzzleHttp\Client
     * 用于发送各种请求，getBody获取响应体，getContents()获取响应体中的内容
     * 对于请求可以先创建请求，然后传递到请求客户端。
     */
    public function guzzlehttp(){
        $client = new Client(['headers'=>['User-Agent' => 'testing/1.0']]);
//        $stream = fopen('./test.txt','a+');
        //allow_redirects fasle statusCode=>302
        //allow_redirects true  statusCode=>200
        $result= $client ->request('GET','http://blog.test/Cool',
            ['allow_redirects'=>true,
                'debug' => false,
//                'delay' => 2000,//发送请求前延迟时间，单位毫秒,
                //'form_params'表单请求
/*
 *  请求头可以在客户端实例的时候传入默认值，后续配置可更改，headers设置成null，禁用所有headers
 *                  'headers' =>[
                    'User-Agent' => 'testing/1.0',//控制请求头参数
                ]
                'headers' => null*/
                'http_errors' => true,//设置成false来禁止http出错时（400，500）抛出异常，
/*                'multipart' =>[
                    'name' => '表单字段的名字',
                    'contents' => '表单字段对应的内容',
                    'filename' => '选择要发送到的文件名',
                    'headers' => '表单数据要使用的键值组？？？'
                ],//设置请求的主体为 multipart/form-data 表单。*/
/*
 *                  on_headers,可以在响应体完全返回完之前获取状态码和相应的响应信息，便于提前判断
 *                  返回数据的正确性
 *                 'on_headers' => function(ResponseInterface $response){
                    if($response->getStatusCode()===200){
                        throw new \Exception('this is a success request and test');
                    }
                },*/
//                'proxy' => 'http://127.0.0.1:80'
//                'sink' => $stream,//sink 表示将请求返回的数据写入打开的文件流中
//                'stream' => true,//数据为流数据
//                'verify' => true,//使用系统CA验证中心的证书
//                'timeout' => 1,//请求超时描述，
                'version' => 1.0//使用协议的版本http1.0
            ]);
//        fclose($stream);
        $body = $result->getBody();
/*        while (!$body->eof()){
            echo $body->read(1024);
        }*/
        echo $result->getStatusCode();
    }

    public function formRequest(){
        $new = new Client();
        $result = $new -> request('POST','http://blog.test/post',[
            'form_params' => [
                'foo' => 'bar'
            ]
        ]);
        echo $result -> getBody()->getContents();
    }

    public function post(){
        $tmin = -pow(-2,32);
        echo $tmin;
    }

    public function route(){
        return [Route::current()//当前路由的实例
        ,Route::currentRouteAction()//当前路由action属性
        ,Route::currentRouteName()//获取当前路由的名称"App\\Http\\Controllers\\NewController@route"
        ];
    }

}
