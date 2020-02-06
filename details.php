<?php
	include "conn.php";
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<?php
				$desc_id=isset($_GET['id'])?trim($_GET['id']):'';
				$sql="select * from article a,article_details b where a.article_id=b.details_id and a.article_id={$desc_id}";
				$result=mysqli_query($link, $sql);
				if($result && mysqli_num_rows($result)>0){
						while($v=mysqli_fetch_assoc($result)){
							$target_details=$v[details_id];
					$target_type=$v[article_type];
					$target_title=$v[article_title];
				?>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="Keywords" content="<?php echo $v[desc_keyword]?>"/>
    	<meta name="Description" content="<?php echo $v[desc_describe]?>"/>
		<title><?php echo $target_title?> | 肥小波博客</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/feixiaobo.ico"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/index.css"/>
    	<link rel="stylesheet" type="text/css" href="css/detail.css"/>
		<!--<link rel="stylesheet" href="js/styles/default.css">
		<script src="js/highlight.pack.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>-->
		<link rel="stylesheet" type="text/css" href="css/prism.css"/>
		<style type="text/css">
    		@media only screen and (max-width: 768px) {
    			.main_article{margin-top:0;}
    		}
		    .icon {
		       width: 1em; height: 1em;
		       vertical-align: -0.15em;
		       fill: currentColor;
		       overflow: hidden;
		    }
    	</style>
    	<script src="js/jquery.min.js"></script>
		<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
		<script src="icc_font/iconfont.js" type="text/javascript" charset="utf-8"></script>
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
		<!--头部开始-->
<?php
	include "common_nav.html";
	?>

	<!--头部结束-->
	<div class="container">
	<div class="row">
	<div class="col-lg-9">
	<section class="row main_article">
		<div class="details_article_box">
			
			<h2 class="details_header_h2"><?php echo $v[article_title]?></h2>
			<div class="details_header_info">
				<p class="p_time"><span><i class="iconfont">&#xe654;</i>&nbsp;肥小波</span><span class="p_span_time"><i class="iconfont">&#xe60e;</i>&nbsp;<?php date_default_timezone_set("PRC");
                                    echo date("Y-m-d H:i:s",$v['article_time']);?></span></p>
				<p class="p_type">
					<span class="p_type_span">分类: </span>
					<span><?php echo $v[article_type]?></span>
					<span class="p_span_time"><i class="iconfont">&#xe63a;</i><?php echo $v[article_watch]?></span>
					<span class="p_span_time"><i class="iconfont">&#xe61a;</i><?php echo $v[details_love]?></span>
				</p>
			</div>
			<div class="details_content">
				<?php echo $v[details_content]?>
			</div>
		</div>
		<div class="details_article_box opinion">
			<ul class="ul_expression">
				<li class="list">
					<span class="count"><?php echo $v[details_love]?>人</span>
					<img src="img/list1.png" height="40" width="40" data-imgname="details_love"/>
					<span class="infofo">Love</span>
				</li>
				<li class="list">
					<span class="count"><?php echo $v[details_haha]?>人</span>
					<img src="img/list2.png" height="40" width="40" data-imgname="details_haha"/>
					<span class="infofo">Haha</span>
				</li>
				<li class="list">
					<span class="count"><?php echo $v[details_wow]?>人</span>
					<img src="img/list3.png" height="40" width="40" data-imgname="details_wow"/>
					<span class="infofo">Wow</span>
				</li>
				<li class="list">
					<span class="count"><?php echo $v[details_sad]?>人</span>
					<img src="img/list4.png" height="40" width="40" data-imgname="details_sad"/>
					<span class="infofo">Sad</span>
				</li>
			</ul>
			<div class="my_share text-center">
				<span>分享到：</span>
				<a href="https://connect.qq.com/widget/shareqq/index.html?url=http://www.feixiaobo.com/details.php?id=<?php echo $target_details?>&title=<?php echo $target_title?>&summary=" target="_blank"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-QQ1"></use></svg></a>
				<a href="javascript:void(window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)));" title="分享到QQ空间"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-QQkongjian"></use></svg></a>
			</div>
			<div class="detail_my_tag text-center">
				<i class="iconfont">&#xe718;</i>&nbsp;&nbsp;<span><?php echo $v[details_tag]?></span>
			</div>
			<div class="article_link">
				<?php
					
					$sqll="select article_id,article_title from article where article_type='{$target_type}' and article_time<(select article_time from article where article_id='{$target_details}') order by article_time desc limit 0,1";
					$prev_result=mysqli_query($link, $sqll);
				if($prev_result && mysqli_num_rows($prev_result)>0){
						while($pr=mysqli_fetch_assoc($prev_result)){
					?>
				<div class="article_link_prev"><p class="prev_p">上一篇：<a href="details.php?id=<?php echo $pr[article_id]?>"><?php echo $pr[article_title]?></a></p></div>
				<?php 
					}
				}else{
					echo '<div class="article_link_prev"><p class="prev_p">已是第一篇文章 ！</p></div>';
				}
					?>
					<?php
					$sqlt="select article_id,article_title from article where article_type='{$target_type}' and article_time>(select article_time from article where article_id='{$target_details}') order by article_time limit 0,1";
					$next_result=mysqli_query($link, $sqlt);
				if($next_result && mysqli_num_rows($next_result)>0){
						while($nex=mysqli_fetch_assoc($next_result)){
					?>
				<div class="article_link_next"><p class="next_p">下一篇：<a href="details.php?id=<?php echo $nex[article_id]?>"><?php echo $nex[article_title]?></a></p></div>
				<?php 
					}
				}else{
					echo '<div class="article_link_prev"><p class="prev_p">已是最后一篇文章 ！</p></div>';
				}
					?>
				<input type="hidden" name="inp_hidden" id="inp_hidden" value="<?php echo $desc_id?>" />
				<!--<div id="user_clicked"><i class="iconfont">&#xe609;</i>&nbsp;&nbsp;<span>您已经发表过意见了!</span></div>-->
			</div>
		</div>
		<?php
		}}
		?>
		<div class="details_article_box introduction">
			<img src="img/touxiang.jpg" alt="" width="100" class="phone-hide"/>
			<div class="intro_right">
				<div class="intro_header">
					<img src="img/touxiang.jpg" width="25" class="phone-show"/>
					<p class="p_name">作者简介：<svg class="icon" aria-hidden="true">
    <use xlink:href="#icon--"></use>
