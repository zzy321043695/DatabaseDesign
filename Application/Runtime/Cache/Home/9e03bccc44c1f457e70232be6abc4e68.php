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
	<section>
		<div class="container" style="text-align:center;">
			<h1 style="color:red"><?php echo ($message); ?></h1>
			<h3 id="location" >系统将在<span style="color:red">3</span>秒后自动跳转到首页</h3>
		</div>
	</section>
</body>
<script src="/Public/js/jquery.js"></script>
<script>
  //首页
  var url = "/";
  var time = 3;
  setInterval("refer()",1000);
  function refer() {
	if(time==0) {
	  location.href=url;
	}
	$("#location span").html(time);
	time--;
  }
</script>
</html>