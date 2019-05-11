<?php if (!defined('THINK_PATH')) exit(); $config = D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
  <meta name="description" content="<?php echo ($config["description"]); ?>" />
  <!--<link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />  模板重复-->
  <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />



  <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="/Public/css/sb-admin.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="/Public/css/plugins/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/Public/css/sing/common.css" />
  <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
  <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">



  <link href="Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="Public/css/my.css" rel="stylesheet">





  <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/Public/css/cubeportfolio.min.css">
  <link rel="stylesheet" type="text/css" href="/Public/css/style.css">


</head>






<body>
<header id="header" class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/index.php">
          <img src="/Public/images/logo11.png"  style="width: 50px;" alt="">
        </a>
      </div>

      <ul class="nav navbar-nav navbar-left">
        <li><a href="/index.php" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/index.php?c=cart" class="btn btn-md"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a></li>
        <li class="dropdown">
          <?php
 $userName = getLoginUser1name(); $userId = getLoginUser1id(); if($userName){ echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i> $userName <b class='caret'></b></a>


          <ul class='dropdown-menu'>
          <li>

            <a href='/index.php?c=user&a=personal'><i class='fa fa-fw fa-user'></i> 个人中心</a>
          </li>

          <li class='divider'></li>
          <li>
            <a href='/index.php?c=login&a=loginout'><i class='fa fa-fw fa-power-off'></i> 退出</a>
          </li>
        </ul>"; }else{ echo "<a href='/index.php?c=register'><i class='fa fa-user'></i> 登陆/注册</a>"; } ?>
      </li>
      </ul>


    </div>
  </div>


</header>

<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/webuploader/webuploader.withoutimage.min.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<?php $vo = $result['magazine'];?>
	<section id="property_1" class="padding bg_gallery">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-9" >
					<div class="container-fluid" id="books">
						<div class="row">
							<div class="col-sm-10 col-md-6">
								<!--<div class="tag">30%OFF</div>
								<div class="tag-side"><img src="Public/images/orange-flag.png">
								</div>-->
								<img class="center-block img-responsive" src="<?php echo ($vo["thumb"]); ?>" height="550px" style="padding:20px;">
							</div>
							<div >
								<h1> <?php echo ($vo["title"]); ?></h1>
								<br>
								<p>单   价： <span style="color: #f00;">¥<?php echo ($vo["price"]); ?>元</span></p>
								<p>季度价： <?php if($vo["price_quarter"] == 0): ?>暂无<?php endif; if($vo["price_quarter"] != 0): ?>¥<?php echo ($vo["price_quarter"]); ?>元<?php endif; ?></p>
								<p>半年价： <?php if($vo["price_half_year"] == 0): ?>暂无<?php endif; if($vo["price_half_year"] != 0): ?>¥<?php echo ($vo["price_half_year"]); ?>元<?php endif; ?></p>
								<p>全年价： <span style="color: #f00;">¥<?php echo ($vo["price_year"]); ?>元</span></p>
								<!--<span style="color:#00B9F5;">-->
                                 <!--#<?php echo ($vo["small_title"]); ?>     #<?php echo ($vo["description"]); ?>-->
                                <!--</span>-->
								<hr>
								<div style="width: 350px;margin-top: 20px;float: left;">
								<span style="font-weight:bold;line-height:28px;"> 发行年份 : <?php echo ($vo["issue_year"]); ?> </span>
									<br>
									<span style="font-weight:bold;line-height:28px;"> 购买数量 :  </span>
									<br>
									<span style="float:left;font-weight:bold;line-height:28px;"> 购买数量 :  </span>
									<a onclick="setAmount.reduce('#buy-num')" href="javascript:;" style="width: 22px;height: 22px;display: block;line-height: 22px;text-align: center;border: 1px solid #ccc;text-decoration: none;margin: 0 5px;font-size: 16px;color: #333;float: left;" id="add">-</a>
								<select id="quantity">';
								    <option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
									<a onclick="setAmount.add('#buy-num')" href="javascript:;" style="width: 22px;height: 22px;display: block;line-height: 22px;text-align: center;border: 1px solid #ccc;text-decoration: none;margin: 0 5px;font-size: 16px;color: #333;float: left;" class="button" id="reduce">+</a>

								<br><br><br>
								<a id="buyLink"  type="button" value="click" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;">
									加入购物车
								</a>
								</div>
							</div>
						</div>
					</div>

					<div class="container-fluid">
						<h2>报刊信息</h2>
						<p>发行刊局：<?php echo ($vo["description"]); ?></p>
						<p>发行年份：<?php echo ($vo["issue_year"]); ?></p>
						<p>标准刊号：<?php echo ($vo["magazine_code"]); ?></p>
						<p>邮发编号：<?php echo ($vo["post_code_from"]); ?></p>
						<p>期刊类别：<?php echo ($vo["type"]); ?></p>
						<p>报刊种类：<?php echo ($vo["magazine_type"]); ?></p>
						<p><?php echo ($vo["content"]); ?></p>
					</div>


				</div>


				<div class="col-sm-3 col-md-3" >
  <div class="right-title">
    <h3>销量排行</h3>
    <!--调试-->
    <span>top 5</span>
  </div>

  <div class="right-content">
    <ul>
      <?php if(is_array($result['rankMagazine'])): $k = 0; $__LIST__ = $result['rankMagazine'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k <= 5): ?><li class="num<?php echo ($k); ?> curr">
        <a target="_blank" href="/index.php?c=detail&id=<?php echo ($vo["magazine_id"]); ?>"><?php echo ($vo["title"]); ?></a>
        <?php if($k <= 3): ?><div class="intro">
          <?php echo ($vo["keywords"]); ?>
        </div><?php endif; ?>
      </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <?php if(is_array($result['advMagazine'])): $k = 0; $__LIST__ = $result['advMagazine'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="right-hot">
    <a target="_blank" href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["name"]); ?>"></a>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
				<!-- end right-->
			</div>
		</div>
	</section>
</body>
<script >
    //alert("调试");
    var SCOPE = {
        'add_url' : '/index.php?c=Cart&a=addMagazine',
    }

    $("#buyLink").click(function() {

        /*alert(<?php
 $value = cookie('Info'); echo $value['magazine_id']; ?>);*/

        /*if(!<?php echo $value['user_name'];?>){
			alert("请登陆);
		}*/

        var data={};
        data['count'] = $('#quantity option:selected') .val();
		data['magazine_id']='<?php
 echo $value['magazine_id']; ?>';
			data['magazine_name']='<?php
 echo $value['magazine_name']; ?>';
        data['username']='<?php
 echo $value['user_name']; ?>';
			data['user_id']='<?php
 echo $value['user_id']; ?>';
			data['thumb']='<?php
 echo $value['thumb']; ?>';
			data['price']='<?php
 echo $value['price']; ?>';
		//alert(data['magazine_id']);
                $.post(
                    '/index.php?c=cart&a=addMagazine',
                    data,
                    function (s) {
                        if (s.status == 1) {
                            //alert(s.data['thumb']);
                            return dialog.success(s.message, '');
                            // 跳转到相关页面
                        } else {
                            return dialog.error(s.message);
                        }
                    }
                    , "JSON");

    });

	/*
	 $.post(
	 url,
	 data,
	 function(s){
	 if(s.status == 1) {
	 return dialog.success(s.message,'');
	 // 跳转到相关页面
	 }else {
	 return dialog.error(s.message);
	 }
	 }
	 ,"JSON");
	 });*/
	/*
	 alert("调试");
	 var oBtn = document.getElementById('buyLink');
	 oBtn.onclick=function addSub() {

	 //val count = $('#quantity option:selected') .val();
	 var obj = document.getElementByIdx_x("quantity"); //定位id
	 var count = obj.options[index].value;
	 val url = SCOPE.add_url;
	 data = {};
	 data['count']=count;
	 data['user_name']= <?php echo $userName; ?> ;
	 data['user_id']= <?php echo $userId; ?> ;
	 data['magazine_id']=<?php echo $magazine['magazine_id']; ?>;
	 data['magazine_name']=<?php echo $magazine['title']; ?>;


	 $.post(
	 url,
	 data,
	 function(s){
	 if(s.status == 1) {
	 return dialog.success(s.message,'');
	 // 跳转到相关页面
	 }else {
	 return dialog.error(s.message);
	 }
	 }
	 ,"JSON");
	 }
	 */
</script>
<script src="/Public/js/jquery.js"></script>



</html>



<head>
	<link href="Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="Public/css/my.css" rel="stylesheet">
</head>