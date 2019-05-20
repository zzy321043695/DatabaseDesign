<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/5/11
 * Time: 11:37
 */
namespace Common\Model;


use Think\Model;

class DiscountModel extends Model
{
    private $_db = '';

    public function __construct() {
        $this->_db = M('discount');
    }

    public function getDiscounts() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('id desc')->select();
    }

    public function getDiscountByDiscountId($id) {
        $res = $this->_db->where('id = '.$id)->find();
        return $res;
    }

//    public function getDiscountByDiscountCode($code) {
//        $res = $this->_db->where('code = '.$code)->find();
//        return $res;
//    }

    public function getDiscountByDiscountCode($code=0) {
        $res = $this->_db->where("code= '".$code."' and status = 1 ")->find();
        return $res;
    }

    public function updateByDiscountId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
    }

    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录

    }

    public function deleteDiscountById($id) {
        $data = array(
            'status' => -1,
        );
        return  $this->_db->where('id='.$id)->save($data);
    }


}