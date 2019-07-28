<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class HelpController extends Controller
{
    //验证码
    public function verify(){
        $config =    array(
            'fontSize'    =>    12,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'imageW'      =>    240,
            'imageH'      =>    40,
        );
        $verify = new Verify($config);
        $verify->entry();
    }
    //发送短信
    public function sendMes(){
        $tel = I('get.tel');
        $num = mt_rand(1000,9999);
        session('mes',$num);
        setMess($tel,$num);
    }

}

