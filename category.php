<?php
	include "conn.php";
	include "my_page.php";
	?>
	<?php
		@$kinds=isset($_GET['type'])?trim($_GET['type']):'';
		?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $kinds?> | 肥小波博客</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/feixiaobo.ico"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/index.css"/>
    	<style type="text/css">
    		@media only screen and (max-width: 768px) {
    			.main_article{margin-top:0;}
    		}
    	</style>
    	   <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
    			document.onreadystatechange=function(){
	if(document.readyState=="complete"){
		$("#loading").fadeOut(300);
	}else{
		$("#loading").fadeIn(300);
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
								<div class="row main_article">
							<div class="main_article_box">
							<h2 class="new_article">当前频道 : <?php echo $kinds?></h2>
							<?php
								$sql="select * from article where article_type like '{$kinds}'";
								$result=mysqli_query($link,$sql);
								$rows = $result->num_rows;
								Page($rows,8);
								$sql = "select * from article a,article_details b where a.article_id=b.details_id and a.article_type like '{$kinds}' order by a.article_time desc limit $select_from $select_limit";
					$result=mysqli_query($link,$sql);
					//5
					if($result && mysqli_num_rows($result)>0){
						while($rows=mysqli_fetch_assoc($result)){
								
								?>
							<article>
								<div class="article_left">
									<a href="details.php?id=<?php echo $rows['article_id']?>" data-artcid="<?php echo $rows[article_id]?>" class="first_a"><img src="img/<?php echo $rows[article_img]?>" data-artcid="<?php echo $rows[article_id]?>"/></a>
								</div>
								<div class="article_right">
									<h2><span class="article_right_label"><?php echo $rows[article_type]?></span><a href="details.php?id=<?php echo $rows['article_id']?>" class="article_right_title" data-artcid="<?php echo $rows[article_id]?>"><?php echo $rows[article_title]?></a></h2>
									<p class="article_right_content"><?php echo $rows[article_content]?></p>
									<div class="article_right_count clearfix">
										<div class="pull-left article_right_count_left">
										<span><i class="iconfont">&#xe719;</i><?php date_default_timezone_set("PRC");
                                    echo date("Y-m-d H:i:s",$rows['article_time']);?></span><span class="watch"><i class="iconfont">&#xe63a;</i><?php echo $rows[article_watch]?></span><span><i class="iconfont">&#xe61a;</i><?php echo $rows[details_love]?></span>
									</div>
									<a href="details.php?id=<?php echo $rows['article_id']?>" class="btn btn-info btn-sm pull-right" role="button" data-artcid="<?php echo $rows[article_id]?>">阅读详情</a>
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
									    	if($page<=1){
		echo '<li class="disabled"><span><span aria-hidden="true">&laquo;</span></span></li>';
	}else{
    echo '<li><a href="category.php?page='.$pre_page.'&&type='.$kinds.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';}
	for ($i=1; $i <=$page_count; $i++) {
		if($i==$page){
			echo '<li class="active"><span><span aria-hidden="true">'.$i.'</span></span></li>';
		}else{
			echo '<li><a href="category.php?page='.$i.'&&type='.$kinds.'">'.$i.'</a></li>';
		} 
		
	}
	if($page==$page_count){
		echo '<li class="disabled"><span><span aria-hidden="true">&raquo;</span></span></li>';
	}else{
    echo '<li><a href="category.php?page='.$next_page.'&&type='.$kinds.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
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
    <script type="text/javascript">
    	var keyw=<?php echo json_encode($kinds)?>;
    	var inp=document.getElementById("jump_pagee");
    	inp.onchange=function(){
    		var inp_val=inp.value;
    		window.location.href="category.php?page="+inp_val+"&&type="+keyw;	
    	}
    </script>
	</body>
</html>
