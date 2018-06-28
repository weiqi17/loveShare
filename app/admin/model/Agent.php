<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/26
 * Time: 20:01
 */

namespace app\admin\model;
use app\common\model\Common;
use think\Db;
use think\Model;

class Agent extends  Common
{
    function searchAgent($con)
    {
        if (empty($con))
            return "参数错误！";
        try{
            $res = $this->where('area = '.$con['area'])->select();

        }catch (\Exception $e)
        {
            $res = $e->getMessage();
        }
        return $res;

    }
}