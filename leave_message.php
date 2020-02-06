<?php
include 'conn.php';
header("Content-type:application/json;charset=utf8");
$articleId=isset($_POST['articleId'])?trim($_POST['articleId']):'';
$user_content=isset($_POST['content'])?trim($_POST['content']):'';
$user_nic=isset($_POST['nic'])?trim($_POST['nic']):'';
$user_email=isset($_POST['email'])?trim($_POST['email']):'';
$user_Sys=isset($_POST['userSys'])?$_POST['userSys']:'';
$user_Brow=isset($_POST['userBrow'])?$_POST['userBrow']:'';
$user_Bg=isset($_POST['userBg'])?trim($_POST['userBg']):'';
$sql="INSERT INTO user (user_name,user_browser,user_system,user_bg) VALUES('$user_nic','$user_Brow','$user_Sys','$user_Bg')";
$result = mysqli_query($link,$sql);
				if($result && mysqli_affected_rows($link)>0){
					$uid=mysqli_insert_id($link);
					$time=time();
					$sql="insert into user_common values($uid,NULL,'$articleId','$user_content',$time)";
					$result=mysqli_query($link,$sql);
					if($result&&mysqli_affected_rows($link)>0){
							//echo "success";
					$cid=mysqli_insert_id($link);
					$sqle="select user_name,user_bg,user_browser,common_content,user_system,common_time from user a,user_common b where a.user_id=b.user_id and common_id={$cid}";
					$select_result=mysqli_query($link,$sqle);
					if($select_result && mysqli_num_rows($select_result)>0){
						while($row=mysqli_fetch_assoc($select_result)){
							$sql_countt="select count(common_id) count_art from user_common where article_id={$articleId}";
					$sql_c=mysqli_query($link, $sql_countt);
					if($sql_c&&mysqli_num_rows($sql_c)>0){
						while($coun=mysqli_fetch_assoc($sql_c)){	
							$res=array(
							"result"=>$row,
							"count"=>$coun
							);
						}
					}	
							
						}
						}
					
					echo(json_encode($res,JSON_UNESCAPED_UNICODE));
					}
				}
?>