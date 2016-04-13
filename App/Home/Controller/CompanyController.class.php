<?php
//公司
namespace Home\Controller;
class CompanyController extends UserController {

	function __construct(){
		parent::__construct();
		$this->assign("cur_top_nav",array("company"=>'current-c') );
	}

	Public function archive(){
	    $year    = $_GET["_URL_"];
	    print_r($_GET["_URL_"]);
	}

    //功能介绍
    public function companylist(){
        $this->checkUser();
		$uid = $this->uid;
    
        $this->title  =  '网申时间表 - 实习'; 
		//$page = $this->_getPage("Olapplication o",$map);
        $info = M("Olapplication o")
            ->join("  LEFT JOIN  ".C('DB_PREFIX')."category c on o.cid = c.id")
            ->where("o.position='2'")->field("o.*,c.title ctitle")->order('o.id asc')->select();

        $collet_list =  M("keep k")
        ->join("  LEFT JOIN  ".C('DB_PREFIX')."olapplication o on o.id = k.cid")
        ->where("k.uid='$uid'")->field("o.id cid,k.id kid,k.cid keepcid")->order('o.id asc')->select();
   
		$user_companycat =  M("user_companycat")->where(array("uid"=>$uid) )->order('id asc')->select();
		 
        $this->assign('info',$info);
        $this->assign('user_cat',$user_companycat);
        $this->assign('collet_list',$collet_list);
		
        $this->display();
    }
	    public function fulltimecompanylist(){
        $this->checkUser();
        $uid = $this->uid;
    
        $this->title  =  '网申时间表 - 全职'; 
        //$page = $this->_getPage("Olapplication o",$map);
        $info = M("Olapplication o")
            ->join("  LEFT JOIN  ".C('DB_PREFIX')."category c on o.cid = c.id")
            ->where("o.position='3'")->field("o.*,c.title ctitle")->order('o.id asc')->select();

        $collet_list =  M("keep k")
        ->join("  LEFT JOIN  ".C('DB_PREFIX')."olapplication o on o.id = k.cid")
        ->where("k.uid='$uid'")->field("o.id cid,k.id kid,k.cid keepcid")->order('o.id asc')->select();
        
        $user_companycat =  M("user_companycat")->where(array("uid"=>$uid) )->order('id asc')->select();
         
        $this->assign('info',$info);
        $this->assign('user_cat',$user_companycat);
        $this->assign('collet_list',$collet_list);
        
        $this->display();
    }
    /**
    * 收藏
    */
	public function keep() {		
		$cid =$_POST['cid'];
		$uid = $_SESSION['ot_home']['user_auth']['uid'];
		$db = M('Keep');
		 
		//检测用户是否已经收藏该
		$where = array('cid' => $cid, 'uid' => $uid);
		
		if ($db->where($where)->getField('id')) {
			echo -1;
			exit();
		}

		//添加收藏
		$data['uid'] = $uid;
		$data['time'] = $_SERVER['REQUEST_TIME'];
		$data['cid'] = $cid;

		if ($id = $db->add($data)) {
           
			//收藏成功时对该内容的收藏数+1
			//M('Olapplication')->where(array('id' => $cid))->setInc('keep');
			echo $id;
		} else {
			echo 0;
		}
	}
	Public function cancelKeep () {

        $kid =$_POST['kid'];
        if($_POST['kid']){
            $kid = intval($_POST['kid']);
            if($kid){
                M("Keep")->where(array('id'=>$kid))->delete();
                if ($kid) {
                    echo 1;
                }
                
            } else {
                echo 0;
            }
        }
    }
    Public function userCompanyCat () {
        $uid = $this->uid;
        $db = M('user_companycat');
        $company_cat =$_POST['company_cat'];

        $catnum = count($company_cat);
        $db->where(array('uid'=>$uid))->delete();
        if ($company_cat) {
           for ($i=0; $i < $catnum; $i++) { 
                $data["uid"] = $uid;
                $data["cid"] = $company_cat[$i];
                $db->add($data);  
            }
            echo 1;
        }else{
            echo 0;
        }
        
    }

	 
	//首页
	public function index() {
        //暂时转到首页
        redirect("/index.html");

		$_REQUEST['listRows'] = $_REQUEST['r'] = 9;
		$url_ext = '';
		if($_REQUEST['_URL_'][2]){
			$url_ext = explode("-", $_REQUEST['_URL_'][2]);
		}
		else if($_SERVER['PATH_INFO']){
		    $temp = explode("/", $_SERVER['PATH_INFO']);
		    $temp = end($temp);
		    if(strpos($temp, "-")!==false){
		        $url_ext = explode("-", $temp);
		    }
		}

		$kd =  '';
		$ct = $hy = $xz = $order = $bigid = 0;
		if($url_ext){
			$ct = $url_ext[0];
			$xz = $url_ext[1];
			$hy2 = $hy = $url_ext[2];
			$order = $url_ext[3];
			$bigid = $url_ext[4];

			$hyids = '';
			if($hy){
			    $bigid = 0;
			}
			if(!$hy && $bigid){
			    //$hy = getHangyeSonIds($bigid);
			    $hy2 = $bigid;
			}
			else {
			    $hy2 = $hy;
			}
			//else $bigid = 0;

		}
		$city_list = require_once DATA_PATH.'hotcity.php';

		$kd = addslashes(trim($_REQUEST['kd']));

		if($_REQUEST['order']){
		    $order = intval($_REQUEST['order']);
		}
		if($order){
			$orderby = "c.update_time desc";
		}
		else $orderby = "c.hits desc";

		$list = $this->getGongsiList($ct,$xz,$hy2,$kd,$orderby,0,'',100);


		$list_new = array();
		foreach ($list['list'] as $k=>$v){
			$tag_arr = explode(",",$v['tags']);
			$v['tags_arr'] = $tag_arr;
			$maps = array(
				'j.status'=>1,
				'j.com_id'=>$v['com_id'],
			);
			$v['jobs_arr'] = $this->getJobsListByCondition($maps,"0,5");
			if(!$v['company_short_name']){
			    $v['company_short_name'] = $v['company_name'];
			}
			$list_new[] = $v;
		}

		//$this->print_test($list_new);

		$pn = intval($_REQUEST['p']);
		$pn = $pn>0?$pn:1;

		//print_test($list_new);
		//$all_str = str_split($all_count);

		$array = array(
			'ct'=>$ct,
			'xz'=>$xz,
			'hy'=>$hy,
		    'bigid'=>$bigid,
			'kd'=>$kd,
			'order'=>$order,
			'gongsi_xingzhi'=>C("GONGSI_XINGZHI"),
			"hangye_lingyu"=>$this->getCatCache(0),
			'city_list'=>$city_list,
			'list'=>$list_new,
			'page'=>$list['page'],
			'currPage'=>$pn,
			'page_count'=>$_REQUEST['r'],//$list['p']->totalPages,
			'listRows'=>$_REQUEST['listRows'],

			'c_menu'=>array('company'=>'class="current"'),
		);

		//print_test($array);

		$this->assign($array);
		$this->display();
	}
	
	
	//列表
	public function jsonList() {

        //暂时转到首页
        redirect("/index.html");
	
	    $_REQUEST['listRows'] = $_REQUEST['r'] = 10;	    
	
	    $url_ext = '';
	    if($_REQUEST['_URL_'][2]){
	        $url_ext = explode("-", $_REQUEST['_URL_'][2]);
	    }
	    else if($_SERVER['PATH_INFO']){
	        $temp = explode("/", $_SERVER['PATH_INFO']);
	        $temp = end($temp);
	        if(strpos($temp, "-")!==false){
	            $url_ext = explode("-", $temp);
	        }
	    }
	    
	    $kd =  '';
	    $ct = $hy = $xz = $order = $bigid = 0;
	    if($url_ext){
	        $ct = $url_ext[0];
	        $xz = $url_ext[1];
	        $hy = $url_ext[2];
	        $order = $url_ext[3];
	        $bigid = $url_ext[4];
	    
	        $hyids = '';
	        if($hy){
	            $bigid = 0;
	        }
	        if(!$hy && $bigid){
	            //$hy = getHangyeSonIds($bigid);
	            $hy2 = $bigid;
	        }
	        else {
	            $hy2 = $hy;
	        }
	        //else $bigid = 0;
	    
	    }
	    	    
	    $city_list = require_once DATA_PATH.'hotcity.php';
	
	    $kd = addslashes(trim($_REQUEST['kd']));
	
	    if($order){
	        $orderby = "c.update_time desc";
	    }
	    else $orderby = "c.hits desc";
	    
	    if(!$ct){
	        $ct = intval($_REQUEST['city']);
	    }
	       $_GET['p'] = $_REQUEST['p'];
	    $list = $this->getGongsiList($ct,$xz,$hy2,$kd,$orderby,0,'',100);

	    //echo M()->getLastSql();exit;

	    $list_new = array();
	    foreach ($list['list'] as $k=>$v){
	        $v['jobs_count'] = getCompanyJobsNum($v['com_id']);
	        $list_new[] = $v;
	    }
	
	    $pn = intval($_REQUEST['p']);
	    $pn = $pn>0?$pn:1;
	
	    $array = array(
	        'city'=>$ct,
	        'ct'=>$ct,
	        'pn'=>$pn,
	        'kd'=>$kd,
	        'order'=>$order,
	        'success'=>true,
	        'list'=>$list_new,
	        
	        'page_count'=>intval($list['p']->totalPages),
	    );
	
	    exit(json_encode($array));
	}

