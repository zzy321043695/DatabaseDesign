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
        $magazine = D('Magazine');
        for ($i = 0;$i<count($cart);$i++){
            $res=$magazine->find($cart[$i]['magazine_id']);
            $cart[$i]['magazine_count'] = $res['count'];
            $cart[$i]['post_code_from'] = $res['post_code_from'];
            $cart[$i]['type'] = $res['type'];
            $cart[$i]['issue_year'] = $res['issue_year'];
        }

        $order = D('Order')->getOrd($userName);
        for ($i = 0;$i<count($order);$i++){
            $res=$magazine->find($order[$i]['magazine_id']);
            $order[$i]['magazine_count'] = $res['count'];
            $order[$i]['post_code_from'] = $res['post_code_from'];
            $order[$i]['type'] = $res['type'];
            $order[$i]['issue_year'] = $res['issue_year'];
        }
        //$cart['magazine_count']=$magazine['count'];
        //return $this->error($userName['user_id'],'/index.php?m=home&c=login', 1);
        $this->assign('cart', $cart);
        $this->assign('order', $order);
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
                        return show(1, '加入购物车成功');
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
            return show(0,'未收到请求的数据！');
        }
    }
    public function addOrder(){
        if($_POST) {
            $res = $this->getLoginUser();
            if($res){
                $user = D("User")->getUserByUserId($res['user_id']);
                if(!$user){
                    return show(0, '请先登陆！');
                }
                foreach ($_POST['push'] as $value){
                    if($value['id']!=0){
                        $result = D('Subscription')->getSubBySubId($value['id']);
                        $time = time();
                        $datatime = date('Y-m-d H:i:s',$time);
                        $result['create_time'] = $datatime;
                        $result['start_time'] = $value['start'];
                        $result['end_time'] = $value['end'];
                        $result['count'] = $value['count'];
                        $result['total_issues'] = $value['total_issues'];
                        $discount = 1;
                        if($value['discount']){
                            $res1 = D('Discount')->getDiscountByDiscountCode($value['discount'],$res['user_id']);
                            if(!$res1){
                                return show(0, '优惠码错误！');
                            }
                            else{
                                $res2 = D('Discount')->deleteDiscountById($res1['id']);
                                $discount= $res1['discount'];
                            }
                        }
                        $result1 = D('Order')->addOrd($result['user_id'],$result,$discount);

                        D('Subscription')->deleteSub($value['id']);
                        if ($result1==false) {
                            return show(0, '提交失败');
                        }
                    }
                }
                return show(1, '提交成功');
            }
            else{
                return show(0, '请先登陆！');
            }
        }
        else{
            return show(0,"未收到请求的数据！");
        }
    }
}