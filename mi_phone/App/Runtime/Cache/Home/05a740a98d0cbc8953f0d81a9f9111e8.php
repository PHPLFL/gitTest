<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>收货评价-悟.空源码分享网 www.5k ym.com</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Home/Js/rem.js"></script> 
    <script src="/Public/Home/Js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/loading.css"/>
	<script src="/Public/layui/layui.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/Public/layui/css/layui.css" />
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
			<p>收货评价</p>
	    </header>
		<form action="<?php echo U('Center/assessAct');?>" method="post">
	    <div id="main" class="mui-clearfix">
	    	<div class="assess clearfloat">
				<?php if(is_array($good)): foreach($good as $k=>$v): ?><input type="hidden" value="<?php echo ($v["order_id"]); ?>" name="oid">
					<div class="top clearfloat box-s" style="padding-left: 5%; padding-top: 5%;">
						<div class="tu fl clearfloat">
							<img src="/Public/Home/pic/<?php echo ($v["pic"]); ?>"/>
						</div>
						<div class="pinfen fl clearfloat">
							<p class="tit"><?php echo ($v["goods_name"]); ?></p>
							<div class="assess-right" style="width: 100%;">
								<input type="hidden" name="gid[]" value="<?php echo ($v["id"]); ?>">
								<div id="test<?php echo ($k); ?>"></div>
								<input type="hidden" value="3.5" name="score[]" class="s<?php echo ($k); ?>">
							</div>
						</div>
					</div>
					<script>
						$("#test<?php echo ($k); ?>").click(function(){
							num = parseFloat($("#test<?php echo ($k); ?>").children('span').text());
							$(".s<?php echo ($k); ?>").val(num);
						})
						layui.use(['rate'], function(){
							var rate = layui.rate;
							rate.render({
								elem: "#test<?php echo ($k); ?>"
								,value: 3.5
								,half: true
								,text: true
								,theme: '#FE0000'
							});
						});
					</script>
					<div>
						<textarea rows="4" name="speak[]" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦" ></textarea>
					</div><?php endforeach; endif; ?>
	    		<div class="bottom clearfloat box-s fl">
	    			<p class="ztpinfen">整体评分</p>
	    			<ul class="star">
						<li>
							物流速度评价
						</li>
						<li>
							<div id="test10" style="height: 100%;"></div>
						</li>
					</ul>
					<ul>
						<li>
							服务质量评价
						</li>
						<li style="height: 100%;">
							<div id="test11"></div>
						</li>
					</ul>
					<ul>
						<li>
							配送员满意度
						</li>
						<li style="height: 100%;">
							<div id="test12"></div>
						</li>
					</ul>
	    		</div>
	    	</div>
	    </div>
		<label>
			<input type="submit" style="display: none;">
     		<a class="address-add fl ra3">提交</a>
		</label>
		</form>
		<script>
			layui.use(['rate'], function(){
				var rate = layui.rate;
				rate.render({
					elem: '#test10'
					,value: 3.5
					,half: true
					,text: true
					,theme: '#FE0000'
				});
				rate.render({
					elem: '#test11'
					,value: 3.5
					,half: true
					,text: true
					,theme: '#FE0000'
				});
				rate.render({
					elem: '#test12'
					,value: 3.5
					,half: true
					,text: true
					,theme: '#FE0000'
				})
			});
		</script>

	</body>
	<script type="text/javascript" src="/Public/Home/Js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/Home/Js/fastclick.js"></script>
	<script src="/Public/Home/Js/mui.min.js"></script>
	<script type="text/javascript" src="/Public/Home/Js/hmt.js" ></script>
	<script type="text/javascript">

	</script>
</html>