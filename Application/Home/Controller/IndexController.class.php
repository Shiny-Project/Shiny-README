<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$dataModel = D('Data');
    	$count = $dataModel->getCount();
        $this->show($count);
    }
}