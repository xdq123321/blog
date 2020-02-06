<?php include "conn.php"?>
<div class="col-lg-3 col_right">
						<div class="public_notice img-rounded">
							<div class="public_notice_title">
								<p><i class="iconfont">&#xe613;</i>公告</p>
							</div>
							<div class="public_notice_content">
								本站采用BootStrap + JQuery渲染页面，后台用的PHP + Mysql，欢迎访问学习。
							</div>
						</div>
						<div class="public_notice img-rounded public_comment">
							<div class="public_notice_title">
								<p><i class="iconfont">&#xe619;</i>最新评论</p>
							</div>
							<div class="public_comment_content">
								<ul>
								<?php
								$common_new="select c.article_id,common_content,user_name,user_bg,article_title from article a,user b,user_common c where a.article_id=c.article_id and b.user_id=c.user_id ORDER BY c.common_time desc limit 0,10;";
								$common_result=mysqli_query($link, $common_new);
								if($common_result && mysqli_num_rows($common_result)>0){
								while($Y=mysqli_fetch_assoc($common_result)){
								?>
									<li class="comment_li clearfix">
										<p style="background-color: <?php echo $Y[user_bg]?>;">
											<?php
											$commName=substr($Y[user_name],0,3);
											if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$commName)){
												echo substr($Y[user_name], 0,3);
											}else{
												echo strtoupper(substr($Y[user_name], 0,1));
											}
												?>
										</p>
										<div class="comment_li_right">
											<p class="author"><?php echo $Y[user_name]?></p>
											<p class="right_content"><?php echo $Y[common_content]?></p>
											<a href="details.php?id=<?php echo $Y[article_id]?>" class="right_a">评：<?php echo $Y[article_title]?></a>
										</div>
									</li>
									<?php
								}}
										?>
								</ul>
							</div>
						</div>
						<div class="public_notice img-rounded public_tag">
								<div class="public_notice_title">
								<p><i class="iconfont">&#xe75d;</i>标签云</p>
							</div>
								<div class="public_tag_content">
									<ul class="clearfix">
										<li class="pink"><a href="category.php?type=CSS3">css</a></li>
										<li class="lightblue"><a href="#">前端笔记</a></li>
										<li class="deepred"><a href="category.php?type=HTML5">html</a></li>
										<li class="lightyellow"><a href="category.php?type=CSS3">css3</a></li>
										<li class="lightblue"><a href="http://wpa.qq.com/msgrd?v=3&uin=2292547010&site=qq&menu=yes">QQ</a></li>
										<li class="lightblack"><a href="category.php?type=JavaScript">JavaScript</a></li>
										<li class="lightred"><a href="category.php?type=MySQL">Mysql</a></li>
										<li class="lightblack"><a href="category.php?type=PHP">PHP</a></li>
										<li class="pink"><a href="category.php?type=HTML5">基础知识</a></li>
										<li class="lightblue"><a href="category.php?type=软件工具">Photoshop</a></li>
										<li class="lightgreen"><a href="#">代码编辑器</a></li>
										<li class="pink"><a href="category.php?type=HTML5">html5</a></li>
										<li class="lightred"><a href="category.php?type=BootStrap">BootStrap</a></li>
										<li class="lightyellow"><a href="https://www.iconfont.cn/" target="_blank">iconfont</a></li>
										<li class="lightblue"><a href="#">canvas</a></li>
										<li class="lightyellow"><a href="category.php?type=SASS">SASS笔记</a></li>
										<li class="lightgreen"><a href="#">手机摄影</a></li>
										<li class="deepred"><a href="category.php?type=实战案例">demo</a></li>
										<li class="lightred"><a href="details.php?id=42">软件分享</a></li>
										<li class="lightblack"><a href="#">规范命名</a></li>
									</ul>
								</div>
						</div>
				</div>
