<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/5/11
 * Time: 9:41
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;


class UserManagerController extends CommonController
{
    public function index() {
        $users = D('User')->getUsers();
        $this->assign('users', $users);
        $this->display();
    }

    public function add() {

        // 保存数据
        if(IS_POST) {

            if(!isset($_POST['username']) || !$_POST['username']) {
                return show(0, '用户名不能为空');
            }
            if(!isset($_POST['password']) || !$_POST['password']) {
                return show(0, '密码不能为空');
            }
            $_POST['password'] = getMd5Password($_POST['password']);
            // 判定用户名是否存在
            $user = D("User")->getUserByUsername($_POST['username']);
            if($user && $user['status']!=-1) {
                return show(0,'该用户已存在');
            }

            // 新增
            $id = D("User")->insert($_POST);
            if(!$id) {
                return show(0, '新增失败');
            }
            return show(1, '新增成功');
        }
        $this->display();
    }

    public function setStatus() {
        $data = array(
            'user_id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($_POST,'User');
    }

    public function edit() {
        $res=$_GET['id'];
        //$res = $this->getLoginUser();
        $user = D("User")->getUserByUserId($res);
        $this->assign('vo',$user);
        $this->display();
    }

    public function save() {
        $user = $this->getLoginUser();
        if(!$user) {
            return show(0,'用户不存在');
        }
        if(!$_POST['realname']){
            return show(0, '姓名不能为空！');
        }
        if(!$_POST['phone_number']){
            return show(0, '电话号码不能为空！');
        }
        if(!$_POST['address']){
            return show(0, '住址不能为空！');
        }
        if(!$_POST['post_number']){
            return show(0, '邮编不能为空！');
        }
        if(!is_numeric($_POST['phone_number'] )){
            return show(0, '电话号码只能为数字！');
        }
        if(strlen($_POST['phone_number'])!=11){
            return show(0, '电话号码只能为11位！');
        }
        if(!is_numeric($_POST['post_number'] )){
            return show(0, '邮编只能为数字！');
        }
        if(strlen($_POST['post_number'])!=6){
            return show(0, '邮编只能为6位！');
        }


        $data['realname'] = $_POST['realname'];
        $data['email'] = $_POST['email'];

        try {
            $id = D("User")->updateByUserId($user['user_id'], $data);
            if($id === false) {
                return show(0, '配置失败');
            }
            return show(1, '配置成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    public function getRegister(){
        $user=D('User')->getUserByTime1();

        $this->ajaxReturn(array('code'=>200,'result'=>$user));
    }

}