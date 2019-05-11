<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 文章内容管理
 */
class ContentController extends CommonController {

    public function index() {
        $conds = array();
        $title = $_GET['title'];
        if($title) {
            $conds['title'] = $title;
        }
        if($_GET['catid']) {
            $conds['catid'] = intval($_GET['catid']);
        }

        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 10;

        $magazine = D("Magazine")->getmagazine($conds,$page,$pageSize);
        $count = D("Magazine")->getmagazineCount($conds);

        $res  =  new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        $positions = D("Position")->getNormalPositions();
        $this->assign('pageres',$pageres);
        $this->assign('magazine',$magazine);
        $this->assign('positions', $positions);

        $this->assign('webSiteMenu',D("Menu")->getBarMenus());
        $this->display();
    }
    public function add(){
        if($_POST) {
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不存在');
            }
            if(!isset($_POST['small_title']) || !$_POST['small_title']) {
                return show(0,'短标题不存在');
            }
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'文章栏目不存在');
            }
            if(!isset($_POST['keywords']) || !$_POST['keywords']) {
                return show(0,'关键字不存在');
            }
            if(!isset($_POST['content']) || !$_POST['content']) {
                return show(0,'content不存在');
            }
            if($_POST['magazine_id']) {
                return $this->save($_POST);
            }
            $magazineId = D("Magazine")->insert($_POST);
            if($magazineId) {
                $magazineContentData['content'] = $_POST['content'];
                $magazineContentData['magazine_id'] = $magazineId;
                $cId = D("MagazineContent")->insert($magazineContentData);
                if($cId){
                    return show(1,'新增成功');
                }else{
                    return show(1,'主表插入成功，副表插入失败');
                }


            }else{
                return show(0,'新增失败');
            }

        }else {

            $webSiteMenu = D("Menu")->getBarMenus();

            $titleFontColor = C("TITLE_FONT_COLOR");
            $copyFrom = C("COPY_FROM");
            $this->assign('webSiteMenu', $webSiteMenu);
            $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyfrom', $copyFrom);
            $this->display();
        }
    }

    public function edit() {
        $magazineId = $_GET['id'];
        if(!$magazineId) {
            // 执行跳转
            $this->redirect('/admin.php?c=content');
        }
        $magazine = D("Magazine")->find($magazineId);
        if(!$magazine) {
            $this->redirect('/admin.php?c=content');
        }
        $magazineContent = D("MagazineContent")->find($magazineId);
        if($magazineContent) {
            $magazine['content'] = $magazineContent['content'];
        }

        $webSiteMenu = D("Menu")->getBarMenus();
        $this->assign('webSiteMenu', $webSiteMenu);
        $this->assign('titleFontColor', C("TITLE_FONT_COLOR"));
        $this->assign('copyfrom', C("COPY_FROM"));

        $this->assign('magazine',$magazine);
        $this->display();
    }

    public function save($data) {
        $magazineId = $data['magazine_id'];
        unset($data['magazine_id']);

        try {
            $id = D("Magazine")->updateById($magazineId, $data);
            $magazineContentData['content'] = $data['content'];
            $condId = D("MagazineContent")->updatemagazineById($magazineId, $magazineContentData);
            if($id === false || $condId === false) {
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }

    }
    public function setStatus() {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                if (!$id) {
                    return show(0, 'ID不存在');
                }
                $res = D("Magazine")->updateStatusById($id, $status);
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            }
            return show(0, '没有提交的内容');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    public function listorder() {
        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        try {
            if ($listorder) {
                foreach ($listorder as $magazineId => $v) {
                    // 执行更新
                    $id = D("Magazine")->updatemagazineListorderById($magazineId, $v);
                    if ($id === false) {
                        $errors[] = $magazineId;
                    }
                }
                if ($errors) {
                    return show(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
                }
                return show(1, '排序成功', array('jump_url' => $jumpUrl));
            }
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(0,'排序数据失败',array('jump_url' => $jumpUrl));
    }

    public function push() {
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $positonId = intval($_POST['position_id']);
        $magazineId = $_POST['push'];

        if(!$magazineId || !is_array($magazineId)) {
            return show(0, '请选择推荐的文章ID进行推荐');

        }
        if(!$positonId) {
            return show(0, '没有选择推荐位');
        }
        try {
            $magazine = D("Magazine")->getmagazineBymagazineIdIn($magazineId);
            if (!$magazine) {
                return show(0, '没有相关内容');
            }

            foreach ($magazine as $new) {
                $data = array(
                    'position_id' => $positonId,
                    'title' => $new['title'],
                    'thumb' => $new['thumb'],
                    'magazine_id' => $new['magazine_id'],
                    'status' => 1,
                    'create_time' => $new['create_time'],
                );
                $position = D("PositionContent")->insert($data);
            }
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }

        return show(1, '推荐成功',array('jump_url'=>$jumpUrl));


    }
}