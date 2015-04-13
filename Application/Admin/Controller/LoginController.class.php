<?php 
 
namespace Admin\Controller;
use Think\Controller;

class LoginController extends CommonController{
	public function index(){
		
		//配置页面显示内容
		$this->assign('title','后台管理系统');
		$this->display();
	}
	
	//用户登录页面
	public function login(){
		 header("Content-Type:text/html; charset=utf-8");
		//首先检查验证码是否正确(验证码存在Session中)
		//if(	$_SESSION['verify']	!=	md5($_POST['verify'])	){
		//	$this->error('验证码不正确');
		//}

		// 检查验证码
		$verify = I('param.verify','');
		if(!check_verify($verify)){
			$this->error("亲，验证码输错了哦！",$this->site_url,5);
		}
		
		$user=M('User');//参数的User必须首字母大写，否则自动验证功能失效！
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		
		if(!$this->checklen($username)){
			$this->error('用户名长度必须在6~15个字符之间');
		}
		
		//查找输入的用户名是否存在
		if($user->where("username ='$username' AND password = '$password' AND status = '1'")->find()){
			
			session(username,$username);
			$url=U('/Homepage/describe/');
			// $url=U('/Index/index/username/'.$username);			
			redirect($url,0, '跳转中...'); 
		}else{
			$this->error('用户名或密码错误');
		}
		
	}
	
	public function checklen($data){
			if(strlen($data)>15 || strlen($data)<6){
			return false;
		}
		return true;
	}
}


?>