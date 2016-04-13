<?php
//学校地区管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class SchoolController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        /* $cid  = I('get.cid',1);
        if($cid){
            $data = M('School')->where("cid={$cid}")->field(true)->find();
            $this->assign('data',$data);
        }
        $map['cid'] =   $cid; */
    	$title      =   trim(I('get.title'));
    	$type       =   C('CONFIG_GROUP_LIST');
        if($title)
            $map['name'] = array('like',"%{$title}%");
        $list       =   M("School")->where($map)->field(true)->order('`sort` asc ,sid desc')->select();

        if($list) {
            foreach($list as &$key){
                if($key['sid']){

                }
            }

        }

        $this->assign('list',$list);

        //print_test($list);

        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '学校列表';
        $this->display();
    }

    //缓存
    public function cache(){

        $data = $all = $hot = $temp = array();
        $list = M("School")->where(array('status'=>1))->group("cid")->select();
        foreach ($list as $k=>$v){

            $sub = array();//,'status'=>1
            $slist = M("School")->where(array('cid'=>$v['cid']))->order("sort asc,sid asc")->select();
            foreach ($slist as $kk=>$vv){

                $all[$vv['sid']] = $sub_temp = array(
                    'sid'=>$vv['sid'],
                    'cid'=>$vv['cid'],
                    'name'=>$vv['name'],
                    'status'=>$vv['status'],
                    'type'=>$vv['type'],                    
                    'ishot'=>$vv['ishot'],
                    'sort'=>$vv['sort'],
                );

                $sub[$vv['sid']] = $sub_temp;

                if($vv['ishot']){
                    $hot[$vv['sid']] = $sub_temp;
                }

            }

            $data[$v['cid']] = array(
            	'cid'=>$v['cid'],
            	'pid'=>$v['pid'],
            	'name'=>getPlaceById($v['cid']),
            	'sub'=>$sub,
            );

        }

        //F("webCategory",$data);

        $filename       =   DATA_PATH . 'citySchool.php';
        $str='<?php return ' . var_export($data,true) . '; ?>';
        file_put_contents($filename, $str);

        $filename       =   DATA_PATH . 'AllSchool.php';
        $str='<?php return ' . var_export($all,true) . '; ?>';
        file_put_contents($filename, $str);

        $filename       =   DATA_PATH . 'hotSchool.php';
        $str='<?php return ' . var_export($hot,true) . '; ?>';
        file_put_contents($filename, $str);

        $this->success('缓存成功！');
    }

    /**
     * 新增
     */
    public function add(){
        $sid  = I('get.sid',1);
        if(IS_POST){
            $Menu = D('School');
            $_POST['pid'] = intval($_POST['province']);
            $_POST['cid'] = intval($_POST['city']);
            $_POST['name'] = trim($_POST['name']);
            if(!$_POST['pid'] || !$_POST['cid']){
                $this->error("请选择城市");
            }
            if(!$_POST['name']){
                $this->error("请输入完整学校名称");
            }
            $data = $Menu->create();
            if($data){
                
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_School', 'School', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {

            $this->assign('info', array('pid'=>0,"cid"=>0,"status"=>1));
            $this->assign('city_arr',getAddress("json","all"));
          
            $this->meta_title = '新增学校';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $sid  = I('get.sid',1);
        if(IS_POST){
            $Menu = D('School');
            $_POST['pid'] = intval($_POST['province']);
            $_POST['cid'] = intval($_POST['city']);
            $_POST['name'] = trim($_POST['name']);
            if(!$_POST['pid'] || !$_POST['cid']){
                $this->error("请选择城市");
            }
            if(!$_POST['name']){
                $this->error("请输入完整学校名称");
            }
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_School', 'School', $data['sid'], UID);
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
            $info = M('School')->field(true)->find($id);
            if(false === $info){
            	$this->error('获取地区信息错误');
            }

            $this->assign('city_arr',getAddress("json","all"));

            $this->assign('info', $info);
            $this->meta_title = '编辑地区';
            $this->display();
        }
    }

    /**
     * 删除后台菜单
     */
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('sid' => array('in', $id) );
        if(M('School')->where($map)->delete()){

            //记录行为
            action_log('update_School', 'School', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }


}
