<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/26
 * Time: 20:17
 */

namespace app\admin\controller;
use think\Loader;
use think\Controller;
use think\Session;


class Repair extends Admin
{
    function index()
    {
        return view();
    }
    function getList()
    {
        $user = Session::get('userinfo','admin');
        $data = Loader::model('Repair')->getAll($user['type'],$user['id']);
        for ($i = 0;$i<count($data);$i++)
        {
            $res[$i]['id'] = $data[$i]['id'];
            $res[$i]['username'] = $data[$i]['username'];
            $res[$i]['adress'] = $data[$i]['adress'].'/'.$data[$i]['detailadress'];
            $res[$i]['processing'] = $data[$i]['processing'];
            $res[$i]['detailpro'] = $data[$i]['detailpro'];
            $res[$i]['repair_time'] = $data[$i]['repair_time'];
            $res[$i]['createtime'] = $data[$i]['createtime'];
        }
        return $res;
    }
    function update()
    {
        $con = Array(
            'id' =>input('post.id'),
            'processing' =>input('post.processing'),
            'detailpro' =>input('post.detailpro'),
        );
        $res = Loader::model('Repair')->updateRecord($con);
        return $res;
    }
}