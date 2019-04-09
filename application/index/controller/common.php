<?php


namespace app\index\controller;

use think\Controller;
use think\Request;

class Common  extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $t=gmdate ("l d F Y H:i:s",strtotime("+1 day"))." GMT";
        $this->assign('t',$t);
        $controller=request()->controller();
        $action=request()->action();
        if($controller=='Info' and $action=='infolist'){
            $this->assign('ac',input('hw_class'));
        }else{
            $this->assign('ac',$controller);
        }

    }
}