<?php
namespace Home\Controller\Bilibili;
use Think\Controller;
class BilibiliMoeController extends Controller {
    protected $api_id = '000000002'; //注意！这里一定是字符串不能是数字
    public function index(){
        $dataModel = D('Data');
        $data = $dataModel->getNewestEventByAPIID($this->api_id);
        $response = json_decode($data['data'], true);
        $this->ajaxReturn(MiraiReturn($response));
    }
}