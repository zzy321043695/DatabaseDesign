<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>设置我的个人信息</title>
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

</head>

<body>

<div id="wrapper">


	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">

			<a class="navbar-brand" >修改信息</a>
		</div>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">


			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUser1name()?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href="/index.php?c=user&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
					</li>

					<li class="divider"></li>
					<li>
						<a href="/index.php?c=register&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

		<!-- /.navbar-collapse -->
	</nav>
<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">

				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="javascript:void(0)">个人中心</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> 详细信息
					</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-6">

				<form class="form-horizontal" id="singcms-form">
					<div class="form-group">
						<label  class="col-sm-2 control-label">用户名:</label>
						<div class="col-sm-5">
							<?php echo ($vo["username"]); ?>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">真实姓名:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="realname" id="inputPassword3" placeholder="" value="<?php echo ($vo["realname"]); ?>">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">联系电话:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone_number" id="inputPassword4" placeholder="" value="<?php echo ($vo["phone_number"]); ?>">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">家庭住址:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" id="inputPassword5" placeholder="" value="<?php echo ($vo["address"]); ?>">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-2 control-label">邮政编码:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="post_number" id="inputPassword6" placeholder="" value="<?php echo ($vo["post_number"]); ?>">
						</div>
					</div>

					<input type="hidden" name="user_id" value="<?php echo ($vo["user_id"]); ?>"/>


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
		'save_url' : '/index.php?c=user&a=save',
		'jump_url' : '',

	};

</script>
<!-- /#wrapper -->
<script type="text/javascript" src="/Public/js/home/form.js"></script>
<script src="/Public/js/home/common.js"></script>