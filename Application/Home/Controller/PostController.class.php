<?php


namespace Home\Controller;
use Think\Controller;

class PostController extends Controller{

    public function addpost($id){   //  回复帖子的id
        $m = M('post');
        $data = array();
        $data[] = array('board'=>1,'text'=>'的咖啡','own'=>$id,'author'=>'ewen');
        $data[] = array('board'=>1,'text'=>'萨哈萨克','own'=>$id,'author'=>'ewen');
        $data[] = array('board'=>1,'text'=>'都玩腻了','own'=>$id,'author'=>'ewen');
        $data[] = array('board'=>1,'text'=>'的的健康撒娇','own'=>$id,'author'=>'ewen');
        $data[] = array('board'=>1,'text'=>'大了看得','own'=>$id,'author'=>'ewen');
        $data[] = array('board'=>1,'text'=>'加快立法解放立刻','own'=>$id,'author'=>'ewen');
        $data[] = array('board'=>1,'text'=>'莫斯科我们我哭了','own'=>$id,'author'=>'ewen');
        $m->addAll($data);
        echo '导入完毕';
    }

    //  浏览帖子功能函数
    public function index($id){
        $m = M('post');
        $owner = $m->where("own = 0 and id = $id")->find(); //  查询楼主的帖子信息
        $this->assign('owner',$owner);
        $count = $m->where("own = $id")->count();
        $page = new \Think\Page($count,8);
        $show = $page->show();
        $post = $m ->where("own = $id")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('post',$post);
        $this->assign('page',$show);
        $this->display();
    }

    //  发帖回帖功能函数
    public function add(){
        $m = M('post');
        $data = array();
        $data['own'] = isset($_POST['alone'])?0:$_POST['own'];
        $data['board'] = $_POST['board'];
        $data['text'] = $_POST['text'];

        if(cookie('username')){
            $data['author'] = cookie('username');
        } else{
            $data['author'] = '匿名';
        }

        $m->create($data);
        $re = $m->add();
        if($re){
            $this->success('发表成功');
        }else{
            $this->error('发表失败');
        }

    }



}