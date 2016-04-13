<?php
//广告管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class AdvController extends AdminController {

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
        $page = $this->_getPage("adv");

        $list = M("adv")->where(array())->order('cid asc,sn asc')->select();

        $this->assign('list',$list);

        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '广告管理';
        $this->display();
    }

    /**
     * 新增
     */
    public function add(){
        //$aid  = I('get.aid',0);
        if(IS_POST){
            $Menu = D('Adv');
            $_POST['addtime'] = time();
            //$_POST['uid'] = is_login();
            //$_POST['is_admin'] = 1;
            if(!$_POST['title'] || !$_POST['path']){
                $this->error('请填写完整');
            }

            $data = $Menu->create();
            if(1){
                //unset($_POST['aid']);
                //print_test($_POST);
                $id = M("Adv")->add($_POST);
                //getLastSql();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_adv', 'adv', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('aid'=>I('aid'),'sn'=>10));
            $type_arr=getAdvType('all');

            $this->assign( array('type_arr'=>$type_arr) );
            $this->meta_title = '新增广告';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $aid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('adv');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_adv', 'adv', $data['aid'], UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $info = M('adv')->where(array('aid'=>$aid,"type"=>array("gt",0)))->find($aid);

            if(false === $info){
                $this->error('获取信息错误');
            }
            $this->assign('info', $info);
            $this->assign( array('type_arr'=>getAdvType('all')) );
            $this->meta_title = '编辑广告';
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

        $map = array('aid' => array('in', $id) );
        if(M('adv')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_adv', 'adv', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }



}
