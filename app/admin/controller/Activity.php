<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/23
 * Time: 15:19
 */

namespace app\admin\controller;
use think\Loader;
class Activity extends Admin
{

    function index()
    {
        return view();
    }
    public function getList()
    {
        $data = Loader::model('Vipactivity')->getAll();
        return $data;
    }
   function delete()
   {
       $con['id'] = input('post.id');
       $res = Loader::model('Vipactivity')->deleteOne($con);
   }
   function edit()
   {
       return $this->fetch();
   }
}