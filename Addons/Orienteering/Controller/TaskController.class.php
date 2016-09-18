<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class TaskController extends AddonsController{
	var $model;
	var $project_id;
	function _initialize() {
		parent::_initialize ();
		$this->model = $this->getModel ( 'ori_task' );

		$param ['project_id'] = $this->project_id = intval ( $_REQUEST ['project_id'] );

		$res ['title'] = '<<';
		$res ['url'] = addons_url ( 'Orienteering://Project/lists', $param );
		$res ['class'] = '';
		$nav [] = $res;
		
		$res ['title'] = '任务';
		$res ['url'] = addons_url ( 'Orienteering://Task/lists', $param );
		$res ['class'] = 'current';
		$nav [] = $res;
		
		$this->assign ( 'nav', $nav );
		
	}
    // 通用插件的列表模型
	public function lists() {
		$param ['project_id'] = $this->project_id;
		$param ['model'] = $this->model ['id'];
		$add_url = U ( 'add', $param );
		$this->assign ( 'add_url', $add_url );
		

		$map ['project_id'] = intval ( $_REQUEST ['project_id'] );
		$map ['token'] = get_token ();
		session ( 'common_condition', $map );
		
		
		$list_data = $this->_get_model_list ( $this->model,'','seq_num ' );

		foreach ( $list_data ['list_data'] as &$vo ) {
			empty ( $vo ['qr_code'] ) || $vo ['qr_code'] = '<img class="list_img" src="' . $vo ['qr_code'] . '">';
		}
		$this->assign ( $list_data );
		
		$this->display ();



		
		//parent::common_lists ( $this->model, 0, '', 'seq_num asc' );
	}
	// 通用插件的编辑模型
	public function edit() {
		$id = I ( 'id' );
		
		$this->_tip ();
		
		parent::common_edit ( $this->model, $id );
	}
	
	// 通用插件的增加模型
	public function add() {
		$model = $this->getModel ( 'ori_task' );

		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $id = $Model->add ()) {
				$save ['qr_code'] = D ( 'Home/QrCode' )->add_qr_code ( 'QR_LIMIT_SCENE', 'Orienteering', $id );
				$map ['id'] = $id;
				if ($save ['qr_code']) {
					M ( 'ori_task' )->where ( $map )->save ( $save );
				} else {
					M ( 'ori_task' )->where ( $map )->delete ();
					
					$msg = '获取二维码失败';
					if ($save ['qr_code'] == - 1) {
						$msg = '二维码数量已经达到上限，增加失败';
					} elseif ($save ['qr_code'] == - 3) {
						$msg = '保存二维码失败';
					}
					$this->error ( $msg );
					exit ();
				}
				
				$this->success ( '添加二维码成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( $Model->getError () );
			}
		} else {
			$this->_tip ();
		
			$fields = get_model_attribute ( $this->model ['id'] );
		
			$this->assign ( 'fields', $fields );
			$this->meta_title = '新增' . $this->model ['task_code'];
			$this->display ();
		}



		// if (IS_POST) {
		// 	$Model = D ( parse_name ( get_table_name ( $this->model ['id'] ), 1 ) );
		// 	// 获取模型的字段信息
		// 	$Model = $this->checkAttr ( $Model, $this->model ['id'] );
		// 	if ($Model->create () && $id = $Model->add ()) {
		// 		$param ['project_id'] = $this->project_id;
		// 		$param ['model'] = $this->model ['id'];
		// 		$url = U ( 'lists', $param );
		// 		$this->success ( '添加' . $this->model ['task_name'] . '成功！', $url );
		// 	} else {
		// 		$this->error ( $Model->getError () );
		// 	}
		// 	exit ();
		// }
		
		// $this->_tip ();
		
		// $fields = get_model_attribute ( $this->model ['id'] );
		
		// $this->assign ( 'fields', $fields );
		// $this->meta_title = '新增' . $this->model ['task_code'];
		// $this->display ();
	}
	
	// 通用插件的删除模型
	public function del() {
		parent::common_del ( $this->model );
	}

	function _tip() {
		$normal_tips = '任务顺序从0开始<br/>';
		$this->assign ( 'normal_tips', $normal_tips );
	}

}
