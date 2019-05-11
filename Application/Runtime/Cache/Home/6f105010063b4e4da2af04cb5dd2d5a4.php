<?php if (!defined('THINK_PATH')) exit();?><!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>我的订阅</title>

<!-- For-Mobile-Apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="E Shop Cart Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Android Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->

<!-- Custom-Theme-Files -->
	<link rel="stylesheet" href="Public/css/style2.css" type="text/css" media="all" />
<!-- //Custom-Theme-Files -->

<!-- Remove-Item-JavaScript -->
	<script type="text/javascript" src="/Public/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/Public/js/dialog.js"></script>
	<script src="/Public/js/dialog/layer.js"></script>

	<script>$(document).ready(function(c) {
		$('.alert-close1').on('click', function(c){
			$('.close1').fadeOut('slow', function(c){
		  		$('.close1').remove();
			});
		});	  
	});
	</script>
	<script>$(document).ready(function(c) {
		$('.alert-close2').on('click', function(c){
			$('.close2').fadeOut('slow', function(c){
		  		$('.close2').remove();
			});
		});	  
	});
	</script>
	<script>$(document).ready(function(c) {
		$('.alert-close3').on('click', function(c){
			$('.close3').fadeOut('slow', function(c){
		  		$('.close3').remove();
			});
		});	  
	});
	</script>
<!-- //Remove-Item-JavaScript -->

</head>

<!-- Body-Starts-Here -->
<body>

	<h1>我的订阅</h1>

	<!-- Content-Starts-Here -->
	<div class="container">

		<!-- Mainbar-Starts-Here -->
		<div class="main-bar">
			<div class="product">
				<h3><span style="">报刊</span></h3>
			</div>
			<div class="product">
				<h3>刊名</h3>
			</div>
			<div class="product">
				<h3>年份</h3>
			</div>
			<div class="date">
				<h3>订阅日期</h3>
			</div>
			<div class="product">
				<h3>可定首期</h3>
			</div>
			<div class="product">
				<h3>总期数</h3>
			</div>
			<div class="product">
				<h3>份数</h3>
			</div>
			<div class="product">
				<h3>单价</h3>
			</div>
			<div class="product">
				<h3>金额价</h3>
			</div>
			<div class="clear"></div>
		</div>
		<!-- //Mainbar-Ends-Here -->

		<!-- Items-Starts-Here -->
		<div class="items">
			<?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- Item1-Starts-Here -->
			<div class="item">
					<!-- Remove-Item --><div name="close" id="<?php echo ($vo["id"]); ?>" class="alert-close1"> </div><!-- //Remove-Item -->
					<div class="image1">
						<img src="<?php echo ($vo["thumb"]); ?>" class="img" alt="item1">
					</div>
					<div class="title1">
						<p style="text-align:center"><?php echo ($vo["magazine_name"]); ?></p>
						<p style="text-align:center">邮发编号：<?php echo ($vo["post_code_from"]); ?></p>
						<p style="text-align:center">类型：<?php echo ($vo["type"]); ?></p>
					</div>
					<div class="title1">
						<p style="text-align:center">年份：<?php echo ($vo["issue_year"]); ?></p>

					</div>
					<div class="quantity2">
						<form ><input type="date" name="quantity" id="startDate" value="$vo.startData"></form>
						<span >至</span>
						<form ><input type="date" name="quantity" id="endDate" value="$vo.endDate"></form>
					</div>
					<div class="title1">
						<p style="text-align:center">首期：<?php echo ($vo["firstIssue"]); ?></p>
					</div>
					<div class="title1">
						<p style="text-align:center">总期数：<?php echo ($vo["totalIssues"]); ?></p>
					</div>

					<div class="quantity1">
						<form action="action_page.php">
							<input type="number" name="quantity" value="<?php echo ($vo["count"]); ?>">
						</form>
					</div>
					<div class="price1">
						<p><?php echo ($vo["price"]); ?></p>
					</div>
					<div class="price1">
						<p><?php echo ($vo["total_price"]); ?></p>
					</div>
					<div class="clear"></div>

			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- //Item1-Ends-Here -->

			<!-- Item2-Starts-Here -->

			<!-- //Item3-Ends-Here -->

		</div>
		<!-- //Items-Ends-Here -->

		<!-- Total-Price-Starts-Here -->

		<!-- //Total-Price-Ends-Here -->

		<!-- Checkout-Starts-Here -->
		<div class="checkout">
			<div class="discount">
				<span>优惠码：</span> <input type="text">
			</div>
			<!--<div class="add">-->
				<!--<a href="#">Add to Cart</a>-->
			<!--</div>-->
			<div class="checkout-btn">
				<a href="#">结算</a>
			</div>
			<div class="clear"></div>
		</div>
		<!-- //Checkout-Ends-Here -->

	</div>
	<!-- Content-Ends-Here -->

	<!-- Copyright-Starts-Here -->
	<div class="copyright">
	    <p>&copy; 2019 北洋园报刊店  All Rights Reserved </p>
	</div>
	<!-- //Copyright-Ends-Here -->

</body>
<!-- Body-Ends-Here -->

</html>
<script >
    $(".alert-close1").click(function(){		//指定相同的类名的触发事件


        subscription_id = {}		//传递的数据必须是数组！
        subscription_id['id']=$(this).attr("id");
        //alert(subscription_id);


        // 将获取到的数据post给服务器
        url = '/index.php?m=home&c=cart&a=subMagazine';
        jump_url = '/index.php?c=cart';
        $.post(url,subscription_id,function(result){
            //alert('调试');
            if(result.status == 1) {
                //成功
                return dialog.success(result.message,jump_url);
            }else if(result.status == 0) {
                // 失败
                return dialog.error(result.message);
            }
        },"JSON");
    });
</script>