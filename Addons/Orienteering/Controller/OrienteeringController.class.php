<?php

namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class OrienteeringController extends AddonsController{
    
    var $model;
    var $config;
	function _initialize() {
		//parent::_initialize ();

		$Controller = strtolower(_CONTROLLER);
		
		//显示导航条
		$res ['title'] = '线路';
		$res ['url'] = addons_url ( 'Orienteering://Project/lists');
		$res ['class'] = $Controller == 'project' ? 'current' : '';
		$nav [] = $res;

		$res ['title'] = '参赛队';
		$res ['url'] = addons_url ( 'Orienteering://Team/lists');
		$res ['class'] = $Controller == 'team' ? 'current' : '';
		$nav [] = $res;

		$res ['title'] = '扫码记录';
		$res ['url'] = addons_url ( 'Orienteering://TaskAction/lists');
		$res ['class'] = $Controller == 'taskaction' ? 'current' : '';
		$nav [] = $res;

		$res ['title'] = '公告';
		$res ['url'] = addons_url ( 'Orienteering://Notice/lists');
		$res ['class'] = $Controller == 'notice' ? 'current' : '';
		$nav [] = $res;

		// $res ['title'] = '手机端配置';
		// $res ['url'] = addons_url ( 'Orienteering://WapConfig/config');
		// $res ['class'] = $Controller == 'wap' ? 'current' : '';
		// $nav [] = $res;

		$res ['title'] = '配置';
		$res ['url'] = addons_url ( 'Orienteering://Orienteering/config');
		$res ['class'] = $Controller == 'orienteering' ? 'current' : '';
		$nav [] = $res;


		
//addon/Orienteering/Orienteering/config

		//显示导航条
		// $param ['type'] = 2;
		// $res ['title'] = '快码';
		// $res ['url'] = addons_url ( 'Orienteering://LookupType/lists', $param );
		// $res ['class'] = $Controller == 'lookuptype' ? 'current' : '';
		// $nav [] = $res;

		// $res ['title'] = '配置';
		// $res ['url'] = addons_url ( 'Orienteering://Orienteering/config', $param );
		// $res ['class'] = $Controller == 'orienteering' ? 'current' : '';
		// $nav [] = $res;

		$this->assign ( 'nav', $nav );


		//$this->model = $this->getModel ( 'ori_projects' );
	}
	function lists()
	{
		$param ['type'] = 1;
		$url = addons_url ( 'Orienteering://Project/lists', $param );
		// dump($url);
		redirect ( $url );



	}
	
}
