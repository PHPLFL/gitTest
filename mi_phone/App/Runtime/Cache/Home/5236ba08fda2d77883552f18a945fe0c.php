<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>列表-悟.空源码分享网 www.5k ym.com</title>
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
	    <header class="mui-bar mui-bar-nav" id="header">
			<a class="btn" href="javascript:history.go(-1)">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box flex-col">
				<form action="<?php echo U('find');?>" method="post">
					<div class="centerflex">
						<i class="fdj iconfont icon-sousuo"></i>
						<input type="hidden" value="<?php echo ($cid); ?>" name="cid">
						<input type="text" name="find" id="" value="<?php echo ($find); ?>" class="sch-txt" placeholder="输入您要搜索的商品" />
						<input type="submit" value="搜索" style="margin-top: -.4rem; background: none;border: none">
					</div>
				</form>
	            <!--<div class="centerflex">-->
	                <!--<i class="fdj iconfont icon-sousuo"></i>-->
	                <!--<input type="text" name="" id="" value="" class="sch-txt" placeholder="输入您要搜索的商品" />-->
	            <!--</div>-->
	        </div>
	        <a class="btn" href="<?php echo U('Index/shopcar');?>">
	            <i class="iconfont icon-gouwuche"></i>
	            <span><?php echo ($num); ?></span>
	        </a>
	    </header>
		<!--header end-->
		
		<div class="warp clearfloat">
			<div class="lists clearfloat">
				<div class="top clearfloat">
					<ul>
						<li>默认</li>
						<li>价格<i class="iconfont icon-xiala"></i></li>
						<li>销量<i class="iconfont icon-xiala"></i></li>
					</ul>
				</div>
				<div class="bottom clearfloat">
					<?php if(is_array($good)): foreach($good as $key=>$v): ?><div class="lie clearfloat">
						<a href="<?php echo U('detail');?>?gid=<?php echo ($v["id"]); ?>">
							<div class="tu clearfloat fl">
								<img src="/Public/Home/pic/<?php echo ($v["pic"]); ?>"/>
							</div>
						</a>
						<div class="right clearfloat fl">
							<a href="<?php echo U('detail');?>?gid=<?php echo ($v["id"]); ?>">
								<p class="tit"><?php echo ($v["goods_name"]); ?></p>
							</a>
							<div class="xia clearfloat">
								<a href="<?php echo U('detail');?>?gid=<?php echo ($v["id"]); ?>">
									<p class="jifen fl over">￥<?php echo ($v["price"]); ?></p>
								</a>
								<span class="fr db"><img src="/Public/Home/img/jia.png"/></span>
							</div>
							<a href="<?php echo U('detail');?>?gid=<?php echo ($v["id"]); ?>">
								<p class="tit" style="font: 12px sold ; opacity: 0.5"><?php echo ($v["goods_detail"]); ?></p>
							</a>
						</div>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
		</div>
		
		
		<!--footer star-->
		<!--footer star-->
<footer class="page-footer fixed-footer" id="footer">
    <input type="hidden" value="<?php echo ($state); ?>" id="val">
    <ul id="u">
        <li>
            <a href="<?php echo U('Index/index');?>">
                <i class="iconfont icon-shouye"></i>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Index/cation');?>">
                <i class="iconfont icon-icon04"></i>
                <p>分类</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Index/shopcar');?>">
                <i class="iconfont icon-gouwuche"></i>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Index/my');?>">
                <i class="iconfont icon-yonghuming"></i>
                <p>我的</p>
            </a>
        </li>
    </ul>
</footer>
<!--footer end-->

<script>
    var state = $('#val').val();
    $('#u').children().eq(state).addClass('active');
</script>
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
<script>

</script>