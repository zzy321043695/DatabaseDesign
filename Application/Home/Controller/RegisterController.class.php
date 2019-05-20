<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/4/7
 * Time: 16:03
 */

namespace Home\Controller;
use Think\Controller;


class RegisterController extends Controller
{
    public function index(){
        if(session('User')) {
            $this->redirect('/index.php?c=register');
        }
        // admin.php?c=index
        $this->display();
    }
    public function check() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }

        $ret = D('User')->getUserByUsername($username);//检查是否插入成功
        if($ret){
            return show(0,'用户名已存在');
        }

        D("User")->insert(array('username'=>$username,'password'=>getMd5Password($password),'isOnline' => 1));//插入数据库

        $ret = D('User')->getUserByUsername($username);//检查是否插入成功
        if($ret) {
            session('User', $ret);
            return show(1, '注册成功');
        }
    }

    public function loginout() {
        session('User', null);
        $this->redirect('/index.php');
    }
}