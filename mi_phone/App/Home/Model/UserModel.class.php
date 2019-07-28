<?php
namespace Home\Model;
use Think\Model;
use Think\Verify;
class UserModel extends Model
{
    public $_validate = array(
        array('phone','require','手机号不能为空！'),
        array('phone','phone','手机号格式不正确！',1,'length'),
        array('password','6,20','密码格式不正确！',1,'length'),
        array('verify','verifyCheck','验证码不正确！',1,'callback '),
    );
    //校验验证码
    public function verifyCheck($code,$id=''){
        $verify = new Verify();
        $bool = $verify->check($code,$id);
        return $bool;
    }
    //手机号格式验证
    public function phone($code){
        $str = '/^1[3456789]\d{9}$/';
        $bool = preg_match($str,$code);
        return $bool;
    }
}