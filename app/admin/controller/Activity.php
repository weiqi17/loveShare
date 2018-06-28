<?php
/**
 * Created by PhpStorm.
 * User: 商景辉
 * Date: 2018/6/23
 * Time: 15:19
 */

namespace app\admin\controller;
use think\Loader;
class Activity extends Admin
{

    function index()
    {
        return view();
    }
    public function getList()
    {
        $data = Loader::model('Vipactivity')->getAll();
        return $data;
    }
   function delete()
   {
       $con['id'] = input('post.id');
       $res = Loader::model('Vipactivity')->deleteOne($con);
   }
   function edit()
   {
       $pic = request()->file('pic');
       if (empty($pic)) {
           $this->error('请选择上传文件');
       }
       if (!($pic->validate(['ext'=>'jpg,png,gif'])))
       {
           $this->error($pic->getError());
       }
       //移动到框架应用根目录/public/uploads/ 目录下
       $infopic = $pic->move('static/images/');
       if (!$infopic) {
           //上传失败获取错误信息
           $this->error($pic->getError());
       }
       $detailpic = request()->file('detailpic');
       if (empty($detailpic)) {
           $this->error('请选择上传文件');
       }
       if (!($detailpic->validate(['ext'=>'jpg,png,gif'])))
       {
           $this->error($detailpic->getError());
       }
       //移动到框架应用根目录/public/uploads/ 目录下
       $infodetail = $detailpic->move('static/images/');
       if (!$infodetail) {
           //上传失败获取错误信息
           $this->error($pic->getError());
       }
       else
       {
           $con['id'] = input('post.id');
           $con['title'] = input('post.title');
           $con['subtitle1'] = input('post.subtitle1');
           $con['subtitle2'] = input('post.subtitle2');
           $con['price1'] = input('post.price');
           $con['price2'] = input('post.price1');
           $con['price3'] = input('post.price2');
           $con['content1'] = input('post.content');
           $con['content2'] = input('post.content1');
           $con['content3'] = input('post.content2');
           $con['picture'] = $infopic->getRealPath();
           $con['detailpic'] = $infodetail->getRealPath();
           $con['time'] = date("Y-m-d H:i:s");
           $res = Loader::model('Vipactivity')->updateRecord($con);
           $this->redirect('index');
       }
   }
   function upload()
   {
       $pic = request()->file('pic');
       if (empty($pic)) {
           $this->error('请选择上传文件');
       }
       if (!($pic->validate(['ext'=>'jpg,png,gif'])))
       {
           $this->error($pic->getError());
       }
       //移动到框架应用根目录/public/uploads/ 目录下
       $infopic = $pic->move('static/images/');
       if (!$infopic) {
           //上传失败获取错误信息
           $this->error($pic->getError());
       }
       $detailpic = request()->file('detailpic');
       if (empty($detailpic)) {
           $this->error('请选择上传文件');
       }
       if (!($detailpic->validate(['ext'=>'jpg,png,gif'])))
       {
           $this->error($detailpic->getError());
       }
       //移动到框架应用根目录/public/uploads/ 目录下
       $infodetail = $detailpic->move('static/images/');
       if (!$infodetail) {
           //上传失败获取错误信息
           $this->error($pic->getError());
       }
       else
       {
           $con['title'] = input('post.title');
           $con['subtitle1'] = input('post.subtitle1');
           $con['subtitle2'] = input('post.subtitle2');
           $con['price1'] = input('post.price');
           $con['price2'] = input('post.price1');
           $con['price3'] = input('post.price2');
           $con['content1'] = input('post.content');
           $con['content2'] = input('post.content1');
           $con['content3'] = input('post.content2');
           $con['picture'] = $infopic->getRealPath();
           $con['detailpic'] = $infodetail->getRealPath();
           $con['time'] = date("Y-m-d H:i:s");
           $res = Loader::model('Vipactivity')->addOneRecord($con);
           $this->redirect('index');
       }
   }
}