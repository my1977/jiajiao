<?php

function _ars($data,$flag,$callback,$is_die=true){
	$result['status'] = $flag;
	$result['result'] = $data;
	
	echo $callback.'('.json_encode($result).')';
	if ($is_die) {
		die();
	}
}

function uploadImage($name,$savepath) {
	$upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     '.'.C('IMAGE_ROOTPATH'); // 设置附件上传根目录
    $upload->savePath  =     $savepath.'/'; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    $path = $info[$name]['savepath'].$info[$name]['savename'];
    if(!$info) {// 上传错误提示错误信息
        return array('status'=>'error','msg'=>$upload->getError());
    }else{// 上传成功
        return array('status'=>'ok','msg'=>'success','path'=>$path);
    }
}

function is_mobile_request()   
{   
	$_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';   
		$mobile_browser = '0';   
	if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))   
		$mobile_browser++;   
	if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))   
		$mobile_browser++;   
	if(isset($_SERVER['HTTP_X_WAP_PROFILE']))   
		$mobile_browser++;   
	if(isset($_SERVER['HTTP_PROFILE']))   
		$mobile_browser++;   
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));   
	$mobile_agents = array(   
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',   
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',   
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',   
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',   
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',   
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',   
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',   
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',   
		'wapr','webc','winw','winw','xda','xda-'  
		);   
	if(in_array($mobile_ua, $mobile_agents))   
		$mobile_browser++;   
	if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)   
		$mobile_browser++;   
	// Pre-final check to reset everything if the user is on Windows   
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)   
		$mobile_browser=0;   
	// But WP7 is also Windows, with a slightly different characteristic   
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)   
		$mobile_browser++;   
	if($mobile_browser>0)   
		return true;   
	else 
		return false;   
}

/**
 * 二维数组多字段排序
 * array_orderby($data,field1,sort,field2,sort,...)
 * @return array 排序后的数组
 */
function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

/*
	截取字符串
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
	if(function_exists("mb_substr")){
		$cha = $length - $start;
		$strlen = strlen($str);
		if ($strlen > $cha) {
			$extra = '.....';
		}
		return mb_substr($str, $start, $length, $charset).$extra;
	}
	elseif(function_exists('iconv_substr')) {
		return iconv_substr($str,$start,$length,$charset);
	}
	$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk']	  = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5']	  = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$slice = join("",array_slice($match[0], $start, $length));
	if($suffix) 
		return $slice."…";
	return $slice;
}