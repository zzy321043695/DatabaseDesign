<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>报刊订阅后台管理系统</title>
    <!-- Bootstrap Core CSS -->
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

    <!-- jQuery -->
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>
    <script src="/Public/js/echarts.min.js"></script>

</head>

    



<body>

<div id="wrapper">

    <?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v) { if($v['c'] == 'admin' && $username != 'admin') { unset($navs[$k]); } } $index = 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >后台管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUsername()?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($navo["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($navo)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo ($navo["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">

				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="javascript:void(0)">修改订单信息</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> 配置
					</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-6">

				<form class="form-horizontal" id="singcms-form">
					<div class="form-group">
						<label  class="col-sm-2 control-label">订单id:</label>
						<div class="col-sm-5">
							<?php echo ($vo["id"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">用户名:</label>
						<div class="col-sm-5">
							<?php echo ($vo["username"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">杂志名:</label>
						<div class="col-sm-5">
							<?php echo ($vo["magazine_name"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">杂志数量:</label>
						<div class="col-sm-5">
							<?php echo ($vo["count"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">下单时间:</label>
						<div class="col-sm-5">
							<?php echo ($vo["create_time"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">单价:</label>
						<div class="col-sm-5">
							<?php echo ($vo["price"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">总价:</label>
						<div class="col-sm-5">
							<?php echo ($vo["total_price"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">订阅起始时间:</label>
						<div class="col-sm-5">
							<?php echo ($vo["start_time"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">订阅到期时间:</label>
						<div class="col-sm-5">
							<?php echo ($vo["end_time"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">处理到哪一步:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="state" id="inputPassword3" placeholder="" value="<?php echo ($vo["state"]); ?>">
						</div>
					</div>

					<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
						</div>
					</div>
				</form>


			</div>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<script>
	var SCOPE = {
		'save_url' : '/admin.php?c=orderManager&a=save',
		'jump_url' : '',

	};

</script>
<!-- /#wrapper -->
<script type="text/javascript" src="/Public/js/admin/form.js"></script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>