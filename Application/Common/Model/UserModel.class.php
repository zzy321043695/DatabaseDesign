<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/4/7
 * Time: 16:31
 */

namespace Common\Model;


use Think\Model;

class UserModel extends Model
{
    private $_db = '';

    public function __construct() {
        $this->_db = M('user');
    }


    public function getUserByUsername($username='') {
        $res = $this->_db->where('username="'.$username.'"')->find();
        return $res;
    }
    public function getUserByUserId($userId=0) {
        $res = $this->_db->where('user_id='.$userId)->find();
        return $res;
    }

    public function updateByUserId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('user_id='.$id)->save($data); // 根据条件更新记录
    }

    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    public function getUsers() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('user_id desc')->select();
    }
    /**
     * 通过id更新的状态
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('user_id='.$id)->save($data); // 根据条件更新记录

    }

    public function getLastLoginUsers() {
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $data = array(
            'status' => 1,
            'lastlogintime' => array("gt",$time),
        );

        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }

}