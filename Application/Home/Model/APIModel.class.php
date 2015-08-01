<?php
namespace Home\Model;
use Think\Model;
class APIModel extends Model {
	protected $tableName = 'api';

	/**
	* Model - API - incTriggerCount
	* API触发次数 +1
	* Params : (int) $id (api_id)
	*/
	public function incTriggerCount($id){
		return $this->where('api_id = %d', array($id))->setInc('triggercount', 1);
	}

	public function getAPIInfo($id){
		return $this->where('api_id = %d', array($id))->find();
	}
}