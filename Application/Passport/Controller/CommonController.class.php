<?php
namespace Passport\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
    	$this->checkLogin();
    }

    public function checkLogin() {
    	$param = $this->getParam();
    	$white = $this->getWhite();
    	$controllers = isset($white[$param['module_name']][$param['controller_name']])
                        ? $white[$param['module_name']][$param['controller_name']]
                        : array();
    	if (!empty($controllers) && in_array($param['action_name'], $controllers)) {
    		return true;
    	}
    	if (is_array($_SESSION['me']) && !empty($_SESSION['me'])) { 
    		return true;
    	} else {
            $_SESSION['login_redirect'] = $param['module_name'].'/'.$param['controller_name'].'/'.$param['action_name'];
    		$this->error('请登录',U('home/user/login'));
    	}
    }

    public function getWhite() {
    	return array(
    			'Home' => array(
    				'User'      => array('login','register','handleLogin','handleRegister'),
    			),
    		);
    }

    public function getParam() {
    	$param['action_name'] 		= ACTION_NAME;
    	$param['controller_name'] 	= CONTROLLER_NAME;
    	$param['module_name'] 		= MODULE_NAME;
    	return $param;
    }
}