<?php
namespace Passport\Model;
use Common\Model\BaseModel;
class UserModel extends BaseModel {
	public function getUserList($wehre,$offset,$limit){
		$userList = $this->where($where)->limit($offset,$limit)->select();
		return $userList;
	}

	public function getUserInfoByWhere($where) {
		$user = $this->where($where)->find();
		return $user;
	}
}