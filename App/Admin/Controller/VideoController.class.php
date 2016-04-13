<?php
//视频管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class VideoController extends AdminController {

    /**
     * 首页
     */
    public function index(){

        $title      =   trim(I('get.title'));

        if($title)
            $map['title'] = array('like',"%{$title}%");
        //$list       =   M("Video")->where($map)->field(true)->order('vid asc')->select();
        //$_REQUEST['r'] = 1;
        $page = $this->_getPage("video",$map);
        $list = M("Video")->table(C('DB_PREFIX')."video v")
        ->join(C('DB_PREFIX')."company c on v.com_id = c.com_id","left")
        ->where($map)->field("v.*,c.*")->order('v.vid desc')->
        limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('list',$list);

        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '宣讲会';
        $this->display();
    }

    /**
     * 新增
     */
    public function add(){
        //$vid  = I('get.vid',0);
        if(IS_POST){
            $Menu = D('Video');
            $_POST['addtime'] = time();
            $_POST['admin_uid'] = is_login();
            
            preg_match('/src=\"(.*?)\"/', $_POST['url'], $matches);
            if($matches){
                if($matches[1]){
                    $_POST['url'] = $matches[1];
                }
            }
            
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
                    $_POST['company']=$company;
                    $_POST['com_id']=0;
                }
            }
            
            //查询所属公司与学校
            if(trim($_POST['school'])){
                $_POST['sid'] = intval($_POST['school']);
                //$_POST['city_id'] = intval($_POST['cid']);
                /* $check = checkRecord("School",array("name"=>$school));
                 if($check){
                 $_POST['schoolname']=$check['name'];
                 $_POST['sid']=$check['sid'];
                 }
                 else{
                 $_POST['schoolname']=$school;
                 $_POST['sid'] = M("School")->add(array("name"=>$school));
                } */
            }
            
            //unset($_POST['company']);
            unset($_POST['school']);
            
            if($_POST['sid']){
                $school = M("school")->where(array("sid"=>$_POST['sid']))->find();
                $_POST['school'] = $school['name'];
            }
            else $_POST['school'] = '';
            
            if(trim($_POST['date_time'])){
                $arr = explode(" ", trim($_POST['date_time']));
                $_POST['date_ymd'] = $arr[0];
                $_POST['date_time'] = $arr[1];
            }

            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Video', 'Video', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            
            $this->assign('info',array('vid'=>I('vid'),'status'=>1,"cid"=>0,"sid"=>0,"type"=>1));
            $this->assign('school_arr',getSchool("json","all"));
            $this->meta_title = '新增宣传会';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $vid  = I('get.id',0);
        if(IS_POST){
            
            preg_match('/src=\"(.*?)\"/', $_POST['url'], $matches);
            if($matches){
                if($matches[1]){
                    $_POST['url'] = $matches[1];
                }
            }
            
            $Menu = D('Video');
            
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
                    $_POST['company']=$company;
                    $_POST['com_id']=0;
                }
            }
            
            //查询所属公司与学校
            if(trim($_POST['school'])){
                $_POST['sid'] = intval($_POST['school']);
                //$_POST['city_id'] = intval($_POST['cid']);
                /* $check = checkRecord("School",array("name"=>$school));
                 if($check){
                 $_POST['schoolname']=$check['name'];
                 $_POST['sid']=$check['sid'];
                 }
                 else{
                 $_POST['schoolname']=$school;
                 $_POST['sid'] = M("School")->add(array("name"=>$school));
                } */
            }
            
            
            unset($_POST['school']);
            
            if($_POST['sid']){
                $school = M("school")->where(array("sid"=>$_POST['sid']))->find();
                $_POST['school'] = $school['name'];
            }
            else $_POST['school'] = '';
            
            if(trim($_POST['date_time'])){
                $arr = explode(" ", trim($_POST['date_time']));
                $_POST['date_ymd'] = $arr[0];
                $_POST['date_time'] = $arr[1];
            }
            
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Video', 'Video', $data['vid'], UID);
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
            $info = M('Video')->field(true)->find($vid);

            if(false === $info){
                $this->error('获取宣传会信息错误');
            }
            $info['date_time'] = $info['date_ymd']." ".$info['date_time'];
            $this->assign('info', $info);
            $this->assign('school_arr',getSchool("json","all"));
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

        $map = array('vid' => array('in', $id) );
        if(M('Video')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('del_Video', 'Video', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}
