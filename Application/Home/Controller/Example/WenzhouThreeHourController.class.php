<?php
namespace Home\Controller\Example;
use Think\Controller;
class WenzhouThreeHourController extends Controller {
	protected $api_id = '00100020000010000'; //注意！这里一定是字符串不能是数字
	public function index(){		
		$dataModel = D('Data');
		$res = $dataModel->getNewestEventByAPIID($this->api_id);
		$this->ajaxReturn($res);
	}
}