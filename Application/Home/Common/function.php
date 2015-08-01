<?php
/**
* Mirai 公共函数
*/

function MiraiReturn($data, $type, $status = 'success'){
	$response = array(
		'status' => $status,
		'data' => $data
	);
	return $response;
}

?>