<?php
namespace Home\Controller;
use Think\Controller;

class CatController extends CommonController {
    public function index(){
        $id = intval($_GET['id']);
        if(!$id) {
            return $this->error('ID不存在');
        }

        $nav = D("Menu")->find($id);
        if(!$nav || $nav['status'] !=1) {
            return $this->error('栏目id不存在或者状态不为正常');
        }
        $advMagazine = D("PositionContent")->select(array('status'=>1,'position_id'=>5),2);
        $rankMagazine = $this->getRank();

        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 20;
        $conds = array(
            'status' => 1,
            'thumb' => array('neq', ''),
            'catid' => $id,
        );
        $magazine = D("Magazine")->getMagazine($conds,$page,$pageSize);
        $count = D("Magazine")->getMagazineCount($conds);

        $res  =  new \Think\Page($count,$pageSize);
        $pageres = $res->show();

        $this->assign('result', array(
            'advMagazine' => $advMagazine,
            'rankMagazine' => $rankMagazine,
            'catId' => $id,
            'listMagazine' => $magazine,
            'pageres' => $pageres,
        ));
        $this->display();
    }
    
}