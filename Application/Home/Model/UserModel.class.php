<?php
/**
 * Created by kechuan.
 * User: user
 * Date: 2016/4/9 0009
 * Time: 16:34
 */
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->model = M("User");
    }
    public function userList(){
        return $this->model->select();
    }
    public function userAdd($uid,$name){
        $data['uid']  = $uid;
        $data['name'] = $name;
        return $this->model->add($data);
    }
}