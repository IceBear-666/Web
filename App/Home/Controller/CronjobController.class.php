<?php
// weixin

namespace Home\Controller;

use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class CronjobController extends HomeController{
    
    //public $hash;//cwxu  bwxu
    
    function __construct(){
        
        parent::__construct();
        
        error_reporting(E_ALL);
    }
    
    
    function index(){
        exit("ok");
    }
    
    //发送明天面试通知  每小时执行一次
    /* 职位名称：{{keyword1.DATA}}
            所属公司：{{keyword2.DATA}}
            公司地址：{{keyword3.DATA}}
            约定时间：{{keyword4.DATA}}
            联系方式：{{keyword5.DATA}} 
    */
    function sendNextDayInterview(){
        set_time_limit(1800);
        $hash = "cwxu";
        $today = strtotime(date("Y-m-d H:i:s"));
        $next = date("Y-m-d",$today+3600*24);
        $stop = date("Y-m-d H:i:s",$today+3600*25);       
        
        $count = 0;
        $list = M("jobs_apply")->where("status=1 and is_send_tpl_msg=0 and interviewTime>='$next' and interviewTime<'$stop' ")->select();
        
        foreach ($list as $k=>$info){
            
            //发模板消息
            $user = $this->getUsersInfoById($info['uid']);
            if($user['bind_openid']){
            
                $job = M("jobs")->where(array('jid'=>$info['jid']))->find();
                $company = $this->getUsersInfoById($job['uid']);
                
                $log = M("jobs_apply_log")->where(array('aid'=>$info['aid'],'type'=>4))->find();
                if($log['ext_data']){
                    $log['ext_data'] = unserialize($log['ext_data']);
                }
                 
                $tpl_data = array(
                    'first'=>$user['realname'].", 你好~~\n 再过24小时, ".$company['company_short_name']."向你发出的面试就要开始啦!!",
                    'remark'=>$info['contact_memo']?$info['contact_memo']:$log['ext_data']['memo']."\n期待你的好消息哦~~",
                    'keyword1'=>$job['zhiwei_mingcheng'],
                    'keyword2'=>$company['company_short_name'],
                    'keyword3'=>$info['contact_address']?$info['contact_address']:$log['ext_data']['address'],
                    'keyword4'=>$info['interviewTime'],
                    'keyword5'=>$info['contactPhone'],
                );
                
                $res = sendTplMsgById($hash,5,$user['uid'],$tpl_data,WEB_URL."User/delivery/type/0/aid/".$info['aid']."/wx_hash/".$hash );
                
                //if( !$res['errcode'] && $res['errmsg']=="ok" ){
                    
                    $count++;
                    M("jobs_apply")->where(array('aid'=>$info['aid']))->save(array('is_send_tpl_msg'=>1));
                    
                //}                
            
            }
            
            sleep(1);
            
        }
        
        echo $count;
        addWxLog($hash,"cron_job",$count);
        exit("");
        
    }
    
    
    //自动删除不合适的简历
    //B端7个工作日不查看简历的话, 自动回复C端”不合适”邮件, 并删除该简历
    function delResume(){
        set_time_limit(600);
        $time = time();
        $start_time = $time - 7*24*3600;
        //处理节假日、工作日
        $hoty = array(
            array(strtotime("2015-09-24"),strtotime("2015-10-07"),7),
            array(strtotime("2016-02-01"),strtotime("2016-02-14"),7),
            array(strtotime("2016-09-24"),strtotime("2016-10-07"),7),
        );
        
        $list = M("jobs_apply")->where("isread=0 and is_send_refuse_email=0 and addtime< '$start_time' ")->select();
        
        foreach ($list as $k=>$info){
            $run = 1;
            foreach ($hoty as $kk=>$vv){
                if($vv['addtime']>=$vv[0] && $vv['addtime']<=$vv[1]){
                    if($vv['addtime']>$start_time-$vv[2]*24*3600){
                        $run = 0;
                        break;
                    }                    
                }
            }
            
            //print_test($info);
            
            //echo $run;exit;
            
            if(!$run){
                continue;
            }
        
            //发不合适邮件
            $user = $this->getUsersInfoById($info['uid']);
            if($user && $user['email']){
                $job = M("jobs")->where(array('jid'=>$info['jid']))->find();
                $company = $this->getUsersInfoById($job['uid']);
                $email_tpl = getSendEmailTpl(9,array(
                    'position_name'=>$job['zhiwei_mingcheng'],
                    'company_name'=>$company['company_short_name'],
                    'realname'=>$user['realname'],
                
                    'content'=>'',
                ));
                //echo $user['email'];
                SendMail($user['email'],$email_tpl['title'],$email_tpl['content']);
            }
            
            $rs = M("jobs_apply")->where(array('aid'=>$info['aid']))->delete();
            if($rs){
                M("jobs_apply_log")->where(array('aid'=>$info['aid']))->delete();
            }
            
            //M("jobs_apply")->where(array('aid'=>$info['aid']))->save(array("is_send_refuse_email"=>1));
            
        }
        
        exit("ok");
        
    }
    
    
    //B端发布的职位如果在2个月内未做任何改动, 刷新, 编辑, 则2个月后自动下线
    function positionsOff(){
        set_time_limit(600);
        $time = time();
        $start = $time - 3600*24*30*2;
        
        $list = M("jobs")->where("status=1 and init_time<'$start' and addtime< '$start' and update_time< '$start' and refresh_time< '$start' ")->select();
        
        foreach ($list as $k=>$info){
            
            M("jobs")->where("jid='".$info['jid']."' ")->save( array("status"=>2,'offline_time'=>$time) );
        }
        
        exit("ok");
    }

    
}
