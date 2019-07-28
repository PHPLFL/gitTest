<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller
{
//    function __initialize(){
//        echo "总是会被运行";
//    }
    //首页
    public function index(){
//        $id = session('id');
//        echo $id;die;
        session('state',0);
        $data['state'] = session('state');
        //分类
        $cate = M('category');
        $data['cate'] = $cate->where('parent_id=0')->select();
        //首页广告1
        $a = M('advert');
        $data['adv'] = $a->where('ad_place=1')->select();
        //首页广告2
        $data['adv2'] = $a->where('advert.ad_place=3')->join('goods ON advert.gid = goods.id')->limit(2)->field('advert.ad_pic,advert.gid,goods.goods_name,goods.goods_detail')->select();
        //广告位3
        $data['adv3'] = $a->where('advert.ad_place=3')->order('advert.id desc')->join('goods ON advert.gid = goods.id')->limit(3)->field('advert.ad_pic,advert.gid,goods.goods_name,goods.goods_detail')->select();
        $id = session('id');
        if($id){
            $ul = M('user_like');
            $gid = $ul->where("user_id=$id")->getField('good_id',true);
            if($gid){
                $g = M('goods');
                $where['id'] = array('in',$gid);
                $data['good'] = $g->where($where)->order('id desc')->field('id,goods_name,pic,price')->limit(4)->select();
            }
        }
        $this->assign($data);
        return $this->display();
    }
    //商品搜索
    public function find(){
        $find = I('post.find');
        $data['state'] = session('state');
        $cid = I('post.cid');
        $arr = getSonById($cid,'id');
        $arr[] = $cid;
        $where['cate_id'] = array('in',$arr);
        $where['goods_name'] = array('like',"%$find%");
        $cate = M('goods');
        $data['good'] = $cate->where($where)->select();
        $data['find'] = $find;
        $this->assign($data);
        return $this->display('list');
    }
    //商品列表
    public function goodList(){
        $data['state'] = session('state');
        $cid = I('get.cid');
        $arr = getSonById($cid,'id');
        $arr[] = $cid;
        $where['cate_id'] = array('in',$arr);
        $cate = M('goods');
        $data['good'] = $cate->where($where)->select();
        $data['cid'] = $cid;
        //用户购物车数量
        $id = session('id');
        if($id){
            $car = M('goods_car');
            $data['num'] = $car->where("user_id=$id")->count();
        }else{
            $good = session('good');
            $data['num'] = 0;
            foreach($good as $v){
                $data['num'] += $v['num'];
            }
        }
        $this->assign($data);
        return $this->display('list');
    }
    //分类
    public function cation(){
        session('state',1);
        $data['state'] = session('state');
        $cate = M('category');
        $data['cate'] = $cate->where('parent_id=0')->select();
        $this->assign($data);
        return $this->display('cation');
    }
    //购物车
    public function shopcar(){
        session('state',2);
        $data['state'] = session('state');
        $id = session('id');
        $g = M('goods');
        if($id){
            //用户已登录
            $car = M('goods_car');
            $data['rows'] = $car->where("goods_car.user_id=$id")->join('goods ON goods.id = goods_car.goods_id')->field('goods.id,goods.goods_name,goods.pic,goods.price,goods_car.goods_num,goods_car.id as cid')->select();
        }else{
            //用户未登录
            $good = session('good');
//            var_dump($good);die;
            foreach($good as $k=>$v){
                $goods = $g->where("id=$k")->field('id,goods_name,pic,price')->find();
                $goods['goods_num'] = $v['num'];
                $data['rows'][] = $goods;
            }
        }
        $this->assign($data);
        return $this->display('shopcar');
    }
    //我的
    public function my(){
        $id = session('id');
        if($id){
            $this->redirect('Center/center');
        }else{
            $this->redirect('login');
        }
    }
    //登录
    public function login(){
        $data['error'] = I('get.error',null);
        $data['username'] = I('get.username',null);
        $data['password'] = I('get.password',null);
        session('state',3);
        $data['state'] = session('state');
        $name = cookie('name');
        $pass = cookie('pass');
        if(!empty($name)){
            $data['username'] = $name;
            $data['password'] = $pass;
        }
        $this->assign($data);
        return $this->display('login');
    }
    //登录确认页面
    public function loginTrue(){
        $this->display('xuzhi');
    }
    //登录处理页面
    public function loginAction(){
        $rem = I('post.rem');
        $info = M('user');
        $data['phone'] = I('post.tel');
        $data['password'] = I('post.password');
        $pass = md5(I('post.password'));
        $user = D('User');
        if (!$user->create()){
            //如果创建失败 表示验证没有通过 输出错误提示信息
             $data['error'] = $user->getError();
             $this->redirect('login',$data);
        }else{
            // 验证通过 可以进行其他数据操作
            $where = ['phone'=>$data['phone'],'password'=>$pass];
            $bool = $info->where($where)->find();
            if($bool){
                if($rem){
                    cookie('name',$data['phone'],60*60*24);
                    cookie('pass',$data['password'],60*60*24);
                }else{
                    cookie('name',null);
                    cookie('pass',null);
                }
                session('id',$bool['user_id']);
                $this->display('xuzhi');
            }else{
                $data['error'] = '手机号或密码不正确！';
                $this->redirect('login',$data);
            }
        }
    }
    //登录须知确认登录
    public function trueLogin(){
        $id = session('id');
        $good = session('good');
        //判断用户是否未登录添加购物车
        if($good){
            //判断用户以前是否将此商品添加过购物车
            $c = M('goods_car');
            $arr = array();
            foreach($good as $k=>$v){
                $arr[] = $k;
            }
            $where['goods_id'] = array('in',$arr);
            $where['user_id'] = $id;
            $res = $c->where($where)->select();
            if($res){
                //添加过的商品
                $brr = array();
                foreach($res as $v){
                    $gid = $v['goods_id'];
                    $brr[] = $gid;
                    $data['goods_num'] =$v['goods_num'] + $good[$gid]['num'];
                    $c->where("user_id=$id AND goods_id=$gid")->save($data);
                }
                //未添加过的商品
                $crr = array_diff($arr,$brr);
                foreach($crr as $v){
                    $data['user_id'] = $id;
                    $data['goods_id'] = $good[$v]['id'];
                    $data['goods_num'] = $good[$v]['num'];
                    $c->add($data);
                }
            }else{
                //全部未添加过，直接添加
                $data['user_id'] = $id;
                foreach($good as $v){
                    $data['goods_id'] = $v['id'];
                    $data['goods_num'] = $v['num'];
                    $c->add($data);
                }
            }
            session('good',null);
        }

        $this->redirect('Center/center');
    }
    //登录须知取消登录 | 退出登录
    public function xuZhiAction(){
        session('id',null);
        $this->display('index');
    }
    //注册
    public function reg(){
        $data['phone'] = I('get.phone');
        $data['password'] = I('get.password');
        $data['state'] = I('get.state');
        $this->assign($data);
        $this->display('register');
    }
    //注册处理程序
    public function regAct(){
        $phone = I('post.tel');
        $password = I('post.pass');
        $verify = I('post.ver');
        $ver = session('mes');
        if($ver!=$verify){
            $data['phone'] = $phone;
            $data['password'] = $password;
            $data['state'] = 1;
            $this->redirect('reg',$data);
        }
        $password = md5($password);
        $u = M('user');
        $user_name = 'ID_'.substr($password,0,10).mt_rand(1000,9999);
        $rel_name = $user_name;
        $add_time = time();
        $arr = compact('user_name','password','rel_name','add_time','phone');
        $id = $u->add($arr);
        $code = createQRcode($id,"123456.png");
        $u->where("user_id=$id")->save(['qrcode'=>$code]);
        session('id',$id);
        $this->redirect('Center/center');
    }
    //查看用户手机号是否已注册
    public function phoned(){
        $phone = I('get.tel');
        $u = M('user');
        $res = $u->where("phone=$phone")->find();
        if($res){
            $data['state'] = 1;
        }else{
            $data['state'] = 0;
        }
        $this->ajaxReturn($data);
    }
    //商品详情页
    public function detail(){
        $gid = I('get.gid');
        //猜用户喜欢
        $id = session('id');
        if($id){

            $ul = M('user_like');
            $data['user_id'] = $id;
            $data['good_id'] = $gid;
            $res = $ul->where($data)->find();
            if(!$res){
                $ul->add($data);
            }
            //用户购物车数量
            $car = M('goods_car');
            $data['num'] = $car->where("user_id=$id")->count();
        }else{
            $good = session('good');
            $data['num'] = 0;
            foreach($good as $v){
                $data['num'] += $v['num'];
            }
        }
        $data['state'] = session('state');
        $m = M('goods');
        //商品信息
        $data['good'] = $m->where("id=$gid")->find();
        //商品图片
        $mm = M('goodsimage');
        $data['pic'] = $mm->where("gid=$gid")->getField('gpic',true);
        $this->assign($data);
        $this->display('detail');
    }
    //添加购物车
    public function addCar(){
        $data['state'] = session('state');
        $id = session('id');
        $gid = I('get.gid');
        $num = I('get.num');
//        echo $gid,$num,$id;die;
        //判断用户是否登录
        if($id){
//            echo 111;die;
            //用户登录状态下
            $c=M('goods_car');
            //判断该用户是否添加过该商品
            $res = $c->where("goods_id=$gid AND user_id=$id")->find();
            if($res){
                //添加过
                $cid = $res['id'];
                $num = $res['goods_num']+$num;
                $c->where("id=$cid")->save(['goods_num'=>$num]);
            }else{
                //没添加过
                $arr = ['user_id'=>$id,'goods_id'=>$gid,'goods_num'=>$num];
                $c->add($arr);
            }
        }else{
            //用户没登录
            $good = session('good');
            //判断是否添加过
            if(isset($good[$gid])){
                //添加过
                $num = $good[$gid]['num']+$num;
                $good[$gid] = ['id'=>$gid,'num'=>$num];
                session('good',$good);
            }else{
                //没添加过
                $good[$gid] = ['id'=>$gid,'num'=>$num];
                session('good',$good);
            }
        }

    }
    //删除购物车商品
    public function delCar(){
        $gid = I('get.gid');
        $gid = trim($gid,',');
        $gid = explode(',',$gid);
        $id = session('id');
        $c = M('goods_car');
        if($id){
            //用户已登录
            $where['goods_id'] = array('in',$gid);
            $where['user_id'] = $id;
            $c->where($where)->delete();
        }else{
            //用户未登录
            $good = session('good');
            foreach($gid as $v){
                unset($good[$v]);
            }
            session('good',$good);
        }
    }
    //改变购物车商品数量
    public function changeCar(){
        $num = I('get.num');
        $gid = I('get.gid');
        $id = session('id');
        $c = M('goods_car');
        if($id){
            //用户登录
            $data['goods_num'] = $num;
            $where['goods_id'] = $gid;
            $where['user_id'] = $id;
            $c->where($where)->save($data);
        }else{
            //用户未登录
            $good = session('good');
            var_dump($good);
            $good[$gid]['num'] = $num;
            session('good',$good);
        }
    }
    //确认订单 | 立即购买
    public function trueOrder(){
        $id = session('id');
        $data['state'] = session('state');
        if(!$id){
            $this->redirect('login');
        }
        //购物车信息
        $cid = I('get.sex');
        if(!is_array($cid)){
            $a[] = $cid;
        }else{
            $a = $cid;
        }
        if(empty($a[0])){
            $a = session('order');
        }else{
            session('order',$a);
        }
        $c = M('goods_car');
        $data['num'] = 0;
        $data['price'] = 0;
        foreach($a as $v){
            $arr = $c->where("goods_car.id=$v")->join('goods ON goods_car.goods_id = goods.id')->field('goods_car.goods_num,goods.goods_name,goods.price,goods.pic,goods.id,goods_car.id as cid')->find();
            $data['num'] = $data['num'] + $arr['goods_num'];
            $data['price'] = $data['price'] + $arr['price']*$arr['goods_num'];
            $data['good'][] = $arr;
        }
        $a = M('address');
        $aid = I('get.aid');
        if($aid){
            $data['address'] = $a->where("id=$aid")->find();
        }else{
            $data['address'] = $a->where("user_id=$id AND def_address=1")->find();
        }
        $this->assign($data);
        $this->display('confirm');
    }
    //立即购买
    public function nowBuy(){
        $user_id = session('id');
        $goods_id = I('get.gid');
        $goods_num = I('get.num');
        $arr = compact('user_id','goods_id','goods_num');
        $c = M('goods_car');
        $c->add($arr);
        $cid = $c->getLastInsID();
        $this->redirect('trueOrder',array('sex'=>$cid));
    }
    //生成订单
    public function makeOrder(){
        //清除存在session中的订单信息
        session('order',null);
        //接受订单信息，存入数据库
        $id = session('id');
        $user_id = $id;
        $state = 0;
        $address = I('post.address');
        $total = I('post.price');
        $ordersn = $id.time().mt_rand(10000,99999).$total;
        $ordertime = time();
        $remark = I('post.remark');
        $cid = I('post.cid');
        $arr = compact('ordersn','user_id','state','address','total','ordertime','remark');
        //插入订单表
        $o = M('orders');
        $order_id = $o->add($arr);
//        echo $order_id;die;
        $c = M('goods_car');
        //插入订单详情表
        $od = M('order_details');
        foreach($cid as $v){
            $car = $c->where("id=$v")->find();
            $good_id = $car['goods_id'];
            $good_num = $car['goods_num'];
            $brr = compact('order_id','good_id','good_num');
            $od->add($brr);
            //删除购物车表中商品
            $c->where("id=$v")->delete();
        }
        $data = ['ordersn'=>$ordersn,'price'=>$total,'oid'=>$order_id];
        $this->assign($data);
        $this->display('makeOrder');
    }
    //订单支付页面
    public function orderPay(){
        $oid = I('get.oid');
        $o = M('orders');
        $arr = $o->where("orderid=$oid")->find();
        $data = ['ordersn'=>$arr['ordersn'],'price'=>$arr['total'],'oid'=>$oid];
        $this->assign($data);
        $this->display('makeOrder');
    }
    //支付密码页面
    public function payPassword(){
        $this->display('payPassword');
    }

}