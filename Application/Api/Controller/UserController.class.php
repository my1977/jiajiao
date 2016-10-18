<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function userinfo() {
        $user_id = I('post.user_id');
        $user_info = M('user')->where(array('id'=>$user_id))->find();
        if (is_array($user_info) && !empty($user_info)) {
            _ars($user_info,true);
        }
        _ars('用户信息不存在',false);
    }

    public function setProfile () {
        $user_id            = I('post.user_id');
        $email              = I('post.email');
        $idcard_image       = I('post.idcard_image');
        $idcard_image_back  = I('post.idcard_image_back');
        $adress             = I('post.adress');

        $user = D('user')->getInfoByid($user_id);
        if ($user) {
            M('userProfile')->where()->save();
        }
        _ars('保存成功',true);
       
    }
}