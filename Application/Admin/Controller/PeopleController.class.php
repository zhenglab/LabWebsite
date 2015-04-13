<?php 
namespace Admin\Controller;
use Think\Controller;

class PeopleController extends CommonController {
	public function index(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this-> display();
	}
	public function teacher(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 1;
		$teacher=M('people');
		$count=$teacher->count();
		//分页显示文章列表，每页8篇文章
		$page=new \Think\Page($count,8);//后台管理页面默认一页显示8条文章记录

        $page->setConfig('prev', "&laquo; Previous");//上一页
        $page->setConfig('next', 'Next &raquo;');//下一页
        $page->setConfig('first', '&laquo; First');//第一页
        $page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
        //设置分页回调方法
		$show=$page->show();
	
		$teacher_list=$teacher->field(array('id','name','homepage','add_time','img_path','describe','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			
		//对原始信息过滤
		//$this->filter($news_list);
		$this->assign('describe_count',$count);
		$this->assign('teacher_list',$teacher_list);
		$this->assign('page_method',$show);	
		$this-> display();
	}
	public function add_teacher(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 1;
		$this->assign('btn_ok_text','添加教师');
		$this->display();
	}
	public function do_add_teacher(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 1;
		//图片上传部分
		// if ($_FILES) {
		// 	$this->uploadImg();
		// }else{
		// 	$this->error();
		// }
		if (!$_FILES) {
			$this->error("没有检测到文件");
		}else{
			//$filename=$_FILES['paper']['name'];
			//$filename=substr($filename,0,strrpos(filename, '.'));
			$this->upload_image();
		}


		//结束
		$teacher=M('people');
		if($teacher->create()){
			$teacher->name	=$_POST['name'];
			$teacher->homepage	=$_POST['homepage'];
			$teacher->describe	=$_POST['describe'];
			$teacher->add_time	=date('Y-m-d H:i:s');
			$teacher->img_path	=session('PeopleImgPath');  
			$teacher->status 	='1';
					
			//将文章写入数据库
			if($teacher->add()){
				$this->success('教师添加成功，返回上级页面',U('People/teacher'));
			}else{
				$this->error('教师添加失败，返回上级页面');
			}
			
		}else{
			$this->error($teacher->getError());
		}
	}
	public function edit_teacher(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 1;
		$this->assign('btn_ok_text','修改教师信息');
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			$teacher_id=$_GET['id'];
			$teacher=M('people');
			$teacher_list=$teacher->where('id='.$teacher_id)->select();
			//$this->assign('title','后台管理系统');
			$this->assign('teacher_list',$teacher_list);
		}else{
			$this->error('错误！！');
		}
		$this->display();
	}
	public function do_edit_teacher(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 1;
		header("Content-Type:text/html; charset=utf-8");
		if ($_FILES) {
			$this->upload_image();
			$teacher=M('people');
			$teacher_id=$_GET['id'];
			$data = array(
				'name'		=>$_POST['name'],
				'homepage'	=>$_POST['homepage'],
				'describe'	=>$_POST['content'],
				'img_path'	=>session('PeopleImgPath'),
			);
			$teacher_status=$teacher-> where('id='.$teacher_id)->setField($data);
		}else{
			//$filename=$_FILES['paper']['name'];
			//$filename=substr($filename,0,strrpos(filename, '.'));
			$teacher=M('people');
			$teacher_id=$_GET['id'];
			$data = array(
				'name'		=>$_POST['name'],
				'homepage'	=>$_POST['homepage'],
				'describe'	=>$_POST['content'],
				);
			$teacher_status=$teacher-> where('id='.$teacher_id)->setField($data);
		}

		// $teacher=M('people');
		// $teacher_id=$_GET['id'];
		// $data = array(
		// 	'name'		=>$_POST['name'],
		// 	'homepage'	=>$_POST['homepage'],
		// 	'describe'	=>$_POST['content']
		// 	);
		// $teacher_status=$teacher-> where('id='.$teacher_id)->setField($data);
		if($teacher_status){
		 	$this->success('教师信息修改成功，返回上级页面',U('People/teacher'));
		}else{
		 	$this->error('教师信息修改失败，返回上级页面');
		}
	}
	public function delete_teacher(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 1;
		$teacher=M('people');
		if($teacher->delete($_GET['id'])){
			$this->success('教师信息删除成功');
		}else{
			$this->error($student->getLastSql());
		}
	}



	public function student(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 2;
		$student=M('people');
		$count=$student->count();
		//分页显示文章列表，每页8篇文章
		$page=new \Think\Page($count,8);//后台管理页面默认一页显示8条文章记录

        $page->setConfig('prev', "&laquo; Previous");//上一页
        $page->setConfig('next', 'Next &raquo;');//下一页
        $page->setConfig('first', '&laquo; First');//第一页
        $page->setConfig('last', 'Last &raquo;');//最后一页	
		$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
        //设置分页回调方法
		$show=$page->show();
	
		$student_list=$student->field(array('id','name','homepage','add_time','img_path','describe','status'))->where('status=2')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			
		//对原始信息过滤
		//$this->filter($news_list);
		$this->assign('describe_count',$count);
		$this->assign('student_list',$student_list);
		$this->assign('page_method',$show);	
		$this-> display();
	}
	public function add_student(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 2;
		$this->assign('btn_ok_text','添加学生');
		$this->display();
	}
	public function do_add_student(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 2;
		if (!$_FILES) {
			$this->error("没有检测到文件");
		}else{
			//$filename=$_FILES['paper']['name'];
			//$filename=substr($filename,0,strrpos(filename, '.'));
			$this->upload_image();
		}
		$student=M('people');
		if($student->create()){
			$student->name	=$_POST['name'];
			$student->homepage	=$_POST['homepage'];
			$student->describe	=$_POST['describe'];
			$student->add_time	=date('Y-m-d H:i:s');
			$student->img_path	=session('PeopleImgPath');;  
			$student->status 	='2';
					
			//将文章写入数据库
			if($student->add()){
				$this->success('学生添加成功，返回上级页面',U('People/student'));
			}else{
				$this->error('学生添加失败，返回上级页面');
			}
			
		}else{
			$this->error($student->getError());
		}
	}
	public function edit_student(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 2;
		$this->assign('btn_ok_text','修改学生信息');
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			$student_id=$_GET['id'];
			$student=M('people');
			$student_list=$student->where('id='.$student_id)->select();
			//$this->assign('title','后台管理系统');
			$this->assign('student_list',$student_list);
		}else{
			$this->error('错误！！');
		}
		$this->display();
	}
	public function do_edit_student(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 2;
		header("Content-Type:text/html; charset=utf-8");

		if ($_FILES) {
			$this->upload_image();
			$student=M('people');
			$student_id=$_GET['id'];
			$data = array(
				'name'		=>$_POST['name'],
				'homepage'	=>$_POST['homepage'],
				'describe'	=>$_POST['content'],
				'img_path'	=>session('PeopleImgPath'),
				);
			$student_status=$student-> where('id='.$student_id)->setField($data);
		}else{
			$student=M('people');
			$student_id=$_GET['id'];
			$data = array(
				'name'		=>$_POST['name'],
				'homepage'	=>$_POST['homepage'],
				'describe'	=>$_POST['content']
				);
			$student_status=$student-> where('id='.$student_id)->setField($data);
		}

		// $student=M('people');
		// $student_id=$_GET['id'];
		// $data = array(
		// 	'name'		=>$_POST['name'],
		// 	'homepage'	=>$_POST['homepage'],
		// 	'describe'	=>$_POST['content']
		// 	);
		// $student_status=$student-> where('id='.$student_id)->setField($data);
		if($student_status){
		 	$this->success('学生信息修改成功，返回上级页面',U('People/student'));
		}else{
		 	$this->error('学生信息修改失败，返回上级页面');
		}
	}
	public function delete_student(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 2;
		$student=M('people');
		if($student->delete($_GET['id'])){
			$this->success('学生信息删除成功');
		}else{
			$this->error($student->getLastSql());
		}
	}
	public function other(){
		$this->login_verify();
		$this->current_page_item = 2;
		$this->current_list_item = 3;
		$this->display(); 
	}
	public function upload_image(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->replace   =	 true;
	    $upload->autoSub   =	 false;
	    //$upload->saveName  =	 $filename;
	    $upload->rootPath  =     './Public/Uploads/';  // 设置附件上传根目录
	    $upload->savePath  =     'People/'; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        //$this->success('上传成功！');
	        foreach($info as $file){
        		session('PeopleImgPath',$file['savepath'].$file['savename']);
    		}
	    }
	}

}

?>