<?php


namespace app\admin\controller;


use think\captcha\Captcha;
use think\Controller;

class Login extends Controller
{
    public function login(){
        if(request()->isPost()){
            if(!captcha_check(input('yzm'))){
                $this->error('验证码错误!');
            };
            $user=(new \app\dbs\user())->login(input());
            if ($user){
                session('user',$user);
                $this->redirect('admin/index/index');
            }else{
                $this->error('登陆失败！');
            }
        }
        return $this->fetch();
    }
    public function captcha(){
        $captcha = new Captcha();
        $captcha->fontSize = 30;
        $captcha->codeSet = '0123456789';
        $captcha->length   = 4;
//        $captcha->useNoise = false;
        return $captcha->entry();
    }
}