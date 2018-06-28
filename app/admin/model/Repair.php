<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/27
 * Time: 15:46
 */

namespace app\admin\model;

use app\common\model\Common;
use think\Db;
use think\Model;
class Repair extends Common
{
    function getAll($type,$id)
    {
        if ($type == 'admin')
        {
            try {
                $res = $this->field("repair.id,user.username,repair.repair_time,
            repair.adress,repair.detailadress,repair.processing,repair.detailpro,repair.createtime")
                    ->table(['user','repair'])
                    ->where('user.id = repair.user_id')
                    ->select();

            } catch (\Exception $e) {
                $res = $e->getMessage();
            }
        }
        else
        {
            try {
                $res = $this->field("repair.id,user.username,repair.repair_time,
            repair.adress,repair.detailadress,repair.processing,repair.detailpro,repair.createtime")
                    ->table(['user','repair'])
                    ->where('user.id = repair.user_id and repair.user_id = '.$id)
                    ->select();

            } catch (\Exception $e) {
                $res = $e->getMessage();
            }
        }
        return $res;
    }
    function updateRecord($con)
    {
        if (empty($con))
            return "参数错误！";

        try {
            $res = $this->where('id = '.$con['id'])
                ->update(['processing'=>$con['processing'],'detailpro' =>$con['detailpro']]);
        } catch (\Exception $e) {
            $res = $e->getMessage();
        }
        return $res;
    }
}