</svg><span>肥小波</span></p>
					<div class="share_money"><svg class="icon" aria-hidden="true">
    <use xlink:href="#icon-shangjin"></use>
</svg>打赏</div>
					<div class="money_div">
						<div class="mask"></div>
						<div class="money_box img-rounded text-center">
							<svg class="icon close_svg" aria-hidden="true">
						    <use xlink:href="#icon-huabanfuben1"></use></svg>
						    <p class="touxiang_img"><img src="img/touxiang.jpg" alt="肥小波" width="80"/></p>
						    <p class="p_thanks">感谢您的支持~</p>
						    <div class="qr_code"><img src="img/zhifubao.jpg" alt="支付宝~~" width="150" height="150"/></div>
						    <div class="qr_btn">
						    	<label for="" role="radio" class="el_radio">
						    		<span class="el_radio_input is-checked">
						    			<span class="el_radio_inner"></span>
						    			<input type="radio" aria-hidden="true" class="el-radio_original" value="true">
						    		</span>
						    		<span class="el-radio_label"><img src="img/zfb.svg" width="80" alt=""></span>
						    	</label>
						    	<label role="radio" class="el_radio">
							    	<span class="el_radio_input">
							    		<span class="el_radio_inner"></span>
							    		<input type="radio" aria-hidden="true" class="el-radio_original" value="false">
							    	</span>
						    		<span class="el-radio__label"><img src="img/wx.svg" width="80" alt=""></span>
						    	</label>
						    </div>
						</div>
					</div>
				</div>
				<p class="intro_p">人生如棋，落子无悔。</p>
				<ul class="intro_ul">
					<li class="intro_li"><a href="index.php"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-shouye2"></use></svg></a></li>
					<li class="intro_li"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2292547010&site=qq&menu=yes"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-QQ"></use></svg></a></li>
					<li class="intro_li"><a target="_blank" href="https:github.com/xdq123321"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-GitHub"></use></svg></a></li>
					<li class="intro_li" id="my_weixin"><a href="javascript:void(0)"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-weixin"></use></svg></a></li>
				</ul>
			</div>
		</div>
		
		<div class="details_article_box details_common">
			<h2 class="details_common_h2">
				<?php
					$sql_count="select count(common_id) count_art from user_common where article_id={$target_details}";
					$count_res=mysqli_query($link, $sql_count);
					if($count_res&&mysqli_num_rows($count_res)>0){
						while($count=mysqli_fetch_assoc($count_res)){
					echo '共 <span id="h2_common_span">'.$count[count_art].'</span> 条评论关于 “'.$target_title.'”';
						}
					}
					?>
			</h2>
			<div class="details_common_wrap">
				<div class="details_common_wrap_box">
					<h3>发表评论</h3>
					<p>亲爱滴小伙伴，带星号的选项为必填项哟~~</p>
					<div class="details_common_form">
						<label for="details_common_content">内容<i style="color:red">*</i></label>
						<textarea name="details_common_content" rows="8" cols="80" id="details_common_content"></textarea>
						<span class="common_tips"></span>
					</div>
					<div class="details_common_input">
						<div class="common_input_bottom common_input_common"><label for="input_author">昵称<i style="color: red;">*</i></label><input type="text" id="input_author" name="input_author" autocomplete="off"/><span class="common_tips"></span></div>
						<div class="common_input_bottom common_input_common"><label for="input_email">邮箱<i style="color: red;">*</i></label><input type="email" id="input_email" name="input_email" autocomplete="off"/><span class="common_tips"></span></div>
						<div class="common_input_code"><label for="input_truecode">验证码<i style="color: red;">*</i></label><input type="text" id="input_truecode" name="input_truecode" autocomplete="off"/><span class="common_tips"></span><img src="code.php" id="checkpic" onclick="changing()"/></div>
					</div>
					<div class="details_common_submit" id="common_sub">
						<input type="button" value="提交评论" class="common_submit"/>
					</div>
				</div>
				<ul class="details_user_common" style="padding: 0;" id="details_user_common_ul">
					<?php
						$common_sql="select * from user a,user_common b where a.user_id=b.user_id and article_id={$target_details} order by common_time desc";
						$common_result=mysqli_query($link, $common_sql);
						if($common_result && mysqli_num_rows($common_result)>0){
						while($m=mysqli_fetch_assoc($common_result)){
						?>
					<li class="details_user_common_li">
						<p class="user_common_li_p" style="background-color: <?php echo $m[user_bg]?>;">
							<?php 
							$userName=substr($m[user_name],0,3);
							if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$userName)){
								echo substr($m[user_name], 0,3);
							}else{
								echo strtoupper(substr($m[user_name], 0,1));
							}
							?></p>
						<div class="user_common_li_header">
							<span class="user_header_span"><?php echo $m[user_name]?></span>
							<p class="user_header_p">
								<span class="one"><?php echo $m[user_browser]?></span><span class="two"><?php echo $m[user_system]?></span>
							</p>
						</div>
						<div class="user_common_li_content">
							<p><?php echo $m[common_content]?></p>
						</div>
						<div class="user_common_li_footer">
							<div class="user_common_time"><?php
								date_default_timezone_set("PRC");
                                echo date("Y-m-d H:i:s",$m[common_time]);
								?></div>
						</div>
					</li>
					<?php
						}}
						?>
				</ul>
			</div>
		</div>-->
	</section>
	</div>
	<?php include "common_right.php"?>
	</div>
	<div class="div_weixin clearfix img-rounded">
		<div class="div_weixin_box">
			<p class="weixin_p_one">微信号：feibo<svg class="icon" aria-hidden="true" id="weixin_close"><use xlink:href="#icon-tubiaozhizuomobanyihuifu-"></use></svg></p>
			<p class="weixin_p_two"><img src="img/weixin.png"/></p>
		</div>
	</div>
	</div>
		<!--尾部开始-->		
		<?php
			include "common_footer.html";
			?>
		<!--尾部结束-->		
	<script src="js/bootstrap.min.js"></script>
    <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/detail.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
