<?php
namespace Home\Controller\Example;
use Think\Controller;
class WenzhouThreeHourController extends Controller {
	public function index(){
		$api_id = 000000001;
		
		$dataModel = D('Data');
		$data = $dataModel->getEventByAPIID($api_id)[0];
		$response = json_decode($data['data'], true);
		$this->ajaxReturn(MiraiReturn($response));
	}
}