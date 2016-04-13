<?php
//民族管理

namespace Admin\Controller;

/**
 * 后台配置控制器
 */
class OlapplicationController extends AdminController {

    /**
     * 首页
     */
    public function index(){
        
        $title      =   trim(I('get.title'));
        $type = intval($_REQUEST['type']);
        
        if($title){
            //$map['j.zhiwei_mingcheng'] = array('like',"%{$title}%");
           // $map['j.zhiwei_mingcheng|m.company_name'] = array('like',"%{$title}%");
        }
            
        $page = $this->_getPage("Olapplication o",$map);
        

        $list = M("Olapplication o")
            ->join("  LEFT JOIN  ".C('DB_PREFIX')."category c on o.cid = c.id")
            ->where($map)->field("o.*,c.title ctitle")->order('o.id asc')->
        limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('list',$list);
       
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        $this->assign("type",$type);
        $this->meta_title = '网申时间表管理';
        $this->display();
    }
    
   
    public function add(){
		
		
        if(IS_POST){
            $Menu = D('Olapplication');
           
            $_POST['Olapplication'] = trim($_POST['Olapplication']);

            $data = $Menu->create();
			
			//echo  $data->getLastSql();exit;
            if($data){
                
                $id = $Menu->add();
					
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Olapplication', 'Olapplication', $id, UID);
					//var_dump($id); exit;	
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
			 $this->assign('info',array('aid'=>I('aid'),'sn'=>10));
            //$type_arr=getAdvType('all');
            $this->meta_title = '新增网申时间';
            $category=get_category_top('all');
            $this->assign('category',$category);
		
            $this->display('edit');
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id = 0){
        $id  = I('get.id',0);
        
        if(IS_POST){
            $Menu = D('Olapplication');
            $data = $Menu->create();
            if($data){
                if($Menu->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                   
                    action_log('update_Olapplication', 'Olapplication', $data['id'], UID);
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
            $info = M('Olapplication')->field(true)->find($id);
            
            if(false === $info){
                $this->error('获取网申时间信息错误');
            }
            $this->assign('info', $info);
            $category=get_category_top('all');
            $this->assign('category',$category);
            $this->meta_title = '编辑网申时间';
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
        if(M('Olapplication')->where($map)->delete()){
            M('Olapplication_apply')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //M('Jobs')->where($map)->delete();
            //记录行为
            action_log('del_Olapplication', 'Olapplication', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
