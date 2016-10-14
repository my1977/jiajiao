<?php
namespace Passport\Controller;
use Think\Controller;
class UserController extends CommonController {

    public function login () {
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
    //public function register(){
    //	$this->display();
    //}
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
    
    public function logout() {
        $_SESSION['me'] = array();
        $this->success('修改完成',U('home/index/index'));
    }

    public function verifymobile() {
        $mobile = I('post.mobile');
        _ars('验证码已发送',true);
    }
    public function verify() {
        $mobile = I('post.mobile');
        $vcode = I('post.vcode');
        if ($vcode == '1234') {
            _ars('验证成功',true);
        }
        _ars('验证失败',false);
    }
    public function register(){
        $mobile = $_POST['mobile'];
        $user_info = M('user')->where(array('phone'=>$mobile))->find();
        if (is_array($user_info) && !empty($user_info)) {
            _ars('用户注册失败，电话号已存在',false);
        }
        $data['password']       = md5($_POST['password']);
        $data['phone']          = $mobile;
        $data['create_time']    = time();
        $id = M('user')->add($data);
        if ($id>0) {
            _ars('注册完成，请等待审核',true);
        } else {
            _ars('服务器异常，请稍后重试',false);
        }
    }
}