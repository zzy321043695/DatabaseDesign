<?php if (!defined('THINK_PATH')) exit();?>
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
				<h3>总期数</h3>
			</div>
			<div class="product">
				<h3>份数</h3>
			</div>
			<div class="product">
				<h3>单价/总价</h3>
			</div>
			<div class="product">
				<h3>库存</h3>
			</div>
			<div class="product">
				<h3>操作</h3>
			</div>
			<div class="clear"></div>
		</div>
		<!-- //Mainbar-Ends-Here -->

		<!-- Items-Starts-Here -->
		<div class="items">
			<?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- Item1-Starts-Here -->
			<div class="item">
					<!-- Remove-Item --><div name="close" id="<?php echo ($vo["id"]); ?>" class="alert-close1"> </div><!-- //Remove-Item -->
					<input type="checkbox" name="pushcheck" value="<?php echo ($vo["id"]); ?>">
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
						<form ><input type="date" name="startTime" id="startDate" value="$vo.startData"></form>
						<p>至</p>
						<form ><input type="date" name="endTime" name1="<?php echo ($vo["type"]); ?>" id="endDate" value="$vo.endDate"></form>
					</div>

					<div class="title1">
						<p style="text-align:center">0</p>
					</div>

					<div class="quantity1">
						<form action="action_page.php">
							<input type="number" name="quantity" name1="<?php echo ($vo["magazine_count"]); ?>" value="<?php echo ($vo["count"]); ?>">
						</form>

					</div>
					<div class="price1">
						<p><?php echo ($vo["price"]); ?></p>
						<p><?php echo ($vo["total_price"]); ?></p>
					</div>

				<div class="title1">
					<p style="text-align:center"><?php echo ($vo["magazine_count"]); ?></p>
				</div>

					<div class="clear"></div>

			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- //Item1-Ends-Here -->

			<!-- Item2-Starts-Here -->

			<!-- //Item3-Ends-Here -->

		</div>


		<div class="checkout">
			<div class="discount">
				<span>优惠码：</span> <input id="discount" type="text">
			</div>


			<div class="checkout-btn">
				<a href="#">结算</a>
			</div>

			<div class="return-btn">
				<a href="/index.php">返回首页</a>
			</div>

			<div class="clear"></div>
		</div>
		<!-- //Checkout-Ends-Here -->

	</div>
	<!-- Content-Ends-Here -->


	<h1>我的订单</h1>

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
				<h3>总期数</h3>
			</div>
			<div class="product">
				<h3>份数</h3>
			</div>
			<div class="product">
				<h3>单价/总价</h3>

			</div>
			<div class="product">
				<h3>下单时间</h3>
			</div>
			<div class="product">
				<h3>状态</h3>
			</div>
			<div class="clear"></div>
		</div>
		<!-- //Mainbar-Ends-Here -->

		<!-- Items-Starts-Here -->
		<div class="items">
			<?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- Item1-Starts-Here -->
				<div class="item">

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
						<p style="text-align:center"><?php echo ($vo["start_time"]); ?></p>
						<p>至</p>
						<p style="text-align:center"><?php echo ($vo["end_time"]); ?></p>
					</div>

					<div class="title1">
						<p style="text-align:center"><?php echo ($vo["total_issues"]); ?></p>
					</div>

					<div class="quantity1">

						<p style="text-align:center" ><?php echo ($vo["count"]); ?></p>

					</div>
					<div class="price1">
						<p><?php echo ($vo["price"]); ?></p>
						<p><?php echo ($vo["total_price"]); ?></p>
					</div>
					<div class="title1">
						<p style="text-align:center"><?php echo ($vo["create_time"]); ?></p>
					</div>
					<div >
						<p style="color: darkorange ;text-align:center"><?php echo ($vo["state"]); ?></p>
					</div>
					<!--<div name="close" id="<?php echo ($vo["id"]); ?>" class="alert-close1"> </div>&lt;!&ndash; //Remove-Item &ndash;&gt;-->
					<!--<input type="checkbox" name="pushcheck" value="<?php echo ($vo["id"]); ?>">-->

					<div class="clear"></div>

				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>



		<!-- //Checkout-Ends-Here -->

	</div>




	<!-- Copyright-Starts-Here -->
	<div class="copyright">
	    <p>&copy; 2019 北洋园报刊店  All Rights Reserved </p>
	</div>
	<!-- //Copyright-Ends-Here -->

