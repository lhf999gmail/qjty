<?php
namespace Addons\Orienteering\Controller;
use Home\Controller\AddonsController;

class TaskActionController extends OrienteeringController{
	var $model;
	var $project_id;
	function _initialize() {
		parent::_initialize ();
		$this->model = $this->getModel ( 'ori_task_action' );

		// $param ['project_id'] = $this->project_id = intval ( $_REQUEST ['project_id'] );

		// $res ['title'] = '<<';
		// $res ['url'] = addons_url ( 'Orienteering://Project/lists', $param );
		// $res ['class'] = '';
		// $nav [] = $res;
		
		// $res ['title'] = '任务';
		// $res ['url'] = addons_url ( 'Orienteering://Task/lists', $param );
		// $res ['class'] = 'current';
		// $nav [] = $res;
		
		// $this->assign ( 'nav', $nav );
		
	}
    // 通用插件的列表模型
	public function lists() {
		

		$map ['token'] = get_token ();
		$projectArr = M ( 'ori_project' )->where ( $map )->getFields ( 'id,project_name' );
		$taskArr = M ( 'ori_task' )->where ( $map )->getFields ( 'id,task_name' );
		$list_data = $this->_get_model_list ( $this->model ,'');
		foreach ( $list_data ['list_data'] as &$data ) {
			$data ['project_id'] = $projectArr [$data ['project_id']];
			$data ['task_id'] = $taskArr [$data ['task_id']];
		}
		$this->assign ( $list_data );
		
		$this->display ();

		

		
		//parent::common_lists ( $this->model, 0, '', 'start_time desc' );
	}
	// 通用插件的编辑模型
	public function edit() {
		$id = I ( 'id' );
		
		
		parent::common_edit ( $this->model, $id );
	}
	
	// 通用插件的增加模型
	public function add() {
		$model = $this->getModel ( 'ori_task_action' );

		if (IS_POST) {

			$task_id = $_POST['task_id'];
			$uid = 2;;
			$openid = 3;
			$time = time();
			$token = get_token();


			//$m = D ( 'Addons://Orienteering/TaskAction' );
			$MAction = D ( 'TaskAction' );
			
		    $res = $MAction->addAction ( $task_id,$time,$uid,$openid,$token);
			//$secc = $Model->add($task_id,$uid,$openid,$time);


			if ($res) {
				// $save ['qr_code'] = D ( 'Home/QrCode' )->add_qr_code ( 'QR_LIMIT_SCENE', 'Orienteering', $id );
				// $map ['id'] = $id;
				// if ($save ['qr_code']) {
				// 	M ( 'ori_task' )->where ( $map )->save ( $save );
				// } else {
				// 	M ( 'ori_task' )->where ( $map )->delete ();
					
				// 	$msg = '获取二维码失败';
				// 	if ($save ['qr_code'] == - 1) {
				// 		$msg = '二维码数量已经达到上限，增加失败';
				// 	} elseif ($save ['qr_code'] == - 3) {
				// 		$msg = '保存二维码失败';
				// 	}
				// 	$this->error ( $msg );
				// 	exit ();
				// }
				
				$this->success ( '添加成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( $Model->getError () );
			}
		} else {
		
			$fields = get_model_attribute ( $this->model ['id'] );
		
			$this->assign ( 'fields', $fields );
			$this->meta_title = '新增';
			$this->display ();
		}




	}
	
	// 通用插件的删除模型
	public function del() {
		parent::common_del ( $this->model );
	}

	

}
