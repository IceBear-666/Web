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
            
        
        // if($type==1){
        //     $map['j.tj_index'] = 1;
        // }
        
        
        //$list       =   M("Jobs")->where($map)->field(true)->order('jid asc')->select();
        //$_REQUEST['r'] = 2;
        $page = $this->_getPage("Olapplication o",$map);
        //print_test($page);
        
        // $list       =   M("Olapplication")->where($map)->field(true)->order('id asc')->
        // ->join("  LEFT JOIN  ".C('DB_PREFIX')."category c on n.cid = c.id")
        // ->limit($page->firstRow.','.$page->listRows)->select();

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
    
   
    /**
     * 新增
     */
    public function add(){
        // $id  = I('get.id',1);
        //$category[] = M("Category")->where("pid = 0")->field(true)->order('id asc')->select();

        if(IS_POST){
            $Menu = D('Olapplication');
            $_POST['Olapplication'] = trim($_POST['Olapplication']);
            $data = $Menu->create();
			/*if(!$logo=0){
				$logo =$Menu->add();
			}*/
			
			import('ORG.Net.UploadFile');
			//导入上传类
			$upload = new UploadFile();
			//设置上传文件大小
			$upload->maxSize = 3292200;
			//设置上传文件类型
			$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
			//设置附件上传目录
			$upload->savePath = './Uploads/';
			//设置需要生成缩略图，仅对图像文件有效
			$upload->thumb = true;
			// 设置引用图片类库包路径
			$upload->imageClassPath = '@.ORG.Image';
			//设置需要生成缩略图的文件后缀
			$upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
			//设置缩略图最大宽度
			$upload->thumbMaxWidth = '35,35';
			//设置缩略图最大高度
			$upload->thumbMaxHeight = '100,100';
			//设置上传文件规则
			$upload->saveRule = 'uniqid';
			//删除原图
			$upload->thumbRemoveOrigin = true;
			if (!$upload->upload()) {
				//捕获上传异常
				$this->error($upload->getErrorMsg());
			} else {
				//取得成功上传的文件信息
				$uploadList = $upload->getUploadFileInfo();
				echo	$_POST['image'] = $uploadList[0]['savename'];
				
				//获取上传文件的信息
			$inf= $upload->getUploadFileInfo();
				print_r($_POST);
				print_r($data);exit;
			
			
			}
			
            if($data){
                
                $id = $Menu->add();
                if($id){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                    action_log('update_Olapplication', 'Olapplication', $id, UID);
                    $this->success('新增成功', Cookie('__forward__'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        } else {
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
