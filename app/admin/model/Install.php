<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/21
 * Time: 15:06
 */

namespace app\admin\model;
use app\common\model\Common;
use think\Db;
use think\Model;

class Install extends Common
{
    public function insertOne($con)
    {
        return $res = $this->insert($con);
    }
    function getAll()
    {
        try {
            $res = $this->field("install.id,user.username,install.buildtime,
            install.adress,install.detailadress,install.processing,install.detailpro,install.createtime")
                ->table(['user','install'])
                ->where('user.id = install.u_id')
                ->order('install.createtime ASC')->select();

        } catch (\Exception $e) {
            $res = $e->getMessage();
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