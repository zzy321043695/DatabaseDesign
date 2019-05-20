<?php
namespace Home\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LoginController extends Controller {

    public function index(){
        if(session('User')) {
           $this->redirect('/index.php?c=login');
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

        $ret = D('User')->getUserByUsername($username);
        if(!$ret || $ret['status'] !=1) {
            return show(0,'该用户不存在');
        }

        if($ret['password'] != getMd5Password($password)) {
            return show(0,'密码错误');
        }

        $time=time();
        D("User")->updateByUserId($ret['user_id'],array('lastlogintime'=>date('Y-m-d H:i:s', $time),'isOnline' => 1));

        session('User', $ret);
        return show(1,'登录成功');


    }

    public function loginout() {
        $ret=session('User');
        D("User")->updateByUserId($ret['user_id'],array('isOnline' => 0));
        session('User', null);
        //return show(1,'您已成功退出');
        $this->redirect('/index.php');
    }

}