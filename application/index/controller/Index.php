<?php


namespace app\index\controller;


use think\Controller;

class Index extends common
{
    public function index(){
        $this->redirect('index/info/infolist');
        return $this->fetch('aa');
    }
}