</body>
<!-- Body-Ends-Here -->

</html>
<script>
    $(".alert-close1").click(function(){		//指定相同的类名的触发事件


        subscription_id = {}		//传递的数据必须是数组！
        subscription_id['id']=$(this).attr("id");
        // alert(subscription_id);

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


<script>
	$(".checkout-btn").click(function(){
        exc0 = 0;
        exc3 = 0;
		push = {};
		postData = {};
		signal = false;
		$("input[name='pushcheck']").each(function(i){
			push[i] = {};
			push[i]['id'] = 0;
		});

		$("input[name='pushcheck']:checked").each(function(i){
			push[i]['id'] = $(this).attr("value");
			signal = true;
		});

		if (signal == false){
			return dialog.error("请选择要提交的订单");
		}
		s = 0;

		$("input[name='startTime']").each(function(i){
			if(push[i]['id']!=0){
                if(!$(this).val()){
                    exc0=1;
                    return dialog.error("选择的时间不能为空！");
				}
				push[s]['start'] = $(this).val();
				s++;
			}
		});
        s = 0;
        $("input[name='quantity']").each(function(i){
            //alert($(this).val());
            if(push[i]['id']!=0) {
                if (!$(this).val()) {
                    exc3 = 1;
                    return dialog.error("选择的份数不能为空！");
                }
//                else if($(this).val() > $(this).attr("name1")){
//                    exc3 = 1;
//					return	dialog.error("选择的份数不能大于库存！");
//                }
                else if($(this).val() < 0){
                    exc3 = 1;
                    return	dialog.error("选择的份数不能小于0");
                }
                else {
                    //alert($(this).val());
                    push[s]['count'] = $(this).val();
                    s++
                }
            }

        });

		s = 0;
		exc1 = 0;
		exc2 = 0;

		$("input[name='endTime']").each(function(i){
			// alert(s+1);
			// alert(push[s+1]['id']);
			if(push[i]['id']!=0){
                if(!$(this).val()){
                    exc0=1;
                    return dialog.error("选择的时间不能为空！");
                }
				//alert("fda");
				push[s]['end'] = $(this).val();
				
				var date1=push[s]['start'];
				var y1=date1.split("-")[0];
				var m1=date1.split("-")[1];
				var d1=date1.split("-")[2];
				var time1=new Date(y1,m1,d1);
				var date2=push[s]['end'];
				var y2=date2.split("-")[0];
				var m2=date2.split("-")[1];
				var d2=date2.split("-")[2];
				var time2=new Date(y2,m2,d2);
				var dayCount =(time2 - time1)/1000/60/60/24;

				var start = new Date(push[s]['start'].replace(/-/g,"/"));
				var end = new Date(push[s]['end'].replace(/-/g,"/"));
				var now = new Date();
				if(start<now){
					exc1 = 1;
					return dialog.error("起始时间不能早于现在");
				}
				if(start>end){
					exc2 = 1;
					return dialog.error("结束时间不能早于起始时间");
				}
				if($(this).attr("name1") == '日报'){
                    push[s]['total_issues'] = dayCount + 1;
                }
                else if($(this).attr("name1") == '周报'){
                    push[s]['total_issues'] = dayCount/7 + 1;
                }
                else if($(this).attr("name1") == '周刊'){
                    push[s]['total_issues'] = dayCount/7 + 1;
                }
                else if($(this).attr("name1") == '旬刊'){
                    push[s]['total_issues'] = dayCount/10 + 1;
                }
                else if($(this).attr("name1") == '半月刊'){
                    push[s]['total_issues'] = dayCount/15 + 1;
                }
                else if($(this).attr("name1") == '月刊'){
                    push[s]['total_issues'] = dayCount/30 + 1;
                }
                if($(this).attr("name1") == '季刊'){
                    push[s]['total_issues'] = dayCount/90 + 1;
                }
                push[s]['discount'] = document.getElementById('discount').value;
				s++;
			}
		});

		if(exc1 == 1 || exc2 == 1 || exc0==1 ||exc3==1){
			return;
		}
		s=0;


		postData['push'] = push;
		url = '/index.php?m=home&c=cart&a=addOrder';
		jump_url = '/index.php?c=cart';
		$.post(url, postData, function(result){
			if(result.status == 1) {
				return dialog.success(result.message,jump_url);
			}
			if(result.status == 0) {
				return dialog.error(result.message);
			}
		},"json");

	});
</script>