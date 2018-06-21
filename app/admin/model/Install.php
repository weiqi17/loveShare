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
        $res = $this->insert($con);
    }
}