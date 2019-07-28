<?php
header('content-type:text/html;charset=utf-8');

//文件引入函数
    function links($type,$dir,$arr)
    {
        foreach ($arr as $v) {
            echo '<link href="/' . $dir . '/' . $v . '.' . $type . '" rel="stylesheet" type="text/css" />' . "\n";
        }
    }
    /**
     * @param $id
     * @return array
     */
    function getSonById($id,$filed){
        $cate = M('category');
        static $arr = [];
        //通过传递进来的id 获取子id  5 , 6 ,7
        $rows = $cate->where("parent_id=$id")->getField($filed,true); ;
        if($rows){
            //继续查询 $v 已经是子类的id啦
            foreach ($rows as $v){
                $arr[] = $v;//5 16,17,18 6,19,20,7,21,22
                getSonById($v,$filed);
            }
        }
        return $arr;
    }

    /**
     * 功能：生成二维码
     * @param string $qr_data   手机扫描后要跳转的网址
     * @param string $qr_level  默认纠错比例 分为L、M、Q、H四个等级，H代表最高纠错能力
     * @param string $qr_size   二维码图大小，1－10可选，数字越大图片尺寸越大
     * @param string $save_path 图片存储路径
     * @param string $save_prefix 图片名称前缀
     */

    function createQRcode($id,$pic,$save_path='Public/Home/qrcodeImg/',$qr_level='L',$qr_size=4,$save_prefix='qrcode'){

        $PNG_TEMP_DIR = & $save_path;
        //导入二维码核心程序
        vendor('PHPQRcode.phpqrcode');  //PHPQRcode是文件夹名字，phpqrcode就代表phpqrcode.php文件名
        //检测并创建生成文件夹
        if (!file_exists($PNG_TEMP_DIR)){
            mkdir($PNG_TEMP_DIR);
        }
        $filename = $PNG_TEMP_DIR.'test.png';
        $errorCorrectionLevel = 'L';
        if (isset($qr_level) && in_array($qr_level, array('L','M','Q','H'))){
            $errorCorrectionLevel = & $qr_level;
        }
        $matrixPointSize = 4;
        if (isset($qr_size)){
            $matrixPointSize = & min(max((int)$qr_size, 1), 10);
        }
        $qr_data = "http://www.phone.cn/Home/Index/reg?re_id=$id";
        if (isset($qr_data)) {
            if (trim($qr_data) == ''){
                die('data cannot be empty!');
            }
            //生成文件名 文件路径+图片名字前缀+md5(名称)+.png
            $filename = $PNG_TEMP_DIR.$save_prefix.md5($qr_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
            //开始生成
            QRcode::png($qr_data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        } else {
            //默认生成
            QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        }
        //对已生成的二维码处理
        $logo = 'Public/Home/userImg/'.$pic; //准备好的logo图片
        $QR = $filename; //已经生成的原始二维码图
        if ($logo !== FALSE) {
        $QR = imagecreatefromstring(file_get_contents($QR));
        $logo = imagecreatefromstring(file_get_contents($logo));
        $QR_width = imagesx($QR);//二维码图片宽度
        $QR_height = imagesy($QR);//二维码图片高度
        $logo_width = imagesx($logo);//logo图片宽度
        $logo_height = imagesy($logo);//logo图片高度
        $logo_qr_width = $QR_width / 5;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;
        $from_width = ($QR_width - $logo_qr_width) / 2;
        //重新组合图片并调整大小
        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
            $logo_qr_height, $logo_width, $logo_height);
    }
        $dir = 'Public/Home/qrcodeImg/';
        unlink($filename); //删除旧目录下的文件
        $filename = time().mt_rand(1000,9999).'.png';
        imagepng($QR,$dir.$filename);
        return  $filename;
}


function setMess($tel,$num)
{
    $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
    $smsConf = array(
        'key' => '72893b62120a06b80eb58daf0def0e52', //您申请的APPKEY 72893b62120a06b80eb58daf0def0e52
        'mobile' => "$tel", //接受短信的用户手机号码
        'tpl_id' => "150057", //您申请的短信模板ID，根据实际情况修改
        'tpl_value' => "#code#=$num&#company#=聚合数据" //您设置的模板变量，根据实际情况修改
    );
    $content = juhecurl($sendUrl, $smsConf, 1); //请求发送短信
    if ($content) {
        $result = json_decode($content, true);
        $error_code = $result['error_code'];
        if ($error_code == 0) {
            //状态为0，说明短信发送成功
            echo "短信发送成功,短信ID：" . $result['result']['sid'];
        } else {
            //状态非0，说明失败
            $msg = $result['reason'];
            echo "短信发送失败(" . $error_code . ")：" . $msg;
        }
    } else {
        //返回内容异常，以下可根据业务逻辑自行修改
        echo "请求发送短信失败";
    }


}
/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */


function juhecurl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    return $response;
}