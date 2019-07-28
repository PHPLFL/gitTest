<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>会员注册-悟.空源码分享网 www.5k ym.com</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Home/js/rem.js"></script> 
    <script src="/Public/Home/js/jquery.min.js" type="text/javascript"></script>
	<script src="/Public/layer_phone/layer_mobile/layer.js" type="text/javascript"></script>
	<?php echo links('css','Public/Home/css',['base','page','all','mni.min','loaders.min','loading']);?>
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
	<style>
		.ver_btn{
			text-align:left;
			border:none;
			color:#f4f4f4;
			height:42px;
			line-height:42px;
			margin:0;
			z-index:100;
			float:left;
			background:#48bca5;
		}

	</style>
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
		<div class="login clearfloat box-s">
			<h3>会员注册</h3>
			<form action="<?php echo U('regAct');?>" method="post" id="f">
			<div class="list clearfloat">
				<ul>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-shouji"></i>
						</p>
						<div class="nr clearfloat fl">
							<span class="opa3"></span>
							<input type="text" id="tel" name="tel"  value="<?php echo ($phone); ?>" placeholder="请输入手机号码" />
						</div>
					</li>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-mima"></i>
						</p>
						<div class="nr clearfloat fl">
							<span class="opa3"></span>
							<input type="password" name="pass" id="pass"  value="<?php echo ($password); ?>" placeholder="登录密码" />
						</div>
					</li>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-mima"></i>
						</p>
						<div class="nr clearfloat fl">
							<span class="opa3"></span>
							<input type="password" name="pass2" id="pass2"  value="<?php echo ($password); ?>" placeholder="确认密码" />
						</div>
					</li>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-yanzhengma"></i>
						</p>
						<div class="nr nrtwo clearfloat fl">
							<span class="opa3"></span>
							<input type="text" name="ver" id="ver" value="" placeholder="验证码" />
							<span style="background: none;"><input type="button" value="发送验证码" class="ver_btn"></span>
						</div>
					</li>
				</ul>
			</div>			
			<div class="login-btn">
				<label>
					<input type="submit" style="display: none;">
					<a>
						注册
					</a>
				</label>
			</div>
			</form>
			<input type="hidden" value="<?php echo ($state); ?>" id="sta">
			<div class="mima mimaone clearfloat">
				<ul>
					<li class="fr">
						<a href="<?php echo U('login');?>">立即登录</a>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>
<script>
	if($('#sta').val()==1){
		layer.open({
			content: '验证码不正确！'
			,skin: 'msg'
			,time: 3 //3秒后自动关闭
		});
	}
	var num = 60;
	$('#tel').blur(funt);
	var bool1 = false;
	function funt(){
		phone = $('#tel').val();
		if(!(/^1[3456789]\d{9}$/.test(phone))){
			layer.open({
				content: '手机号码不正确！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			bool1 = false;
		}else{
			$.get("<?php echo U('Index/phoned');?>",{tel:phone},function (data) {
				if(data.state){
					layer.open({
						content: '手机号已存在！'
						,skin: 'msg'
						,time: 3 //3秒后自动关闭
					});
					bool1 = false;
				}else{
					bool1 = true;
				}
			},'json')
		}
	}
	$('#pass').blur(fun1);
	var bool2 = false;
	function fun1() {
		regExp=/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,21}$/;
		if($("#pass").val()==""){
			layer.open({
				content: '密码不能为空！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			bool2 = false;
		}else if($("#pass").val().length<6){
			layer.open({
				content: '密码不能少于6位！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			bool2 = false;
		}
		else if(!regExp.test($("#pass").val())){
			layer.open({
				content: '密码至少包括字母和数字！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			bool2 = false;
		}else{
			bool2 = true;
		}
	}
	$('#pass2').blur(fun2);
	var bool3 = false;
	function fun2(){
		if($("#pass2").val()!=$('#pass').val()){
			layer.open({
				content: '两次密码不一致！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			bool3 = false;
		}else{
			bool3 = true;
		}
	}
	//验证码
	$('#ver').blur(fun3);
	var bool4 = false;
	function fun3(){
		if($('#ver').val().length!=4){
			layer.open({
				content: '请输入4位验证码！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			bool4 = false;
		}else{
			bool4 = true;
		}
	}
	$('.ver_btn').click(function () {
		fun2();
		funt();
		fun1();
		if(!(bool1 && bool2 && bool3)){
			return false;
		}
		$('.ver_btn').prop('disabled','disabled');
		var t = setInterval(fun,1000);
		function fun(){
			if(num<1){
				num=60;
				$('.ver_btn').val('发送验证码');
				$('.ver_btn').prop('disabled','');
				clearTimeout(t);
			}else{
				$('.ver_btn').val(num+'秒');
				num--;
			}
		}
		tel = $('#tel').val();
		$.get("<?php echo U('Help/sendMes');?>",{tel:tel},function () {},'json');
	})
	$('#f').submit(function () {
		funt();
		fun1();
		fun2();
		fun3();
		if(!(bool1 && bool2 && bool3 && bool4)){
			return false;
		}
	})
</script>