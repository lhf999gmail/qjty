<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class WapController extends AddonsController{

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
		// dump(get_token());
		
		// 定义模板常量
		$act = strtolower ( _ACTION );
		$temp = $config ['template_' . $act];
		$act = ucfirst ( $act );
		$this->assign ( 'page_title', $config ['title'] );
		define ( 'CUSTOM_TEMPLATE_PATH', ONETHINK_ADDON_PATH . 'Orienteering/View/default/Template' );
	}


	public function index()
	{
		$token = get_token ();
		$openid = get_openid();
		//dump($token);
		//dump($openid);

		if (1==1){


			// 分类
			// $map1 ['token'] = $map ['token'] = get_token ();
			// $map1 ['is_show'] = $map ['is_show'] = 1;
			// $map ['pid'] = 0; // 获取一级分类
			// $map1 ['token'] = $map ['token'] = get_token ();
			// $category = M ( 'weisite_category' )->where ( $map )->order ( 'sort asc, id desc' )->select ();
			// foreach ( $category as &$vo ) {
			// 	$vo ['icon'] = get_cover_url ( $vo ['icon'] );
			// 	empty ( $vo ['url'] ) && $vo ['url'] = addons_url ( 'WeiSite://WeiSite/lists', array (
			// 			'cate_id' => $vo ['id'] 
			// 	) );
			// }
			// $this->assign ( 'category', $category );
			// dump($category);
			// 幻灯片
			// $slideshow = M ( 'weisite_slideshow' )->where ( $map1 )->order ( 'sort asc, id desc' )->select ();
			// foreach ( $slideshow as &$vo ) {
			// 	$vo ['img'] = get_cover_url ( $vo ['img'] );
			// }
			
			// foreach ( $slideshow as &$data ) {
			// 	foreach ( $category as $cate ) {
			// 		if ($data ['cate_id'] == $cate ['id'] && empty ( $data ['url'] )) {
			// 			$data ['url'] = $cate ['url'];
			// 		}
			// 	}
			// }

			//dump($this->config);
			//$url = addons_url ( 'WeiSite://WeiSite/index');
			
			// 组装微信需要的图文数据，格式是固定的
			$dt['title'] = $this->config ['title'];
			$dt['info'] = $this->config ['info'];
			$dt['img'] = get_cover_url ( $this->config ['cover'] );
			//$dt['url'] = $url;

			$slideshow[] = $dt;

			$this->assign ( 'slideshow', $slideshow );
			// dump($slideshow);

			// dump($category);
			$map2 ['token'] = $map ['token'];
			$public_info = get_token_appinfo ( $map2 ['token'] );
			//$this->assign ( 'publicid', $public_info ['id'] );
			//$this->assign ( 'manager_id', $this->mid );

			$this->_footer ();


			$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/TemplateIndex/SimpleV1/index.html' );

		}
	}
			// 3G页面底部导航
	function _footer($temp_type = 'weiphp') {
		
			$list = D ( 'Addons://Orienteering/Footer' )->get_list ();
			
			foreach ( $list as $k => $vo ) {
				if ($vo ['pid'] != 0)
					continue;
				
				$one_arr [$vo ['id']] = $vo;
				unset ( $list [$k] );
			}
			
			foreach ( $one_arr as &$p ) {
				$two_arr = array ();
				foreach ( $list as $key => $l ) {
					if ($l ['pid'] != $p ['id'])
						continue;
					
					$two_arr [] = $l;
					unset ( $list [$key] );
				}
				
				$p ['child'] = $two_arr;
			}
			$this->assign ( 'footer', $one_arr );
			$html = $this->fetch ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/TemplateFooter/V2/footer.html' );
			$this->assign ( 'footer_html', $html );
		
	}


		/* 预览 */
	function preview() {
		$publicid = get_token_appinfo ( '', 'id' );
		$url = addons_url ( 'Orienteering://Wap/index', array (
				'publicid' => $publicid 
		) );
		$this->assign ( 'url', $url );
		
		$config = get_addon_config ( 'Orienteering' );
		
		$config ['background_arr'] = explode ( ',', $config ['background'] );
		$config ['background'] = $config ['background_arr'] [0];
		$this->assign ( 'data', $config );
		
		$this->display ();
	}

}
