<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>4区科技</title>
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
			<a class="btn slide-menu" href="#">
	            <i class="iconfont icon-iconfontcaidan"></i>
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
	        </div>
	        <a class="btn" href="<?php echo U('Center/code');?>">
	            <i class="iconfont icon-erweima"></i>
	        </a>
	    </header>
	    <!--header end-->
	    
	    <!-- 侧边导航 -->
		<div class="slide-mask"></div>
		<aside class="slide-wrapper">
		  <div>
			<ul>
				<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li><a href="<?php echo U('goodList');?>?cid=<?php echo ($v["id"]); ?>"><?php echo ($v["cate_name"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		  </div>
		</aside>
		<div id="main" class="clearfloat warp">			
		    <div class="mui-content">
				<!--banner开始-->
				<div class="banner swiper-container">
		            <div class="swiper-wrapper">
						<?php if(is_array($adv)): foreach($adv as $key=>$v): ?><div class="swiper-slide"><a href="<?php echo U('detail');?>?gid=<?php echo ($v["gid"]); ?>"><img class="swiper-lazy" data-src="/Public/Home<?php echo ($v["ad_pic"]); ?>" alt=""></a></div><?php endforeach; endif; ?>
		            </div>
		        </div>
		        <!--banner结束-->
		        <!--第一栏分类开始-->
		        <div class="cation clearfloat box-s">
		        	<ul>
		        		<li>
		        			<a href="#">
		        				<img src="/Public/Home/img/icon1.png"/>
		        				<p>报单专区</p>
		        			</a>
		        		</li>
		        		<li>
		        			<a href="lianmeng.html">
		        				<img src="/Public/Home/img/icon2.png"/>
		        				<p>联盟商家</p>
		        			</a>
		        		</li>
		        		<li>
		        			<a href="#">
		        				<img src="/Public/Home/img/icon3.png"/>
		        				<p>猜你喜欢</p>
		        			</a>
		        		</li>
		        		<li>
		        			<a href="#">
		        				<img src="/Public/Home/img/icon4.png"/>
		        				<p>热门商品</p>
		        			</a>
		        		</li>
		        	</ul>
		        </div>
		        <!--第一栏分类结束-->
		        <!--boutique star-->
		        <div class="boutique clearfloat box-s">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>精品任选</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<ul>
		        			<li>
		        				<a href="#">
		        					<img src="/Public/Home/upload/1.jpg"/>
		        				</a>
		        			</li>
		        			<li>
		        				<a href="#">
		        					<img src="/Public/Home/upload/2.jpg"/>
		        				</a>
		        			</li>
		        		</ul>
		        	</div>
		        </div>
		        <!--boutique end-->
		        
		        <!--seller star-->
		        <div class="seller clearfloat">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>热卖推荐</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<div class="left clearfloat fl">
		        			<a href="detail.html">
			        			<div class="top clearfloat box-s">
			        				<p class="tit over">天天特惠</p>
			        				<span class="over db">每天10点 爆款抢不停</span>
			        			</div>
			        			<div class="tu">
			        				<img src="/Public/Home/upload/3.jpg"/>
			        			</div>
		        			</a>
		        		</div>
		        		<div class="right clearfloat fr">
		        			<div class="top clearfloat fl">
		        				<a href="detail.html">
			        				<div class="zuo clearfloat fl box-s">
			        					<p class="tit over">酒水饮料</p>
				        				<span class="over db">炫彩预调鸡尾酒</span>
			        				</div>
			        				<div class="tu clearfloat fr">
			        					<span></span>
			        					<img src="/Public/Home/upload/4.jpg"/>
			        				</div>
		        				</a>
		        			</div>
		        			<div class="top clearfloat fl">
		        				<a href="detail.html">
			        				<div class="zuo clearfloat fl box-s">
			        					<p class="tit over">酒水饮料</p>
				        				<span class="over db">炫彩预调鸡尾酒</span>
			        				</div>
			        				<div class="tu clearfloat fr">
			        					<span></span>
			        					<img src="/Public/Home/upload/4.jpg"/>
			        				</div>
		        				</a>
		        			</div>
		        		</div>
		        	</div>
		        </div>
		        <!--seller end-->
		        
		        <!--onnew star-->
		        <div class="onnew clearfloat">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>每周上新</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<div class="top clearfloat">
							<?php if(is_array($adv2)): foreach($adv2 as $key=>$v): ?><div class="list clearfloat fl box-s">
		        				<a href="<?php echo U('detail');?>?gid=<?php echo ($v["gid"]); ?>">
			        				<div class="zuo clearfloat fl box-s">
			        					<p class="tit over"><?php echo ($v["goods_name"]); ?></p>
				        				<span class="over db"><?php echo ($v["goods_detail"]); ?></span>
			        				</div>
			        				<div class="tu clearfloat fr">
			        					<span></span>
			        					<img src="/Public/Home<?php echo ($v["ad_pic"]); ?>"/>
			        				</div>
		        				</a>
		        			</div><?php endforeach; endif; ?>
		        		</div>
		        		<div class="bottom clearfloat">
							<?php if(is_array($adv3)): foreach($adv3 as $key=>$v): ?><div class="list clearfloat fl">
									<a href="<?php echo U('detail');?>?gid=<?php echo ($v["gid"]); ?>">
										<div class="shang clearfloat fl box-s">
											<p class="tit over"><?php echo ($v["goods_name"]); ?></p>
											<span class="over db"><?php echo ($v["goods_detail"]); ?></span>
										</div>
										<div class="tu clearfloat fr">
											<span></span>
											<img src="/Public/Home<?php echo ($v["ad_pic"]); ?>"/>
										</div>
									</a>
								</div><?php endforeach; endif; ?>
		        		</div>
		        	</div>
		        </div>
		        <!--onnew end-->
		        
		        <!--theme star-->
		        <div class="theme clearfloat">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>主题馆</samp>
		        	</div>
		        	<div class="content clearfloat">
						<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><div class="list clearfloat">
			        		<a href="<?php echo U('goodList');?>?cid=<?php echo ($v["id"]); ?>">
			        			<div class="shang clearfloat fl box-s">
		        					<p class="tit over"><?php echo ($v["cate_name"]); ?></p>
		        				</div>
		        				<div class="tu clearfloat fr">
		        					<span></span>
		        					<img src="/Public/Home<?php echo ($v["cate_pic"]); ?>"/>
		        				</div>
			        		</a>
			        	</div><?php endforeach; endif; ?>
		        	</div>				        	
		        </div>
		        <!--theme end-->
		        
		        <!--like star-->
				<?php if(!empty($good)): ?><div class="like clearfloat box-s">
						<div class="boutit clearfloat">
							<span></span>
							<samp>猜你喜欢</samp>
						</div>
						<div class="content clearfloat">
							<?php if(is_array($good)): foreach($good as $key=>$v): ?><div class="list clearfloat fl">
								<a href="<?php echo U('detail');?>?gid=<?php echo ($v["id"]); ?>">
									<div class="tu clearfloat">
										<img src="/Public/Home/pic/<?php echo ($v["pic"]); ?>"/>
									</div>
									<div class="bottom clearfloat box-s">
										<p class="over"><?php echo ($v["goods_name"]); ?></p>
										<span>¥<?php echo ($v["price"]); ?></span>
									</div>
								</a>
							</div><?php endforeach; endif; ?>
						</div>
					</div><?php endif; ?>

		        <!--like end-->
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
		<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js" ></script>
		<script src="/Public/Home/js/others.js"></script>
		<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
		<script src="/Public/Home/slick/slick.js" type="text/javascript" ></script>
		<!--插件-->
		<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
		<script src="/Public/Home/js/swiper.jquery.min.js"></script>
		<!--新闻资讯滚动-->
		<script type="text/javascript">
			$('.autoplay').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 2000,
			});
		</script>
		
	</body>

</html>