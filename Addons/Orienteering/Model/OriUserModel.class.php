<?php

namespace Addons\Orienteering\Model;

use Think\Model;

/**
 * Card模型
 */
class OriUserModel extends Model {
	public function getOriUserInfo($uid, $update = false) {
		if (! ($uid > 0))
			return false;

		$userInfo = D ( 'Common/User' )->getUserInfo ( $uid, $update);

		$map["uid"] = $uid;
		$oriUser = ( array ) $this->where($map)->find ();

		$userInfo = array_merge ( $userInfo, $oriUser);
		return $userInfo;
	}

	public function updateOriUser($uid,$data)
	{
		if (empty ( $uid ))
			return false;
		
		$user['truename'] = $data['truename'];
		$user['mobile'] = $data['mobile'];
		$user['sex']	= $data['sex'];
		D ( 'Common/User' )->updateInfo ( $uid,$user );


		unset($data['truename']);
		unset($data['id']);

		$data['uid'] = $uid;
		$data['cTime'] = time();
		$data['token'] = get_token();

		$map ['uid'] = $uid;
		$id = $this->where($map)->getField("id");
		//dump($id);
		if ($id > 0)
		{
			$res = $this->where($map)->save($data);
			
		}else{
			$res = $this->where($map)->add($data);
		}
		//$res = $this->where ( $map )->save ( $data );

		//dump ($res);
		// if ($res) {
		// 	$this->getOriUserInfo ( $uid, true );
		// }
		return $res;
	}
	public function createTeam($uid,$openid,$project_id,$data)
	{
		$map['leader_uid'] = $uid;
		$map['project_id'] = $project_id;

		$team_id =  M('ori_team') -> where($map) -> getField("id");
		if ($team_id > 0){
			//$this->error('已经报名过');
			return false;
		}else{
			$save['project_id'] = $project_id;
			$save['cTime'] = time();
			$save['team_name'] = $data['team_name'];
			$save['token'] = get_token();
			$save['leader_uid'] = $uid;
			$save['leader_openid'] = $openid;


			$res = M('ori_team')->add($save);
			return true;
		}

	}

	


	
}
