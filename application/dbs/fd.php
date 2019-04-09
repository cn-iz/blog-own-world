<?php


namespace app\dbs;


use think\Db;

class fd
{
    public function add($info){
        $info['create_time']=date("Y-m-d H:i:s",time());
        $info['update_time']=$info['create_time'];
        return Db::table('fd')->insertGetId($info);
    }
    public function select_by_class($class){
        return Db::table('fd')->where('fd_class',$class)->order('create_time desc')->select();
    }
    public function del($id){
        Db::table('fd')->where('fd_id',$id)->delete();
    }
    public function fin_by_id($id){
        return Db::table('fd')->where('fd_id',$id)->find();
    }
    public function edit($info){
        return Db::table('fd')->where('fd_id',$info['fd_id'])->update($info);
    }
}