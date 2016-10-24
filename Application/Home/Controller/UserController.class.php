<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
    private $sex = array(
            '1' =>  '男',
            '2' => '女',
        );
    public function test(){
        echo 'hello!';
    }
    //
    public function info() {
        $this->display();
    }

    /**
        todo 修改当前用户信息 显示表单 
        暂定修改 邮箱 姓名 性别 住址 身份证号 四个字段
        user userprofile两个表
    **/
    public function editUser() {
        $id = $_SESSION['me']['id'];
        $userinfo = M('user')->where(array('id'=>$id))->find();
        $user_profile = M('user_profile')->where(array('user_id'=>$id))->find();
        $this->assign('user_profile',$user_profile);
        $this->assign('userinfo',$userinfo);
        $this->assign('sex',$this->sex);
        $this->display();

    }

    //保存信息 保存到相应表  具体对应情况 看数据表 
    public function saveUser() {
        $id = $_SESSION['me']['id'];
        $user          = M('user');
        $user_profile  = M('user_profile');  
        $user_data['email']      = $_POST['email'];
        $user_data['nickname']   = $_POST['nickname'];
        $user_data['time']       = time();
        $user_data['type']       = 1;
        $profile_data['sex']     = $_POST['sex'];
        $profile_data['idcard_no']     = $_POST['idcard_no'];
        $profile_data['address'] = $_POST['address'];
        $user->where(array('id'=>$id))->save($user_data);
        $user_profile->where(array('user_id'=>$id))->save($profile_data);
        $this->success('修改完成',U('Home/user/test'));

    }
    public function addStudentInfo(){
        $id = $_SESSION['me']['id'];
        $school = M('school')->where()->select();
        $user_profile = M('user_profile')->where(array('user_id'=>$id))->find();
        $this->assign('user_profile',$user_profile);
        $this->assign('school',$school);
        $this->display();
    }
    public function saveStudentInfo(){
        $id   = $_SESSION['me']['id'];
        $user          = M('user');
        $user_profile  = M('user_profile');
        $data['student_card_image'] = $_POST['student_card_image'];
        $data['school']             = $_POST['school'];
        $data['dept']               = $_POST['dept'];
        $data['strength']           = $_POST['strength'];
        $data['remark']             = $_POST['remark'];
        $user_data['type']          = 2;
        $user->where(array('id'=>$id))->save($user_data);
        $user_profile->where(array('user_id'=>$id))->save($data);
        $this->success('增加完成',U('Home/user/test'));
    }
    public function teachList(){
        $user           = M('user')->where(array('type'=>2))->select();
        $user_profile   = M('user_profile')->where()->select();
        foreach($user_profile as $key => $value) {
            $value['user'] = M('user')->where(array('id'=>$value['user_id']))->find();
            $user_profile[$key] = $value;
        }
        $school         = M('school')->where()->select();
        $this->assign('user_profile',$user_profile);
        $this->assign('school',$school);
        $this->assign('user',$user);
        $this->assign('sex',$this->sex);
        $this->display();
    }
    public function teachInfo(){
        $id = $_GET['id'];
        if(!$id){
            echo $id;
            $this->error("id error!!",U('home/user/teachList'));
        }
        $user_info = M('user')->where(array('id'=>$id))->find();
        if(!is_array($user_info)||empty($user_info)){
            $this->error("need error!!",U('home/user/teachList'));
        }
        $user_profile=M('user_profile')->where(array('user_id'=>$id))->find();
        $school = M('school')->where(array('id'=>$user_profile['school']))->find();
        $this->assign('user_info',$user_info);
        $this->assign('school',$school);
        $this->assign('user_profile',$user_profile);
        $this->assign('sex',$this->sex);
        $this->display();
    }
    
}