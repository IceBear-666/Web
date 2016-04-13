<?php
namespace Admin\Controller;
/**
 * 后台用户控制器
 * 公开性问题
 */

class KaifangController extends AdminController {
    public function index(){
		
			$m = M("Gongkai");  
			import('ORG.Util.Page');// 导入分页类
			$title      =   trim(I('get.title'));

			if($title)
            $map['name'] = array('like',"%{$title}%");
			$count      = $m ->where($map)->count();// 查询满足要求的总记录数
			//var_dump($count);
            $Page       = new \Think\Page($count,2);
            $show       = $Page->show();// 分页显示输出
            $list = $m->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
           $this->assign("list",$list);
			$this->meta_title = '公开性管理';
            $this->assign('page',$show);// 赋值分页输出
			// 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
			$this->display();
    }

    public function delete(){
        $id = $_GET['id'];
        $m =M("Gongkai");
        $result = $m->where("id = {$id}")->delete();
        if($result>0){
            $this->success("成功！");
        }else{
            $this->error("失败！");
        }
    }


}

