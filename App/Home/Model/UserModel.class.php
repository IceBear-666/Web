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
class UserModel extends Model{

//定义视图表关联关系
	Protected $viewFields = array(
		'olapplication' => array(
			'id','company_name', 'path','link','url_link','start_time','start_time','uid',
			'_type' => 'LEFT'
			),
		'member' =>array(
			'pic','realname',
			'_on' => 'olapplication.uid = member.uid',
			'_type' => 'LEFT'
			),
		'category' => array(
			'id', 'title', 'pid',
			'_on' => 'olapplication.id = category.wid'
			)
		);

  
}
