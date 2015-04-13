<?php

namespace Admin\Controller;
use Think\Controller;

class CommonController extends  Controller{
	
	/*
	 *验证码部分 
	*/
	public function verify(){
		$Verify = new \Think\Verify();
		$Verify -> fontSize = 11;
		$Verify -> length = 4;
		$Verify -> useNoise = false;
		$Verify -> fontttf = '5.ttf';
		$Verify -> codeSet = '0123456789' ;
		$Verify -> imageW = 80;
		$Verify -> imageH = 30;
		$Verify -> entry();
	}

	/**
     * @函数	quit
     * @功能	登出账户，跳转至登录页面。并清除Session
     */
    public function quit(){
    	session(null);//清空所有session信息
		redirect(U('/Login/index'),0, '重新登录');
    }

    /*
	 *用户验证模块
    */
    public function login_verify(){
    	if (!session('?username')){
    		$this->error('您好，请先登录！！！',U('/Login/index/'));
    	}
    	else {
    		$this->assign('username',session('username'));
    	}
    }
    /*检测用户长度*/
    public function checklen($data){
			if(strlen($data)>15 || strlen($data)<6){
			return false;
		}
		return true;
	}


    /*
	 *图片上传模块
    */
    // public function upload_img(){
    // 	$upload = new \Think\Upload();// 实例化上传类
	   //  $upload->maxSize   =     3145728 ;// 设置附件上传大小
	   //  $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	   //  $upload->rootPath  =     "./Public/"; // 设置附件上传根目录
	   //  $upload->savePath  =     './Public/Uploads/People/images/'; // 设置附件上传（子）目录
	   //  // 上传文件 
	   //  $info   =   $upload->upload();
	   //  if(!$info) {// 上传错误提示错误信息
	   //      $this->error($upload->getError());
	   //  }else{// 上传成功
	   //      $this->success('上传成功！');
	   //  }
    // }
    public function uploadImg(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     './Public/'; // 设置附件上传根目录
    $upload->savePath  =      'Uploads/People/'; // 设置附件上传（子）目录
    $upload->autoSub	= 	true;
    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
    }else{// 上传成功
        $this->success('上传成功！');
    }
}

    /*--------------------------------------------------内部方法-------------------------------------------------------------------*/    
     /**
     * @函数	filter
     * @功能	对数据库中的信息进行裁剪和过滤
     */ 
    private function filter($list){
    		
    	foreach($list as $key=>$value){			
   			//设置显示的创建时间
			$list[$key]['createtime']=date("Y-m-d H:i:s",$value['createtime']);
				
			//设置显示的最后修改时间
			if(!$value['lastmodifytime']){
				$list[$key]['lastmodifytime']="无";
			}else{
				$list[$key]['lastmodifytime']=date("Y-m-d H:i:s",$value['lastmodifytime']);
			}		
			
			//文章标题过长时裁剪
			if(strlen($list[$key]['subject'])>80){
					$list[$key]['subject']=$this->cutString($list[$key]['subject'],0,20).'...';				
			}
		}
    }
    
     /**
     * @函数	cutString
     * @功能	字符串裁剪(仅适用于UTF-8)
     */	
	private function cutString($str, $from, $len)
	{
   		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                       '$1',$str);
	}
    
	



	public function verify_old(){
		//导入验证码类
		import("ORG.Util.Image"); 
		
		/*
		 * 参数1：验证码长度，默认4
		 * 参数2：类型，0为字母，1为数字，2为大写字母，3为小写字母，4为中文
		 * 参数3：图片类型，默认png格式，若服务器没有开PNG，就改成其他格式
		 * 参数4：图片宽度（根据长度自动计算）
		 * 参数5：图片高度，默认22个像素
		 * 参数6：验证码保存在Session的名称 'verify'
		 */
		 
		Image::buildImageVerify(4,1,'png',70,30);//静态方法
		
		//Image::GBVerify();
		
	}
}

?>