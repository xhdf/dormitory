<?php /* Smarty version 2.6.30, created on 2018-04-19 06:56:04
         compiled from notice.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>公告</title>
	</head>
	<style>
		body{
			background: #EEF3FA;
		}
	</style>
	<body>
		<div class="container">
			<div class="page-header">
				<h1 class="text-center"><?php echo $this->_tpl_vars['arr'][0]['title']; ?>
</h1>
				<h5 class="text-center"><?php echo $this->_tpl_vars['arr'][0]['create_time']; ?>
  来源：<?php echo $this->_tpl_vars['arr'][0]['name']; ?>
</h5>
			</div>
			<!--文章容器-->
			<div class="media-body">
				<p>
					<font face="黑体"><br></font>
					<blockquote>&nbsp; &nbsp; &nbsp;
						<font face="楷体"><?php echo $this->_tpl_vars['arr'][0]['content']; ?>
</font>
					</blockquote>
				</p>
			</div>
		</div>
			<script src="js/jquery-3.1.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>

</html>