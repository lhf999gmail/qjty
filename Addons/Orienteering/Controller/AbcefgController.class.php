<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class AbcefgController extends OrienteeringController{

	var $model;
	function _initialize() {
		
		$this->model = $this->getModel ( 'ori_team' );
		parent::_initialize ();
	}
	public function lists() {
		parent::common_lists ( $this->model );
	}
	
	public function index() {
		$token = get_token ();
		$openid = get_openid();
		dump($token);
		dump($openid);
	}

}
