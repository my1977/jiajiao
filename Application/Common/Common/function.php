<?php

function _ars($data,$flag,$is_die=true){
	$result['status'] = $flag;
	$result['result'] = $data;
	header('Content-type: application/json');
	echo json_encode($result);
	if ($is_die) {
		die();
	}
}