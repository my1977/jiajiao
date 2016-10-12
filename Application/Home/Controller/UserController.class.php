<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $a = D('User');
        var_dump($a);
    }

    public function regedit() {
        exit();
        /*$data = array(
            'username'      => 'maying',
            'password'      =>md5('123qwe'),
            'phone'         =>'15662176002',
            'email'         =>'1977905246@qq.com',
            'create_time'   =>time()
        );*/
        $data = array(
            'username'      => 'xiaoming',
            'password'      =>md5('123qwe'),
            'phone'         =>'15662137633',
            'email'         =>'1977905135@qq.com',
            'create_time'   =>time()
        );
        $a = D('user')->insert($data);
        var_dump($a);
    }

    public function userlist() {
        $list = D('user')->getListByWhere(array(), 1, 1);
        var_dump($list);
    }
}