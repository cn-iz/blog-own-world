<?php


namespace app\admin\controller;

use think\Controller;
use think\Request;

class Common  extends Controller
{
    public function __construct(Request $request = null)
    {
        if(!session('user')){
            $this->redirect('admin/login/login');
        }
        parent::__construct($request);
    }
}