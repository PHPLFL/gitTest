<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>分类-悟.空源码分享网 www.5k ym.com</title>
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
		<!--header star-->
		<header class="mui-bar mui-bar-nav" id="header">
			<a class="btn" href="javascript:history.go(-1)">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box flex-col">
				<form action="<?php echo U('find');?>" method="post" id="f">
					<div class="centerflex">
						<i class="fdj iconfont icon-sousuo"></i>
						<input type="hidden" name="cid" value="0">
						<input type="text" name="find" id="" value="" class="sch-txt" placeholder="输入您要搜索的商品" />
						<input type="submit" value="搜索" style="margin-top: -.4rem; background: none;border: none">
					</div>
				</form>
				<script>
					$('#f').submit(function(){
						if(!$(".sch-txt").val()){
							return false;
						}
					})
				</script>
	            <!--<div class="centerflex">-->
	                <!--<i class="fdj iconfont icon-sousuo"></i>-->
	                <!--<input type="text" name="" id="" value="" class="sch-txt" placeholder="输入您要搜索的商品" />-->
	            <!--</div>-->
	        </div>
	        <a class="btn" href="#">
	            <i class="iconfont icon-erweima"></i>
	        </a>
	    </header>
	    <!--header end-->
	    
	    <div class="warp clearfloat">
	    	<!--cation star-->
		    <div class="cations clearfloat">
				<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><div class="list clearfloat fl">
		    		<a href="<?php echo U('goodList');?>?cid=<?php echo ($v["id"]); ?>">
			    		<p class="tit over box-s"><?php echo ($v["cate_name"]); ?></p>
			    		<div class="tu">
			    			<img src="/Public/Home/<?php echo ($v["cate_pic"]); ?>" width="100px" height="100px"/>
			    		</div>
		    		</a>
		    	</div><?php endforeach; endif; ?>
		    </div>
		    <!--cation end-->
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
	<link rel="stylesheet" href="css/swiper.min.css">
	<script src="/Public/Home/js/swiper.jquery.min.js"></script>
</html>