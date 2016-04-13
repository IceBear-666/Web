<?php
//常用设置

namespace Admin\Controller;

/**
 * 后台配置控制器
 * @author yangweijie <yangweijiester@gmail.com>
 *我的收藏管理
 */
class CollectionController extends AdminController {

    public function index(){
        
       $m = M("Olapplication");  
			import('ORG.Util.Page');// 导入分页类
			$title      =   trim(I('get.title'));

			if($title)
            $map['name'] = array('like',"%{$title}%");
			$count      = $m ->where($map)->count();// 查询满足要求的总记录数
			//var_dump($count);
            $Page       = new \Think\Page($count,10);
            $show       = $Page->show();// 分页显示输出
            $list = $m->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
           $this->assign("list",$list);
			$this->meta_title = '收藏管理';
            $this->assign('page',$show);// 赋值分页输出
			$this->display();
    }
	
	public function delete(){
        $id = $_GET['id'];
        $m =M("Olapplication");
        $result = $m->where("id = {$id}")->delete();
        if($result>0){
            $this->success("成功！");
        }else{
            $this->error("失败！");
        }
    }
}