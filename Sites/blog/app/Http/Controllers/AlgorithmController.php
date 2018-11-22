<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/11/22
 * Time: 下午5:57
 */

namespace App\Http\Controllers;


class AlgorithmController extends Controller
{
    /**
     * 十进制转2，8，16进制
     * @return array|null|string
     * @throws \Exception
     */
    public function tenToOther(){
        $input = request()->input('input');
        $output = request()->input('output');
        $other = [2,8,16];
        if(!in_array($output,$other)){
            throw new \Exception("目前只支持十进制转2，8，16进制");
        }
        $mod_arr = [];
        while($input != 0){
            $mod = $input % $output;
            array_push($mod_arr,$mod);
            $input = ($input - $mod) / $output;
        }
        $mod_arr_r = array_reverse($mod_arr);
        if($output == 16){
            $output = '0x';
            collect($mod_arr_r)->map(function($item)use(&$output){
                switch ($item){
                    case 10:
                        $output.='A';
                        break;
                    case 11:
                        $output.='B';
                        break;
                    case 12:
                        $output.='C';
                        break;
                    case 13:
                        $output.='D';
                        break;
                    case 14:
                        $output.='E';
                        break;
                    case 15:
                        $output.='F';
                        break;
                    default:
                        $output.=$item;
                        break;
                }
            });
        }else{
            $output = implode('',$mod_arr_r);
        }
        return $output;
    }
}
