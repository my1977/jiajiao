<?php
namespace Home\Controller;
use Think\Controller;
class NeedController extends CommonController{
	public function addNeed(){
		$id = 1;
        $school = M('school')->where()->select();
        $grade = M('grade')->where()->select();
        $subject = M('subject')->where()->select();
        $need = M('need')->where(array('user_id'=>$id))->find();
        $this->assign('need',$need);
        $this->assign('grade',$grade);
        $this->assign('subject',$subject);
        $this->assign('school',$school);
        $this->display();
	}
	public function saveNeed(){
		$id = 1;
		$need = M('need');
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['provice_id'] = $_POST['provice_id'];
		$data['city_id'] = $_POST['city_id'];
		$data['area_id'] = $_POST['area_id'];
		$data['address'] = $_POST['address'];
		$data['grade_id'] = $_POST['grade'];
		$data['school_id'] = $_POST['school'];
		$data['subject_id'] = $_POST['subject'];
		$data['phone'] = $_POST['phone'];
		$data['remark'] = $_POST['remark'];
		$need->where(array('id'=>$id))->add($data);
		$this->success('增加完成',U('Home/user/test'));
	}
} 