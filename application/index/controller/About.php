<?php


namespace app\index\controller;


use think\Controller;

class About extends common
{
    public function about(){
        return $this->fetch();
    }
}