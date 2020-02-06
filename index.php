<?php
	include "conn.php";
	include "my_page.php";
	?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<meta name="Keywords" content="html5,css3,JavaScript,web前端开发,jQuery,html,css,肥小波，web前端,php,mysql,前端实战案例"/>
   	<meta name="Description" content="肥小波前端，记录所学习到的前端技术知识，案例展示，学习经验交流"/>
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>前端笔记 | 肥小波</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/feixiaobo.ico"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
  <!--  <link rel="stylesheet" type="text/css" href="css/offcanvas.css"/>-->

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
     <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
    			document.onreadystatechange=function(){
	if(document.readyState!=="complete"){
		$("#loading").fadeIn(300);
	}else{
		$("#loading").fadeOut(300);
	}
}
    </script>
  </head>
  <body>
   <?php
   	include "common_nav.html"
   	?>
		
		<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-9 col-md-9">
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner img-rounded" role="listbox">
		<div class="item active img-rounded">
			<img src="img/banner2.jpg" alt="..." class="img-rounded">	
		</div>
		<div class="item img-rounded">
			<img src="img/banner1.jpg" alt="..." class="img-rounded">
		</div>
		<div class="item img-rounded">
			<img src="img/banner3.jpg" alt="..." class="img-rounded">
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
							</div>
							<div class="col-lg-3 col-md-3 list_div">
								<ul class="list-group clearfix">
  <li class="list-group-item top_li">
  	<a href="#" class="top_li_a"><img src="img/nux.jpg"/></a>
  	<div class="text-desc">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
						<a href="#" class="btn">阅读详情</a>
					</div>
  	</li>
  <li class="list-group-item top_li">
  	<a href="#" class="top_li_a"><img src="img/vue.jpg"/></a>
  	<div class="text-desc">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
						<a href="#" class="btn">阅读详情</a>
					</div>
  </li>
  <li class="list-group-item top_li">
  	<a href="#" class="top_li_a"><img src="img/wordpress.jpg"/></a>
  	<div class="text-desc">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
						<a href="#" class="btn">阅读详情</a>
					</div>
  	</li>
</ul>
							</div>
						</div>
						<div class="row" id="notice_sm_show">
							<div class="notice_sm_show_box img-rounded">
								<div class="public_notice img-rounded">
							<div class="public_notice_title">
								<p><i class="iconfont">&#xe613;</i>公告</p>
							</div>
							<div class="public_notice_content">
								本站采用BootStrap + JQuery渲染页面，后台用的PHP + Mysql，欢迎访问学习。
							</div>
						</div>
						</div>
						</div>
						<div class="row main_article">
							<div class="main_article_box">
							<h2 class="new_article">最新文章</h2>
						<?php
								$sql="select * from article";
								$result=mysqli_query($link,$sql);
								$rows = $result->num_rows;
								Page($rows,8);
								$sql = "select * from article a,article_details b where a.article_id=b.details_id order by a.article_time desc limit $select_from $select_limit";
					$result=mysqli_query($link,$sql);
					//5
					if($result && mysqli_num_rows($result)>0){
						while($v=mysqli_fetch_assoc($result)){
								
								?>
							<article>
								<div class="article_left">
									<a href="details.php?id=<?php echo $v['article_id']?>" data-artcid="<?php echo $v[article_id]?>" class="first_a"><img src="img/<?php echo $v[article_img]?>" data-artcid="<?php echo $v[article_id]?>"/></a>
								</div>
								<div class="article_right">
									<h2><span class="article_right_label"><?php echo $v[article_type]?></span><a href="details.php?id=<?php echo $v['article_id']?>" class="article_right_title" data-artcid="<?php echo $v[article_id]?>"><?php echo $v[article_title]?></a></h2>
									<p class="article_right_content"><?php echo $v[article_content]?></p>
									<div class="article_right_count clearfix">
										<div class="pull-left article_right_count_left">
										<span><i class="iconfont">&#xe719;</i><?php date_default_timezone_set("PRC");
                                    echo date("Y-m-d H:i:s",$v['article_time']);?></span><span class="watch"><i class="iconfont">&#xe63a;</i><?php echo $v[article_watch]?></span><span><i class="iconfont">&#xe61a;</i><?php echo $v[details_love]?></span>
									</div>
									<a href="details.php?id=<?php echo $v['article_id']?>" class="btn btn-info btn-sm pull-right" role="button" data-artcid="<?php echo $v[article_id]?>">阅读详情</a>
									</div>
								</div>
							</article>
							<?php
						}
						}
								?>
							<div class="my_pager">
								<nav aria-label="Page navigation">
									  <ul class="pagination pagination-sm">
									    <?php
									    
									    	if($page==1){
		echo '<li class="disabled"><span><span aria-hidden="true">&laquo;</span></span></li>';
	}else{
    echo '<li><a href="article_page.php?page='.$pre_page.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';}
	for ($i=1; $i <=$page_count; $i++) {
		if($i==$page){
			echo '<li class="active"><span><span aria-hidden="true">'.$i.'</span></span></li>';
		}else{
			echo '<li><a href="article_page.php?page='.$i.'">'.$i.'</a></li>';
		} 
		
	}
	if($page==$page_count){
		echo '<li class="disabled"><span><span aria-hidden="true">&raquo;</span></span></li>';
	}else{
    echo '<li><a href="article_page.php?page='.$next_page.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
									    	?>
									    	
									  </ul>
									  <span class="pager_span pagination">前往<div class="pager_div"><input type="number" min="1" max="<?php echo $page_count;?>" autocomplete="off" value="<?php echo $page;?>" id="jump_pagee"/></div>页</span>
									</nav>
								
							</div>
							</div>
							
						</div>

							
						</div>
						<?php include "common_right.php"?>
					</div>
					
					
				</div>
		<?php
			include "common_footer.html"
			?>
   
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/visit_add.js" type="text/javascript" charset="utf-8"></script>
   <!-- <script src="js/offcanvas.js" type="text/javascript" charset="utf-8"></script>-->
   <script type="text/javascript">
    	var inp=document.getElementById("jump_pagee");
    	inp.onchange=function(){
    		var inp_val=inp.value;
    		window.location.href="article_page.php?page="+inp_val;	
    	}
    
    </script>
  </body>
</html>