<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class WapConfigController extends OrienteeringController{
	var $config;
	function _initialize() {
		parent::_initialize ();
		//$this->assign('nav',null);
		$config = getAddonConfig ( 'Orienteering' );
		$config ['cover_url'] = get_cover_url ( $config ['cover'] );
		$config['background_arr']=explode(',', $config['background']);
		$config ['background_id'] = $config ['background_arr'][0];
		$config ['background'] = get_cover_url ( $config ['background_id'] );
		$this->config = $config;
		$this->assign ( 'config', $config );
		//dump ( $config );
		//dump(get_token());
		
		// 定义模板常量
		$act = strtolower ( _ACTION );
		$temp = $config ['template_' . $act];
		$act = ucfirst ( $act );
		$this->assign ( 'page_title', $config ['title'] );
		define ( 'CUSTOM_TEMPLATE_PATH', ONETHINK_ADDON_PATH . 'Orienteering/View/default/Template' );
	}


	function config() {
		$public_info = get_token_appinfo ();
		$normal_tips = '<a href="' . addons_url ( 'Orienteering://Wap/preview', array (
				'publicid' => $public_info ['id'] 
		) ) . '">预览</a>， <a id="copyLink" data-clipboard-text="' . addons_url ( 'Orienteering://Wap/index', array (
				'publicid' => $public_info ['id'] 
		) ) . '">复制链接</a><script type="application/javascript">$.WeiPHP.initCopyBtn("copyLink");</script>';
		$this->assign ( 'normal_tips', $normal_tips );
		
		$config = D ( 'Common/AddonConfig' )->get ( _ADDONS );
		// dump(_ADDONS);
		if (IS_POST) {
			$_POST ['config'] ['background'] = implode ( ',', $_POST ['background'] );
			// $config = array_merge ( ( array ) $config, ( array ) $_POST ['config'] );
			$flag = D ( 'Common/AddonConfig' )->set ( _ADDONS, $_POST ['config'] );
			if ($flag !== false) {
				if ($_GET ['from'] == 'preview') {
					$url = U ( 'preview' );
				} else {
					$url = Cookie ( '__forward__' );
				}
				$this->success ( '保存成功', $url );
			} else {
				$this->error ( '保存失败' );
			}
			exit ();
		}
		$config ['background_arr'] = explode ( ',', $config ['background'] );
		$config ['background'] = $config ['background_arr'] [0];
		$this->assign ( 'data', $config );
		$this->display ();
	
	}

	

}
