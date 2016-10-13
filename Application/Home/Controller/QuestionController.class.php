<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
    private $type = array(
            '1' => '学生',
            '2' => '老师',
        );
    private $status = array(
            '0' => '默认',
            '1' => '审核',
            '-1'=> '删除',
        );
    public function test(){
        var_dump($_SESSION);
    }
    public function login () {
    	$this->display();
    }
    public function userList(){

        $user = M('user')->where()->select();
        $this->assign('result',$user);
        $this->assign('status',$this->status);
        $this->assign('type',$this->type);
        $this->display();
    }

    public function handleLogin() {
    	$email = $_POST['email'];
        $password = $_POST['password'];
        $user_info = D('user')->getUserInfoByWhere(array('email'=>$email));
        if (is_array($user_info) && !empty($user_info)) {
            if ($user_info['password'] == md5($password)) {
                $_SESSION['me'] = $user_info;
                $redirect = isset($_SESSION['login_redirect'])?$_SESSION['login_redirect']:'home/index/index';
                $_SESSION['login_redirect'] = '';
                $this->success('登录成功',U($redirect));
            } else {
                $this->error('登录失败，密码不正确');
            }
        } else {
            $this->error('登录失败，用户信息不存在');
        }
    }
    public function register(){
    	$this->display();
    }
    public function handleRegister(){
        $email = $_POST['email'];
        $user_info = M('user')->where(array('email'=>$email))->find();
        if (is_array($user_info) && !empty($user_info)) {
            $this->error('用户注册失败，email已存在');
            die();
        }
        $data['email']          = $_POST['email'];
        $data['password']       = md5($_POST['password']);
        $data['phone']          = $_POST['phone'];
        $data['nickname']       = $_POST['nickname'];
        $data['create_time']    = time();
    	$id = M('user')->add($data);
        if ($id>0) {
            $this->success('注册完成，请等待审核',U('home/user/test'));
        } else {
            $this->error('服务器异常，请稍后重试');
        }
    }
    public function userEdit(){
        $id = $_GET['id'];
        $user = M('user')->where(array('id'=>$id))->find();
        $this->assign('result',$user);
        $this->assign('status',$this->status);
        $this->assign('type',$this->type);
        $this->display();
    }
    public function saveUser(){
        $id         = $_POST['id'];
        $user = M('user');
        $date['password']   = md5($_POST['pwd']);
        $date['email']      = $_POST['email'];
        $date['nickname']   = $_POST['nickname'];
        $date['phone']      = $_POST['phone'];
        $date['type']       = $_POST['type'];
        $date['status']     = $_POST['status'];
        $date['time']       = time();
        $user->where(array('id'=>$id))->save($date);
        $this->success('修改完成',U('home/user/userList'));


    }
    public function logout() {
        $_SESSION['me'] = array();
    }
}