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
                _ars('登录成功',true);
            } else {
                _ars('登录失败，密码不正确',false);
            }
        } else {
            _ars('登录失败，用户信息不存在',false);
        }

    }
    public function register(){
    	$this->display();
    }
    public function handleRegister(){
        $email = $_POST['email'];
        $user_info = M('user')->where(array('email'=>$email))->find();
        if (is_array($user_info) && !empty($user_info)) {
            _ars('用户注册失败，email已存在',false);
            die();
        }
        $data['email']          = $_POST['email'];
        $data['password']       = md5($_POST['password']);
        $data['phone']          = $_POST['phone'];
        $data['nickname']       = $_POST['nickname'];
        $data['create_time']    = time();
    	$id = M('user')->add($data);
        if ($id>0) {
            _ars('注册完成，请等待审核',true);
        } else {
            _ars('服务器异常，请稍后重试',false);
        }
    }
  
    public function logout() {
        $_SESSION['me'] = array();
    }
}