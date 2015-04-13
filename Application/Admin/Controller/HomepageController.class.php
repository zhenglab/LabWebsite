<?php 
namespace Admin\Controller; 
use Think\Controller; 

class HomepageController extends CommonController {
	public function index(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this-> display();
	}
	public function describe(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 1;

		//实例化文章模型
		$describe=M('describe');	
		$count=$describe->count();
		//分页显示文章列表，每页8篇文章
		$page=new \Think\Page($count,8);//后台管理页面默认一页显示8条文章记录

        $page->setConfig('prev', "&laquo; Previous");//上一页
        $page->setConfig('next', 'Next &raquo;');//下一页
        $page->setConfig('first', '&laquo; First');//第一页
        $page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
        //设置分页回调方法
		$show=$page->show();
	
		$describe_list=$describe->field(array('id','author','add_time','content','edit_time','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			
		//对原始信息过滤
		//$this->filter($news_list);
		$this->assign('describe_count',$count);
		$this->assign('title','后台管理系统');
		$this->assign('describe_list',$describe_list);
		$this->assign('page_method',$show);
		

		$this-> display();
	}

	public function add_describe(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 1;
		$this->assign('btn_ok_text','添加简介');
		$this->display();
	}

	public function do_add_describe(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 1;
		header("Content-Type:text/html; charset=utf-8");
		$describe=M('describe');
		//修改状态为0
		$describe->status = '0';
		$describe->where('status=1')->save(); // 根据条件更新记录
		//echo $_POST['content'];
		//echo date('Y-m-d H:i:s');
		if($describe->create()){
			
			$describe->content	=$_POST['content'];
			$describe->author	=session('username');
			$describe->add_time =date('Y-m-d H:i:s');
			$describe->edit_time=date('Y-m-d H:i:s');  
			$describe->status   =1;
					
			//将文章写入数据库
			if($describe->add()){
				$this->success('文章添加成功，返回上级页面',U('Homepage/describe'));
			}else{
				$this->error('文章添加失败，返回上级页面');
			}
			
		}else{
			$this->error($describe->getError());
		}
	}
	public function edit_describe(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 1;
		$this->assign('btn_ok_text','修改简介');
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			$describe_id=$_GET['id'];
			$describe=M('describe');
			$describe_list=$describe->where("id=$describe_id")->select();
			//$this->assign('title','后台管理系统');
			$this->assign('describe_list',$describe_list);
		}else{
			$this->error('错误！！');
		}
		$this->display();
	}
	public function do_edit_describe(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 1;
		header("Content-Type:text/html; charset=utf-8");
		$describe=M('describe');
		$describe_id=$_GET['id'];
		$data = array(
			'content'=>$_POST['content']
			);
		$describe_status=$describe-> where("id=$describe_id")->setField($data);
		if($describe_status){
		 	$this->success('简介修改成功，返回上级页面',U('Homepage/describe'));
		}else{
		 	$this->error('简介修改失败，返回上级页面');
		}
	}

	public function news(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 2;
		//实例化文章模型
		$news=M('news');	
		$count=$news->count();
		//分页显示文章列表，每页8篇文章
		$page=new \Think\Page($count,8);//后台管理页面默认一页显示8条文章记录

        $page->setConfig('prev', "&laquo; Previous");//上一页
        $page->setConfig('next', 'Next &raquo;');//下一页
        $page->setConfig('first', '&laquo; First');//第一页
        $page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
        //设置分页回调方法
		$show=$page->show();
	
		$news_list=$news->field(array('id','title','author','add_time','content','edit_time','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			
		//对原始信息过滤
		//$this->filter($news_list);
		$this->assign('describe_count',$count);
		$this->assign('news_list',$news_list);
		$this->assign('page_method',$show);
		$this->display();
	}
	public function add_news(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 2;
		$this->assign('btn_ok_text','添加新闻');
		$this->display();
	}
	public function do_add_news(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 2;
		header("Content-Type:text/html; charset=utf-8");
		// echo $_POST['title'];
		// echo $_POST['status'];
		// echo $_POST['content'];
		$describe=M('news');
		if($describe->create()){
			$describe->title	=$_POST['title'];
			$describe->content	=$_POST['content'];
			$describe->author	=session('username');
			$describe->add_time =date('Y-m-d H:i:s');
			$describe->edit_time=date('Y-m-d H:i:s');  
			$describe->status   =$_POST['status'];
					
			//将文章写入数据库
			if($describe->add()){
				$this->success('文章添加成功，返回上级页面',U('Homepage/news'));
			}else{
				$this->error('文章添加失败，返回上级页面');
			}
			
		}else{
			$this->error($describe->getError());
		}
	}
	public function edit_news(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 2;
		$this->assign('btn_ok_text','修改新闻');
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			$news_id=$_GET['id'];
			$news=M('news');
			$news_list=$news->where('id='.$news_id)->select();
			//$this->assign('title','后台管理系统');
			$this->assign('news_list',$news_list);
		}else{
			$this->error('错误！！');
		}
		$this->display();
	}
	public function do_edit_news(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 2;
		header("Content-Type:text/html; charset=utf-8");
		$news=M('news');
		$news_id=$_GET['id'];
		$data = array(
			'title'		=>$_POST['title'],
			'content'	=>$_POST['content'],
			'status'	=>$_POST['status']
			);
		$news_status=$news-> where('id='.$news_id)->setField($data);
		if($news_status){
		 	$this->success('简介修改成功，返回上级页面',U('Homepage/news'));
		}else{
		 	$this->error('简介修改失败，返回上级页面');
		}
	}
	public function delete_news(){
		$this->login_verify();
		$this->current_page_item = 1;
		$this->current_list_item = 2;
		$news=M('news');
		if($news->delete($_GET['id'])){
			$this->success('文章删除成功');
		}else{
			$this->error($article->getLastSql());
		}
	}
}

?>