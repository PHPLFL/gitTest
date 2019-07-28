<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>现金转账-悟.空源码分享网 www.5k ym.com</title>
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
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/mui.picker.min.css" />
	<link href="/Public/Home/css/mui.picker.css" rel="stylesheet" />
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
	    <div class="warp warpthree clearfloat">
	    	<div class="h-top h-topone clearfloat box-s">
	    		<p>74.<samp>00</samp></p>
	    		<span>账户余额(元)</span>
	    	</div>
	    	<div class="recharge clearfloat">
	    		<div class="czhi clearfloat box-s">
	    			<p>充值金额</p>
	    			<input type="text" id="" value="" placeholder="请输入金额" />
	    			<span>元</span>
	    		</div>
	    		<div class="czhi clearfloat box-s" id='showUserPicker'>
	    			<p>支付方式</p>
	    			<i class="iconfont icon-xiala fr"></i>
	    		</div>
	    		<!--<a href="#" class="center-btn center-btntwo db ra3">点击上传文件</a>-->
	    		<div class="guize clearfloat box-s ra3">
	    			<h3>充值规则</h3>
	    			<div class="content clearfloat">
    				       安徽智迈科技股份有限公司成立于2009年。总部位于合肥市高新区，
    				       投资或控股近10余家企业。智迈是一家专注于互联网创新产品研发
    				       及技术服务解决方案的高新技术企业。
	    			</div>
	    		</div>
	    		<div class="bottom clearfloat">
	    			<a href="#" class="db fl btn ra3">确定</a>
	    			<a href="#" class="db fr btn ra3">取消</a>
	    		</div>
	    	</div>	    	
	    </div>
	</body>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/Home/js/mui.min.js"></script>
	<script src="/Public/Home/js/mui.picker.min.js"></script>
	<script src="/Public/Home/js/others.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
	<script src="/Public/Home/slick/slick.js" type="text/javascript" ></script>
	<!--插件-->
	<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
	<script src="/Public/Home/js/swiper.jquery.min.js"></script>
</html>