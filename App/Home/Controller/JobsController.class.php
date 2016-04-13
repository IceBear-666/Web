<?php
//工作  简历
namespace Home\Controller;
//暂时转到首页
redirect("/index.html");

class JobsController extends UserController {

	function __construct(){
		parent::__construct();
		$this->assign("cur_top_nav",array("job"=>'class="current"') );
	}

	//工作首页
    public function zhaopin() {
    	$this->redirect("/Jobs/index");
    }

    //===============功能函数=============================

    //企业职位列表  根据关键词搜索
    function listLs(){
    	$pl = trim($_POST['pl']);

    	/* {"code":0,"success":true,"requestId":null,"msg":null,"resubmitToken":null,"content":{"totalCount":6,"hasNextPage"
    	:false,"pageNo":1,"pageSize":15,"totalPageCount":1,"currentPageNo":1,"hasPreviousPage":false,"result"
    	:["php","php研发","php实习","php.","php2","php高工"],"start":0}} */
    	if($pl){

        	$data = array(
        		"code"=>0,
        		"success"=>true,
        		"msg"=>null,
        		"content"=>array(
        			"totalCount"=>6,
        			"pageSize"=>15,
        			"pageNo"=>1,
        			"hasNextPage"=>false,
        			"totalPageCount"=>1,
        			"currentPageNo"=>1,
        			"hasPreviousPage"=>false,
        			"result"=>array("pm","php","pmo","pr经理","pr主管","pr专员"),
        			"start"=>0,
        		),
        	);

    	}

    	exit(json_encode($data));
    }

    //企业名称列表  根据关键词搜索
    /* function listCompanyLs(){
    	$kd = trim($_POST['kd']);
    	if($kd){

    	}

    	$data = array(
    		// "雷科技",
    	);
    	exit(json_encode($data));
    } */

    //数据获取函数
    function queryTipsNums(){

    	$jsoncallback = $_REQUEST['jsoncallback'];

    	exit($jsoncallback.'({"content":{"data":{"unHandleNum":0,"autoFilterNum":0,"unTreateNum":0},"rows":[]},"message":"操作成功","state":1})');

    }

    //我申请的职位
    function myJobsApply(){
    	$this->checkUser();


    }

    //找工作
    function searchJobs(){
    	$this->checkUser();
    	//$this->redirect('/Jobs/myResume');
    	$this->redirect('/Users/index/type/0');
    }

    //找人
    function searchUsers(){
    	$this->checkUser();
    	$this->redirect('/Users/index/type/1');

    }

