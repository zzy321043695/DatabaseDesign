<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    
    public function index(){

        $magazine = D('Magazine')->maxcount();
        $magazinecount = D('Magazine')->getmagazineCount(array('status'=>1));
        $positionCount = D('Position')->getCount(array('status'=>1));
        $adminCount = D("Admin")->getLastLoginUsers();

        $onlineUserCount = D("User")->getOnlineUsers();

        $this->assign('magazine', $magazine);
        $this->assign('magazinecount', $magazinecount);
        $this->assign('positioncount', $positionCount);
        $this->assign('admincount', $adminCount);
        $this->assign('onlineUserCount', $onlineUserCount);
        $this->display();
    }

}