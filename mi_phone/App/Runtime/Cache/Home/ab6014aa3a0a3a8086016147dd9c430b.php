<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>会员须知-悟.空源码分享网 www.5k ym.com</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Home/js/rem.js"></script> 
    <script src="/Public/Home/js/jquery.min.js" type="text/javascript"></script>
	<?php echo links('css','Public/Home/css',['base','page','all','mui.min','loaders.min','loading']);?>
	<!--<link rel="stylesheet" type="text/css" href="css/base.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/page.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/all.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/mui.min.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/loading.css"/>-->
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
		<div class="login logintwo clearfloat box-s">
			<h3>会员须知</h3>
			<div class="xzcontent clearfloat box-s ra3">
				该等变更事项自公告中载明的生肖日期开始生效，消费者有权在公告期内选择是否同意该等变更事项。
				如消费者不接受该等变更事项，消费者应在公告中载明的生肖日期前种植使用积分，
				并按照规定办理销户手续。否则视为消费者同意该等变更事项，变更后的内容对消费者具有
				法律约束力。
			</div>			
			<div class="login-btn">
				<a href="<?php echo U('Index/trueLogin');?>">
					本人已知晓上述各项条款，并登录平台
				</a>
				<a href="<?php echo U('xuZhiAction');?>" class="btn">
					<span class="opa5"></span>
					<samp>本人不同意，退出登录</samp>
				</a>
			</div>
		</div>
	</body>
</html>