<?php
namespace Home\Controller;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class PluginController extends HomeController {
    function __construct(){
        parent::__construct();
        $this->assign("cur_top_nav",array("plugin"=>'class="current"') );
    }


    //新闻首页
    public function index() {
        $this->lists();
        /* $this->title  =  '新闻动态';
        $list = M('News')->where(array('status'=>'1','type'=>1) )->select();
        $this->assign("list",$list);
        $this->display(); */
    }
    
   
    //功能介绍
    public function plugin(){
        $this->title  =  '功能介绍';    
        $info = M('Plugin')->where(array('status'=>'1','type'=>10,'nid'=>1))->find();
        $this->assign('info',$info);
        $this->display();
    }

    //安装教程
    public function install(){
        $this->title  =  '安装教程';    
        $info = M('Plugin')->where(array('status'=>'1','type'=>10,'nid'=>1))->find();
        $this->assign('info',$info);
        $this->display();
    }
	
   

}
?>