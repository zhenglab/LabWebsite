<?php

namespace Admin\Controller;
use Think\Controller;

class IndexController extends CommonController {	 
	/**
     * @函数	index
     * @功能	显示后台管理主页面（包含登录判断）
     */
    public function index(){ 	
        header("Content-Type:text/html; charset=utf-8");
		if(session('?username')){
			$this->assign('username',session('username'));
			$this->assign('title','后台管理系统');
			$this->display();
			
		}
		
		else
		{
			//$this->error('您好，请先登录！！！',U('/Login/index/'));
			$this->redirect('/Login/index');
		}	
    }
}    

?>