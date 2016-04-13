<?php
//日程管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class CalendarController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $title      =   trim(I('get.title'));
        
        if($title)
            $map['c.title'] = array('like',"%{$title}%");
        //$_REQUEST['r'] = 1;
        $page = $this->_getPage("Calendar");
        $list = M("Calendar")->table(C('DB_PREFIX')."Calendar c")
        ->join("  LEFT JOIN  ".C('DB_PREFIX')."member m on c.uid = m.uid")
        ->where($map)->field("c.*,m.realname,m.company_name")->order('c.cid desc')->
        limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$page);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '日程管理';
        $this->display();
    }

    /**
     * 新增菜单
     */
    public function add(){
        //$cid  = I('get.cid',0);
        if(IS_POST){
            $Menu = D('Calendar');
            $_POST['addtime'] = time();
            $_POST['uid'] = is_login();
            $_POST['type'] = 1;
            $_POST['time'] = str_replace("：", ":", $_POST['time']); 
            $data = $Menu->create();
            if($data){
                
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Calendar', 'Calendar', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('cid'=>I('cid'),'status'=>1));
           
            $this->meta_title = '新增宣传会';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $cid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('Calendar');
            $_POST['time'] = str_replace("：", ":", $_POST['time']);
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Calendar', 'Calendar', $data['cid'], UID);
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
            $info = M('Calendar')->field(true)->find($cid);
            
            if(false === $info){
                $this->error('获取宣传会信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑宣传会';
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

        $map = array('cid' => array('in', $id) );
        if(M('Calendar')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_Calendar', 'Calendar', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
