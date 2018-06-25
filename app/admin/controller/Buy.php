<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/25
 * Time: 14:58
 */

namespace app\admin\controller;
use think\Loader;
use think\Controller;
use think\Session;

class Buy extends Admin
{
    function index()
    {
        return view();
    }
    function getMessage()
    {
        $user = Session::get('userinfo','admin');
        $res = Loader::model('Buy')->getRecord($user['type'],$user['id']);
        return $res;
    }
}