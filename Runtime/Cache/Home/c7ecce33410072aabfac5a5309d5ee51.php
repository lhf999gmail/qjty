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
    <div id="container" class="container body">
        <div >
            <?php if(!empty($info["cover"])): ?><img src="<?php echo (get_cover_url($info["cover"])); ?>"/><?php endif; ?>
            <p style="word-wrap:break-word;"><?php echo ($info["project_name"]); ?></p>
        </div>

      
            

        <div class="block_content_bg m_10"> 
            <div class="block_content_top_min">
                <center>报名须知</center>
            </div>
            <!-- 表单 -->
            <form id="form" action="<?php echo U('step1?id='.$info['id']);?>" method="post" class="form-horizontal p_10">
              <div class="form-item cf">
                  <label class="item-label"><span class="check-tips"><?php echo ($info["signup_notice"]); ?></span></label>
              </div>
              <div class="form-item cf">
                  <label class="checkbox"> 
                  <input type="checkbox" value="1" name="agree" checked="checked">
                        同意协议</label>
              </div>
              <div class="form-item cf">
                  <!-- <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"> -->
                   <button class="home_btn submit-btn mb_10 mt_10" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            
            </div>
        </form>

      </div>
       <p class="copyright"><?php echo ($system_copy_right); ?></p>
  </div>
  <!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
<script type="text/javascript">
    $.WeiPHP.initWxShare({
        title:"<?php echo ($forms["title"]); ?>",
        imgUrl:"<?php echo ($forms["cover"]); ?>",
        desc:"<?php echo ($forms["intro"]); ?>",
        link:window.location.href
    })
</script>
 <block name="script">
 <link href="<?php echo SITE_URL;?>/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">

  <link href="<?php echo SITE_URL;?>/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo SITE_URL;?>/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
  <script type="text/javascript" src="<?php echo SITE_URL;?>/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script>
<script type="text/javascript">
$('#submit').click(function(){

   // $('#form').submit();
   $.Dialog.loading();
   $.ajax({
//     url:'<?php echo U('add?model='.$model['id']);?>',
       url:"<?php echo U('step1?id='.$info['id']);?>",
       type:'post',
       data:$('#form').serializeArray(),
       dataType:'json',
       success:function(json){
            //$.Dialog.close();
            if(json.status==1){
                    
                    $.Dialog.success(json.info);
                    //alert('2');
               }else{
                    $.Dialog.fail(json.info);
                    //alert('3');
            }
           if(json.url!=""){
               setTimeout(function(){
                   window.location.href=json.url;
                   },2000);
               }
        },
        error:function(){
                $.Dialog.close();
             //$.Dialog.fail();
            }
       });
});

$(function(){
       $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });

});
</script> 


<!-- 底部导航 -->
<?php echo ($footer_html); ?>
<!-- 统计代码 -->
<?php if(!empty($config["code"])): ?><p class="hide bdtongji">
<?php echo ($config["code"]); ?>
</p>
<?php else: ?>
<p class="hide bdtongji">
<?php echo ($tongji_code); ?>
</p><?php endif; ?>
</body>
<script type="text/javascript">
</script>
</html>