    //招聘职位列表
    /*  [kd] => java   公司名称/职位名称
    [spc] => 1  1职位 4公司
    [pl] =>
    [gj] => 3-5年   :
    [xl] => 本科
    [yx] => 10k-15k
    [gx] => 实习
    [st] => 3天内
    [labelWords] =>
    [lc] =>
    [workAddress] =>
    [city] => 成都
    [requestId] =>
    [pn] => 5 */
    function index(){
    	//$this->print_test($_REQUEST);
    	//$this->checkUser();
    	$_REQUEST['listRows'] = 10;
    	$city_list = require_once DATA_PATH.'hotcity.php';
    	$city_list_other = require_once DATA_PATH.'hotcity_other.php';

    	$cuid = intval($_REQUEST['id']);
    	$st = addslashes(trim($_REQUEST['st']));//发布时间


    	$kd = addslashes(trim($_REQUEST['kd']));//关键词
    	$spc = intval($_REQUEST['spc']);//1 职位 2公司  3 宣讲会    //1是职位4是公司
    	$gj = addslashes(trim($_REQUEST['gj']));//工作经验
    	$xl = addslashes(trim($_REQUEST['xl']));//学历
    	$yx = addslashes(trim($_REQUEST['yx']));//月薪
    	$gx = addslashes(trim($_REQUEST['gx']));//工作性质

    	$hy = intval(trim($_REQUEST['hy']));//行业领域
    	$zw = addslashes(trim($_REQUEST['zw']));//职位类别
    	$gs = addslashes(trim($_REQUEST['gs']));//公司性质
    	$px = intval($_REQUEST['px']);//排序  1人气  2时间

    	$pn = addslashes(trim($_REQUEST['pn']));//当前页码
    	$pn = $pn>0?$pn:1;

    	$city = addslashes(trim($_REQUEST['city']));//拼音
    	$city = str_replace(array("不限","全部"), array("",""), $city);

    	$bigid = intval(trim($_REQUEST['bigid']));//行业领域
    	$hyids = '';
    	if(!$hy && $bigid){
    	    $hy = getHangyeSonIds($bigid);
    	    //print_test($hyids);
    	}
    	else $bigid = 0;


    	if($city){
    		$city_name = $city;//getPlaceByPinyin($city);
    	}
    	else {
    		$city_name = $city = '';
    	}
    	$list = $this->getJobsList($city_name,$kd,$cuid,$spc,$gj,$xl,$yx,$gx,$st,$pn,$hy,$zw,$gs,$px);

    	//getLastSql();
    	//print_test($list);

    	$info = $this->getUsersInfoById($this->uid);
    	$array = array(
    			'info'=>$info,
        	    'bigid'=>$bigid,
        	    'hy'=>$hy,
    			'kd'=>$kd,
    	        'zw'=>$zw,
    	        'px'=>$px,
    	        'gs'=>$gs,
    			'spc'=>$spc,
    			'gj'=>$gj,
    			'xl'=>$xl,
    			'yx'=>$yx,
    			'gx'=>$gx,
    			'st'=>$st,
    			'pn'=>$pn,
    			'city_key'=>$kd?"/kd/".$kd:"",
    			'city'=>$city,
    			'city_list'=>$city_list,
    	        'city_list_other'=>$city_list_other,
    			'list'=>$list['list'],
    			'page'=>$list['page'],
    			'currPage'=>$pn,
    			'page_count'=>intval($list['p']->totalPages),
    			'listRows'=>intval($_REQUEST['listRows']),
    	        'totalRows'=>intval($list['p']->totalRows),
    			'gongsi_xingzhi'=>C("GONGSI_XINGZHI"),
    			"hangye_lingyu"=>$this->getCatCache(0),
    	);

    	//print_test($array);

    	$this->assign($array);
    	$this->display();//"list_job"

    }


    function jsonList(){

        $_REQUEST['listRows'] = 10;
        $city_list = require_once DATA_PATH.'hotcity.php';


        //$cuid = intval($_REQUEST['id']);
        $st = addslashes(trim($_REQUEST['st']));//发布时间


        $kd = addslashes(trim($_REQUEST['kd']));//关键词
        $spc = 1;//intval($_REQUEST['spc']);//1 职位 2公司  3 宣讲会    //1是职位4是公司

        /* $gj = addslashes(trim($_REQUEST['gj']));//工作经验
        $xl = addslashes(trim($_REQUEST['xl']));//学历
        $yx = addslashes(trim($_REQUEST['yx']));//月薪
        $gx = addslashes(trim($_REQUEST['gx']));//工作性质

        $hy = intval(trim($_REQUEST['hy']));//行业领域
        $zw = addslashes(trim($_REQUEST['zw']));//职位类别
        $gs = addslashes(trim($_REQUEST['gs']));//公司性质 */

        $px = intval($_REQUEST['px']);//排序  1人气  2时间

        $pn = addslashes(trim($_REQUEST['pn']));//当前页码
        $pn = $pn>0?$pn:1;
        $pn++;

        $city = addslashes(trim($_REQUEST['city']));//拼音
        $city = str_replace(array("不限","全部"), array("",""), $city);

        /* $bigid = intval(trim($_REQUEST['bigid']));//行业领域
        $hyids = '';
        if(!$hy && $bigid){
            $hy = getHangyeSonIds($bigid);
            //print_test($hyids);
        }
        else $bigid = 0; */


        if($city){
            $city_name = $city;//getPlaceByPinyin($city);
        }
        else {
            $city_name = $city = '';
        }
        $list = $this->getJobsList($city_name,$kd,$cuid,$spc,$gj,$xl,$yx,$gx,$st,$pn,$hy,$zw,$gs,$px);

        //getLastSql();
        //print_test($list);

        $info = $this->getUsersInfoById($this->uid);
        $array = array(

            'kd'=>$kd,

            'pn'=>$pn,

            'city'=>$city,
            //'city_list'=>$city_list,
            'list'=>$list['list']?$list['list']:array(),
            //'page'=>$list['page'],
            'currPage'=>$pn,
            'page_count'=>intval($list['p']->totalPages),
            //'listRows'=>intval($_REQUEST['listRows']),
            //'totalRows'=>intval($list['p']->totalRows),
           'success'=>true
        );

        exit(json_encode($array));

    }

