<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$config = C('URL_ROUTE_RULES');
    	var_dump($config);
        $url = U('home/user/userlist');
        $str = <<<eov
            <a href="$url">user</a>
eov;

        echo $str;
    }
}