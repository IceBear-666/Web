<?php
//微信菜单管理

namespace Admin\Controller;

use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

/**
 * 后台配置控制器
 */
class WxmenuController extends AdminController {


	public function __construct() {

		parent::__construct();
		
        if(!in_array($_SESSION['wxid'],array('cwxu','bwxu')) ){
            $_SESSION['wxid'] = "cwxu";
        }


	}
	
	public function changeWxid(){
	    if($_REQUEST['wxid']){
	        $_SESSION['wxid'] = $_REQUEST['wxid'];
	    }
	    redirect("/Admin/Wxmenu/index/");
	}

    /**
     * 首页
     */
    public function index(){

        $title      =   trim(I('get.title'));
        $map = array('wxid'=>$_SESSION['wxid']);
        if($title){
            $map['n.title'] = array('like',"%{$title}%");
        }

        //$page = $this->_getPage("wx_menu");

        $list = M("wx_menu")->where($map)->order('sort asc, id desc')->select();

        $this->assign('list',$list);

        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '自定义菜单管理';
        $this->display();
    }
    
    
    /**
     * 发布菜单
     */
    public function send(){    
        
        $map = array('wxid'=>$_SESSION['wxid'],'status'=>1);
        
        $account = getWxConfig($_SESSION['wxid']);
        if(!$account){
            $this->error("参数无效");
        }
        
        $data = array();
        $list = M("wx_menu")->where($map)->order('sort asc, id desc')->select();
        foreach ($list as $k=>$v){
            if($v['pid']) continue;
            if(count($data)>=3){
                break;
            }
            if($v['type']!=1){
                if($v['type']==2){
                    $data[] = array(
                        "type"=>"view",
                        "name"=>$v['title'],
                        "url"=>$v['url'],
                    );
                }
                else{
                    $data[] = array(
                        "type"=>"click",
                        "name"=>$v['title'],
                        "key"=>$v['keyword'],
                    );
                }
                continue;
            }
            
            $sub_button = array();
           
            foreach ($list as $kk=>$vv){
                
                if(count($sub_button)>=5){
                    break;
                }
                
                if($vv['pid']==$v['id']){
                    if($vv['type']==2){
                        $sub_button[] = array(
                            "type"=>"view",
                            "name"=>$vv['title'],
                            "url"=>$vv['url'],
                        );
                    }
                    elseif($vv['type']==3){
                        $sub_button[] = array(
                            "type"=>"click",
                            "name"=>$vv['title'],
                            "key"=>$vv['keyword'],
                        );
                    }
                    else{
                        continue;
                    }
                }
                else{
                    continue;
                }
            }
            
            if($sub_button){
                $data[] = array(
                    'name'=>$v['title'],
                    'sub_button'=>$sub_button,
                );
            }
            
        }
        
        //print_test($data);
    
        $appid = $account['appid']; //AppID(应用ID)
        $apps = $account['apps']; //微信后台填写的TOKEN
        $crypt = $account['aeskey']; //消息加密KEY（EncodingAESKey）
        
        //print_test($apps);
        
        /* 加载微信SDK */
        $wechat = new WechatAuth($appid, $apps);
        $res = $wechat->menuCreate($data);  
        
        if($res['errcode']==0){
            $this->success("菜单发布成功！","/Admin/Wxmenu/index.html");
        }
        else  $this->error($res['errmsg']);
        
        //print_test($res);
    }
    
    

    /**
     * 新增
     */
    public function add(){
        //$nid  = I('get.nid',0);
        if(IS_POST){
            $Menu = D('wx_menu');
            $_POST['addtime'] = time();
            $_POST['uid'] = is_login();
            $_POST['wxid'] = $_SESSION['wxid'];
            if(!$_POST['title']){
                $this->error('请填写完整');
            }

            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_wx_menu', 'wx_menu', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('nid'=>I('nid'),'status'=>1));
            $this->assign( array('type_arr'=>getWxMenuType('all')) );
            $this->assign( array('top_arr'=>M("wx_menu")->where(array("pid"=>0))->select() ) );
            $this->meta_title = '新增菜单';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $nid  = I('get.id',0);
        if(IS_POST){

            $Menu = D('wx_menu');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_wx_menu', 'wx_menu', $data['id'], UID);
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
            $info = M('wx_menu')->field(true)->find($nid);

            if(false === $info){
                $this->error('获取文章信息错误');
            }
            $this->assign('info', $info);
            $this->assign( array('type_arr'=>getWxMenuType('all')) );
            $this->assign( array('top_arr'=>M("wx_menu")->where("pid=0 and id!='$nid' ")->select() ) );
            $this->meta_title = '编辑文章';
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
        
        if(M('wx_menu')->where($map)->delete()){
            
            M('wx_menu')->where(array('pid' => array('in', $id) ))->delete();
            
            action_log('del_wx_menu', 'wx_menu', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}
