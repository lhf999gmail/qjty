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

<link href="<?php echo ADDON_PUBLIC_PATH;?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<style type="text/css">
.money {
  width: 50px;
}
.specTable .param {
  display: none;
}
.specTable p {
  display: block;
  line-height: 50px;
}
.text-center {
  text-align: center;
}
.check-tips {
  color: #aaa;
  margin-left:2px;
}
.cf{
  margin-left:20px;
}
</style>
<body>
    <div id="container" class="container body">
          <!--   <div >
            <?php if(!empty($info["cover"])): ?><img src="<?php echo (get_cover_url($info["cover"])); ?>"/><?php endif; ?>
            <p style="word-wrap:break-word;"><?php echo ($info["project_name"]); ?></p>
            </div> -->
        
        

        <div class="block_content_bg m_10"> 
            <div class="block_content_top_min">
                <center>团队信息</center>
            </div>
        <!-- 表单 -->
        <form id="form" action="<?php echo U('step3?id='.$info['id']);?>" method="post" class="form-horizontal p_10">
            <div class="form-item cf">

                <label class="item-label"><span class="need_flag">*</span>队伍名称
                    <span class="check-tips">(如：龙行天下)</span>&nbsp;
                    <span style="color: #f00;"><?php echo ($errArr["team_name"]); ?></span>
                </label>
                <div class="controls">
                    <input type="text" class="text input-large" name="team_name" value="<?php echo ($data["team_name"]); ?>">
                </div>

                
            </div>



            <div class="form-item cf">
              <label class="item-label"><span class="need_flag">*</span>队员<span class="check-tips"> </span></label>
              <div style="margin:15px 0;" class="specTable data-table">
                  <table cellspacing="1" cellpadding="0">
                    <thead>
                      <tr>
                        <th align="center">字段名称</th>
                        <th align="center">操作</th>
                      </tr>
                    </thead>
                    <tbody id="list_data_tbody">
                      <?php if(is_array($attr_list)): $i = 0; $__LIST__ = $attr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($i % 2 );++$i;?><tr class="list_tr" rel="<?php echo ($cd["sort"]); ?>">
                        <td align="center"><input type="text" value="<?php echo ($cd["title"]); ?>" class="form-control" name="attr_title[<?php echo ($cd["sort"]); ?>]" style="width:150px">
                        </td>
                        
                        <td>
                        <input type="hidden" value="<?php echo ($cd["id"]); ?>" name="attr_id[<?php echo ($cd["sort"]); ?>]">
                        <input type="hidden" value="<?php echo ($cd["value"]); ?>" name="value[<?php echo ($cd["sort"]); ?>]" class="value">
                        <input type="hidden" value="<?php echo ($cd["remark"]); ?>" name="remark[<?php echo ($cd["sort"]); ?>]" class="remark">
                        <input type="hidden" value="<?php echo ($cd["validate_rule"]); ?>" name="validate_rule[<?php echo ($cd["sort"]); ?>]" class="validate_rule">
                        <input type="hidden" value="<?php echo ($cd["error_info"]); ?>" name="error_info[<?php echo ($cd["sort"]); ?>]" class="error_info"> 
                        <a href="javascript:void(0);" onclick="show_more(this)">高级设置</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                      <tr class="more_tr">
                        <td colspan="5"><a href="javascript:add_tr()">+增加新字段</a></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>  






            <div class="form-item cf">
                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
                <button class="home_btn submit-btn mb_10 mt_10" id="submit" type="submit" target-form="form-horizontal">下一步</button>
            
            </div>
        </form>


<table style="display:none">
      <tr id="default_tr1">
        <td align="center"><input type="text" value="" class="form-control" name="attr_title[sort_id]" style="width:150px"></td><td>
        <input type="hidden" value="" name="value[sort_id]" class="value">
        <input type="hidden" value="" name="remark[sort_id]" class="remark">
        <input type="hidden" value="" name="validate_rule[sort_id]" class="validate_rule">
        <input type="hidden" value="" name="error_info[sort_id]" class="error_info">        
        <a href="javascript:void(0);" onclick="show_more(this)">高级设置</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
      </tr>
      <tr id="default_tr2">
        <td align="center"><input type="text" value="" class="form-control" name="name[sort_id]" style="width:150px"></td>
        <td align="center"><input type="number" value="" class="form-control" name="money[sort_id]" style="width:120px" placeholder="为空时表示免费"></td>
        <td align="center"><input type="number" value="" class="form-control" name="max_limit[sort_id]" style="width:130px" placeholder="为空时表示不限制"></td>
        <td align="center"><input type="number" value="" class="form-control" name="init_count[sort_id]" style="width:100px"></td>
        <td align="center">0</td>
        <td><a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
      </tr>      
  </table>
  
  <div id="default_more_html" style="display:none">
      <div class="form-item cf">
        <label class="item-label">默认值<span class="check-tips"> （字段的默认值） </span></label>
        <div class="controls">
          <input type="text" value="[value]" name="value" id="open_value" class="text input-large">
        </div>
      </div>
      <div class="form-item cf">
        <label class="item-label">字段备注<span class="check-tips"> （用于微预约中的提示） </span></label>
        <div class="controls">
          <input type="text" value="[remark]" name="remark" id="open_remark" class="text input-large">
        </div>
      </div>
      
      <div class="form-item form_bh">
      <div class="btn_bar">
        <a href="javascript:;" class="border-btn confirm_btn">确定</a>&nbsp;&nbsp;
        <a href="javascript:;" class="border-btn cancel_btn">取消</a></div>
    </div>






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


