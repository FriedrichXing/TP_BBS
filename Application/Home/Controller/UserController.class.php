<?php


namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    public function index(){

    }

    public function login(){
        $this->display();   //  调用模版
    }

    //  登录检测
    public function checklog(){
        if(isset($_POST['email'])){
            $name = $_POST['email'];
        }
        $pwd = md5($_POST['pwd']);
        $m = M('user');
        $msg = $m->where("name = '$name'")->find();
        if($msg['pwd'] == $pwd){
            cookie('username',$name);
            $this->success('登录成功',__APP__.'/Home/Board/index');
        }else{
            $this->error('用户名或密码错误');
        }
    }

    public function reg(){
        $this->display();
    }

    //  注册检测
    public function checkreg(){
        $data = array(
            'name' => $_POST['email'],
            'pwd'  => md5($_POST['pwd'])
        );
        $m = M('user');
        $isExist = $m->where("name = '{$data['name']}'")->find();
        if($isExist){
            $this->error('注册失败，用户名已被占用...');
        }else{
            $msg = $m->create($data);
            $result = $m -> add();
            if($result){
                cookie('username',$data['name']);
                $this->success('注册成功',__APP__.'/Home/Board/index');
            }else{
                $this->error('注册失败');
            }
        }
    }

    //  注销
    public function logout(){
//        setcookie('username','',time()-1);
        cookie('username',null);
        $this->success('注销成功');
    }



}