<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class ProjectController extends OrienteeringController{

	var $model;
	function _initialize() {
		
		$this->model = $this->getModel ( 'ori_project' );
		parent::_initialize ();
	}
	public function lists() {
		parent::common_lists ( $this->model );
		
	}
	
	function task() {
		$param ['project_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Orienteering://Task/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function score(){
		$res ['title'] = '<<';
		$res ['url'] = addons_url ( 'Orienteering://Project/lists');
		$res ['class'] = '';
		$nav [] = $res;

		$this->assign ( 'nav', $nav );

		$id = I ( 'id', 0, 'intval' );

		$this->display ();
	}


}
