<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController {

    public function index() {
        $id = intval($_GET['id']);
        if(!$id || $id<0) {
            return $this->error("ID不合法");
        }

        $magazine =  D("Magazine")->find($id);

        if(!$magazine || $magazine['status'] != 1) {
            return $this->error("ID不存在或者杂志被下架");
        }

        $count = intval($magazine['count']) + 1;
        D('Magazine')->updateCount($id, $count);

        $content = D("MagazineContent")->find($id);
        $magazine['content'] = htmlspecialchars_decode($content['content']);
        //$imaUrl = D("Magazine")->select(array('magazine_id'=>$id));
        //$magazine['imaUrl']=$imaUrl['thumb'];

        $advMagazine = D("PositionContent")->select(array('status'=>1,'position_id'=>5),2);
        $rankMagazine = $this->getRank();

        $this->assign('result', array(
            'rankMagazine' => $rankMagazine,
            'advMagazine' => $advMagazine,
            'catId' => $magazine['catid'],
            'magazine' => $magazine,
        ));

        cookie('Info',array('magazine_id'=>$id,
            'magazine_name'=>$magazine['title'],
            'user_name'=>getLoginUser1name(),
            'user_id'=>getLoginUser1id(),
            'thumb'=>$magazine['thumb'],
            'price'=>$magazine['price']));

        $this->display("Detail/index");
    }

    public function  view() {
        if(!getLoginUsername()) {
            $this->error("您没有权限访问该页面");
        }
        $this->index();

    }
}