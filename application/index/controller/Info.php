<?php


namespace app\index\controller;


use app\dbs\fd;
use app\dbs\hw;
use think\Controller;

class Info extends common
{
    public function infolist()
    {
        $class=input('hw_class');
        if(!$class){
            $class=1;
            $this->assign('ac',1);
        }
        $fds=(new fd())->select_by_class($class);
//        $info=(new hw())->select_by_class($class);
//        $this->assign('info',$info);
        $this->assign('fds',json_encode($fds));
        return $this->fetch();
    }
    public function getfdinfo(){
        $info=(new hw())->select_by_fd(input('fd_id'));
        return json($info);
    }

    public function info()
    {
        $info=(new hw())->find_by_id(input('hw_id'));
        $this->assign('info',$info);
        $this->assign('ac',$info['hw_class']);
        return $this->fetch();
    }
    public function ue(){
//        $id=input('id');
//        $info=(new hw())->find_by_id($id);
//        $this->assign('info',$info);
        return $this->fetch();
    }
}