<?php /* Smarty version 2.6.30, created on 2018-04-21 05:08:15
         compiled from manage_admin.html */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/reset.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/manage.css">
        <link rel="stylesheet" type="text/css" href="css/summernote.css" />
        <script src="./js/jquery-3.1.1.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <title>管理员主页面</title>
 
	</head>
	<body>
	  
		<div class="repair_main_wrap">
            <!--左边栏-->
            <div class="repair_left_wrap">
                <div class="repair_title">学生宿舍管理系统</div>
                <div class="repair_icon"><img src="./css/img/GL_icon.png" alt="图片"></div>
                <div class="repair_name">管理员</div>
                <div class="repair_list_wrap">
                    <a href="#notice" id="notice-tab" role="tab" data-toggle="tab" aria-controls="notice" aria-expanded="true">
                        <div class="repair_item"  <?php if ($this->_tpl_vars['active'] == 1): ?>class="active"<?php endif; ?>>
                            <div class="repair_item_icon1"><img src="./css/img/mark.png" alt=""></div>
                            <div class="repair_item_wz">发布公告</div>
                            <div class="repair_item_icon2"><img src="./css/img/BS_arrow.png" alt=""></div>
                        </div>
                    </a>
                    <a href="#outlate" id="notice-tab" role="tab" data-toggle="tab" aria-controls="outlate" aria-expanded="false">
                        <div class="repair_item"  <?php if ($this->_tpl_vars['active'] == 2): ?>class="active"<?php endif; ?>>
                            <div class="repair_item_icon1"><img src="./css/img/information.png" alt=""></div>
                            <div class="repair_item_wz">晚归登记</div>
                            <div class="repair_item_icon2"><img src="./css/img/BS_arrow.png" alt=""></div>
                        </div>
                    </a>
                    <a href="#repair" id="notice-tab" role="tab" data-toggle="tab" aria-controls="repair" aria-expanded="false">
                        <div class="repair_item"  <?php if ($this->_tpl_vars['active'] == 3): ?>class="active"<?php endif; ?>>
                            <div class="repair_item_icon1"><img src="./css/img/information.png" alt=""></div>
                            <div class="repair_item_wz">信息平台</div>
                            <div class="repair_item_icon2"><img src="./css/img/BS_arrow.png" alt=""></div>
                        </div>
                    </a>
                    <a href="#message" role="tab" id="message-tab" data-toggle="tab" aria-controls="message" aria-expanded="false">
                        <div class="repair_item" <?php if ($this->_tpl_vars['active'] == 4): ?>class="active"<?php endif; ?>>
                            <div class="repair_item_icon1"><img src="./css/img/BS_wxcx_grey.png" alt=""></div>
                            <div class="repair_item_wz">查看留言</div>
                            <div class="repair_item_icon2"><img src="./css/img/BS_arrow.png" alt=""></div>
                        </div>
                    </a>
                    <a href="#info" role="tab" id="userinfo-tab" data-toggle="tab" aria-controls="info" aria-expanded="false">
                        <div class="repair_item" <?php if ($this->_tpl_vars['active'] == 5): ?>class="active"<?php endif; ?>>
                            <div class="repair_item_icon1"><img src="./css/img/announce.png" alt=""></div>
                            <div class="repair_item_wz">用户管理</div>
                            <div class="repair_item_icon2"><img src="./css/img/BS_arrow.png" alt=""></div>
                        </div>
                    </a>
                    <a href="#changepwd" role="tab" id="psd-tab" data-toggle="tab" aria-controls="changepwd" aria-expanded="false">
                        <div class="repair_item" <?php if ($this->_tpl_vars['active'] == 6): ?>class="active"<?php endif; ?>>
                            <div class="repair_item_icon1"><img src="./css/img/register.png" alt=""></div>
                            <div class="repair_item_wz">修改密码</div>
                            <div class="repair_item_icon2"><img src="./css/img/BS_arrow.png" alt=""></div>
                        </div>
                    </a>
                </div>
                <div class="repair_exit_login">
                    <a href="out.php">
                    <sapn class="torrow">
                        < </sapn>退出登录</a></div>
            </div>

            <!--右边栏-->
            <div class="repair_right_wrap">
				<div class="col-md-10 col-sm-10 col-xs-10 col-xm-10 col-lg-10 sidebtab-height bg-info">

					<div id="myTabContent" class="tab-content">
						<!--发布公告tab页-->
						<div role="tabpanel" class="tab-pane fade <?php if ($this->_tpl_vars['active'] == 1): ?>active in<?php endif; ?>" id="notice" aria-labelledby="notice-tab">
							<div class="row tablepadding">
								<div class="navbar-form navbar-right" role="search">
									<button id="notice-draft" class="btn btn-default">保存为草稿</button>
									<button id="notice-send" class="btn btn-default">提交</button>
								</div>

								<div class="row col-md-12">
									<form class="navbar-form">
										<label class="control-label" for="notice-title">公告标题&nbsp;</label>
										<div class="form-group has-feedback">
											<input type="text" id="notice-title" class="form-control title" placeholder="标题" style="width: 300px;">
										</div>
									</form>
								</div>

							</div>
							<div id="note">请编辑你想要发布的内容……</div>
							<div class="row col-md-12">
								<form class="navbar-form navbar-right " role="search" >
									<div class="form-group">
										<input id="search1" name="search1" type="text" class="form-control" placeholder="Search">
									</div>
									<button id="btn_search" type="button" class="btn btn-default">搜索</button>
								</form>
							</div>

							<div id="noticeinfo" class="tablepadding">
								<h4 class="text-center">&nbsp;&nbsp;&nbsp;公告记录</h4>
								<table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>序号</th>
                                        <th>发布人</th>
                                        <th>时间</th>
                                        <th>标题</th>
                                        <th>详情</th>
                                        <th>编辑</th>
                                        <th>删除</th>
                                    </tr>
                                    </thead>
							         <tbody id="article-content">
                                         
                                     </tbody>
									
								</table>
							</div>
							<nav aria-label="Page navigation" class="text-center">
								<ul class="pagination">
									<li data-page="page1" data-page-value="<?php echo $this->_tpl_vars['page1']-1; ?>
