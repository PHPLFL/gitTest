<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>管理收货地址-悟.空源码分享网 www.5k ym.com</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Home/js/rem.js"></script> 
    <script src="/Public/Home/js/jquery.min.js" type="text/javascript"></script>
	<script src="/Public/layer_phone/layer_mobile/layer.js"></script>
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
			<p>我的二维码</p>
	    </header>
	    <div id="main" class="mui-clearfix contaniner">
			<div class="recharge clearfloat">

				<div class="guize clearfloat box-s ra3">
					<div class="content clearfloat">
						<img src="/Public/Home/qrcodeImg/<?php echo ($code); ?>" alt="" style="width: 85%; height: 85%; padding: auto auto">
					</div>
				</div>
				<div class="bottom clearfloat">
					<a href="#" class="db fl btn ra3" style="width: 100%;">分享</a>
				</div>
			</div>
		</div>
	    

	</body>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/Home/js/fastclick.js"></script>
	<script src="/Public/Home/js/mui.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
</html>