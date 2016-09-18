<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/qjty/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/qjty/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/qjty/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/qjty/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/qjty/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/qjty/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/qjty/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/qjty/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/qjty/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/qjty/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/qjty/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/qjty/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/qjty/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/qjty/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/qjty/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/qjty/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/qjty/Public/Home/images";
var  STATIC = "/qjty/Public/static";
var  ROOT = "/qjty";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
var  UPLOAD_DIALOG_URL = "<?php echo U('home/File/uploadDialog',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if(!empty($userInfo[website_logo])): ?><img height="52" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/qjty/Public/Home/images/logo.png"/><?php endif; ?>
       </a>
        <?php if(is_login()): ?><div class="switch_mp">
            	<?php if(!empty($public_info["public_name"])): ?><a href="#"><?php echo ($public_info["public_name"]); ?><b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>
                <ul>
                <?php if(is_array($myPublics)): $i = 0; $__LIST__ = $myPublics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/index/main', array('publicid'=>$vo[mp_id]));?>"><?php echo ($vo["public_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
      <?php $index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' ); $index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME ); ?>
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                            <?php elseif($index_2 == 'home/public/*' or $index_3 == 'home/user/profile' or $index_2 == 'home/publiclink/*' or $index_3 == 'home/user/bind_login'): ?>
                    		
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($myinfo[headimgurl])): ?><img class="admin_head url" src="<?php echo ($myinfo["headimgurl"]); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head default" src="/qjty/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort($myinfo["nickname"],4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                               <?php if($mid==C('USER_ADMINISTRATOR')): ?><li><a href="<?php echo U ('Admin/Index/Index');?>" target="_blank">后台管理</a></li><?php endif; ?>
                            	<li><a href="<?php echo U ('Home/Public/lists');?>">公众号列表</a></li>
                                <li><a href="<?php echo U ('Home/Public/add');?>">账号配置</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php  if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>4))); } ?>
<div id="main-container" class="admin_container">
  <?php if(!empty($core_side_menu)): ?><div class="sidebar">
      <ul class="sidenav">
        <li>
          <?php if(!empty($now_top_menu_name)): ?><a class="sidenav_parent" href="javascript:;"> 
            <!--<img src="/qjty/Public/Home/images/left_icon_<?php echo ($core_side_category["left_icon"]); ?>.png"/>--> 
            <?php echo ($now_top_menu_name); ?></a><?php endif; ?>
          <ul class="sidenav_sub">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
        <?php if(!empty($addonList)): ?><li> <a class="sidenav_parent" href="javascript:;"> <img src="/qjty/Public/Home/images/ico1.png"/> 其它功能</a>
            <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> <i class="icon-chevron-right">
                  <?php if(!empty($vo['icon'])) { ?>
                  <img src="<?php echo ($vo["icon"]); ?>" />
                  <?php } ?>
                  </i> <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </li><?php endif; ?>
      </ul>
    </div><?php endif; ?>
  <div class="main_body">
    
  <script type="text/javascript" src="/qjty/Public/static/qrcode/qrcode.js"></script>
  <script type="text/javascript" src="/qjty/Public/static/qrcode/jquery.qrcode.js"></script>
  <style type="text/css">
#phone {
	margin: 0 auto;
	width: 510px;
	height: 814px;
	background: url(/qjty/Public/Home/images/preview_phone.jpg) no-repeat;
}
#frame {
	margin: 100px 0 0 97px;
	width: 320px;
	border: 2px solid #333;
}
#qrcode {
	position: absolute;
	top: 200px;
	left: 50%;
	margin-left: 230px;
	width: 200px;
	height: 300px;
	text-align: center;
	line-height: 30px;
}
</style>
  
   <div class="setting_step app_setting content_step" style="margin-top:20px;">
         <a class="step " href="<?php echo addons_url('WeiSite://Template/lists',array('mdm'=>I('mdm')));?>">1.选择列表模板</a>
       	 <a class="step " href="<?php echo addons_url('WeiSite://Template/detail',array('mdm'=>I('mdm')));?>">2.选择内容模板</a>
         <a class="step step_cur" href="<?php echo addons_url('WeiSite://Cms/lists',array('mdm'=>I('mdm')));?>">3.内容管理</a> 
         <a class="step step_cur_1" href="<?php echo addons_url('WeiSite://WeiSite/preview_cms',array('mdm'=>I('mdm')));?>">4.效果预览</a>
  </div>
  
  <div style="margin:20px; clear:both;position:relative; padding:20px 0;">
  <div id="phone" style="margin:0 0 80px">
    <iframe id="frame" src="<?php echo ($url); ?>" height="565" width="320" frameborder="0"></iframe>
  </div>
  <div id="qrcode" style="top:50px; left:360px;">
    <div id="canvas" style="height:200px; width:200px;"></div>
    用微信扫一扫预览 </div>

  </div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/qjty", //当前网站地址
		"APP"    : "/qjty/index.php?s=", //当前项目地址
		"PUBLIC" : "/qjty/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

  <script type="text/javascript">
    	var url = "<?php echo ($url); ?>&publicid=<?php echo ($public_info["id"]); ?>";
        $('#canvas').qrcode({width:200,height:200,text:url}); 
</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div style='display:none'><?php echo ($tongji_code); ?></div>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>