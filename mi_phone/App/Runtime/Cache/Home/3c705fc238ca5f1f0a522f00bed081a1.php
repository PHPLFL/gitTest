<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>会员中心-悟.空源码分享网 www.5k ym.com</title>
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
    <link rel="stylesheet" type="text/css" href="/Public/Home/slick/slick.css"/>
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
		<!--header star-->
		<header class="mui-bar mui-bar1 mui-bar-nav mui-bar-nav1" id="header">
			<a class="btn" href="javascript:history.go(-1)">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box top-sch-boxtwo top-sch-boxthree flex-col">
	                      返回
	        </div>
	    </header>
	    <!--header end-->
	    
	    <div class="warp clearfloat">
	    	<div class="h-top clearfloat box-s">
	    		<div class="tu clearfloat fl" style="width: 80px; height: 80px;">
	    			<img src="/Public/Home/userImg/<?php echo ($user["head_img"]); ?>" style="width:100%; height:100%; border-radius: 50%;"/>
	    		</div>
	    		<div class="content clearfloat fl" style="width: 30%;">
	    			<p class="hname"><?php echo ($user["rel_name"]); ?></p>
	    			<p class="htel"><?php echo ($user["phone"]); ?></p>
	    			<p class="hpthy">普通会员</p>
	    		</div>
	    		<a href="#" class="btn db clearfloat fr ra3">签到</a>
	    	</div>
	    	<div class="cash clearfloat">
	    		<div class="shang clearfloat">
	    			<ul>
	    				<li>
	    					<a href="#">
	    						<p><?php echo ($user["money"]); ?></p>
	    						<span>现金余额</span>
	    					</a>
	    				</li>
	    				<li>
	    					<a href="#">
	    						<p><?php echo ($user["score"]); ?></p>
	    						<span>可用积分</span>
	    					</a>
	    				</li>
	    				<li>
	    					<a href="#">
	    						<p>0</p>
	    						<span>待用积分</span>
	    					</a>
	    				</li>
	    			</ul>
	    		</div>
	    	</div>
	    	<div class="cashlist clearfloat">
	    		<ul>
					<li class="box-s">
						<a href="<?php echo U('myOrder');?>">
							<p class="fl">我的订单</p>
							<i class="iconfont icon-jiantou1 fr"></i>
						</a>
					</li>
					<li class="box-s">
						<a href="<?php echo U('userInfo');?>">
							<p class="fl">个人资料</p>
							<i class="iconfont icon-jiantou1 fr"></i>
						</a>
					</li>
					<li class="box-s">
						<a href="<?php echo U('addressList');?>">
							<p class="fl">收货地址管理</p>
							<i class="iconfont icon-jiantou1 fr"></i>
						</a>
					</li>
	    			<li class="box-s">
	    				<a href="account.html">
	    					<p class="fl">现金账户管理</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="recharge.html">
	    					<p class="fl">现金充值</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="zhuanzhang.html">
	    					<p class="fl">现金转账</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="cashlist clearfloat">
	    		<ul>
	    			<li class="box-s">
	    				<a href="jfguanli.html">
	    					<p class="fl">可用积分管理</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="jfguanli.html">
	    					<p class="fl">待用积分管理</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="jfguanli.html">
	    					<p class="fl">业务奖励积分</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="jfzhuanyong.html">
	    					<p class="fl">可用转待用</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="jfzhuanzhang.html">
	    					<p class="fl">可用积分转账</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="cashlist clearfloat">
	    		<ul>
	    			<li class="box-s">
	    				<a href="spduihuan.html">
	    					<p class="fl">商品兑换券</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="baodan.html">
	    					<p class="fl">报单商品券</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    		</ul>
	    	</div>
	    	<div class="cashlist clearfloat">
	    		<ul>
	    			<li class="box-s">
	    				<a href="sqlianmeng.html">
	    					<p class="fl">申请联盟商家</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="sqyunying.html">
	    					<p class="fl">申请运营中心</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="order.html">
	    					<p class="fl">消费订单管理</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="friend.html">
	    					<p class="fl">我的好友</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>
	    			<li class="box-s">
	    				<a href="xiugai.html">
	    					<p class="fl">修改密码</p>
	    					<i class="iconfont icon-jiantou1 fr"></i>
	    				</a>
	    			</li>

	    		</ul>
	    	</div>
	    	<a href="<?php echo U('Index/xuZhiAction');?>" class="center-btn db ra3">退出登录</a>
	    </div>
	    
		<!--footer star-->
	    <footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li>
					<a href="<?php echo U('Index/index');?>">
						<i class="iconfont icon-shouye"></i>
						<p>商城</p>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Center/code');?>">
						<i class="iconfont icon-erweima1"></i>
						<p>二维码</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="iconfont icon-kefu1"></i>
						<p>客服</p>
					</a>
				</li>
				<li class="active">
					<a href="center.html">
						<i class="iconfont icon-yonghuming"></i>
						<p>我的</p>
					</a>
				</li>
			</ul>
		</footer>
		<!--footer end-->
	</body>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/Home/js/mui.min.js"></script>
	<script src="/Public/Home/js/others.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
	<script src="/Public/Home/slick/slick.js" type="text/javascript" ></script>
	<!--插件-->
	<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
	<script src="/Public/Home/js/swiper.jquery.min.js"></script>
</html>