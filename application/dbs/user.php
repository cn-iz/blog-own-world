<?php


namespace app\dbs;


use think\Db;

class user
{
    public function login($in){
        return $db=Db::table('user')->where('user_name',$in['user_name'])->where('user_pwd',md5($in['user_pwd']))->where('user_power',0)->find();
    }
}