DELETE FROM `wp_attribute` WHERE `model_name`='ori_task_action';
DELETE FROM `wp_model` WHERE `name`='ori_task_action' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_ori_task_action`;

DELETE FROM `wp_attribute` WHERE `model_name`='ori_team';
DELETE FROM `wp_model` WHERE `name`='ori_team' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_ori_team`;

DELETE FROM `wp_attribute` WHERE `model_name`='ori_project';
DELETE FROM `wp_model` WHERE `name`='ori_project' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_ori_project`;

DELETE FROM `wp_attribute` WHERE `model_name`='ori_task';
DELETE FROM `wp_model` WHERE `name`='ori_task' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_ori_task`;