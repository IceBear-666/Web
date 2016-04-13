<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.xxxxxxx.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;
use Admin\Controller\PublicController;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {
    function __construct(){
        parent::__construct();
        $this->assign("cur_top_nav",array("plugin"=>'class="current"') );
    }


	//a:1:{s:8:"Filedata";a:5:{s:4:"name";s:8:"1213.jpg";s:4:"type";s:24:"application/octet-stream";s:8:"tmp_name";s:26:"D:\wamp2.5\tmp\php34B9.tmp";s:5:"error";i:0;s:4:"size";i:857374;}}
	function uploadImg() {

	    //fileTest($_POST,'',1);
	    //fileTest($_FILES,'',1);
	    
		$rs = $this->uploadFile("Filedata");
		print_r($rs['url']);
		exit();

	}

	function del() {
		$src=str_replace(__ROOT__.'/', '', str_replace('//', '/', $_GET['src']));
		/*if (file_exists($src)){
			unlink($src);
		}*/
		print_r($_GET['src']);
		exit();
	}

    public function index() {

        if(IS_WAP){
            $this->redirect("/Jobs/");
            exit;
        }

        $info = array(
            'province'=>0,
            'city'=>0,
        );
        //$web_config = $this->getWebConfig();
        //$about_page = M("pages")->where(array('pid'=>1))->find();
        //$index_ad = M("ad")->where('aid in (1,2,3,4,5)')->order("aid asc")->select();
        //$index_news = M("news")->where('status=1')->order("nid desc")->limit(0,2)->select();
        //$index_news = M("news")->table(C('DB_PREFIX')."news n")->join(C('DB_PREFIX')."news_info ni on n.nid = ni.nid")->where('n.status=1 and n.type=1')->field(" n.*,ni.content ")->order(" n.addtime desc")->limit('0,3')->select();

        //$new_case = M("Case")->where('status=1')->order("id desc")->limit(0,5)->select();

        $webCat = $this->getCatCache(0);
        //$companys_count = M("Member")->where(array('status'=>100))->count();
        //$jobs_count = M("Jobs")->where(array('status'=>1))->count();

        //$company_list = $this->getGongsiList("","","",100);

        $company_list = $this->getGongsiList('','','','',"c.sn asc,c.hits desc",1,"0,5");

        //print_test($company_list);

        $array = array(
            'webCat' => $webCat,
            'hot_keywords'=>C("HOT_KEYWORDS"),
            //'jobs_count'=>$jobs_count+100,
            'company_list' => $company_list,
            'jobs_list' => $this->getJobsListByCondition(array("j.status"=>1,"j.tj_index"=>1),'0,20',"j.sn asc,j.hits desc"),
            //'new_jobs' => $this->getJobsListByCondition(array("j.status"=>1)),
        );

        //$this->print_test($array['hot_jobs']);

        $this->assign($array);
        $this->display();

    }

    //网站地图
    public function sitemap() {
        /* $map = array("m.status"=>100,"m.c_shenfen"=>1 );
        $list =M("Member")->table(C('DB_PREFIX')."member m")
        ->join(C('DB_PREFIX')."member_info mf on m.uid = mf.uid")
        ->where($map)->field(" * ")->order(" m.uid desc")->limit('0,10000')->select(); */

        $this->assign( array('list'=>$list) );
        $this->display();
    }

    //友情链接
    public function flink(){

        $this->redirect("/Index");
    }

    //读取关键词
    /* Array
    (
        [hotwords] => Array
        (
            [0] => Array
            (
                [text] => 交互设计
                [url] => http://www.lagou.com/zhaopin/jiaohusheji?labelWords=hot
                [isHighLight] =>
                [weight] => 20
            )

            [1] => Array
            (
                [text] => .NET
                [url] => http://www.lagou.com/zhaopin/.NET?labelWords=hot
                [isHighLight] =>
                [weight] => 19
            )

            [2] => Array
            (
                [text] => 项目经理
                [url] => http://www.lagou.com/zhaopin/xiangmujingli?labelWords=hot
                [isHighLight] => 1
                [weight] => 18
            )

            [3] => Array
            (
                [text] => 数据运营
                [url] => http://www.lagou.com/zhaopin/shujuyunying?labelWords=hot
                [isHighLight] =>
                [weight] => 17
            )

            [4] => Array
            (
                [text] => SEO
                [url] => http://www.lagou.com/zhaopin/SEO?labelWords=hot
                [isHighLight] =>
                [weight] => 16
            )

            [5] => Array
            (
                [text] => 移动产品经理
                [url] => http://www.lagou.com/zhaopin/yidongchanpinjingli?labelWords=hot
                [isHighLight] =>
                [weight] => 15
            )

            [6] => Array
            (
                [text] => 新媒体运营
                [url] => http://www.lagou.com/zhaopin/xinmeitiyunying?labelWords=hot
                [isHighLight] =>
                [weight] => 14
            )

        )

        [recommendSearchWord] => Array
        (
            [text] => iOS
            [url] => http://www.lagou.com/jobs/list_iOS?kd=iOS&spc=&pl=&gj=&xl=&yx=&gx=&st=&labelWords=&lc=&workAddress=&city=&requestId=
            [isHighLight] =>
        )

    ) */
    public function getKeywords(){
        $keywords = getHotKeywords();
        $callback = $_REQUEST['callback'];
        $hot_keywords = explode(";", C("HOT_KEYWORDS"));
        $data = array();
        foreach ($hot_keywords as $k =>$v){
        	$data[]  = Array(
        		'text' => $v,
        		'url' => '/Jobs/index.html?kd='.$v,
        		'isHighLight' =>true,
        		'weight' => '20'
        	);
        }
        //spc=  搜索类型
        $data = array(
            'hotwords'=>$data,
            'recommendSearchWord'=>Array(
                'text' => $hot_keywords[0],
                'url' => '/Jobs/index.html?kd='.$hot_keywords[0].'&spc=&pl=&gj=&xl=&yx=&gx=&st=&labelWords=&lc=&workAddress=&city=&requestId=',
                'isHighLight' => false,
            ),
        );
        exit("$callback(".json_encode($data).")");
    }

   


    //生产key
    function getDownCode($hid,$path){
        if(!$hid || !$path){
            return '';
        }
        $date = date("Y-m-d");
        $uid = $_SESSION['uid'];
        $ip = getIp();
        $str = md5($hid."_".$this->down_key."_".$ip."_".$uid."_".$path."_".$date);
        return $str;
    }

    //文件下载
    function Downloads(){

        $check = $this->check_is_login(1);
        if($check==0){
            exit('请先登录');
            exit;
        }

        // 1.判断是否登录 2.下载地址：判断是否存在以及是否已经下载过 3.
        $info = '';
        $hid = intval($_REQUEST['id']);
        if($hid){
            $map = array(
                'hid'=>$hid,
            );
            $info = M("house")->where($map)->find();
        }
        else {
            $this->error("地址无效");
        }

        if(!$info){
            $this->error("参数无效",'',0);
            exit;
        }

        //验证下载地址
        $new_code = $this->getDownCode($info['hid'],$info['file_path']);
        $code = addslashes($_REQUEST['code']);
        if( $new_code != $code ){
            $this->error("该下载地址已过期，请重新检索",__URL__,0);
            exit;
        }


        $file_name = $info['file_path'];     //下载文件名
        $file_dir = "./";        //下载文件存放目录
        $file_path = $file_dir . $file_name;
        //检查文件是否存在
        if (! file_exists ( $file_path )) {
            echo "文件找不到";
            exit ();
        }
        else {
            //打开文件
            $file = fopen ( $file_path, "r" );
            //输入文件标签
            Header ( "Content-type: application/octet-stream" );
            Header ( "Accept-Ranges: bytes" );
            Header ( "Accept-Length: " . filesize ( $file_path ) );
            Header ( "Content-Disposition: attachment; filename=" . $info['name'].".".get_extension($file_name) );
            //输出文件内容
            //读取文件内容并直接输出到浏览器
            echo fread ( $file, filesize ( $file_path ) );
            fclose ( $file );
            exit ();
        }

    }


    //获取新闻
    private function get_news() {
        $list = include DATA_PATH . '~news.php';
        //$list = array_slice(sortBy($list, 'id', 'desc'), 0, 4);
        return $list;
    }
    
    //初始化模板
    Public function initTpl() {exit("ok");
        $member = M("member")->select();
        foreach ($member as $k=>$v){
            addDefaultTpl($v['uid'],1);
            addDefaultTpl($v['uid'],2);
        }
        exit("ok");
    }
    
    //数据清空
    Public function clearData() {
        exit("ok".C('TMPL_ACTION_ERROR'));
        $code = $_REQUEST['code'];
        if($code==md5("2015")){
            M()->execute("truncate table ez_action_log");
            M()->execute("truncate table ez_calendar");
            M()->execute("truncate table ez_collection");
            M()->execute("truncate table ez_company_articles");
            M()->execute("truncate table ez_company_leads");
            M()->execute("truncate table ez_edu_experience");
            M()->execute("truncate table ez_feed");
            M()->execute("truncate table ez_feedback");
            M()->execute("truncate table ez_file");
            M()->execute("truncate table ez_jobs");
            M()->execute("truncate table ez_jobs_apply");
            M()->execute("truncate table ez_jobs_apply_log");
            M()->execute("truncate table ez_pro_experience");
            M()->execute("truncate table ez_resume_offline");
            M()->execute("truncate table ez_work_experience");
            M()->execute("truncate table ez_work_show");
            M()->execute("truncate table ez_work_skill");
        }
        exit("...");
    }
    
    //test
    function test(){
        //SendMail("2207787768@qq.com","ok","test");
    }

}