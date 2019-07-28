<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>确认订单-悟.空源码分享网 www.5k ym.com</title>
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
	        <div class="top-sch-box top-sch-boxtwo flex-col">
	                      确认订单
	        </div>
	    </header>
	    <!--header end-->
		<form action="<?php echo U('makeOrder');?>" method="post">
	    <div class="warp warptwo clearfloat">
	    	<div class="confirm clearfloat">
	    		<div class="add clearfloat box-s">
	    			<a href="<?php echo U('Center/chooseAddress');?>">
		    			<div class="left clearfloat fl">
		    				<i class="iconfont icon-dizhi1"></i>
		    			</div>
		    			<div class="middle clearfloat fl">
							<input type="hidden" name="address" value="<?php echo ($address["id"]); ?>">
		    				<p class="tit">
		    					收货人：<?php echo ($address["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($address["phone"]); ?>
		    				</p>
		    				<p class="fu-tit over2">
		    					收货地址：<?php echo ($address["city"]); echo ($address["home"]); ?>
		    				</p>
		    			</div>
		    			<div class="left clearfloat fr">
		    				<i class="iconfont icon-jiantou1"></i>
		    			</div>
	    			</a>
	    		</div>
	    		<div class="lie clearfloat">
					<?php if(is_array($good)): foreach($good as $key=>$v): ?><a href="detail.html">
						<div class="tu clearfloat fl">
							<img src="/Public/Home/pic/<?php echo ($v["pic"]); ?>" width="80" height="70"/>
						</div>
					</a>
					<div class="right clearfloat fl">
						<a href="detail.html">
							<input type="hidden" name="cid[]" value="<?php echo ($v["cid"]); ?>">
							<p class="tit over"><?php echo ($v["goods_name"]); ?></p>
							<p class="fu-tit">颜色：金色  内存：1287G</p>
						</a>
						<div class="xia clearfloat">
							<a href="detail.html">
								<p class="jifen fl over"><?php echo ($v["price"]); ?></p>
							</a>
							<span class="fr db">×<?php echo ($v["goods_num"]); ?></span>
						</div>
					</div><?php endforeach; endif; ?>
				</div>
				<div class="gmshu clearfloat box-s fl">
		     	</div>
		     	<div class="gmshu gmshutwo clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">配送方式</p>
			     		<div class="you clearfloat fr">
			     			<span>快递 免邮</span>
			     			<i class="iconfont icon-jiantou1"></i>
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu gmshutwo clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">发票信息</p>
			     		<div class="you clearfloat fr">
			     			<div class="xuan clearfloat">
			     				<div class="radiotwo" > 
								    <label>
								        <input type="radio" name="fapiao" value="" />
								        <div class="option"></div>
								        <span class="opt-text">需要发票</span>
								    </label>
								</div>
			     			</div>
		    				<div class="xuan clearfloat">
			     				<div class="radiotwo" > 
								    <label>
								        <input type="radio" name="fapiao" value="" />
								        <div class="option"></div>
								        <span class="opt-text">不需要发票</span>
								    </label>
								</div>
			     			</div>
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu gmshuthree clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">买家留言</p>
			     		<div class="you clearfloat fl">
			     			<input type="text" name="remark" id="" value="" class="text" placeholder="选填 对本次交易需求给商家留言" />
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu clearfloat box-s fl">
					<p class="fr">共<?php echo ($num); ?>件商品   合计<samp>￥<?php echo ($price); ?></samp></p>
		     	</div>
		     	<div class="integral clearfloat fl box-s">
		     		<div class="zuo clearfloat fl">
		     			积分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;可用积分2446
		     		</div>
		     		<div class="you clearfloat fr">
		     			<div class="xuan clearfloat">
		     				<div class="radiothree" > 
							    <label>
							        <input type="checkbox" name="fapiao" value="" />
							        <div class="option"></div>
							    </label>
							</div>
		     			</div>
		     		</div>
		     	</div>
	    	</div>
	    </div>	    
	    
		<!--settlement star-->
	    <div class="settlement clearfloat">
	    	<div class="zuo clearfloat fl box-s">
				<input type="hidden" name="price" value="<?php echo ($price); ?>">
	    		共<span><?php echo ($num); ?></span>件  总金额：<span>￥<?php echo ($price); ?></span>
	    	</div>
			<label>
			<input type="submit" value="提交" style="display: none;">
	    	<a  class="fl db">
	    		提交订单
	    	</a>
			</label>
	    </div>
	    <!--settlement end-->
		</form>
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