<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/11/19
 * Time: 下午3:47
 */
if(!function_exists('page')){
    function page($page_num,$count){
        //start $count
        $start_offset = max(0,(($page_num-1) * $count));
        $end_offset = $start_offset + $count;
        return [$start_offset,$end_offset];
    }
}
