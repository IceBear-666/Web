<?php
namespace Home\Controller;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class NewsController extends HomeController {

    function __construct(){
        parent::__construct();
        $this->assign("cur_top_nav",array("news"=>'current-n') );
    }

    //新闻首页
    public function index() {
        $this->lists();
        /* $this->title  =  '新闻动态';
        $list = M('News')->where(array('status'=>'1','type'=>1) )->select();
        $this->assign("list",$list);
        $this->display(); */
    }
    
    // 新闻列表
    public function lists() {
        $this->title  =  '新闻动态';
        $list = M('News')->where(array('status'=>'1','type'=>1) )->select();
        $this->assign("list",$list);
        $this->display();
    }
	
    //关于我们
    public function about(){
        $this->title  =  '关于我们';    
        $info = M('News')->where(array('status'=>'1','type'=>10,'nid'=>1))->find();
        $this->assign('info',$info);
        $this->display();
    }
	
    //帮助中心
	public function help(){
		 $this->title  =  '帮助中心';
        $list = M('News')->where(array('status'=>'1','type'=>4) )->select();
        $this->assign("list",$list);
        $this->display();
	}
	

    // 查看
    public function info($id){
        if(is_numeric($id)) {
            // 查看具体的日志信息
            $New = M("News");
            $vo   =  $New->find($id);
            if(!$vo  || $vo['status']   ==0 ) {
                $this->error('访问的内容不存在或已经删除！');
            }
            $this->title  =  $vo['title'];
            // 获取最新动态
            //$list   =  include DATA_PATH.'~news.php';
            //$this->assign('list',$list);
            $this->assign('info',$vo);
            $this->display();
        }else{
            $this->error('错误操作');
        }
    }

}
?>