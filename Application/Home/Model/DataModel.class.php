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
	* 根据 Event ID 查询信息
	*/
	public function getEventByID($id){
		if (is_array($id)){
			$map = array();
			$map['id'] = array('IN', $id);
			$res = $this->where($map)->select();
		}
		else{
			$res = $this->where('id=%d',array($id))->find();
		}
		
		return $res;
	}
	/**
	* Model - Data - getEventByAPIID
	* 根据 API ID 查询数据
	*/
	public function getEventByAPIID($id, $limit = 20){
		$result = $this->where('api_id=%s',array($id))->order('timestamp desc')->limit($limit)->select();
		$APIModel = D('API');
		$APIModel->incTriggerCount($id);//触发次数更新
		return $result;
	}
	/**
	* Model - Data - getNewestEventByAPIID
	* 根据 API ID 查询最新数据
	*/
	public function getNewestEventByAPIID($id){
        $APIModel = D('API');
        $result = $this->getEventByAPIID($id)[0];
        $oldTimestamp = strtotime($result['timestamp']);
		$nowTimestamp = time();
        $expires = json_decode($APIModel->getAPIInfo($id)['info'], true)['expires'];
        $status = 'success';
		if ($nowTimestamp - $oldTimestamp > $expires){
			//数据过期 更新!
            $status = 'pending_refresh';
			$jobModel = D('Job');
			$jobModel->addJob($id);
		}
        $data = [
            'status' => $status,
            'data' => json_decode($result['data'], true)
        ];
		return $data;
	}


}