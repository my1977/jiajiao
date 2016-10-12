<?php
namespace Passport\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $url = U('home/user/userlist');
        $str = <<<eov
            <a href="$url">user</a>
eov;

        echo $str;
    }
}