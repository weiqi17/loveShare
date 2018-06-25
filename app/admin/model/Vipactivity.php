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
}