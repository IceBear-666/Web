<?php
//友情链接管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class LinkController extends AdminController {

    /**
     * 首页
     */
    public function index(){

        $title      =   trim(I('get.title'));
        //$map = array("n.type"=>array("gt",0));
        /* if($title){
            $map['n.title'] = array('like',"%{$title}%");
        } */

        //$_REQUEST['r'] = 2;
        $page = $this->_getPage("link");

        $list = M("link")->where(array())->order('sn asc')->select();

        $this->assign('list',$list);

        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '友情链接管理';
        $this->display();
    }

    /**
     * 新增
     */
    public function add(){
        //$lid  = I('get.lid',0);
        if(IS_POST){
            $Menu = D('link');
            $_POST['addtime'] = time();
            //$_POST['uid'] = is_login();
            //$_POST['is_admin'] = 1;
            if(!$_POST['title'] || !$_POST['link']){
                $this->error('请填写完整');
            }

            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_link', 'link', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('lid'=>I('lid'),'sn'=>10));
            //$type_arr=getlinkType('all');

            $this->assign( array('type_arr'=>$type_arr) );
            $this->meta_title = '新增友情链接';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $lid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('link');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_link', 'link', $data['lid'], UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $info = M('link')->where(array('lid'=>$lid,"type"=>array("gt",0)))->find($lid);

            if(false === $info){
                $this->error('获取信息错误');
            }
            $this->assign('info', $info);
            //$this->assign( array('type_arr'=>getlinkType('all')) );
            $this->meta_title = '编辑友情链接';
            $this->display();
        }
    }

    /**
     * 删除
     */
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('lid' => array('in', $id) );
        if(M('link')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_link', 'link', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }



}
