<?php
/**
 * Created by kechuan.
 * User: user
 * Date: 2016/4/11 0011
 * Time: 17:46
 */
namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller{
    public function register(){
        if(IS_POST){

            if( I('post.name') == '' || I('post.password') == '' || I('post.rpassword') == ''){
                echo "<script>alert('输入不能为空');history.back(-1)</script>";
                exit;
            }
            if(I('post.name') != ''){
                $db = M('Admin');
                $where['name'] = I('post.name');
                $check = $db->where($where)->select();
                if($check){
                    echo "<script>alert('该用户已存在');history.back(-1)</script>";
                    exit;
                }
            }
            if(I('post.password') == I('post.rpassword')){
                $admin = D('Admin');
                $name = I('post.name');
                $password = I('post.password');
                $MD5password = md5($password);
                $admin->adminAdd($name,$MD5password);
                $this->success('添加成功','/Home/Admin/adminList',3);
            }
            else{
                echo "<script>alert('两次密码不一致');history.back(-1)</script>";
                exit;
            }
        }
        else{
            $this->display();
        }
    }
    public function adminList(){
        $admin  = D('Admin');
        $list = $admin->adminList();
        $this->assign('list',json_encode($list));
        $this->display();
    }
}