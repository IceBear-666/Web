<?php
//宣讲会
namespace Home\Controller;
class VideoController extends JobsController {
	
	function __construct(){
		parent::__construct();
		$this->assign("cur_top_nav",array("video"=>'class="current"') );
	}
	
	//首页
	public function index() {
		
		$_REQUEST['listRows'] = 9;
		
		if($_REQUEST['_URL_'][2]){
			$url_ext = explode("-", $_REQUEST['_URL_'][2]);
		}
		else $url_ext = '';
		
		$hy = intval($_REQUEST['hy']);
		$xz = intval($_REQUEST['xz']);
		$px = intval($_REQUEST['px']);
		$kd = trim($_REQUEST['kd']);
		
		$maps['v.type'] = 1;
		$ext = array('only_get_count'=>1);
		
		if($kd){
		    $maps['v.title'] = array('like',"%$kd%");
		}
		if($hy){
		    $maps['m.hangye_id'] = $hy;
		    $ext['union'] = 1;
		}
		if($xz){
		    $maps['m.gongsi_xingzhi'] = $xz;
		    $ext['union'] = 1;
		}
		
		//$_REQUEST['p'] = $_GET['p'] = 0;	
		$_REQUEST['listRows'] = 6;
		
		
		$total = $this->getVideosListByCondition($maps,'','', $ext);
		$p = $this->__getPageByCount($total);
		//分页显示
		$page = $p->show();
		 
		if($px==1){
		    $orderby = "v.addtime desc ";
		}
		else $orderby = "v.hits desc";
		
		unset($ext['only_get_count']);
		$list = $this->getVideosListByCondition($maps,$p->firstRow . ',' . $p->listRows,$orderby,$ext);
		
		
		//$list = M("Video")->where()->select();
		//getLastSql();
		//print_test($list);
		
		$array = array(
		    'hy'=>$hy,
		    'xz'=>$xz,
		    "px"=>$px,
		    'kd'=>$kd,
		    'page'=>$page,
			'list'=>$list,
		    'gongsi_xingzhi'=>C("GONGSI_XINGZHI"),
		    "hangye_lingyu"=>$this->getCatCache(0),
		);
		
		$this->assign($array);
		$this->display();
	}
	
	
	//宣讲会日程
	public function calendar() {
	
	    $_REQUEST['listRows'] = 10;
	
	    /* if($_REQUEST['_URL_'][2]){
	        $url_ext = explode("-", $_REQUEST['_URL_'][2]);
	    }
	    else $url_ext = ''; */
	
	    //$list = M("Video")->where()->select();
	
	    $company_list = $this->getGongsiList('','','','',"m.hits desc",1,"0,5");
	    
	    $pn = addslashes(trim($_REQUEST['pn']));//当前页码
	    $pn = $pn>0?$pn:1;
	   
	    
	    $sid = intval($_REQUEST['sid']);	    
	    $keyword = trim($_REQUEST['keyword']);
	    
	    $maps['v.type'] = 2;
	    $ext = array('only_get_count'=>1);
	    
	    if($keyword){
	        //$maps['v.title'] = array('like',"%$keyword%");
	        $maps['company|school'] =array(array('like','%'.$keyword.'%'),array('like','%'.$keyword.'%'),'_multi'=>true);
	    }
	    if($sid){
	        $maps['v.sid'] = $sid;
	        $ext['union'] = 0;
	    }
	    
	    $maps['v.date_ymd'] = array("gt",date("Y-m-d"));
	    
	    $total = $this->getVideosListByCondition($maps,'','', $ext);
	    $p = $this->__getPageByCount($total);
	    //分页显示
	    $page = $p->show();
	    	
	    $orderby = "v.date_ymd asc,v.date_time asc ";
	    
	    /* if($px==1){
	        
	    }
	    else $orderby = "v.hits desc"; */
	    
	    unset($ext['only_get_count']);
	    $list = $this->getVideosListByCondition($maps,$p->firstRow . ',' . $p->listRows,$orderby,$ext);
	    
	    
	    //$list = M("Video")->where()->select();
	    //getLastSql();
	    //print_test($list);
	    
	    $area_citys = getAreaCitys();
	    
	    $array = array(
	        'sid'=>$sid,
	        'cids'=>getMyCollectionsIds($this->uid,3),
	        'keyword'=>$keyword,
	        'pn'=>$pn,
	        'list'=>$list,
	        'company_list' => $company_list,
	        'page'=>$page,
	        'currPage'=>$pn,
	        'page_count'=>intval($p->totalPages),
	        'listRows'=>intval($_REQUEST['listRows']),
	        'totalRows'=>intval($p->totalRows),
	        'area_citys'=>$area_citys,
	        'school_arr'=>getSchool(),
	    );
	    
	    $this->assign($array);
	    
	    $this->display("calendar");
	}
	
	//公司详情
    public function info() {
    	
    	$id = intval($_REQUEST['id']);
    	
    	if(!$id){
    	    $this->error("请勿非法访问。","/");
    	}
    	
    	$info = M("Video")->where(array('vid'=>$id,"type"=>1))->find();
    	
    	if(!$info){
    	    $this->error("该宣讲会不存在或已删除。","/Video");
    	}
    	
    	M("Video")->where(array('vid'=>$id))->save(array("hits"=>array("exp","hits+1")));
    	
    	$the_same = $company = $maps = array();
    	$orderby = "v.addtime desc ";
    	
    	if($info['com_id']){
    	    $company = M("Company")->where(array('com_id'=>$info['com_id']))->find();
    	    $maps = array(
    	        'v.type'=> 1,
    	        'v.com_id'=> $info['com_id'],
    	        'v.vid'=> array("neq",$info['vid']),
    	    );
    	    $the_same = $this->getVideosListByCondition($maps,'0,10',$orderby);
    	}
    	else{
    	    
    	}
    	
    	if(!$the_same){
    	    $maps = array(
    	        'v.type'=> 1,
    	        'v.vid'=> array("neq",$info['vid']),
    	    );
    	    $the_same = $this->getVideosListByCondition($maps,'0,10',$orderby);
    	}    	 
    	    	
    	$_REQUEST['r'] = 5;
    	$arr = $this->getVideoReviewList($id);
    	
    	$array = array(
    		'info'=>$info,
    	    'company'=>$company,
    	    "the_same"=>$the_same,
    	    "view_list"=>$arr['list'],
    	    "page"=>$arr['page'],
    	);
    	$this->assign($array);
    	$this->display();
			
    }
    
    //添加评论
    function addReview(){
        $uid = is_login();
        if(!$uid){
            $this->error("请先登录");
        }
        $content = trim($_POST['content']);
        $vid = intval($_POST['vid']);
        if(!$content){
            $this->error("请填写内容");
        }
        $data = array(
            'uid'=>$uid,
            'addtime'=>time(),
            "ip"=>get_client_ip(0),
            'content'=>$content,
            'vid'=>$vid,
            'niming'=>0,
        );
        M("video_review")->add($data);
        $this->success("发布成功。");
        
    }
    
    
}
?>