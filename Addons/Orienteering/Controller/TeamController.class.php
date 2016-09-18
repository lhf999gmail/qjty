<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class TeamController extends OrienteeringController{

	var $model;
	function _initialize() {
		
		$this->model = $this->getModel ( 'ori_team' );
		parent::_initialize ();
	}
	public function lists() {
		parent::common_lists ( $this->model );
	}
	
	function teamuser() {
		$param ['team_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Orienteering://TeamUser/lists', $param );
		// dump($url);
		redirect ( $url );
	}

}
