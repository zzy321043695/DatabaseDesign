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
<section id="property" class="padding bg_gallery">
  <div class="container">


    <div class="row">
      <div class="col-sm-9 col-md-9">
        <div class="banner"  >
          <div class="banner-left">


            <a target="_blank" href="/index.php?c=detail&id=<?php echo ($result['topPicMagazine'][0]['magazine_id']); ?>">
              <img width="670" height="360" src="<?php echo ($result['topPicMagazine'][0]['thumb']); ?>" alt="">
            </a>
          </div>
          <div class="banner-right">
            <ul>
              <?php if(is_array($result['topSmailMagazine'])): $i = 0; $__LIST__ = $result['topSmailMagazine'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a target="_blank" href="/index.php?c=detail&id=<?php echo ($vo["magazine_id"]); ?>"><img width="150" height="113" src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
          </div>
        </div>



        <div id="property-gallery" class="cbp listing1">
          <?php if(is_array($result['listMagazine'])): $i = 0; $__LIST__ = $result['listMagazine'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class= "cbp-item sale">
            <div class="property_item">
              <div class="image">
                <a href="/index.php?c=detail&id=<?php echo ($vo["magazine_id"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" class="img-responsive"></a>
                <div class="price clearfix">
                  <span class="tag pull-right"><?php echo ($vo["price"]); ?>元/年</span>
                </div>
                <span class="tag_t" <?php if($vo["forsale"] == 0): ?>style="display:none"<?php endif; ?>><?php if($vo["forsale"] == 1): ?>For Sale<?php endif; ?></span>
                <span class="tag_l" <?php if($vo["featured"] == 0): ?>style="display:none"<?php endif; ?>><?php if($vo["featured"] == 1): ?>Featured<?php endif; ?></span>
              </div>
              <div class="proerty_content">
                <div class="proerty_text">
                  <h3 class="captlize"><a href="/index.php?c=detail&id=<?php echo ($vo["magazine_id"]); ?>"><?php echo ($vo["title"]); ?></a></h3>
                  <p><span style="line-height:28px;"><?php echo ($vo["type"]); ?></span></p>
                  <p><span style="background:forestgreen;color:white;line-height:28px;"><?php echo ($vo["description"]); ?></span></p>
                  <p><span style="line-height:28px;">报刊代号:<?php echo ($vo["magazine_code"]); ?></span></p>
                </div>

                <!--
                <div class="property_meta transparent">

                  <dd class="magazine-intro">
                    <?php echo ($vo["keywords"]); ?>
                  </dd>
                </div>
                -->

                <div class="favroute clearfix">
                  <p><span><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></span> -订阅-(<i magazine-id="<?php echo ($vo["magazine_id"]); ?>" class="magazine_count node-<?php echo ($vo["magazine_id"]); ?>"><?php echo ($vo["count"]); ?></i>)</p>
                  <ul class="pull-right">
                    <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                    <li><a href="#seventy" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                  </ul>
                </div>
                <div class="toggle_share collapse" id="seventy">
                  <ul>
                    <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                    <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                    <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
  </div>
</section>
</body>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/count.js"></script>
<script src="/Public/js/jquery-2.1.4.js"></script>
<script src="/Public/js/jquery.cubeportfolio.min.js"></script>
<script src="/Public/js/functions.js"></script>
</html>