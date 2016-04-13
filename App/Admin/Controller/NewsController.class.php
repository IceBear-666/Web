<?php
//新闻管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class NewsController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $title      =   trim(I('get.title'));
        $map = array();
        if($title){
            $map['n.title'] = array('like',"%{$title}%");
        }
        
        //$_REQUEST['r'] = 2;
        $page = $this->_getPage("News");
        
        $list = M("News")->table(C('DB_PREFIX')."news n")
    		->join(C('DB_PREFIX')."company c on n.com_id = c.com_id","left")
    		->where($map)->field("n.*,c.*")->order('n.nid desc')->
        limit($page->firstRow.','.$page->listRows)->select();
        
        
        
        $this->assign('list',$list);
                
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '文章管理';
        $this->display();
    }

    /**
     * 新增
     */
    public function add(){
        //$nid  = I('get.nid',0);
        if(IS_POST){
            $Menu = D('News');
            $_POST['addtime'] = time();
            $_POST['uid'] = is_login();
            $_POST['is_admin'] = 1;
            if(!$_POST['title']){
                $this->error('请填写完整');
            }
            //print_test($_FILES);
            //上传文件
            if($_FILES['attach']){
                
            }
            
            
            //查询所属公司
            if(trim($_POST['company'])){                
                $company = trim($_POST['company']);
                if(isNumbers($company)){
                    $check = checkRecord("Company",array("com_id"=>$company));
                }
                else{
                    $check = checkRecord("Company",array("company_name"=>$company));
                }
                if($check){
                    $_POST['company']=$check['company_name'];
                    $_POST['com_id']=$check['com_id'];
                }
                else {
                    $_POST['company']='';
                    $_POST['com_id']=0;
                }
                
            }
            
            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_News', 'News', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('nid'=>I('nid'),'status'=>1));
            $this->assign( array('type_arr'=>getNewsType('all')) );
            $this->meta_title = '新增文章';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $nid  = I('get.id',0);
        if(IS_POST){
            
            //查询所属公司与学校
            if(trim($_POST['company'])){
                $company = trim($_POST['company']);
                if(isNumbers($company)){
                    $check = checkRecord("Company",array("com_id"=>$company));
                }
                else{
                    $check = checkRecord("Company",array("company_name"=>$company));
                }
                if($check){
                    $_POST['company']=$check['company_name'];
                    $_POST['com_id']=$check['com_id'];
                }
                else {
                    $_POST['company']='';
                    $_POST['com_id']=0;
                }
            }
            
            $Menu = D('News');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_News', 'News', $data['nid'], UID);
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
            $info = M('News')->field(true)->find($nid);
            
            if(false === $info){
                $this->error('获取文章信息错误');
            }
            $this->assign('info', $info);
            $this->assign( array('type_arr'=>getNewsType('all')) );
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

        $map = array('nid' => array('in', $id) );
        if(M('News')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_News', 'News', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
