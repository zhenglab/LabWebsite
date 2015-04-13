<?php
namespace Home\Controller;
use Think\Controller;
class ResearchController extends Controller {
    public function index(){
    	$p2015=M('research');
    	$p2015_list=$p2015->field(array('id','title','classify','date','describe','file_path','img_path','status'))->where('date=2015 AND status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$p2014=M('research');
    	$p2014_list=$p2014->field(array('id','title','classify','date','describe','file_path','img_path','status'))->where('date=2014 AND status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('p2015_list',$p2015_list);
    	$this->assign('p2014_list',$p2014_list);
    	$this -> display();
    } 
}