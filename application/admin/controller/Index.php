<?php


namespace app\admin\controller;


use app\dbs\fd;
use app\dbs\hw;

class Index extends common
{
    public function index(){
        return $this->fetch();
    }
    public function addinfo(){
        $class=input('hw_class');
        if(!$class){
            $class=1;
        }
        if(request()->isPost()){
            $in=input();
            $id=(new hw())->add($in);
            if($id){
                $this->success('添加成功','admin/index/edit?hw_id='.$id);
            }
        }
        $fds=(new fd())->select_by_class($class);
        $this->assign('class',$class);
        $this->assign('fds',$fds);
        return $this->fetch();
    }
    public function upload(){
        if (request()->isPost()){
            $file = request()->file('video');
            $info = $file->move(ROOT_PATH .DS.'public'. DS . 'static' . DS . 'videos');
            if($info){
                return '/static/videos/'.$info->getSaveName();
            }else{
                // 上传失败获取错误信息
                return 'false';
            }
        }
    }
    public function edit(){
        if(request()->isPost()){
            $in=input();
            $id=(new hw())->edit($in);
        }
        $info=(new hw())->find_by_id(input('hw_id'));
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function del(){
        $in=input();
        (new hw())->del($in['hw_id']);
        $this->redirect('admin/index/infolist?hw_class='.$in['hw_class']);
    }
    public function infolist(){
        $class=input('hw_class');
        $info=(new hw())->select_by_class($class);
        $this->assign('info',$info);
        return $this->fetch();
    }

}