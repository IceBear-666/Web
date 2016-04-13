<?php
//意见反馈

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class ReportController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $page = $this->_getPage("report");
        
        
        $list = M("report")->table(C('DB_PREFIX')."report r")
            ->join("".C('DB_PREFIX')."ucenter_member um on r.uid = um.id","left")
    		->join("".C('DB_PREFIX')."member m on r.uid = m.uid","left")
    		->where($map)->field("um.email,r.rid,r.status,r.addtime,r.reason,r.content,r.toid,m.realname,m.company_name")->order('r.rid asc')->
        limit($page->firstRow.','.$page->listRows)->select();
        
        //print_test(getLastSql());
        
        $this->assign('list',$list);
        $this->assign('page',$page);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '举报';
        $this->display();
    }
    
    /**
     * 查看详情
     */
    public function show($id = 0){
        $rid  = I('get.id',0);
        
        $info = array();
        /* 获取数据 */
        $info = M('report')->field(true)->find($rid);

        if(false === $info){
            $this->error('获取信息错误');
        }
        $this->assign('info', $info);
        $this->meta_title = '查看';
        $this->display();
        
    }

    /**
     * 新增
     */
    public function add(){
        //$rid  = I('get.rid',0);
        if(IS_POST){
            $Menu = D('report');
            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_report', 'report', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('rid'=>I('rid')));
           
            $this->meta_title = '新增职位';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $rid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('report');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_report', 'report', $data['rid'], UID);
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
            $info = M('report')->field(true)->find($rid);
            
            if(false === $info){
                $this->error('获取信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑意见反馈';
            $this->display();
        }
    }
    
    public function deal(){
        $rid  = I('get.id',0);
        if($rid){
            M("Report")->where(array("rid"=>$rid))->save( array("status"=>1) );
        }
        $this->success('操作成功');
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
        if(M('report')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_report', 'report', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
