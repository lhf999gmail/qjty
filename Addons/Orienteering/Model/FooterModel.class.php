<?php

namespace Addons\Orienteering\Model;

use Think\Model;

/**
 * WeiSite模型
 */
class FooterModel extends Model {
	protected $tableName = 'weisite_footer';
	function get_list($map) {
		// isset ( $map ['token'] ) || $map ['token'] = get_token ();
		// $list = $this->where ( $map )->order ( 'pid asc, sort asc' )->select ();
		
		// foreach ( $list as &$vo ) {
		// 	$vo ['icon'] = get_cover_url ( $vo ['icon'] );
		// 	if ($vo ['icon']) {
		// 		$vo ['icon'] = '<img src="' . $vo ['icon'] . '" >';
		// 	} else {
		// 		$vo ['icon'] = '';
		// 	}
		// }
		
		// return $list;


		$data['id'] = 1;
		$data['title'] = '主页';
		$data['url'] = addons_url("Orienteering://Wap/index");
		$data['pid'] = 0;
		$data['sort'] = 1;
		$data['icon'] = 22;
		$data ['icon'] = get_cover_url ( $data ['icon'] );
		$data ['icon'] = '<img src="' . $data ['icon'] . '" >';
		$list[] = $data;

		$data['id'] = 2;
		$data['title'] = '公告';
		$data['url'] = addons_url("Orienteering://Wap/index");
		$data['pid'] = 0;
		$data['sort'] = 2;
		$data['icon'] = 61;
		$data ['icon'] = get_cover_url ( $data ['icon'] );
		$data ['icon'] = '<img src="' . $data ['icon'] . '" >';
		$list[] = $data;

		$data['id'] = 3;
		$data['title'] = '赛事';
		$data['url'] = addons_url("Orienteering://Wap/index");
		$data['pid'] = 0;
		$data['sort'] = 3;
		$data['icon'] = 60;
		$data ['icon'] = get_cover_url ( $data ['icon'] );
		$data ['icon'] = '<img src="' . $data ['icon'] . '" >';
		$list[] = $data;

		$data['id'] = 4;
		$data['title'] = '我的';
		$data['url'] = addons_url("Orienteering://Wap/index");
		$data['pid'] = 0;
		$data['sort'] = 4;
		$data['icon'] = 45;
		$data ['icon'] = get_cover_url ( $data ['icon'] );
		$data ['icon'] = '<img src="' . $data ['icon'] . '" >';
		$list[] = $data;


		$data['id'] = 5;
		$data['title'] = '成绩';
		$data['url'] = addons_url("Orienteering://Wap/index");
		$data['pid'] = 4;
		$data['sort'] = 1;
		$list[] = $data;

		$data['id'] = 6;
		$data['title'] = '待办事项';
		$data['url'] = addons_url("Orienteering://Wap/index");
		$data['pid'] = 4;
		$data['sort'] = 2;
		$list[] = $data;

		return $list;


	}
}
