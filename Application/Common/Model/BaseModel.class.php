<?php
namespace Common\Model;
use Think\Model;
class BaseModel extends Model {
    public function getInfoById($id, $primary = 'id') {
        return $this->where(array($primary=>$id))->find();
    }

    public function getListByWhere($where, $limit, $offset) {
        $result = $this->where($where)->limit($offset,$limit)->select();
        return $result;
    }

    public function updateById($id, $data, $primary='id'){
        return $this->where(array($primary=>$id))->save($data);
    }

    public function updateByWhere($where, $data){
        return $this->where($where)->save($data);
    }

    public function insert($data) {
        return $this->add($data);
    }
}