<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>详情页-悟.空源码分享网 www.5k ym.com</title>
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
	<style>
		.shar{
			background-color:rgba(0,0,0,0);
		}
	</style>
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
	        <div class="top-sch-box top-sch-boxtwo flex-col">
	            <ul>
	            	<li class="cur"><a href="#">商品</a></li>
	            	<li><a href="#">详情</a></li>
	            	<li><a href="#">评价</a></li>
	            </ul>
	        </div>
	        <a class="btn" href="<?php echo U('Index/shopcar');?>">
	            <i class="iconfont icon-gouwuche"></i>
	            <span id="sp_num"><?php echo ($num); ?></span>
	        </a>
	    </header>
		<!--header end-->
		
		<div class="warp warptwo clearfloat">
			<div class="detail clearfloat">
				<!--banner star-->
				<div class="banner swiper-container">
		            <div class="swiper-wrapper">
						<div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy" data-src="/Public/Home/pic/<?php echo ($good["pic"]); ?>" alt=""></a></div>
						<?php if(is_array($pic)): foreach($pic as $key=>$v): ?><div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy" data-src="/Public/Home<?php echo ($v); ?>" alt=""></a></div><?php endforeach; endif; ?>
		            </div>
		            <div class="swiper-pagination"></div>
		        </div>
				<!--banner end-->
				<input type="hidden" id="goodId" value="<?php echo ($good["id"]); ?>">
				<div class="top clearfloat box-s">
					<div class="shang clearfloat">
						<div class="zuo clearfloat fl over2 box-s">
							<?php echo ($good["goods_name"]); ?>
						</div>
						<div class="you clearfloat fr">
							<i class="iconfont icon-fenxiang"></i>
							<p>分享</p>
						</div>
					</div>
					<div class="xia clearfloat">
						<p class="jifen fl box-s"><samp><?php echo ($good["price"]); ?>￥</samp></p>
						<span class="fr">销量<?php echo ($good["sold_num"]); ?>件</span>
					</div>
				</div>
				<div class="middle clearfloat box-s">
					<a href="#">
						<span class="fl">商品详情</span>
						<i class="iconfont icon-jiantou1 fr"></i>
					</a>
				</div>
				<div class="middle clearfloat box-s">
					<a href="#">
						<span class="fl">商品评价</span>
						<i class="iconfont icon-jiantou1 fr"></i>
					</a>
				</div>
			</div>
		</div>
		
		<!--footerone star-->
		<div class="footerone clearfloat">
			<div class="left clearfloat fl">
				<ul>
					<li>
						<a href="#">
							<i class="iconfont icon-shangcheng"></i>
							<p>商城</p>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="iconfont icon-kefu1"></i>
							<p>客服</p>
						</a>
					</li>				
				</ul>
			</div>
			<div class="right clearfloat fl">
				<span class="btn fl" onClick="toshare()">加入购物车</span>
				<span class="btn btnone fl" onClick="tobuy()">立即购买</span>
				<!--<a href="<?php echo U('trueOrder');?>" class="btn  fl">立即购买</a>-->
			</div>
		</div>
		<!--footerone end-->
		
		<!--这里是弹出购物车内容-->
		<div class="am-share">
		<div class="am-share-footer"><button class="share_btn"><img src="/Public/Home/img/chahao.png"/></button></div>
		  <div class="am-share-sns box-s">
		     <div class="sdetail clearfloat">
		     	<div class="top clearfloat">
		     		<div class="tu clearfloat fl">
		     			<span></span>
		     			<img src="/Public/Home/pic/<?php echo ($good["pic"]); ?>"/>
		     		</div>
		     		<div class="you clearfloat fl">
		     			<p class="tit"><?php echo ($good["goods_name"]); ?></p>
		     			<span><?php echo ($good["price"]); ?>￥</span>
		     		</div>
		     	</div>
		     	<div class="middle clearfloat">
		     		<p>颜色分类</p>
		     		<div class="xia clearfloat">
		     			<ul>
			     			<li class="ra3 cur">金色</li>
			     			<li class="ra3">灰色</li>
			     		</ul>
		     		</div>		     		
		     	</div>
		     	<div class="middle clearfloat">
		     		<p>机身内存</p>
		     		<div class="xia clearfloat">
		     			<ul>
			     			<li class="ra3 cur">128G</li>
			     			<li class="ra3">16G</li>
			     		</ul>
		     		</div>		     		
		     	</div>
		     	<div class="bottom clearfloat">
		     		<p class="fl">购买数量</p>
		     		<div class="you clearfloat fr">
		     			<ul>
		     				<li id="rec"><img src="/Public/Home/img/jian.jpg"/></li>
		     				<li id="num">1</li>
		     				<li id="add"><img src="/Public/Home/img/jia.jpg"/></li>
							<script>
								$('#add').click(function () {
									var num = $('#num').text();
									$('#num').text(Number(num)+1);
								})
								$('#rec').click(function () {
									var num = Number($('#num').text());
									if(num>1){
										$('#num').text(Number(num)-1);
									}
								})
							</script>
		     			</ul>
		     		</div>
		     	</div>
		     </div>
		  </div>
		  <a class="shop-btn db cha" >确定</a>
			<input type="hidden" value="<?php echo ($good["id"]); ?>" id="gid">
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
	<script src="/Public/layer_phone/layer_mobile/layer.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
	<script src="/Public/Home/slick/slick.js" type="text/javascript" ></script>
	<script type="text/javascript" src="/Public/Home/js/shopcar.js" ></script>
	<!--插件-->
	<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
	<script src="/Public/Home/js/swiper.jquery.min.js"></script>
</html>
<script>
	function car(){
		var gid = $('#gid').val();
		var num = Number($('#num').text());
		$.get("<?php echo U('addCar');?>",{gid:gid,num:num},function () {
			$(".am-share").removeClass("am-modal-active");
			$('.sharebg').removeClass('sharebg');
			layer.open({
				content: '商品已在购物车等您'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			sp_num = $('#sp_num').text()
			sNum = parseInt(sp_num) + num;
			$('#sp_num').text(sNum)
		},'json')
	}
	function buy(){
		num = $('#num').text();
		gid = $('#goodId').val();
		location.href = "<?php echo U('nowBuy');?>?gid="+gid+'&num='+num;
	}
</script>