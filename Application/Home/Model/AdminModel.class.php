<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/4/11 0011
 * Time: 17:55
 */
namespace Home\Model;
use Think\Model;

class AdminModel extends Model{
    public  function __construct(){
        parent::__construct();
        $this->model = M('Admin');
    }

    public function adminAdd($name,$password){
        $data['name'] = $name;
        $data['password'] = $password;
        $data['add_time'] = date('Y-m-d');
        return $this->model->add($data);
    }
    public function adminList(){
        return $this->model->select();
    }
}