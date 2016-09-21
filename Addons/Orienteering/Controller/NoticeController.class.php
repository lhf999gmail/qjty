<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class NoticeController extends OrienteeringController{

	var $model;
	var $config;
	function _initialize() {
		
		$this->model = $this->getModel ( 'ori_notice' );
		parent::_initialize ();
	}
	public function lists() {
		// $config = getAddonConfig ( 'Orienteering' );
		// $this->config = $config;
		//dump($this->config['project_status_lookup4']);

		parent::common_lists ( $this->model );
	}
	
	public function index() {
		$token = get_token ();
		$openid = get_openid();
		dump($token);
		dump($openid);
	}

}
