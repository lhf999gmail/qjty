<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/qjty/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript">
		//静态变量
		var SITE_URL = "<?php echo SITE_URL;?>";
		var IMG_PATH = "/qjty/Public/Home/images";
		var STATIC_PATH = "/qjty/Public/static";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <script type="text/javascript" src="/qjty/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="minify.php?f=/qjty/Public/Home/js/prefixfree.min.js,/qjty/Public/Home/js/m/dialog.js,/qjty/Public/Home/js/m/flipsnap.min.js,/qjty/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>
<link href="<?php echo ADDON_PUBLIC_PATH;?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div id="container" class="container">
	 <img src="<?php echo (get_cover_url($info["cover"])); ?>" width="100%"/>
	 <div class="lead_box">
        	<h6 class="m_t"><div style="word-wrap:break-word;"><?php echo ($info["title"]); ?></div></h6>
            <div class="lead_content" style="word-wrap:break-word;"><?php echo ($info["intro"]); ?></div>
    </div>
   
    <?php if(($overtime) == "0"): ?><p style="border-radius: 5px;background: darkgrey;color: #fff;font-size: 16px; padding: 12px;display: block;text-align: center;margin: 20px auto;width: 100px;">调研已结束</p><?php endif; ?>
    <?php if(($overtime) == "2"): ?><p style="border-radius: 5px;background: darkgrey;color: #fff;font-size: 16px; padding: 12px;display: block;text-align: center;margin: 20px auto;width: 100px;">调研未开始</p><?php endif; ?>
    <?php if(($overtime) == "1"): ?><a href="<?php echo U('survey','id='.$info[id]);?>" class="lead_btn">立即参与</a><?php endif; ?> 

    <p class="copyright"><?php echo ($system_copy_right); ?></p>
</div>
<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
<script type="text/javascript">
	$.WeiPHP.initWxShare({
		title:"<?php echo ($info["title"]); ?>",
		imgUrl:"<?php echo (get_cover_url($info["cover"])); ?>",
		desc:"<?php echo ($info["intro"]); ?>",
		link:window.location.href
	})

</script>
</body>
</html>