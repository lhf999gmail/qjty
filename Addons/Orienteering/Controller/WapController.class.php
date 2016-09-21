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
		$this->assign ( 'page_title', '定向赛' );
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

			$this->_footer (1);

			$this->assign ( 'page_title', '定向赛_首页' );
			$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/index/index.html' );

		}
	}
			// 3G页面底部导航
	function _footer($cur_num = 1) {
		
			$list = D ( 'Addons://Orienteering/Footer' )->get_list ();
			

			foreach ( $list as $k => $vo ) {
				if ($vo ['pid'] != 0)
					continue;
				
				$one_arr [$vo ['id']] = $vo;
				unset ( $list [$k] );
			}

			$i = 0;
			foreach ( $one_arr as &$p ) {
				$two_arr = array ();
				foreach ( $list as $key => $l ) {
					if ($l ['pid'] != $p ['id'])
						continue;
					
					$two_arr [] = $l;
					unset ( $list [$key] );
				}
				
				$p ['child'] = $two_arr;
				//Felix 20160919
				$i = $i+ 1;
				if ($i == $cur_num){
					$p['class'] = 'item cur';
				}else{
					$p['class'] = 'item';
				}


			}

			//dump($one_arr);
			$this->assign ( 'footer', $one_arr );
			$html = $this->fetch ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/_footer/footer.html' );
			$this->assign ( 'footer_html', $html );
		
	}


		/* 预览 */
	function preview() {
		$publicid = get_token_appinfo ( '', 'id' );
		$url = addons_url ( 'Orienteering://Wap/index', array (
				'publicid' => $publicid 
		) );
		$this->assign ( 'url', $url );
		
		// $config = get_addon_config ( 'Orienteering' );
		
		// $config ['background_arr'] = explode ( ',', $config ['background'] );
		// $config ['background'] = $config ['background_arr'] [0];
		// $this->assign ( 'data', $config );
		
		$this->assign ( 'page_title', '定向赛_预览' );
		$this->display ();
	}

	function notice()
	{
		//dump(get_openid ());
		$map ['token'] = get_token ();
		$map ['status'] = 1;
		$notice = M ( 'ori_notice' )->where ( $map )->order ( 'id desc' )->select ();
		foreach ( $notice as &$vo ) {
			$vo ['conver'] = get_cover_url ( $vo ['conver'] );
			// empty ( $vo ['url'] ) && $vo ['url'] = addons_url ( 'WeiSite://WeiSite/lists', array (
			// 		'cate_id' => $vo ['id'] 
			// ) );
		}
		//dump($notice);
		$this->assign ( 'lists', $notice );

		$this->_footer (2);
		$this->assign ( 'page_title', '定向赛_公告' );
		$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/notice/lists.html' );
		//$this->display();
	}
	function project()
	{
		//dump(get_openid ());
		$map ['token'] = get_token ();
		//$map ['ori_status'] = '';
		$lists = M ( 'ori_project' )->where ( $map )->order ( 'ori_date desc,id desc' )->select ();
		foreach ( $lists as &$vo ) {
			$vo ['conver'] = get_cover_url ( $vo ['conver'] );
			$vo ['intro'] = str_replace ( chr ( 10 ), '<br/>', $vo ['intro'] );
			// empty ( $vo ['url'] ) && $vo ['url'] = addons_url ( 'WeiSite://WeiSite/lists', array (
			// 		'cate_id' => $vo ['id'] 
			// ) );
		}
		//dump($notice);
		$this->assign ( 'lists', $lists );

		$this->_footer (3);
		$this->assign ( 'page_title', '定向赛_赛事' );
		$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/project/lists.html' );
		//$this->display();
	}
	function project_detail()
	{
		//dump(get_openid ());

		$map ['id'] = I ( 'get.id', 0, 'intval' );
		$info = M ( 'ori_project' )->where ( $map )->find ();

			// dump($info);exit;

		$this->assign ( 'info', $info );
		//dump($notice);
		
		$this->_footer (3);
		$this->assign ( 'page_title', '定向赛_'.$info['project_name'] );
		$this->display ( ONETHINK_ADDON_PATH . 'Orienteering/View/default/Wap/project/detail.html' );
		//$this->display();
	}



}
