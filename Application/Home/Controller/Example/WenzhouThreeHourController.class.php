<?php
namespace Home\Controller\Example;
use Think\Controller;
class WenzhouThreeHourController extends Controller {
	public function index(){
		$api_id = '000000001'; //注意！这里一定是字符串不能是数字
		
		$dataModel = D('Data');
		$data = $dataModel->getNewestEventByAPIID($api_id);

		$response = json_decode($data['data'], true);

		$this->ajaxReturn(MiraiReturn($response));
	}
}