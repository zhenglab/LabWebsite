<?php 
namespace Home\Controller;
use Think\Controller;
class PeopleController extends Controller {
    public function index(){
    	$teacher=M('people');
    	$teacher_list=$teacher->field(array('id','name','homepage','img_path','describe','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$student=M('people');
    	$student_list=$student->field(array('id','name','homepage','img_path','describe','status'))->where('status=2')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('teacher_list',$teacher_list);
    	$this->assign('student_list',$student_list);
    	$this -> display();
    }
}