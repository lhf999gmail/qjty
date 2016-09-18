<?php

namespace Addons\Orienteering\Model;
use Think\Model;

/**
 * TaskAction模型
 */
class TaskActionModel extends Model {
	var $tableName = 'ori_task_action';
	function addAction($task_id,$time,$uid,$openid,$token)
	{
		//任务信息
		$task = M('ori_task')->find($task_id);


		$save['project_id'] = $task['project_id'];
		$save['task_id'] = $task['id'];
		$save['start_time'] = $time;
		$save['team_id'] = 1;
		$save['uid'] = $uid;
		$save['openid'] = $openid;
		$save['token'] = $token;
		M('ori_task_action')->add($save);

		//$this->replyText ( 'addd' );
		//$weixin = D('Home/Weixin');
		return true;
	}

	function aa()
	{
		return true;
	}




	// function set($guess_id, $post) {
	// 	$opt_data ['guess_id'] = $guess_id;
	// 	foreach ( $post ['name'] as $key => $opt ) {
	// 		if (empty ( $opt ))
	// 			continue;
			
	// 		$opt_data ['name'] = $opt;
	// 		$opt_data ['image'] = $post ['image'] [$key];
	// 		$opt_data ['order'] = intval ( $post ['order'] [$key] );
	// 		if ($key > 0) {
	// 			// 更新选项
	// 			$optIds [] = $map ['id'] = $key;
	// 			$this->where ( $map )->save ( $opt_data );
	// 		} else {
	// 			// 增加新选项
	// 			$optIds [] = $this->add ( $opt_data );
	// 		}
	// 		// dump(M()->getLastSql());
	// 	}
	// 	// 删除旧选项
	// 	$map2 ['id'] = array (
	// 			'not in',
	// 			$optIds 
	// 	);
	// 	$map2 ['guess_id'] = $opt_data ['guess_id'];
	// 	$this->where ( $map2 )->delete ();
	// 	return true;
	// }
	// function getInfo($id, $update = false, $data = array()) {
	// 	$key = 'GuessOption_getInfo_' . $id;
	// 	$info = S ( $key );
	// 	if ($info === false || $update) {
	// 		$info = ( array ) (empty ( $data ) ? $this->find ( $id ) : $data);
			
	// 		S ( $key, $info, 86400 );
	// 	}
		
	// 	return $info;
	// }
	// function getGuessOption($guess_id, $update = false, $data = array()) {
	// 	$key = 'GuessOption_getGuessOption_' . $guess_id;
	// 	$info = S ( $key );
	// 	if ($info === false || $update) {
	// 		$map ['guess_id'] = $guess_id;
	// 		$info = ( array ) (empty ( $data ) ? $this->where ( $map )->order ( '`order` asc' )->select () : $data);
			
	// 		S ( $key, $info, 86400 );
	// 	}
		
	// 	return $info;
	// }
	// //投票选项信息的num+1
	// function updateOptCount($guess_id, $ids) {
	// 	$key_time = 'GuessOptioin_update_time_' . $guess_id;
	// 	$key_data = 'GuessOptioin_update_data_' . $guess_id;
	// 	$time = S ( $key_time );
	// 	$list_data = S ( $key_data );
	// 	// 解决最后的缓存无法写入数据库的问题
	// 	if (empty ( $ids ) && ! empty ( $list_data )) {
	// 		foreach ( $list_data as $d ) {
	// 			$map ['id'] = $d ['id'];
	// 			$res = $this->where ( $map )->setField ( 'guess_count', $d ['guess_count'] );
	// 		}
	// 		$this->getInfo ( $guess_id, true, $list_data );
	// 		S ( $key_time, NOW_TIME );
	// 		return true;
	// 	}
	// 	if ($time === false) {
	// 		S ( $key_time, NOW_TIME );
	// 	}
		
	// 	if ($list_data === false) {
	// 		$list = $this->getInfo ( $guess_id );
	// 		foreach ( $list as $v ) {
	// 			$list_data [$v ['id']] = $v;
	// 		}
	// 	}
		
	// 	foreach ( $ids as $id ) {
	// 		$list_data [$id] ['guess_count'] =intval($list_data [$id] ['guess_count'])+ 1;
	// 	}
	// 	if ($time === false || NOW_TIME - $time < 10) {
	// 		// 记录到缓存
	// 		S ( $key_data, $list_data );
	// 	} else {
	// 		// 记录到数据库
	// 		foreach ( $list_data as $d ) {
	// 			$map ['id'] = $d ['id'];
	// 			$res = $this->where ( $map )->setField ( 'guess_count', $d ['guess_count'] );
	// 		}
	// 		S ( $key_data, $list_data );
	// 		S ( $key_time, NOW_TIME );
	// 	}
	// 	$this->getInfo ( $guess_id, true, $list_data );
		
	// 	return true;
	// }
}
