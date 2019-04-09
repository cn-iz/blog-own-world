<?php


namespace app\dbs;


use think\Db;

class hw
{
    protected $autoWriteTimestamp = 'datetime';

    public function add($info){
        $db=Db::table('hw');
        $info['create_time']=date("Y-m-d H:i:s",time());
        $info['update_time']=$info['create_time'];
        $info['user_id']=session('user')['user_id'];
        return $db->insertGetId($info);
    }
    public function find_by_id($id){
        $db=Db::table('hw');
        Db::table('hw')->where('hw_id',$id)->setInc('hw_look');
        return $db->where('hw_id',$id)->find();
    }
    public function edit($info){
        $db=Db::table('hw');
        $info['update_time']=date("Y-m-d H:i:s",time());;
        return $db->where('hw_id',$info['hw_id'])->update($info);
    }
    public function select_by_class($class){
        $db=Db::table('hw');
        return $db->where('hw_class',$class)->order('create_time desc')->select();
    }
    public function del($id){
        $db=Db::table('hw');
        return $db->where('hw_id',$id)->delete();
    }
    public function select_by_fd($fd_id){
        $db=Db::table('hw');
        return $db->where('fd_id',$fd_id)->order('create_time')->order('create_time desc')->select();
    }
}