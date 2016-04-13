<?php
namespace Home\Controller;
use OT\DataDictionary;
/**
*开放性问题(OQ)
*
*/
class MessageController extends HomeController {
    public function customize(){
		
		
		$Gongkai = M("Gongkai");
        // 按照id排序显示前5条记录
        $arr = $Gongkai->order('id desc')->limit(5)->select();
        $this->arr =   $arr;
        $this->display();
		
		/*$m=M("Gongkai");
        $count      = $m->count();
        $Page       = new \Think\Page($count,20);//
        $show       = $Page->show();//
        $arr = $m->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("arr",$arr);
        $this->assign('page',$show);// 赋值分页输出
        
        $this->display();*/
    }
	/*
	*添加
	*/
    public function send(){
	   $m=M("Gongkai");
        $data = $m->create();
        if($_POST['title'] == '' || $_POST['content'] == ''){
            $this->error("都填写了吗？仔细检查");
        }
        $color = array("#18A689","#1A7BB9","#21B9BB","#F7A54A","#EC4758","#000000");
        $number = rand(0,5);
        $data['color']=$color[$number];
        $data['ip']=$_SERVER["REMOTE_ADDR"];
        $data['ctime']= time();
        $result = $m->add($data);
        if($result>0){
           
            $this->success("成功！");
        }else{
            $this->error("失败！");
			 $this->display();
        }
	  
    }
	
	
		public function edit(){//编辑
		
		$M = D('Gongkai');//数据库实例化
		$id = $_GET['id'];
		$edits = $M->where('id='.$id)->select(); 
		//echo $edits;
		//echo $M->getLastSql();exit;
		foreach($edits as $val)
		{
		  $rs['id'] = $val['id'];//用户id
		  $rs['title'] = $val['title'];
		  $rs['content'] = $val['content'];
		  $editdb[]=$rs;
		  
		}
		$this->assign('editdb',$editdb);//列表传递变量
		$this->display();
	}

	
	/*
	*编辑
	*/
	public function doadd(){    
		
		$m = D('Gongkai');
		if($_POST){
			//$color = array("#18A689","#1A7BB9","#21B9BB","#F7A54A","#EC4758","#000000");
			$data['color']=$_POST['color']	;
			$data['content']=$_POST['content'];
			$data['title']=$_POST['title'];
			$id=$_POST['id'];
			
			$res = $m->where('id='.$id)->save($data);
				
				//var_dump($res);exit;
				//echo $res;
				// echo $m->getLastSql();exit;
			if($res>0){
				  
				
				//$this->success("修改成功！");
				
				$this->redirect('Message/customize','',2,'请登陆 在操作.....');
				
			}else{
				$this->error("修改失败！");
				//$this->success('Message/customize');
				//$this->display();
			}
		}
	}
	
	
	/*
	*删除
	*/

	public function delete(){
		
	
		
		
       // $id = $_POST['id'];
       $id = $_GET['id'];
        $m =M("Gongkai");
        $result = $m->where('id='.$id)->delete();
		//echo $id;
		//echo $m->getLastSql();exit;
		//var_dump($result);
        if($result>0){
            $this->success("成功！");
        }else{
            $this->error("失败！");
        }
    }












}
