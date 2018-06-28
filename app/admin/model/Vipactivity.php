<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/23
 * Time: 14:52
 */

namespace app\admin\model;
use app\common\model\Common;
use think\Db;
use think\Model;

class Vipactivity extends Common
{

    function getActivity($con)
    {
        if (empty($con))
        {
            return '参数错误！';
        }
        try {
            $res = $this->where('id = '.$con['id'])->select();
        } catch (\Exception $e) {
            $res = $e->getMessage();
        }
        return $res;
    }
    function getAll()
    {
        try {
            $res = $this->select();
        } catch (\Exception $e) {
            $res = $e->getMessage();
        }
        return $res;
    }
    function deleteOne($con)
    {
        if (empty($con))
            return '参数错误';
        try {
            $res = $this->where('id = '.$con['id'])->delete();
        } catch (\Exception $e) {
            $res = $e->getMessage();
        }
        return $res;
    }
    function addOneRecord($con)
    {
        if (empty($con))
            return '参数错误';
        try {
            $res = $this->insert($con);
        } catch (\Exception $e) {
            $res = $e->getMessage();
        }
        return $res;
    }
    function updateRecord($con)
    {
        if (empty($con))
            return "参数错误！";
        try{
            $res = $this->where('id = '.$con['id'])
                ->update(['title'=>$con['title'],'subtitle1' =>$con['subtitle1'],
                    'subtitle2'=>$con['subtitle2'],'price1' =>$con['price1'],
                    'price2'=>$con['price2'],'price3' =>$con['price3'],
                    'content1'=>$con['content1'],'content2' =>$con['content2'],
                    'content3'=>$con['content3'],'time' =>$con['time'],
                    'picture' =>$con['picture'],'detailpic'=>$con['detailpic']]);

        }catch (\Exception $e)
        {
            $res = $e->getMessage();
        }
        return $res;
    }
}