    //读取工作列表
    function getJobsList($city='',$pname='',$uid=0,$spc='1',$gj='',$xl='',$yx='',$gx='',$st='',$pn=1,$hy='',$zw='',$gs='',$px=1){

    	$pname = trim($pname);
    	$model = M("Jobs");
    	//$map['status'] = 1;
    	$maps['j.status'] = 1;
    	$maps['m.user_status'] = 1;

    	$xl = str_replace("不限", "", $xl);
    	$gj = str_replace("不限", "", $gj);

    	if($city){
    		//$map['gongzuo_chengshi'] = $city;
    		$maps['j.gongzuo_chengshi'] = $city;
    	}

    	//判断关键词
    	if($pname){
    		/* if($spc==2){//检查公司名称
    			//$map['zhiwei_mingcheng'] = $pname;//公司名称搜索统计数量不准
    			$maps['m.company_name'] = array('like',"%$pname%");
    		}
    		else{//职位名称
    			//$map['zhiwei_mingcheng'] = $pname;
    			$maps['j.zhiwei_mingcheng'] = $pname;
    		} */
    	    $maps['c.company_name|c.company_short_name|j.zhiwei_mingcheng'] =array(array('like','%'.$pname.'%'),array('like','%'.$pname.'%'),array('like','%'.$pname.'%'),'_multi'=>true);

    	}
        //公司性质
    	if($gs){
    	    //$map['zid'] = $gs;
    	    $maps['c.gongsi_xingzhi'] = $gs;
    	}



    	if($uid){
    		//$map['uid'] = $uid;
    		$maps['j.uid'] = $uid;
    	}
    	//工作经验
    	if($gj){
    	    $gj_arr = array();
    	    switch ($gj){
    	        case "应届毕业生":
    	            $gj_arr = array("不限","","应届毕业生");
    	            break;
	            case "1年以下":
	                $gj_arr = array("不限","","应届毕业生","1年以下");
	                break;
                case "1-3年":
                    $gj_arr = array("1-3年");
                    break;
                case "3年以上":
                    $gj_arr = array("3年以上","3-5年","5-10年","10年以上");
                    break;
    	    }
    		//$map['gongzuo_jingyan'] = $gj;
    		$maps['j.gongzuo_jingyan'] = array("in",$gj_arr);
    	}
    	//学历
    	if($xl){
    		//$map['xueli'] = $xl;
    		$maps['j.xueli'] = $xl;
    	}
    	//行业领域
    	if($hy){
    		/* $map['zhiwei_leixing'] = $hy;
    		$maps['j.zhiwei_leixing'] = $hy; */
    	    //$map['cid'] = $hy;
    	    if(!is_array($hy)){
    	        $hy = array($hy);
    	    }
    	    $maps['j.cid'] = array("in",$hy);
    	}
    	//职位类别
    	if($zw){
    	    //$map['zid'] = $zw;
    	    $maps['j.zid'] = $zw;
    	}

    	//月薪
    	if($yx){
    		$yx_str = str_replace("k", "", $yx);
    		$yx_arr = explode("-", $yx_str);
    		if($yx_arr){
    			//$map['yuexin_min'] = array('egt',$yx_arr[0]);
    			$maps['j.yuexin_min'] = array('egt',$yx_arr[0]);
    			//$map['yuexin_max'] = array('elt',$yx_arr[1]);
    			$maps['j.yuexin_max'] = array('elt',$yx_arr[1]);
    		}

    	}
    	//工作性质
    	if($gx){
    		//$map['gongzuo_xingzhi'] = $gx;
    		$maps['j.gongzuo_xingzhi'] = $gx;
    	}
    	//发布时间
    	$start_time = $stop_time = '';
    	$time = time();
    	if($st){
    		switch ($st){
    			case "今天":
    				$start_time = strtotime(date("Y-m-d"));
    				break;
    			case "三天内":
    				$start_time = strtotime(date("Y-m-d"))-2*3600*24;
    				break;
    			case "一周内":
    				$start_time = strtotime(date("Y-m-d"))-6*3600*24;
    				break;
    			case "一个月内":
    				$start_time = strtotime(date("Y-m-d"))-30*3600*24;
    				break;
    		}
    	}
    	if($start_time){
    		$stop_time = $start_time+3600*24;
    		//$map['addtime'] = array('egt',$start_time);
    		$maps['mf.addtime'] = array('lt',$stop_time);
    	}

    	if($pn){
    		$_REQUEST['p'] = $_GET['p'] = $pn;
    	}

    	//$p = $this->_getPage("jobs",$map,'jid');

        $total = $this->getJobsListByCondition($maps,'','',array('only_get_count'=>1) );
    	$p = $this->__getPageByCount($total);
    	//分页显示
    	$page = $p->show();

    	if($px==2){
    	    $orderby = "j.addtime desc,j.update_time desc ";
    	}
    	else $orderby = "j.hits desc";

    	$list = $this->getJobsListByCondition($maps,$p->firstRow . ',' . $p->listRows,$orderby);
    	//print_test($list);getLastSql();
    	return array(
    		'page'=>$page,
    		'list'=>$list,
    		'p'=>$p,
    	);

    }


