<?php
//职位管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class JobsController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $title      =   trim(I('get.title'));
        $type = intval($_REQUEST['type']);
        
        if($title){
            //$map['j.zhiwei_mingcheng'] = array('like',"%{$title}%");
            $map['j.zhiwei_mingcheng|m.company_name'] = array('like',"%{$title}%");
        }
            
        
        if($type==1){
            $map['j.tj_index'] = 1;
        }
        
        
        //$list       =   M("Jobs")->where($map)->field(true)->order('jid asc')->select();
        //$_REQUEST['r'] = 2;
        $page = $this->_getPage("Jobs j",$map);
        //print_test($page);
        
        $list = M("Jobs")->table(C('DB_PREFIX')."jobs j")
    		->join("  LEFT JOIN  ".C('DB_PREFIX')."member m on j.uid = m.uid")
    		->join("  LEFT JOIN  ".C('DB_PREFIX')."company c on m.com_id = c.com_id")
    		->where($map)->field("j.*,m.realname,c.company_name,c.company_short_name")->order('j.jid asc')->
        limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign('list',$list);
                
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        $this->assign("type",$type);
        $this->meta_title = '职位管理';
        $this->display();
    }
    
    //推荐
    public function tjJobs(){
        $id = intval($_REQUEST['id']);
        $type = intval($_REQUEST['type']);
        if($id){
            M("Jobs")->where(array("jid"=>$id))->save(array("tj_index"=>$type));
            $this->success("操作成功","/Admin/Jobs/index.html");
        }
        else $this->error("参数无效");
    
    }
    
    
    //推荐排序
    function tuijianSN(){
    
        if(IS_POST){
            if($_POST['sn']){
                foreach ($_POST['sn'] as $kk=>$vv){
                    M("Jobs")->where(array("jid"=>$kk))->save(array("sn"=>intval($vv)));
                }
                $this->success("更新成功","/Admin/Jobs/index.html");
            }
            else $this->error("参数无效");
        }
        else{
            $list = M("Jobs")->where(array("tj_index"=>1))->order("sn asc")->select();
    
        }
    
        $this->assign(array("list"=>$list));
        $this->display("tjsn");
    
    }
    
    /**
     * 查看详情
     */
    public function show($id = 0){
        $jid  = I('get.id',0);
        
        $info = array();
        /* 获取数据 */
        $info = M('Jobs')->field(true)->find($jid);

        if(false === $info){
            $this->error('获取信息错误');
        }
        $this->assign('info', $info);
        $this->meta_title = '查看职位详情';
        $this->display();
        
    }

    /**
     * 新增
     */
    public function add(){
        //$jid  = I('get.jid',0);
        if(IS_POST){
            $Menu = D('Jobs');
            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Jobs', 'Jobs', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('jid'=>I('jid')));
           
            $this->meta_title = '新增职位';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $jid  = I('get.id',0);
        if(IS_POST){
            $Menu = D('Jobs');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Jobs', 'Jobs', $data['jid'], UID);
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
            $info = M('Jobs')->field(true)->find($jid);
            
            if(false === $info){
                $this->error('获取宣传会信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑职位';
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

        $map = array('jid' => array('in', $id) );
        if(M('Jobs')->where($map)->delete()){
            M('jobs_apply')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //记录行为
            action_log('del_Jobs', 'Jobs', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
