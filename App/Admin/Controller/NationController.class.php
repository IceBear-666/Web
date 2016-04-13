<?php
//民族管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class NationController extends AdminController {

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
            
        
        // if($type==1){
        //     $map['j.tj_index'] = 1;
        // }
        
        
        //$list       =   M("Jobs")->where($map)->field(true)->order('jid asc')->select();
        //$_REQUEST['r'] = 2;
        $page = $this->_getPage("Nation n",$map);
        //print_test($page);
        
        $list       =   M("Nation")->where($map)->field(true)->order('id asc')->
        limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign('list',$list);
                
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        $this->assign("type",$type);
        $this->meta_title = '民族管理';
        $this->display();
    }
    
   
    /**
     * 新增
     */
    public function add(){
        // $id  = I('get.id',1);
        if(IS_POST){
            $Menu = D('Nation');
           
            $_POST['nation'] = trim($_POST['nation']);
           
            $data = $Menu->create();
            if($data){
                
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Nation', 'Nation', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->meta_title = '新增民族';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $id  = I('get.id',0);
        
        if(IS_POST){
            $Menu = D('Nation');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                   
                    action_log('update_Nation', 'Nation', $data['id'], UID);
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
            $info = M('Nation')->field(true)->find($id);
            
            if(false === $info){
                $this->error('获取民族信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑民族';
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
        if(M('Nation')->where($map)->delete()){
            M('nation_apply')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //记录行为
            action_log('del_Nation', 'Nation', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
