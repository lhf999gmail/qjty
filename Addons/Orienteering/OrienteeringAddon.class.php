<?php

namespace Addons\Orienteering;
use Common\Controller\Addon;

/**
 * 定向赛插件
 * @author 刘鸿飞
 */

    class OrienteeringAddon extends Addon{

        public $info = array(
            'name'=>'Orienteering',
            'title'=>'定向赛',
            'description'=>'用于定向赛，通过微信二维码扫描领取任务＼统计成绩',
            'status'=>1,
            'author'=>'刘鸿飞',
            'version'=>'0.1',
            'has_adminlist'=>1
        );

	public function install() {
		$install_sql = './Addons/Orienteering/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/Orienteering/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){
        	

        }

    }