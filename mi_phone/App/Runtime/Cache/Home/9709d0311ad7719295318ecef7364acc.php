<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>修改姓名-悟.空源码分享网 www.5k ym.com</title>
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
	<link rel="stylesheet" type="text/css" href="/Public/Home/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/mui.picker.min.css" />
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/layui/layui.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/Public/layui/css/layui.css" />
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
<form action="<?php echo U('Center/infoAct');?>" method="post">
<div class="warp warpthree clearfloat">
	<div class="h-top h-toptwo clearfloat box-s">
		<p class="tu" style="width: 100px; height: 100px;"><img src="/Public/Home/userImg/<?php echo ($user["head_img"]); ?>" style="width:100%; height:100%; border-radius: 50%;"/></p>
	</div>
	<div class="apply recharge clearfloat">
		<div class="appxiugai clearfloat">
			<div class="czhi clearfloat box-s">
				<p>昵称</p>
				<input type="text" value="<?php echo ($user["rel_name"]); ?>" placeholder="" name="rel_name" />
			</div>
			<div class="czhi clearfloat box-s">
				<p>会员号</p>
				<input type="text" value="<?php echo ($user["user_name"]); ?>" placeholder="" disabled />
			</div>
			<div class="czhi clearfloat box-s">
				<p>性别</p>
				<span style="width: 200px; height: 100%;">
                    <span style="width: 50%; height: 100%; float: left;">
                    <label >
                        <input type="radio" id="inp1" <?php echo ($user['sex']==0?'checked':''); ?>  name="sex" style="display: none;" value="0" onchange="change()">
                        <span>男</span><span class="layui-icon layui-icon-radio" id="b" style="font-size: 30px; color: #25CB83; padding-left: 15px;"></span>
                    </label>
                    </span>
                    <span style="width: 50%; height: 100%; float: left;">
                    <label>
                        <input type="radio" id="inp2" <?php echo ($user['sex']==1?'checked':''); ?>  name="sex" style="display: none;" value="1" onchange="change()">
                        <span>女</span><span class="layui-icon layui-icon-circle" id="g" style="font-size: 30px; color: #25CB83; padding-left: 15px;"></span>
                    </label>
                    </span>
				</span>
                <script>
                    change();
                    function change(){
                        if($('#inp1').prop('checked')){
                            $('#b').removeClass('layui-icon-circle');
                            $('#b').addClass('layui-icon-radio');
                            $('#g').removeClass('layui-icon-radio');
                            $('#g').addClass('layui-icon-circle');
                        }else{
                            $('#g').removeClass('layui-icon-circle');
                            $('#g').addClass('layui-icon-radio');
                            $('#b').removeClass('layui-icon-radio');
                            $('#b').addClass('layui-icon-circle');
                        }
                    }
                </script>
			</div>
		</div>
		<div class="xia clearfloat">
            <label>
                <input type="submit" style="display: none;">
                <a class="db fl btn ra3">保存</a>
            </label>
		</div>
	</div>
</div>
</form>
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
<script src="/Public/Home/js/mui.min.js"></script>
<script src="/Public/Home/js/mui.picker.min.js"></script>
<script src="/Public/Home/js/others.js"></script>
<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
<script src="/Public/Home/slick/slick.js" type="text/javascript" ></script>
<!--插件-->
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
<script src="/Public/Home/js/swiper.jquery.min.js"></script>
</html>