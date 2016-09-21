<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class WapSignupController extends WapController{

	function _initialize() {
		parent::_initialize ();
		//$this->assign('nav',null);
		// $config = getAddonConfig ( 'Orienteering' );
		// $config ['cover_url'] = get_cover_url ( $config ['cover'] );
		// $config['background_arr']=explode(',', $config['background']);
		// $config ['background_id'] = $config ['background_arr'][0];
		// $config ['background'] = get_cover_url ( $config ['background_id'] );
		// $this->config = $config;
		// $this->assign ( 'config', $config );
		// //dump ( $config );
		// // dump(get_token());
		
		// // 定义模板常量
		// $act = strtolower ( _ACTION );
		// $temp = $config ['template_' . $act];
		// $act = ucfirst ( $act );
		// $this->assign ( 'page_title', '定向赛' );
		// define ( 'CUSTOM_TEMPLATE_PATH', ONETHINK_ADDON_PATH . 'Orienteering/View/default/Template' );
	}


	

	function step1()
	{
		//dump(get_openid ());
		$id = $map ['id'] = I ( 'get.id', 0, 'intval' );
		
		
		$info = M ( 'ori_project' )->where ( $map )->find ($id);
		//$info ['intro'] = str_replace ( chr ( 10 ), '<br/>', $info ['intro'] );
		$info ['signup_notice'] = str_replace ( chr ( 10 ), '<br/>', $info ['signup_notice'] );
		// dump($info);exit;

		$this->_footer (3);
		$this->assign ( 'info', $info );
		$this->assign ( 'page_title', '定向赛_报名');
		//dump($project_id);
		
		
		if (IS_POST){
			if ($_POST['agree'] != 1) {
            	$this->error ( '请同意协议' );
            	exit;
        	}
        	
        	$oriUserInfo = D ( 'OriUser' ) -> getOriUserInfo($this->mid);

        	$this->assign('data',$oriUserInfo);

        	$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step2.html' );

        	// if (empty($oriUserInfo['id_number'])){
        	// 	$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step2.html' );
        	// }else{
        	// 	$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step3.html' );
        	// }
        	
		}else{
			$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step1.html' );
		}

	}
	
	function step2()
	{
		//dump(get_openid ());
		$id = $map ['id'] = I ( 'get.id', 0, 'intval' );
		
		
		$info = M ( 'ori_project' )->where ( $map )->find ($id);
		$info ['intro'] = str_replace ( chr ( 10 ), '<br/>', $info ['intro'] );
		$info ['signup_notice'] = str_replace ( chr ( 10 ), '<br/>', $info ['signup_notice'] );
		// dump($info);exit;

		$this->_footer (3);
		$this->assign ( 'info', $info );
		$this->assign ( 'page_title', '定向赛_报名');
		//dump($project_id);
		
		
		if (IS_POST){
			
			//$errArr['truename'] = 'df';

			$errArr = array();
			$data = $_POST;
			$data['id'] = $id;
			//dump($data);

			$this->assign('data',$data);


			if (empty ($_POST['truename'])) {
            	$errArr['truename'] = '必填';
        	}
        	if (empty ($_POST['id_number'])) {
            	$errArr['id_number'] = '必填';
        	}
        	if (empty ($_POST['mobile'])) {
            	$errArr['mobile'] = '必填';
        	}
        	if (empty ($_POST['sex'])) {
            	$errArr['sex'] = '必填';
        	}

        	$this->assign('errArr',$errArr);

        	if ($errArr){
        		$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step2.html' );
        	}else{
        		$save['truename'] = $data['truename'];
        		$save['id_number'] = $data['id_number'];
        		$save['mobile'] = $data['mobile'];
        		$save['sex'] = $data['sex'];
        		$save['weight'] = $data['weight'];
        		$save['height'] = $data['height'];
        		$save['emergency_contact'] = $data['emergency_contact'];
        		$save['emergency_mobile'] = $data['emergency_mobile'];

        		D ( 'OriUser' ) -> updateOriUser($this->mid,$save);

				$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step3.html' );
        	} 
			
			
		}else{

			$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step2.html' );
		}

	}


	function step3()
	{
		//dump(get_openid ());
		$id = $map ['id'] = I ( 'get.id', 0, 'intval' );
		
		$info = M ( 'ori_project' )->where ( $map )->find ($id);
		//$info ['intro'] = str_replace ( chr ( 10 ), '<br/>', $info ['intro'] );
		//$info ['signup_notice'] = str_replace ( chr ( 10 ), '<br/>', $info ['signup_notice'] );
		// dump($info);exit;

		$this->_footer (3);
		$this->assign ( 'info', $info );
		$this->assign ( 'page_title', '定向赛_报名');
		//dump($project_id);
		
		
		if (IS_POST){
			
			//$errArr['truename'] = 'df';

			$errArr = array();
			$data = $_POST;
			$data['id'] = $id;
			
			//dump($data);
			$this->assign('data',$data);


			if (empty ($_POST['team_name'])) {
            	$errArr['team_name'] = '必填';
        	}
        	$this->assign('errArr',$errArr);

        	if ($errArr){
        		$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step3.html' );
        	}else{
        		$save['team_name'] = $data['team_name'];
        		$openid = get_openid();
        		$res = D ( 'OriUser' ) -> createTeam($this->mid,$openid,$id,$save);
        		//dump($res);

				$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step4.html' );
        	} 
			
			
		}else{

			$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/signup/step3.html' );
		}

	}


}
