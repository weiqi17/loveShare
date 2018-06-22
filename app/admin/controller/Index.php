<?php
namespace app\admin\controller;

use app\common\controller\Common;
use think\Controller;
use think\Loader;
use think\Request;
use think\Url;
use think\Session;
use think\Config;
use app\common\shortmessage\shortMessage;

/**
* 登录
* @author aierui github  https://github.com/Aierui
* @version 1.0 
*/
class Index extends Admin
{
	/**
	 * 后台登录首页
	 */


	public function index()
	{
		$data['ip'] = Loader::model('LogRecord')->UniqueIpCount();
		/*单发短信接口参数*/
        /*$content = Array(
            "KeyId"           =>'your access key id',//LTAIIFChBoFoWvQc
            "KeySecret"       =>'your access key secret',//KbdeP1TliiTbDJ8z75c9yHqDNeWTKh
            "phone"           =>'phone number',//18612410728
            "signname"        =>'短信签名',//shangjinghui
            "templatecode"    =>'短信模板ID',//SMS_137658496
            "templateParam"   =>Array(

            ),//可选，用于替换模板参数
            "OutId"           =>'12345', //可选，设置发送短信流水号
            "SmsUpExtendCode" =>'1234567'//可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        );*/

        /*群发短信接口参数*/
        /*$content = Array(
            "KeyId"           =>'your access key id',//LTAIIFChBoFoWvQc
            "KeySecret"       =>'your access key secret',//KbdeP1TliiTbDJ8z75c9yHqDNeWTKh
            "PhoneNumberJson" =>Array(
                "1500000000",
                "1500000001",
            ),//群发号码
            "SignNameJson"     =>Array(
                "云通信",
                "云通信2",
            ),//支持不同号码不同短信签名
            "templatecode"    =>'短信模板ID',//SMS_137658496
            "TemplateParamJson"   =>Array(
                array(
                    "name" => "Tom",
                    "code" => "123",
                ),
                array(
                    "name" => "Jack",
                    "code" => "456",
                ),
            )//可选，用于替换模板参数
        );*/

        /*测试*/
        $content = Array(
            "KeyId"           =>'LTAIIFChBoFoWvQc',//LTAIIFChBoFoWvQc
            "KeySecret"       =>'KbdeP1TliiTbDJ8z75c9yHqDNeWTKh',//KbdeP1TliiTbDJ8z75c9yHqDNeWTKh
            "phone"           =>'18612410728',//18612410728
            "signname"        =>'shangjinghui',//shangjinghui
            "templatecode"    =>'SMS_137658496',//SMS_137658496
            "templateParam"   =>Array(
                'name' =>'商景辉'
            ),//可选，用于替换模板参数
            "OutId"           =>'12345', //可选，设置发送短信流水号
            "SmsUpExtendCode" =>'1234567'//可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        );
		/*$ob = new shortMessage();
		$ob->sendSms($content);*/
		$this->assign('data', $data);
		return view();
	}
}