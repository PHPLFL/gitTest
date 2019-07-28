<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>全部订单-悟.空源码分享网 www.5k ym.com</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Home/js/rem.js"></script> 
    <script src="/Public/Home/js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/loading.css"/>
<script type="text/javascript">
	$(window).load(function(){
		$(".loading").addClass("loader-chanage")
		$(".loading").fadeOut(300)
	})
</script>
</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
	<body>
		<header class="mui-bar mui-bar-nav report-header box-s" id="header">
			<a href="javascript:history.go(-1)"><i class="iconfont icon-fanhui fl"></i></a>
			<p>我的订单</p>
	    </header>
	    <div id="main" class="mui-clearfix">
	    	<div class="order-top clearfloat">
	    		<ul>
	    			<li class="clearfloat cur"><a href="<?php echo U('myOrder');?>">全部</a></li>
	    			<li class="clearfloat"><a href="<?php echo U('needPay');?>">待付款</a></li>
	    			<li class="clearfloat"><a href="<?php echo U('needSend');?>">待发货</a></li>
	    			<li class="clearfloat"><a href="<?php echo U('needGet');?>">待收货</a></li>
	    			<li class="clearfloat"><a href="<?php echo U('needSpeak');?>">待评价</a></li>
	    		</ul>
	    	</div>
			<?php if(is_array($order)): foreach($order as $k=>$v): ?><div class="order-list clearfloat">
				<a href="<?php echo U('orderDetail');?>?oid=<?php echo ($v["orderid"]); ?>">
	    		<p class="ordernum box-s">
	    			订单  <?php echo ($v["ordersn"]); ?>
					<?php if($v['state'] == 0): ?><span>待付款</span>
					<?php elseif($v['state'] == 1): ?>
						<span>待发货</span>
					<?php elseif($v['state'] == 2): ?>
						<span>待收货</span>
					<?php else: ?>
						<span>待评价</span><?php endif; ?>

	    		</p>
				<?php if(is_array($good[$k])): foreach($good[$k] as $key=>$g): ?><div class="list clearfloat fl box-s">
		    			<div class="tu fl clearfloat">
		    				<img src="/Public/Home/pic/<?php echo ($g["pic"]); ?>"/>
		    			</div>
		    			<div class="middle clearfloat fl">
		    				<p class="tit"><?php echo ($g["goods_name"]); ?></p>
		    				<p class="fu-tit"><?php echo ($g["goods_detail"]); ?></p>
		    				<p class="price clearfloat">
		    					<span class="xprice fl">¥<?php echo ($g["price"]); ?></span>
		    					<!--<span class="yprice fl">¥308</span>-->
		    					<span class="shu">×<?php echo ($g["good_num"]); ?></span>
		    				</p>
		    			</div>
	    		</div><?php endforeach; endif; ?>
				</a>
				<?php if($v['state'] == 0): ?><a href="<?php echo U('Index/orderPay');?>?oid=<?php echo ($v["orderid"]); ?>" class="gopay-btn fr">立即支付</a>
				<?php elseif($v['state'] == 1): ?>
					<a href="#" class="gopay-btn fr">提醒发货</a>
				<?php elseif($v['state'] == 2): ?>
					<a href="<?php echo U('Center/trueGood');?>?oid=<?php echo ($v["orderid"]); ?>" class="gopay-btn fr">确认收货</a>
				<?php else: ?>
					<a href="<?php echo U('Center/assess');?>?oid=<?php echo ($v["orderid"]); ?>" class="gopay-btn fr">去评价</a><?php endif; ?>
	    	</div><?php endforeach; endif; ?>
	    	<style type="text/css">
	    		.more-btn{width: 25%; padding: 3% 0; text-align: center; background-color: #00CC7D; color: #fff; font-size: .5rem; margin: 5% auto;}
	    	</style>
	    	<a href="#" class="more-btn db ra5">更多</a>
	    </div>
	</body>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/Home/js/fastclick.js"></script>
	<script src="/Public/Home/js/mui.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
</html>