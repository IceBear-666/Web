<?php

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class VideoreviewController extends AdminController {

    /**
     * 首页
     */
    public function index(){

        $_REQUEST['listRows'] = 10;
        $title      =   trim(I('get.title'));

        if($title)
            $map['name'] = array('like',"%{$title}%");
        $page = $this->_getPage("video_review");
        $list       =   M("video_review")->where($map)->
        limit($page->firstRow.','.$page->listRows)->order('rid desc')->select();
        //int_to_string($list,array('hide'=>array(1=>'是',0=>'否'),'is_dev'=>array(1=>'是',0=>'否')));
        $this->assign('list',$list);
        $this->assign('page',$page);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '宣讲会评论';
        $this->display();
    }

    /* 
     
    public function add(){
        //$id  = I('get.id',0);
        if(IS_POST){
            $Menu = D('video_review');
            $_POST['addtime'] = time();
            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_rid', 'rid', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            //$this->assign('info',array('rid'=>$id));

            $this->meta_title = '新增卖车故事';
            $this->display('edit');
        }
    } */

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $rid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('video_review');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_rid', 'rid', $data['rid'], UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('video_review')->field(true)->find($rid);

            if(false === $info){
                $this->error('获取信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑';
            $this->display();
        }
    }
    
    
    /**
     * xiangqing
     */
    public function show($id = 0){
        $rid  = I('get.id',0);
        $info = array();
        /* 获取数据 */
        $info = M('video_review')->field(true)->find($rid);

        if(false === $info){
            $this->error('获取信息错误');
        }
        $this->assign('info', $info);
        $this->meta_title = '查看详情';
        $this->display();
    }

    /**
     * 删除
     */
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('rid' => array('in', $id) );
        if(M('video_review')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_rid', 'rid', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }


    //审核操作
    public function checkStatus(){
    	$id = intval($_REQUEST['id']);
    	$type = intval($_REQUEST['type']);
    	if($id){
    	    $save = array(
    	        "status"=>$type,
    	        //"check_uid"=>is_login(),
    	        //"check_time"=>time(),
    	    );
    		M("video_review")->where(array("rid"=>$id))->save($save);
    		$this->success("操作成功","/Admin/Videoreview/index.html");
    	}
    	else $this->error("参数无效");

    }


}
