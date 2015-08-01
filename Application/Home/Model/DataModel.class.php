<?php
namespace Home\Model;
use Think\Model;
class DataModel extends Model {
	protected $tableName = 'data';
	/**
	* Model - Data - getCount
	* 返回总数据条数
	*/
	public function getCount(){
		return $this->count();
	}

	/**
	* Model - Data - getEventByID
	*/
	public function getEventByID($id){
		$res = $this->where('id=%d',array($id))->find();
		return $res;
	}
	/**
	* Model - Data - getEventByAPIID
	* 根据 API ID 查询数据
	*/
	public function getEventByAPIID($id, $params = array(), $limit = 20){
		$res = $this->where('api_id=%d',array($id))->order('timestamp desc')->limit($limit)->select();
		$latestResult = $res[0];
		$APIModel = D('API');
		$APIModel->incTriggerCount($id);
		$oldTimestamp = strtotime($latestResult['timestamp']);
		$nowTimestamp = time();
		$expires = json_decode($APIModel->getAPIInfo($id)['info'], true)['expires'];
		if ($nowTimestamp - $oldTimestamp > $expires){
			//数据过期 更新!
			$jobModel = D('Job');
			$jobModel->addJob($id);
		}
		return $res;
	}


}