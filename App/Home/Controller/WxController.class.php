<?php
// weixin

namespace Home\Controller;

use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class WxController extends HomeController{
    
    //public $hash;//cwxu  bwxu
    //public $account;
    
    function __construct(){
        
        parent::__construct();
        
        error_reporting(E_ALL);
        
        //$this->hash = trim($_REQUEST['hash']);
        
        //$this->account = getWxConfig($this->hash);
        if(!$this->hash || !$this->account){
            addWxLog($this->account['yid'],$_REQUEST,'参数无效',array('type'=>'error'));
            exit("参数无效");
        }
    }
    
    
    
    
    /**
     * 微信消息接口入口
     * 所有发送到微信的消息都会推送到该操作
     * 所以，微信公众平台后台填写的api地址则为该操作的访问地址
     */
    public function index($id = ''){
        
        //调试
        try{
            $appid = $this->account['appid']; //AppID(应用ID)
            $token = $this->account['token']; //微信后台填写的TOKEN
            $crypt = $this->account['aeskey']; //消息加密KEY（EncodingAESKey）
            
            /* 加载微信SDK */
            $wechat = new Wechat($token, $appid, $crypt);
            
            /* 获取请求信息 */
            $data = $wechat->request();
            
            //记录微信推送过来的数据
            addWxLog($this->account['yid'],$data,'');

            if($data && is_array($data)){
                /**
                 * 你可以在这里分析数据，决定要返回给用户什么样的信息
                 * 接受到的信息类型有10种，分别使用下面10个常量标识
                 * Wechat::MSG_TYPE_TEXT       //文本消息
                 * Wechat::MSG_TYPE_IMAGE      //图片消息
                 * Wechat::MSG_TYPE_VOICE      //音频消息
                 * Wechat::MSG_TYPE_VIDEO      //视频消息
                 * Wechat::MSG_TYPE_SHORTVIDEO //视频消息
                 * Wechat::MSG_TYPE_MUSIC      //音乐消息
                 * Wechat::MSG_TYPE_NEWS       //图文消息（推送过来的应该不存在这种类型，但是可以给用户回复该类型消息）
                 * Wechat::MSG_TYPE_LOCATION   //位置消息
                 * Wechat::MSG_TYPE_LINK       //连接消息
                 * Wechat::MSG_TYPE_EVENT      //事件消息
                 *
                 * 事件消息又分为下面五种
                 * Wechat::MSG_EVENT_SUBSCRIBE    //订阅
                 * Wechat::MSG_EVENT_UNSUBSCRIBE  //取消订阅
                 * Wechat::MSG_EVENT_SCAN         //二维码扫描
                 * Wechat::MSG_EVENT_LOCATION     //报告位置
                 * Wechat::MSG_EVENT_CLICK        //菜单点击
                 */
                
                if($data['MsgType']=='event' && $data['Event']){
                    switch ($data['Event']){
                        case Wechat::MSG_EVENT_CLICK:
                            //$wechat->replyText("你确定要解绑或是绑定吗？");
                            $check = checkUserWxBind($data['FromUserName']);
                            if($check){
                                $wechat->replyText( "真的要解除绑定吗？\r\n请在下方输入框回复“解绑”！" );
                            }
                            else{
                                $wechat->replyText( "您还未绑定账号:\r\n ".
                                    '<a href="'.WEB_URL.'User/login/wx_hash/'.$this->hash.'/">前去绑定</a>' );
                            }
                            exit;
                            break;
                        /* case Wechat::MSG_EVENT_VIEW:
                            $wechat->replyText("你确定要跳转吗？");
                            addWxLog($this->account['yid'],"gotourl",'');
                            exit;
                            break; */
                    }
                    
                    //exit;
                }
                
                
                //记录openid
                //session("wx_openid",$data['FromUserName']);

                

                /* 响应当前请求(自动回复) */
                //$wechat->response($content, $type);

                /**
                 * 响应当前请求还有以下方法可以使用
                 * 具体参数格式说明请参考文档
                 * 
                 * $wechat->replyText($text); //回复文本消息
                 * $wechat->replyImage($media_id); //回复图片消息
                 * $wechat->replyVoice($media_id); //回复音频消息
                 * $wechat->replyVideo($media_id, $title, $discription); //回复视频消息
                 * $wechat->replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id); //回复音乐消息
                 * $wechat->replyNews($news, $news1, $news2, $news3); //回复多条图文消息
                 * $wechat->replyNewsOnce($title, $discription, $url, $picurl); //回复单条图文消息
                 * 
                 */
                
                //执行
                $this->reply($wechat, $data);
            }
        } catch(\Exception $e){
            
            addWxLog($this->account['yid'],json_encode($e->getMessage()),'服务器繁忙，请稍后再试。',array("type"=>'error') );
            $wechat->replyText("服务器繁忙，请稍后再试。");
        }
        
    }
    
    
    /**
     * reply
     * @param  Object $wechat Wechat对象
     * @param  array  $data   接受到微信推送的消息
     */
    private function reply($wechat, $data){
        switch ($data['MsgType']) {
            case Wechat::MSG_TYPE_EVENT:
                switch ($data['Event']) {
                    case Wechat::MSG_EVENT_SUBSCRIBE:
                        
                        $wechat_auth = new WechatAuth($this->account['appid'], $this->account['apps']);
                        
                        $userinfo = $wechat_auth->getUserInfo_new($data['FromUserName']);
                        
                        //addWxLog($this->account['yid'],$userinfo,'');
                        
                        addFollow($userinfo,$this->account['yid'],1);
                        
                        $wechat->replyText( str_replace("[WEB_URL]", WEB_URL, C("CWX_WELCOME")) );
                        break;
    
                    case Wechat::MSG_EVENT_UNSUBSCRIBE:
                        //取消关注，解除绑定
                        //addWxLog($this->account['yid'],$data,'');
                        M("wx_follow")->where(array('openid'=>$data['FromUserName'],'token'=>$this->account['yid']))->save(array('status'=>-1));
                        break;
    
                    default:
                        //$wechat->replyText("欢迎访问'.$this->account['appid'].'！您的事件类型：{$data['Event']}，EventKey：{$data['EventKey']}");
                        break;
                }
                break;
    
            case Wechat::MSG_TYPE_TEXT:
                
                $keyword = trim($data['Content']);
                if($keyword){
                    if($keyword=="绑定/解绑"){
                        $check = checkUserWxBind($data['FromUserName']);
                        if($check){
                            $wechat->replyText( "真的要解除绑定吗？\r\n请在下方输入框回复“解绑”！" );
                        }
                        else{
                            $wechat->replyText( "您还未绑定账号。\r\n ".
                                '<a href="'.WEB_URL.'User/login/wx_hash/'.$this->hash.'/">前去绑定账号</a>' );
                        }
                    }
                    else if($keyword=="绑定"){
                        $check = checkUserWxBind($data['FromUserName']);
                        if($check){
                            $wechat->replyText( "您的账号已成功绑定了，如需解绑请回复“解绑”！" );
                        }
                        else{
                            $wechat->replyText( "".
                                '<a href="'.WEB_URL.'User/login/wx_hash/'.$this->hash.'/">前去绑定账号</a>' );
                        }
                    }
                    else if($keyword=="解绑"){
                        $check = checkUserWxBind($data['FromUserName']);
                        if($check){
                            M("member")->where(array("uid"=>$check['uid']))->save(array("bind_openid"=>'','bind_status'=>-1));
                                                
                            session('user_auth', NULL);
                            session('wx_openid', NULL);
                            session('user_auth_sign', NULL);
                            
                            //解绑模板消息
                            $um = M("ucenter_member")->where(array('id'=>$check['uid']))->find();
                            if($um){
                                $tpl_data = array(
                                    'first'=>'账号已解除绑定',
                                    'remark'=>'',
                                    'keyword1'=>$um['email'],
                                    'keyword2'=>"解除绑定",
                                    'keyword3'=>date("Y-m-d H:i:s"),
                                );
                                $rr = sendTplMsgById($this->hash,2,$check['bind_openid'],$tpl_data,WEB_URL."Jobs/index/wx_hash/".$this->hash);
                            }
                            
                            /* if(isset($rr['errcode']) && $rr['errcode']===0){
                                
                            }
                            else  */
                                
                            $wechat->replyText( "您的账号已成功解除绑定！" );
                        }
                        else{
                            $wechat->replyText( "您还未绑定账号，无需解绑" );
                        }
                    }
                    elseif($this->hash=='cwxu'){
                        //匹配职位                       
                        
                        $maps = array();
                        $orderby = "j.hits desc";
                        $maps['j.zhiwei_mingcheng|c.company_name|c.company_short_name'] =array(array('like','%'.$keyword.'%'),array('like','%'.$keyword.'%'),array('like','%'.$keyword.'%'),'_multi'=>true);
                        //$maps['j.zhiwei_mingcheng'] =array(array('like','%'.$keyword.'%') );
                        
                        $list = $this->getJobsListByCondition($maps,'0,9',$orderby);
                        
                        //addWxLog($this->account['yid'],"search",M("Jobs")->getLastSql());
                        
                        if($list){
                            $news = array();
                            $news[] = array(
                                "符合搜索条件的职位如下:",
                                "",
                                "http://jobsminer.cc/Company/info/id/100012/wx_hash/".$this->hash,
                                WEB_URL."Public/Home/images/news_logo.jpg"
                            );
                            foreach ($list  as $kk=>$vv){
                                $news[] = array(
                                    $vv['zhiwei_mingcheng'],
                                    "",
                                    WEB_URL."Jobs/info/id/".$vv['jid']."/wx_hash/".$this->hash,
                                    WEB_URL.$vv['logo']
                                );
                            }
                            $wechat->replyNews($news);
                        }
                        else $wechat->replyText( "暂未找到相关职位" );
                        
                        break;
                    }
                }
                
                
                /* switch ($data['Content']) {
                    case '文本':
                        $wechat->replyText('欢迎访问'.$this->account['name'].'，这是文本回复的内容！');
                        break;
    
                    case '图文':
                        $wechat->replyNewsOnce(
                        "全民创业蒙的就是你，来一盆冷水吧！",
                        "全民创业已经如火如荼，然而创业是一个非常自我的过程，它是一种生活方式的选择。从外部的推动有助于提高创业的存活率，但是未必能够提高创新的成功率。第一次创业的人，至少90%以上都会以失败而告终。创业成功者大部分年龄在30岁到38岁之间，而且创业成功最高的概率是第三次创业。",
                        "http://www.topthink.com/topic/11991.html",
                        "http://yun.topthink.com/Uploads/Editor/2015-07-30/55b991cad4c48.jpg"
                            ); //回复单条图文消息
                            break;
    
                    case '多图文':
                        $news = array(
                        "全民创业蒙的就是你，来一盆冷水吧！",
                        "全民创业已经如火如荼，然而创业是一个非常自我的过程，它是一种生活方式的选择。从外部的推动有助于提高创业的存活率，但是未必能够提高创新的成功率。第一次创业的人，至少90%以上都会以失败而告终。创业成功者大部分年龄在30岁到38岁之间，而且创业成功最高的概率是第三次创业。",
                        "http://www.topthink.com/topic/11991.html",
                        "http://yun.topthink.com/Uploads/Editor/2015-07-30/55b991cad4c48.jpg"
                            ); //回复单条图文消息
    
                        $wechat->replyNews($news, $news, $news, $news, $news);
                        break; 
    
                    default:
                        //$wechat->replyText("欢迎访问".$this->account['name']."！您输入的内容是：{$data['Content']}");
                        break;
                } */
                break;
    
            default:
                # code...
                break;
        }
        
        
        
        $wechat->replyText(C("CWX_DEFAULT"));

        
    }
    

    /**
     * DEMO
     * @param  Object $wechat Wechat对象
     * @param  array  $data   接受到微信推送的消息
     
    private function demo($wechat, $data){
        switch ($data['MsgType']) {
            case Wechat::MSG_TYPE_EVENT:
                switch ($data['Event']) {
                    case Wechat::MSG_EVENT_SUBSCRIBE:
                        $wechat->replyText('欢迎您关注'.$this->account['name'].'！回复关键词”查看相应的信息！');
                        break;

                    case Wechat::MSG_EVENT_UNSUBSCRIBE:
                        //取消关注，记录日志
                        break;

                    default:
                        $wechat->replyText("欢迎访问".$this->account['name']."！您的事件类型：{$data['Event']}，EventKey：{$data['EventKey']}");
                        break;
                }
                break;

            case Wechat::MSG_TYPE_TEXT:
                switch ($data['Content']) {
                    case '文本':
                        $wechat->replyText('欢迎访问'.$this->account['name'].'，这是文本回复的内容！');
                        break;

                    case '图片':
                        //$media_id = $this->upload('image');
                        $media_id = '1J03FqvqN_jWX6xe8F-VJr7QHVTQsJBS6x4uwKuzyLE';
                        $wechat->replyImage($media_id);
                        break;

                    case '语音':
                        //$media_id = $this->upload('voice');
                        $media_id = '1J03FqvqN_jWX6xe8F-VJgisW3vE28MpNljNnUeD3Pc';
                        $wechat->replyVoice($media_id);
                        break;

                    case '视频':
                        //$media_id = $this->upload('video');
                        $media_id = '1J03FqvqN_jWX6xe8F-VJn9Qv0O96rcQgITYPxEIXiQ';
                        $wechat->replyVideo($media_id, '视频标题', '视频描述信息。。。');
                        break;

                    case '音乐':
                        //$thumb_media_id = $this->upload('thumb');
                        $thumb_media_id = '1J03FqvqN_jWX6xe8F-VJrjYzcBAhhglm48EhwNoBLA';
                        $wechat->replyMusic(
                            'Wakawaka!', 
                            'Shakira - Waka Waka, MaxRNB - Your first R/Hiphop source', 
                            'http://wechat.zjzit.cn/Public/music.mp3', 
                            'http://wechat.zjzit.cn/Public/music.mp3', 
                            $thumb_media_id
                        ); //回复音乐消息
                        break;

                    case '图文':
                        $wechat->replyNewsOnce(
                            "全民创业蒙的就是你，来一盆冷水吧！",
                            "全民创业已经如火如荼，然而创业是一个非常自我的过程，它是一种生活方式的选择。从外部的推动有助于提高创业的存活率，但是未必能够提高创新的成功率。第一次创业的人，至少90%以上都会以失败而告终。创业成功者大部分年龄在30岁到38岁之间，而且创业成功最高的概率是第三次创业。", 
                            "http://www.topthink.com/topic/11991.html",
                            "http://yun.topthink.com/Uploads/Editor/2015-07-30/55b991cad4c48.jpg"
                        ); //回复单条图文消息
                        break;

                    case '多图文':
                        $news = array(
                            "全民创业蒙的就是你，来一盆冷水吧！",
                            "全民创业已经如火如荼，然而创业是一个非常自我的过程，它是一种生活方式的选择。从外部的推动有助于提高创业的存活率，但是未必能够提高创新的成功率。第一次创业的人，至少90%以上都会以失败而告终。创业成功者大部分年龄在30岁到38岁之间，而且创业成功最高的概率是第三次创业。", 
                            "http://www.topthink.com/topic/11991.html",
                            "http://yun.topthink.com/Uploads/Editor/2015-07-30/55b991cad4c48.jpg"
                        ); //回复单条图文消息

                        $wechat->replyNews($news, $news, $news, $news, $news);
                        break;
                    
                    default:
                        $wechat->replyText("欢迎访问".$this->account['name']."！您输入的内容是：{$data['Content']}");
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }*/

    /**
     * 资源文件上传方法
     * @param  string $type 上传的资源类型
     * @return string       媒体资源ID
     */
    private function upload($type){
        exit;
        $appid     = $this->account['appid'];
        $appsecret = $this->account['apps'];

        $token = session("token");

        if($token){
            $auth = new WechatAuth($appid, $appsecret, $token);
        } else {
            $auth  = new WechatAuth($appid, $appsecret);
            $token = $auth->getAccessToken();

            session(array('expire' => $token['expires_in']));
            session("token", $token['access_token']);
        }

        switch ($type) {
            case 'image':
                $filename = './Public/image.jpg';
                $media    = $auth->materialAddMaterial($filename, $type);
                break;

            case 'voice':
                $filename = './Public/voice.mp3';
                $media    = $auth->materialAddMaterial($filename, $type);
                break;

            case 'video':
                $filename    = './Public/video.mp4';
                $discription = array('title' => '视频标题', 'introduction' => '视频描述');
                $media       = $auth->materialAddMaterial($filename, $type, $discription);
                break;

            case 'thumb':
                $filename = './Public/music.jpg';
                $media    = $auth->materialAddMaterial($filename, $type);
                break;
            
            default:
                return '';
        }

        if($media["errcode"] == 42001){ //access_token expired
            session("token", null);
            $this->upload($type);
        }

        return $media['media_id'];
    }
    
    
    //模板消息发送
    function sendTplMsg() {
        
        //exit("ok");
        
        $uid = trim($_REQUEST['uid']);
        $hash = trim($_REQUEST['hash']);
        $url = trim($_REQUEST['url']);
        $tid = intval($_REQUEST['tid']);
        if(!$hash || !$tid){
            exit("error...");
        }
        if($_REQUEST['data']){
            $data = unserialize($_REQUEST['data'] );
        }
        else{
            exit("no data");
        }        
        
        if($uid){
            $user = M("member")->where(array("uid"=>$uid))->find();
            if($user&&$user['bind_openid']&&$user['bind_status']){
                
            }
            else{
                //exit("no user");
                $user['bind_openid'] = $uid;
            }
        }
        else{
            exit("no user ... ");
        }
        
        $tpl_content = $this->configTplMsg($hash,$tid);
        if($tpl_content){
            
            $tplid = $tpl_content['tplid'];
            $content = $tpl_content['content'];
            
            $tpl_data = array();
            ///^\d{1,6}\.{0,1}\d{0,2}$/  /src : '(.*?)',/
            preg_match_all('/\{\{(.*?)\.DATA\}\}/', $content,$match_all);
            
            
            foreach ($match_all[1] as $m=>$mm){
                $value = $data[$mm];
                if($mm=='first'){
                    if(!$value) $value = '详情如下：';
                }
                if($mm=='remark'){
                    if(!$value) $value = '';
                }
                $tpl_data[$mm] = array(
                    "value"=>$value,
                    "color"=>"#173177",
                );
            }
            
            if(!$tpl_data){
                exit("no post data");
            }
            
            //print_test($tpl_data);
            
            $wechat_auth = new WechatAuth($this->account['appid'], $this->account['apps']);
            
            if(!$url){
                $url = WEB_URL."?wx_hash=".$this->hash;
            }
            $res = $wechat_auth->sendTemplateMessage($tplid,$user['bind_openid'],$tpl_data,$url );
            
            print_r($res);
            //exit("ok");
            
        }
        else {
            addWxLog($this->account['yid'],"tpl_error",$_REQUEST);
            exit("error tid");
        }
    }
    
    //配置模板消息格式
    function configTplMsg($hash,$key) {
        if( !$hash || !$key) {
            return '';
        }
        $arr = array(
            1=>array(
                'name'=>'微信绑定成功通知',
                'tplid'=>'h9OUJ8Q4t7xF1vv3YIQuKV30xCm7bclgT6jK7sreCVc',
                'content'=>'{{first.DATA}}
                                                            绑定帐号：{{keyword1.DATA}}
                                                            绑定状态：{{keyword2.DATA}}
                                                            绑定时间：{{keyword3.DATA}}
                        {{remark.DATA}}',                
            ),
            2=>array(
                'name'=>'微信解绑成功通知',
                'tplid'=>'2H9G5H_0oBKIkQM8v-Av_qkxgaRdfQ22rYCpiYEInvs',
                'content'=>'{{first.DATA}}
                                                            绑定帐号：{{keyword1.DATA}}
                                                            绑定状态：{{keyword2.DATA}}
                                                            绑定时间：{{keyword3.DATA}}
                        {{remark.DATA}}',
            ),
            3=>array(
                'name'=>'简历投递反馈通知',
                'tplid'=>'MF9vc4NklgXxYvbl-HPfdx-YDmApy9BvZGRhXg14oCg',
                'content'=>'{{first.DATA}}
                                                                职位名称：{{job.DATA}}
                                                                公司名称：{{company.DATA}}
                                                                投递时间：{{time.DATA}}
                         {{remark.DATA}}',
            ),
            4=>array(
                'name'=>'面试通知提醒',
                'tplid'=>'qrXkCSYZEDbU_pjk_Ply5bNmIJgoImskRRBEfDroKUA',
                'content'=>'{{first.DATA}}
                                                            面试职位：{{job.DATA}}
                                                            所属公司：{{company.DATA}}
                                                            面试时间：{{time.DATA}}
                                                            面试地点：{{address.DATA}}
                                                            联系人：{{contact.DATA}}
                                                            联系电话：{{tel.DATA}}
                        {{remark.DATA}}',
            ),
            5=>array(
                'name'=>'明日面试通知',
                'tplid'=>'FMLVrWpkdfBXknRdVpQMqh6V4I7Ix9iovJpg2Vrqao4',
                'content'=>'{{first.DATA}}
                                                            职位名称：{{keyword1.DATA}}
                                                            所属公司：{{keyword2.DATA}}
                                                            公司地址：{{keyword3.DATA}}
                                                            约定时间：{{keyword4.DATA}}
                                                            联系方式：{{keyword5.DATA}}
                        {{remark.DATA}}',
            ),
        );
        
        $arr2 = array(
            
        );
        
        if($hash=='cwxu'){
            return $arr[$key];
        }
        else return $arr2[$key];
        
    }
       
    
    //模拟测试
    function test(){
        exit;
        /* $res = sendTplMsgById('cwxu','1',100009,array(
                'first'=>'绑定信息如下：',
                'remark'=>'',
                'keyword1'=>"22222@qq.com",
                'keyword2'=>"绑定成功",
                'keyword3'=>"2015-09-03",
                
            ),''); */
        
        
        //解绑模板消息
        $um = M("ucenter_member")->where(array('id'=>100009))->find();
        $tpl_data = array(
            'first'=>'账号已解除绑定',
            'remark'=>'',
            'keyword1'=>$um['email'],
            'keyword2'=>"解除绑定",
            'keyword3'=>date("Y-m-d H:i:s"),
        );
        $res = sendTplMsgById($this->hash,2,100009,$tpl_data,WEB_URL."Jobs/index/wx_hash/".$this->hash);
        
        
        print_test($res);
    }
    
}