	//公司详情
    public function info() {
        //暂时转到首页
        redirect("/index.html");

    	$id = intval($_REQUEST['id']);
    	$uid = $this->uid;
    	$info = array();

    	if(!$id) {
    		if($uid){
    			$this->redirect(WEB_URL."Company/cinfo");
    		}
    		else{
    			$this->error("请勿非法访问！",WEB_URL."Company");
    		}
    	}
    	/* else if($uid && $uid==$id){
    	    $this->redirect(WEB_URL."Company/cinfo");
    	} */
    	else{
    		$info = getUsersInfo( array("m.uid"=>$id,'m.type'=>1) );
    		if(!$info){
    		    $info = getUsersInfo( array("m.com_id"=>$id,'m.type'=>1) );
    		}
    	}
    	
    	/* if($uid && $uid==$id){
    	    $this->redirect(WEB_URL."Company/cinfo");
    	} */

    	if(!$info){
    		$this->error("参数无效，请勿非法访问！",WEB_URL."Company");
    	}

    	if($uid){
    		$myinfo = $this->getUsersInfoById($uid);
    	}
    	else $myinfo = array();

    	$map = array();
    	$map['j.status'] = 1;
    	//$map['j.type'] = 1;
    	$map['j.com_id'] = $info['com_id'];//array("neq",$info['uid']);
    	$jobs = $this->getJobsListByCondition($map,"0,50");

    	$start_time = time()-3600*60*24;

    	$maps = array('status'=>1,'uid'=>$id);///,'addtime'=>array("gt",$start_time)
    	$jobs_count = M("Jobs")->where($maps)->count();

    	//$products = $this->getProductsListByCondition($maps,"0,1000");
    	//$products = unserialize($info['products']);
    	//$leads = unserialize($info['leads']);
    	//$news = M("News")->where(array('uid'=>$id,'status'=>1,'type'=>-1))->select();

    	//公司访问量+1
    	if($id && $id!=$uid ){
    		updateCompanyHits($id);
    	}

        $com_id = $info['com_id'];
        
    	$array = array(
    		'info'=>$info,
    		'myinfo'=>$myinfo,
    		'joblist' =>$jobs,
    		'jobs_count'=>$jobs_count,
    	    'cids'=>getMyCollectionsIds($this->uid,2),
    	    'vcids'=>getMyCollectionsIds($this->uid,3),
    	);
    	$this->assign($array);

    	//$this->assign("leads",M("company_leads")->where(array("uid"=>$id))->select() );
    	//$this->assign("articles",M("company_articles")->where(array("uid"=>$id))->select() );

    	$this->assign("c_menu",array("company"=>'class="current"'));
    	$this->assign('myinfo',$myinfo);
    	$this->assign("cs_email",C("EMAIL_ADDRESS"));
    	//$joblist = $this->getJobsListByCondition(array('j.uid'=>$id),"0,100");
    	//$this->assign("joblist",$joblist );
    	$hangye = $this->getCatCache(0);
    	$this->assign("hangye_lingyu",$hangye );
    	$this->assign('gongsi_xingzhi',C("GONGSI_XINGZHI") );
    	$this->assign("leads",M("company_leads")->where(array("com_id"=>$com_id))->select() );
    	$this->assign("articles",M("company_articles")->where(array("com_id"=>$com_id))->select() );
    	$this->assign("photos",M("company_photo")->where(array("com_id"=>$com_id))->select() );
    	$this->assign("video",M("company_video")->where(array("com_id"=>$com_id))->find() );
    	$this->assign("xjh_video",M("video")->where(array("com_id"=>$com_id,"type"=>1))->select() );
    	$this->assign("xjh_word",M("video")->where(array("com_id"=>$com_id,"type"=>2))->select() );
    	$this->assign("qzmj",M("news")->where(array("com_id"=>$com_id,"type"=>3))->select() );
    	$this->display();

    }

    //申请认证
    public function auth() {

    	$this->checkUser();

    	$myinfo = $this->getUsersInfoById($this->uid);

    	if($myinfo['isv']==1){
    	    $this->error("您已经提交过申请，请耐心等待","/Company/cinfo");
    	}
    	else if($myinfo['isv']==2){
    	    $this->success("您已经通过认证了，无需重复提交","/Company/cinfo");
    	}

    	$array = array(
    		'myinfo'=>$myinfo,
    	);
    	$this->assign($array);
    	$this->display();
    }

    //提交成功
    function authSuccess(){

        $this->checkUser();

    	$myinfo = $this->getUsersInfoById($this->uid);

    	if($myinfo['isv']==1){
    	    $this->error("您已经提交过申请，请耐心等待","/Company/cinfo");
    	}
    	else if($myinfo['isv']==2){
    	    $this->success("您已经通过认证了，无需重复提交","/Company/cinfo");
    	}

    	$array = array(
    		'myinfo'=>$myinfo,
    	);
    	$this->assign($array);
    	$this->display();

    }

    //检查公司名称
    function companySearch(){

        if(!$this->uid){
            $this->error("请先登录");
        }

        $name = addslashes(trim($_REQUEST['kd']));
        $check = $this->checkCompanyName($name);
        if( !$name || $check ){
            $this->error("请公司名已存在，请输入正确的公司名称。");
        }
        else $this->success("操作成功");
    }

    //检查类似公司列表
    function searchCompanyLs(){

        if(!$this->uid){
            $this->error("请先登录");
        }

        $name = addslashes(trim($_REQUEST['kd']));
        //kd ： ["it桔子","itqun","itc","itv","italki","it时代"]
        $arr = array();

        exit(json_encode($arr));
    }

    //========================= 开启招聘服务=================================================

    //开启招聘服务
    function openZhaopin(){

        $this->checkUser();
        $uid = $this->uid;
        $step = intval($_REQUEST['step']);
        if(!in_array($step, array(1,2,3))){
            $step = 1;
        }

        $myinfo = $this->getUsersInfoById($uid);
        if( !$myinfo ){
            $this->error("请先登录",WEB_URL."User/login");
        }

        if(IS_POST){
            $save = array();
            switch ($step){

                case 1:
                    $email = trim($_POST['email']);
                    if($email==$this->email){
                        $this->error("接收简历邮箱与注册邮箱不能是同一个");
                    }

                    if($email){
                        if(!isEmail($email)){
                            $this->error("邮箱地址有误");
                        }
                    }

                    $phone = trim($_POST['phone']);
                    if(!$phone){
                        $this->error("请输入联系电话");
                    }
                    elseif( !isPhone($phone) && !isMobile($phone) ){
                        $this->error("电话格式不对");
                    }
                    $save = array('email_jianli'=>$email,'phone'=>$phone);
                    break;

                /* case 21:
                    $company_name = trim($_POST['company_name']);
                    if(!$company_name || strlen($company_name)<8 ){
                        $this->error("请输入正确的公司名称");
                    }
                    if($this->checkCompanyName($company_name)){
                        $this->error("该公司已存在，请更换。");
                    }
                    $save = array('company_name'=>$company_name);
                    break; */
                case 2:
                    $company_name = trim($_POST['company_name']);
                    if(!$company_name || strlen($company_name)<8 ){
                        $this->error("请输入正确的公司名称");
                    }
                    /* if($this->checkCompanyName($company_name)){
                        $this->error("该公司已存在，请更换。");
                    } */
                    $save = array('company_name'=>$company_name);
                    break;

               default:
                   $this->error("访问超时，请刷新页面重试");
                   break;
            }

            if($save){
                
                if($step==2){
                    
                    //$same_company = checkTheSameCompanyReg($myinfo['email'],$this->uid);
                    $same_company = checkCompanyName($company_name,$uid);
                    if($same_company){
                        //M("company")->add(array("com_id"=>$uid,"cuid"=>$uid));
                        $save['com_id'] = $same_company['com_id'];
                        M("member")->where(array("uid"=>$uid))->save($save);
                    }
                    else{                    
                        M("company")->add(array("com_id"=>$uid,"cuid"=>$uid,"company_name"=>$company_name)); 
                        $save['com_id'] = $uid;
                        M("member")->where(array("uid"=>$uid))->save($save);                    
                    }
                    
                    $this->sendActiveEmail($uid, $myinfo['email']);
                }
                else {
                    M("member")->where(array("uid"=>$uid))->save($save);
                }
                $this->success("更新成功！");
            }

        }
        
        //检查同一企业邮箱是否被注册过
        $same_company = array();
        if($step==2){
            $same_company = checkTheSameCompanyReg($myinfo['email'],$this->uid);
            //print_test($same_company);
        }
        $this->assign("same_company",$same_company);
        $this->assign("myinfo",$myinfo);
        $this->assign("show_nav",0);
        $this->display("step".$step);

    }


    //================================企业资料完善======================================

    //公司信息补充1
    function cinfo(){

        $uid = $this->uid;

        $this->checkUser();

        $myinfo = $this->getUsersInfoById($uid);

        //print_test($myinfo);

        if( !$myinfo['type'] ){
            $this->redirect(WEB_URL."User/");
            exit;
        }
        else if( $myinfo['status']<2 ){
            $this->redirect(WEB_URL."Company/openZhaopin");
            exit;
        }

        /*if(!$myinfo['logo']){
            $myinfo['logo'] = "/Public/Home/images/default_logo.png";
        }*/

        $this->assign("c_menu",array("company"=>'class="current"'));
        $this->assign('myinfo',$myinfo);
        $this->assign("cs_email",C("EMAIL_ADDRESS"));
        $joblist = $this->getJobsListByCondition(array('j.uid'=>$this->uid),"0,100");
        $this->assign("joblist",$joblist );
        $hangye = $this->getCatCache(0);
        $this->assign("hangye_lingyu",$hangye );
        $this->assign('gongsi_xingzhi',C("GONGSI_XINGZHI") );
        
        $com_id = $myinfo['com_id'];
        $this->assign("leads",M("company_leads")->where(array("com_id"=>$com_id))->select() );
        $this->assign("articles",M("company_articles")->where(array("com_id"=>$com_id))->select() );
        $this->assign("photos",M("company_photo")->where(array("com_id"=>$com_id))->select() );
        $this->assign("video",M("company_video")->where(array("com_id"=>$com_id))->find() );

        $this->assign("xjh_video",M("video")->where(array("com_id"=>$com_id,"type"=>1))->select() );
        $this->assign("xjh_word",M("video")->where(array("com_id"=>$com_id,"type"=>2))->select() );

        $this->display();

    }

