<?php
// +----------------------------------------------------------------------
// | state
// +----------------------------------------------------------------------

namespace Admin\Controller;
use User\Api\UserApi as UserApi;

/**
 * 后台首页控制器
 */
class IndexController extends AdminController {

    /**
     * 后台首页
     */
    public function index(){
        if(UID){
            $this->meta_title = '管理首页';
            
            $p = intval($_REQUEST['p']);
            $p = $p<1?1:$p;
            $page_size = 30;
            
            $init = "2015-07-01";
            $init_start = strtotime($init);
            $time = time();
                        
            
            $today = date("Y-m-d");
            $today_start = strtotime($today);
            $tom_start = $today_start+3600*24;
            $yesday = date("Y-m-d",$time-3600*24);
            $yesday_start = strtotime($yesday);
            
            
            $total = ($today_start-$init_start)/(3600*24)+1;
            
            $this->_getPage_new($total,$page_size);
            
            
            $all_users = M("Member")->where(array("type"=>0))->count();
            $all_company = M("Member")->where(array("type"=>1))->count("distinct(com_id)");
            $all_jobs = M("Jobs")->where(array())->count();
            
            
            if($p==1){
                $stime = $today_start;
            }
            else {
                $stime = $today_start-($p-1)*($page_size*24*3600);
            }
            
            $list = array();
            $count = 0;
            for ($i=$stime;$i>=$init_start;$i=$i-3600*24){
                $temp = $i+3600*24;
                $count++;
                $list[] = array(
                    'date'=> date("Y-m-d",$i),
                    'users'=>M("Member")->where("type=0 and reg_time>='$i' and reg_time<'$temp' ")->count(),
                    "company"=>M("Member")->where("type=1 and reg_time>='$i' and reg_time<'$temp' ")->count("distinct(com_id)"),
                    "jobs"=>M("Jobs")->where("init_time>='$i' and init_time<'$temp' ")->count(),
                );
                if($count>=$page_size){
                    break;
                }
            }
            
            
            
            $this->assign(array(
                'all_users'=>$all_users,
                'all_company'=>$all_company,
                'all_jobs'=>$all_jobs,
                
                'yes_users'=>M("Member")->where("type=0 and reg_time>='$yesday_start' and reg_time<'$today_start' ")->count(),
                'yes_company'=>M("Member")->where(" type=1 and reg_time>='$yesday_start' and reg_time<'$today_start' ")->count("distinct(com_id)"),
                'yes_jobs'=>M("Jobs")->where(" init_time>='$yesday_start' and init_time<'$today_start' ")->count(),
                
                "list"=>$list,
            ));
            
            $this->display();
        } else {
            $this->redirect('Public/login');
        }
    }

}
