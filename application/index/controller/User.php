<?php


namespace app\index\controller;


use think\Controller;

class User extends common
{
    public function login(){
        return $this->fetch('user');
    }
}