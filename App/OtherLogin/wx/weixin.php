<?php 
header("Content-type:text/html;charset=utf-8");
session_start();

class Weixin {    
    
    var $appid = "";
    var $appsecret = "";
    //var $lasttime = "";
    //var $access_token = "";
    //构造函数，获取Access Token
    public function __construct($appid = NULL, $appsecret = NULL)
    {
        if($appid){
            $this->appid = $appid;
        }
        if($appsecret){
            $this->appsecret = $appsecret;
        }
        /* $this->lasttime = $_SESSION['last_a_t_time'];
        $this->access_token = $_SESSION['last_a_t'];
    
        if (time() > ($this->lasttime + 7000)){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $res = $this->https_request($url);
            $result = json_decode($res, true);
    
            $this->access_token = $_SESSION['last_a_t'] = $result["access_token"];
            $this->lasttime = $_SESSION['last_a_t_time'] = time();
        } */
    
    }
    //获取用户基本信息
    public function get_user_info($openid,$access_token)
    {
        //$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->access_token."&openid=".$openid."&lang=zh_CN";
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."";
        $res = $this->https_request($url);
        return json_decode($res, true);
    }
    
    //https请求
    public function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    
    

    /* public function oauthWX($appid,$appkey){
        
        include('./class_weixin_adv.php');
        $weixin=new class_weixin_adv($appid,$appkey);
        if (isset($_GET['code'])){
            
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=appid&secret=secret&code=".$_GET['code']."&grant_type=authorization_code";
            $res = $weixin->https_request($url);
            $res=(json_decode($res, true));
            $row=$weixin->get_user_info($res['openid']);
            
            if ($row['openid']) {
               //这里写上逻辑,存入cookie,数据库等操作
              cookie('weixin',$row['openid'],25920000);
               
            }else{
              $this->error('授权出错,请重新授权!');
            }
            
        }else{
            echo "NO CODE";
        }
        
        $this->display();
    } */
    
}