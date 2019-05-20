<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/4/10
 * Time: 18:57
 */

namespace Common\Model;

use Think\Model;

class OrderModel extends Model
{
    private $_db = '';
    public function __construct() {
        $this->_db = M('order');
    }

    public function addOrd($user_id, $data,$discount=1) {

        if(!$user_id || !is_numeric($user_id)) {
            throw_exception("ID不合法");
        }

        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }

        $res = $this->_db->where('user_id='.$user_id.' and magazine_id='.$data['magazine_id'])->find();
            $data['total_price']=intval($data['count'])*$data['price']*$data['total_issues']*$discount;
            unset($data['id']);
            return  $this->_db->where('user_id='.$user_id)->add($data);

    }

    public function getOrd($user) {
        //return $res = $this->_db->select(array('user_id'=>$user_id));
        $conditions['username'] = $user['username'];
        $conditions['user_id'] = $user['user_id'];
        $list = $this->_db->where($conditions)
            ->order('update_time desc ')
            ->limit(0,30)
            ->select();
        return $list;
    }


    public function getOrderByOrderId($Id=0) {
        $res = $this->_db->where('id='.$Id)->find();
        return $res;
    }

    public function deleteOrd($id) {

        return $res = $this->_db->where("id=".$id)->delete();

    }

    public function setStartTime($id,$time) {
        return $res = $this->_db->where("id=".$id)->save(array('start_time' =>$time));
    }

    public function setEndTime($id,$time) {
        return $res = $this->_db->where("id=".$id)->save(array('end_time' =>$time));
    }

    public function getOrders() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('id desc')->select();
    }

    public function updateByOrderId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
    }


    public function updateStatusById($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
    }

}