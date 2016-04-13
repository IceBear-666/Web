<?php
//地区管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 * @author yangweijie <yangweijiester@gmail.com>
 */
class AreaController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        $pid  = I('get.pid',1);
        if($pid){
            $data = M('Area')->where("aid={$pid}")->field(true)->find();
            $this->assign('data',$data);
        }
        $title      =   trim(I('get.title'));
        $type       =   C('CONFIG_GROUP_LIST');
        //$all   =   M('Area')->getField('*');
        $map['pid'] =   $pid;
        if($title)
            $map['name'] = array('like',"%{$title}%");
        $list       =   M("Area")->where($map)->field(true)->order('aid asc')->select();
        //int_to_string($list,array('hide'=>array(1=>'是',0=>'否'),'is_dev'=>array(1=>'是',0=>'否')));
        if($list) {
            foreach($list as &$key){
                if($key['pid']){
                    //$key['up_name'] = $all[$key['pid']];
                    $key['up_name'] = $data['name'];
                }
            }
            $this->assign('list',$list);
        }
        
        //print_test($list);
        
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->meta_title = '地区列表';
        $this->display();
    }
    
    //缓存
    public function cache(){
    
        $data = $province = $city = $all = $hotcity = $hotcity_other = $area_city = array();
        $list = M("Area")->where(array('type'=>1))->order("sort asc,aid asc")->select();
        foreach ($list as $k=>$v){
    
            $sub = array();//,'status'=>1
            $slist = M("Area")->where(array('pid'=>$v['aid']))->order("sort asc,aid asc")->select();
            foreach ($slist as $kk=>$vv){
                
                if($vv['acid']){
                    $area_city[$vv['acid']][] = array(
                        'aid'=>$vv['aid'],
                        'pid'=>$vv['pid'],
                        'name'=>$vv['name'],
                        'pinyin'=>$vv['pinyin'],
                        'status'=>$vv['status'],
                        'acid'=>$vv['acid'],
                    );
                }
                
                $all[$vv['aid']] = $city[$vv['aid']] = $sub_temp = array(
                    'aid'=>$vv['aid'],
                    'pid'=>$vv['pid'],
                    'name'=>$vv['name'],
                    'status'=>$vv['status'],
                    'type'=>$vv['type'],
                    'pinyin'=>$vv['pinyin'],
                    'first_letter'=>$vv['first_letter'],
                    'short_url'=>$vv['short_url'],
                    'ishot'=>$vv['ishot'],
                    'sort'=>$vv['sort'],
                );
                $sub[$vv['aid']] = $sub_temp;
                
                if($vv['ishot']==1){
                    $hotcity[$vv['aid']] = $sub_temp;
                }
                else if($vv['ishot']==2){
                    $hotcity_other[$vv['aid']] = $sub_temp;
                }
                
            }
            
            $all[$v['aid']] = $province[$v['aid']] = $temp = array(
                'aid'=>$v['aid'],
                'pid'=>$v['pid'],
                'name'=>$v['name'],
                'status'=>$v['status'],
                'type'=>$v['type'],
                'pinyin'=>$v['pinyin'],
                'first_letter'=>$v['first_letter'],
                'short_url'=>$v['short_url'],
                'ishot'=>$v['ishot'],
                'sort'=>$v['sort'],
                //'sub'=>$sub,
            );
    
            $temp['sub'] = $sub;
            $data[$v['aid']] = $temp;
        }
    
        //F("webCategory",$data);
    
        $filename       =   DATA_PATH . 'province_city.php';
        $str='<?php return ' . var_export($data,true) . '; ?>';
        file_put_contents($filename, $str);
        
        $filename       =   DATA_PATH . 'province.php';
        $str='<?php return ' . var_export($province,true) . '; ?>';
        file_put_contents($filename, $str);        
        
        $filename       =   DATA_PATH . 'city.php';
        $str='<?php return ' . var_export($city,true) . '; ?>';
        file_put_contents($filename, $str);
        
        $filename       =   DATA_PATH . 'AllAddress.php';
        $str='<?php return ' . var_export($all,true) . '; ?>';
        file_put_contents($filename, $str);
        
        $filename       =   DATA_PATH . 'hotcity.php';
        $str='<?php return ' . var_export($hotcity,true) . '; ?>';
        file_put_contents($filename, $str);
        
        
        $filename       =   DATA_PATH . 'hotcity_other.php';
        $str='<?php return ' . var_export($hotcity_other,true) . '; ?>';
        file_put_contents($filename, $str);
        
        $filename       =   DATA_PATH . 'area_city.php';
        $str='<?php return ' . var_export($area_city,true) . '; ?>';
        file_put_contents($filename, $str);
    
        $this->success('缓存成功！');
    }

    /**
     * 新增
     * @author yangweijie <yangweijiester@gmail.com>
     */
    public function add(){
        $pid  = I('get.pid',1);
        if(IS_POST){
            $Menu = D('Area');
            $data = $Menu->create();
            if($data){
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_area', 'Area', $id, UID);
                    $this->cache();
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
            $this->assign('info',array('pid'=>I('pid')));
            if($pid>1){
                $map = array('aid'=>$pid);
            }
            else $map = array('pid'=>$pid);
            $menus = M('Area')->where($map)->field(true)->select();
            //$menus = D('Common/Tree')->toFormatTree($menus);
            $menus = array_merge(array(0=>array('aid'=>1,'name'=>'一级地区')), $menus);
            $this->assign('Menus', $menus);
            $this->assign('ac_arr', getChinaArea("all"));
            $this->meta_title = '新增地区';
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $pid  = I('get.pid',1);
        if(IS_POST){
            $Menu = D('Area');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    $this->cache();
                    //记录行为
                    action_log('update_area', 'Area', $data['aid'], UID);
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
            $info = M('Area')->field(true)->find($id);
            if($pid>1){
                $map = array('aid'=>$pid);
            }
            else $map = array('pid'=>$pid);
            
            $menus = M('Area')->where($map)->field(true)->select();
            //$menus = D('Common/Tree')->toFormatTree($menus);

            $menus = array_merge(array(0=>array('aid'=>1,'name'=>'一级地区')), $menus);
            $this->assign('Menus', $menus);
            if(false === $info){
                $this->error('获取地区信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑地区';
            $this->assign('ac_arr', getChinaArea("all"));
            $this->display();
        }
    }

    /**
     * 删除后台菜单
     * @author yangweijie <yangweijiester@gmail.com>
     */
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('aid' => array('in', $id) );
        if(M('Area')->where($map)->delete()){
            $this->cache();
            //记录行为
            action_log('update_area', 'Area', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    /* public function toogleHide($id,$value = 1){
        $this->editRow('Menu', array('hide'=>$value), array('id'=>$id));
    }

    public function toogleDev($id,$value = 1){
        $this->editRow('Menu', array('is_dev'=>$value), array('id'=>$id));
    } */

    
}
