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
			<p>管理收货地址</p>
	    </header>
	    <div id="main" class="mui-clearfix contaniner">
			<?php if(is_array($address)): foreach($address as $key=>$v): ?><div class="addlist clearfloat">
	    		<div class="top clearfloat box-s">
	    			<ul>
	    				<li>
	    					<span class="fl"><?php echo ($v["name"]); ?></span>
	    					<span class="fr"><?php echo ($v["phone"]); ?></span>
	    				</li>
	    				<li>
							<?php echo ($v["city"]); echo ($v["home"]); ?>
	    				</li>
	    			</ul>
	    		</div>
	    		<div class="bottom clearfloat box-s">
	    			<section class="shopcar clearfloat">
						<div class="radio fl"> 
						    <label>
								<input type="radio" name="sex" onclick="def(<?php echo ($v['id']); ?>)" value="" <?php echo ($v['def_address']==1?"checked":''); ?>>
						        <div class="option"></div>
						        <span class="mradd smradd fl" >设为默认</span>
						    </label>
						</div>
						
						<div class="right fr clearfloat">
							<a href="#" class="fr" onclick="del(<?php echo ($v["id"]); ?>)">
								<i class="iconfont icon-lajixiang"></i>
								删除
							</a>
							<a href="<?php echo U('editAddress');?>?aid=<?php echo ($v["id"]); ?>" class="fr">
								<i class="iconfont icon-shouji"></i>
								编辑
							</a>							
						</div>
					</section>
	    		</div>
	    	</div><?php endforeach; endif; ?>
	    </div>
	    
     	<a href="<?php echo U('addAddress');?>" class="address-add fl">
     		添加新地址
     	</a>
	</body>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
	<script src="/Public/Home/js/fastclick.js"></script>
	<script src="/Public/Home/js/mui.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
</html>
<script>
	function def(id){
		$.get("<?php echo U('editDefAdd');?>",{id:id},function(){},'json');
	}
	function del(aid){
		//询问框
		layer.open({
			content: '确定要删除吗？'
			,btn: ['删除', '不要']
			,yes: function(index){
				$.get("<?php echo U('delAddress');?>",{aid:aid},function () {
					layer.open({
						content: '删除成功！'
						,skin: 'msg'
						,time: 3 //3秒后自动关闭
					});
					setTimeout(function(){window.location.reload()},2000);
				},'json')
				layer.close(index);
			}
		});

	}
</script>