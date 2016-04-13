<?php
//意见反馈

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class FeedbackController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $title      =   trim(I('get.title'));
        
        if($title)
            $map['title'] = array('like',"%{$title}%");
        //$_REQUEST['r'] = 2;
        $page = $this->_getPage("feedback");
        //print_test($page);
        
        $list = M("feedback")->table(C('DB_PREFIX')."feedback j")
    		->join("  LEFT JOIN  ".C('DB_PREFIX')."member m on j.uid = m.uid")
    		->where($map)->field("j.*,m.realname,m.company_name")->order('j.fid asc')->
        limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign('list',$list);
        $this->assign('page',$page);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '意见反馈';
        $this->display();
    }
    
    /**
     * 查看详情
     */
    public function show($id = 0){
        $fid  = I('get.id',0);
        
        $info = array();
        /* 获取数据 */
        $info = M('feedback')->field(true)->find($fid);

        if(false === $info){
            $this->error('获取信息错误');
        }
        $this->assign('info', $info);
        $this->meta_title = '查看意见反馈';
        $this->display();
        
    }

    /**
     * 新增
     */
    public function add(){
        //$fid  = I('get.fid',0);
        if(IS_POST){
            $Menu = D('feedback');
            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_feedback', 'feedback', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('fid'=>I('fid')));
           
            $this->meta_title = '新增职位';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $fid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('feedback');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_feedback', 'feedback', $data['fid'], UID);
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
            $info = M('feedback')->field(true)->find($fid);
            
            if(false === $info){
                $this->error('获取信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑意见反馈';
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

        $map = array('fid' => array('in', $id) );
        if(M('feedback')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_feedback', 'feedback', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
