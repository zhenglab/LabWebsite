<?php
namespace Admin\Controller;
use Think\Controller;

class OtherController extends CommonController {
	public function index(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this-> display();
	}
	public function backup(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 1;
		$this-> display();
	}
	public function user(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 2;
		//实例化文章模型
		$user=M('user');	
		$count=$user->count();
		//分页显示文章列表，每页8篇文章
		$page=new \Think\Page($count,8);//后台管理页面默认一页显示8条文章记录

        $page->setConfig('prev', "&laquo; Previous");//上一页
        $page->setConfig('next', 'Next &raquo;');//下一页
        $page->setConfig('first', '&laquo; First');//第一页
        $page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
        //设置分页回调方法
		$show=$page->show();
	
		$user_list=$user->field(array('id','username','password','add_time','status'))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			
		//对原始信息过滤
		//$this->filter($user_list);
		$this->assign('user_count',$count);
		$this->assign('title','后台管理系统');
		$this->assign('user_list',$user_list);
		$this->assign('page_method',$show);
		
		$this->display();
	}
	public function add_user(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 2;
		$this->assign('btn_ok_text','添加用户');
		$this->display();
	}
	public function do_add_user(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 2;
		header("Content-Type:text/html; charset=utf-8");
		// echo $_POST['title'];
		// echo $_POST['status'];
		// echo $_POST['content'];
		$user=D('User');//参数的User必须首字母大写，否则自动验证功能失效！
		if($user->create()){
			if($user->add()){
				$this->success('新用户添加成功!',U('Other/user'));
			}else{
				$this->error('新用户添加失败!');
			}
		}else{
			
			$this->error($user->getError());
		}	
	}
	public function edit_user(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 2;
		$this->assign('btn_ok_text','修改用户');
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			$user_id=$_GET['id'];
			$user=M('user');
			$user_list=$user->where('id='.$user_id)->select();
			//$this->assign('title','后台管理系统');
			$this->assign('user_list',$user_list);
		}else{
			$this->error('错误！！');
		}
		$this->display();
	}
	public function do_edit_user(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 2;
		header("Content-Type:text/html; charset=utf-8");
		if ($_POST['password']!=$_POST['repassword']) {
			$this->error('密码不一致，请重新输入');
		}else{
			$user=M('user');
			$user_id=$_GET['id'];
			$data = array(
				'username'	=>$_POST['username'],
				'password'	=>md5($_POST['password']),
				'status'	=>$_POST['status'],
				'add_time'	=>date('Y-m-d H:i:s')
				);
			$user_status=$user-> where('id='.$user_id)->setField($data);
			if($user_status){
			 	$this->success('用户修改成功，返回上级页面',U('Other/user'));
			}else{
			 	$this->error('用户修改失败，返回上级页面');
			}
		}
	}
	public function delete_user(){
		$this->login_verify();
		$this->current_page_item = 4;
		$this->current_list_item = 2;
		$user=M('user');
		if($user->delete($_GET['id'])){
			$this->success('用户删除成功');
		}else{
			$this->error($user->getLastSql());
		}
	}
}

?>