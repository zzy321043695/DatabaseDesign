<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/4/10
 * Time: 18:57
 */

namespace Common\Model;


use Think\Model;

class SubscriptionModel extends Model
{
    private $_db = '';
    public function __construct() {
        $this->_db = M('subscription');
    }

    public function addSub($user_id, $data) {

        if(!$user_id || !is_numeric($user_id)) {
            throw_exception("ID不合法");
        }

        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }

        $res = $this->_db->where('user_id='.$user_id.' and magazine_id='.$data['magazine_id'])->find();
        if(!$res) {
            $data['total_price']=intval($data['count'])*$data['price'];
            return  $this->_db->where('user_id='.$user_id)->add($data);
        }else{
            $data['count'] = intval($data['count'])+intval($res['count']);
            $data['total_price']=intval($data['count'])*$data['price'];
            return  $this->_db->where('user_id='.$user_id.' and magazine_id='.$data['magazine_id'])->save($data); // 根据条件更新记录
        }
        //return  $this->_db->where('admin_id='.$id)->save($data); // 根据条件更新记录
    }

    public function deleteSub($id) {

        return $res = $this->_db->where("id=".$id)->delete();

    }

    public function getSub($user) {
        //return $res = $this->_db->select(array('user_id'=>$user_id));
        $conditions['username'] = $user['username'];
        $conditions['user_id'] = $user['user_id'];
        $list = $this->_db->where($conditions)
            ->order('update_time desc ')
            ->limit(0,30)
            ->select();
        return $list;
    }

    public function getSubBySubId($id) {
        //$result = D('Subscription')->where('id=33')->find();
        return $res = $this->_db->where("id=".$id)->find();

    }

}