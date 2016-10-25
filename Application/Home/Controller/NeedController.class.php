<?php
namespace Home\Controller;
use Think\Controller;
class NeedController extends CommonController{
	public function addNeed(){
        $school = M('school')->where()->select();
        $grade = M('grade')->where()->select();
        $subject = M('subject')->where()->select();
        $this->assign('grade',$grade);
        $this->assign('subject',$subject);
        $this->assign('school',$school);
        $this->display();
	}
	public function saveNeed(){
		$need = M('need');
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['provice_id'] = $_POST['provice_id'];
		// $data['city_id'] = $_POST['city_id'];
		// $data['area_id'] = $_POST['area_id'];
		$data['address'] = $_POST['address'];
		$data['grade_id'] = $_POST['grade'];
		$data['school_id'] = $_POST['school'];
		$data['subject_id'] = $_POST['subject'];
		$data['phone'] = $_POST['phone'];
		$data['remark'] = $_POST['remark'];
		$data['user_id'] = $_SESSION['me']['id'];
		$need->where()->add($data);
		$this->success('增加完成',U('Home/user/test'));
	}
	public function needList(){
		$grade = $_POST['grade'];
		if(!empty($grade)){
			$need = M('need')->where(array('grade_id'=>$grade))->select();
		}else{
			$need = M('need')->where()->select();
		}
		if(!is_array($need)||empty($need)){
            echo "需求不存在！！";
            die();
        }
		$grade = M('grade')->where()->select();
		$this->assign('grade',$grade);
		$this->assign('need',$need);
		$this->display();
	}
	public function needInfo(){
		$id = $_GET['id'];
        if(!$id){
            echo $id;
            $this->error("id error!!",U('home/need/needList'));
        }
    	$need_info = M('need')->where(array('id'=>$id))->find();
        if(!is_array($need_info)||empty($need_info)){
            $this->error("need error!!",U('home/need/needList'));
        }
    	$school = M('school')->where(array('id'=>$need_info['school_id']))->find();
    	$grade = M('grade')->where(array('id'=>$need_info['grade_id']))->find();
    	$subject = M('subject')->where(array('id'=>$need_info['subject_id']))->find();
        $this->assign('need_info',$need_info);
        $this->assign('school',$school);
        $this->assign('grade',$grade);
    	$this->assign('subject',$subject);
    	$this->display();
	}
} 