<!--  -->
  <link href="/qjty/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <link href="/qjty/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/qjty/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
  <script type="text/javascript" src="/qjty/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
  <script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
  initUploadImg();
  
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    showTab();
  hide_move();
  
  $('.select_type').each(function(){ select_type(this); });
  $('.select_type').change(function(){ select_type(this); });
});
//增加字段
var tr_sort_id = 0;
function add_tr(){
  var list_count = 0;
  $('.list_tr').each(function() {
    list_count += 1;
    var sort_id = $(this).attr('rel');
    if(sort_id>tr_sort_id) tr_sort_id = sort_id;
    }); 
  
  tr_sort_id += 1;
  
  re = new RegExp("sort_id", "g");
  str  = $('#default_tr1').html().replace(re, tr_sort_id);
  //console.log(str);
  var html = '<tr class="list_tr" rel="'+tr_sort_id+'">'+ str +'</tr>';
  if(list_count==0)
    $('#list_data_tbody tr').before(html);  
  else
    $('.list_tr:last').after(html);
    
  hide_move();
  $('.select_type').each(function(){ select_type(this); });
  $('.select_type').change(function(){ select_type(this); });
}
//删除字段
function remove_tr(_this){  
  $(_this).parent().parent().remove();
  hide_move();
}
//排序--向上
function move_up(obj) { 
  var objParentTR = $(obj).parent().parent(); 
  var prevTR = objParentTR.prev(); 
  if (prevTR.length > 0) { 
  prevTR.insertAfter(objParentTR); 
  }
  hide_move();
} 
//排序--向下
function move_down(obj) { 
  var objParentTR = $(obj).parent().parent(); 
  var nextTR = objParentTR.next(); 
  if (nextTR.length > 0) { 
  nextTR.insertBefore(objParentTR); 
  } 
  hide_move();
} 
//第一行只显示向下，最后一行只显示向上
function hide_move(){
  $('.move_up').each(function() {
    $(this).show();
    });
  $('.move_down').each(function() {
    $(this).show();
    }); 
  $('.list_tr:first').find('.move_up').hide();
  $('.list_tr:last').find('.move_down').hide();
}
//选择字段类型
function select_type(_this){
  var type = $(_this).val();
  var obj = $(_this).parent().next().find('input');
  
  switch(type){
    case 'textarea': obj.attr('placeholder','').attr('readonly', true); break;
    case 'radio': obj.attr('placeholder','多个选项用空格分开，如：男 女').attr('readonly', false); break;
    case 'checkbox': obj.attr('placeholder','多个选项用空格分开，如：男 女').attr('readonly', false); break;
    case 'select': obj.attr('placeholder','多个选项用空格分开，如：男 女').attr('readonly', false); break;
    case 'datetime': obj.attr('placeholder','').attr('readonly', true); break;
    case 'picture': obj.attr('placeholder','').attr('readonly', true); break;
      default: obj.attr('placeholder','').attr('readonly', true); break;
  }
}
//高级设置
function show_more(_this){  
  var obj = $(_this).parent();
  
  var value = obj.find('.value').val();
  var remark = obj.find('.remark').val();
  var validate_rule = obj.find('.validate_rule').val();
  var error_info = obj.find('.error_info').val();
  
  var html = $('#default_more_html').html().replace("[value]", value).replace("[remark]", remark).replace("[validate_rule]", validate_rule).replace("[error_info]", error_info);
  $contentHtml = $(html);
    
  
  $.Dialog.open("高级设置",{width:300,height:400},$contentHtml);
  
  $('.cancel_btn',$contentHtml).click(function(){
    $.Dialog.close();
  })
  $('.confirm_btn',$contentHtml).click(function(){
    obj.find('.value').val( $('#open_value',$contentHtml).val() );
    obj.find('.remark').val( $('#open_remark',$contentHtml).val() );
    obj.find('.validate_rule').val( $('#open_validate_rule',$contentHtml).val() );
    obj.find('.error_info').val( $('#open_error_info',$contentHtml).val() );
    
    $.Dialog.close();
  })
}
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