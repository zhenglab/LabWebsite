<?php 
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$describe=M('describe');
    	$describe_list=$describe->field(array('id','content','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$news=M('news');
    	$news_list=$news->field(array('id','content','status'))->where('status=1')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('describe_list',$describe_list);
    	$this->assign('news_list',$news_list);
    	$this -> display();
    }
}