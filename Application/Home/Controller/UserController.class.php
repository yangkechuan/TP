<?php
/**
 * Created by kechuan.
 * User: user
 * Date: 2016/4/9 0009
 * Time: 16:37
 */
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    public function userList(){

        $list = D("User")->userList();
        $this->assign('list',json_encode($list));
        $this->display();
    }
    public function userAdd(){
        if(IS_POST){
            if(I('post.uid') == '' || I('post.name') == ''){
                echo "<script>alert('ID或名字不能为空');history.back(-1);</script>";
                exit;
            }
            $uid  = I('post.uid');
            $name = I('post.name');
            D("User")->userAdd($uid,$name);
            $this->success('添加成功','/Home/User/userList',3);
        }
		else{
			$this->display();
		}
    }
}