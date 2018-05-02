<?php /* Smarty version 2.6.30, created on 2018-04-20 07:28:20
         compiled from message.html */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>留言榜</title>

	 <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/message.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body{
		background: #EEF3FA;
	}
	.liuyanub{
		padding-top:20px; 
	}
	.text-center{
		line-height: 30px;
	}
	</style>
	</head>

	<body>
		<div class="container liuyanub">
			<div id="" class="col-md-12">
				<h4 class="text-center">留言榜</h4>
			<?php $_from = $this->_tpl_vars['arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
				<div class="<?php echo $this->_tpl_vars['temp']['class']; ?>
">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="glyphicon glyphicon-tags" style="padding-right: 10px;"></i><?php echo $this->_tpl_vars['temp']['title']; ?>
<small class="pull-right"><i class="glyphicon glyphicon-time"></i><?php echo $this->_tpl_vars['temp']['create_time']; ?>
</small></h3>

					</div>
					<div class="panel-body">
						<?php echo $this->_tpl_vars['temp']['content']; ?>

					</div>
					<div class="panel-footer text-right">
						<button onclick="up('<?php echo $this->_tpl_vars['temp']['id']; ?>
')" type="button" class="btn btn-info btn-xs" aria-label="Left Align">
							<span id="<?php echo $this->_tpl_vars['temp']['id']; ?>
" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"><?php echo $this->_tpl_vars['temp']['up']; ?>
</span>
						</button>
						<button onclick="down('<?php echo $this->_tpl_vars['temp']['id']; ?>
')" type="button" class="btn btn-info btn-xs" aria-label="Left Align">
							<span id="<?php echo $this->_tpl_vars['temp']['id']; ?>
z" class="glyphicon glyphicon-thumbs-down" aria-hidden="true"><?php echo $this->_tpl_vars['temp']['down']; ?>
</span>
						</button>

					</div>
					<!-- List group -->
					<?php if ($this->_tpl_vars['temp']['answer'] != ''): ?>
					<ul class="list-group">
						<li class="list-group-item answer"><strong>管理员：</strong><?php echo $this->_tpl_vars['temp']['answer']; ?>
<small class="pull-right"></small></li>
					</ul>
					<?php endif; ?>
				</div>
				<?php endforeach; endif; unset($_from); ?>

			</div>

			<!-- <div class="col-md-10">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title text-center">最新公告</h3>
					</div>

					<ul class="list-group">
						<?php $_from = $this->_tpl_vars['arr2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
						<div style="margin: 5px;border: inset;background-color: #d6eaea;">
						<div class="panel-body">
							<a href="notice.php?id=<?php echo $this->_tpl_vars['temp']['id']; ?>
"><i class="glyphicon glyphicon-link" style="padding-right: 10px"></i><?php echo $this->_tpl_vars['temp']['title']; ?>
</a>
						</div>
						<li class="list-group-item  text-right">

							<small class="answer"><i class="glyphicon glyphicon-time"></i><?php echo $this->_tpl_vars['temp']['create_time']; ?>
</small></li>
							</div>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div> -->

		</div>
	</body>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
        var xmlhttp;
        if(window.XMLHttpRequest) //XMLHttpRequest 对象用于在后台与服务器交换数据
        {
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		var id2;
        //点赞
        function up(id){
            if(xmlhttp){
                var url = "background/up.php?id="+id;
                //打开请求
                xmlhttp.open("get",url,true);
                //指定回调函数,chuli是函数名
                xmlhttp.onreadystatechange = up2;
                xmlhttp.send();
				id2 = id;
            }
		}
		
		function up2() {
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                var text = xmlhttp.responseText;
                if(text != 'erro'){
                    $(id2).innerHTML=text;
				}
				else{
                    alert('出错了！！！');
				}
			}
            if(xmlhttp.readyState == 4 && xmlhttp.status!=200){
                alert('网络不是很流畅！！！');
            }
        }

        //踩
		function down(id) {
            if(xmlhttp){
                var url = "background/down.php?id="+id;
                //打开请求
                xmlhttp.open("get",url,true);
                //指定回调函数,chuli是函数名
                xmlhttp.onreadystatechange = down2;
                xmlhttp.send();
                id2 = id;
            }
        }

        function down2() {
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                var text = xmlhttp.responseText;
                if(text != 'erro'){
                    $(id2+'z').innerHTML=text;
                }
                else{
                    alert('出错了！！！');
                }
            }
            if(xmlhttp.readyState == 4 && xmlhttp.status!=200){
                alert('网络不是很流畅！！！');
            }
        }

        function $(id) {
            return document.getElementById(id);
        }
	</script>
</html>