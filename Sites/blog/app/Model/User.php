<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/9/28
 * Time: 下午1:58
 */

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $connection = 'users';

    public function getUsers(){
//        return DB::connection($this->connection)->select('select * from users;')->toArray();
        return DB::connection();
    }
}
