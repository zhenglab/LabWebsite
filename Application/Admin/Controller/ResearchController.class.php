<?php
namespace Admin\Controller;
use Think\Controller;

class ResearchController extends CommonController {
	public function index(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this-> display(); 
	}
	public function paper(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 1;
		$paper=M('research');
		$count=$paper->count();
		//分页显示文章列表，每页8篇文章
		$page=new \Think\Page($count,8);//后台管理页面默认一页显示8条文章记录

        $page->setConfig('prev', "&laquo; Previous");//上一页
        $page->setConfig('next', 'Next &raquo;');//下一页
        $page->setConfig('first', '&laquo; First');//第一页
        $page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
        //设置分页回调方法
		$show=$page->show();
	
		$paper_list=$paper->field(array('id','title','classify','date','describe','file_path','img_path','add_time','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$paper_list_hide=$paper->field(array('id','title','classify','date','describe','file_path','img_path','add_time','status'))->where('status=0')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

		//对原始信息过滤
		//$this->filter($news_list);
		$this->assign('paper_count',$count);
		$this->assign('paper_list',$paper_list);
		$this->assign('paper_list_hide',$paper_list_hide);
		$this->assign('page_method',$show);	
		$this-> display();
	}
	public function add_paper(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 1;
		$this->assign('btn_ok_text','添加论文');
		$this->display();
	}
	public function do_add_paper(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 1;
		//dump ($_FILES);
		if (!$_FILES) {
			$this->error("没有检测到文件");
		}else{
			//$filename=$_FILES['paper']['name'];
			//$filename=substr($filename,0,strrpos(filename, '.'));
			//$this->upload_paper($filename);
			if ($_FILES['paper']) {
				$this->upload_paper();
			}
			if ($_FILES['photo']) {
				$this->upload_image();
			}
		}
		$paper=M('research');
		if($paper->create()){
			$paper->title		=$_POST['title'];
			$paper->classify	=$_POST['classify'];
			$paper->describe	=$_POST['describe'];
			$paper->date		=$_POST['date'];
			$paper->add_time	=date('Y-m-d H:i:s');
			$paper->file_path	=session('ResearchPdfPath');  
			$paper->img_path	=session('ResearchImgPath');  
			$paper->status 		=$_POST['status'];
					
			//将文章写入数据库
			if($paper->add()){
				$this->success('论文添加成功，返回上级页面',U('Research/paper'));
			}else{
				$this->error('论文添加失败，返回上级页面');
			}
			
		}else{
			$this->error($paper->getError());
		}
	}
	public function edit_paper(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 1;
		$this->assign('btn_ok_text','修改论文信息');
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			$paper_id=$_GET['id'];
			$paper=M('research');
			$paper_list=$paper->where('id='.$paper_id)->select();
			//$this->assign('title','后台管理系统');
			$this->assign('paper_list',$paper_list);
		}else{
			$this->error('错误！！');
		}
		$this->display();
	}
	public function do_edit_paper(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 1;
		header("Content-Type:text/html; charset=utf-8");
		//dump ($_FILES);
		//上传文件配置
		if (!$_FILES) {
			$this->error("没有检测到文件");
		}else{
			if ($_FILES['paper']) {
				$this->upload_paper();
			}
			if ($_FILES['photo']) {
				$this->upload_image();
			}
		}
		$paper=M('research');
		$paper_id=$_GET['id'];
		//传入文件地址
		if (session('ResearchImgPath')&&session('ResearchPdfPath')) {
			$data = array(
			'title'		=>$_POST['title'],
			'classify'	=>$_POST['classify'],
			'date'		=>$_POST['date'],
			'describe'	=>$_POST['describe'],
			'status'	=>$_POST['status'],
			'img_path' => session('ResearchImgPath'),
			'file_path' => session('ResearchPdfPath'),
			);
		}else{
			$data = array(
			'title'		=>$_POST['title'],
			'classify'	=>$_POST['classify'],
			'date'		=>$_POST['date'],
			'describe'	=>$_POST['describe'],
			'status'	=>$_POST['status']
			);
		}
		// $data = array(
		// 	'title'		=>$_POST['title'],
		// 	'classify'	=>$_POST['classify'],
		// 	'date'		=>$_POST['date'],
		// 	'describe'	=>$_POST['describe'],
		// 	'status'	=>$_POST['status']
		// 	);
		//dump ($data);
		//
		$paper_status=$paper-> where('id='.$paper_id)->setField($data);
		if($paper_status){
		 	$this->success('论文信息修改成功，返回上级页面',U('Research/paper'));
		}else{
		 	$this->error('论文信息修改失败，返回上级页面');
		}
	}
	public function delete_paper(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 1;
		$paper=M('research');
		if($paper->delete($_GET['id'])){
			$this->success('论文信息删除成功');
		}else{
			$this->error($paper->getLastSql());
		}
	}
	public function upload_paper(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     83886080 ;// 设置附件上传大小 10M
	    $upload->exts      =     array('pdf');// 设置附件上传类型
	    $upload->replace   =	 true;
	    $upload->autoSub   =	 false;
	    //$upload->saveName  =	 $filename;
	    $upload->rootPath  =     './Public/Uploads/';  // 设置附件上传根目录
	    $upload->savePath  =     'Research/'.$_POST['date'].'/paper/'; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        //$this->success('上传成功！');
	        foreach($info as $file){
        		session('ResearchPdfPath',$file['savepath'].$file['savename']);
    		}
	    }
	}
	public function upload_image(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     8388608 ;// 设置附件上传大小 1M
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->replace   =	 true;
	    $upload->autoSub   =	 false;
	    //$upload->saveName  =	 $filename;
	    $upload->rootPath  =     './Public/Uploads/';  // 设置附件上传根目录
	    $upload->savePath  =     'Research/'.$_POST['date'].'/images/'; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        //$this->success('上传成功！');
	        foreach($info as $file){
        		session('ResearchImgPath',$file['savepath'].$file['savename']);
    		}
	    }
	}



	public function patents(){
		$this->login_verify();
		$this->current_page_item = 3;
		$this->current_list_item = 2;
		$this->display();
	}
}

?>