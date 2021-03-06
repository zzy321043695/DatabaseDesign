<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class IndexController extends CommonController {
    public function index($type=''){
        //获取排行
        $rankMagazine = $this->getRank();
        // 获取首页大图数据
        $topPicMagazine = D("PositionContent")->select(array('status'=>1,'position_id'=>2),1);
        // 首页3小图推荐
        $topSmailMagazine = D("PositionContent")->select(array('status'=>1,'position_id'=>3),3);

        $listMagazine = D("Magazine")->select(array('status'=>1,'thumb'=>array('neq','')),30);

        $advMagazine = D("PositionContent")->select(array('status'=>1,'position_id'=>5),2);

        //$userName = D("user")->select()

        $this->assign('result', array(
            'topPicMagazine' => $topPicMagazine,
            'topSmailMagazine' => $topSmailMagazine,
            'listMagazine' => $listMagazine,
            'advMagazine' => $advMagazine,
            'rankMagazine' => $rankMagazine,
            'catId' => 0,

        ));
        /**
         * 生成页面静态化
         */
        if($type == 'buildHtml') {
            $this->buildHtml('index',HTML_PATH,'Index/index');

        }else {
            $this->display();
        }
    }

    public function build_html() {
        $this->index('buildHtml');
        return show(1, '首页缓存生成成功');
    }


    public function crontab_build_html() {
        if(APP_CRONTAB != 1) {
            die("the_file_must_exec_crontab");
        }
        $result = D("Basic")->select();
        if(!$result['cacheindex']) {
            die('系统没有设置开启自动生成首页缓存的内容');
        }
        $this->index('buildHtml');

    }

    public function getCount() {
        if(!$_POST) {
            return show(0, '没有任何内容');
        }

        $magazineIds =  array_unique($_POST);

        try{
            $list = D("Magazine")->getMagazineByMagazineIdIn($magazineIds);
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }

        if(!$list) {
            return show(0, 'notdataa');
        }

        $data = array();
        foreach($list as $k=>$v) {
            $data[$v['magazine_id']] = $v['count'];
        }
        return show(1, 'success', $data);
    }

    public function getMagazineIdByMagazineName() {
        if($_POST){
            $res = D('Magazine')->select();
            $found = 0;
            foreach ($res as $value){
                if($value['title'] == $_POST['title']){
                    $r = 'id=';
                    return show(1,$value['magazine_id']);
                }
            }
            return show(0,'查询的杂志不存在！');
        }

    }

}