    //获取公司福利
    function changeLabels(){
        $pageNo = intval($_POST['pageNo']);
        $pageNo = $pageNo<1?1:$pageNo;
        $pageNo = $pageNo%2?1:2;
        $pageSize = intval($_POST['pageSize']);
        $pageSize = $pageSize<1?12:$pageSize;

        $list = array(
            1=>'"五险一金","免费班车","岗位晋升","帅哥多","年度旅游","弹性工作","扁平管理","技能培训","管理规范","美女多","节日礼物","领导好"',
            2=>'"专项奖金","交通补助","午餐补助","定期体检","带薪年假","年底双薪","年终分红","绩效奖金","股票期权","通讯津贴"',
        );

        exit('{"code":0,"success":true,"requestId":null,"msg":null,"resubmitToken":null,"content":['.$list[$pageNo].']}');

    }

    //设置公司基本信息
    function saveProfile(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->ResumeJson(0,"请先登录。");
        }
        elseif (!$myinfo['type'] ){//|| $myinfo['status']!=2
            $this->ResumeJson(0,"访问超时，请刷新页面再试。");
        }

        if($_POST['companyId']){
            $city = trim($_POST['city']);
            $companyFeatures = trim($_POST['companyFeatures']);
            $companyShortName = trim($_POST['companyShortName']);

            //$companyName = trim($_POST['companyName']);
            $companySize = trim($_POST['companySize']);
            $companyUrl = trim($_POST['companyUrl']);

            $financeStage = trim($_POST['financeStage']);
            //$industryField = trim($_POST['industryField']);
            $select_category = trim($_POST['select_category']);
            $select_category = str_replace("请选择行业领域", "", $select_category);
            $logo = trim($_POST['logo']);
            $stages = trim($_POST['stages']);

            $gongsi_xingzhi = intval($_REQUEST['gongsi_xingzhi']);
            //$hangye_id = intval($_REQUEST['hangye_id']);

            $positionType = intval($_REQUEST['positionType']);

            if(!$companyShortName || !$city || !$companySize || !$companyUrl || !$select_category){
                $this->ResumeJson(0,"请填写完整","company_info");
            }
            $data = array(
                'company_city'=>$city,
                'descri'=>$companyFeatures,
                'company_short_name'=>$companyShortName,
                'guimu'=>$companySize,
                'web_url'=>$companyUrl,
                'gongsi_xingzhi'=>$gongsi_xingzhi,
                'hangye'=>$select_category,
                'update_time'=>time(),
                'hangye_id'=>$positionType,
            );
            M("company")->where(array('com_id'=>$myinfo['com_id']))->save($data);

            checkCompanyStatus($this->uid);

            $this->ResumeJson(1,"公司简称和公司特色保存成功","company_info");

        }

    }


    //保存图像
    function savePhotos(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->error("请先登录。");
        }
        elseif (!$myinfo['type'] ){
            $this->error("访问超时，请刷新页面再试。");
        }

        if($_POST['cphotos']){
            $count = M("company_photo")->where(array('com_id'=>$myinfo['com_id']))->count();
            if($count>=20){
                $this->error("照片不能超过20张");
            }

            $cphotos = explode("|", $_POST['cphotos']);
            foreach ($cphotos as $k=>$v){
                if(!trim($v)) continue;
                $save = array(
                    'com_id'=>$myinfo['com_id'],
                    'url'=>$v,
                    'addtime'=>time(),
                );
                M("company_photo")->add($save,'',1);
                $count++;
                if($count>=20){
                    break;
                }
            }

            $this->success("保存成功");

        }
        else $this->error("请选择要上传的图片");

    }

    //删除照片
    function delPhotos(){
        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->error("请先登录。");
        }
        elseif (!$myinfo['type'] ){
            $this->error("访问超时，请刷新页面再试。");
        }

        if($_POST['id']){
            $pid = intval($_POST['id']);
            $rs = M("company_photo")->where(array('pid'=>$pid,"com_id"=>$myinfo['com_id']))->delete();
            if($rs){
                $this->success("删除成功！");
            }
            else $this->error("删除失败，请刷新页面再试。");
        }
        else $this->error("参数无效，请刷新页面再试。");
    }

    //保存视频
    function saveVideos(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->error("请先登录。");
        }
        elseif (!$myinfo['type'] ){
            $this->error("访问超时，请刷新页面再试。");
        }
        $video_from = trim($_POST['video_from']);
        /* if($video_from=="优酷视频"){

        } */
        $url = trim($_POST['video_url']);
        if(strpos($url, ".swf")){
            $swf_url = $_POST['video_url'];
        }
        //else $swf_url = getFlashUrl($_POST['video_url']);

        //if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){

        //}

        preg_match('/src=\"(.*?)\"/', $url, $matches);
        if($matches){
            if($matches[1]){
                $url = $matches[1];
            }
        }

        if($_POST['video_url']){
            $add = array(
                'com_id'=>$myinfo['com_id'],
                'title'=>trim($_POST['video_title']),
                'url'=>$url,
                'thumb'=>trim($_POST['video_thumb']),
                'type'=>$video_from,
                "swf_url"=>$swf_url,
                'addtime'=>time(),
            );
            M("company_video")->add($add,'',1);
            $this->success("保存成功");

        }
        else $this->error("请输入正确的视频地址");

    }


  //删除视频
    function delvideo(){
        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->error("请先登录。");
        }
        elseif (!$myinfo['type'] ){
            $this->error("访问超时，请刷新页面再试。");
        }

        if($_POST['id']){
            $vid = intval($_POST['id']);
            $rs = M("company_video")->where(array('vid'=>$vid,"com_id"=>$myinfo['com_id']))->delete();
            if($rs){
                $this->success("删除成功！");
            }
            else $this->error("删除失败，请刷新页面再试。");
        }
        else $this->error("参数无效，请刷新页面再试。");
    }

    //保存标签
    function saveTag(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->ResumeJson(0,"请先登录。");
        }
        elseif (!$myinfo['type'] ){//|| $myinfo['status']!=2
            $this->ResumeJson(0,"访问超时，请刷新页面再试。");
        }

        if($_POST['companyId']){

            $tags = trim($_POST['labels']);

            if($tags){
                $data = array(
                    'tags'=>$tags,
                	'update_time'=>time(),
                );
                M("Company")->where(array("com_id"=>$myinfo['com_id']))->save($data);
                checkCompanyStatus($this->uid);
            }

            $this->ResumeJson(1,"标签保存成功","company_info",'',array('code'=>0));

        }

    }

    //保存公司描述
    function saveContent(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->ResumeJson(0,"请先登录。");
        }
        elseif (!$myinfo['type'] ){//|| $myinfo['status']!=2
            $this->ResumeJson(0,"访问超时，请刷新页面再试。");
        }

        if($_POST['companyId']){

            $content = $_POST['companyProfile'];

            if($content){
                $data = array(
                    'content'=>$content,
                	'update_time'=>time(),
                );
                M("Company")->where(array("com_id"=>$myinfo['com_id']))->save($data);
                checkCompanyStatus($this->uid);
            }
            else{
                $this->ResumeJson(0,"请输入公司介绍");
            }

            $this->ResumeJson(1,"公司介绍保存成功","company_info",'',array('code'=>0,'content'=>$content));

        }

    }

    //补充创业团队
    function saveLeaderInfo(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->ResumeJson(0,"请先登录。");
        }
        elseif (!$myinfo['type'] ){//|| $myinfo['status']!=2
            $this->ResumeJson(0,"访问超时，请刷新页面再试。");
        }

        if($_POST['companyId']){

            $id = intval($_POST['id']);
            $name = trim($_POST['name']);
            $photo = trim($_POST['photo']);
            $position = trim($_POST['position']);
            $remark = trim($_POST['remark']);
            $weibo = trim($_POST['weibo']);

            if(!$name || !$photo || !$position){
                $this->ResumeJson(0,"请填写完整");
            }

            $data = array(
                'name'=>$name,
                'photo'=>$photo,
                'position'=>$position,
                'remark'=>$remark,
                'weibo'=>$weibo,
                'addtime'=>time(),
                "com_id"=>$myinfo['com_id'],
            );

            if($id){
                unset($data['addtime']);
                unset($data['com_id']);
                M("company_leads")->where(array('lid'=>$id))->save($data);
            }
            else $id = M("company_leads")->add($data);

            M("Company")->where(array("com_id"=>$myinfo['com_id']))->save(array('update_time'=>time()));

            checkCompanyStatus($this->uid);

            $content = $data;
            $content['companyId'] = $uid;
            $content['id'] = $id;

            $this->ResumeJson(1,"公司管理团队信息保存成功","company_info",'',array('code'=>0,'content'=>$content));

        }

    }

    //删除创业团队
    function delLeaderInfo(){
        $uid = $this->uid;
        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->ResumeJson(0,"请先登录。");
        }
        if($_POST['leaderId']){
            $leaderId = intval($_POST['leaderId']);
            if($leaderId){
                M("company_leads")->where(array("com_id"=>$myinfo['com_id'],'lid'=>$leaderId))->delete();
                $this->ResumeJson(1,"删除成功","company_info",'',array('code'=>0,'content'=>''));
            }
        }
    }


    //补充公司报道
    function articleSave(){

        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo || !$uid ){
            $this->ResumeJson(0,"请先登录。");
        }
        elseif (!$myinfo['type'] ){//|| $myinfo['status']!=2
            $this->ResumeJson(0,"访问超时，请刷新页面再试。");
        }

        if($_POST['companyId']){

            $id = intval($_POST['id']);
            $title = trim($_POST['title']);
            $url = trim($_POST['url']);

            if(!$title || !$url ){
                $this->ResumeJson(0,"请填写完整");
            }

            $data = array(
                'title'=>$title,
                'url'=>$url,
                'addtime'=>time(),
                "com_id"=>$myinfo['com_id']
            );

            if($id){
                unset($data['addtime']);
                unset($data['com_id']);
                M("company_articles")->where(array('aid'=>$id))->save($data);
            }
            else $id = M("company_articles")->add($data);

            M("company")->where(array("com_id"=>$myinfo['com_id']))->save(array('update_time'=>time()));

            checkCompanyStatus($this->uid);

            $content = $data;
            $content['companyId'] = $myinfo['com_id'];
            $content['userId'] = $uid;
            $content['createTime'] = time();
            $content['isEnable'] = 1;
            $content['showorder'] = time();
            $content['content'] = '';
            $content['id'] = $id;

            $this->ResumeJson(1,"保存成功","company_info",'',array('code'=>0,'content'=>$content));

        }

    }

    //删除报道
    function articleDel(){
        $uid = $this->uid;
        if($_POST['id']){
            $leaderId = intval($_POST['id']);
            if($leaderId){
                M("company_articles")->where(array('aid'=>$leaderId))->delete();
                $this->ResumeJson(1,"删除成功","company_info",'',array('code'=>0,'content'=>''));
            }
        }
    }

    //================================职位发布与管理======================================

    //获取我今天发布的职位数量
    function getMyTodayJobsCount(){
        $start_time = strtotime(date("Y-m-d"));
        $count = M("Jobs")->where( "uid = '".$this->uid."' and addtime>='$start_time' ")->count();
        return $count;
    }

    //发布职位
    function createPost(){

    	if(!is_login()){
    		$this->redirect("User/login");
    		exit;
    	}

    	$this->checkUser();

    	$jid = intval($_REQUEST['jid']);
    	//$count = $this->getMyTodayJobsCount();
    	if($jid){
    		$job = $this->getJobsInfo(array('j.jid'=>$jid));
    		if(!$job){
    			$this->error("参数无效，请勿非法访问。");
    		}
    	}
    	else{

    		/* if($count>=5){
    			$this->error("你当天发布的职位超过限制，请明天再来。");
    		} */
    	}

    	//print_test($job);

    	$info = $this->getUsersInfoById($this->uid);
    	$array = array(
    		'info'=>$info,
    		'count'=>$count,
    		'left_count'=>5-$count,
    		'webCat' => $this->getCatCache(0),
    		'job'=>$job,
    	);
    	//$this->print_test($array['webCat']);
    	$this->assign($array);
    	$this->assign("cur_top_nav",array("post"=>'class="current"') );
    	$this->display("createPost");
    }


    //提交发布任务
    function savePosition(){

    	$this->checkUser();
    	$info = $this->getUsersInfoById($this->uid);

    	$jid = intval($_POST['id']);

    	$zid= intval($_POST['jobcate']);
    	$cid = intval($_POST['positionType']);

    	$suoshu_bumen = trim($_POST['department']);
    	$edu = trim($_POST['education']);
    	$send_email = trim($_POST['email']);
    	$forward_email = trim($_POST['forwardEmail']);
    	$gongzuo_xingzhi = trim($_POST['jobNature']);
    	$gongzuo_dizhi = trim($_POST['positionAddress']);
    	$zhiwei_youhuo = trim($_POST['positionAdvantage']);
    	$zhiwei_mingcheng = trim($_POST['positionName']);

    	$yuexin_max = trim($_POST['salaryMax']);
    	$yuexin_min = trim($_POST['salaryMin']);
    	$gongzuo_chengshi = trim($_POST['workAddress']);
    	$gongzuo_jingyan = trim($_POST['workYear']);
    	$descrip = trim($_POST['positionDetail']);
    	$lat = trim($_POST['positionLat']);
    	$lng = trim($_POST['positionLng']);

    	if(!$cid || !$zid  || !$edu || !$send_email || !$gongzuo_chengshi || !$zhiwei_mingcheng
    	|| !$gongzuo_dizhi || !$yuexin_min || !$yuexin_max || !$gongzuo_jingyan ){
    	    $this->exitJson(1,false,'请填写完整');
    	    //$this->error("请填写完整");
    	}

    	$data = array(
    		'uid'=>$this->uid,
    		'suoshu_bumen'=>$suoshu_bumen,
    		'status'=>1,
    	    'cid'=>$cid,
    	    'zid'=>$zid,
    	    'com_id'=>$info['com_id'],
    	    'hangye_lingyu'=>getCatNameById($cid),
    	    'zhiwei_leibie'=>getCatNameById($zid),
    	    'gongzuo_xingzhi'=>$gongzuo_xingzhi,
    			'xueli'=>$edu,
    			'send_email'=>$send_email,
    			'forward_email'=>$forward_email,
    			'gongzuo_chengshi'=>$gongzuo_chengshi,
    			'zhiwei_youhuo'=>$zhiwei_youhuo,
    			'zhiwei_leixing'=>$zhiwei_leixing,
    			'zhiwei_mingcheng'=>$zhiwei_mingcheng,
    			'yuexin_min'=>$yuexin_min,
    			'yuexin_max'=>$yuexin_max,
    			'gongzuo_dizhi'=>$gongzuo_dizhi,
    			'gongzuo_jingyan'=>$gongzuo_jingyan,
    			'addtime'=>time(),
    			'descrip'=>$descrip,
    			'lat'=>$lat,
    			'lng'=>$lng,
    			'init_time'=>time(),
    			'offline_time'=>0,
    	    'refresh_time'=>0,
    	);

    	if($jid){
    	    unset($data['init_time']);
    	    unset($data['uid']);
    	    $data['update_time'] = time();
    	    M("Jobs")->where(array("jid"=>$jid))->save($data);
    	}
        else $jid = M("Jobs")->add($data);

    	if($jid){
    	    $this->exitJson(0,true,'恭喜你，职位保存成功！',"Company/PositionSaveSuccess/pid/".$jid);
    		//$this->success("恭喜你，发布成功！","/Jobs/info/id/".$jid);
    	}
    	else {
    	    $this->exitJson(1,false,'职位保存失败，请稍后再试。');
    	    //$this->error("发布失败，请稍后再试。");
    	}
    }

    //发布成功
    function PositionSaveSuccess(){
        $this->checkUser();
        $pid = intval($_REQUEST['pid']);
        $this->success("恭喜你，职位发布成功！","/Jobs/info/id/".$pid);
        exit;


    	$uid = $this->uid;
    	$count = $this->getMyTodayJobsCount();
    	//$info = $this->getUsersInfoById($this->uid);


    	$info = M("Jobs")->where(array('uid'=>$uid,))->find();
    	if(!$pid || !$info){
    		$this->redirect("/Users/");
    	}
    	$this->assign(
    		array('jid'=>$pid,'count'=>$count,'left_count'=>5-$count,'uid'=>$uid)
    	);
    	$this->display();

    }


    //我发布的职位
    function positions(){
        $type=$_REQUEST['type'];
        $list = array();
        if($type=="Expired"){
            $maps = array(
                'j.status'=>2,
                'j.uid'=>$this->uid,
            );
            $stitle = "已下线";
        }
        else if($type=="yet"){
            $type = "yet";
            $maps = array(
                'j.status'=>0,
                'j.uid'=>$this->uid,
            );
            $stitle = "待审核";
        }
        else if($type=="fail"){
            $type = "fail";
            $maps = array(
                'j.status'=>-1,
                'j.uid'=>$this->uid,
            );
            $stitle = "未通过审核";
        }
        else {
            $type = "Publish";
            $maps = array(
                'j.status'=>1,
                'j.uid'=>$this->uid,
            );
            $stitle = "有效";
        }
        $list = $this->getJobsListByCondition($maps,'0,1000');
        $all_count = M("jobs")->where(array('uid'=>$this->uid))->count();
        $data = array(
            'list'=>$list,
            'type'=>$type,
            'stitle'=>$stitle,
            'total'=>count($list),
            'all_count'=>intval($all_count),
            'Publish_count'=>M("jobs")->where(array('uid'=>$this->uid,'status'=>1))->count(),
            'Expired_count'=>M("jobs")->where(array('uid'=>$this->uid,'status'=>2))->count(),
            'count_2'=>M("jobs")->where(array('uid'=>$this->uid,'status'=>0))->count(),
            'count_3'=>M("jobs")->where(array('uid'=>$this->uid,'status'=>-1))->count(),
        );
        //$this->print_test($list);
        
        $this->assign("show_foot",IS_WAP?0:1);
        
        $this->assign($data);
        $this->display();
    }

    //刷新职位   每7天只能刷新一次
    function positionRefresh(){
        $this->checkUser();
        $uid = $this->uid;
        $id = intval($_REQUEST['id']);
        $info = $this->getJobsInfo(array('j.uid'=>$uid,'j.jid'=>$id));
        if( !$id || !$info){
            //$this->error("参数无效");
            $this->exitJson(0,false,'参数无效');
        }
        $time = time();

        if($time-$info['refresh_time']>=7*24*3600){
            M("Jobs")->where(array('jid'=>$info['jid']))->save(array('refresh_time'=>$time));
            //$this->success("刷新成功");
            $this->exitJson(1);
        }
        else {
            //$this->error("刷新失败，每7天内只能刷新一次.");
            $this->exitJson(0,false,'刷新失败，每7天内只能刷新一次.');
        }
    }

    //职位下线  status 1正常  2下线  0未审核  -1审核没通过
    function positionOffline(){
        $this->checkUser();
        $uid = $this->uid;
        $id = intval($_REQUEST['id']);
        $info = $this->getJobsInfo(array('j.uid'=>$uid,'j.jid'=>$id));
        if( !$id || !$info){
            $this->exitJson(0,false,'参数无效');
        }
        $time = time();

        if( $info['job_status']==1 ){
            M("Jobs")->where(array('jid'=>$info['jid']))->save(array('status'=>2,'offline_time'=>$time));
            $this->exitJson(1);
        }
        else {
            $this->exitJson(0,false,'下线失败，非上线状态下的职位不能下线.');
        }
    }

    //职位删除
    function positionDelete(){
        $this->checkUser();
        $uid = $this->uid;
        $id = intval($_REQUEST['positionId']);
        $info = $this->getJobsInfo(array('j.uid'=>$uid,'j.jid'=>$id));
        if( !$id || !$info){
            $this->exitJson(0,false,'参数无效');
        }
        $time = time();

        $check = M("Jobs")->where( array('jid'=>$info['jid']))->delete() ;
        if($check){
            M("jobs_apply")->where( array('jid'=>$info['jid']))->delete() ;
        }
        $this->exitJson(1);
    }

    function mianshi(){
        $this->display();
    }

    //我收到的简历
    function interview(){

        $this->checkUser();
        if(!$this->type){
            $this->error("无权限访问该页面","/");
        }
        $uid = $this->uid;
        //$ids = getUserJobsIds($uid);
        $flag = intval($_REQUEST['flag']);
        $jy = intval($_REQUEST['jy']);
        $xl = intval($_REQUEST['xl']);
        $zd = intval($_REQUEST['zd']);

        $type=$_REQUEST['type'];
        
        $over = intval($_REQUEST['isover']);
        $over = $over?$over:1;
        
        $sn = intval($_REQUEST['sn']);
        $sn = $sn?$sn:2;
        
        $group = '';
        
        //从职位过来
        $job_info = array();
        $job_id = intval($_GET['job_id']);
        if($job_id){//$type=="all" && 
            $job_info = $this->getJobsInfo("j.jid='".$job_id."'");
            $map["j.jid"] = $job_id;
            $this->assign("show_foot",IS_WAP?0:1);
        }
        else {
            $map["j.jid"] = array("gt",0);
            $map["ja.status"] = 0;
        }
        
        $list = array();
        $map["j.uid"] = $uid;
        
        $stitle = "待处理简历";
        $stitle = '';
        switch ($type){
            case "unhandle":
                $map["ja.status"] = 0;
                $map["ja.view_contact"] = 0;
                $stitle = "待处理简历";
                break;
            case "arranged":
                $stitle = "已安排面试";
                $map["ja.status"] = 1;
                //$map["ja.isread"] = 0;
                $itime = intval($_GET['itime']);
                if($itime==1){
                    $map["ja.interviewTime"] = array("egt",date("Y-m-d"." 00:00"));
                }
                else if($itime==-1){
                    $map["ja.interviewTime"] = array("lt",date("Y-m-d"." 00:00"));
                }
                $this->assign("itime_str",array($itime=>'class="active"'));
                $keyword = trim($_REQUEST['keyword']);
                if($keyword){
                    $map["j.zhiwei_mingcheng|u.realname"] = $keyword;
                    $this->assign("keyword",$keyword);
                }
                break;
            case "mianshi":
                $stitle = "面试管理";
                $map["ja.status"] = 1;
                $ctime = date("Y-m-d H:i:s");
                if($over==1){
                    $map['ja.interviewTime'] = array("lt",$ctime);
                }
                else if($over==2){                    
                    $map['ja.interviewTime'] = array("gt",$ctime);
                }
                $this->assign("show_foot",IS_WAP?0:1);
                break;
                
            case "refuselist":
                $stitle = "不适合简历";
                $map["ja.status"] = -1;
                break;
            case "autoFilter":
                $stitle = "自动过滤简历";
                $map["ja.status"] = -2;
                break;

            case "prepare":
                $stitle = "待沟通简历";
                $map["ja.status"] = 0;
                $map["ja.view_contact"] = 1;
                break;
            case "ismark":
                $stitle = "我的收藏";
                $map["ja.biaoshi"] = 1;
                break;
            case "noread":
                $stitle = "未读简历";
                $map["ja.isread"] = 0;
                if($sn==1){
                    
                }
                else{
                    $group = "ja.jid";
                }
                $this->assign("show_foot",1);
                $this->assign("show_nav",1);
                break;
            case "all":
                $stitle = "";
                //$map["ja.isread"] = 0;
                break;
            default:
                $map["ja.status"] = 0;
                $map["ja.view_contact"] = 0;
                $stitle = "待处理简历";
                $type = "unhandle";
                break;

        }

        switch ($flag){
            case 1:
                $map["ja.isread"] = 0;
                break;
            case 2:
                $map["ja.isread"] = 1;
                break;
            case 4:
                $map["ja.biaoshi"] = 1;
                break;
            case 3:
                $map["ja.zhuanfa"] = 1;
                break;
            default:
                break;
        }

        switch ($jy){
            case 1:
                $map["u.workyear"] = "应届毕业生";
                break;
            case 2:
                $map["u.workyear"] = "1年以下";
                break;
            case 3:
                $map["u.workyear"] = "1-3年";
                break;
            case 4:
                $map["u.workyear"] = "3-5年";
                break;
            case 5:
                $map["u.workyear"] = "5-10年";
                break;
            case 6:
                $map["u.workyear"] = "10年以上";
                break;
            case 7:
                $map["u.workyear"] = "在校学生";
                break;
            default:
                break;
        }

        switch ($xl){
            case 1:
                $map["u.edu"] = "大专及以上";
                break;
            case 2:
                $map["u.edu"] = "本科及以上";
                break;
            case 3:
                $map["u.edu"] = "硕士及以上";
                break;
            case 4:
                $map["u.edu"] = "博士及以上";
                break;
            case 5:
                $map["u.edu"] = "在校学生";
                break;
            default:
                break;
        }

        switch ($zd){
            case 1://7天自动回绝
                $stime = time()-4*3600*24;
                $map["ja.addtime"] = array("lt",$stime);//3天内自动回绝
                $map["ja.isread"] = 0;
                break;
            case 2:
                $stime = time()-6*3600*24;
                $map["ja.addtime"] = array("lt",$stime);//1天内自动回绝
                $map["ja.isread"] = 0;
            default:
                break;
        }

        $list = M("Jobs_apply")->table(C('DB_PREFIX')."jobs_apply ja")
        ->join(C('DB_PREFIX')."jobs j on ja.jid = j.jid","left")
        ->join(C('DB_PREFIX')."member u on ja.uid = u.uid","left")
        ->join(C('DB_PREFIX')."ucenter_member um on ja.uid = um.id","left")
        //->join(C('DB_PREFIX')."company c on u.com_id = c.com_id","left")
        ->where($map)->field("ja.*,j.zhiwei_mingcheng,u.pic,u.city,u.realname,u.phone,u.workyear,u.edu,u.sex,um.email ")
        ->group($group)->order(" ja.interviewTime desc, ja.aid desc")->limit('0,100')->select();
        
        //echo M()->getLastSql();exit;
        //print_test($list);

        $myinfo = $this->getUsersInfoById($uid);
        $day = 0;
        $status="未开始";
        if($myinfo['xiujia_endDate'] && $myinfo['xiujia_fromDate']){
            $day = strtotime($myinfo['xiujia_endDate'])-strtotime($myinfo['xiujia_fromDate']);
            $day = floor($day/(3600*24))+1;
            if($myinfo['xiujia_endDate']<date("Y-m-d")){
                $status="已结束";
            }
            else if($myinfo['xiujia_fromDate']<=date("Y-m-d") && $myinfo['xiujia_endDate']>=date("Y-m-d")){
                $status="进行中";
            }

        }


        $data = array(
            'list'=>$list,
            'stitle'=>$stitle,
            'type'=>$type,
            'myinfo'=>$myinfo,
            'total_count'=>count($list),

            'day'=>$day,
            'status'=>$status,

            'cflag'=>array($flag=>'class="current"'),
            'cxl'=>array($xl=>'class="current"'),
            'cjy'=>array($jy=>'class="current"'),
            'czd'=>array($zd=>'class="current"'),

            'flag'=>$flag,
            'xl'=>$xl,
            'jy'=>$jy,
            'zd'=>$zd,
            
            'job_id'=>$job_id,
            'job_info'=>$job_info,
            
            "isover"=>$over,
            "sn"=>$sn,
        );
        $this->assign($data);
        if($type=="noread"){
            $this->assign("cur_top_nav",array("noread"=>'class="current"') );
        }
        else $this->assign("cur_top_nav",array("resume"=>'class="current"') );
        
        if($type=="arranged" &&　IS_WAP==0 ){
            
            if($_GET['d']){
                $d = trim($_GET['d']);
                if($d)$da = date("Y-m-d",strtotime($d));
            }
            $new = array();
            foreach ($list as $k=>$v){
                
                $temp = explode(" ", $v['interviewTime']);
                $date = $temp[0];
                
                if($da && $da!=$date){
                    continue;
                }
                
                $v['date'] = $date;
                $v['time'] = $temp[1];
                //$v['user'] = $this->getUsersInfoById($v['uid']);
                //$v['job'] = $this->getJobsInfo(array("jid"=>$v['jid']));
                $v['author'] = $this->getUsersInfoById($v['company_id']);
                $new[$date][] = $v;
            }
            
            if($_REQUEST['getdate']){
                $ym = $_POST['ym'];
                if($ym){
                    $return = array();
                    foreach ($new as $kk=>$vv){
                        if( strpos($kk,$ym)===false ){
                            continue;
                        }
                        $return[] = array(
                            'date'=>$kk,
                            'count'=>count($vv),
                        );
                    }
                    $data = array(
                        'content'=>array("rows"=>$return),
                        "message"=>"操作成功",
                        "state"=>1
                    );
                    exit(json_encode($data));
                }
            }
            
            $this->assign("list",$new);
            $this->display("anpai");
            exit;
        }
        else  $this->display();
    }



    //返回统计数据
    function queryTipsNums(){
        $this->checkUser();
        $jsoncallback = $_REQUEST['jsoncallback'];
        $jid = intval($_REQUEST['jid']);
        if($jid){
            $ids = array($jid);
        }
        else $ids = getUserJobsIds($this->uid);
        $data = array(
            "content"=>array(
                "data"=>array(
                    "unHandleNum"=>getJobsApplyNum($ids,array("status"=>0,"view_contact"=>0)),//待处理
                    "showNum"=>getJobsApplyNum($ids,array("status"=>0,"view_contact"=>1)),//待沟通
                    "limitNum"=>C("SHOW_LIMIT_NUM"),//一次性最多只能查看联系方式数量  超过了未处理的将不能再查看
                    "autoFilterNum"=>getJobsApplyNum($ids,array("status"=>-2)),//自动过滤
                    "deliverCount"=>getJobsApplyNum($ids),//投递总数
                    "unTreateNum"=>getJobsApplyNum($ids,array("status"=>-1)),//不合适
                    "prepareNum"=>getJobsApplyNum($ids,array("status"=>1)),//已安排面试
                ),
                "rows"=>array()
            ),
            "message"=>"操作成功",
            "state"=>1
          );

        //exit($jsoncallback."(".json_encode($data).")");
        exit( json_encode($data) );

        //jQuery11010047717569229281165_1432653605351();

    }

    //检查是否超过限制
    function checkContactLimit($uid){
        $count = getJobsApplyNumByCon($uid,array("status"=>0,"view_contact"=>1));
        if($count>=C("SHOW_LIMIT_NUM")){
            $this->exitJson(0,false,"待处理简历达到上限了",array("rows"=>array(),'state'=>301 ));
        }
    }

    //查看
    function checkShow(){
        $id = intval($_REQUEST['id']);

        $this->checkContactLimit($this->uid);

        if($id){
        	$info = M("Jobs_apply")->where(array("aid"=>$id))->find();
        	if($info){
        	    
        	    $user = $this->getUsersInfoById($info['uid']);
        	    
        		$check = M("Jobs_apply")->where(array("aid"=>$id,"isread"=>0))->save( array("isread"=>1) );
        		if($check){
        		    addApplyLog($id,$info['uid'],2,$this->uid,'');
        		    
        		    //发送被查看邮件      		           		    
        		    
        		    if($user['email']){
        		        
        		        $job = M("jobs")->where(array('jid'=>$info['jid']))->find();
        		        $company = $this->getUsersInfoById($job['uid']);
        		        
        		        if($user['bind_openid']){
        		            //模板消息        		            
        		            $tpl_data = array(
        		                'first'=>$user['realname'].", 你好~~ \n HR查看了你的简历, 期待好消息吧~",
        		                'remark'=>'点击查看简历进程>>',
        		                'job'=>$job['zhiwei_mingcheng'],
        		                'company'=>$company['company_short_name'],
        		                'time'=>date("Y-m-d H:i:s"),
        		            );
        		            sendTplMsgById("cwxu",3,$user['uid'],$tpl_data,WEB_URL."User/delivery/type/0/aid/".$id."/wx_hash/cwxu");
        		        }            		    
            		    
            		    $email_tpl = getSendEmailTpl(10,array(
            		        'position_name'=>$job['zhiwei_mingcheng'],
            		        'company_name'=>$company['company_short_name'],
            		        'realname'=>$user['realname'],        		        
            		    ));
            		    SendMail($user['email'],$email_tpl['title'],$email_tpl['content']);
        		    
        		    }
        		    
        		}
        		if (1){
        		    $content_r = array(
        		        "data"=>array(        		    
        		            "id"=>$info['uid'],
        		            "email"=>$user['email'],
        		            "phone"=>$user['phone'],        		    
        		        ),
        		        "rows"=>array(),
        		        'state'=>1
        		    );
        			$this->exitJson(1,true,"更新成功",$content_r);
        		}
        	}

            $this->exitJson(0,false,"更新失败",array("rows"=>array(),'state'=>0 ));
        }
        else $this->exitJson(0,false,"参数无效",array("rows"=>array(),'state'=>0 ));
    }

    //获取用户联系方式
    function getTemplate(){
        $this->checkUser();
        $uid = $this->uid;
        $info = M("Member")->where(array('uid'=>$uid))->find();
        if($info){
            $name = '';
            if($info['email_jianli']){
                $email = explode("@", $info['email_jianli']);
                $name = $email[0];
            }
            $arr = array(
                "content"=>array(
                    "data"=>array(
                        'template'=>array(
                            "contactName"=>$name,
                            "contactPhone"=>$info['phone'],
                            "contactEmail"=>$info['email_jianli'],
                        ),

                    ),
                    "rows"=>array(),
                ),
                "message"=>"操作成功",
                "state"=>1,
            );
        }
        else {
            $arr['state'] = 0;
        }

        exit(json_encode($arr));
    }

    //获取用户联系方式
    function showContact(){
        $this->checkUser();
        $id = intval($_REQUEST['id']);
        $apply_info = M("jobs_apply")->where(array('aid'=>$id))->find();
        if(!$apply_info || !$id){
            $this->exitJson(0,false,"参数无效",array("rows"=>array(),'state'=>401 ));
        }
        $info = $this->getUsersInfoById($apply_info['uid']);
        //state 301 待沟通简历数量已达到上限
        if($info){

            $this->checkContactLimit($this->uid);

           /*  $contactEmail = addslashes(trim($_POST['contactEmail']));
            $contactName = addslashes(trim($_POST['contactName']));
            $contactPhone = addslashes(trim($_POST['contactPhone']));
            if(!$contactEmail || !$contactName || !$contactPhone){
                $this->exitJson(0,false,"请填写完整",array("rows"=>array(),'state'=>403 ));
            } */

            $save = array(
                //'contactEmail'=>$contactEmail,
                //'contactName'=>$contactName,
                //'contactPhone'=>$contactPhone,
                'view_contact'=>1,
                'viewTime'=>time(),
            );
            if($apply_info['status']==-2){
                $save["status"] = 0;
            }
            M("jobs_apply")->where(array("aid"=>$id))->save($save);

            addApplyLog($id,$info['uid'],3,$this->uid,'');

            $content = array(
                "data"=>array(

                    "id"=>$apply_info['uid'],
                    "email"=>$info['email'],
                    "phone"=>$info['phone'],

                ),
                "rows"=>array(),
                'state'=>1
            );
            $this->exitJson(1,true,"查询成功",$content);
        }
        else {
            $this->exitJson(0,false,"查询失败",array("rows"=>array(),'state'=>402 ));
        }
    }



    //标记
    function mark(){
        $this->checkUser();

        $id = intval($_POST['deliverId']);
        if($id){
            $mark = $_POST['mark'];
            if($mark=="false"){
                $status = 0;
            }
            else $status = 1;
            $check = M("Jobs_apply")->where(array("aid"=>$id))->save( array("biaoshi"=>$status) );
            if ($check){
                $this->exitJson(1,true,"更新成功",array("rows"=>array(),'state'=>1 ));
            }
            $this->exitJson(0,false,"更新失败",array("rows"=>array(),'state'=>0 ));
        }
        else $this->exitJson(0,false,"非法操作",array("rows"=>array(),'state'=>0 ));
    }

    //计算休假
    function holiday(){
        $endDate = trim($_POST['endDate']);
        $fromDate = trim($_POST['fromDate']);
        if( $endDate  && $fromDate ){
            //$check = M("member")->where(array("uid"=>$this->uid))->save( array('update_time'=>time(),"xiujia_fromDate"=>$fromDate,"xiujia_endDate"=>$endDate) );
            //if ($check){
                $day = strtotime($endDate)-strtotime($fromDate);
                $day = floor($day/(3600*24))+1;
                $content = array(
                    "data"=>array(
                        "vacation"=>array(
                            "endDate"=>$endDate,
                            "endDateDotStr"=>str_replace("-", ".", $endDate),
                            "fromDate"=>$fromDate,
                            "fromDateDotStr"=>str_replace("-", ".", $fromDate),
                            "intervalDays"=>$day,
                         ),
                        "rows"=>array(),

                    ),
                    'state'=>1
                );
                $this->exitJson(1,true,"更新成功",$content);
            //}
            //$this->exitJson(0,false,"更新失败");
        }
        else $this->exitJson(0,false,"参数无效");
    }

    //休假
    function addVacation(){
        $endDate = trim($_POST['endDate']);
        $fromDate = trim($_POST['fromDate']);
        if( $endDate  && $fromDate ){
            $check = M("member")->where(array("uid"=>$this->uid))->save( array('update_time'=>time(),"xiujia_fromDate"=>$fromDate,"xiujia_endDate"=>$endDate) );
            if ($check){
                //$day = strtotime($endDate)-strtotime($fromDate);
                //$day = floor($day/(3600*24))+1;
                $content = array(
                    "rows"=>array(),
                    'state'=>1
                );
                $this->exitJson(1,true,"更新成功",$content);
            }
            $this->exitJson(0,false,"更新失败");
        }
        else $this->exitJson(0,false,"参数无效");
    }

    //取消休假
    function cancelVacation(){
        $check = M("member")->where(array("uid"=>$this->uid))->save( array('update_time'=>time(),"xiujia_fromDate"=>'',"xiujia_endDate"=>'') );
        if ($check){
            $content = array(
                "rows"=>array(),
                'state'=>1
            );
            $this->exitJson(1,true,"更新成功",$content);
        }
        $this->exitJson(0,false,"更新失败");
    }

    //===========================简历处理==================================================

    //读取面试模板    发面试通知
    function getInterviewTemplates(){
        $this->checkUser();
        $uid = $this->uid;
        $templates = array();
        $list = M("notice_tpl")->where( "type='INTERVIEW_TEMPLATE' and (uid='$uid' ) ")->order("isdefault desc ,tid desc")->select();//or is_system=1
        foreach ($list as $k=>$v){
            $templates[] = array(
                "id"=>$v['tid'],
                "templateType"=>"REFUSE_TEMPLATE",
                "alis"=>$v['title'],
                "companyId"=>$uid,
                "createTime"=>$v['addtime'],//"20140908T221513+0800",
                "creater"=>$uid,
                "description"=>"",
                "defaultTemplate"=>$v['isdefault']?true:false,
                "deleted"=>$v['isdelete']?true:false,
                "updateTime"=>$v['update_time'],//"20140908T221513+0800",
                "templateContent"=>json_encode(array(
                    "alis"=>$v['title'],
                    "content"=>$v['content'],
                    'interviewAddress'=>$v['link_address'],
                    'linkMan'=>$v['link_name'],
                    'linkPhone'=>$v['link_phone'],
                )),
            );
        }
        $arr = array(
            "content"=>array(
                "data"=>array(
                    "templates"=>$templates,
                ),
                "rows"=>array(),
            ),
            "message"=>$templates?"操作成功":"请先设置面试模板",
            "state"=>$templates?1:0,
        );

        exit(json_encode($arr));
    }

    //读取线下模板   已安排面试
    function getOfflineTemplate(){

        $this->checkUser();
        $uid = $this->uid;

        $aid = intval($_POST['deliverId']);
        if(!$aid){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        $apply_info = M("jobs_apply")->where(array("aid"=>$aid))->find();
        if($apply_info){
            $user = $this->getUsersInfoById($apply_info['uid']);
            $email = $user['email'];
        }

        $info = M("notice_tpl")->where( "type='INTERVIEW_TEMPLATE' and (uid='$uid') ")->order("isdefault desc ,tid desc")->find();
        $template = array(
            "id"=>$info['tid'],
            //"templateType"=>"REFUSE_TEMPLATE",
            "contactname"=>$info['link_name'],
            "contactphone"=>$info['link_phone'],
            "contactemail"=>$info['link_email'],//"20140908T221513+0800",
            "deliverid"=>$uid,
            "processoremail"=>$info['link_phone'],
            "processoruserid"=>$uid,
            "recipient"=>$email,//应聘人邮箱
            "createtime"=>$info['addtime'],//"20140908T221513+0800",
            "isdel"=>false,
        );


        $arr = array(
            "content"=>array(
                "data"=>array(
                    "template"=>$template,
                ),
                "rows"=>array(),
            ),
            "message"=>$info?"操作成功":"请先设置面试模板",
            "state"=>$info?1:0,
        );

        exit(json_encode($arr));
    }

    //读取模板  不合适模板
    function getRefuseTemplates(){
        $this->checkUser();
        $uid = $this->uid;
        $templates = array();
        $list = M("notice_tpl")->where( "type='REFUSE_TEMPLATE' and (uid='$uid' ) ")->order("isdefault desc ,tid desc")->select();
        foreach ($list as $k=>$v){
            $templates[] = array(
                "id"=>$v['tid'],
                "templateType"=>"REFUSE_TEMPLATE",
                "alis"=>$v['title'],
                "companyId"=>$uid,
                "createTime"=>$v['addtime'],//"20140908T221513+0800",
                "creater"=>$uid,
                "description"=>"",
                "defaultTemplate"=>$v['isdefault']?true:false,
                "deleted"=>$v['isdelete']?true:false,
                "updateTime"=>$v['update_time'],//"20140908T221513+0800",
                "templateContent"=>json_encode(array("alis"=>$v['title'],"content"=>$v['content'])),
            );
        }
        $arr = array(
            "content"=>array(
                "data"=>array(
                    "templates"=>$templates,
                ),
                "rows"=>array(),
            ),
            "message"=>"操作成功",
            "state"=>1,
        );

        exit(json_encode($arr));
    }

    //在线面试通知
    function onlineInterview(){
        $this->checkUser();
        $uid = $this->uid;
        $content = trim($_POST['content']);
        $deliverId = trim($_POST['deliverId']);
        $interAdd = trim($_POST['interAdd']);
        $interviewTime = trim($_POST['interviewTime']);
        $linkMan = trim($_POST['linkMan']);
        $linkPhone = trim($_POST['linkPhone']);
        $title = trim($_POST['title']);

        if(!$content || !$deliverId || !$interAdd || !$interviewTime || !$title || !$linkPhone ){
            $this->exitJson(0,false,"填写不完整",array("state"=>0));
        }

        $info = M("jobs_apply")->where(array('aid'=>$deliverId,'status'=>0))->find();
        if(!$info){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        //发送邮件
        $user = $this->getUsersInfoById($info['uid']);
        if($user['email']){
            
            $job = M("jobs")->where(array('jid'=>$info['jid']))->find();
            $company = $this->getUsersInfoById($job['uid']);
            
            if($user['bind_openid']){
                //模板消息
                $tpl_data = array(
                    'first'=>$user['realname'].", 你好~~\n".$company['company_short_name']."向你发出面试邀请啦!!",
                    'remark'=>$content?$content:'记得准时参加哦~~',
                    'job'=>$job['zhiwei_mingcheng'],
                    'company'=>$company['company_short_name'],
                    'time'=>$interviewTime,
                    'address'=>$interAdd,
                    'contact'=>$linkMan,
                    'tel'=>$linkPhone,
                );
                sendTplMsgById('cwxu',4,$user['uid'],$tpl_data,WEB_URL."User/delivery/type/4/aid/".$deliverId."/wx_hash/cwxu" );
            }
            

        	//1.给用户发邮件
            
            $email_tpl = getSendEmailTpl(5,array(
            	'position_name'=>$job['zhiwei_mingcheng'],
            	'company_name'=>$company['company_short_name'],
            	'realname'=>$user['realname'],
            	'interviewTime'=>$interviewTime,
            	'interAdd'=>$interAdd,
            	'linkMan'=>$linkMan,
            	'linkPhone'=>$linkPhone,
            	'content'=>$content,
            ));
            SendMail($user['email'],$email_tpl['title'],$email_tpl['content']);

            //2.给公司发备份邮件
            if($company['email']){

            	$last_edu = getUserLastEdu($user['uid']);
            	$last_work = getUserLastWork($user['uid']);

            	$email_arr = array(
            		'position_name'=>$job['zhiwei_mingcheng'],
            		'company_name'=>$company['company_short_name'],
            		'realname'=>$user['realname'],
            		'interviewTime'=>$interviewTime,
            		'interAdd'=>$interAdd,
            		'linkMan'=>$linkMan,
            		'linkPhone'=>$linkPhone,
            		'content'=>$content,

            		'sex'=>$user['sex']==2?"女":"男",
            		'edu'=>$user['edu'],
            		'workyear'=>$user['workyear'],
            		'city'=>$user['city'],
            		'status'=>$user['workstatus'],
            		'uid'=>$user['uid'],
            		'hr_name'=>getEmailName($company['email']),

            		'xueli'=>$user['edu'],
            		'xuexiao'=>$user['byxy'],
            		'zhiwei'=>$last_work['positionName'],
            		'company'=>$last_work['companyName'],
            	    
            	    'aid'=>$info['aid'],

            	);
            	$email_tpl = getSendEmailTpl(6,$email_arr);
            	SendMail($company['email'],$email_tpl['title'],$email_tpl['content']);

            	if($company['email_jianli'] && $company['email_jianli']!=$company['email']){
            		$email_arr['hr_name'] = getEmailName($company['email_jianli']);
            		$email_tpl = getSendEmailTpl(6,$email_arr);
            		SendMail($company['email_jianli'],$email_tpl['title'],$email_tpl['content']);
            	}
            }

        }
        //else $this->exitJson(0,false,"对方邮箱地址无效",array("state"=>0));

        $data = array(
            'contactName'=>$linkMan,
            'contactPhone'=>$linkPhone,
            'interviewTime'=>$interviewTime,
            'status'=>1,
            'contact_address'=>$interAdd,
            'contact_memo'=>$content,
        );
        M("jobs_apply")->where(array("aid"=>$deliverId,"company_id"=>$uid))->save($data);

        $ext_data = array(
        	'time'=>$interviewTime,
        	'name'=>$linkMan,
        	'phone'=>$linkPhone,
        	'address'=>$interAdd,
        	'memo'=>$content,
        );
        addApplyLog($deliverId,$info['uid'],4,$this->uid,'',$ext_data);


        $this->exitJson(1,true,"操作成功",array("state"=>1));

    }

    //线下已安排面试    只是更新状态
    function offlineInterview(){
        $this->checkUser();
        $uid = $this->uid;

        $deliverId = trim($_POST['relationId']);

        $interviewTime = trim($_POST['interviewTime']);
        $linkMan = trim($_POST['linkMan']);
        $linkPhone = trim($_POST['linkPhone']);

        if(!$deliverId  || !$interviewTime || !$linkMan || !$linkPhone ){
            $this->exitJson(0,false,"填写不完整",array("state"=>0));
        }

        $data = array(
            'contactName'=>$linkMan,
            'contactPhone'=>$linkPhone,
            'interviewTime'=>$interviewTime,
            'status'=>1,
        );
        M("jobs_apply")->where(array("aid"=>$deliverId,"company_id"=>$uid))->save($data);

        $this->exitJson(1,true,"操作成功",array("state"=>1));
    }

    //简历被标记为不合适  发送邮件
    function hrRefuse(){
        $arr = array(
            'state'=>0,
            'message'=>"操作成功",
        );
        $this->checkUser();
        $aid = addslashes(trim($_POST['deliverIds']));
        $content = addslashes(trim($_POST['content']));
        if(!$aid ){
            $arr['message']="非法操作！";
        }
        else{

            $list = M("jobs_apply")->where(array('aid'=>array("in",$aid)))->select();
            if(!$list){
                $arr['message']="非法操作！";
            }
            else{
                //发送邮件
                foreach ($list as $k=>$v){
                    $data = array(
                        'status'=>-1,
                    );

                    addApplyLog($v['aid'],$v['uid'],10,$this->uid,'',array("content"=>$content));

                    M("jobs_apply")->where(array('aid'=>$v['aid']))->save($data);
                    //$user = M("Member")->where(array('uid'=>$v['uid']))->find();
                    $user = $this->getUsersInfoById($v['uid']);
                    if($user['email']){

                    	//1.给用户发邮件
                    	$job = M("jobs")->where(array('jid'=>$v['jid']))->find();
                    	$company = $this->getUsersInfoById($job['uid']);
                    	$email_tpl = getSendEmailTpl(9,array(
                    			'position_name'=>$job['zhiwei_mingcheng'],
                    			'company_name'=>$company['company_short_name'],
                    			'realname'=>$user['realname'],

                    			'content'=>$content,
                    	));
                    	SendMail($user['email'],$email_tpl['title'],$email_tpl['content']);
                    	
                    	M("jobs_apply")->where(array('aid'=>$v['aid']))->save(array("is_send_refuse_email"=>1));

                        //$content = $content;
                        /* ?$content:"非常荣幸收到您的简历，在我们仔细阅读您的简历之后，却不得不很遗憾的通知您：\n\n
                                                            您的简历与该职位的定位有些不匹配，因此无法进入面试。
                                                            但您的信息已录入我司人才储备库，当有合适您的职位开放时我们将第一时间联系您，希望在未来我们有机会成为一起拼搏的同事；\n\n
                                                            再次感谢您对我们的信任，祝您早日找到满意的工作。"; */
                        //SendMail($user['email'],"非常荣幸收到您的简历!",$content);
                    }
                }


                $arr['state']=5;
            }
        }
        exit(json_encode($arr));
    }

    //简历转发到邮箱
    function forward(){
        $this->checkUser();
        $aid = intval(trim($_POST['deliverId']));
        $info = M("jobs_apply")->where(array('aid'=>$aid))->find();
        if(!$info){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        $content = addslashes(trim($_POST['content']));
        $to_email = addslashes(trim($_POST['recipients']));
        $title = addslashes(trim($_POST['title']));
        $to_email = str_replace("；", ";", $to_email);
        if($aid && $to_email && $title){
            $user = $this->getUsersInfoById($info['uid']);
            $to_email_arr = explode(";", $to_email);

            if($to_email_arr){
            	$job = M("jobs")->where(array('jid'=>$info['jid']))->find();
            	$company = $this->getUsersInfoById($job['uid']);
            	$last_edu = getUserLastEdu($user['uid']);
            	$last_work = getUserLastWork($user['uid']);
            }

            foreach ($to_email_arr as $k=>$v){
                if(!isEmail($v)){
                    continue;
                }
                $code = rand(100000,999999);
                $token = md5($code.$v);
                M("jobs_apply_forward")->add(array(
                    'aid'=>$aid,
                    'send_time'=>time(),
                    'email'=>$v,
                    'uid'=>$this->uid,
                    'code'=>$code,
                    'token'=>$token,
                    "title"=>$user['realname'],
                ));

                $email_arr = array(
                		'position_name'=>$job['zhiwei_mingcheng'],
                		'company_name'=>$company['company_short_name'],
                		'realname'=>$user['realname'],

                		'content'=>$content,

                		'sex'=>$user['sex']==2?"女":"男",
                		'edu'=>$user['edu'],
                		'workyear'=>$user['workyear'],
                		'city'=>$user['city'],
                		'status'=>$user['workstatus'],
                		'uid'=>$user['uid'],
                		'email_name'=>getEmailName($v),

                		'xueli'=>$last_edu['company_name'],
                		'xuexiao'=>$last_edu['education'],
                		'zhiwei'=>$last_work['positionName'],
                		'company'=>$last_work['companyName'],
                    
                        'aid'=>$info['aid'],

                );
                $email_tpl = getSendEmailTpl(7,$email_arr);
                SendMail($v,$email_tpl['title'],$email_tpl['content']);

                //$content .= $this->resumePreview($info['uid'],1);
                /* 毕业院校：本科 · 广西贺州学院<br />
                                        最近工作：UI设计师 · 普晴科技有限公司<br /> */
                /* $content .= " <br /><br />
                 ".$user_info['realname']."的简历<br />
                ".$user_info['workstatus']." | ".$user_info['edu']." | ".$user_info['workyear']."工作经验 | ".$user_info['city']."<br />

                                        目前状态：".$user_info['workstatus']."<br /><br />
                                        为保证数据安全，查看完整简历时请输入验证码：<span style='color:red;'>$code</span> <br /><br />
                <a href='".WEB_URL."Company/checkForwardEmail/?token=".$token."'>登陆查看</a>";
                SendMail($v,$title,$content); */

            }

            if($to_email_arr){
            	$email_arr = array(
            		'position_name'=>$job['zhiwei_mingcheng'],
            		'company_name'=>$company['company_short_name'],
            		'resume_status'=>"被转发",
            	);
            	$email_tpl = getSendEmailTpl(8,$email_arr);
            	SendMail($user['email'],$email_tpl['title'],$email_tpl['content']);
            }

            $this->exitJson(1,true,"操作成功",array("state"=>1));
        }
        else $this->exitJson(0,false,"参数无效",array("state"=>0));
    }

    //删除不合适简历
    function deleteRefuse(){

        $aid = addslashes(trim($_POST['deliverIds']));

        if(!$aid ){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        else{
            $check = M("jobs_apply")->where(array('aid'=>array("in",$aid)))->delete();
            if($check){
                $this->exitJson(1,true,"操作成功",array("state"=>3));
            }
            else $this->exitJson(0,false,"删除失败，请稍后再试",array("state"=>0));
        }
    }

    //通过邮箱转发查看简历
    function checkForwardEmail(){
        $token = addslashes(trim($_REQUEST['token']));
        if($token){
            $info = M("jobs_apply_forward")->where(array('token'=>$token))->find();
            if(!$info){
                //$this->error("来源无效","/");
                $this->exitJson(0,false,"来源无效",array("state"=>302));
            }
            if($info && $info['is_check'] && is_login() ){
                //登陆过    而且通过验证
                $apply = M("jobs_apply")->where(array('aid'=>$info['aid']))->find();
                $this->resumePreview($apply['uid']);
                exit;
            }

            if(IS_POST){
                $code = intval($_POST['code']);
                if($code){

                    if($info['code']==$code){
                        //$this->redirect("");
                        //$apply = M("jobs_apply")->where(array('aid'=>$info['aid']))->find();
                        //$this->resumePreview($apply['uid']);
                        M("jobs_apply_forward")->where(array('fid'=>$info['fid']))->save(array('is_check'=>1));
                        $this->exitJson(1,true,"验证通过",array("state"=>1));
                    }
                    else $this->exitJson(0,false,"验证码错误",array("state"=>601));
                }
                else $this->exitJson(0,false,"验证码错误",array("state"=>601));
            }

        }
        else $this->exitJson(0,false,"来源无效",array("state"=>302));

        $this->assign(array("token"=>$token,"realname"=>$info['title']));
        $this->display();

    }

    //查找已转发邮箱列表
    function showForwardEmails(){
        $this->checkUser();
        $deliverId = intval($_POST['deliverId']);
        if(!$deliverId){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        $forward_record = getForwardRecord($deliverId);
        $emails = array();
        foreach ($forward_record as $k=>$v){
            $emails[] = $v['email'];
        }
        $this->exitJson(1,true,"操作成功",array("state"=>1,'data'=>array("emails"=>$emails)));

    }

    //已面试
    function offline(){
        $arr = array(
            'state'=>0,
            'message'=>"操作成功",
        );
        $this->checkUser();
        $aid = intval(trim($_POST['relationId']));
        $interviewTime = addslashes(trim($_POST['interviewTime']));
        if(!$aid || !$interviewTime){
            $arr['message']="非法操作！";
        }
        else{
            $info = M("jobs_apply")->where(array('aid'=>$aid))->find();
            if(!$info){
                $arr['message']="非法操作！";
            }
            else{
                //发送邮件
                $data = array(
                    'status'=>2,
                    'interviewTime'=>$interviewTime,
                );
                M("jobs_apply")->where(array('aid'=>$aid))->save($data);

                $arr['state']=1;
            }
        }
        exit(json_encode($arr));
    }

    

}
?>