" data-search-id="search1" data-type="article">
										<a aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									<?php $_from = $this->_tpl_vars['upPage1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
									<li data-page="page1" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search1" data-type="article"  class="active">
										<a><?php echo $this->_tpl_vars['temp']; ?>
</a>
									</li>
									<?php endforeach; endif; unset($_from); ?>
									<li data-page="page1" data-page-value="<?php echo $this->_tpl_vars['page1']; ?>
" data-search-id="search1" data-type="article">
										<a href="#"><?php echo $this->_tpl_vars['page1']; ?>
</a>
									</li>
									<?php $_from = $this->_tpl_vars['pages1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
									<li data-page="page1" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search1" data-type="article">
										<a><?php echo $this->_tpl_vars['temp']; ?>
</a>
									</li>
									<?php endforeach; endif; unset($_from); ?>
									<li data-page="page1" data-page-value="<?php echo $this->_tpl_vars['page1']+1; ?>
" data-search-id="search1" data-type="article">
										<a aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
                        </div>
                        <!-- 晚归登记 -->
						<div role="tabpane2" class="tab-pane fade <?php if ($this->_tpl_vars['active'] == 2): ?>active in<?php endif; ?>" id="outlate" aria-labelledby="repair-tab">
                            <form action="">
                                <div class="message-title">登记信息资料</div>
                                <div class="message-content-wrap">
                                    <div class="message-content">
                                        <div class="message-content-wz">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号&nbsp;&nbsp;&nbsp; </div>
                                        <div class="message-content-inp">
                                            <input type="text" class="message-content-input" id="info-id" value="" required>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        <div class="message-content-wz">晚归时间&nbsp;&nbsp;&nbsp; </div>
                                        <div class="message-content-inp">
                                            <input type="date" class="message-content-input" id="info-time" value="" required >
                                        </div>
                                    </div>
                                </div>
        
                                <div class="message-btn">
                                    <input type="button" id="info-ok" value="提交" class="message-button">
                                </div>
                            </form>
                        </div>
						<!--信息平台tab页-->
						<div role="tabpane2" class="tab-pane fade <?php if ($this->_tpl_vars['active'] == 3): ?>active in<?php endif; ?>" id="repair" aria-labelledby="repair-tab">
                            <div class="cx-srarch-wrap">
                                <div class="cx-srarch cx-srarch-active sspmcx">宿舍排名查询</div>
                                <div class="cx-srarch sdfcx" id="repair7_div">水电费查询</div>
                                <div class="cx-srarch bxcx" id="repair2_div">报修查询</div>
                                <div class="cx-srarch lxcx">留校查询</div>
                                <div class="cx-srarch wgcx">晚归查询</div>
                                <div class="cx-srarch wgtj">晚归统计</div>
                            </div>
                            <!-- 宿舍排名 -->
                            <div class="sspm">
                                    <div class="navbar-form navbar-left" role="search">
                                            <form id="filter" class="navbar-form navbar-left">
                                             <select id="fil_week" class="week form-control input filter" name="week">
                                                <option value="0" style="display: none;">月次</option>
                                                <option value="1">1月</option>
                                                <option  value="2">2月</option>
                                             </select>
                                             <select  id="fil_year" class="year form-control input filter" name="year">
                                                    <option value="0" style="display: none;">年级</option>
                                                    <option value="2014">14级</option>
                                                    <option value="2015">15级</option>
                                                    <option value="2016">16级</option>
                                                    <option value="2017">17级</option>
                                            </select>
                                            <select  id="fil_department" class="department form-control input filter" name="department">
                                                <option value="0" style="display: none;">系别</option>
                                                <option value="信工系">信工系</option>
                                                <option value="外语系">外语系</option>
                                                <option value="药学系">药学系</option>
                                                <option value="化工系">化工系</option>
                                            </select>
                                            <input class="Excel btn btn-default output" type="button" value="导出Excel" id="btnssExport"/><input type="file" id="outputExcel" style="display: none;"/>
                                            </form>
        
                                            <form class="navbar-form navbar-right" role="search">
                                                <div class="form-group">
        
                                                    <input id="search3" name="search3" type="text" class="form-control" placeholder="请输入宿舍号">
                                                </div>
                                                <button id="btn_search3" type="button" class="btn btn-default">搜索</button>
                                            </form>
                                        </div>
                                    <div id="ranking" class="tablepadding">
                                        <br> <br> <br>
                                        <h4 class="text-center">宿舍排名</h4>
                                        <table class="table table-hover" id="tblssExport">
                                            
                                            <thead>
                                               <tr>
                                                <th>排名</th>
                                                <th>月次</th>
                                                <th>宿舍号</th>
                                                <th>年级</th>
                                                <th>系别</th>
                                                <th>扣分</th>
                                                <th>总分</th>
                                                <th>删除</th>
                                                <th>修改</th>
                                            </tr>
                                            </thead>
                                             <tbody id="repair-content">
                                                 
                                             </tbody>
                                        </table>
                                        
                                    </div>
                                    <nav aria-label="Page navigation" class="text-center">
                                    <ul class="pagination">
                                    <li data-page="page3" data-page-value="<?php echo $this->_tpl_vars['page3']-1; ?>
" data-search-id="search3" data-type="repair">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page3" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search3" data-type="repair" >
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page3" data-page-value="<?php echo $this->_tpl_vars['page3']; ?>
" data-search-id="search3" data-type="repair"  class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page3']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page3" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search3" data-type="repair">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page3" data-page-value="<?php echo $this->_tpl_vars['page3']+1; ?>
" data-search-id="search3" data-type="repair">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                                    </nav>
                                    </div>
                                    <!-- 水电费 -->
                                    <div class="sdf">
                                        <div class="navbar-form navbar-left" role="search">
                                            <form id="sdffilter" class="navbar-form navbar-left">
                                                <button type="button" class="btn btn-default" id="btn_search7_wjf">未缴费</button>
                                                <input class="Excel btn btn-default output" type="button" value="导出Excel" id="btnsdfExport"/>
                                            </form>
                
                                                    <form class="navbar-form navbar-right" role="search">
                                                        <div class="form-group">
                                                            <input id="search7" name="search7" type="text" class="form-control" placeholder="请输入宿舍号">
                                                        </div>
                                                        <button id="btn_search7" type="button" class="btn btn-default">搜索</button>
                                                    </form>
                                                </div>
                                            <div id="" class="tablepadding">
                                                    <br>
                                                    <br>
                                                    <br>
                                                <h4 class="text-center">水电费</h4>
                                                <table class="table table-hover" id="tblsdfExport">
                                                    <thead>
                                                       <tr>
                                                        <th>宿舍号</th>
                                                        <th>费用</th>
                                                        <th>备注</th>
                                                        <th>登记</th>
                                                    </tr>
                                                    </thead>
                                                     <tbody id="repair7-content">
                                                         
                                                     </tbody>

                                                    
                                                </table>
                                            </div>
                                            <nav aria-label="Page navigation" class="text-center">
                                            <ul class="pagination">
                                    <li data-page="page7" data-page-value="<?php echo $this->_tpl_vars['page7']-1; ?>
" data-search-id="search7" data-type="repair7">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage7']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page7" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search7" data-type="repair7" >
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page7" data-page-value="<?php echo $this->_tpl_vars['page7']; ?>
" data-search-id="search7" data-type="repair7" class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page7']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages7']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page7" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search7" data-type="repair7">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page7" data-page-value="<?php echo $this->_tpl_vars['page7']+1; ?>
" data-search-id="search7" data-type="repair7">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                                    </div>
                            <!-- 报修 -->
                            <div class="bx">
                                <div class="row tablepadding">
                                    <button  id="repair_ycl" class="btn btn-default">最新报修</button>
                                    <button id="repair_wcl" class="btn btn-default">未处理</button>
                                    <input class="Excel btn btn-default bxoutput" type="button" id="btnbxExport" value="导出Excel"/>
                                    <form class="navbar-form navbar-right" role="search">
                                        <div class="form-group">
                                            <input id="search2" name="search2" type="text" class="form-control" placeholder="请输入宿舍号">
                                        </div>
                                        <button id="btn_search2" type="button" class="btn btn-default">搜索</button>
                                    </form>
                            
                                </div>

							<div id="repairinfo" class="tablepadding">
								<h4 class="text-center">报修记录</h4>
								<table class="table table-hover" id="tblbxExport">
                                    <thead>
                                        <tr>
                                        <!-- <th>序号</th> -->
                                        <th>宿舍号</th>
                                        <th>联系电话</th>
                                        <th>故障描述</th>
                                        <th>创建时间</th>
                                        <th>维修时间</th>
                                        <th>备注</th>
                                        <th>删除</th>
                                        <th>登记</th>
                                    </tr>
                                    </thead>
                                     <tbody id="repair2-content">
                                         
                                     </tbody>
								</table>
							</div>
							<nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                    <li data-page="page2" data-page-value="<?php echo $this->_tpl_vars['page2']-1; ?>
" data-search-id="search2" data-type="repair2">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page2" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search2" data-type="repair2" >
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page2" data-page-value="<?php echo $this->_tpl_vars['page2']; ?>
" data-search-id="search2" data-type="repair2" class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page2']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page2" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search2" data-type="repair2">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page2" data-page-value="<?php echo $this->_tpl_vars['page2']+1; ?>
" data-search-id="search2" data-type="repair2">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- 留校 -->
                        <div class="lx">
                            <div class="navbar-form navbar-left" role="search">
                                    <form id="liuxiaofilter" class="navbar-form navbar-left">
                                           <select class="year form-control input liuxiaofilter" name="year">
                                               <option value="0" style="display: none;">年级</option>
                                               <option value="2014">14级</option>
                                               <option value="2015">15级</option>
                                               <option value="2016">16级</option>
                                               <option value="2017">17级</option>
                                           </select>
                                           <select class="department form-control input liuxiaofilter" name="department">
                                            <option value="0" style="display: none;">系别</option>
                                            <option value="信工系">信工系</option>
                                            <option value="外语系">外语系</option>
                                            <option value="药学系">药学系</option>
                                            <option value="化工系">化工系</option>
                                        </select>
                                           <input class="Excel btn btn-default liuxiaooutput" type="button" id="btnExport" value="导出Excel"/>
                                    </form>

                                <form class="navbar-form navbar-right" role="search">
                                    <div class="form-group">
                                        <input id="search6" name="search6" type="text" class="form-control" placeholder="请输入学号">
                                    </div>
                                    <button id="btn_search6" type="button" class="btn btn-default">搜索</button>
                                </form>
                            </div>

                            <div id="liuxiaoinfo" class="tablepadding">
                                <br>
                                <br>
                                <br>
								<h4 class="text-center">留校记录</h4>
								<table class="table table-hover" id="tblExport">
                                <thead>
                                        <tr>
                                        <th>姓名</th>
                                        <th>学号</th>
                                        <th>宿舍号</th>
                                        <th>级别</th>
                                        <th>系别</th>
                                        <th>联系电话</th>
                                        <th>登记日期</th>
                                    </tr>
                                    </thead>
                                     <tbody id="repair6-content">
                                         
                                     </tbody>
									
								</table>
                            </div>
                            <nav aria-label="Page navigation" class="text-center">
                                    <ul class="pagination">
                                    <li data-page="page6" data-page-value="<?php echo $this->_tpl_vars['page6']-1; ?>
" data-search-id="search6" data-type="repair6">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page6" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search6" data-type="repair6" >
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page6" data-page-value="<?php echo $this->_tpl_vars['page6']; ?>
" data-search-id="search6" data-type="repair6" class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page6']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page6" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search6" data-type="repair6">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page6" data-page-value="<?php echo $this->_tpl_vars['page6']+1; ?>
" data-search-id="search6" data-type="repair6">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                                </nav>
                        </div> 
                        <!-- 晚归 -->
                        <div class="wg">
                            <div class="navbar-form navbar-left" role="search">
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <input id="search8" name="search8" type="text" class="form-control" placeholder="请输入学号">
                                </div>
                                <button id="btn_search8" type="button" class="btn btn-default">搜索</button>
                            </form>
                        </div>
                        
                        <div id="wginfo" class="tablepadding">
                                <br>
                                <br>
                                <br>
                            <h4 class="text-center">晚归记录</h4>
                            <table class="table table-hover" id="tblwgExport">
                                <thead>
                                        <tr>
                                        <th>姓名</th>
                                        <th>学号</th>
                                        <th>宿舍号</th>
                                        <th>级别</th>
                                        <th>系别</th>
                                        <th>班级</th>
                                        <th>晚归时间</th>
                                    </tr>
                                    </thead>
                                     <tbody id="repair8-content">
                                         
                                     </tbody>
                               
                                
                            </table>
                        </div>
                        <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    <li data-page="page8" data-page-value="<?php echo $this->_tpl_vars['page8']-1; ?>
" data-search-id="search8" data-type="repair8">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage8']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page8" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search8" data-type="repair8" >
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page8" data-page-value="<?php echo $this->_tpl_vars['page8']; ?>
" data-search-id="search8" data-type="repair8" class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page8']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages8']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page8" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search8" data-type="repair8">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page8" data-page-value="<?php echo $this->_tpl_vars['page8']+1; ?>
" data-search-id="search8" data-type="repair8">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--晚归统计-->
                        <div class="wgtj1">
                            <div class="navbar-form navbar-left" role="search">
                                    <form id="liuxiaofilter1" class="navbar-form navbar-left">
                                        <select class="year form-control input liuxiaofilter1 tongji" name="year">
                                            <option value="0" style="display: none;">年级</option>
                                            <option value="2014">14级</option>
                                            <option value="2015">15级</option>
                                            <option value="2016">16级</option>
                                            <option value="2017">17级</option>
                                        </select>
                                        <select class="department form-control input liuxiaofilter1 tongji" name="department">
                                               <option value="0" style="display: none;">系别</option>
                                               <option value="信工系">信工系</option>
                                               <option value="外语系">外语系</option>
                                               <option value="药学系">药学系</option>
                                               <option value="化工系">化工系</option>
                                           </select>
                                       <input class="Excel btn btn-default wgoutput" type="button" id="btnwgExport1" value="导出Excel"/>
                                    </form>

                                <form class="navbar-form navbar-right" role="search">
                                    <div class="form-group">
                                        <input id="search9" name="search9" type="text" class="form-control" placeholder="请输入学号">
                                    </div>
                                    <button id="btn_search9" type="button" class="btn btn-default">搜索</button>
                                </form>
                            </div>

                            <div id="wgtjinfo" class="tablepadding">
                                <br>
                                <br>
                                <br>
                                <h4 class="text-center">晚归统计</h4>
                                <table class="table table-hover" id="tblwgExport1">
                                <thead>
                                        <tr>
                                        <th>姓名</th>
                                        <th>学号</th>
                                        <th>宿舍号</th>
                                        <th>级别</th>
                                        <th>系别</th>
                                        <th>班级</th>
                                        <th>晚归次数</th>
                                    </tr>
                                    </thead>
                                     <tbody id="repair9-content">
                                         
                                     </tbody>
                               
                                
                            </table>
                            </div>
                            <nav aria-label="Page navigation" class="text-center">
                                    <ul class="pagination">
                                    <?php echo $this->_tpl_vars['upPage9']; ?>

                                </ul>
                                
                                </nav>
                        </div>
					</div>
			
						<!--留言管理tab页-->
						<div role="tabpanel" class="tab-pane fade <?php if ($this->_tpl_vars['active'] == 4): ?>active in<?php endif; ?>" id="message" aria-labelledby="message-tab">
							<div class="row tablepadding">
								<!--<form class="navbar-form navbar-left" role="search">-->

									<button id="zxly_btn" class="btn btn-default" type="button">最新留言</button>
									<button id="whf_btn"  type="button" class="btn btn-default">未回复</button>
								<!--</form>-->

								<form class="navbar-form navbar-right" role="search">
									<div class="form-group">

										<input id="search4" name="search4" type="text" class="form-control" placeholder="Search">
									</div>
									<button id="btn_search4" type="button" class="btn btn-default">搜索</button>
								</form>

							</div>

							<div id="paiming" class="tablepadding">
								<h4 class="text-center">留言记录</h4>
								<table class="table table-hover">
                                <thead>
                                        <tr>
                                        <th>序号</th>
                                        <th>姓名</th>
                                        <th>时间</th>
                                        <th>标题</th>
                                        <th>内容</th>
                                        <th>回复</th>
                                        <th>删除</th>

                                    </tr>
                                    </thead>
                                     <tbody id="repair4-content">
                                         
                                     </tbody>
									
									
								</table>
							</div>
							<nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                    <li data-page="page4" data-page-value="<?php echo $this->_tpl_vars['page4']-1; ?>
" data-search-id="search4" data-type="repair4">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page4" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search4" data-type="repair4">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page4" data-page-value="<?php echo $this->_tpl_vars['page4']; ?>
" data-search-id="search4" data-type="repair4"  class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page4']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page4" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search4" data-type="repair4">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page4" data-page-value="<?php echo $this->_tpl_vars['page4']+1; ?>
" data-search-id="search4" data-type="repair4">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
						</div>
						<!--用户管理tab页-->
						<div role="tabpanel" class="tab-pane fade <?php if ($this->_tpl_vars['active'] == 5): ?>active in<?php endif; ?>" id="info" aria-labelledby="info-tab">
							<div class="row tablepadding">
									<button id="btn-gly" type="button" class="btn btn-default">管理员</button>
									<input type="button" id="userinput-btn" class="btn btn-default" value="用户导入"/>
								     <input type="file" id="userinput" style="display: none;"/>
								<form class="navbar-form navbar-right" role="search">
									<div class="form-group">

										<input  id="search5" name="search5" type="text" class="form-control" placeholder="Search">
									</div>
									<button id="btn_search5" type="button" class="btn btn-default">搜索</button>
								</form>

							</div>

							<div id="userinfo" class="tablepadding">
								<h4 class="text-center">用户信息</h4>
								<table class="table table-hover">
                                <thead>
                                        <tr>
                                        <th>序号</th>
                                        <th>学号</th>
                                        <th>姓名</th>
                                        <th>性别</th>
                                        <th>系别</th>
                                        <th>班级</th>
                                        <th>入学年份</th>
                                        <th>宿舍号</th>
                                        <th>密码重置</th>
                                        <th>删除</th>
                                        <th>修改</th>
                                        </tr>
                                    </thead>
                                     <tbody id="repair5-content">
                                         
                                     </tbody>
									
									
								</table>
							</div>
							<nav aria-label="Page navigation" class="text-center">
								<ul class="pagination">
                                    <li data-page="page5" data-page-value="<?php echo $this->_tpl_vars['page5']-1; ?>
" data-search-id="search5" data-type="repair5">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['upPage5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page5" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search5" data-type="repair5" >
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page5" data-page-value="<?php echo $this->_tpl_vars['page5']; ?>
" data-search-id="search5" data-type="repair5" class="active">
                                        <a href="#"><?php echo $this->_tpl_vars['page5']; ?>
</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['pages5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
                                    <li data-page="page5" data-page-value="<?php echo $this->_tpl_vars['temp']; ?>
" data-search-id="search5" data-type="repair5">
                                        <a><?php echo $this->_tpl_vars['temp']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <li data-page="page5" data-page-value="<?php echo $this->_tpl_vars['page5']+1; ?>
" data-search-id="search5" data-type="repair5">
                                        <a aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
							</nav>
						</div>
						<!--修改密码tab页-->
						<div role="tabpanel" class="tab-pane fade <?php if ($this->_tpl_vars['active'] == 6): ?>active in<?php endif; ?>" id="changepwd" aria-labelledby="info-tab">
							<div class="row" style="height: 600px;">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 text-center">

										<form class="form-horizontal" style="margin-top: 100px;">
											<h3 class="col-sm-offset-3">修改密码</h3>
											<div class="form-group has-feedback">
												<div class="row inputmargin" style="margin-top: 10px;">
													<label class="control-label col-sm-3" for="oldpw">旧&nbsp;密&nbsp;码</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="oldpw" placeholder="旧密码" maxlength="15" required>
													</div>
												</div>
												<div class="row inputmargin" style="margin-top: 10px;">
													<label class="control-label col-sm-3" for="newpw1">新&nbsp;密&nbsp;码</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="newpw1" placeholder="新密码" maxlength="15" required>
													</div>
												</div>
												<div class="row inputmargin" style="margin-top: 10px;">
													<label class="control-label col-sm-3" for="newpw2">确认密码</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="newpw2" placeholder="确认密码" maxlength="15" required>
														<div id="checkpw"></div>
													</div>
												</div>
												<div class="row inputmargin col-sm-9 col-sm-offset-3">
													<input type="button"  class="btn btn-default quxg" value="确认修改" onclick="xiugaimima()">
													<!--<button type="submit" class="btn btn-default" onclick="xiugaimima()">确认修改</button>-->
												</div>
											</div>
										</form>
									</div>

								</div>

							</div>
						</div>

					</div>

				</div>
				<!--修改模态框-->
				<div class="modal fade" id="edit">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<a class="close" data-dismiss="modal">×</a>
								<h3>修改记录</h3>
							</div>
								<div class="modal-body">
									<div class="container-fluid">
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group has-feedback l-height">
												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="ranking-dorm">宿舍号</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="ranking-dorm" value="" maxlength="15" required disabled="disabled">
													</div>
												</div>
												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="ranking-Score">扣分</label>
													<div class="col-sm-9">
														<input type="tel" class="form-control" id="ranking-Score" maxlength="15" required>
													</div>
												</div>
												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="ranking-week">周次</label>
													<div class="col-sm-9">
														<input type="tel" class="form-control" id="ranking-week" maxlength="15" required>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a class="ranking btn btn-default" data-dismiss="modal">关闭</a>
									<button id="ranking-ok" type="button" class="btn btn-default">确定</button>
								</div>
						</div>
					</div>
				</div>
				<!--留言内容模态框-->
				<div class="modal fade" id="messagecon">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<a class="close" data-dismiss="modal">×</a>
								<h3 id="messagetitle"></h3>
							</div>
								<div class="modal-body" id="messagecontent">
								</div>
								<div class="modal-footer">
									<a class="btn btn-default " data-dismiss="modal">关闭</a>
								</div>
						</div>
					</div>
				</div>
				<!--回复模态框-->
				<div class="modal fade" id="reply">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<a class="close" data-dismiss="modal">×</a>
								<h3>回复留言</h3>
							</div>
								<div class="modal-body">
									<div class="container-fluid">
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group has-feedback">
												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="messageanswer"></label>
													<div class="col-sm-12">
														<textarea id="messageanswer" class="form-control" rows="3" maxlength="150" required></textarea>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a class="message btn btn-default" data-dismiss="modal">关闭</a>
									<button id="messageanswer-ok" type="submit" class="btn btn-default">确定</button>
								</div>
						</div>
					</div>
				</div>
				<!--用户修改模态框-->
				<div class="modal fade" id="userupdate">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<a class="close" data-dismiss="modal">×</a>
								<h3>修改记录</h3>
							</div>
								<div class="modal-body">
									<div class="container-fluid">
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group has-feedback l-height">
                                                <div class="row inputmargin">
                                                    <label class="control-label col-sm-3" for="user-name" >姓名</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="user-name" value="" required>
                                                    </div>
                                                </div>
												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="user-id">学号</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="user-id" value="" required disabled="disabled">
													</div>
												</div>
                                                <div class="row inputmargin">
                                                        <label class="control-label col-sm-3" for="user-sex" style="">性别</label>
                                                        <div class="col-sm-4">
                                                            <select id="user-sex" class="form-control input">
                                                                <option value="未填写" style="display: none">未填写</option>
                                                                <option value="男">男</option>
                                                                <option value="女">女</option>
                                                            </select>
                                                        </div>
                                                    </div>
												
                                                <div class="row inputmargin">
													<label class="control-label col-sm-3" for="user-department">系别</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user-department" value="" maxlength="15" required>
													</div>
												</div>
												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="user-class">班级</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user-class" value="" maxlength="15" required>
													</div>
												</div>

												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="user-year">入学年份</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" id="user-year" value="" style="padding-right:0px;" required>
													</div>
												</div>
												<div class="row inputmargin">
													<label class="control-label col-sm-2" for="user-dorm">宿舍号</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="user-dorm" vale="" maxlength="15" required>
													</div>
												</div>

												<div class="row inputmargin">
													<label class="control-label col-sm-3" for="user-power">用户权限</label>
													<label class="col-sm-9">
                                                       <input id="user-power" class="user-power" value="1" type="checkbox">管理员
                                                    </label>
												</div>

											</div>

										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a class="user btn btn-default" data-dismiss="modal">关闭</a>
									<button id="user-ok" type="button" class="btn btn-default">确定</button>
								</div>
						</div>
					</div>
				</div>
				<!---->
			</div>
		</div>
    </body>
    <script type="text/x-dot-template" id="article-tpl">
        {{for(var x in it){ }}
                                    <tr>
                                        <th scope="row">{{=it[x].top}}</th>
                                        <td>{{=it[x].name}}</td>
                                        <td>{{=it[x].create_time}}</td>
                                        {{if(it[x].state==1){}}
                                        
                                        <td>(草稿) {{=it[x].title}}</td>
                                        {{ }else{ }}
                                        <td>{{=it[x].title}}</td>
                                        {{ } }}
                                        <td>
                                            <a href="notice.php?id={{=it[x].id}}" class="glyphicon glyphicon-list-alt" data-toggle="modal"></a>
                                        </td>
                                        <td>
                                            <a href="" class="editor glyphicon glyphicon-pencil notice" data-toggle="modal" data="{{=it[x].id}}"></a>
                                        </td>
                                        <td>
                                            <a class="del glyphicon glyphicon-remove notice" data="{{=it[x].id}}"> </a>
                                        </td>
                                    </tr>
        {{ } }}
    </script>
    <script type="text/x-dot-template" id="repair-tpl">

                                            {{for(var x in it){ }}
                                            <tr>
                                                <th scope="row">{{=it[x].top}}</th>
                                                <td>{{=it[x].weekly}}</td>
                                                <td>{{=it[x].dormitory}}</td>
                                                <td>{{=it[x].year}}</td>
                                                <td>{{=it[x].department}}</td>
                                                <!-- <td><?php echo $this->_tpl_vars['temp']['sex']; ?>
</td> -->
                                                <td>{{=it[x].points}}</td>
                                                <td>{{=it[x].num}}</td>
                                                <td>
                                                    <a class="del glyphicon glyphicon-remove ranking" data="{{=it[x].id}}"></a>
                                                </td>
                                                <td>
                                                    <a href="#edit" class="edit glyphicon glyphicon-pencil ranking" data-toggle="modal" data="{{=it[x].id}}"></a>
                                                </td>
                                            </tr>
                            {{ } }}
    </script>
      <script type="text/x-dot-template" id="repair2-tpl">

                                            {{for(var x in it){ }}

                                    <tr>
                                        <!-- <th scope="row">{{=it[x].top}}</th> -->
                                        <td>{{=it[x].dormitory}}</td>
                                        <td>{{=it[x].phone}}</td>
                                        <td>{{=it[x].content}}</td>
                                        <td>{{=it[x].create_time}}</td>
                                        <td>{{=it[x].repair_time}}</td>
                                        <td>
                                        {{if(it[x].yon==1){}}
                                            已修
                                        {{ }else{ }}
                                            未修
                                        {{ } }}
                                            
                                            <!--<a href="#edit" class="glyphicon glyphicon-pencil repair" data-toggle="modal" data="<?php echo $this->_tpl_vars['temp']['id']; ?>
"></a>-->
                                        </td>
                                        <td>
                                            <a class="del glyphicon glyphicon-remove repair" data="{{=it[x].id}}"></a>
                                        </td>
                                        
                                        <td>
                                            {{if(it[x].yon==1){}}
                                                <a class="enregister glyphicon glyphicon-ok repair gray" data="{{=it[x].id}}"></a>
                                            {{ }else{ }}
                                                <a class="enregister glyphicon glyphicon-ok repair" data="{{=it[x].id}}"></a>
                                            {{ } }}
                                        </td>
                                        
                                    </tr>
                            {{ } }}
    </script>

    <script type="text/x-dot-template" id="repair7-tpl">
    {{for(var x in it){ }}
                                                    <tr>
                                                        <td>{{=it[x].dormitory}}</td>
                                                        <td>{{=it[x].pay}}</td>
                                                        <td>
                                                            {{if(it[x].state==1){}}
                                            已缴
                                        {{ }else{ }}
                                            未缴
                                        {{ } }}
                                                        </td>
                                                        <td>
                                                        {{if(it[x].state==1){}}
                                            <a class="enregister glyphicon glyphicon-ok cost gray" data="{{=it[x].id}}"></a>
                                        {{ }else{ }}
                                            <a class="enregister glyphicon glyphicon-ok cost" data="{{=it[x].id}}"></a>
                                        {{ } }}
                                                            
                                                        </td>
                                                    </tr>
                            {{ } }}
    </script>
    
    <script type="text/x-dot-template" id="repair4-tpl">
    {{for(var x in it){ }}

                                    <tr>
                                        <th scope="row">{{=it[x].top}}</th>
                                        <td>{{=it[x].username}}</td>
                                        <!-- <td>{{=it[x].phone}}</td> -->
                                        <td>{{=it[x].create_time}}</td>
                                        <td>{{=it[x].title}}</td>
                                        <td>
                                            <a href="#messagecon" class="show glyphicon glyphicon-list-alt message" data-toggle="modal" data="{{=it[x].id}}"></a>
                                        </td>
                                        <td>
                                            <a href="#reply" class="reply glyphicon glyphicon-comment message" data-toggle="modal" data="{{=it[x].id}}"></a>
                                        </td>
                                        <td>
                                            <a class="del glyphicon glyphicon-remove message" data="{{=it[x].id}}" data="{{=it[x].id}}"></a>
                                        </td>id

                                    </tr>
                            {{ } }}
    </script>
    <script type="text/x-dot-template" id="repair5-tpl">
    {{for(var x in it){ }}
                                    <tr>
                                        <th scope="row">{{=it[x].top}}</th>
                                        <td>{{=it[x].no}}</td>
                                        <td>{{=it[x].username}}</td>
                                        {{if(it[x].sex != null){}}
                                            <td>{{=it[x].sex}}</td>
                                        {{ }else{ }}
                                            <td>未填写</td>
                                        {{ } }}
                                        {{if(it[x].department != null){}}
                                            <td>{{=it[x].department}}</td>
                                        {{ }else{ }}
                                            <td>未填写</td>
                                        {{ } }}
                                        {{if(it[x].class != null){}}
                                            <td>{{=it[x].class}}</td>
                                        {{ }else{ }}
                                            <td>未填写</td>
                                        {{ } }}
                                        {{if(it[x].dates != null){}}
                                            <td>{{=it[x].dates}}</td>
                                        {{ }else{ }}
                                            <td>未填写</td>
                                        {{ } }}
                                        {{if(it[x].dormitory != null){}}
                                            <td>{{=it[x].dormitory}}</td>
                                        {{ }else{ }}
                                            <td>未填写</td>
                                        {{ } }}
                                        <td>
                                            <a id="reset" class="reset glyphicon glyphicon-refresh" data="{{=it[x].id}}"></a>
                                        </td>
                                        <td>
                                            <a class="del glyphicon glyphicon-remove user" data="{{=it[x].id}}"></a>
                                        </td>
                                        <td>
                                            <a href="#userupdate" class="update glyphicon glyphicon-comment user" data-toggle="modal" data="{{=it[x].id}}" power="{{=it[x].power}}"></a>
                                        </td>
                                    </tr>
                                    
                            {{ } }}
    </script>
    <script type="text/x-dot-template" id="repair8-tpl">
    {{for(var x in it){ }}
                                <tr>
                                    <td>{{=it[x].username}}</td>  
                                    <td>{{=it[x].no}}</td>
                                    <td>{{=it[x].dormitory}}</td>
                                    <td>{{=it[x].year}}</td>
                                    <td>{{=it[x].department}}</td>
                                    <td>{{=it[x].class}}</td>
                                    <td>{{=it[x].time}}</td>
                                </tr>
                            {{ } }}
    </script>
    <script type="text/x-dot-template" id="repair6-tpl">
    {{for(var x in it){ }}
                                    <tr>
                                        <td>{{=it[x].username}}</td>   
                                        <td>{{=it[x].no}}</td>
                                        <td>{{=it[x].dormitory}}</td>
                                        <td>{{=it[x].year}}</td>
                                        <td>{{=it[x].department}}</td>
                                        <td>{{=it[x].phone}}</td>
                                        <td>{{=it[x].date}}</td>
                                    </tr>
                                    
                            {{ } }}
    </script>

    <script type="text/x-dot-template" id="repair9-tpl">
    {{for(var x in it){ }}
                                <tr>
                                    <td>{{=it[x].username}}</td>
                                    <td>{{=it[x].no}}</td>
                                    <td>{{=it[x].dormitory}}</td>
                                    <td>{{=it[x].year}}</td>
                                    <td>{{=it[x].department}}</td>
                                    <td>{{=it[x].class}}</td>
                                    <td>{{=it[x].counts}}</td>
                                </tr>
                            {{ } }}
    </script>


                                    
   
    <script src="js/layer.min.js"></script>
    <script src="js/doT.min.js"></script>
    <script src="js/summernote.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/summernote-zh-CN.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.table2excel.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    var log=console.log.bind("console")
    $(".sspmcx").click(function(){
			$(".sspm").css("display","block");
			$(".sdf").css("display","none");
			$(".bx").css("display","none");
            $(".lx").css("display","none");
			$(".wg").css("display","none");
            $(".wgtj1").css("display","none");
			$(".sspmcx").addClass("cx-srarch-active");
			$(".sdfcx").removeClass("cx-srarch-active");
			$(".bxcx").removeClass("cx-srarch-active");
			$(".wgcx").removeClass("cx-srarch-active");
            $(".lxcx").removeClass("cx-srarch-active");
            $(".wgtj").removeClass("cx-srarch-active");
		})
		$(".bxcx").click(function(){
			$(".sspm").css("display","none");
			$(".sdf").css("display","none");
			$(".bx").css("display","block");
			$(".wg").css("display","none");
            $(".lx").css("display","none");
            $(".wgtj1").css("display","none");
            $(".lxcx").removeClass("cx-srarch-active");
			$(".sspmcx").removeClass("cx-srarch-active");
			$(".bxcx").addClass("cx-srarch-active");
			$(".sdfcx").removeClass("cx-srarch-active");
			$(".wgcx").removeClass("cx-srarch-active");
            $(".wgtj").removeClass("cx-srarch-active");
		})
		$(".sdfcx").click(function(){
			$(".sspm").css("display","none");
			$(".sdf").css("display","block");
			$(".bx").css("display","none");
			$(".wg").css("display","none");
            $(".lx").css("display","none");
            $(".wgtj1").css("display","none");
            $(".lxcx").removeClass("cx-srarch-active");
			$(".sspmcx").removeClass("cx-srarch-active");
			$(".bxcx").removeClass("cx-srarch-active");
			$(".sdfcx").addClass("cx-srarch-active");
			$(".wgcx").removeClass("cx-srarch-active");
            $(".wgtj").removeClass("cx-srarch-active");
		})
		$(".wgcx").click(function(){
			$(".sspm").css("display","none");
			$(".sdf").css("display","none");
			$(".bx").css("display","none");
			$(".wg").css("display","block");
            $(".lx").css("display","none");
            $(".wgtj1").css("display","none");
            $(".lxcx").removeClass("cx-srarch-active");
			$(".sspmcx").removeClass("cx-srarch-active");
			$(".bxcx").removeClass("cx-srarch-active");
			$(".sdfcx").removeClass("cx-srarch-active");
			$(".wgcx").addClass("cx-srarch-active");
            $(".wgtj").removeClass("cx-srarch-active");
		})
        $(".lxcx").click(function(){
			$(".sspm").css("display","none");
			$(".sdf").css("display","none");
			$(".bx").css("display","none");
			$(".wg").css("display","none");
            $(".lx").css("display","block");
            $(".wgtj1").css("display","none");
            $(".lxcx").addClass("cx-srarch-active");
			$(".sspmcx").removeClass("cx-srarch-active");
			$(".bxcx").removeClass("cx-srarch-active");
			$(".sdfcx").removeClass("cx-srarch-active");
			$(".wgcx").removeClass("cx-srarch-active");
            $(".wgtj").removeClass("cx-srarch-active");
		})
        $(".wgtj").click(function(){
            $(".sspm").css("display","none");
            $(".sdf").css("display","none");
            $(".bx").css("display","none");
            $(".wg").css("display","none");
            $(".lx").css("display","none");
            $(".wgtj1").css("display","block");
            $(".lxcx").removeClass("cx-srarch-active");
            $(".sspmcx").removeClass("cx-srarch-active");
            $(".bxcx").removeClass("cx-srarch-active");
            $(".sdfcx").removeClass("cx-srarch-active");
            $(".wgcx").removeClass("cx-srarch-active");
            $(".wgtj").addClass("cx-srarch-active");
        })
        $(document).ready(function() {
            //导出留校表格
            $("#btnExport").click(function () {
                $("#tblExport").table2excel({
                    exclude  : ".noExl", //过滤位置的 css 类名
                    filename : "留校名单"  + ".xls" //文件名称
                });
            });
        //导出宿舍排名表格
        $("#btnssExport").click(function () {
            $("#tblssExport").table2excel({
                exclude  : ".noExl", //过滤位置的 css 类名
                filename : "宿舍排名名单"+ ".xls" //文件名称
            });
        });
         //导出水电费表格
         $("#btnsdfExport").click(function () {
            $("#tblsdfExport").table2excel({
                exclude  : ".noExl", //过滤位置的 css 类名
                filename : "水电费"+ ".xls" //文件名称
            });
        });
          //导出晚归表格
        $("#btnwgExport").click(function () {
            $("#tblwgExport").table2excel({
                exclude  : ".noExl", //过滤位置的 css 类名
                filename : "晚归纪录"+ ".xls" //文件名称
            });
        });
          //导出晚归表格
        $("#btnwgExport1").click(function () {
            $("#tblwgExport1").table2excel({
                exclude  : ".noExl", //过滤位置的 css 类名
                filename : "晚归统计"+ ".xls" //文件名称
            });
        });
          //导出报修表格
          $("#btnbxExport").click(function () {
            $("#tblbxExport").table2excel({
                exclude  : ".noExl", //过滤位置的 css 类名
                filename : "报修纪录"+ ".xls" //文件名称
            });
        });
        //提交晚归登记信息
        $("#info-ok").click(function () {
            if ($("#info-id").val() == "" || $("#info-time").val() == "") {
                layer.msg("请填写每一项！");
            }
            else {
                $.ajax({
                    url: "background/save.php?id=6",
                    type: 'POST',
                    data: {
                        no: $("#info-id").val(),
                        time: $("#info-time").val(),
                    },
                    success: function (result) {
                        // var result = $.parseJSON(r);

                        if (result == 1)//判断0还是1
                        {
                            layer.msg("提交成功！");
                        }
                        else {
                            layer.msg(result);
                        }

                    },
                    error: function () {
                        layer.msg("数据发送失败，请检查网络链接！");
                    }
                });
            }

        });
            $('#note').summernote({
                height: 300,
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false, // set focus to editable area after initializing summernote
                lang: 'zh-CN', // default: 'en-US'
                fontNames: ['宋体', '微软雅黑', '黑体', '楷体', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            //公告保存为草稿
            $(document).on("click","#notice-draft",function(){
                var markupStr = $('#note').summernote('code');
                log(markupStr)
                if (markupStr&&$("#notice-title").val()!=""){
                    $.ajax({
                        url:"background/save.php?id=4",
                        type: 'POST',
                        data: {
                            title: $("#notice-title").val(),
                            content:markupStr,
                        },
                        success: function(result) {
                            if(result==1)//判断0还是1
                            {
                                layer.msg("提交成功！");
                                history.go(0);
                            }
                            else
                            {
                                layer.msg(result);
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                }else
                {
                    layer.msg("内容和标题不能为空!");
                }

            });
            //公告提交发布
            $(document).on("click","#notice-send",function(){
                var markupStr = $('#note').summernote('code');
                if (markupStr&&$("#notice-title").val()!=""){
                    $.ajax({
                        url:"background/save.php?id=3",
                        type: 'POST',
                        data: {
                            title: $("#notice-title").val(),
                            content:markupStr,
                        },
                        success: function(result) {
                            if(result==1)//判断0还是1
                            {
                                layer.msg("提交成功！");
                                history.go(0);
                            }
                            else
                            {
                                layer.msg(result);
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                }else
                {
                    layer.msg("内容和标题不能为空!");
                }

            });

                //删除公告
                $(document).on("click",".del.glyphicon.glyphicon-remove.notice",function(){
                    var obj = $(this);
                    var id = $(this).attr("data");
                    layer.msg('你确定删除吗？', {
                        time: 0, //不自动关闭
                        btn: ['确定', '取消'],
                        yes: function(index) {
                            $.ajax({
                                url:"background/delete.php",
                                type: 'GET',
                                data: {
                                    id: id,
                                    table: "notice"

                                },
                                success: function(result) {
                                    if(result==1)//判断0还是1
                                    {
                                        layer.msg("提交成功！");
                                        obj.parent().parent().remove();
                                    }
                                    else
                                    {
                                        layer.msg(result);
                                    }

                                },
                                error:  function(){
                                    layer.msg("数据发送失败，请检查网络链接！");
                                }
                            });
                            layer.close(index);
                        }
                    });
                });
                //编辑公告
                $(document).on("click",".editor.glyphicon.glyphicon-pencil.notice",function(){
                    $.ajax({
                        url:"background/select.php",
                        type: 'GET',
                        data: {
                            table: "notice",
                            id: $(this).attr("data")
                        },
                        success: function(r) {
                            var result = $.parseJSON(r);
                            if(result.result)//判断0还是1
                            {
                                $('#note').summernote('code',result.content);
                                $("#notice-title").val(result.title);
                            }
                            else
                            {
                                layer.msg(result.result);
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                });

                //删除报修信息
                $(document).on("click",".del.glyphicon.glyphicon-remove.repair",function(){
                    var obj = $(this);
                    var id = $(this).attr("data");
                    layer.msg('你确定删除吗？', {
                        time: 0, //不自动关闭
                        btn: ['确定', '取消'],
                        yes: function(index) {
                            $.ajax({
                                url:"background/delete.php",
                                type: 'GET',
                                data: {
                                    table: "repair",
                                    id: id
                                },
                                success: function(result) {
                                    if(result==1)//判断0还是1
                                    {
                                        layer.msg("提交成功！");
                                        obj.parent().parent().remove();
                                    }
                                    else
                                    {
                                        layer.msg(result);
                                    }

                                },
                                error:  function(){
                                    layer.msg("数据发送失败，请检查网络链接！");
                                }
                            });
                            layer.close(index);
                        }
                    });
                });
                //报修登记
                $(document).on("click",".enregister.glyphicon.glyphicon-ok.repair",function(){
                    $.ajax({
                        url:"background/update.php",
                        type: 'GET',
                        data: {
                            table:"repair",
                            id: $(this).attr("data")
                        },
                        success: function(r) {
                            var result = $.parseJSON(r);
                            if(result.result)//判断0还是1
                            {
                                layer.msg("提交成功！");
                            }
                            else
                            {
                                layer.msg(result.mes);
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                });


                
                //水电费登记enregister glyphicon glyphicon-ok cost
                $(document).on("click",".enregister.glyphicon.glyphicon-ok.cost",function(){
                    $.ajax({
                        url:"background/update.php",
                        type: 'GET',
                        data: {
                            table:"cost",
                            id: $(this).attr("data")
                        },
                        success: function(r) {
                            var result = $.parseJSON(r);
                            console.log(result);
                            if(result.result)//判断0还是1
                            {
                                layer.msg("登记成功！");
                            }
                            else
                            {
                                layer.msg(result.mes);
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                });

                //删除留言信息
                $(document).on("click",".del.glyphicon.glyphicon-remove.message",function(){
                    var obj = $(this);
                    var id = $(this).attr("data");
                    layer.msg('你确定删除吗？', {
                        time: 0, //不自动关闭
                        btn: ['确定', '取消'],
                        yes: function(index) {
                            $.ajax({
                                url:"background/delete.php",
                                type: 'GET',
                                data: {
                                    table: "message",
                                    id: id
                                },
                                success: function(result) {
                                    if(result==1)//判断0还是1
                                    {
                                        layer.msg("提交成功！");
                                        obj.parent().parent().remove();
                                    }
                                    else
                                    {
                                        layer.msg(result);
                                    }

                                },
                                error:  function(){
                                    layer.msg("数据发送失败，请检查网络链接！");
                                }
                            });
                            layer.close(index);
                        }
                    });
                });
                //查看留言
                $(document).on("click",".show.glyphicon.glyphicon-list-alt.message",function(){
                    var obj = $(this);
                    var id = obj.attr("data");
                            $.ajax({
                                url:"background/select.php",
                                type: 'GET',
                                data: {
                                    table: "message",
                                    id: id
                                },
                                success: function(r) {
                                    var result = $.parseJSON(r);
                                    log(r)
                                    if(result.result)//判断0还是1
                                    {
                                        $("#messagetitle").text(result.title);
                                        $("#messagecontent").text(result.content);
                                        
                                    }
                                    else
                                    {
                                        layer.msg(result.result);
                                    }

                                },
                                error:  function(){
                                    layer.msg("数据发送失败，请检查网络链接！");
                                }
                            });
                });


            //删除宿舍排名评分
            $(document).on("click",".del.glyphicon.glyphicon-remove.ranking",function(){
                var obj = $(this);
                var id = $(this).attr("data");
                layer.msg('你确定删除吗？', {
                    time: 0, //不自动关闭
                    btn: ['确定', '取消'],
                    yes: function(index) {
                        $.ajax({
                            url:"background/delete.php",
                            type: 'GET',
                            data: {
                                table: "grade",
                                id: id
                            },
                            success: function(result) {
                                if(result==1)//判断0还是1
                                {
                                    layer.msg("提交成功！");
                                    obj.parent().parent().remove();
                                }
                                else
                                {
                                    layer.msg(result);
                                }

                            },
                            error:  function(){
                                layer.msg("数据发送失败，请检查网络链接！");
                            }
                        });
                        layer.close(index);
                    }
                });
            });

            //修改宿舍排名评分
            var ranking_id;
            var ranking_obj;
            $(document).on("click",".edit.glyphicon.glyphicon-pencil.ranking",function(){
                ranking_obj = $(this);
                ranking_id = $(this).attr("data");
                var week = ranking_obj.parent().siblings().eq(1).text();
                var dorm = ranking_obj.parent().siblings().eq(2).text();
                var Points = ranking_obj.parent().siblings().eq(6).text();
                $("#ranking-week").val(week);
                $("#ranking-Score").val(Points);
                $("#ranking-dorm").val(dorm);
            })
            //提交修改信息
            $(document).on("click","#ranking-ok",function(){
                var obj = $(this);
                var id = ranking_id;
                if($("#ranking-week").val()==""||$("#ranking-Score").val()==""||$("#ranking-Score").val()==""){
                    layer.msg("不能为空哦！");
                }
                else
                {
                    $.ajax({
                        url:"background/update.php",
                        type: 'GET',
                        data: {
                            table: "grade",
                            id: id,
                            points: $("#ranking-Score").val(),
                            weekly: $("#ranking-week").val()
                        },
                        success: function(r) {
                            var result = $.parseJSON(r);
                            if(result.result)//判断0还是1
                            {
                                layer.msg("修改成功！");
                                ranking_obj.parent().siblings().eq(1).text(result.weekly);
                                ranking_obj.parent().siblings().eq(2).text(result.dormitory);
                                ranking_obj.parent().siblings().eq(6).text(result.points);
                                $(".ranking.btn.btn-default").click();
                            }
                            else
                            {
                                layer.msg("修改失败！");
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                }
                });

                 //重置密码
                 $(document).on("click","#reset",function(){
                var obj = $(this);
                layer.msg('你确定重置吗？', {
                    time: 0, //不自动关闭
                    btn: ['确定', '取消'],
                    yes: function(index) {
                        $.ajax({
                            url:"background/update.php",
                            type: 'GET',
                            data: {
                                table:"users",
                                id: obj.attr("data")
                            },
                            success: function(r) {
                                 var result = $.parseJSON(r);
                                if(result.result)//判断0还是1
                                {
                                    layer.msg("重置成功！");
                                }
                                else
                                {
                                    layer.msg("重置失败");
                                }

                            },
                            error:  function(){
                                layer.msg("数据发送失败，请检查网络链接！");
                            }
                        });
                        layer.close(index);
                    }
                });
            });
            //删除用户
            $(document).on("click",".del.glyphicon.glyphicon-remove.user",function(){
                var id = $(this).attr("data");
                layer.msg('你确定删除吗？', {
                    time: 0, //不自动关闭
                    btn: ['确定', '取消'],
                    yes: function(index) {
                        $.ajax({
                            url:"background/delete.php",
                            type: 'GET',
                            data: {
                                table: "users",
                                id: id
                            },
                            success: function(result) {
                                if(result==1)//判断0还是1
                                {
                                    layer.msg("提交成功！");
                                    obj.parent().parent().remove();
                                }
                                else
                                {
                                    layer.msg(result);
                                }

                            },
                            error:  function(){
                                layer.msg("数据发送失败，请检查网络链接！");
                            }
                        });
                        layer.close(index);
                    }
                });
            });
            //获取用户id
            var user_id;
            var user_obj;
            $(document).on("click",".update.glyphicon.glyphicon-comment.user",function(){
                user_obj = $(this);
                user_id = $(this).attr("data");
                var power = $(this).attr("power");
                var id = user_obj.parent().siblings().eq(1).text();
                var name = user_obj.parent().siblings().eq(2).text();
                var sex = user_obj.parent().siblings().eq(3).text();
                var department = user_obj.parent().siblings().eq(4).text();
                var clas = user_obj.parent().siblings().eq(5).text();
                var date = user_obj.parent().siblings().eq(6).text();
                var dorm = user_obj.parent().siblings().eq(7).text();
                // var phone = user_obj.parent().siblings().eq(8).text();
                log(dorm)
                $("#user-id").val(id);
                $("#user-name").val(name);
                $("#user-sex").val(sex);
                $("#user-dorm").val(dorm);
                $("#user-department").val(department);
                $("#user-class").val(clas);
                $("#user-year").val(date);
                // $("#user-class").val(classname);
                if(power == "1")
                {
                    $(".user-power").each(function(){
                        this.checked=true
                    });
                }
                else{
                    $(".user-power").each(function(){
                        this.checked= false
                    });
                }

            });
            //修改用户信息
            $(document).on("click","#user-ok",function(){
                if($("#user-id").val()==""||$("#user-name").val()==""||$("#user-class").val()==""||$("#user-department").val()==""||$("#user-sex").val()==""||$("#user-dorm").val()==""||$("#user-power").val()=="")
                {
                    layer.msg("请填写每一项哦!");
                }else{
                    var powerval;
                    if($("#user-power").is(':checked')){
                        powerval = 1;
                    }
                    else
                    {
                        powerval = 0;
                    }
                    log($("#user-dorm").val())
                    $.ajax({
                        url:"background/update.php",
                        type: 'GET',
                        data: {
                            table: "users",
                            id: user_id,
                            no: $("#user-id").val(),
                            username: $("#user-name").val(),
                            class: $("#user-class").val(),
                            dates: $("#user-year").val(),
                            sex: $("#user-sex").val(),
                            department:$("#user-department").val(),
                            dormitory: $("#user-dorm").val(),
                            power: powerval
                        },
                        success: function(r) {
                            var result = $.parseJSON(r);
                            if(result.result)//判断0还是1
                            {
                                layer.msg("提交成功！");
                                $(".user.btn.btn-default").click();
                            }
                            else
                            {
                                layer.msg(result.mes);
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });

                }
            });

            //回复获取id
            var message_id;
            $(document).on("click",".reply.glyphicon.glyphicon-comment.message",function(){
                message_id = $(this).attr("data");
                })
            //回复留言
            $(document).on("click","#messageanswer-ok",function(){
                $.ajax({
                    url:"background/update.php",
                    type: 'GET',
                    data: {
                        table: "message",
                        answer: $("#messageanswer").val(),
                        id: message_id
                    },
                    success: function(r) {
                        var result = $.parseJSON(r);
                        if(result.result)//判断0还是1
                        {
                            layer.msg("修改成功！");
                            $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("修改失败！");
                        }

                    },
                    error:  function(){
                        layer.msg("数据发送失败，请检查网络链接！");
                    }
                });

            });

            //搜索公告页
            $(document).on("click","#btn_search",function(){
                // var search=$("#search1").val();
                getData({
                        search1:$("#search1").val(),
                        type:'ajax',
                        module:'article'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#article-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#article-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });
            $("#search1").val("");
            $("#btn_search").click();

           
            //留言记录
            $(document).on("click","#btn_search4",function(){
                // $("#btn_search4").click(function(){
                // var search=$("#search1").val();
                getData({
                        search4:$("#search4").val(),
                        type:'ajax',
                        // active:4,
                        module:'repair4'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);

                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair4-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair4-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            // });
            
            }); 
            $("#search4").val("");
            $("#btn_search4").click();



            $(document).on("click","#btn_search2",function(){
                // var search=$("#search1").val();
                getData({
                        search2:$("#search2").val(),
                        type:'ajax',
                        // active:2,
                        module:'repair2'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair2-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair2-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });
                $("#search2").val("");
                $("#btn_search2").click();

            $(document).on("click","#btn_search5",function(){
                // var search=$("#search1").val();
                getData({
                        search5:$("#search5").val(),
                        type:'ajax',
                        // active:2,
                        module:'repair5'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair5-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair5-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });

                $("#search5").val("");
                $("#btn_search5").click();


            $(document).on("click","#btn_search6",function(){
                // var search=$("#search1").val();
                getData({
                        search6:$("#search6").val(),
                        type:'ajax',
                        // active:2,
                        module:'repair6'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair6-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair6-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });

                $("#search6").val("");
                $("#btn_search6").click();

            $(document).on("click","#btn_search7",function(){
                // var search=$("#search1").val();
                getData({
                        search7:$("#search7").val(),
                        type:'ajax',
                        // active:7,
                        module:'repair7'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        //console.log(JSON.stringify(retObj));
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair7-tpl").text());
                            var temStr=tem(retObj.data);
                            // console.log(temStr);
                            $("#repair7-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    });
            });
                $("#search7").val("");
                $("#btn_search7").click();
           

             $(document).on("click","#btn_search8",function(){
                // var search=$("#search1").val();
                getData({
                        search8:$("#search8").val(),
                        type:'ajax',
                        // active:7,
                        module:'repair8'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair8-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair8-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });
                $("#search8").val("");
                $("#btn_search8").click();

            
                $(document).on("click","#btn_search9",function(){
                // var search=$("#search1").val();
                getData({
                        search9:$("#search9").val(),
                        type:'ajax',
                        // active:7,
                        module:'repair9'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair9-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair9-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });
                $("#search9").val("");
                $("#btn_search9").click();



            //搜索信息平台
            $("#btn_search3").click(function(){
                // var search=$("#search1").val();
                $.ajax({
                    url:"manage_admin.php",
                    type: 'GET',
                    datatype:"json",
                    data: {
                        search3:$("#search3").val(),
                        // active:3,
                        type:'ajax',
                        module:'repair'
                    },
                    success: function(r) {
                    
                        var retObj=JSON.parse(r);

                    
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    },
                    error:  function(){
                        layer.msg("数据发送失败，请检查网络链接！");
                    }
                });

            });
            $("#search3").val("");
            $("#btn_search3").click();
        });


            //过滤评分
              //初始化
            //   宿舍排名
            var sortweek= <?php if ($this->_tpl_vars['week'] != ''): ?><?php echo $this->_tpl_vars['week']; ?>
<?php else: ?>0<?php endif; ?>,sortyear = <?php if ($this->_tpl_vars['year'] != ''): ?>"<?php echo $this->_tpl_vars['year']; ?>
"<?php else: ?>0<?php endif; ?>,sortdepartment = <?php if ($this->_tpl_vars['department'] != ''): ?>"<?php echo $this->_tpl_vars['department']; ?>
"<?php else: ?>0<?php endif; ?>,sortsex =  <?php if ($this->_tpl_vars['sex'] != ''): ?>"<?php echo $this->_tpl_vars['sex']; ?>
"<?php else: ?>0<?php endif; ?>,sortpoints = 0,sortsort = <?php if ($this->_tpl_vars['sort'] != ''): ?>"<?php echo $this->_tpl_vars['sort']; ?>
"<?php else: ?>0<?php endif; ?>;


            $(".week.form-control.input.filter").val(sortweek);
            $(".year.form-control.input.filter").val(sortyear);
            $(".department.form-control.input.filter").val(sortdepartment);
            $(".sex.form-control.input.filter").val(sortsex);
            $(".points.form-control.input.filter").val(sortpoints);
            $(".sort.form-control.input.filter").val(sortsort);
            //选择框改变事件
            $(".form-control.input.filter").change(function(){
                        // $("#filter").submit();
                        var $fil=$(this);
                        var data=$fil.attr('name');
                        var str=$("#fil_"+data).val();
                        if(data == 'year'){
                            getData({
                                search3:$("#search3").val(),
                                year3:str,
                                type:'ajax',
                                module:'repair'
                            },function(r)
                            {
                                // console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }else if(data == 'department'){
                            getData({
                                search3:$("#search3").val(),
                                department3:str,
                                type:'ajax',
                                module:'repair'
                            },function(r)
                            {
                                console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }else{
                            getData({
                                search3:$("#search3").val(),
                                week3:str,
                                type:'ajax',
                                module:'repair'
                            },function(r)
                            {
                                console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }
                        
                        
            });

            // 水电费
            // var sortyear1 = <?php if ($this->_tpl_vars['year'] != ''): ?>"<?php echo $this->_tpl_vars['year']; ?>
"<?php else: ?>0<?php endif; ?>,sortdepartment1 = <?php if ($this->_tpl_vars['department'] != ''): ?>"<?php echo $this->_tpl_vars['department']; ?>
"<?php else: ?>0<?php endif; ?>;
            // $(".year.form-control.input.sdffilter").val(sortyear1);
            // $(".department.form-control.input.sdffilter").val(sortdepartment1);
            //选择框改变事件
            $(".form-control.input.sdffilter").change(function(){
                        $("#sdffilter").submit();
                    }
            );

            // 留校登记
            var sortyear = <?php if ($this->_tpl_vars['year'] != ''): ?>"<?php echo $this->_tpl_vars['year']; ?>
"<?php else: ?>0<?php endif; ?>,sortdepartment = <?php if ($this->_tpl_vars['department'] != ''): ?>"<?php echo $this->_tpl_vars['department']; ?>
"<?php else: ?>0<?php endif; ?>;

            $(".year.form-control.input.liuxiaofilter").val(sortyear);
            $(".department.form-control.input.liuxiaofilter").val(sortdepartment);
            //选择框改变事件
            $(".form-control.input.liuxiaofilter").change(function(){
                        // $("#liuxiaofilter").submit();
                        var $fil=$(this);
                        var data=$fil.attr('name');
                        var str=$fil.val();
                        if(data == 'year'){
                            getData({
                                search6:$("#search6").val(),
                                year6:str,
                                type:'ajax',
                                module:'repair6'
                            },function(r)
                            {
                                console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair6-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair6-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }else{
                            getData({
                                search6:$("#search6").val(),
                                department6:str,
                                type:'ajax',
                                module:'repair6'
                            },function(r)
                            {
                                // console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair6-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair6-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }
            });

            //留言查询
            $("#whf_btn").click(function(){
                getData({
                    search4:$("#search4").val(),
                    need4:1,
                    type:'ajax',
                    module:'repair4'
                },function(r)
                {
                                // console.log('-----'+r);
                    var retObj=JSON.parse(r);
                                // alert(retObj);
                    if(retObj.result)//判断0还是1
                    {
                                    // layer.msg("修改成功！");
                        var tem=doT.template($("#repair4-tpl").text());
                        var temStr=tem(retObj.data);
                        $("#repair4-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                    }
                    else
                    {
                           layer.msg("暂无数据！");
                    }

                })
            });
            $("#zxly_btn").click(function(){
                $("#search4").val("");
                $("#btn_search4").click();
            });
            // 留校统计
            //  var sortyear = <?php if ($this->_tpl_vars['year'] != ''): ?>"<?php echo $this->_tpl_vars['year']; ?>
"<?php else: ?>0<?php endif; ?>,sortdepartment = <?php if ($this->_tpl_vars['department'] != ''): ?>"<?php echo $this->_tpl_vars['department']; ?>
"<?php else: ?>0<?php endif; ?>;

            // $(".year.form-control.input.liuxiaofilter1.tongji").val(sortyear);
            // $(".department.form-control.input.liuxiaofilter1.tongji").val(sortdepartment);
            //选择框改变事件
            $(".form-control.input.liuxiaofilter1.tongji").change(function(){
                        // $("#liuxiaofilter").submit();
                        var $fil=$(this);
                        var data=$fil.attr('name');
                        var str=$fil.val();
                        if(data == 'year'){
                            getData({
                                // search9:$("#search9").val(),
                                year9:str,
                                type:'ajax',
                                module:'repair9'
                            },function(r)
                            {
                                // console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair9-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair9-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }else{
                            getData({
                                search9:$("#search9").val(),
                                department9:str,
                                type:'ajax',
                                module:'repair9'
                            },function(r)
                            {
                                // console.log('-----'+r);
                                var retObj=JSON.parse(r);
                                // alert(retObj);
                                if(retObj.result)//判断0还是1
                                {
                                    // layer.msg("修改成功！");
                                    var tem=doT.template($("#repair9-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair9-content").html(temStr);
                                    
                                    // $(".message.btn.btn-default").click();
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }
            });

            // 晚归纪录
            var sortyear2 = <?php if ($this->_tpl_vars['year'] != ''): ?>"<?php echo $this->_tpl_vars['year']; ?>
"<?php else: ?>0<?php endif; ?>,sortdepartment2 = <?php if ($this->_tpl_vars['department'] != ''): ?>"<?php echo $this->_tpl_vars['department']; ?>
"<?php else: ?>0<?php endif; ?>;

            $(".year.form-control.input.wgfilter").val(sortyear2);
            $(".department.form-control.input.wgfilter").val(sortdepartment2);
            //选择框改变事件
            $(".form-control.input.wgfilter").change(function(){
                        var $fil=$(this);
                        var data=$fil.attr('name');
                        var str=$fil.val();
                        if(data == 'year'){
                            getData({
                                search8:$("#search8").val(),
                                year8:str,
                                type:'ajax',
                                module:'repair8'
                            },function(r)
                            {
                                var retObj=JSON.parse(r);
                                if(retObj.result)
                                {
                                    var tem=doT.template($("#repair8-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair8-content").html(temStr);
                                }
                                else
                                {
                                    layer.msg("暂无数据！");
                                }

                            })
                        }else{
                            getData({
                                search8:$("#search8").val(),
                                department8:str,
                                type:'ajax',
                                module:'repair8'
                            },function(r)
                            {
                                var retObj=JSON.parse(r);
                                if(retObj.result)
                                {
                                    var tem=doT.template($("#repair8-tpl").text());
                                    var temStr=tem(retObj.data);
                                    $("#repair8-content").html(temStr);
                                }else{
                                    layer.msg("暂无数据！");
                                }

                            });
                        }
            });

            //导入导出Excel
            // $(".Excel.btn.btn-default.output").click(function(){
            //     downloadFile("background/export.php");

            // });
            // function downloadFile(url) {
            //     try{
            //         var elemIF = document.createElement("iframe");
            //         elemIF.src = url;
            //         elemIF.style.display = "none";
            //         document.body.appendChild(elemIF);
            //     }catch(e){
            //         layer.msg("下载异常");
            //     }
            // }

           

            //用户导入
            $("#userinput-btn").click(function(){
                $("#userinput").click();
                $("#userinput").change(function(){
                    var formData = new FormData();
                    var name = document.getElementById("userinput").files[0];
                    formData.append("file",$(this)[0].files[0]);
                    formData.append("name",name);
                    $.ajax({
                        url:"background/importUser.php",
                        type: 'POST',
                        data: formData,
                        processData : false,  // 告诉jQuery不要去处理发送的数据
                        contentType : false,  // 告诉jQuery不要去设置Content-Type请求头
                        beforeSend:function(){
                            console.log("正在导入，请稍候");
                        },
                        success: function(r) {
                            var retObj=JSON.parse(r);
                            // log(retObj.result);
                            if(retObj.result==1){
                                layer.msg("导入成功！");
                            }else{
                                layer.msg("导入失败！");
                            }

                        },
                        error:  function(){
                            layer.msg("数据发送失败，请检查网络链接！");
                        }
                    });
                });
            });
     
    </script>
	<script type="text/javascript">
        var xmlhttp;
        if(window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        function xiugaimima() {
            if(xmlhttp){
                url = "background/xiugai.php";
                if(a('newpw1').value != a('newpw2').value){
                    layer.msg("密码不一致");
                    return false;
				}
				var data = 'oldpw='+a('oldpw').value+'&newpw='+a('newpw1').value;
                xmlhttp.open('post',url,true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.onreadystatechange = xiugaimima2;
                xmlhttp.send(data);
            }
        }

        function xiugaimima2(){
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                var r = xmlhttp.responseText;
                if(r == '1'){
                    layer.msg("修改成功")
                    // a('checkpw').innerHTML = '<font color="#0000FF">修改成功</font>';
				}
				else{
                    layer.msg("修改失败");
                    // a('checkpw').innerHTML = '<font color="#FF0000">修改失败</font>';
                }
			}
            if(xmlhttp.readyState == 4 && xmlhttp.status!=200){
                $('checkpw').innerHTML = '<font color="#FF0000">请求失败</font>';
            }
		}

        function a(id) {
            return document.getElementById(id);
        }
        //搜索数据
        function getData(postData,cb)
            {
                var pData=$.extend(postData,{type:"ajax"});
                var callback=cb;
                $.ajax({
                    url:"manage_admin.php",
                    type: 'GET',
                    datatype:"json",
                    data: postData,
                    success: function(r) {
                        callback(r);
                    },
                    error:  function(){
                        layer.msg("数据发送失败，请检查网络链接！");
                    }
                });
            }

        //搜索未缴费onclick="window.location.href='?active=7&need=1'"
        $("#btn_search7_wjf").click(function(){
                getData({
                        search7:$("#search7").val(),
                        need7:1,
                        type:'ajax',
                        module:'repair7',
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair7-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair7-content").html(temStr);
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });
        $("#btn-gly").click(function(){
                // var search=$("#search1").val();
                getData({
                        // search7:'',
                        need5:1,
                        type:'ajax',
                        module:'repair5',
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair5-tpl").text());
                            var temStr=tem(retObj.data);
                        
                            $("#repair5-content").html(temStr);
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });

        $("#repair_wcl").click(function(){
                // var search=$("#search1").val();
                getData({
                        // search7:'',
                        need:1,
                        type:'ajax',
                        module:'repair2',
                    },function(r)
                    {

                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair2-tpl").text());
                            var temStr=tem(retObj.data);
                        
                            $("#repair2-content").html(temStr);
                           
                        
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
            });

        $("#repair_ycl").click(function(){
                getData({
                        need:0,
                        type:'ajax',
                        module:'repair2',
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            var tem=doT.template($("#repair2-tpl").text());
                            var temStr=tem(retObj.data);
                        
                            $("#repair2-content").html(temStr);
                           
                        
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    });
            });
 // onclick="window.location.href='?active=5&need5=1'" 


        //分页
        $(".pagination li").click(function()
        {
            var $that=$(this);
            var pageName=$that.attr("data-page");
            var pageValue=$that.attr("data-page-value");
            var searchName=$that.attr("data-search-id");
            var searchText=$("#"+searchName).val();
            var type=$that.attr("data-type");
            var postObj={};
            postObj[pageName]=pageValue;
            postObj[searchName]=searchText;
            postObj["module"]=type;
            $that.parent(".pagination").find("li").removeClass("active");
            $that.addClass("active");
            getData(postObj,function(ret)
            {

                        var retObj=JSON.parse(ret);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#"+type+"-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#"+type+"-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }
            });
        });
        function fenye(page){
            getData({
                        search9:$("#search9").val(),
                        type:'ajax',
                        // active:9,
                        page9:page,
                        module:'repair9'
                    },function(r)
                    {
                        var retObj=JSON.parse(r);
                        if(retObj.result)//判断0还是1
                        {
                            // layer.msg("修改成功！");
                            var tem=doT.template($("#repair9-tpl").text());
                            var temStr=tem(retObj.data);
                            $("#repair9-content").html(temStr);
                            
                            // $(".message.btn.btn-default").click();
                        }
                        else
                        {
                            layer.msg("暂无数据！");
                        }

                    })
        }
	</script>
</html>