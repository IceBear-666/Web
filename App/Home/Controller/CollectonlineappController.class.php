<?php
namespace Home\Controller;
use User\Api\UserApi;
/**
 * 
 * 我的收藏
 */

class CollectonlineappController extends HomeController {
    public function index(){
		
		import('ORG.Util.Page');// 导入分页类
		$uid  =  $_SESSION['ot_home']['user_auth']['uid'];
		$count = M('Keep')->where(array('uid' => $uid))->count();
		$Page       = new \Think\Page($count,5);
		$limit = $page->firstRow . ',' . $page->listRows;
		$where = array('Keep.uid' => $uid);
		$weibo = D('Keep')->getAll($where, $limit);
		
		 //var_dump($weibo);die;
		$this->assign('info',array('aid'=>I('aid'),'sn'=>10));
        $category=get_category_top('all');
        $this->assign('category',$category);
		$this->assign('page',$show);// 赋值分页输出
		$this->weibo = $weibo;
		$this->display();
    }

	/**
	 * 异步取消收藏
	 */
	Public function cancelKeep () {
		

		$kid = $_POST['kid'];
		$wid = $_POST['wid'];
		//var_dump($wid);die;
		if (M('Keep')->delete($kid)) {
			M('Olapplication')->where(array('id' => $wid))->setDec('keep');

			echo 1;
		} else {
			echo 0;
		}
	}

}

