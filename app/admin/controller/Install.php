<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/24
 * Time: 13:18
 */

namespace app\admin\controller;

use think\Loader;

class Install extends Admin
{
    function index()
    {
        return view();
    }
    function getList()
    {
        $data = Loader::model('Install')->getAll();
        for ($i = 0;$i<count($data);$i++)
        {
            $res[$i]['id'] = $data[$i]['id'];
            $res[$i]['username'] = $data[$i]['username'];
            $res[$i]['adress'] = $data[$i]['adress'].'/'.$data[$i]['detailadress'];
            $res[$i]['processing'] = $data[$i]['processing'];
            $res[$i]['detailpro'] = $data[$i]['detailpro'];
            $res[$i]['buildtime'] = $data[$i]['buildtime'];
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
        $res = Loader::model('Install')->updateRecord($con);
        return $res;
    }
}