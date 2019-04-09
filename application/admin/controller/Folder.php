<?php


namespace app\admin\controller;


use app\dbs\fd;

class Folder extends common
{
    public function fdlist(){
        $info1=(new fd())->select_by_class(1);
        $info2=(new fd())->select_by_class(2);
        $info3=(new fd())->select_by_class(3);
        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->assign('info3',$info3);
        return $this->fetch();
    }
    public function addfd(){
        if(request()->isPost()){
            (new fd())->add(input());
            $this->success('添加成功！');
        }
        return $this->fetch();
    }
    public function del(){
        (new fd())->del(input('fd_id'));
        $this->redirect('admin/folder/fdlist');
    }
    public function edit(){
        if (request()->isPost()){
            (new fd())->edit(input());
        }
        $info=(new fd())->fin_by_id(input('fd_id'));
        $this->assign('info',$info);
        return $this->fetch();
    }
}