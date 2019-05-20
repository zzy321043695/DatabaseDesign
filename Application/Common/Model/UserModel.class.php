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

    public function getOnlineUsers() {
        $data = array(
            'status' => 1,
            'isOnline' => 1,
        );
        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
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

    public function getUserByTime() {
        $res = $this->_db->where('lastlogintime','between time',['2018-1-1','2020-1-1']);
        return $res;
    }

    public function getUserByTime1() {
        $beginLastweek=strtotime('-30 days');
        //两周前的时间戳
        $begin = date('Y-m-d  H:i:s',$beginLastweek);
        $result = $this->_db->field("lastlogintime")->where("lastlogintime > '%s'",$begin)->select();
        $sql = "SELECT DATE_FORMAT(lastlogintime,'%Y-%m-%d' ) AS date,count(*) as count FROM db_user WHERE lastlogintime > '$begin' GROUP BY DATE_FORMAT(lastlogintime,'%Y-%m-%d' );";
        $result = $this->_db->query($sql);
        return $result;
    }

}