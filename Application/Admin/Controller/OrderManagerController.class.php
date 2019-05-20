<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/5/12
 * Time: 20:54
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;


class OrderManagerController extends CommonController
{
    public function index() {
        $orders = D('Order')->getOrders();
        $this->assign('orders', $orders);
        $this->display();
    }


    public function setStatus() {
        $data = array(
            'id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($_POST,'Order');
    }

    public function edit() {
        $res=$_GET['id'];
        //$res = $this->getLoginDiscount();
        $order = D("Order")->getOrderByOrderId($res);
        $this->assign('vo',$order);
        $this->display();
    }

    public function save() {

        if(!$_POST['state']){
            return show(0, '订单状态不能为空！');
        }

        try {
            $id = D("Order")->updateByOrderId($_POST['id'], $_POST);
            if($id === false) {
                return show(0, '配置失败');
            }
            return show(1, '配置成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }

}