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
class KeepModel extends Model{

  Protected $viewFields = array(
		'keep' => array(
			'id' => 'kid', 'time' => 'ktime',
			'_type' => 'INNER'
			),
		'olapplication' => array(
			'id','company_name', 'path','link','url_link','start_time','start_time','uid',
			'_on' => 'keep.wid = olapplication.id'
			
			),
		
		
		);

  Public function getAll($wher){
  	$result = $this->where($where)->order('ktime DESC')->select();
 
		foreach ($result as $k => $v) {
			if ($v['result'] > 0) {
				$result[$k]['result'] = $db->find($v['result']);
			}
		}

		//return $result;
 //var_dump($result);

  }
	/*Public function getAll ($where, $limit) {
		$result = $this->where($where)->order('ktime DESC')->limit($limti)->select();

		$db = D('User');
		foreach ($result as $k => $v) {
			if ($v['isturn'] > 0) {
				$result[$k]['isturn'] = $db->find($v['isturn']);
			}
		}

		return $result;
	}*/

}
