<?php
//类别管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class OthercategoryController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $title      =   trim(I('get.title'));
        $type = intval($_REQUEST['type']);
        
        if($title){
            //$map['j.zhiwei_mingcheng'] = array('like',"%{$title}%");
           // $map['j.zhiwei_mingcheng|m.company_name'] = array('like',"%{$title}%");
        }
      
        // $page = $this->_getPage("Othercategory o",$map);
    
        // $list       =   M("Othercategory")->where($map)->field(true)->order('id asc')->
        // limit($page->firstRow.','.$page->listRows)->select();
        
        // $this->assign('list',$list);
                
        // // 记录当前列表页的cookie
        // Cookie('__forward__',$_SERVER['REQUEST_URI']);
        // $this->assign("type",$type);
        // $this->meta_title = '类别管理';
        // $this->display();

        $tree = D('Othercategory')->getTree(0,'id,pid,title,sort,name,status');
        $this->assign('tree', $tree);
        C('_SYS_GET_CATEGORY_TREE_', true); //标记系统获取分类树模板
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        $this->meta_title = '其他类别管理';
        $this->display();
    }
     public function tree($tree = null){
        C('_SYS_GET_CATEGORY_TREE_') || $this->_empty();
        $this->assign('tree', $tree);
        $this->display('tree');
    }

   
    /**
     * 新增
     */
    // public function add(){
    //     // $id  = I('get.id',1);
    //     if(IS_POST){
    //         $Menu = D('Othercategory');
           
    //         $_POST['othercategory'] = trim($_POST['othercategory']);
           
    //         $data = $Menu->create();
    //         if($data){
                
    //             $id = $Menu->add();
    //             if($id){
    //                 // S('DB_CONFIG_DATA',null);
    //                 //记录行为
    //                 action_log('update_Othercategory', 'Othercategory', $id, UID);
    //                 $this->success('新增成功', Cookie('__forward__'));
    //             } else {
    //                 $this->error('新增失败');
    //             }
    //         } else {
    //             $this->error($Menu->getError());
    //         }
    //     } else {
    //         $this->meta_title = '新增类别';
    //         $this->display('edit');
    //     }
    // }

    /* 新增分类 */
    public function add($pid = 0){
        $Othercategory = D('Othercategory');

        if(IS_POST){ //提交表单
            if(false !== $Othercategory->update()){
                $this->success('新增成功！',Cookie('__forward__'));
            } else {
                $error = $Othercategory->getError();
                $this->error(empty($error) ? '未知错误！' : $error);
            }
        } else {
            $cate = array();
            if($pid){
                /* 获取上级分类信息 */
                $cate = $Othercategory->info($pid, 'id,name,sort,title,status');
                if(!($cate && 1 == $cate['status'])){
                    $this->error('指定的上级分类不存在或被禁用！');
                }
            }

            /* 获取分类信息 */
            $this->assign('Othercategory', $cate);
            $this->meta_title = '新增类别';
            $this->display('add');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $id  = I('get.id',0);
        
        if(IS_POST){
            $Menu = D('Othercategory');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                   
                    action_log('update_Othercategory', 'Othercategory', $data['id'], UID);
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
            $info = M('Othercategory')->field(true)->find($id);
            
            if(false === $info){
                $this->error('获取类别信息错误');
            }
            $this->assign('info', $info);
            
            $this->meta_title = '编辑类别';
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

        $map = array('id' => array('in', $id) );
        if(M('Othercategory')->where($map)->delete()){
            M('othercategory_apply')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //记录行为
            action_log('del_Othercategory', 'Othercategory', $id, UID);
            $this->success('删除成功', Cookie('__forward__'));
        } else {
            $this->error('删除失败！');
        }
    }
    
    public function getItem(){
        $id = $_GET['id'];
        $list = M('ocdetail')->where( array('ocid' => $_GET['id']))->select(); 
        $oclist = array();
        $oclist = M('Othercategory')->where( array('id' => $_GET['id']))->select();
         Cookie('__back__',$_SERVER['REQUEST_URI']);
        $this->assign('list',$list);
        $this->assign('oclist',$oclist);
        $this->meta_title = '类别内容管理';
        $this->display();
    }

    public function addItem(){
        // $id  = I('get.id',1);
        $ocid  = I('get.id',1);
        $oclist = M('Othercategory')->where( array('id' => $ocid))->select();
        $this->assign('oclist',$oclist);
        if(IS_POST){
            $Menu = D('Ocdetail');
           
            $_POST['ocdetail'] = trim($_POST['ocdetail']);
           
            $data = $Menu->create();
            if($data){
                
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_ocdetail', 'ocdetail', $id, UID);
                    $this->success('新增成功', Cookie('__back__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->meta_title = '新增类别内容';
            $this->assign('oclist',$oclist);
            $this->display('edititem');
        }
    }

    public function editItem($id = 0){
        $id  = I('get.id',0);
        
        if(IS_POST){
            $Menu = D('ocdetail');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                   
                    action_log('update_ocdetail', 'ocdetail', $data['id'], UID);
                    $this->success('更新成功', Cookie('__back__'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('ocdetail')->field(true)->find($id);
            
            if(false === $info){
                $this->error('获取类别信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑类别内容';
            $this->display();
        }
    }

     /**
     * 删除
     */
    public function delItem(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('ocdetail')->where($map)->delete()){
            M('ocdetail_apply')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //记录行为
            action_log('del_ocdetail', 'ocdetail', $id, UID);
            $this->success('删除成功',Cookie('__back__'));
        } else {
            $this->error('删除失败！');
        }
    }
}
