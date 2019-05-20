<?php
/**
 * Created by PhpStorm.
 * Discount: CoyZheng
 * Date: 2019/5/11
 * Time: 11:48
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;


class DiscountController extends CommonController
{
    public function index() {
        $discounts = D('Discount')->getDiscounts();
        $this->assign('discounts', $discounts);
        $this->display();
    }

    public function add() {

        // 保存数据
        if(IS_POST) {

            if(!isset($_POST['code']) || !$_POST['code']) {
                return show(0, '优惠码不能为空');
            }
            // 判定优惠码是否存在
            $discount = D("Discount")->getDiscountByDiscountCode($_POST['code']);
            if($discount && $discount['status']!=-1) {
                return show(0,'该优惠码已存在');
            }
            // 新增
            $id = D("Discount")->insert($_POST);
            if(!$id) {
                return show(0, '新增失败');
            }
            return show(1, '新增成功');
        }
        $this->display();
    }

    public function setStatus() {
        $data = array(
            'id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($_POST,'Discount');
    }

    public function edit() {
        $res=$_GET['id'];
        //$res = $this->getLoginDiscount();
        $discount = D("Discount")->getDiscountByDiscountId($res);
        $this->assign('vo',$discount);
        $this->display();
    }

    public function save() {
        try {
            $id = D("Discount")->updateByDiscountId($_POST['id'], $_POST);
            if($id === false) {
                return show(0, '配置失败');
            }
            return show(1, '配置成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }
    
}