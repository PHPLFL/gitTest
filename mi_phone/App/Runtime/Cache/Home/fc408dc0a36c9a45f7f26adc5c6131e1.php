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
	        <div class="top-sch-box top-sch-boxtwo flex-col">
	                      购物车
	        </div>
	        <a class="btn" href="#">
	            <i class="iconfont icon-lajixiang" onclick="delMany()"></i>
	        </a>
	    </header>
	    <!--header end-->
		<form action="<?php echo U('trueOrder');?>" method="get" id="sub">
	    <div class="warp warptwo clearfloat">
	    	<div class="shopcar clearfloat">
				<?php if(is_array($rows)): foreach($rows as $key=>$v): ?><div class="list clearfloat fl del_<?php echo ($v["id"]); ?>">
	    			<div class="xuan clearfloat fl">
	    				<div class="radio" >
							<input type="hidden" value="<?php echo ($v["id"]); ?>">
							<label>
								<input type="checkbox" name="sex[]" onclick="fun()" value="<?php echo ($v["cid"]); ?>" class="che che_<?php echo ($v["id"]); ?>" />
						        <div class="option"></div>
						    </label>
							<input type="hidden" value="<?php echo ($v["price"]); ?>">

						</div>
	    			</div>
		    			<div class="tu clearfloat fl">
		    				<span></span>
		    				<img src="/Public/Home/pic/<?php echo ($v["pic"]); ?>"/>
		    			</div>
		    			<div class="right clearfloat fl">
		    				<p class="tit over"><?php echo ($v["goods_name"]); ?></p>
		    				<p class="fu-tit over">颜色：金色  内存：1287G</p>
		    				<p class="jifen over"><?php echo ($v["price"]); ?>￥</p>
		    				<div class="bottom clearfloat">
		    					<div class="zuo clearfloat fl">
		    						<ul>
		    							<li class="rec" ><img src="/Public/Home/img/jian.png"/></li>
		    							<li class="num_<?php echo ($v["id"]); ?>"><?php echo ($v["goods_num"]); ?></li>
		    							<li class="add" ><img src="/Public/Home/img/jia.png"/></li>
		    						</ul>
									<input type="hidden" value="<?php echo ($v["id"]); ?>">
		    					</div>
		    					<i class="iconfont icon-lajixiang fr" onclick="del(<?php echo ($v["id"]); ?>)"></i>
		    				</div>
		    			</div>
	    		</div><?php endforeach; endif; ?>

	    	</div>
	    </div>
	    
	    <!--settlement star-->
	    <div class="settlement clearfloat">
	    	<div class="zuo clearfloat fl box-s">
	    		合计：<span id="allPrice"></span>
	    	</div>
			<label>
				<input type="submit" value="提交" style="display: none;">
	    	<a class="fl db">
	    		立即结算
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
	<script src="/Public/layer_phone/layer_mobile/layer.js"></script>
	<script src="/Public/Home/js/mui.min.js"></script>
	<script src="/Public/Home/js/others.js"></script>
	<script type="text/javascript" src="/Public/Home/js/hmt.js" ></script>
	<script src="/Public/Home/slick/slick.js" type="text/javascript" ></script>
	<!--插件-->
	<link rel="stylesheet" href="css/swiper.min.css">
	<script src="/Public/Home/js/swiper.jquery.min.js"></script>
</html>
<script>
	fun();
	//商品数量加减
	$('.add').click(function () {
		var gid = $(this).parent().next().val();
		var num = Number($(this).prev().text());
		$(this).prev().text(num+1);
		$.get("<?php echo U('changeCar');?>",{num:num+1,gid:gid},function(){},'json');
		$('.che_'+gid).prop('checked','checked');
		fun();
	})
	$('.rec').click(function () {
		var gid = $(this).parent().next().val();
		var num = Number($(this).next().text());
		if(num>1){
			$(this).next().text(num-1);
			$.get("<?php echo U('changeCar');?>",{num:num-1,gid:gid},function(){},'json');
		}
		$('.che_'+gid).prop('checked','checked');
		fun();
	})
	function fun() {
		var allPrice = 0;
		$('.che').each(function () {
			if($(this).prop('checked')){
				price = $(this).parent().next().val();
				id = $(this).parent().prev().val();
				num = $('.num_'+id).text();
				allPrice = allPrice+num*price;
			}
		})
		$('#allPrice').text('￥'+allPrice);
	}
	//单个删除
	function del(gid){
		//询问框
		layer.open({
			content: '确定删除吗？'
			,btn: ['删除', '取消']
			,yes: function(index){
				// location.reload();
				$.get("<?php echo U('delCar');?>",{gid:gid},function () {
					$('.del_'+gid).remove();
					fun();
				},'json');
				layer.close(index);
			}
		});
	}
	//批量删除
	function delMany(){
		var str = '';
		$('.che').each(function () {
			if($(this).prop('checked')){
				id = $(this).parent().prev().val();
				str+=id+',';
			}
		})
		layer.open({
			content: '确定删除吗？'
			,btn: ['删除', '取消']
			,yes: function(index){
				// location.reload();
				$.get("<?php echo U('delCar');?>",{gid:str},function () {
					$('.che').each(function () {
						if($(this).prop('checked')){
							id = $(this).parent().prev().val();
							$('.del_'+id).remove();
						}
					})
					fun();
				},'json');
				layer.close(index);
			}
		});
	}
	//提交验证
	$('#sub').submit(function () {
		var bool = false;
		$('.che').each(function () {
			if($(this).prop('checked')){
				bool = true;
			}
		})
		if(!bool){
			layer.open({
				content: '请选择商品！'
				,skin: 'msg'
				,time: 3 //3秒后自动关闭
			});
			return false;
		}
	})
</script>