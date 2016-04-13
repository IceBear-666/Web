<?php
//常用设置

namespace Admin\Controller;

/**
 * 后台配置控制器
 * @author yangweijie <yangweijiester@gmail.com>
 */
class SettingController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        exit("ok");
        $pid  = I('get.pid',0);
        if($pid){
            $data = M('Menu')->where("id={$pid}")->field(true)->find();
            $this->assign('data',$data);
        }
        $title      =   trim(I('get.title'));
        $type       =   C('CONFIG_GROUP_LIST');
        $all_menu   =   M('Menu')->getField('id,title');
        $map['pid'] =   $pid;
        if($title)
            $map['title'] = array('like',"%{$title}%");
        $list       =   M("Menu")->where($map)->field(true)->order('sort asc,id asc')->select();
        int_to_string($list,array('hide'=>array(1=>'是',0=>'否'),'is_dev'=>array(1=>'是',0=>'否')));
        if($list) {
            foreach($list as &$key){
                if($key['pid']){
                    $key['up_title'] = $all_menu[$key['pid']];
                }
            }
            $this->assign('list',$list);
        }
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '菜单列表';
        $this->display();
    }
    
    
    //邮件模板
    function emailTpl(){        
        
        $title      =   trim(I('get.title'));
        $type       =   C('CONFIG_GROUP_LIST');
        
        if($title)
            $map['title'] = array('like',"%{$title}%");
        $map['status'] = 1;
        $list       =   M("Email_tpl")->where($map)->field(true)->order('tid asc')->select();
        //int_to_string($list,array('hide'=>array(1=>'是',0=>'否'),'is_dev'=>array(1=>'是',0=>'否')));
        if($list) {
            $this->assign('list',$list);
        }
        
        //print_test($list);
        
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        
        $this->meta_title = '邮件模板管理';
        $this->display();
    }


    /**
     * 编辑模板
     */
    public function editTpl($tid = 0){
        if(IS_POST){
            $Menu = D('Email_tpl');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_email_tpl', 'Email_tpl', $data['tid'], UID);
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
            $info = M('Email_tpl')->field(true)->find($tid);
            
            if(false === $info){
                $this->error('获取Email模板信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑Email模板';
            $this->display();
        }
    }

    
    

    
}
