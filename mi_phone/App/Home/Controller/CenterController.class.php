<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller
{
    //个人中心页面
    public function center(){
        $id = session('id');
        $u = M('user');
        $data['user'] = $u->where("user_id=$id")->find();
        $this->assign($data);
        $this->display('center');
    }
    //生成二维码
    public function qrcode(){
//        $pic = I('post.pic');
        $id = 15;
        $pic = '8155627076997484.jpg';
        if($filename = createQRcode($id,$pic)){
            return $filename;
        }
    }
    //二维码页面
    public function code(){
        $id = session('id');
        $u = M('user');
        $data['code'] = $u->where("user_id=$id")->getField('qrcode');
        $this->assign($data);
        $this->display('code');
    }
    //个人信息
    public function userInfo(){
        $id = session('id');
        $u = M('user');
        $data['user'] = $u->where("user_id=$id")->find();
        $this->assign($data);
        $this->display('userInfo');
    }
    //个人信心处理程序
    public function infoAct(){
        $id = session('id');
        $sex = I('post.sex');
        $rel_name = I('post.rel_name');
        $arr = compact('sex','rel_name');
        $u = M('user');
        $u->where("user_id=$id")->save($arr);
        $this->redirect('center');
    }
    //收货地址管理
    public function addressList(){
        $id = session('id');
        $a = M('address');
        $bool = $a->where("def_address=1 AND user_id=$id")->find();
        if(!$bool){
            $aid = $a->where("user_id=$id")->order('id desc')->getField('id');
            if($aid){
                $a->where("id=$aid")->save(['def_address'=>1]);
            }
        }
        $data['address'] = $a->where("user_id=$id")->order('id desc')->select();
        $this->assign($data);
//        var_dump($data['address']);die;
        $this->display('address');
    }
    //选择收货地址
    public function chooseAddress(){
        $id = session('id');
        $a = M('address');
        $bool = $a->where("def_address=1 AND user_id=$id")->find();
        if(!$bool){
            $aid = $a->where("user_id=$id")->order('id desc')->getField('id');
            $a->where("id=$aid")->save(['def_address'=>1]);
        }
        $data['address'] = $a->where("user_id=$id")->order('id desc')->select();
        $this->assign($data);
//        var_dump($data['address']);die;
        $this->display('chooseAddress');
    }
    //添加收货地址
    public function addAddress(){
        $a = session('order');
        if($a){
            $this->assign(['state'=>1]);
        }else{
            $this->assign(['state'=>0]);
        }
        $this->display('addAddress');
    }
    //添加收货地址处理程序
    public function addAddressAct(){
        $user_id = session('id');
        $name = I('post.recipient');
        $phone = I('post.phone');
        $city = I('post.city');
        $home = I('post.street');
        $def_address = I('post.state');
        $a = M('address');
        if($def_address==1){
            $arr['def_address'] = 0;
            $a->where("user_id=$user_id")->save($arr);
        }
        $data = compact('user_id','name','phone','city','home','def_address');
        $bool = $a->add($data);
        if($bool){
            $brr['state'] = 1;
        }else{
            $brr['state'] = 0;
        }
        $this->ajaxReturn($brr);
    }
    //修改默认地址
    public function editDefAdd(){
        $id = session('id');
        $aid = I('get.id');
        $a = M('address');
        $a->where("user_id=$id")->save(['def_address'=>0]);
        $a->where("id=$aid")->save(['def_address'=>1]);
    }
    //修改地址
    public function editAddress(){
        $aid = I('get.aid');
        $a = M('address');
        $data['info'] = $a->where("id=$aid")->find();
        $this->assign($data);
        $this->display('editAddress');
    }
    //修改地址处理程序
    public function editAddressAct(){
        $user_id = session('id');
        $aid = I('post.aid');
        $name = I('post.recipient');
        $phone = I('post.phone');
        $city = I('post.city');
        $home = I('post.street');
        $def_address = I('post.state');
        $a = M('address');
        if($def_address==1){
            $arr['def_address'] = 0;
            $a->where("user_id=$user_id")->save($arr);
        }
        $data = compact('user_id','name','phone','city','home','def_address');
        $bool = $a->where("id=$aid")->save($data);
        if($bool){
            $brr['state'] = 1;
        }else{
            $brr['state'] = 0;
        }
        $this->ajaxReturn($brr);
    }
    //删除地址
    public function delAddress(){
        $aid = I('get.aid');
        $a = M('address');
        $a->where("id=$aid")->delete();
    }
    //我的订单
    public function myOrder(){
        $id = session('id');
        $o = M('orders');
        $od = M('order_details');
        $data['order'] = $o->where("user_id=$id")->order('orderid desc')->select();
        foreach($data['order'] as $v){
            $oid = $v['orderid'];
            $data['good'][] = $od->where("order_details.order_id=$oid")->join('goods ON goods.id = order_details.good_id')->field('goods.goods_name,goods.goods_detail,goods.price,goods.pic,order_details.good_num')->select();
        }
        $this->assign($data);
        $this->display('myOrder');
    }
    //代付款
    public function needPay(){
        $id = session('id');
        $o = M('orders');
        $od = M('order_details');
        $data['order'] = $o->where("user_id=$id AND state=0")->order('orderid desc')->select();
        foreach($data['order'] as $v){
            $oid = $v['orderid'];
            $data['good'][] = $od->where("order_details.order_id=$oid")->join('goods ON goods.id = order_details.good_id')->field('goods.goods_name,goods.goods_detail,goods.price,goods.pic,order_details.good_num')->select();
        }
        $this->assign($data);
        $this->display('needPay');
    }
    //代发货
    public function needSend(){
        $id = session('id');
        $o = M('orders');
        $od = M('order_details');
        $data['order'] = $o->where("user_id=$id AND state=1")->order('orderid desc')->select();
        foreach($data['order'] as $v){
            $oid = $v['orderid'];
            $data['good'][] = $od->where("order_details.order_id=$oid")->join('goods ON goods.id = order_details.good_id')->field('goods.goods_name,goods.goods_detail,goods.price,goods.pic,order_details.good_num')->select();
        }
        $this->assign($data);
        $this->display('needSend');

    }
    //待收货
    public function needGet(){
        $id = session('id');
        $o = M('orders');
        $od = M('order_details');
        $data['order'] = $o->where("user_id=$id AND state=2")->order('orderid desc')->select();
        foreach($data['order'] as $v){
            $oid = $v['orderid'];
            $data['good'][] = $od->where("order_details.order_id=$oid")->join('goods ON goods.id = order_details.good_id')->field('goods.goods_name,goods.goods_detail,goods.price,goods.pic,order_details.good_num')->select();
        }
        $this->assign($data);
        $this->display('needGet');

    }
    //确认收货
    public function trueGood(){
        $oid = I('get.oid');
        $o = M('orders');
        $o->where("orderid = $oid")->save(['state'=>3]);
    }
    //待评价
    public function needSpeak(){
        $id = session('id');
        $o = M('orders');
        $od = M('order_details');
        $data['order'] = $o->where("user_id=$id AND state=3")->order('orderid desc')->select();
        foreach($data['order'] as $v){
            $oid = $v['orderid'];
            $data['good'][] = $od->where("order_details.order_id=$oid")->join('goods ON goods.id = order_details.good_id')->field('goods.goods_name,goods.goods_detail,goods.price,goods.pic,order_details.good_num')->select();
        }
        $this->assign($data);
        $this->display('needSpeak');
    }
    //去评价
    public function assess(){
        $oid = I('get.oid');
        $od = M('order_details');
        $data['good'] = $od->where("order_id=$oid")->join('goods ON order_details.good_id = goods.id')->field('goods_name,pic,goods.id,order_details.order_id')->select();
        $this->assign($data);
        $this->display('assess');
    }
    //评价处理程序
    public function assessAct(){
        $id = session('id');
        $oid = I('post.oid');
        $gid = I('post.gid');
        $score = I('post.score');
        $speak = I('post.speak');
        $num = count($gid);
        $c = M('comment');
        for($i=0;$i<$num;$i++){
           $data = ['user_id'=>$id,'good_id'=>$gid[$i],'content'=>$speak[$i],'score'=>$score[$i],'addtime'=>time()];
           $c->add($data);
        }
        $o = M('orders');
        $o->where("orderid = $oid")->save(['state'=>4]);
        $this->redirect('myOrder');
    }
    //支付处理
    public function payAction(){
        $oid = I('get.oid');
//        echo $oid;die;
        $o = M('orders');
        $o->where("orderid=$oid")->save(['state'=>1]);
        $this->redirect('orderDetail',['oid'=>$oid]);
    }
    //订单详情
    public function orderDetail(){
        $oid = I('get.oid');
        $o = M('orders');
        $od = M('order_details');
        $a = M('address');
        $data['order'] = $o->where("orderid=$oid")->find();
        $data['good'] = $od->where("order_id=$oid")->join('goods ON goods.id = order_details.good_id')->field('goods.id,goods_name,good_num,price,goods_detail,pic')->select();
        $data['num'] = 0;
        foreach($data['good'] as $v){
            $data['num'] += $v['good_num'];
        }
        //收货人地址
        $aid = $data['order']['address'];
        $data['address'] = $a->where("id=$aid")->find();
        $this->assign($data);
        $this->display('orderDetail');
    }
    //账户管理
    public function account(){
        $this->display('account');
    }
    //现金充值
    public function recharge(){
        $this->display('recharge');
    }
    //现金转账
    public function zhuangZhang(){
        $this->display('zhangzhang');
    }

}
