<?php
/**
 * Created by PhpStorm.
 * User: CoyZheng
 * Date: 2019/4/10
 * Time: 19:16
 */

namespace Home\Controller;
use Think\Controller;


class CartController extends Controller
{
    public function index(){
        //$id = intval($_GET['id']);
        $userName=session("User");
        if(!$userName){
            return $this->error('您还未登录，请先登录！','/index.php?m=home&c=login', 1);
        }
        //echo $userName;
        //$cart = D('Subscription')->where($userName)->find();
        $cart = D('Subscription')->getSub($userName);
        //return $this->error($userName['user_id'],'/index.php?m=home&c=login', 1);
        $this->assign('cart', $cart);
        $this->display();
    }

    public function getLoginUser() {
        return session("User");
    }

    public function userCheck() {
        $userName=session("User");
        if(!$userName){
            return show(0,'请先登陆！');
        }
        if($userName){
            return show(0,'请先登陆！');
        }
    }

    public function addMagazine(){

        if($_POST) {
            $res = $this->getLoginUser();
            if($res){
                $user = D("User")->getUserByUserId($res['user_id']);
                if(!$user){
                    return show(0, '请先登陆！');
                }
                if($user['realname'] && $user['phone_number'] && $user['address'] && $user['post_number']){
                    $res = D('Subscription')->addSub($_POST["user_id"], $_POST);
                    if ($res==true) {
                        return show(1, '订阅成功');
                    } else {
                        return show(0, '订阅失败');
                    }
                }

                else{
                    return show(0, '请完善个人信息！');
                }
            }
            else{
                return show(0, '请先登陆！');
            }
        }
        else{
            return show(0,"未收到请求的数据！");
        }
    }

    public function subMagazine(){
        if($_POST) {
            $res = D('Subscription')->deleteSub($_POST['id']);
            if($res){
                return show(1,'操作成功！');
            }
            else{
                return show(0,'操作失败！');
            }
        }
        else{
            //$msg = str($id)+'huijia';
            return show(0,'未收到请求的数据！');
        }
    }
}