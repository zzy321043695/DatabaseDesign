<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/5/11
 * Time: 11:16
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;


class UserOrderManager extends CommonController
{
    public function index() {
        $users = D('User')->getUsers();
        $this->assign('users', $users);
        $this->display();
    }
}