    //根据条件读取产品
    function getProductsListByCondition($maps='',$limit='0,10',$orderby="addtime desc"){

    	$model = M("Product");

    	$list = $model->where($maps)->field(" * ")->order($orderby)->limit($limit)->select();

    	return $list;

    }

    //工作详情
    function info(){
    	$id = intval($_REQUEST['id']);
    	$uid = $this->uid;
    	$info = array();

    	if($id){
    		$info = M("Jobs")->table(C('DB_PREFIX')."jobs j")
    		->join(C('DB_PREFIX')."ucenter_member um on j.uid = um.id","left")
    		->join(C('DB_PREFIX')."member m on um.id = m.uid","left")
    		->join(C('DB_PREFIX')."company c on m.com_id = c.com_id","left")
    		->where(array('j.jid'=>$id))->field(" j.*,j.addtime as job_addtime,m.*,um.email,um.mobile,c.* ")->find();

    	}
    	else $this->redirect(WEB_URL);

    	if(!$info){
    		$this->redirect(WEB_URL);
    	}

    	$myinfo = $this->getUsersInfoById($uid);
    	if($myinfo){
    	    $myinfo['total_score'] = getResumeScore($myinfo);
    	    $myinfo['is_finish'] = checkUsersFinish($myinfo);
    	    $myinfo['offline_resume'] = M("resume_offline")->where(array('uid'=>$uid))->order("oid desc ")->select();
    	}
    	$maps0 = $maps1 = $maps2 = array();
    	$maps0['j.status'] = 1;
    	$maps0['j.jid'] = array("neq",$info['jid']);
    	$maps1 = $maps2 = $maps0;
    	$maps1['j.zhiwei_mingcheng'] = $info['zhiwei_mingcheng'];
    	$maps2['j.gongzuo_chengshi'] = $info['gongzuo_chengshi'];

    	$same_list = $this->getJobsListByCondition($maps1,"0,5");
    	//$may_list = $this->getJobsListByCondition($maps2,"0,5");

    	//print_test($myinfo);

    	M("Jobs")->where(array('jid'=>$id))->save( array('hits'=>array('exp','hits+1')) );

    	$array = array(
    		'info'=>$info,
    		'myinfo'=>$myinfo,
    		'same_list' =>$same_list,
    		//'may_list' =>$may_list,
    		'gongsi_xingzhi'=>C("GONGSI_XINGZHI"),
    		'my_collect'=>M("collection")->where(array('uid'=>$uid,'toid'=>$id,"type"=>1))->find(),
    	    'my_report'=>M("report")->where(array('uid'=>$uid,'toid'=>$id,"type"=>1))->find(),
    	    'my_apply'=>M("jobs_apply")->where(array('uid'=>$uid,'jid'=>$id))->find(),
    	);
    	$this->assign($array);
    	$this->display();
    }

    //职位预览
    function positionPreview(){

        $this->checkUser();
        $array = array(
    		'info'=>$_POST
    	);
    	$this->assign($array);
    	$this->display();
    }


}
?>