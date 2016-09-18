CREATE TABLE IF NOT EXISTS `wp_coupon` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`background`  int(10) UNSIGNED NULL  COMMENT '素材背景图',
`keyword`  varchar(100) NULL  COMMENT '关键词',
`use_tips`  text NULL  COMMENT '使用说明',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '封面简介',
`end_time`  int(10) NULL  COMMENT '领取结束时间',
`cover`  int(10) unsigned NULL   COMMENT '优惠券图片',
`cTime`  int(10) unsigned NULL   COMMENT '发布时间',
`token`  varchar(255) NULL  COMMENT 'Token',
`start_time`  int(10) NULL  COMMENT '开始时间',
`end_tips`  text NULL  COMMENT '领取结束说明',
`end_img`  int(10) unsigned NULL   COMMENT '领取结束提示图片',
`num`  int(10) unsigned NULL   DEFAULT 0 COMMENT '优惠券数量',
`max_num`  int(10) unsigned NULL   DEFAULT 1 COMMENT '每人最多允许获取次数',
`follower_condtion`  char(50) NULL  DEFAULT 1 COMMENT '粉丝状态',
`credit_conditon`  int(10) unsigned NULL   DEFAULT 0 COMMENT '积分限制',
`credit_bug`  int(10) unsigned NULL   DEFAULT 0 COMMENT '积分消费',
`addon_condition`  varchar(255) NULL  COMMENT '插件场景限制',
`collect_count`  int(10) unsigned NULL   DEFAULT 0 COMMENT '已领取数',
`view_count`  int(10) unsigned NULL   DEFAULT 0 COMMENT '浏览人数',
`addon`  char(50) NULL  DEFAULT 'public' COMMENT '插件',
`shop_uid`  varchar(255) NULL  COMMENT '商家管理员ID',
`use_count`  int(10) NULL  DEFAULT 0 COMMENT '已使用数',
`pay_password`  varchar(255) NULL  COMMENT '核销密码',
`empty_prize_tips`  varchar(255) NULL  COMMENT '奖品抽完后的提示',
`start_tips`  varchar(255) NULL  COMMENT '活动还没开始时的提示语',
`more_button`  text NULL  COMMENT '其它按钮',
`over_time`  int(10) NULL  COMMENT '使用的截止时间',
`use_start_time`  int(10) NULL  COMMENT '使用开始时间',
`shop_name`  varchar(255) NULL  DEFAULT '优惠商家' COMMENT '商家名称',
`shop_logo`  int(10) UNSIGNED NULL  COMMENT '商家LOGO',
`head_bg_color`  varchar(255) NULL  DEFAULT '#35a2dd' COMMENT '头部背景颜色',
`button_color`  varchar(255) NULL  DEFAULT '#0dbd02' COMMENT '按钮颜色',
`template`  varchar(255) NULL  DEFAULT 'default' COMMENT '素材模板',
`member`  varchar(100) NULL  DEFAULT 0 COMMENT '选择人群',
`is_del`  int(10) NULL  DEFAULT 0 COMMENT '是否删除',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('coupon','优惠券','0','','1','["title","cover","use_tips","start_time","start_tips","end_time","end_tips","end_img","num","max_num","over_time","empty_prize_tips","pay_password","background","more_button","use_start_time","shop_name","shop_logo","head_bg_color","button_color","template","member"]','1:基础','','','','','id:优惠券编号\r\ntitle:标题\r\nnum:计划发送数\r\ncollect_count:已领取数\r\nuse_count:已使用数\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,lists?target_id=[id]&target=_blank&_controller=Sn|成员管理,preview?id=[id]&target=_blank|预览','20','title','','1396061373','1447756274','1','MyISAM','Coupon');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('background','素材背景图','int(10) UNSIGNED NULL','picture','','','1','','0','coupon','0','1','1422000992','1422000992','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('keyword','关键词','varchar(100) NULL','string','','','0','','0','coupon','0','1','1422330526','1396061575','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('use_tips','使用说明','text NULL','editor','','用户获取优惠券后显示的提示信息','1','','0','coupon','1','1','1420868972','1399259489','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','标题','varchar(255) NOT NULL','string','','','1','','0','coupon','1','1','1396624461','1396061859','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('intro','封面简介','text NULL','textarea','','','0','','0','coupon','0','1','1418885972','1396061947','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('end_time','领取结束时间','int(10) NULL','datetime','','','1','','0','coupon','0','1','1427161023','1399259433','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cover','优惠券图片','int(10) unsigned NULL ','picture','','','1','','0','coupon','0','1','1418886050','1396062093','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cTime','发布时间','int(10) unsigned NULL ','datetime','','','0','','0','coupon','0','1','1396624612','1396075102','','3','','regex','time','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','Token','varchar(255) NULL','string','','','0','','0','coupon','0','1','1396602871','1396602859','','3','','regex','get_token','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('start_time','开始时间','int(10) NULL','datetime','','','1','','0','coupon','0','1','1422330558','1399259416','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('end_tips','领取结束说明','text NULL','textarea','','活动过期或者结束说明','1','','0','coupon','0','1','1427161168','1399259570','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('end_img','领取结束提示图片','int(10) unsigned NULL ','picture','','可为空','1','','0','coupon','0','1','1427161296','1400989793','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('num','优惠券数量','int(10) unsigned NULL ','num','0','0表示不限制数量','1','','0','coupon','0','1','1399259838','1399259808','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('max_num','每人最多允许获取次数','int(10) unsigned NULL ','num','1','0表示不限制数量','0','','0','coupon','0','1','1447758805','1399260079','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('follower_condtion','粉丝状态','char(50) NULL','select','1','粉丝达到设置的状态才能获取','0','0:不限制\r\n1:已关注\r\n2:已绑定信息\r\n3:会员卡成员','0','coupon','0','1','1418885814','1399260479','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('credit_conditon','积分限制','int(10) unsigned NULL ','num','0','粉丝达到多少积分后才能领取，领取后不扣积分','0','','0','coupon','0','1','1418885804','1399260618','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('credit_bug','积分消费','int(10) unsigned NULL ','num','0','用积分中的财富兑换、兑换后扣除相应的积分财富','0','','0','coupon','0','1','1418885794','1399260764','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('addon_condition','插件场景限制','varchar(255) NULL','string','','格式：[插件名:id值]，如[投票:10]表示对ID为10的投票投完才能领取，更多的说明见表单上的提示','0','','0','coupon','0','1','1418885827','1399261026','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('collect_count','已领取数','int(10) unsigned NULL ','num','0','','0','','0','coupon','0','1','1400992246','1399270900','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('view_count','浏览人数','int(10) unsigned NULL ','num','0','','0','','0','coupon','0','1','1399270926','1399270926','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('addon','插件','char(50) NULL','select','public','','0','public:通用\r\ninvite:微邀约','0','coupon','0','1','1418885638','1418885638','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('shop_uid','商家管理员ID','varchar(255) NULL','string','','','0','','0','coupon','0','1','1421750246','1418900122','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('use_count','已使用数','int(10) NULL','num','0','','0','','0','coupon','0','1','1418910237','1418910237','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('pay_password','核销密码','varchar(255) NULL','string','','','1','','0','coupon','0','1','1420875229','1420875229','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('empty_prize_tips','奖品抽完后的提示','varchar(255) NULL','string','','不填写时默认显示：您来晚了，优惠券已经领取完','1','','0','coupon','0','1','1421394437','1421394267','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('start_tips','活动还没开始时的提示语','varchar(255) NULL','string','','','1','','0','coupon','0','1','1423134546','1423134546','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('more_button','其它按钮','text NULL','textarea','','格式：按钮名称|按钮跳转地址，每行一个。如：查看官网|http://weiphp.cn','1','','0','coupon','0','1','1423193853','1423193853','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('over_time','使用的截止时间','int(10) NULL','datetime','','券的使用截止时间，为空时表示不限制','1','','0','coupon','0','1','1427161334','1427161118','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('use_start_time','使用开始时间','int(10) NULL','datetime','','','1','','0','coupon','1','1','1427280116','1427280008','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('shop_name','商家名称','varchar(255) NULL','string','优惠商家','','1','','0','coupon','0','1','1427280255','1427280255','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('shop_logo','商家LOGO','int(10) UNSIGNED NULL','picture','','','1','','0','coupon','0','1','1427280293','1427280293','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('head_bg_color','头部背景颜色','varchar(255) NULL','string','#35a2dd','','1','','0','coupon','0','1','1427282839','1427282785','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('button_color','按钮颜色','varchar(255) NULL','string','#0dbd02','','1','','0','coupon','0','1','1427282886','1427282886','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('template','素材模板','varchar(255) NULL','string','default','','1','','0','coupon','0','1','1430127336','1430127336','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('member','选择人群','varchar(100) NULL','checkbox','0','','1','0:所有用户\r\n-1:所有会员','0','coupon','0','1','1444821380','1444821380','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('is_del','是否删除','int(10) NULL','num','0','','0','','0','coupon','0','1','1446119564','1446119564','','3','','regex','','3','function');
UPDATE `wp_attribute` a, wp_model m SET a.model_id = m.id WHERE a.model_name=m.`name`;


CREATE TABLE IF NOT EXISTS `wp_coupon_shop` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`name`  varchar(100) NULL  COMMENT '店名',
`address`  varchar(255) NULL  COMMENT '详细地址',
`phone`  varchar(30) NULL  COMMENT '联系电话',
`gps`  varchar(50) NULL  COMMENT 'GPS经纬度',
`coupon_id`  int(10) NULL  COMMENT '所属优惠券编号',
`token`  varchar(255) NULL  COMMENT 'token',
`manager_id`  int(10) NULL  COMMENT '管理员id',
`open_time`  varchar(50) NULL  COMMENT '营业时间',
`img`  int(10) UNSIGNED NULL  COMMENT '门店展示图',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('coupon_shop','适用门店','0','','1','["name","address","gps","phone"]','1:基础','','','','','name:店名\r\nphone:联系电话\r\naddress:详细地址\r\nids:操作:[EDIT]|编辑,[DELETE]|删除','20','name:店名搜索','','1427164604','1439465222','1','MyISAM','Coupon');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('name','店名','varchar(100) NULL','string','','','1','','0','coupon_shop','1','1','1427164635','1427164635','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('address','详细地址','varchar(255) NULL','string','','','1','','0','coupon_shop','1','1','1427164668','1427164668','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('phone','联系电话','varchar(30) NULL','string','','','1','','0','coupon_shop','0','1','1427166529','1427164707','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('gps','GPS经纬度','varchar(50) NULL','string','','格式：经度,纬度','1','','0','coupon_shop','0','1','1427371523','1427164833','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('coupon_id','所属优惠券编号','int(10) NULL','num','','','4','','0','coupon_shop','0','1','1427165806','1427165806','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','token','varchar(255) NULL','string','','','0','','0','coupon_shop','0','1','1440071867','1440071805','','3','','regex','get_token','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('manager_id','管理员id','int(10) NULL','num','','','0','','0','coupon_shop','0','1','1440071927','1440071917','','3','','regex','get_mid','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('open_time','营业时间','varchar(50) NULL','string','','','1','','0','coupon_shop','0','1','1443106576','1443106576','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('img','门店展示图','int(10) UNSIGNED NULL','picture','','','1','','0','coupon_shop','0','1','1447060275','1447060275','','3','','regex','','3','function');
UPDATE `wp_attribute` a, wp_model m SET a.model_id = m.id WHERE a.model_name=m.`name`;


CREATE TABLE IF NOT EXISTS `wp_coupon_shop_link` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`coupon_id`  int(10) NULL  COMMENT 'coupon_id',
`shop_id`  int(10) NULL  COMMENT 'shop_id',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('coupon_shop_link','门店关联','0','','1','','1:基础','','','','','','20','','','1427356350','1427356350','1','MyISAM','Coupon');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('coupon_id','coupon_id','int(10) NULL','num','','','1','','0','coupon_shop_link','0','1','1427356371','1427356371','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`model_name`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('shop_id','shop_id','int(10) NULL','num','','','1','','0','coupon_shop_link','0','1','1427356387','1427356387','','3','','regex','','3','function');
UPDATE `wp_attribute` a, wp_model m SET a.model_id = m.id WHERE a.model_name=m.`name`;


