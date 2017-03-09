<?php


namespace Home\Controller;
use Think\Controller;

class BoardController extends Controller{

    //  给数据库添加数据
    public function addData(){
        $m = M('board');
        $data = array();
        $data[] = array('name' => 'PHP');
        $data[] = array('name' => 'Python');
        $data[] = array('name' => 'JAVA');
        $data[] = array('name' => 'C');
        $data[] = array('name' => 'C++');
        $data[] = array('name' => 'Perl');
        $data[] = array('name' => 'Ruby');
        $data[] = array('name' => 'HTML');
        $m->addAll($data);
        echo '导入完毕';
    }

    //  首页展示
    public function index(){
        $m = M('board');
        $msg = $m->where()->select();
        $this->assign('board',$msg);
        $this->display();
    }

    //  给post表加数据
    public function addDataPost($aa){
        $m = M('post');
        $data = array();
        $data[] = array('board' => $aa,'text'=>'111111','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'222222','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'333333','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'444444','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'555555','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'666666','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'777777','author'=>'ewen');
        $data[] = array('board' => $aa,'text'=>'888888','author'=>'ewen');
        $m->addAll($data);
        echo '导入完毕';
    }

    //  detail函数  需要id参数
    public function detail($id){
        $m = M('board');
        $id = intval($id);
        $board = $m->where("id=$id")->select();
        $this->assign('board',$board[0]);

        $m_p = M('post');
        //  分页显示
        $count = $m_p->where("board=$id")->count();
        $page = new \Think\Page($count,8);
        $show = $page->show();

        $post = $m_p->where("board=$id")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('post',$post);
        $this->assign('page',$show);
        $this->display();
    }



}