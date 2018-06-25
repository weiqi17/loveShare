<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/25
 * Time: 18:41
 */

namespace app\admin\model;
use app\common\model\Common;
use think\Db;
use think\Model;

class Buy extends Common
{
    function getRecord($type,$id)
    {
        if ($type == 'admin')
        {
            try {
                $res = $this->field("buy.id,user.username,buy.type,
            buy.price,buy.buy_time,buy.end_time")
                    ->table(['user','buy'])
                    ->where('user.id = buy.user_id')
                    ->select();

            } catch (\Exception $e) {
                $res = $e->getMessage();
            }
        }
        else
        {
            try {
                $res = $this->field("buy.id,user.username,buy.type,
            buy.price,buy.buy_time,buy.end_time")
                    ->table(['user','buy'])
                    ->where('user.id = buy.user_id and buy.user_id = '.$id)
                    ->select();

            } catch (\Exception $e) {
                $res = $e->getMessage();
            }
        }
        return $res;
    }
}