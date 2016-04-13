<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.xxxxxxx.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;
use User\Api\UserApi;

/**
 * 文档基础模型
 */
class MemberModel extends Model{

    /* 用户模型自动完成 */
    protected $_auto = array(
        array('login', 0, self::MODEL_INSERT),
        array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function', 1),
        array('reg_time', NOW_TIME, self::MODEL_INSERT),
        array('last_login_ip', 0, self::MODEL_INSERT),
        array('last_login_time', 0, self::MODEL_INSERT),
        array('update_time', NOW_TIME),
        array('user_status', 1, self::MODEL_INSERT),
    );

    /**
     * 登录指定用户
     * @param  integer $uid 用户ID
     * @return boolean      ture-登录成功，false-登录失败
     */
    public function login($uid){
        /* 检测是否在当前应用注册 */
        $user = $this->field(true)->find($uid);
        if(!$user){ //未注册
            /* 在当前应用中注册用户 */
        	$Api = new UserApi();
        	$info = $Api->info($uid);
            $user = $this->create(array('nickname' => $info[1], 'user_status' => 1));
            $user['uid'] = $uid;
            if(!$this->add($user)){
                $this->error = '前台用户信息注册失败，请重试！';
                return false;
            }
        } elseif($user['user_status']<1) {
            $this->error = '用户未激活或已禁用！'; //应用级别禁用
            return false;
        }

        /* 登录用户 */
        $this->autoLogin($user);

        //记录行为
        action_log('user_login', 'member', $uid, $uid);

        return true;
    }

    /**
     * 注销当前用户
     * @return void
     */
    public function logout(){
        session('user_auth', null);
        session('user_auth_sign', null);
    }

    /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function autoLogin($user){
        /* 更新登录信息 */
        $data = array(
            'uid'             => $user['uid'],
            'login_num'           => array('exp', '`login_num`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip'   => get_client_ip(1),
        );
        
        //微信绑定
        if( isWeixinBrowser() && in_array(session("wx_hash"), array("cwxu","bwxu")) ){
            if(session("wx_openid") && !$user['bind_openid'] ){
                if( session("wx_hash") == "cwxu" && $user['type']==0 ){
                    $data['bind_openid'] = session("wx_openid");
                    $data['bind_status'] = 1;
                }
                else if( session("wx_hash") == "bwxu" && $user['type']==1 ){
                    $data['bind_openid'] = session("wx_openid");
                    $data['bind_status'] = 1;
                }
            }
        }
        
        $this->save($data);
        
        if($data['bind_openid']){
            //模板消息
            $um = M("ucenter_member")->where(array('id'=>$user['uid']))->find();
            $tpl_data = array(
                'first'=>"恭喜你, 绑定成功!\n 以后可以使用微信收到简历的实时反馈哦~",
                'remark'=>'点击查看个人中心>>',
                'keyword1'=>$um['email'],
                'keyword2'=>"绑定成功，你可以使用该微信直接登录Jobsminer的网页版哦~",
                'keyword3'=>date("Y-m-d H:i:s"),
            );
            sendTplMsgById(session("wx_hash"),1,$user['uid'],$tpl_data,WEB_URL."User/index/wx_hash/".session("wx_hash"));
        }

        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'uid'             => $user['uid'],
            'nickname'             => $user['nickname'],
            'email'             => $user['email'],
            'username'        => get_username($user['uid']),
            'type'        => $user['type'],
        	'user_status'=>$user['user_status'],
            'status' => $user['status'],
            'last_login_time' => $user['last_login_time'],
        );
        /* $auth2 = array(
            'uid'             => $user['uid'],
            'last_login_time' => $user['last_login_time'],
        );
        session('user_auth_sign', data_auth_sign($auth2)); */

        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));

    }

}
