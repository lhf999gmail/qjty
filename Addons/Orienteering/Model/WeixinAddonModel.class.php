<?php
        	
namespace Addons\Orienteering\Model;
use Home\Model\WeixinModel;
        	
/**
 * Orienteering的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'Orienteering' ); // 获取后台插件的配置参数	
		//dump($config);


		$param ['token'] = get_token ();
		  $param ['openid'] = get_openid ();
		  $url = addons_url ( 'Suggestions://Suggestions/suggest', $param );
		  $articles [0] = array (
		    'Title' => '建议意见',
		    'Description' => '请点击进入填写反馈内容',
		    'PicUrl' => 'http://weiphp.cn/Public/Home/images/about/logo.jpg',
		    'Url' => $url
		  );
		 
		  $res = $this->replyNews ( $articles );
	}

	function addAction($task_id,$time,$uid,$openid,$token)
	{

		$TaskAction = D ( 'Addons://Orienteering/TaskAction' );
		$TaskAction -> addAction($task_id,$time,$uid,$openid,$token);
		

		$this->replyText('aa'.$task_id.'|'.$xtoken.'|'.$xopenid.'|'.$openid);

		//return true;
	}

	

	
}
        	