<?php
namespace Home\Model;
use Think\Model;
class JobModel extends Model {
	protected $tableName = 'job';

	public function addJob($api_id, $params = array()){
		$jobList = $this->where('api_id = %d AND params = %d',array($api_id, json_encode((object)$params)))->select();
		if (count($jobList) > 0) return; //如果有一样的请求就跳过
		$this->create();
		$this->api_id = $api_id;
		$this->params = json_encode((object)$params);
		return $this->add();
	}
}